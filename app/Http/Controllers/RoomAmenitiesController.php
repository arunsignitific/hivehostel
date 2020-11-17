<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\RoomAmenitie;
use DB;

use RealRashid\SweetAlert\Facades\Alert; 

class RoomAmenitiesController extends Controller
{
    /*---------------------------admin controllers start------------------------*/

    public function insert(Request $request)
    {
   
		$request->validate([
            'amenities_name' => 'required | max:255',
		]);

        $files = $request->file('amenities_icon');
         $file = '';
 
            if (!empty($files))
            {
            $filename = time() . '_'.rand(10,99).'_' . $files->getClientOriginalname();
            $files->move('storage/app/team_members_pic/', $filename);

           $file = $filename;
 
            }
    
        $data = array();

        $data['name'] = $request->amenities_name;
        $data['icon'] = $file;
		

            if ($request->status == "")
        {
            $data['status'] = "inactive";
        }
        else 
        {
            $data['status'] = "active";
        }

        $st = DB::table('room_amenities')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'SEO Tag Added Successfully.');
            return Redirect()->route('amenities.home')->withsuccess('SEO Tag Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! SEO Tag Not Added.');
            return Redirect()->route('amenities.home')->witherror('Error! SEO Tag Not Added.');
        }
    }

    public function show()
    {




        $amenities = DB::table("room_amenities")->select('id','name','status')->paginate(10);


        return view("admin.room_amenities.list", ['amenities'=>$amenities]);
    }
 
    public function view($id)
    { 
        $amenities = DB::table("room_amenities")->where('id','=',$id)->get();

        return view("admin.room_amenities.view", ['amenities'=>$amenities]);
    }

    public function edit($id)
    {

      $editone  =   RoomAmenitie::where('id', '=', $id)->firstOrFail();

        return view("admin.room_amenities.edit", ['edit'=>$editone]);
    } 
  
    public function update(Request $request, $id)
    {
	

        $data = RoomAmenitie::where('id', '=', $id)->firstOrFail();



     
 $files = $request->file('amenities_icon');

$file = '';
 
  if($request->hasFile('amenities_icon')){

            $filename = time() . '_'.rand(10,99).'_' . $files->getClientOriginalname();
            $files->move('storage/app/team_members_pic/', $filename);

             $file = $filename;
}else{

     $file = '';

     $file    =   $request->uploded_amenities_icon;

}

 
       $data->name      = $request->name;
       $data->icon      = $file;

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
            $success = Alert::success('Success', 'Amenities Updated Successfully.');
            return Redirect()->route('amenities.home')->withsuccess('Amenities Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Amenities Not Update.');
            return Redirect()->route('amenities.home')->witherror('Error! Amenities Not Update.');
        }
    }  

    public function delete(Request $request)
    {
    

           $id = $request->slug;
            $deleteone =  DB::table('room_amenities')->where('id', '=',  $id)->delete();

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
            $seo_tags =   DB::table('room_amenities')->where('name', 'LIKE', '%' . $q . '%')
                    ->select('id','name')
                    ->paginate(10)->setPath ( '' );

    
            $pagination = $seo_tags->appends(array('q' => Input::get('q')));
            if(count($seo_tags) > 0) 
            return view('admin.room_amenities.search')->withDetail($seo_tags)->withQuery($q);
        }
        return view('admin.room_amenities.search')->withMessage("No Matching SEO Tag Found!");
    }
}
