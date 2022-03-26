<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;
use validate;

class AdminProfileController extends Controller
{
    //

    public function viewAdminProfile()
    {
    	$adminData = Admin::find(1);

    	return view('admin.admin_profile.admin_profile_view',compact('adminData'));
    }

    public function editAdminProfile()
    {
    	$adminData = Admin::find(1);

    	return view('admin.admin_profile.admin_profile_edit',compact('adminData'));
    }

    public function storeAdminProfile(Request $request)
    {

        
        $data = Admin::find(1);

        $data->name = $request->name;
        $data->email = $request->email;


        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload,adminData/'.$data->profile_photo_path));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$fileName);

            $data['profile_photo_path'] =$fileName;
            $data->save();

            $notification = array(
                'message' =>"User Profile Updated Successfylly",
                'alert-type' =>'success'
            );

            return redirect()->route('admin.profile')->with($notification);
        }
    }

    public function adminChangePassword()
    {
       $adminData = Admin::find(1);

        return view('admin.admin_profile.admin_change_password',compact('adminData'));
    }

    public function adminPasswordUpdated(Request $request)
    {


        // $validateData = $request->validate([
        //     'oldpassword' =>'required',
        //     'password'    =>'required|confirmed'
        // ]);

        $hashPassword = Admin::find(1)->password;
        
       

        if (Hash::check($request->oldpassword,$hashPassword)) {
           $admin = Admin::find(1);

           $admin->password = Hash::make($request->password);
           $admin->save();

           Auth::logout();
           return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }
}
