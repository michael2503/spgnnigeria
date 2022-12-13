<?php

namespace App\Http\Controllers\Auth;

use App\Classes\CustomDateTime;
use App\Classes\Settings;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserVerification;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public function passwordResetView(Request $request){
        $userID = $request->session()->get('changeID');
        $token = $request->session()->get('passToken');
        if($userID && $token){
            $check = UserVerification::where('user_id', $userID)->where('email_code', Settings::numberDecrypt($token))->first();
            $currTime = CustomDateTime::currentTime();
            if($check && $check->code_time > $currTime){
                return view('auth.passwords.reset');
            } else {
                return redirect()->route('password.request');
            }
        } else {
            return redirect()->route('password.request');
        }
    }


    public function submitPassword(Request $request){
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $userID = $request->session()->get('changeID');
        $token = $request->session()->get('passToken');
        if($userID && $token){
            $check = UserVerification::where('user_id', $userID)->where('email_code', Settings::numberDecrypt($token))->first();
            $currTime = Carbon::now();
            if($check && $check->code_time > $currTime){
                $update = User::where('id', $userID)->update([
                    'password' => app('hash')->make($request['password'])
                ]);
                if($update){
                    UserVerification::where('user_id', $userID)->update([
                        'email_verify' => 0
                    ]);
                    $request->session()->forget('changeID');
                    $request->session()->forget('passToken');

                    Session::flash('success', 'Password successfully reset');
                    return redirect()->route('login');
                }

            } else {
                return redirect()->route('password.request');
            }
        } else {
            return redirect()->route('password.request');
        }
    }
}
