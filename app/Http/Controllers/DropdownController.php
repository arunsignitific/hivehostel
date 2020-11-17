<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DropdownController extends Controller
{
    public function passwordedit($id) {
        $user = User::findOrFail($id); //Get user with specified id
        return view('auth.changepassword', compact('user')); //pass user data to view
    }

    public function changepassword(Request $request, $id) {
        $user = User::findOrFail($id); //Get role specified by id

    //Validate name, password fields    
        $this->validate($request, [
            'old_password' => 'required',
            'password'=>'required|min:6|confirmed|different:old_password'
        ]);
        if (\Hash::check($request->get('old_password'), Auth::user()->password)) {

        $user->password = \Hash::make($request->password); //Retreive the name, password fields

        $user->save();

            if ($user)
            {
                $success = Alert::success('Success', 'Password Changed Successfully.');
                return redirect()->route('admin')->withsuccess('Password Changed Successfully.');
            }
            else
            {
                $error =  Alert::error('Error!', 'Error! Password Not Changed.');
                return Redirect()->back()->witherror('Error! Password Not Changed.');
            }
        }
        return Redirect()->back()->with('flash_message', 'User old password worng.');
    }
}
