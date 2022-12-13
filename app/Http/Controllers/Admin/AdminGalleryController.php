<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Cloudinary\Asset\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminGalleryController extends Controller
{




    public function adminPhotoView($cat){
        if($cat){
            if($cat == 'all'){
                $images = PhotoGallery::orderBy('id', 'DESC')->paginate(30)->onEachSide(2);
                $cat = 'All Images';
            } else {
                $images = PhotoGallery::where('category', $cat)->orderBy('id', 'DESC')->paginate(30)->onEachSide(2);
                $cat = str_replace('-', ' ', $cat);
            }
        } else {
            $images = PhotoGallery::orderBy('id', 'DESC')->paginate(30)->onEachSide(2);
            $cat = 'All Images';
        }

        $total = $images->total();
        $to = $images->currentPage() * $images->count();
        $from = ($images->perPage() * ($images->currentPage() - 1)) + 1;
        if($to < $from){
            $to = ($from + $images->count()) - 1;
        }

        return view('Admin.pages.Gallery.photoGallery', [
            'images' => $images,
            'categories' => GalleryCategory::get(),
            'cats' => $cat,
            'to' => $to,
            'from' => $from,
            'total' => $total
        ]);
    }

    // public function adminPhotoViewCat($cat){
    //     $images = PhotoGallery::where('category', $cat)->orderBy('id', 'DESC')->paginate(30)->onEachSide(2);

    //     $total = $images->total();
    //     $to = $images->currentPage() * $images->count();
    //     $from = ($images->perPage() * ($images->currentPage() - 1)) + 1;
    //     if($to < $from){
    //         $to = ($from + $images->count()) - 1;
    //     }
    //     return view('Admin.pages.Gallery.photoGallery', [
    //         'images' => $images,
    //         'categories' => GalleryCategory::get(),
    //         'cats' => str_replace('-', ' ', $cat),
    //         'to' => $to,
    //         'from' => $from,
    //         'total' => $total
    //     ]);
    // }

    public function adminVideoView(){
        $videos = VideoGallery::orderBy('id', 'DESC')->paginate(20);
        return view('Admin.pages.Gallery.videoGallery', [
            'videos' => $videos
        ]);
    }


    public function deletePhotoGallery(Request $request){
        $del = PhotoGallery::where('id', $request->dleteID)->delete();
        if($del){
            cloudinary()->destroy($request->pubID);

            $request->session()->put('success', 'Photo successfully deleted');
            return redirect()->back();
        } else {
            $request->session()->put('failed', 'Failed to delete Photo');
            return redirect()->back();
        }
    }



    public function uploadPhoto(Request $request){
        $request->validate([
            'category' => 'required',
            'file' => 'required',
        ]);
        if($request->file('file')){
            $category = str_replace(' ', '_', $request->category);
            $upload = cloudinary()->uploadFile(
                $request->file('file')->getRealPath(),
                array(
                    "folder" => "photo-gallery/".$category,
                    "overwrite" => TRUE,
                    "resource_type" => "image"
                )
            )->getSecurePath();
            if($upload){
                $expl = explode('/', $upload)[9];
                $explast = explode('.', $expl)[0];
                PhotoGallery::create([
                    'photo' => $upload,
                    'category'      => $request->category,
                    'public_id'     => $explast
                ]);
                $request->session()->put('success', 'Image uploaded successfully');
                return redirect()->back();
            }
        } else {
            $request->session()->put('failed', 'Please upload an image');
            return redirect()->back();
        }
    }



    public function galleryCatgoryView(){
        return view('Admin.pages.Gallery.galleryCategory', [
            'categories' => GalleryCategory::get()
        ]);
    }


    public function submitGalleryCategory(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        GalleryCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        $request->session()->put('success', 'Category successfully added');
        return redirect()->back();
    }

    public function updateGalleryCategory(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        GalleryCategory::where('id', $request->catGalID)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        $request->session()->put('success', 'Category successfully updated');
        return redirect()->back();
    }

    public function deleteGalleryCategory(Request $request){
        $del = GalleryCategory::where('id', $request->dleteID)->delete();
        $request->session()->put('success', 'Category successfully deleted');
        return redirect()->back();
    }


    public function uploadVideo(Request $request){
        $data = $request->all();
        foreach ($data as $req) {
            $req = $request->old($req);
        }

        $request->validate([
            'vid_title' => 'required',
            'url' => 'required',
        ]);

        $create = VideoGallery::create([
            'vid_title' => $request->vid_title,
            'url'       => $request->url,
        ]);

        $request->session()->put('success', 'Video successfully added');
        return redirect()->back();
    }


    public function deleteVideoGallery(Request $request){
        $del = VideoGallery::where('id', $request->id)->delete();
        if($del){
            $request->session()->put('success', 'Video successfully deleted');
            return redirect()->back();
        } else {
            $request->session()->put('failed', 'Failed to delete Video');
            return redirect()->back();
        }
    }


    public function testRun(){
        $data = array(
        );

        foreach($data as $da){
            $expl = explode('/', $da)[9];
            $explast = explode('.', $expl)[0];

            PhotoGallery::create([
                'photo' => $da,
                'public_id' => $explast,
                'category' => 'finding-your-voice-2022'
            ]);
        }

        return 'success';
    }





}
