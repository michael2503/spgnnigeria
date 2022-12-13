<?php

namespace App\Http\Controllers\Admin;

use App\Classes\CustomDateTime;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminAppointmentController extends Controller
{



    public function adminAppointView(){
        $getAll = Appointment::orderBy('id', 'DESC')->paginate(15);
        return view('Admin.pages.appointments.listAppointment', [
            'appointments' => $getAll
        ]);
    }

    public function appointmentDetails($appID){
        $single = Appointment::findOrFail($appID);
        if($single){
            $resp = '1|'.$single->first_name.'|'.$single->last_name.'|'.$single->email.'|'.$single->phone.'|'.$single->address.'|'.$single->city.'|'.$single->state.'|'.$single->gender.'|'.$single->marital_status.'|'.$single->status.'|'.$single->schedule_date.'|'.$single->created_at.'|'.$single->dob.'|'.$single->message.'|'.$single->service.'|'.$single->occupation;
        }
        print_r($resp);
        exit();
    }

    public function adminCancelAppointment(Request $request){
        $cancel = Appointment::where('id', $request->appID)->update([
            'status' => 'Cancelled'
        ]);

        $request->session()->put('success', 'Appointment successfully cancelled');
        return redirect()->back();
    }


    public function adminEditAppointment($appID){
        $single = Appointment::find($appID);
        return view('Admin.pages.appointments.editAppointView', [
            'appoint' => $single
        ]);
    }


    public function adminSubmitUpdate(Request $request){
        $data = $request->all();
        $single = Appointment::find($request->appID);

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

        $request['user_id'] = $single->user_id;
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

        $single->fill($request->all());
        $single->save();
        if($single){
            //send email
            $request->session()->put('success', 'Appointment successfully updated');
            return redirect()->back();
        }
    }


}
