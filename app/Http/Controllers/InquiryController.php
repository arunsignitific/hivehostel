<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Mail\SendContactMail;
use DB;

class InquiryController extends Controller
{
    public function sendcontactmail(Request $request)
    {

     
        $this->validate($request,[
            'name'    => 'required|max:75',
            'phone'  => 'required|max:15',
            'email'   => 'required|email',
            'message'   => 'required',
        ]);

        $data = array(
            'name'          => $request['name'],
            'phone'        => $request['phone'],
            'email'         => $request['email'],
            'city'         => $request['city'],
            'message'       => $request['message'],
        );

        //Mail::to('')->send(new SendContactMail($data));

        $datas = array();
        $datas['name']=$request->name;
        $datas['phone']=$request->phone;
        $datas['email']=$request->email;
        $datas['city']=$request->city;
        $datas['message']=$request->message;
        $datas['subject']="New Enquiry | The Hive Hostels";
		
        $st = DB::table('inquiries')->insert($datas);

        if(count(Mail::failures()) > 0)
        {
            $error =  Alert::error('error', 'Error! Please Try Later.');
            return Redirect()->back()->witherror('Error! Please Try Later.');
        }
        else
        {



            $success = Alert::success('success', 'Thank you for your Enquiry. We will get in touch with you shortly');
            return Redirect()->back()->withsuccess('Thank you for your Enquiry. We will get in touch with you shortly');
        }   
    }
    /*---------------------------admin controllers start------------------------*/

    public function show()
    {
        $inquiries = DB::table('inquiries')
                        ->select('name', 'id', 'email', 'phone')
                        ->paginate(5);
        return view("admin.inquiries.inquiries", ['inquiries'=>$inquiries]);
    }

    public function view($id)
    {
        $viewone = DB::table('inquiries')->where('id', '=', $id)->first();
        return view("admin.inquiries.inquiry_view", ['showone'=>$viewone]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $deleteone = DB::table('inquiries')->where('id', '=', $id)->delete();

        if ($deleteone)
        {
            $success = Alert::success('Success', 'Mail Deleted Successfully.');
            return Redirect()->back()->withsuccess('Mail Deleted Successfully.');
        }
        else
        {
            $error =  Alert::error('Error!', 'Error! Mail Not Delete.');
            return Redirect()->back()->witherror('Error! Mail Not Delete.');
        }
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $inquiries = DB::table('inquiries')->where('name', 'LIKE', '%' . $q . '%')
                                        ->orwhere('email', 'LIKE', '%' . $q . '%')
                                        ->orwhere('phone', 'LIKE', '%' . $q . '%')
                                ->select('name', 'id', 'email', 'phone')
                                ->paginate(5)->setPath ( '' );
            $pagination = $inquiries->appends(array('q' => Input::get('q')));
            if(count($inquiries) > 0)
            return view('admin.inquiries.inquiry_search')->withDetail($inquiries)->withQuery($q);
        }
        return view('admin.inquiries.inquiry_search')->withMessage("No Matching Inquiry Found!");
    }
}
