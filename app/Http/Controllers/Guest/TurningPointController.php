<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class TurningPointController extends Controller
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
    public function turnPointIndex(){
        return view('guest.pages.turningPoint.aboutTurningPoint');
    }


    public function turningPoint2022(){
        return view('guest.pages.turningPoint.turningPoint2022');
    }


    public function turningPoint2020(){
        return view('guest.pages.turningPoint.turningPoint2020');
    }


    public function turningPoint2019(){
        return view('guest.pages.turningPoint.turningPoint2019');
    }


    public function turningPoint2018(){
        return view('guest.pages.turningPoint.turningPoint2018');
    }


    public function sponsorship(){
        return view('guest.pages.turningPoint.sponsorship');
    }


    public function turnPointFounder(){
        return view('guest.pages.about.founder');
    }


}
