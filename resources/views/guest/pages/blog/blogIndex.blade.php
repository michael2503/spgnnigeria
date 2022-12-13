@extends('guest.layouts.appmain')
@section('title', 'Blog')


@section('content')
<link rel="stylesheet" href="{{ asset('css/blog.css') }}">


<x-GuestComps.breadcrum bigTitle='Blog' smallTitle='Blog'/>



<div class="section-block">
    <div class="container">
        <div class="section-heading">
            <h4 class="text-center">SPGN BLOG</h4>
        </div>
        <div class="section-heading-line"></div>

        <div class="owl-carousel">
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-5">
                    <div class="post-slide">
                        <a href="{{ route('blogDetails', [$blog->id, $blog->slug]) }}">
                            <div class="post-img">
                                @if ($blog->image)
                                <img src="{{ $blog->image }}" alt="">
                                @else
                                <img src="{{ asset('images/blog/demo.jpg') }}" alt="">
                                @endif
                                <div class="category">{{ date('M d, Y', strtotime($blog->created_at)) }}</div>
                            </div>
                        </a>
                        <div class="post-review">
                            <h3 class="post-title"><a href="{{ route('blogDetails', [$blog->id, $blog->slug]) }}">{{ $blog->title }}</a></h3>
                            <p class="post-description">
                                {{ strip_tags(substr($blog->content, 0, 150)) }}
                            </p>
                            <div class="post-bar mt-4">
                                <span><i class="fa fa-user"></i> <a href="#">Admin</a></span>
                                <span class="comments ml-4"><i class="fa fa-comments"></i> <a href="#">{{ $blog->comment }}</a></span>
                                <span class="comments"><i class="fa fa-thumbs-up"></i> <a href="#">{{ $blog->likes }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>


            <div class="d-flex justify-content-center mt-3">
                {!! $blogs->links() !!}
            </div>
        </div>

    </div>
</div>



@endsection
