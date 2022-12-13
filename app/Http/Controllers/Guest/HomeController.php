<?php

namespace App\Http\Controllers\Guest;

use App\Classes\EmailClass;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index(){
        $sliders = Slider::where('status', 1)->get();
        return view('guest.pages.welcome', [
            'sliders' => $sliders
        ]);
    }


    public function aboutCoreValue(){
        return view('guest.pages.about.coreValue');
    }


    public function aboutSpgn(){
        return view('guest.pages.about.spgn');
    }

    public function aboutFounder(){
        return view('guest.pages.about.founder');
    }


    public function contact(){
        return view('guest.pages.contact');
    }


    public function submitContactForm(Request $request){
        $data = $request->all();
        foreach ($data as $req) {
            $req = $request->old($req);
        }

        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'customermessage' => 'required',
        ]);

        EmailClass::companyMail($data);
        EmailClass::senderMail($data);

        $request->session()->put('success', 'Your message is successfully sent');
        return redirect()->route('contact');
    }


    public function ourTeam(){
        return view('guest.pages.about.ourTeam');
    }

    public function faq(){
        return view('guest.pages.about.faq');
    }
}
