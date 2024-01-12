<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   public function AdminDashboard(){
    return view('admin.index');
   }// end method

public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }// end method
    public function AdminLogin(){
       return view('admin.admin_login');
    }// end method

    public function AdminProfile(){
      $id=Auth::user()->id;
      $profileData=User::find($id);

      return view('admin.admin_profile_view',compact('profileData'));
   }// end method
   public function AdminProfileStore(Request $request){

      $id=Auth::user()->id;
      $data=User::find($id);
     
      //$data->username=$request->txtusername;
      $data['username']=$request->txtusername;
      $data['name']=$request->txtname;
      $data['phone']=$request->txtphone;
      $data['email']=$request->txtemail;
      $data['adress']=$request->txtaddress;

      //upload image file
      if ($request->file('photo')) {
      $file  = $request->file('photo');    
      @unlink(public_path('upload/admin_images/'.$data['photo']));
      $filename  = date('YmdHi').$file->getClientOriginalName();
      $file->move(public_path('upload/admin_images'),$filename);
      $data['photo']=$filename;

      }
      $data->save();

      $notification= array(
         'message' => 'Admin Profile Successfully Updated',
         'alert-type' => 'success'
      );


      return redirect()->back()->with($notification);
   }// end method

   public function AdminChangePassword(){
      
      $id=Auth::user()->id;
      $profileData=User::find($id);

      return view('admin.admin_change_password',compact('profileData'));
   }// end method

   public function AdminUpdatePassword(Request $request){

     //validation
      $request->validate([
      'old_password'=> 'required',
      'new_password'=> 'required|confirmed'
      ]);

      //match the old password
      if(!Hash::check($request->old_password,auth::user()->password)){
         $notification= array(
            'message' => 'Old Password Does not match',
            'alert-type' => 'error'
         );
         return back()->with($notification);

      }
      //update new password
      User::whereId(auth()->user()->id)->update([
         'password'=>Hash::make($request->new_password)
      ]);

      $notification= array(
         'message' => 'Password changed Successfully',
         'alert-type' => 'success'
      );
      return back()->with($notification);
   }// end method
   }