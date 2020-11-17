<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\SeoTag;
use DB;
use RealRashid\SweetAlert\Facades\Alert; 

class AreaController extends Controller
{
    /*---------------------------admin controllers start------------------------*/

    public function insert(Request $request)
    {

		$request->validate([
            'area_name' => 'required | max:255',
		]);  

        $data = array(); 

        $data['name'] = $request->area_name;

            if ($request->status == "")
        {
            $data['status'] = "inactive";
        }
        else
        {
            $data['status'] = "active";
        }

        $st = DB::table('areas')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Area Added Successfully.');
            return Redirect()->route('area.home')->withsuccess('Area Added Successfully.');
        }
        else  
        {
            $error =  Alert::error('Error!', 'Error! Area Not Added.');
            return Redirect()->route('area.home')->witherror('Error! Area Not Added.');
        }
    }

    public function show()
    {
        $amenities = DB::table("areas")->select('id','name','status')->paginate(10);


        return view("admin.areas.list", ['amenities'=>$amenities]);
    }
 
    public function view($id)
    {
        $amenities = DB::table("room_amenities")->where('id','=',$id)->get();

        return view("admin.room_amenities.view", ['amenities'=>$amenities]);
    }

    public function edit($id)
    {
        $editone = DB::table('areas')->where('id', '=', $id)->first();
        return view("admin.areas.edit", ['edit'=>$editone]);
    }

    public function update(Request $request, $id) 
    {
		$request->validate([
            'area_name' => 'required | max:255',

		]);
		
        $data = DB::table('areas')->where('id', '=', $id)->first();
      
   if ($request->status == "")
        {
            $data->status = "inactive";
        }
        else
        {
            $data->status = "active";
        }
          
  
  
if($request->area_name){ 

     $st =  DB::table('areas')->where('id','=',$id)->update(
            [
                 'name' => $request->area_name,
                 'status'=>$data->status,
            ]
       );

}else{
    
        $st =  DB::table('areas')->where('id','=',$id)->update(
            [
                 'name' => $data->name,
                 'status'=>$data->status,
            ]
       );

} 

        if ($st)
        {
            $success = Alert::success('Success', 'Area Updated Successfully.');
            return Redirect()->route('area.home')->withsuccess('Area Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Area Not Update.');
            return Redirect()->route('area.home')->witherror('Error! Area Not Update.');
        }
    }

    public function delete(Request $request)
    {

           $id = $request->slug;

            $deleteone =  DB::table('areas')->where('id', '=',  $id)->delete();

        if ($deleteone)
        {
            $success = Alert::success('Success', 'Area Deleted Successfully.');
            return Redirect()->back()->withsuccess('Area Deleted Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Area Not Delete.');
            return Redirect()->back()->witherror('Error! Area Not Delete.');
        }
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "") 
        {
            $seo_tags =   DB::table('areas')->where('name', 'LIKE', '%' . $q . '%')
                    ->select('id','name')
                    ->paginate(10)->setPath ( '' );

            $pagination = $seo_tags->appends(array('q' => Input::get('q')));
            if(count($seo_tags) > 0) 
            return view('admin.areas.search')->withDetail($seo_tags)->withQuery($q);
        }
        return view('admin.areas.search')->withMessage("No Matching SEO Tag Found!");
    }
}
