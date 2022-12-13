<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\Slider;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class ContentController extends Controller
{




    public function emailTemplateView(){
        return view('Admin.pages.contents.emailTemplateView', [
            'emails' => EmailTemplate::get()
        ]);
    }

    public function editEmailTemView($id){
        return view('Admin.pages.contents.editEmailTemplate', [
            'mail' => EmailTemplate::find($id)
        ]);
    }


    public function submitUpdatedEmail(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $update = EmailTemplate::where('id', $request->id)->update([
            'title' => $request->title,
            'content' => $request->content
        ]);
        if($update){
            $request->session()->put('success', 'Email template successfully updated');
            return redirect()->back();
        }
    }



    // SLIDER START
    public function sliderView(){
        return view('Admin.pages.contents.sliderView', [
            'slides' => Slider::get()
        ]);
    }


    public function submitAddedSlide(Request $request){
        $data = $request->all();
        foreach ($data as $req) {
            if(!$request->file('banner')){
                $req = $request->old($req);
            }
        }
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'banner' => 'required',
        ]);

        if($request->file('banner')){
            $upload = cloudinary()->uploadFile(
                $request->file('banner')->getRealPath(),
                array(
                    "folder" => "mainassets",
                    "overwrite" => TRUE,
                    "resource_type" => "image"
                )
            )->getSecurePath();
            if($upload){
                Slider::create([
                    'banner' => $upload,
                    'title'      => $request->title,
                    'sub_title'     => $request->sub_title,
                    'btn_title'     => $request->btn_title,
                    'link'     => $request->link
                ]);
                $request->session()->put('success', 'Slide successfully added');
                return redirect()->back();
            }
        } else {
            $request->session()->put('failed', 'Please upload an image');
            return redirect()->back();
        }
    }


    public function editSliderView($id){
        return view('Admin.pages.contents.sliderEditView', [
            'slide' => Slider::find($id)
        ]);
    }

    public function submitUpdateSlide(Request $request){
        $data = $request->all();
        foreach ($data as $req) {
            if(!$request->file('banner')){
                $req = $request->old($req);
            }
        }

        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
        ]);

        if($request->file('banner')){
            $upload = cloudinary()->uploadFile(
                $request->file('banner')->getRealPath(),
                array(
                    "folder" => "mainassets",
                    "overwrite" => TRUE,
                    "resource_type" => "image"
                )
            )->getSecurePath();
        } else {
            $upload = Slider::find($request->id)->banner;
        }

        if($upload){
            Slider::where('id', $request->id)->update([
                'banner' => $upload,
                'title'      => $request->title,
                'sub_title'     => $request->sub_title,
                'btn_title'     => $request->btn_title,
                'link'     => $request->link
            ]);
            $request->session()->put('success', 'Slide successfully update');
            return redirect()->back();
        } else {
            $request->session()->put('failed', 'Please upload an image');
            return redirect()->back();
        }
    }


    public function deleteSlide(Request $request){
        $del = Slider::where('id', $request->id)->delete();
        if($del){
            $request->session()->put('success', 'Slide successfully deleted');
            return redirect()->back();
        }
    }

}
