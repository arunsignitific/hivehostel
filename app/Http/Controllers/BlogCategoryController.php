<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\BlogCategory;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BlogCategoryController extends Controller
{
    /*---------------------------admin controllers start------------------------*/

    public function insert(Request $request)
    {
		$request->validate([
            'name' => 'required | max:255',
            'parent' => 'nullable | max:255',
            'h1' => 'nullable | max:255',
            'meta_title' => 'nullable | max:255',
            'meta_description' => 'nullable | max:255',
		]);
		
        $data = array();

        $data['name'] = $request->name;
        $data['parent'] = $request->parent;
        $data['h1'] = $request->h1;
        $data['meta_title'] = $request->meta_title;
        $data['meta_description'] = $request->meta_description;

        if($request->file('img'))   $files[] = $request->file('img');

        $filenames = [];
        foreach($files as $file)
        {
            if (!empty($file))
            {
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('storage/app/blog_cat_img/', $filename);
                $filenames[] = $filename;
            }
        }

        $data['img'] = $filenames[0];
        
        $q = Input::get('slug');
		if($q != ""){
			$data['slug'] = $q;
		}
		else{
			$slug = SlugService::createSlug(BlogCategory::class, 'slug', $request->name);
            $data['slug'] = $slug;
		}
		
        $st = DB::table('blog_categories')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Blog Category Added Successfully.');
            return Redirect()->route('blogCategory.home')->withsuccess('Blog Category Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Blog Category Not Added.');
            return Redirect()->route('blogCategory.home')->witherror('Error! Blog Category Not Added.');
        }
    }

    public function show()
    {
        $blog_categories = DB::table("blog_categories")->select('slug', 'name')->paginate(5);
        return view("admin.blog_categories.blog_categories", ['blog_categories'=>$blog_categories]);
    }

    public function view($slug)
    {
        $viewone = BlogCategory::where('slug', '=', $slug)->firstOrFail();
        return view("admin.blog_categories.blog_category_view", ['showone'=>$viewone]);
    }

    public function edit($slug)
    {
        $editone = BlogCategory::where('slug', '=', $slug)->firstOrFail();
        return view("admin.blog_categories.blog_category_edit", ['edit'=>$editone]);
    }

    public function update(Request $request, $slug)
    {
		$request->validate([
            'name' => 'required | max:255',
            'parent' => 'nullable | max:255',
            'h1' => 'nullable | max:255',
            'meta_title' => 'nullable | max:255',
            'meta_description' => 'nullable | max:255',
		]);
		
        $data = BlogCategory::where('slug', '=', $slug)->firstOrFail();

        $data->name = $request->name;
        $data->parent = $request->parent;
        $data->h1 = $request->h1;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;

        if($request->hasFile('img')){
            $img = \Storage::delete('blog_cat_img/'.$data['img']);

            $uniqueFileName = (uniqid() . $request->file('img')->getClientOriginalName());
            $request->file('img')->move('storage/app/blog_cat_img/', $uniqueFileName);
            $data->img = $uniqueFileName;
        }
        
        $q = Input::get('slug');
		if($q != ""){
			$data->slug = $q;
		}
		else{
			$slug = SlugService::createSlug(BlogCategory::class, 'slug', $request->name);
            $data->slug = $slug;
		}
		
        $data->save();

        if ($data->save())
        {
            $success = Alert::success('Success', 'Blog Category Updated Successfully.');
            return Redirect()->route('blogCategory.home')->withsuccess('Blog Category Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Blog Category Not Update.');
            return Redirect()->route('blogCategory.home')->witherror('Error! Blog Category Not Update.');
        }
    }

    public function delete(Request $request)
    {
        $slug = $request->slug;
        $deleteone = BlogCategory::where('slug', '=', $slug)->delete();

        if ($deleteone)
        {
            $success = Alert::success('Success', 'Blog Category Deleted Successfully.');
            return Redirect()->back()->withsuccess('Blog Category Deleted Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Blog Category Not Delete.');
            return Redirect()->back()->witherror('Error! Blog Category Not Delete.');
        }
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $blog_categories = BlogCategory::where('name', 'LIKE', '%' . $q . '%')
                                ->select('slug', 'name')
                                ->paginate(10)->setPath ( '' );
            $pagination = $blog_categories->appends(array('q' => Input::get('q')));
            if(count($blog_categories) > 0)
            return view('admin.blog_categories.blog_category_search')->withDetail($blog_categories)->withQuery($q);
        }
        return view('admin.blog_categories.blog_category_search')->withMessage("No Matching Blog Category Found!");
    }
}
