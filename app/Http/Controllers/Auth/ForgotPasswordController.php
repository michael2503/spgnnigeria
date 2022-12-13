<?php

namespace App\Http\Controllers\Auth;

use App\Classes\EmailClass;
use App\Classes\Settings;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserVerification;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;



    public function submitEmailForPassword(Request $request){
        // return $request->email;
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request['email'])->first();
        if($user){
            $randCode = Settings::randomNums(6);
            UserVerification::createUpdate($user->id, $randCode);
            EmailClass::resetPasswordUser($user, $randCode);
            $request->session()->put('changeID', $user->id);
            $request->session()->put('passToken', Settings::numberEncrypt($randCode));

            Session::flash('success', '6 Digit code has been sent to your email, please enter the code below');
            return redirect()->route('confirmCode');
        } else {
            Session::flash('failed', 'Oops! this email is not available');
            return redirect()->route('password.request');
        }
    }


    public function confirmCode(Request $request){
        $userID = $request->session()->get('changeID');
        $token = $request->session()->get('passToken');
        if($userID && $token){
            $check = UserVerification::where('user_id', $userID)->where('email_code', Settings::numberDecrypt($token))->first();
            $currTime = Carbon::now();
            if($check && $check->code_time > $currTime){
                return view('auth.passwords.confirm');
            } else {
                return redirect()->route('password.request');
            }
        } else {
            return redirect()->route('password.request');
        }
    }



    public function submitCode(Request $request){
        $data = $request->all();
        $userID = $request->session()->get('changeID');
        $request->validate([
            'code' => 'required'
        ]);
        foreach ($data as $req) {
            $req = $request->old($req);
        }
        if($userID){
            $validate = UserVerification::verifyEmail($userID, $request['code']);
            if($validate == 'notMatched'){
                Session::flash('failed', 'Oops! Incorrect token');
                return redirect()->route('confirmCode');
            } else if($validate == 'codeExpire') {
                Session::flash('failed', 'Oops! Token has expired');
                return redirect()->route('confirmCode');
            } else {
                Session::flash('success', 'Success, Please reset your password');
                return redirect()->route('passwordResetView');
            }
        } else {
            Session::flash('failed', 'Oops! something went wrongs');
            return redirect()->route('password.request');
        }
    }




}
