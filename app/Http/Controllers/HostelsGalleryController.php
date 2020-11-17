<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\Gallery;
use DB;
use Image;
use RealRashid\SweetAlert\Facades\Alert; 

class HostelsGalleryController extends Controller
{ 
    /*---------------------------admin controllers start------------------------*/




public function add(Request $request)
    {

  $hostels = DB::table("hostels")->select('id', 'name')->get();

 
 return view('admin.hostel_gallery.add',
    ['hostel'=>$hostels]
);
 
        }



public function insert(Request $request)
    {

$files = $request->file('gallery_image');

$filenames = [];
if(!empty($files)){



foreach($files as $file){

 $filename = time().'_'.rand(10,99).'_'.$file->getClientOriginalname(); 

$destinationPath = 'storage/app/hostel-gallery/';
$new_img = Image::make($file)->resize(400, 300 ,

function ($constraint) {
    $constraint->aspectRatio();
}
);

// save file with medium quality
$new_img->save($destinationPath.$filename, 80);

$filenames[] =  $filename;

        }

}


		$request->validate([
            'image_name' => 'required | max:255',
           
		]);

        $data = array();

        $data['name'] = $request->image_name;
        $data['images'] = json_encode($filenames);
        $data['hostel_id'] = $request->hostel_id;

            if ($request->status == "")
        {
            $data['status'] = "inactive";
        }
        else
        {
            $data['status'] = "active";
        }

        $st = DB::table('galleries')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'SEO Tag Added Successfully.');
            return Redirect()->route('gallery.home')->withsuccess('SEO Tag Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! SEO Tag Not Added.');
            return Redirect()->route('gallery.home')->witherror('Error! SEO Tag Not Added.');
        }
    }

    public function show()
    {
        $gallery = DB::table("galleries")->select('id', 'name','status')->paginate(5);
        return view("admin.hostel_gallery.list", ['gallery'=>$gallery]);
    }
 
    public function view($id)
    {
 
      $gallery = DB::table("galleries")->where('id', $id)->get();


        return view("admin.hostel_gallery.view", ['gallery'=>$gallery]);
    }
 
    public function edit($id)
    {

        $editone = Gallery::where('id', '=', $id)->firstOrFail(); 

        return view("admin.hostel_gallery.edit", ['edit'=>$editone]);
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
         $id = $request->slug;
         $deleteone =  DB::table('galleries')->where('id', '=',  $id)->delete();

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
            $seo_tags = DB::table('galleries')->where('name', 'LIKE', '%' . $q . '%')
                                ->select('id', 'name')
                                ->paginate(10)->setPath ( '' );
            $pagination = $seo_tags->appends(array('q' => Input::get('q')));
            if(count($seo_tags) > 0)
            return view('admin.hostel_gallery.search')->withDetail($seo_tags)->withQuery($q);
        }
        return view('admin.hostel_gallery.search')->withMessage("No Matching SEO Tag Found!");
    }
}
