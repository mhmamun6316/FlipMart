<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }

     // ===============================Admin  profile =============================
     public function profile(){
        return view('admin.profile.index');
    }

    ////////// updated personal info
    public function updateInfo(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ],[
            'name.required' => 'input your name',
        ]);

        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Your Profile Updated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    // image updated
    public function updateImgPage(){
        return view('admin.profile.change_image');
    }

    // admin image store
    public function imgStore(Request $request){
        $old_image = $request->old_image;

        if (User::findOrFail(Auth::id())->image == 'frontend/media/avatar.png') {
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/'.$name_gen);
            $save_url = 'frontend/media/'.$name_gen;
            User::findOrFail(Auth::id())->Update([
                'image' => $save_url
            ]);
            $notification=array(
                'message'=>'Image Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        }else {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/'.$name_gen);
            $save_url = 'frontend/media/'.$name_gen;
            User::findOrFail(Auth::id())->Update([
                'image' => $save_url
            ]);
            $notification=array(
                'message'=>'Image Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }
 }

 /// change password
 public function changePass(){
     return view('admin.profile.password');
 }

 public function changePassStore(Request $request){
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:8',
        'password_confirmation' => 'required|min:8',
    ]);

    $db_pass = Auth::user()->password;
    $current_password = $request->old_password;
    $newpass = $request->new_password;
    $confirmpass = $request->password_confirmation;

   if (Hash::check($current_password,$db_pass)) {
      if ($newpass === $confirmpass) {
          User::findOrFail(Auth::id())->update([
            'password' => Hash::make($newpass)
          ]);

          Auth::logout();
          $notification=array(
            'message'=>'Your Password Change Success. Now Login With New Password',
            'alert-type'=>'success'
        );
        return Redirect()->route('login')->with($notification);

      }else {

        $notification=array(
            'message'=>'New Password And Confirm Password Not Same',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
      }
   }else {
    $notification=array(
        'message'=>'Old Password Not Match',
        'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification);
   }
 }


}
