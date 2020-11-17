<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\Client;
use DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    /*---------------------------admin controllers start------------------------*/

    public function insert(Request $request)
    {
		$request->validate([
			'title' => 'required|max:191',
			'img' => 'required | mimes:jpeg,jpg,png,svg | max:2048',
		]);
		
        $data = array();
        $data['title']=$request->title;
		
		$slug = SlugService::createSlug(Client::class, 'slug', $request->title);
		$data['slug'] = $slug;

        $uniqueFileName = (time() . $request->file('img')->getClientOriginalName());
        $request->file('img')->move('storage/app/client_img/', $uniqueFileName);
        $data['img'] = $uniqueFileName;
        
        if ($request->status == "")
        {
            $data['status'] = "inactive";
        }
        else
        {
            $data['status'] = "active";
        }

        if ($request->top == "")
        {
            $data['top'] = "inactive";
        }
        else
        {
            $data['top'] = "active";
        }

        $st = DB::table('clients')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Client Image Added Successfully.');
            return Redirect()->route('client.home')->withsuccess('Client Image Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Client Image Not Added.');
            return Redirect()->route('client.home')->witherror('Error! Client Image Not Added.');
        }
    }

    public function show()
    {
        $clients = DB::table('clients')
                        ->select('title', 'id', 'slug', 'status', 'top')
                        ->paginate(5);
        return view("admin.clients.clients", ['clients'=>$clients]);
    }

    public function view($slug)
    {
        $viewone = Client::where('slug', '=', $slug)->firstOrFail();//->first();
        return view("admin.clients.client_view", ['showone'=>$viewone]);
    }

    public function edit($slug)
    {
        $editone = Client::where('slug', '=', $slug)->firstOrFail();//->first();
        return view("admin.clients.client_edit", ['edit'=>$editone]);
    }

    public function update(Request $request, $slug)
    {
		$request->validate([
			'title' => 'required|max:191',
			'img' => 'mimes:jpeg,jpg,png,svg | max:2048',
		]);
		
        $data = Client::where('slug', '=', $slug)->firstOrFail();
        $data->title=$request->title;
		
		$slug = SlugService::createSlug(Client::class, 'slug', $request->title);
		$data['slug'] = $slug;
		
        if ($request->hasFile('img'))
        { 
            $img = \Storage::delete('client_img/'.$data['img']);

            $uniqueFileName = (time() . $request->file('img')->getClientOriginalName());
            $request->file('img')->move('storage/app/client_img/', $uniqueFileName);
            $data['img'] = $uniqueFileName;
        } 
        
        if ($request->status == "")
        {
            $data->status = "inactive";
        }
        else
        {
            $data->status = "active";
        }

        if ($request->top == "")
        {
            $data->top = "inactive";
        }
        else
        {
            $data->top = "active";
        }

        $data->save();

        if ($data->save())
        {
            $success = Alert::success('Success', 'Client Image Updated Successfully.');
            return Redirect()->route('client.home')->withsuccess('Client Image Updated Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Client Image Not Update.');
            return Redirect()->route('client.home')->witherror('Error! Client Image Not Update.');
        }
    }

    public function delete(Request $request)
    {
        $slug = $request->slug;
        $file = Client::where('slug', '=', $slug)->firstOrFail();
        $files = \Storage::delete('client_img/'.$file['img']);
        $deleteone = Client::where('slug', '=', $slug)->delete();

        if ($files and $deleteone)
        {
            $success = Alert::success('Success', 'Client Image Deleted Successfully.');
            return Redirect()->back()->withsuccess('Client Image Deleted Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Client Image Not Delete.');
            return Redirect()->back()->witherror('Error! Client Image Not Delete.');
        }
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $clients = Client::where('title', 'LIKE', '%' . $q . '%')
                                ->select('title', 'id', 'slug', 'status', 'top')
                                ->paginate(5)->setPath ( '' );
            $pagination = $clients->appends(array('q' => Input::get('q')));
            if(count($clients) > 0)
            return view('admin.clients.client_search')->withDetail($clients)->withQuery($q);
        }
        return view('admin.clients.client_search')->withMessage("No Matching Client Image Found!");
    }
}
