<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\OurTeam;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class OurTeamController extends Controller
{
    /*---------------------------admin controllers start------------------------*/

    public function insert(Request $request)
    {
		$request->validate([
            'name' => 'required | max:255',
            'designation' => 'required | max:255',
		]);
		
        $data = array();

        $data['name'] = $request->name;
        $data['designation'] = $request->designation;
        $data['info'] = $request->info;

        if($request->file('profile_pic'))   $files[] = $request->file('profile_pic');

        $filenames = [];
        foreach($files as $file)
        {
            if (!empty($file))
            {
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('storage/app/team_members_pic/', $filename);
                $filenames[] = $filename;
            }
        }

        $data['profile_pic'] = $filenames[0];

        $slug = SlugService::createSlug(OurTeam::class, 'slug', $request->name);
		$data['slug'] = $slug;
        
        if ($request->status == "")
        {
            $data['status'] = "inactive";
        }
        else
        {
            $data['status'] = "active";
        }
		
        $st = DB::table('our_teams')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Team Member Added Successfully.');
            return Redirect()->route('team.home')->withsuccess('Team Member Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Team Member Not Added.');
            return Redirect()->route('team.home')->witherror('Error! Team Member Not Added.');
        }
    }

    public function show()
    {
        $our_teams = DB::table("our_teams")->select('slug', 'designation', 'name', 'status')->paginate(5);
        return view("admin.our_teams.our_teams", ['our_teams'=>$our_teams]);
    }

    public function view($slug)
    {
        $viewone = OurTeam::where('slug', '=', $slug)->firstOrFail();
        return view("admin.our_teams.our_team_view", ['showone'=>$viewone]);
    }

    public function edit($slug)
    {
        $editone = OurTeam::where('slug', '=', $slug)->firstOrFail();
        return view("admin.our_teams.our_team_edit", ['edit'=>$editone]);
    }

    public function update(Request $request, $slug)
    {
		$request->validate([
            'name' => 'required | max:255',
            'designation' => 'required | max:255',
		]);
		
        $data = OurTeam::where('slug', '=', $slug)->firstOrFail();

        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->info = $request->info;

        if($request->hasFile('profile_pic')){
            $profile_pic = \Storage::delete('team_members_pic/'.$data['profile_pic']);

            $uniqueFileName = (uniqid() . $request->file('profile_pic')->getClientOriginalName());
            $request->file('profile_pic')->move('storage/app/team_members_pic/', $uniqueFileName);
            $data->profile_pic = $uniqueFileName;
        }

        $slug = SlugService::createSlug(OurTeam::class, 'slug', $request->name);
		$data->slug = $slug;
        
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
            $success = Alert::success('Success', 'Team Member Updated Successfully.');
            return Redirect()->route('team.home')->withsuccess('Team Member Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Team Member Not Update.');
            return Redirect()->route('team.home')->witherror('Error! Team Member Not Update.');
        }
    }

    public function delete(Request $request)
    {
        $slug = $request->slug;
        $file = OurTeam::where('slug', '=', $slug)->firstOrFail();
        $files = \Storage::delete('team_members_pic/'.$file['profile_pic']);
        $deleteone = OurTeam::where('slug', '=', $slug)->delete();

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
