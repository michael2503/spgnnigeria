<?php

namespace App\Http\Controllers\Admin;

use App\Classes\CustomDateTime;
use App\Classes\EmailClass;
use App\Classes\Settings;
use App\Classes\Visitor;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\SocialLink;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminManagerController extends Controller
{




    public function adminView(){
        return view('Admin.pages.adminManager.adminList', [
            'allAdmins' => Admin::get()
        ]);
    }


    public function addAdminView(){
        return view('Admin.pages.adminManager.addAdmin');
    }


    public function submitAddAdmin(Request $request){
        $data = $request->all();

        foreach ($data as $req) {
            if(!$request->file('photo')){
                $req = $request->old($req);
            }
        }
        $request->validate([
            'role' => 'required',
            'username' => 'required|unique:admins|alpha_dash',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:admins',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:admins',
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'bio' => 'required',
        ]);
        if($request->file('photo')){
            $data['photo'] = cloudinary()->upload(
                $request->file('photo')->getRealPath(),
                array(
                    "folder" => "admins",
                    "overwrite" => TRUE,
                    "resource_type" => "image"
                )
            )->getSecurePath();
        }
        $data['password'] = Hash::make($request->password);

        $create = Admin::create($data);
        if($create){
            $request->session()->put('success', 'Admin successfully added');
            return redirect()->back();
        } else {
            $request->session()->put('failed', 'Your request can not be proccess');
            return redirect()->back();
        }
    }


    public function singleAdminView($id){
        $single = Admin::findOrFail($id);
        return view('Admin.pages.adminManager.editAdmin', [
            'admin' => $single
        ]);
    }

    public function submitUpdatedAdmin(Request $request){
        $single = Admin::findOrFail($request->id);
        $data = $request->all();
        $request->validate([
            'role' => 'required',
            'username' => 'required|alpha_dash',
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'bio' => 'required',
        ]);

        if($data['email'] != $single->email){
            $check = Admin::where('email', $data['email'])->first();
            if($check){
                $request->session()->put('checkMail', 'Oops! email already exist');
                return redirect()->back();
            }
        }

        if($data['username'] != $single->username){
            $check = Admin::where('username', $data['username'])->first();
            if($check){
                $request->session()->put('checkUsername', 'Oops! username already exist');
                return redirect()->back();
            }
        }

        if($data['phone'] != $single->phone){
            $check = Admin::where('phone', $data['phone'])->first();
            if($check){
                $request->session()->put('checkPhone', 'Oops! phone already exist');
                return redirect()->back();
            }
        }

        if($request->file('photo')){
            $data['photo'] = cloudinary()->upload(
                $request->file('photo')->getRealPath(),
                array(
                    "folder" => "admins",
                    "overwrite" => TRUE,
                    "resource_type" => "image"
                )
            )->getSecurePath();
        } else {
            $data['photo'] = $single->photo;
        }

        $single->fill($data);
        $single->save();

        if($single){
            $request->session()->put('success', 'Admin info successfully updated');
            return redirect()->back();
        } else {
            $request->session()->put('failed', 'Your request can not be proccess');
            return redirect()->back();
        }
    }



    public function deleteAdmin(Request $request){
        $del = Admin::where('id', $request->adminID)->delete();
        if($del){
            $request->session()->put('success', 'Admin info successfully deleted');
            return redirect()->back();
        } else {
            $request->session()->put('failed', 'Your request can not be proccess');
            return redirect()->back();
        }
    }



    public function accountSettingView(){
        $admin = Admin::findOrFail(auth()->guard('admin')->user()->id);
        return view('Admin.pages.adminManager.accountSettings', [
            'admin' => $admin
        ]);
    }


    public function submitEditProfile(Request $request){
        $single = Admin::findOrFail(auth()->guard('admin')->user()->id);
        $data = $request->all();
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'bio' => 'required',
        ]);

        if($request->file('photo')){
            $data['photo'] = cloudinary()->upload(
                $request->file('photo')->getRealPath(),
                array(
                    "folder" => "admins",
                    "overwrite" => TRUE,
                    "resource_type" => "image"
                )
            )->getSecurePath();
        } else {
            $data['photo'] = $single->photo;
        }
        unset($data['email']);
        unset($data['username']);
        unset($data['phone']);

        $single->fill($data);
        $single->save();

        if($single){
            $request->session()->put('success', 'Profile successfully updated');
            return redirect()->back();
        } else {
            $request->session()->put('failed', 'Your request can not be proccess');
            return redirect()->back();
        }
    }


    public function changePasswordView(){
        return view('Admin.pages.adminManager.changePassword');
    }

    public function submitRestpass(Request $request){
        $request->validate([
            'password' => 'required',
            'old_password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $admin = Admin::findOrFail(auth()->guard('admin')->user()->id);
        if (Hash::check($request->old_password, $admin->password)) {
            $update = Admin::where('id', $admin->id)->update([
                'password' => Hash::make($request->password),
            ]);
            if($update){
                $request->session()->put('success', 'Password successfully changed');
                return redirect()->back();
            }
        } else {
            $request->session()->put('oldPass', 'Oops! old password is wrong');
            return redirect()->back();
        }
    }

}
