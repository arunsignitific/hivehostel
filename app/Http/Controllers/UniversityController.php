<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\SeoTag;
use DB;

use RealRashid\SweetAlert\Facades\Alert; 

class UniversityController extends Controller
{
    /*---------------------------admin controllers start------------------------*/

    public function insert(Request $request)
    {

		$request->validate([
            'university_name' => 'required | max:255',
		]);

        $data = array();

        $data['name'] = $request->university_name;

            if ($request->status == "")
        {
            $data['status'] = "inactive";
        }
        else
        {
            $data['status'] = "active";
        }

        $st = DB::table('universities')->insert($data);

        if ($st) 
        {
            $success = Alert::success('Success', 'Universitiy Added Successfully.');
            return Redirect()->route('university.home')->withsuccess('Universitiy Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Universitiy Not Added.');
            return Redirect()->route('university.home')->witherror('Error! Universitiy Not Added.');
        }
    }

    public function show()
    {
        $amenities = DB::table("universities")->select('id','name','status')->paginate(20);


        return view("admin.universities.list", ['amenities'=>$amenities]);
    }
 
    public function view($id)
    {
        $amenities = DB::table("room_amenities")->where('id','=',$id)->get();

        return view("admin.room_amenities.view", ['amenities'=>$amenities]);
    }

    public function edit($id)
    {
        $editone = DB::table('universities')->where('id', '=', $id)->first();

        return view("admin.universities.edit", ['edit'=>$editone]);
    }
 
    public function update(Request $request, $id)
    {
		$request->validate([
            'university_name' => 'required | max:255',
        
		]);

      $data = DB::table('universities')->where('id', '=', $id)->first();

      
   if ($request->status == "")
        {
            $data->status = "inactive";
        }
        else
        {
            $data->status = "active";
        }
		  
  

if($request->university_name){

     $st =  DB::table('universities')->where('id','=',$id)->update(
            [
                 'name' => $request->university_name,
                 'status'=>$data->status,
            ]
       );

}else{
    
        $st =  DB::table('universities')->where('id','=',$id)->update(
            [
                 'name' => $data->name,
                 'status'=>$data['status'],
            ]
       );

}

 

        if ($st)
        {
            $success = Alert::success('Success', 'Universitiy Not Update.');
            return Redirect()->route('university.home')->withsuccess(  'Universitiy Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Universitiy Not Update.');
            return Redirect()->route('university.home')->witherror('Error! Universitiy Not Update.');
        }
    }

    public function delete(Request $request)
    {
    

           $id = $request->slug;

 
            $deleteone =  DB::table('universities')->where('id', '=',  $id)->delete();

        if ($deleteone)
        {
            $success = Alert::success('Success', 'university Deleted Successfully.');
            return Redirect()->back()->withsuccess('university Deleted Successfully.');
        }
        else 
        {
            $error =  Alert::error('Error!', 'Error! university Not Delete.');
            return Redirect()->back()->witherror('Error! university Not Delete.');
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

                    dd($seo_tags);
            $pagination = $seo_tags->appends(array('q' => Input::get('q')));
            if(count($seo_tags) > 0) 
            return view('admin.room_amenities.search')->withDetail($seo_tags)->withQuery($q);
        }
        return view('admin.room_amenities.search')->withMessage("No Matching SEO Tag Found!");
    }
}
