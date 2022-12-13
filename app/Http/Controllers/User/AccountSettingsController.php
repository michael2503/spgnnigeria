<?php

namespace App\Http\Controllers\User;

use App\Classes\CustomDateTime;
use App\Classes\EmailClass;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\BlogLike;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountSettingsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function userOverview(){
        return view('User.overview', [
            'allcomment' => BlogComment::where('user_id', Auth::user()->id)->count(),
            'allAppointment' => Appointment::where('user_id', Auth::user()->id)->count(),
            'cancelledAppointment' => Appointment::where([
                ['user_id', Auth::user()->id], ['status', 'Cancelled']
            ])->count(),
            ]);
    }


    public function userChangePassword(){
        return view('User.changePassword');
    }


    public function userChangePasswordSubmit(Request $request){
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'old_password' => ['required', 'string', 'min:6'],
        ]);

        $user = User::find(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $update = User::where('id', $user->id)->update([
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
