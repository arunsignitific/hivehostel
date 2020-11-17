<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\BlogAuthor;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BlogAuthorController extends Controller
{
    /*---------------------------admin controllers start------------------------*/

    public function insert(Request $request)
    {
		$request->validate([
            'name' => 'required | max:255',
		]);
		
        $data = array();

        $data['name'] = $request->name;
        
        if($request->file('img'))   $files[] = $request->file('img');

        $filenames = [];
        foreach($files as $file)
        {
            if (!empty($file))
            {
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('storage/app/blog_author_img/', $filename);
                $filenames[] = $filename;
            }
        }

        $data['img'] = $filenames[0];
        
        $q = Input::get('slug');
		if($q != ""){
			$data['slug'] = $q;
		}
		else{
			$slug = SlugService::createSlug(BlogAuthor::class, 'slug', $request->name);
            $data['slug'] = $slug;
		}
		
        $st = DB::table('blog_authors')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Blog Author Added Successfully.');
            return Redirect()->route('blogAuthor.home')->withsuccess('Blog Author Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Blog Author Not Added.');
            return Redirect()->route('blogAuthor.home')->witherror('Error! Blog Author Not Added.');
        }
    }

    public function show()
    {
        $blog_authors = DB::table("blog_authors")->select('slug', 'name')->paginate(5);
        return view("admin.blog_authors.blog_authors", ['blog_authors'=>$blog_authors]);
    }

    public function view($slug)
    {
        $viewone = BlogAuthor::where('slug', '=', $slug)->firstOrFail();
        return view("admin.blog_authors.blog_author_view", ['showone'=>$viewone]);
    }

    public function edit($slug)
    {
        $editone = BlogAuthor::where('slug', '=', $slug)->firstOrFail();
        return view("admin.blog_authors.blog_author_edit", ['edit'=>$editone]);
    }

    public function update(Request $request, $slug)
    {
		$request->validate([
		]);
		
        $data = BlogAuthor::where('slug', '=', $slug)->firstOrFail();

        $data->name = $request->name;

        if($request->hasFile('img')){
            $img = \Storage::delete('blog_author_img/'.$data['img']);

            $uniqueFileName = (uniqid() . $request->file('img')->getClientOriginalName());
            $request->file('img')->move('storage/app/blog_author_img/', $uniqueFileName);
            $data->img = $uniqueFileName;
        }
        
        $q = Input::get('slug');
		if($q != ""){
			$data->slug = $q;
		}
		else{
			$slug = SlugService::createSlug(BlogAuthor::class, 'slug', $request->name);
            $data->slug = $slug;
		}
		
        $data->save();

        if ($data->save())
        {
            $success = Alert::success('Success', 'Blog Author Updated Successfully.');
            return Redirect()->route('blogAuthor.home')->withsuccess('Blog Author Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Blog Author Not Update.');
            return Redirect()->route('blogAuthor.home')->witherror('Error! Blog Author Not Update.');
        }
    }

    public function delete(Request $request)
    {
        $slug = $request->slug;
        $deleteone = BlogAuthor::where('slug', '=', $slug)->delete();

        if ($deleteone)
        {
            $success = Alert::success('Success', 'Blog Author Deleted Successfully.');
            return Redirect()->back()->withsuccess('Blog Author Deleted Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Blog Author Not Delete.');
            return Redirect()->back()->witherror('Error! Blog Author Not Delete.');
        }
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $blog_authors = BlogAuthor::where('name', 'LIKE', '%' . $q . '%')
                                ->select('slug', 'name')
                                ->paginate(10)->setPath ( '' );
            $pagination = $blog_authors->appends(array('q' => Input::get('q')));
            if(count($blog_authors) > 0)
            return view('admin.blog_authors.blog_author_search')->withDetail($blog_authors)->withQuery($q);
        }
        return view('admin.blog_authors.blog_author_search')->withMessage("No Matching Blog Author Found!");
    }
}
