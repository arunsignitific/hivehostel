<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\BlogComment;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class BlogCommentController extends Controller
{
    /*---------------------------admin controllers start------------------------*/

    public function insert(Request $request)
    {
		$request->validate([
            'comment_name' => 'required | max:255',
            'comment_email' => 'required | email',
            'comment' => 'required',
		]);
		
        $data = array();

        $data['comment_name'] = $request->comment_name;
        $data['comment_email'] = $request->comment_email;
        $data['comment'] = $request->comment;
        $data['parent_id'] = !empty($request->parent_id)?$request->parent_id:NULL;
        $data['status'] = 'active';
        $data['blog_id'] = $request->blog_id;
        
        $st = DB::table('blog_comments')->insert($data);

        if ($st)
        {
            $success = Alert::success('Success', 'Blog Comment Added Successfully.');
            return Redirect()->back()->withsuccess('Blog Comment Added Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Blog Comment Not Added.');
            return Redirect()->back()->witherror('Error! Blog Comment Not Added.');
        }
    }

    public function update(Request $request)
    {
		$request->validate([
            'status' => 'required',
        ]);

        $id = $request->id;
		
        $data = BlogComment::where('id', '=', $id)->firstOrFail();

        $data->status = $request->status;
        $data->save();

        // if ($data->save())
        // {
        //     $success = Alert::success('Success', 'Blog Comment Updated Successfully.');
        //     return Redirect()->route('blog.home')->withsuccess('Blog Comment Updated Successfully.');
        // }
        // else
        // {
        //     $error =  Alert::error('Error!', 'Error! Blog Comment Not Update.');
        //     return Redirect()->route('blog.home')->witherror('Error! Blog Comment Not Update.');
        // }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $deleteone = BlogComment::where('id', '=', $id)->delete();

        if ($deleteone)
        {
            $success = Alert::success('Success', 'Blog Comment Deleted Successfully.');
            return Redirect()->back()->withsuccess('Blog Comment Deleted Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Blog Comment Not Delete.');
            return Redirect()->back()->witherror('Error! Blog Comment Not Delete.');
        }
    }
}
