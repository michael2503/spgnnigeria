<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //Default load function
    public function psychologicalServices(){
        return view('guest.pages.services.psychological');
    }


    public function mentorshipScheme(){
        return view('guest.pages.services.mentorshpScheme');
    }

    public function entrepreneurship(){
        return view('guest.pages.services.entrepreneurship');
    }

    public function skillAcquisition(){
       return view('guest.pages.services.skillAcquisition');
    }

    public function spgnAddon(){
        return view('guest.pages.services.spgnAddOn');
    }

    public function trainingConferences(){
        return view('guest.pages.services.trainingConferences');
    }


    public function operationFeedTheNeedy(){
        return view('guest.pages.services.operationFeedTheNeddy');
    }

    public function therapyApproach(){
        return view('guest.pages.services.therapy');
    }


}
