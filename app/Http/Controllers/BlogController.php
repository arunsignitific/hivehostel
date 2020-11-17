<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\Blog;
use App\BlogComment;
use DB;
use Image;
use RealRashid\SweetAlert\Facades\Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = DB::table("blogs")->orderBy('created_at', 'DESC')->where('status', '=', 'active')->paginate(5);
        $blog_authors = DB::table("blog_authors")->select('id', 'name')->get();
        $latests = Blog::orderBy('created_at', 'DESC')->where('status', '=', 'active')->take(3)->get();
        return view("frontend.blog", [
            'blogs'=>$blogs,
            'blog_authors'=>$blog_authors,
            'latests'=>$latests
            ]);
    }

    public function blogsView($slug)
    {
        $viewone = Blog::where('slug', '=', $slug)->firstOrFail();
        $latests = DB::table("blogs")->orderBy('created_at', 'DESC')
        ->where('slug', '!=', $slug)
        ->where('status', '=', 'active')->take(3)->get();
        $blog_authors = DB::table("blog_authors")->select('id', 'name')->get();
        return view("frontend.blog-post", [
            'showone'=>$viewone,
            'blog_authors'=>$blog_authors,
            'latests'=>$latests
            ]);
    }

    public function blogsSearch()
    {
        $q = Input::get('q');
        $blog_authors = DB::table("blog_authors")->select('id', 'name')->get();
        $latests = Blog::orderBy('created_at', 'DESC')
        ->where('status', '=', 'active')->take(3)->get();
        if($q != "")
        {
            $blogs = Blog::where('title', 'LIKE', '%' . $q . '%')
                                ->where('status', '=', 'active')
                                ->paginate(5)->setPath ( '' );
            $pagination = $blogs->appends(array('q' => Input::get('q')));
            if(count($blogs) > 0)
            return view('frontend.blog', [
                'blog_authors'=>$blog_authors,
                'latests'=>$latests,
                'query'=>$q])->withDetail($blogs);
        }
        return view('frontend.blog', [
            'blog_authors'=>$blog_authors,
            'latests'=>$latests,
            'query'=>$q])->withMessage("No Matching Blog Found!");
    }
    
    /*---------------------------admin controllers start------------------------*/

    public function addBlog()
    {
        $blog_categories = DB::table("blog_categories")->select('id', 'name')->get();
        $blog_authors = DB::table("blog_authors")->select('id', 'name')->get();
        return view("admin.blogs.add_blog", ['blog_categories'=>$blog_categories, 'blog_authors'=>$blog_authors]);
    }

    public function insert(Request $request)
    {
		$request->validate([
            'title' => 'required | max:255',
            'h1' => 'nullable | max:255',
            'meta_title' => 'nullable | max:255',
            'meta_description' => 'nullable | max:255',
		]);
		
        $data = array();

        $data['blog_category_id'] = $request->blog_category_id;
        $data['blog_author_id'] = $request->blog_author_id;
        $data['title'] = $request->title;
        $data['post'] = $request->post;
        $data['h1'] = $request->h1;
        $data['meta_title'] = $request->meta_title;
        $data['meta_description'] = $request->meta_description;

        
        $image = $request->file('header_img');

        $image_name = time() . '.' . $image->getClientOriginalExtension();

        $destinationPaththumb = 'storage/app/blog_thumbnail';

        $resize_image = Image::make($image->getRealPath());

        $resize_image->resize(368, 293, function($constraint){
        $constraint->aspectRatio();
        })->save($destinationPaththumb . '/' . $image_name);

        $destinationPathorg = 'storage/app/blog_pics/';

        $image->move($destinationPathorg, $image_name);
       
        $data['thumb_img'] = $image_name;
        $data['header_img'] = $image_name;
        
        $q = Input::get('slug');
		if($q != ""){
			$data['slug'] = $q;
		}
		else{
			$slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
            $data['slug'] = $slug;
        }
        
        if ($request->status == "")
        {
            $data['status'] = "inactive";
        }
        else
        {
            $data['status'] = "active";
        }
		
        $st = DB::table('blogs')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Blog Added Successfully.');
            return Redirect()->route('blog.home')->withsuccess('Blog Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Blog Not Added.');
            return Redirect()->route('blog.home')->witherror('Error! Blog Not Added.');
        }
    }

    public function show()
    {
        $blogs = DB::table("blogs")->select('slug', 'title', 'status')->orderBy('created_at', 'DESC')->paginate(5);
        return view("admin.blogs.blogs", ['blogs'=>$blogs]);
    }

    public function view($slug)
    {
        $viewone = Blog::where('slug', '=', $slug)->firstOrFail();
        $comments = BlogComment::where('blog_id', '=', $viewone->id)->paginate(5);
        return view("admin.blogs.blog_view", ['showone'=>$viewone, 'comments'=>$comments]);
    }

    public function edit($slug)
    {
        $editone = Blog::where('slug', '=', $slug)->firstOrFail();
        $blog_categories = DB::table("blog_categories")->select('id', 'name')->get();
        $blog_authors = DB::table("blog_authors")->select('id', 'name')->get();
        return view("admin.blogs.blog_edit", ['edit'=>$editone, 'blog_categories'=>$blog_categories, 'blog_authors'=>$blog_authors]);
    }

    public function update(Request $request, $slug)
    {
		$request->validate([
            'title' => 'required | max:255',
            'h1' => 'nullable | max:255',
            'meta_title' => 'nullable | max:255',
            'meta_description' => 'nullable | max:255',
		]);
		
        $data = Blog::where('slug', '=', $slug)->firstOrFail();

        $data->blog_category_id = $request->blog_category_id;
        $data->blog_author_id = $request->blog_author_id;
        $data->title = $request->title;
        $data->post = $request->post;
        $data->h1 = $request->h1;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;

        // if($request->hasFile('thumb_img')){
        //     $thumb_img = \Storage::delete('blog_pics/'.$data['thumb_img']);

        //     $uniqueFileName = (uniqid() . $request->file('thumb_img')->getClientOriginalName());
        //     $request->file('thumb_img')->move('storage/app/blog_pics/', $uniqueFileName);
        //     $data->thumb_img = $uniqueFileName;
        // }

        if($request->hasFile('header_img')){
            $header_img = \Storage::delete('blog_pics/'.$data['header_img'],'blog_thumbnail/'.$data['thumb_img']);

            $image = $request->file('header_img');

            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPaththumb = 'storage/app/blog_thumbnail';

            $resize_image = Image::make($image->getRealPath());

            $resize_image->resize(368, 293, function($constraint){
            $constraint->aspectRatio();
            })->save($destinationPaththumb . '/' . $image_name);

            $destinationPathorg = 'storage/app/blog_pics/';

            $image->move($destinationPathorg, $image_name);
        
            $data->thumb_img = $image_name;
            $data->header_img = $image_name;
        }
        
        $q = Input::get('slug');
		if($q != ""){
			$data->slug = $q;
		}
		else{
			$slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
            $data->slug = $slug;
        }
        
        if ($request->status == "")
        {
            $data->status = "inactive";
        }
        else
        {
            $data->status = "active";
        }
		
        $data->save();

        if ($data->save())
        {
            $success = Alert::success('Success', 'Blog Updated Successfully.');
            return Redirect()->route('blog.home')->withsuccess('Blog Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Blog Not Update.');
            return Redirect()->route('blog.home')->witherror('Error! Blog Not Update.');
        }
    }

    public function delete(Request $request)
    {
        $slug = $request->slug;
        $file = Blog::where('slug', '=', $slug)->firstOrFail();
        $files = \Storage::delete('blog_thumbnail/'.$file['thumb_img'], 'blog_pics/'.$file['header_img']);
        $deleteone = Blog::where('slug', '=', $slug)->delete();

        if ($deleteone)
        {
            $success = Alert::success('Success', 'Blog Deleted Successfully.');
            return Redirect()->back()->withsuccess('Blog Deleted Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Blog Not Delete.');
            return Redirect()->back()->witherror('Error! Blog Not Delete.');
        }
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $blogs = Blog::where('title', 'LIKE', '%' . $q . '%')
                                ->select('slug', 'title', 'status')
                                ->orderBy('created_at', 'DESC')
                                ->paginate(10)->setPath ( '' );
            $pagination = $blogs->appends(array('q' => Input::get('q')));
            if(count($blogs) > 0)
            return view('admin.blogs.blog_search')->withDetail($blogs)->withQuery($q);
        }
        return view('admin.blogs.blog_search')->withMessage("No Matching Blog Found!");
    }
}
