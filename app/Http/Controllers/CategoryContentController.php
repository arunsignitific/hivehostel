<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\Service;
use DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryContentController extends Controller
{
    

    public function show_category(){

        $services = DB::table('services')
                        ->select('slug', 'title', 'id')
                        ->paginate(5);
        return view("admin.services_category.services_category", ['services'=>$services]);
    }


    public function addCategoryContent(){
       $services_catagory = DB::table('services_catagory')->select('catagory_name', 'id')->get();

      return view("admin.category_contents.add_content",
        [
            'services_catagory'=>$services_catagory 
        ]); 

    }


  public function insertCategoryContent(Request $request){

  		$request->validate([ 

            'category_id' => 'required | max:255',
			'title' => 'required | max:255',
            'icon' => 'required | max:255'

		]);
		
		
        $data = array();
        $files = [];

        $data['service_category_id']=$request->category_id;
        $data['category_content_item']=$request->title;
        $data['category_icon']=$request->icon;
        $data['category_content']=$request->category_content;



        if($request->file('catagory_content_image'))   {

        $files[] = $request->file('catagory_content_image');

        $filenames = [];
        foreach($files as $file)
        {
            if (!empty($file))
            {
                $filename = time(). '.' . $file->getClientOriginalExtension();
                $file->move('storage/app/service_pics/', $filename);
                $filenames[] = $filename;
            }
        }
     $data['catagory_content_image'] = $filenames[0];
}

        $st = DB::table('category_content')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Service Added Successfully.');
            return Redirect()->route('categoryContent.add')->withsuccess('Service Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Service Not Added.');
            return Redirect()->route('categoryContent.add
                ')->witherror('Error! Service Not Added.');
        }
  }



}  
   