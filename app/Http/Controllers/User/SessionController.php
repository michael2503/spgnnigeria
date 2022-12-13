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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SessionController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function bookASessionView(){
        return view('User.bookAppointment');
    }


    public function submitSession(Request $request){
        $data = $request->all();

        foreach ($data as $req) {
            if(!$request->file('photo')){
                $req = $request->old($req);
            }
        }
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'schedule_date' => 'required',
            'marital_status' => 'required',
            'message' => 'required',
            'service' => 'required',
            'occupation' => 'required'
        ]);

        $request['user_id'] = Auth::user()->id;
        $request['schedule_date'] = date('Y-m-d H:i:s', strtotime($request->schedule_date));

        $next24Hour = CustomDateTime::addDate('24 hours');
        if($request->schedule_date < $next24Hour){
            $request->session()->put('scheduleFail', 'Please give at least 24hours interval from now');
            return redirect()->back();
        }

        if($request->dob == CustomDateTime::currentDate()){
            $request->session()->put('dobFail', 'Oops! You can not be born today');
            return redirect()->back();
        }
        if($request->dob > CustomDateTime::currentDate()){
            $request->session()->put('dobFail', 'Oops! You can not be born in the future');
            return redirect()->back();
        }

        $create = Appointment::create($request->all());
        if($create){
            //send email
            EmailClass::appointmentEmailSender($create);
            EmailClass::appointmentEmailReceiver($create, 'superiorperformanceng@gmail.com');

            $request->session()->put('success', 'Your session is successfully booked');
            return redirect()->back();
        }

    }


    public function sessionView(){
        $user = Auth::user();
        return view('User.appointment', [
            'appointments' => Appointment::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(10)
        ]);
    }


    public function sessionDetails($appID){
        $single = Appointment::findOrFail($appID);
        if($single){
            $resp = '1|'.$single->first_name.'|'.$single->last_name.'|'.$single->email.'|'.$single->phone.'|'.$single->address.'|'.$single->city.'|'.$single->state.'|'.$single->gender.'|'.$single->marital_status.'|'.$single->status.'|'.$single->schedule_date.'|'.$single->created_at.'|'.$single->dob.'|'.$single->message.'|'.$single->service.'|'.$single->occupation;
        }
        print_r($resp);
        exit();
    }

    public function cancelAppointment(Request $request){
        $cancel = Appointment::where('id', $request->appID)->update([
            'status' => 'Cancelled'
        ]);

        $request->session()->put('success', 'Appointment successfully cancelled');
        return redirect()->back();
    }



}
