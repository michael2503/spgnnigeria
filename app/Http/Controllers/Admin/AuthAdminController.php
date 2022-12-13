<?php

namespace App\Http\Controllers\Admin;

use App\Classes\EmailClass;
use App\Classes\Settings;
use App\Classes\Visitor;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminLoginActivity;
use App\Models\AdminVerification;
use App\Models\Blog;
use App\Models\Vendor;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthAdminController extends Controller
{

    public function getLogin(){
        if(auth()->guard('admin')->user()){
            return redirect()->route('adminDashboard');
        }
        return view('Admin.Auth.login');
    }


    public function postLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request['email'])->orWhere('email', $request['email'])->first();
        if($admin){
            if(auth()->guard('admin')->attempt(['email' => $request['email'], 'password' => $request['password']])){
                $user = auth()->guard('admin')->user();
                if($user){
                    AdminLoginActivity::create([
                        'admin'         => $user->id,
                        'ip'            => Visitor::getIP(),
                        'browser'       => Visitor::getBrowser(),
                        'os'            => Visitor::getOS(),
                    ]);
                    return redirect()->route('adminDashboard')->with('success','You are Logged in sucessfully.');
                }
            }else {
                return back()->with('error','Whoops! invalid email and password.');
            }
        } else {
            Session::flash('failed', 'Invalide Email/username.');
            return redirect()->route('adminLogin');
        }


    }


    public function index(){
        return view('Admin.pages.dashboard', [
            'countBlog' => Blog::get()->count(),
            'loginAct' => AdminLoginActivity::loginActivity(),
            'vendor'	=>	Vendor::get(),
            'client'	=>	WebsiteSetting::first(),
        ]);
    }

    public function postLogout(Request $request)
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        return redirect(route('adminLogin'));
    }




    // FORGOT PASSWORD
    public function enterEmailView(){
        return view('Register.forgotPassword');
    }


    public function submitPassEmail(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $admin = Admin::where('email', $request['email'])->first();
        if($admin){
            $randCode = Settings::randomNums(6);
            AdminVerification::createUpdate($admin->id, $randCode);
            EmailClass::resetPassword($admin, $randCode);
            $request->session()->put('changeID', $admin->id);
            $request->session()->put('passToken', Settings::numberEncrypt($randCode));

            Session::flash('success', '6 Digit code has been sent to your email, please enter the code below');
            return redirect()->route('verifyCodeView');
        } else {
            Session::flash('failed', 'Oops! this email is not available');
            return redirect()->route('enterEmailView');
        }
    }


    public function verifyCodeView(Request $request){
        $userID = $request->session()->get('changeID');
        $token = $request->session()->get('passToken');
        if($userID && $token){
            $check = AdminVerification::where('user_id', $userID)->where('email_code', Settings::numberDecrypt($token))->first();
            $currTime = now();
            if($check && $check->code_time > $currTime){
                return view('Register.verifyCode');
            } else {
                return redirect()->route('enterEmailView');
            }
        } else {
            return redirect()->route('enterEmailView');
        }
    }


    public function submitVerifyCode(Request $request){
        $data = $request->all();
        $adminID = $request->session()->get('changeID');
        $request->validate([
            'code' => 'required'
        ]);
        foreach ($data as $req) {
            $req = $request->old($req);
        }
        if($adminID){
            $validate = AdminVerification::verifyEmail($adminID, $request['code']);
            if($validate == 'notMatched'){
                Session::flash('failed', 'Oops! Incorrect token');
                return redirect()->route('verifyCodeView');
            } else if($validate == 'codeExpire') {
                Session::flash('failed', 'Oops! Token has expired');
                return redirect()->route('verifyCodeView');
            } else {
                Session::flash('success', 'Success, Please reset your password');
                return redirect()->route('resetPasswordView');
            }
        } else {
            Session::flash('failed', 'Oops! something went wrongs');
            return redirect()->route('enterEmailView');
        }
    }


    public function resetPasswordView(Request $request){
        $userID = $request->session()->get('changeID');
        $token = $request->session()->get('passToken');
        if($userID && $token){
            $check = AdminVerification::where('admin_id', $userID)->where('email_code', Settings::numberDecrypt($token))->first();
            $currTime = now();
            if($check && $check->code_time > $currTime){
                return view('Register.resetPassword');
            } else {
                return redirect()->route('enterEmailView');
            }
        } else {
            return redirect()->route('enterEmailView');
        }
    }


    public function submitRestPassword(Request $request){
        $adminID = $request->session()->get('changeID');
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $adminID = $request->session()->get('changeID');
        $token = $request->session()->get('passToken');
        if($adminID && $token){
            $check = AdminVerification::where('admin_id', $adminID)->where('email_code', Settings::numberDecrypt($token))->first();
            $currTime = now();
            if($check && $check->code_time > $currTime){
                $update = Admin::where('id', $adminID)->update([
                    'password' => app('hash')->make($request['password'])
                ]);
                if($update){
                    AdminVerification::where('admin_id', $adminID)->update([
                        'email_verify' => 0
                    ]);
                    $request->session()->forget('changeID');
                    $request->session()->forget('passToken');

                    Session::flash('success', 'Password successfully reset');
                    return redirect()->route('login');
                }

            } else {
                return redirect()->route('enterEmailView');
            }
        } else {
            return redirect()->route('enterEmailView');
        }
    }





}
