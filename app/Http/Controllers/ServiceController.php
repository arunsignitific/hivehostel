<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\Service;
use DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    public function index($title, $slug)
    {
        $categories_menu = DB::table('categories')->select('id', 'slug', 'title')->get();
        $service_menu = DB::table('services')->select('category_id', 'slug', 'title')->get();
        $viewone = Service::where('slug', '=', $slug)->firstOrFail();
        $cat_title = DB::table('categories')->where('id', '=', $viewone->category_id)->select('slug', 'title')->first();
        return view("service_page", ['cat_title'=>$cat_title, 'categories_menu'=>$categories_menu, 'service_menu'=>$service_menu, 'showone'=>$viewone]);
    }
/*---------------------------admin controllers start------------------------*/

    public function insert(Request $request)
    {
		
		$request->validate([
			'title' => 'required | max:255',
			'meta_title' => 'nullable | max:255',
			'meta_description' => 'nullable | max:255',
			'h1' => 'nullable | max:255',
			'h2' => 'nullable | max:255',
			'banner_heading' => 'required',
		]);
		
		
        $data = array();
        $files = [];
        $data['title']=$request->title;
		$data['post']=$request->post;
        $data['meta_title']=$request->meta_title;
        $data['meta_description']=$request->meta_description;
        $data['h1']=$request->h1;
        $data['h2']=$request->h2;
        $data['banner_heading']=$request->banner_heading;
		
		$q = Input::get('slug');
		if($q != "")
		{
			$data['slug'] = $q;
		}
		else{
			$slug = SlugService::createSlug(Service::class, 'slug', $request->title);
			$data['slug'] = $slug;
		}

        if($request->file('header_img'))   $files[] = $request->file('header_img');

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

        $data['header_img'] = $filenames[0];

        $st = DB::table('services')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Service Added Successfully.');
            return Redirect()->route('service.home')->withsuccess('Service Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Service Not Added.');
            return Redirect()->route('service.home')->witherror('Error! Service Not Added.');
        }
    }

    public function show()
    {
        $services = DB::table('services')
                        ->select('slug', 'title', 'id')
                        ->paginate(5);
        return view("admin.services.services", ['services'=>$services]);
    }

    public function view($slug)
    {
        $viewone = Service::where('slug', '=', $slug)->firstOrFail();//->first();
        return view("admin.services.service_view", ['showone'=>$viewone]);
    }

    public function edit($slug)
    {
        $editone = Service::where('slug', '=', $slug)->firstOrFail();//->first();
        return view("admin.services.service_edit", ['edit'=>$editone]);
    }

    public function update(Request $request, $slug)
    {
		$request->validate([
			'title' => 'required | max:255',
			'meta_title' => 'nullable | max:255',
			'meta_description' => 'nullable | max:255',
			'h1' => 'nullable | max:255',
			'h2' => 'nullable | max:255',
			'banner_heading' => 'required',
		]);
		
        $data = Service::where('slug', '=', $slug)->firstOrFail();
        $data->title=$request->title;
        $data->post=$request->post;
		$data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        $data->h1=$request->h1;
        $data->h2=$request->h2;
        $data->banner_heading=$request->banner_heading;
		
		$q = Input::get('slug');
		if($q != "")
		{
			$data['slug'] = $q;
		}
		else{
			$slug = SlugService::createSlug(Service::class, 'slug', $request->title);
			$data['slug'] = $slug;
		}
		
        if($request->hasFile('header_img')){
            $header_img = \Storage::delete('service_pics/'.$data['header_img']);

            $uniqueFileName = (uniqid() . $request->file('header_img')->getClientOriginalName());
            $request->file('header_img')->move('storage/app/service_pics/', $uniqueFileName);
            $data['header_img'] = $uniqueFileName;
        }
        // if($request->hasFile('back_img')){
        //     $back_img = \Storage::delete('img/'.$data['back_img']);

        //     $uniqueFileName = (uniqid() . $request->file('back_img')->getClientOriginalName());
        //     $request->file('back_img')->move('storage/app/img/', $uniqueFileName);
        //     $data['back_img'] = $uniqueFileName;
        // }

        $data->save();

        if ($data->save())
        {
            $success = Alert::success('Success', 'Service Updated Successfully.');
            return Redirect()->route('service.home')->withsuccess('Service Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Service Not Update.');
            return Redirect()->route('service.home')->witherror('Error! Service Not Update.');
        }
    }

    public function delete(Request $request)
    {
        $slug = $request->slug;
        $file = Service::where('slug', '=', $slug)->firstOrFail();
        $files = \Storage::delete('service_pics/'.$file['header_img']);//, 'img/'.$file['back_img']);
        $deleteone = Service::where('slug', '=', $slug)->delete();

        if ($files and $deleteone)
        {
            $success = Alert::success('Success', 'Service Deleted Successfully.');
            return Redirect()->back()->withsuccess('Service Deleted Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Service Not Delete.');
            return Redirect()->back()->witherror('Error! Service Not Delete.');
        }
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $service = Service::where('title', 'LIKE', '%' . $q . '%')
                                ->orwhere('h1', 'LIKE', '%' . $q . '%')
                                ->select('slug', 'title', 'id')
                                ->paginate(5);
            if(count($service) > 0)
            return view('admin.services.service_search')->withDetail($service)->withQuery($q);
        }
        return view('admin.services.service_search')->withMessage("No Matching Services Found!");
    }
}
