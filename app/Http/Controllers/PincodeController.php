<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\SeoTag;
use DB;

use RealRashid\SweetAlert\Facades\Alert; 

class PincodeController extends Controller
{
    /*---------------------------admin controllers start------------------------*/

    public function insert(Request $request)
    {

		$request->validate([
            'pincode_name' => 'required | max:255',
		]);

        $data = array();

    
        $data['name'] = $request->pincode_name;

            if ($request->status == "")
        {
            $data['status'] = "inactive";
        }
        else
        {
            $data['status'] = "active";
        }

        $st = DB::table('pincodes')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Area Added Successfully.');
            return Redirect()->route('pincode.home')->withsuccess('Area Added Successfully.');
        }
        else
        { 
            $error =  Alert::error('Error!', 'Error! Area Not Added.');
            return Redirect()->route('pincode.home')->witherror('Error! Area Not Added.');
        }
    } 

    public function show()
    {
        $amenities = DB::table("pincodes")->select('id','name','status')->paginate(20);


        return view("admin.pincodes.list", ['amenities'=>$amenities]);
    }
 
    public function view($id)
    {
        $amenities = DB::table("pincodes")->where('id','=',$id)->get();

        return view("admin.pincodes.view", ['amenities'=>$amenities]);
    }

    public function edit($id)
    {

        $editone = DB::table('pincodes')->where('id', '=', $id)->first();
        return view("admin.pincodes.edit", ['edit'=>$editone]);
    }

    public function update(Request $request, $id)
    {
		$request->validate([
            'pincode_name' => 'required | max:255',
        
		]); 
		
        $data = DB::table('pincodes')->where('id', '=', $id)->first();

      
   if ($request->status == "")
        {
            $data->status = "inactive";
        }
        else
        {
            $data->status = "active";
        }
          
  
  
if($request->pincode_name){ 

     $st =  DB::table('pincodes')->where('id','=',$id)->update(
            [
                 'name' => $request->pincode_name,
                 'status'=>$data->status,
            ]
       );

}else{
    
        $st =  DB::table('pincodes')->where('id','=',$id)->update(
            [
                 'name' => $data->name,
                 'status'=>$data['status'],
            ]
       );

}


        if ($st)
        {
            $success = Alert::success('Success', 'Pincode Updated Successfully.');
            return Redirect()->route('pincode.home')->withsuccess('Pincode Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Pincode Not Update.');
            return Redirect()->route('pincode.home')->witherror('Error! Pincode Not Update.');
        }
    }

    public function delete(Request $request)
    {
    

           $id = $request->slug;
            $deleteone =  DB::table('pincodes')->where('id', '=',  $id)->delete();

        if ($deleteone)
        {
            $success = Alert::success('Success', 'Pincode Deleted Successfully.');
            return Redirect()->back()->withsuccess('Pincode Deleted Successfully.');
        }
        else   
        {
            $error =  Alert::error('Error!', 'Error! Pincode Not Delete.');
            return Redirect()->back()->witherror('Error! Pincode Not Delete.');
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
