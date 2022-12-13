<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;

class GalleryController extends Controller
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
    public function photoView($cat){
        if($cat){
            if($cat == 'all'){
                $photos = PhotoGallery::orderBy('id', 'DESC')->paginate(30)->onEachSide(2);
                $catName = 'All Images';
            } else {
                $photos = PhotoGallery::where('category', $cat)->orderBy('id', 'DESC')->paginate(30)->onEachSide(2);
                $catName = str_replace('-', ' ', $cat);
            }
        } else {
            $photos = PhotoGallery::orderBy('id', 'DESC')->paginate(30)->onEachSide(2);
            $catName = 'All Images';
        }

        $total = $photos->total();
        $to = $photos->currentPage() * $photos->count();
        $from = ($photos->perPage() * ($photos->currentPage() - 1)) + 1;
        if($to < $from){
            $to = ($from + $photos->count()) - 1;
        }
        return view('guest.pages.gallery.photo', [
            'photos' => $photos,
            'categories' => GalleryCategory::get(),
            'cats' => $catName,
            'controlCat' => $cat,
            'to' => $to,
            'from' => $from,
            'total' => $total
        ]);
    }




    public function videoView(){
        $videos = VideoGallery::orderBy('id', 'DESC')->paginate(9);
        $total = $videos->total();
        $to = $videos->currentPage() * $videos->count();
        $from = ($videos->perPage() * ($videos->currentPage() - 1)) + 1;
        if($to < $from){
            $to = ($from + $videos->count()) - 1;
        }
        return view('guest.pages.gallery.video', [
            'videos' => $videos,
            'to' => $to,
            'from' => $from,
            'total' => $total
        ]);
    }



}
