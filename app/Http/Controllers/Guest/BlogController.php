<?php

namespace App\Http\Controllers\Guest;

use App\Classes\Visitor;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\BlogLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class BlogController extends Controller
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
    public function blogView(){
        $blogs = Blog::where('status', 1)->with('admin:id,username')->orderBy('id', 'DESC')->paginate(12)->onEachSide(2);
        foreach($blogs as $blog){
            $blog['comment'] = BlogComment::where('blog_id', $blog->id)->count();
            $blog['likes'] = BlogLike::where('blog_id', $blog->id)->count();
        }

        return view('guest.pages.blog.blogIndex', [
            'blogs' => $blogs
        ]);
    }


    public function blogDetails(Request $request, $id, $slug){
        $details = Blog::whereSlug($slug)->where('id', $id)->with('admin:id,username', 'comments.replies.replies.replies.replies')->where('status', 1)->first();
        Blog::where('id', $details->id)->update([
            'seen' => $details->seen + 1
        ]);
        $isLiked = false;
        $checkLike = BlogLike::where('blog_id', $details->id)->where('liker_ip', Visitor::getIP())->count();
        if($checkLike > 0){
            $isLiked = true;
        }
        // $url = 'blog/'.$id.'/'.$slug;
        // $request->session()->put('redirectUrl', $url);
        return view('guest.pages.blog.blogDetails', [
            'blog' => $details,
            // 'comments' => $comments,
            'countComm' => BlogComment::where('blog_id', $details->id)->count(),
            'countLike' => BlogLike::where('blog_id', $details->id)->count(),
            'isLiked' => $isLiked,
            'categories' => BlogCategory::get(),
            'recentBlog' => Blog::with('admin:username')->orderBy('id', 'DESC')->take(3)->get()
        ]);
    }


    public function submitComment(Request $request){
        $data = $request->all();
        foreach ($data as $req) {
            $req = $request->old($req);
        }

        $request->validate([
            'comment' => 'required',
        ]);

        $getIp = Visitor::getIP();
        $currentUserInfo = Location::get($getIp);
        $location = '';
        if($currentUserInfo){
            $location = $currentUserInfo->cityName.', '.$currentUserInfo->regionName.', '.$currentUserInfo->countryName;
        }
        if($request->anonymous){
            $anonym = 1;
        } else {
            $anonym = 0;
        }
        $user = Auth::user();
        $submit = BlogComment::create([
            'blog_id'       => $request->blog_id,
            'parent_id'     => $request->parent_id,
            'user_id'       => Auth::user()->id,
            'first_name'    => $user->first_name,
            'last_name'     => $user->last_name,
            'email'         => $user->email,
            'comment'       => $request->comment,
            'anonymous'     => $anonym,
            'status'        => 1,
            'comment_ip'    => Visitor::getIP(),
            'comment_os'    => Visitor::getOS(),
            'comment_browser'   => Visitor::getBrowser(),
            'comment_location'  => $location,
        ]);
        if($submit){
            $request->session()->put('success', 'comment successfully added');
            return back();
        } else {
            $request->session()->put('failed', 'Unable to submit your comment');
            return back();
        }
    }



    public function submitLike($blogID){
        $single = Blog::find($blogID);
        if($single){
            $getIp = Visitor::getIP();
            $currentUserInfo = Location::get($getIp);
            $location = '';
            if($currentUserInfo){
                $location = $currentUserInfo->cityName.', '.$currentUserInfo->regionName.', '.$currentUserInfo->countryName;
            }

            $create = BlogLike::create([
                'blog_id'           => $blogID,
                'likes'             => 1,
                'liker_ip'          => $getIp,
                'liker_os'          => Visitor::getOS(),
                'liker_browser'     => Visitor::getBrowser(),
                'liker_location'    => $location,
            ]);

            if($create){
                $countBlog = BlogLike::where('blog_id', $blogID)->count();

                $error = '1|'.$countBlog;
            }
        } else {
            $error = 'Not exist';
        }




        print_r($error);
        exit();
    }


    public function blogByCategory($url){
        $blogs = Blog::where([
            ['status', 1], ['category', $url]
        ])->with('admin:id,username')->orderBy('id', 'DESC')->paginate(9)->onEachSide(2);
        foreach($blogs as $blog){
            $blog['comment'] = BlogComment::where('blog_id', $blog->id)->count();
            $blog['likes'] = BlogLike::where('blog_id', $blog->id)->count();
        }
        return view('guest.pages.blog.blogIndex', [
            'blogs' => $blogs
        ]);
    }



}
