<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\BlogLike;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{




    public function adminblogView (){
        $blogs = Blog::orderBy('id', 'DESC')->paginate(10);
        return view('Admin.pages.blog.blogList', [
            'blogs' => $blogs
        ]);
    }

    public function getBlogCat(){
        $blogCats = BlogCategory::get();
        return view('Admin.pages.blog.blogCate', [
            'blogCats' => $blogCats
        ]);
    }

    public function submitAddedcat(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        BlogCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        $request->session()->put('success', 'Category successfully added');
        return redirect()->back();
    }

    public function updateBlogCat(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        BlogCategory::where('id', $request->blogcatID)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        $request->session()->put('success', 'Category successfully updated');
        return redirect()->back();
    }

    public function deleteBlogCat(Request $request){
        $del = BlogCategory::where('id', $request->dleteID)->delete();
        $request->session()->put('success', 'Category successfully deleted');
        return redirect()->back();
    }


    public function addBlogView(){
        $blogCats = BlogCategory::get();
        return view('Admin.pages.blog.addBlog', [
            'blogCats' => $blogCats
        ]);
    }

    public function submitAddedBlog(Request $request){
        $data = $request->all();
        foreach ($data as $req) {
            if(!$request->file('photo')){
                $req = $request->old($req);
            }
        }

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);

        $upload = null;
        if($request->file('photo')){
            $upload = cloudinary()->uploadFile(
                $request->file('photo')->getRealPath(),
                array(
                    "folder" => "blog",
                    "overwrite" => TRUE,
                    "resource_type" => "image"
                )
            )->getSecurePath();
        }
        Blog::create([
            'admin_id'     => auth()->guard('admin')->user()->id,
            'title'     => $request->title,
            'slug'      => Str::slug($request->title),
            'image'     => $upload,
            'content'   => $request->content,
            'category'    => $request->category,
        ]);

        $request->session()->put('success', 'Blog successfully submitted');
        return redirect()->back();
    }


    public function blogSingle($id){
        $blog = Blog::findOrFail($id);
        $comments = BlogComment::where('blog_id', $id)->count();
        $likes = BlogLike::where('blog_id', $id)->count();
        $blogCats = BlogCategory::get();

        return view('Admin.pages.blog.updateBlog', [
            'blog' => $blog,
            'comments' => $comments,
            'likes' => $likes,
            'blogCats' => $blogCats
        ]);
    }



    public function submitUpdatedBlog(Request $request){
        $request->validate([
            'title' => 'required',
            'added_by' => 'required',
            'content' => 'required',
        ]);

        $single = Blog::findOrFail($request->id);

        if($request->file('photo')){
            $upload = cloudinary()->uploadFile(
                $request->file('photo')->getRealPath(),
                array(
                    "folder" => "blog",
                    "overwrite" => TRUE,
                    "resource_type" => "image"
                )
            )->getSecurePath();
        } else {
            $upload = $single->image;
        }
        Blog::where('id', $request->id)->update([
            'admin_id'     => auth()->guard('admin')->user()->id,
            'title'     => $request->title,
            'slug'      => Str::slug($request->title),
            'image'     => $upload,
            'content'   => $request->content,
            'category'    => $request->category,
            'status'    => $request->status,
        ]);

        $request->session()->put('success', 'Blog successfully updated');
        return redirect()->back();
    }


    public function viewComments($blogID){
        // return $blogID;
        $details = Blog::where('id', $blogID)->with('admin:id,username', 'comments.replies.replies.replies.replies')->where('status', 1)->first();
        // dd($details);
        return view('Admin.pages.blog.blogComments', [
            'blog' => $details,
            'comm' => ''
        ]);
    }


    public function deleteComment(Request $request){
        $comm = BlogComment::where('id', $request->id)->delete();
        BlogComment::where('parent_id', $request->id)->delete();
        if($comm){
            $request->session()->put('success', 'Blog comment successfully deleted');
            return redirect()->back();
        }
    }


    public function editCommentView($commID){
        $comment = BlogComment::find($commID);
        $details = Blog::where('id', $comment->blog_id)->with('admin:id,username', 'comments.replies.replies.replies.replies')->where('status', 1)->first();
        return view('Admin.pages.blog.blogComments', [
            'blog' => $details,
            'comm' => $comment
        ]);
    }


    public function updateThiscomment(Request $request){
        $anonymous = 0;
        if($request->anonymous == 1){
            $anonymous = 1;
        }

        // return $request->all();

        BlogComment::where('id', $request->id)->update([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'comment'       => $request->comment,
            'anonymous'     => $anonymous,
            'status'        => $request->status,
        ]);

        $request->session()->put('success', 'Blog comment successfully updated');
        return redirect()->back();
    }



    public function deleteAdminBlog(Request $request){
        $comm = Blog::where('id', $request->id)->delete();
        if($comm){
            $request->session()->put('success', 'Blog successfully deleted');
            return redirect()->back();
        }
    }


}
