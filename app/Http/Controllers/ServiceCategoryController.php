<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\Service;
use DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceCategoryController extends Controller
{
    

    public function show_category(){

        $services = DB::table('services')
                        ->select('slug', 'title', 'id')
                        ->paginate(5);
        return view("admin.services_category.services_category", ['services'=>$services]);
    }


    public function addCategory(){

      return view("admin.services_category.add_service");

    }


  public function insertCategory(Request $request){


  		$request->validate([
			'title' => 'required | max:255',
		]);
		
		
        $data = array();
        $files = [];
        $data['catagory_name']=$request->title;



        if($request->file('catagory_image'))   {

        $files[] = $request->file('catagory_image');

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
     $data['catagory_image'] = $filenames[0];
}

        $st = DB::table('services_catagory')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Service Added Successfully.');
            return Redirect()->route('category.add')->withsuccess('Service Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Service Not Added.');
            return Redirect()->route('category.add')->witherror('Error! Service Not Added.');
        }
  }



}  
   