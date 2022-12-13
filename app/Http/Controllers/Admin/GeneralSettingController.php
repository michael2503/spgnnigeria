<?php

namespace App\Http\Controllers\Admin;

use App\Classes\CustomDateTime;
use App\Classes\EmailClass;
use App\Classes\Settings;
use App\Classes\Visitor;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminLoginActivity;
use App\Models\AdminVerification;
use App\Models\Blog;
use App\Models\SocialLink;
use App\Models\User;
use App\Models\Vendor;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GeneralSettingController extends Controller
{




    public function websiteSettingView(){
       return view('Admin.pages.generalSettings.websiteSettings');
    }


    public function updateWebSettings(Request $request){
        $single = WebsiteSetting::first();

        if($request->file('favicon')){
            $request['favicon_url'] = cloudinary()->upload(
                $request->file('favicon')->getRealPath(),
                array(
                    "folder" => "mainassets",
                    "overwrite" => TRUE,
                    "resource_type" => "image"
                )
            )->getSecurePath();
        } else {
            $request['favicon_url'] = $request->default_favicon;
        }

        if($request->file('logo')){
            $request['logo_url'] = cloudinary()->upload(
                $request->file('logo')->getRealPath(),
                array(
                    "folder" => "mainassets",
                    "overwrite" => TRUE,
                    "resource_type" => "image"
                )
            )->getSecurePath();
        } else {
            $request['logo_url'] = $request->default_logo;
        }

        $single->fill($request->all());
        $single->save();

        $request->session()->put('success', 'Website settings successfully updated');
        return redirect()->back();
    }



    public function socialLinkView(){
        return view('Admin.pages.generalSettings.socialLink', [
            'links' => SocialLink::get()
        ]);
    }



    public function submitAddedLink(Request $request){
        $data = $request->all();

        foreach ($data as $req) {
            $req = $request->old($req);
        }
        $request->validate([
            'social_name' => 'required',
            'social_url' => 'required',
            'social_icon' => 'required',
            'status' => 'required',
        ]);
        $create = SocialLink::create($request->all());
        $request->session()->put('success', 'Social Link successfully added');
        return redirect()->back();
    }


    public function deleteSocailLink(Request $request){
        SocialLink::where('id', $request->dleteID)->delete();
        $request->session()->put('success', 'Social Link successfully deleted');
        return redirect()->back();
    }


    public function updateSocailLink(Request $request){
        $single = SocialLink::findOrFail($request->sosID);
        $single['status'] = $request->statusEdit;
        $single->fill($request->all());
        $single->save();
        $request->session()->put('success', 'Social Link successfully updated');
        return redirect()->back();
    }


}
