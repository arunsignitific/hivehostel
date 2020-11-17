<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\Testimonial;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class TestimonialController extends Controller
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
                $file->move('storage/app/testimonial_members_pic/', $filename);
                $filenames[] = $filename;
            }
        }

        $data['profile_pic'] = $filenames[0];

        $slug = SlugService::createSlug(Testimonial::class, 'slug', $request->name);
		$data['slug'] = $slug;
		
        $st = DB::table('testimonials')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Testimonial  Added Successfully.');
            return Redirect()->route('testimonial.home')->withsuccess('Testimonial  Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Testimonial  Not Added.');
            return Redirect()->route('testimonial.home')->witherror('Error! Testimonial  Not Added.');
        }
    }

    public function show()
    {
        $testimonials = DB::table("testimonials")->select('slug', 'designation', 'name')->paginate(5);
        return view("admin.testimonials.testimonials", ['testimonials'=>$testimonials]);
    }

    public function view($slug)
    {
        $viewone = Testimonial::where('slug', '=', $slug)->firstOrFail();
        return view("admin.testimonials.testimonial_view", ['showone'=>$viewone]);
    }

    public function edit($slug)
    {
        $editone = Testimonial::where('slug', '=', $slug)->firstOrFail();
        return view("admin.testimonials.testimonial_edit", ['edit'=>$editone]);
    }

    public function update(Request $request, $slug)
    {
		$request->validate([
            'name' => 'required | max:255',
            'designation' => 'required | max:255',
		]);
		
        $data = Testimonial::where('slug', '=', $slug)->firstOrFail();

        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->info = $request->info;

        if($request->hasFile('profile_pic')){
            $profile_pic = \Storage::delete('testimonial_members_pic/'.$data['profile_pic']);

            $uniqueFileName = (uniqid() . $request->file('profile_pic')->getClientOriginalName());
            $request->file('profile_pic')->move('storage/app/testimonial_members_pic/', $uniqueFileName);
            $data->profile_pic = $uniqueFileName;
        }

        $slug = SlugService::createSlug(Testimonial::class, 'slug', $request->name);
		$data->slug = $slug;
		
        $data->save();

        if ($data->save())
        {
            $success = Alert::success('Success', 'Testimonial  Updated Successfully.');
            return Redirect()->route('testimonial.home')->withsuccess('Testimonial  Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Testimonial  Not Update.');
            return Redirect()->route('testimonial.home')->witherror('Error! Testimonial  Not Update.');
        }
    }

    public function delete(Request $request)
    {
        $slug = $request->slug;
        $file = Testimonial::where('slug', '=', $slug)->firstOrFail();
        $files = \Storage::delete('testimonial_members_pic/'.$file['profile_pic']);
        $deleteone = Testimonial::where('slug', '=', $slug)->delete();

        if ($deleteone)
        {
            $success = Alert::success('Success', 'Testimonial  Deleted Successfully.');
            return Redirect()->back()->withsuccess('Testimonial  Deleted Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Testimonial  Not Delete.');
            return Redirect()->back()->witherror('Error! Testimonial  Not Delete.');
        }
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $testimonials = Testimonial::where('name', 'LIKE', '%' . $q . '%')
                                ->orwhere('designation', 'LIKE', '%' . $q . '%')
                                ->select('slug', 'designation', 'name')
                                ->paginate(10)->setPath ( '' );
            $pagination = $testimonials->appends(array('q' => Input::get('q')));
            if(count($testimonials) > 0)
            return view('admin.testimonials.testimonial_search')->withDetail($testimonials)->withQuery($q);
        }
        return view('admin.testimonials.testimonial_search')->withMessage("No Matching Testimonial Found!");
    }
}
