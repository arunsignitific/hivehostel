<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\SeoTag;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class SeoTagController extends Controller
{
    /*---------------------------admin controllers start------------------------*/

    public function insert(Request $request)
    {
		$request->validate([
            'page_name' => 'required | max:255',
            'h1' => 'nullable | max:255',
            'meta_title' => 'nullable | max:255',
            'meta_description' => 'nullable | max:501',
		]);
		
        $data = array();

        $data['page_name'] = $request->page_name;
        $data['h1'] = $request->h1;
        $data['meta_title'] = $request->meta_title;
        $data['meta_description'] = $request->meta_description;
		
        $st = DB::table('seo_tags')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'SEO Tag Added Successfully.');
            return Redirect()->route('seo.home')->withsuccess('SEO Tag Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! SEO Tag Not Added.');
            return Redirect()->route('seo.home')->witherror('Error! SEO Tag Not Added.');
        }
    }

    public function show()
    {
        $seo_tags = DB::table("seo_tags")->select('id', 'page_name')->paginate(5);
        return view("admin.seo_tags.seo_tags", ['seo_tags'=>$seo_tags]);
    }

    public function view($id)
    {
        $viewone = SeoTag::where('id', '=', $id)->firstOrFail();
        return view("admin.seo_tags.seo_tag_view", ['showone'=>$viewone]);
    }

    public function edit($id)
    {
        $editone = SeoTag::where('id', '=', $id)->firstOrFail();
        return view("admin.seo_tags.seo_tag_edit", ['edit'=>$editone]);
    }

    public function update(Request $request, $id)
    {
		$request->validate([
            'page_name' => 'required | max:255',
            'h1' => 'nullable | max:255',
            'meta_title' => 'nullable | max:255',
            'meta_description' => 'nullable | max:501',
		]);
		
        $data = SeoTag::where('id', '=', $id)->firstOrFail();

        $data->page_name = $request->page_name;
        $data->h1 = $request->h1;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
		
        $data->save();

        if ($data->save())
        {
            $success = Alert::success('Success', 'SEO Tag Updated Successfully.');
            return Redirect()->route('seo.home')->withsuccess('SEO Tag Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! SEO Tag Not Update.');
            return Redirect()->route('seo.home')->witherror('Error! SEO Tag Not Update.');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $deleteone = SeoTag::where('id', '=', $id)->delete();

        if ($deleteone)
        {
            $success = Alert::success('Success', 'SEO Tag Deleted Successfully.');
            return Redirect()->back()->withsuccess('SEO Tag Deleted Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! SEO Tag Not Delete.');
            return Redirect()->back()->witherror('Error! SEO Tag Not Delete.');
        }
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $seo_tags = SeoTag::where('page_name', 'LIKE', '%' . $q . '%')
                                ->select('id', 'page_name')
                                ->paginate(10)->setPath ( '' );
            $pagination = $seo_tags->appends(array('q' => Input::get('q')));
            if(count($seo_tags) > 0)
            return view('admin.seo_tags.seo_tag_search')->withDetail($seo_tags)->withQuery($q);
        }
        return view('admin.seo_tags.seo_tag_search')->withMessage("No Matching SEO Tag Found!");
    }
}
