<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\Hostel; 
use DB;
use Image;
use RealRashid\SweetAlert\Facades\Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class HostelsController extends Controller
{
    /*---------------------------admin controllers start------------------------*/

   public function add(Request $request)
    {

$amenities = DB::table('room_amenities')->get();
$areas = DB::table('areas')->get();
$universities = DB::table('universities')->get();
$pincodes = DB::table('pincodes')->get();

  return view('admin.hostels.add_hostels', 

        [
            'amenitie'=> $amenities,
            'areas'=> $areas,
            'university'=> $universities,
            'pincodes'=> $pincodes
        ],
      

    );

    }

    public function insert(Request $request)
    {


		$request->validate([
            'name' => 'required',
            'hostel_area' => 'required',
            'image_profile' => 'required',
            'image_gallery' => 'required',
            'about_hostel' => 'required',
            'hostel_for' => 'required',
            'near_by_amenites' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'single' => 'required',
            'dubble' => 'required',
            'triple' => 'required',
            'pincode' => 'required',
            'tags'    => 'required',

		]);
  
            $files = $request->file('image_gallery');
            $filenames = [];
            foreach($files as $file)
            {
            if (!empty($file))
            {
            $filename = time() . '_'.rand(10,99).'_' . $file->getClientOriginalname();
            $destinationPath = 'storage/app/hostel-gallery/';
            $new_img = Image::make($file)->resize(300, 300 ,
            function ($constraint) {
            $constraint->aspectRatio();
            }
            );
            // save file with medium quality
            $new_img->save($destinationPath.$filename, 80);
            $filenames[] = $filename;
            }
            }



 $file_profile = $request->file('image_profile');

      if (!empty($file_profile))
            {
            $fileProfile = time() . '_'.rand(10,99).'_' .$file_profile->getClientOriginalname();
            $destinationPath = 'storage/app/hostel-gallery/';
            $new_img = Image::make($file_profile)->resize(600, 450 ,
            function ($constraint) {
            $constraint->aspectRatio();
            }
            );
            // save file with medium quality
            $new_img->save($destinationPath.$fileProfile, 80);
        
            }      
 
$tags_university = implode(',', $request->tags_university);
$tags_area = implode(',', $request->tags_area);
$tags_pincode = implode(',', $request->tags_pincode);

    $data = array();
 
       $data["name"]             = $request->name;
       $data["hostel_area"]       = $request->hostel_area;
       $data["hostel_for"]       = $request->hostel_for;
       $data["about_hostel"]     = $request->about_hostel;
       $data["near_by_amenites"] = $request->near_by_amenites;
       $data["address"]          = $request->address;
       $data["city"]             = $request->city;
       $data["state"]            = $request->state;
       $data["pincode"]          = $request->pincode;
       $data["location"]         =   $request->location;
       $data["no_of_room"]       = $request->no_of_room;
       $data["no_of_beds"]       = $request->no_of_beds;
       $data["single"]              = $request->single;
       $data["dubble"]              = $request->dubble;
       $data["triple"]              = $request->triple;
       $data["quardruple"]          = $request->quardruple;
       $data["hostel_amenities"]    = json_encode($request->tags);
       $data["image_gallery"]       = json_encode($filenames);
       $data["image_profile"]       = $fileProfile;
       $data["tags_university"]    = $tags_university;
       $data["tags_area"]          = $tags_area;
       $data["tags_pincode"]       = $tags_pincode;

    /*    $slug = SlugService::createSlug(OurTeam::class, 'slug', $request->name);
		$data['slug'] = $slug;*/
        
        if ($request->status == "")
        {
            $data['status'] = "inactive";
        }
        else
        {
            $data['status'] = "active";
        }
		
        $st = DB::table('hostels')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Team Member Added Successfully.');
            return Redirect()->route('hostels.home')->withsuccess('Team Member Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Team Member Not Added.');
            return Redirect()->route('hostels.home')->witherror('Error! Team Member Not Added.');
        }
    } 

    public function show()
    {


        $our_teams = DB::table("hostels")->select('id','name', 'hostel_for','status')->paginate(10);

        return view("admin.hostels.hostels", ['our_teams'=>$our_teams]);
    }
 
    public function view($slug)
    {
 

$hostels_info = DB::table("hostels")
->where('id','=',$slug)->get();


        return view("admin/hostels/hostels_view" ,
            ['hostels_info'=>$hostels_info]
    );
    }

    public function edit($slug)
    {

$amenities = DB::table('room_amenities')->get();
$areas = DB::table('areas')->get();
$universities = DB::table('universities')->get();
$pincodes = DB::table('pincodes')->get();
$editone = DB::table('hostels')->where('id', '=', $slug)->first();


        return view("admin.hostels.hostels_edit", 
            [

                'edit'=>$editone,
                'amenitie'=> $amenities,
                'areas'=> $areas,
                'university'=> $universities,
                'pincodes'=> $pincodes

            ]

        );
    }

    public function update(Request $request, $slug)
    {
  
     

$data = Hostel::where('id', '=', $slug)->firstOrFail();
    
    
 $filenames = '';
        if($request->hasFile('image_gallery')){

        $ifilenames=array();

         $files = $request->file('image_gallery');
           
            foreach($files as $file)
            {
            $filename = time() . '_'.rand(10,99).'_' . $file->getClientOriginalname();
            $destinationPath = 'storage/app/hostel-gallery/';
            $new_img = Image::make($file)->resize(300, 300 ,
            function ($constraint) {
            $constraint->aspectRatio();
            }
            );
            // save file with medium quality
            $new_img->save($destinationPath.$filename, 80);
            $ifilenames[] = $filename;
          
            }

        $filenames = json_encode($ifilenames);
        }else{ 
  $filenames = $request->uploded_image_gallery;
        }


  $file_profile = $request->file('image_profile');
     $fileProfile = '' ;
  if($request->hasFile('image_profile')){
     
            $fileProfile = time() . '_'.rand(10,99).'_' .$file_profile->getClientOriginalname();
            $destinationPath = 'storage/app/hostel-gallery/';
            $new_img = Image::make($file_profile)->resize(600, 450 ,
            function ($constraint) {
            $constraint->aspectRatio();
            }
            );
            // save file with medium quality
            $new_img->save($destinationPath.$fileProfile, 80);
        
          $fileProfile =  $fileProfile;
}else{

  $fileProfile    =   $request->uploded_image_profile;

}


$tags_university = implode(',', $request->tags_university);
$tags_area = implode(',', $request->tags_area);
$tags_pincode = implode(',', $request->tags_pincode);


       $data->name             = $request->name;
       $data->hostel_area      = $request->hostel_area;
       $data->hostel_for       = $request->hostel_for;
       $data->about_hostel     = $request->about_hostel;
       $data->near_by_amenites = $request->near_by_amenites;
       $data->address          = $request->address;
       $data->city             = $request->city;
       $data->state            = $request->state;
       $data->pincode          = $request->pincode;
       $data->location         =   $request->location;
       $data->no_of_room       = $request->no_of_room;
       $data->no_of_beds       = $request->no_of_beds;
       $data->single              = $request->single;
       $data->dubble              = $request->dubble;
       $data->triple              = $request->triple;
       $data->quardruple          = $request->quardruple;
       $data->hostel_amenities    = json_encode($request->tags);
       $data->image_gallery       = $filenames;
       $data->image_profile       = $fileProfile;
       $data->tags_university    = $tags_university;
       $data->tags_area          = $tags_area;
       $data->tags_pincode       = $tags_pincode;


        
        if ($request->status == "")
        {
            $data->status = "inactive";
        }
        else
        {
            $data->status = "active";
        }


   $save = $data->save();

        if ($save)
        {
            $success = Alert::success('Success', 'Hostel Updated Successfully.');
            return Redirect()->route('hostels.home')->withsuccess('Hostel Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Hostel Not Update.');
            return Redirect()->route('hostels.home')->witherror('Error! Hostel Not Update.');
        }




    }

    public function delete(Request $request)
    {


            $id = $request->slug;
            $deleteone =  DB::table('hostels')->where('id', '=',  $id)->delete();

        if ($deleteone)
        {
            $success = Alert::success('Success', 'Team Member Deleted Successfully.');
            return Redirect()->back()->withsuccess('Team Member Deleted Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Team Member Not Delete.');
            return Redirect()->back()->witherror('Error! Team Member Not Delete.');
        }
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $our_teams = OurTeam::where('name', 'LIKE', '%' . $q . '%')
                                ->orwhere('designation', 'LIKE', '%' . $q . '%')
                                ->select('slug', 'designation', 'name', 'status')
                                ->paginate(10)->setPath ( '' );
            $pagination = $our_teams->appends(array('q' => Input::get('q')));
            if(count($our_teams) > 0)
            return view('admin.our_teams.our_team_search')->withDetail($our_teams)->withQuery($q);
        }
        return view('admin.our_teams.our_team_search')->withMessage("No Matching Team Member Found!");
    }
}
