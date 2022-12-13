@extends('guest.layouts.blogHeader')
@section('title', $blog->title)
@section('description', strip_tags(substr($blog->content, 0, 200)))
@section('ogTitle', $blog->title)
@section('ogImage', $blog->image)
@section('ogUrl', Request::url())


@section('content')
<link rel="stylesheet" href="{{ asset('css/blog.css') }}">

<x-GuestComps.breadcrum bigTitle='Blog Details' smallTitle='Blog Details'/>



<div class="section-block">
    <div class="container">
        <div class="section-heading">
            {{-- <h4 class="text-center">{{ $blog->title }}</h4> --}}
        </div>
        {{-- <div class="section-heading-line"></div> --}}

        <x-GuestComps.successMessage/>

        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="bog-banner">

                    @if ($blog->image)
                    <img src="{{ $blog->image }}" alt="">
                    @else
                    <img src="{{ asset('images/blog/demo.jpg') }}" alt="">
                    @endif
                    <div class="section-heading mt-3">
                        <h4>{{ $blog->title }}</h4>
                    </div>

                    <div class="entry-meta">
                        <ul>
                            <li><i class="fa fa-calendar"></i> {{ date('F d, Y', strtotime($blog->created_at)) }}</li>
                            <li><a><i class="icon-user"></i> Admin</a></li>
                            <li><i class="fa fa-eye"></i> <a>{{ $blog->seen }} Seen</a></li>
                            <li><a><i class="fa fa-comments"></i> {{ $countComm }} Comments</a></li>
                            <li><a><i class="fa fa-thumbs-up"></i><span id="getSubmitedLike">{{ $countLike }}</span> Likes</a></li>
                        </ul>
                    </div>

                    <div class="likeBtn mt-4">
                        <span class="liked" id="afterLiking"><i class="fa fa-thumbs-up"></i> LIKED</span>
                        @if ($isLiked)
                        <span class="liked"><i class="fa fa-thumbs-up"></i> LIKED</span>
                        @else
                            <span onclick="likeBlog()" id="isLoadingFalse" class="like"><i class="fa fa-thumbs-up"></i> LIKE</span>
                            <span class="like" id="isLoadingTrue"><i class="fa fa-spin fa-spinner"></i> ...</span>
                        @endif
                    </div>
                </div>


                <div class="description text-justify mt-4 text-muted">
                    {!!html_entity_decode($blog->content)!!}
                </div>

                <div class="shareWrapper">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-4 col-12 mb-2">
                            <p>Share Post</p>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-sm-8 col-12">
                            <div class="links">
                                <a href="https://www.facebook.com/share.php?u={{ Request::url() }}" target="_blank"><span class="fa fa-facebook"></span></a>
                                <a href="https://twitter.com/intent/tweet?text={{ $blog->title }}&url={{ Request::url() }}" target="_blank"><span class="fa fa-twitter"></span></a>
                                <a href="https://www.linkedin.com/shareArticle?title={{ $blog->title }}&url={{ Request::url() }}" target="_blank"><span class="fa fa-linkedin"></span></a>
                                <a href="https://web.whatsapp.com/send?text={{ Request::url() }}" target="_blank"><span class="fa fa-whatsapp"></span></a>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="commentSection" style="margin-bottom: 50px">
                    <div class="section-heading">
                        <h6>Comments <small>({{ $countComm }})</small></h6>
                        <div class="section-heading-line-left"></div>
                    </div>

                    @if (count($blog->comments) > 0)
                    @foreach ($blog->comments as $comment)

                    @if ($comment->status == 1)
                    <div class="eachComment mb-4">
                        <div class="commBody">
                            <div class="d-flex justify-content-start mb-2">
                                <div class="imgSide">
                                    @if ($comment->anonymous == 1)
                                    <span>A</span>
                                    @else
                                    <span>{{ ucwords(Str::substr($comment->first_name, 0, 1)) }}{{ Str::substr($comment->last_name, 0, 1) }}</span>
                                    @endif
                                </div>
                                <div class="ml-2">
                                    @if ($comment->anonymous == 1)
                                    <h5>Anonymous</h5>
                                    @else
                                    <h5>{{ $comment->first_name }} {{ $comment->last_name }} </h5>
                                    @endif

                                    <p class="text-muted">{{ date('M d, Y', strtotime($comment->created_at)) }} <a href="#commentForm" onclick="callThis({{ $comment->id }}, '{{ $comment->comment }}')" class="badge badge-success pointer ml-2">Reply</a></p>
                                </div>
                            </div>
                            <p>{{ $comment->comment }}</p>

                            {{-- REPLY --}}
                            @if($comment->replies)
                            @foreach ($comment->replies as $replyOne)

                            @if($replyOne->status == 1)
                            <div class="replies mt-4">
                                <h6 class="mb-4">REPLIES</h6>
                                <div class="eachComment d-flex justify-content-start">
                                    <div class="commBody" style="background: #f8f8f8">
                                        <div class="d-flex justify-content-start mb-2">
                                            <div class="imgSide">
                                                @if ($replyOne->anonymous == 1)
                                                <span>A</span>
                                                @else
                                                <span>{{ ucwords(Str::substr($replyOne->first_name, 0, 1)) }}{{ Str::substr($replyOne->last_name, 0, 1) }}</span>
                                                @endif
                                            </div>
                                            <div class="ml-2">
                                                @if ($replyOne->anonymous == 1)
                                                <h5>Anonymous</h5>
                                                @else
                                                <h5>{{ $replyOne->first_name }} {{ $replyOne->last_name }} </h5>
                                                @endif

                                                <p class="text-muted">{{ date('M d, Y', strtotime($replyOne->created_at)) }} <a href="#commentForm" onclick="callThis({{ $replyOne->id }}, '{{ $replyOne->comment }}')" class="badge badge-success pointer ml-2">Reply</a></p>
                                            </div>
                                        </div>
                                        <p>{{ $replyOne->comment }}</p>

                                        {{-- REPLY --}}
                                        @if($replyOne->replies)
                                        @foreach ($replyOne->replies as $replyTwo)

                                        @if ($replyTwo->status == 1)
                                        <div class="replies mt-4">
                                            <h6 class="mb-4">REPLIES</h6>
                                            <div class="eachComment d-flex justify-content-start">
                                                <div class="commBody" style="background: #fff">
                                                    <div class="d-flex justify-content-start mb-2">
                                                        <div class="imgSide">
                                                            @if ($replyTwo->anonymous == 1)
                                                            <span>A</span>
                                                            @else
                                                            <span>{{ ucwords(Str::substr($replyTwo->first_name, 0, 1)) }}{{ Str::substr($replyTwo->last_name, 0, 1) }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="ml-2">
                                                            @if ($replyTwo->anonymous == 1)
                                                            <h5>Anonymous</h5>
                                                            @else
                                                            <h5>{{ $replyTwo->first_name }} {{ $replyTwo->last_name }} </h5>
                                                            @endif
                                                            <p class="text-muted">{{ date('M d, Y', strtotime($replyTwo->created_at)) }} {{-- <a href="#commentForm" onclick="callThis({{ $replyTwo->id }}, '{{ $replyTwo->comment }}')" class="badge badge-success pointer ml-2">Reply</a> --}}</p>
                                                        </div>
                                                    </div>
                                                    <p>{{ $replyTwo->comment }}</p>
                                                    <div class="replies">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @endif

                            @endforeach
                            @endif

                        </div>
                    </div>
                    @endif

                    @endforeach
                    @else
                        <p>No Comments</p>
                    @endif

                </div>


                <div id="commentForm">
                    <div class="comment">
                        <div class="section-heading">
                            <h6>Post Comment</h6>
                            <div class="section-heading-line-left"></div>
                        </div>

                        @if (Auth::user())
                        <div class="alert alert-primary alert-dismissible fade show" id="mssWrapper">
                            <button type="button" class="close" onclick="cancelreplTo()">&times;</button>
                            <p><b>Reply to this mesage:</b></p>
                            <span id="mssgToReplyTo"></span>
                        </div>
                        <form id="contact-form" name="contact-form" action="{{ route('submitComment') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="form-group mb-0 col-lg-12">
                                    <textarea name="comment" type="text" id="input-message" rows="3" style="min-height: 80px !important" placeholder="Comment" class="form-control">{{ old('comment') }}</textarea>
                                    <div class="formErr">{{$errors->first('comment')}}</div>

                                    <input type="hidden" name="parent_id" id="parentID">
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                </div>

                                <div class="col-lg-8 col-md-7  col-sm-7 mt-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="anonymous">
                                        <label class="custom-control-label" for="customCheck">Post as Anonymous</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-5  col-sm-5">
                                    <button class="submit btn btn-success rounded-0" id="input-submit" style="margin-top: 11px; padding: 12px 30px">Submit</button>
                                </div>
                            </div>

                        </form><br>
                        @else
                            <p class="mb-4">You must <a href="{{ route('login') }}"><b>LOGIN</b></a> or <a href="{{ route('register') }}"><b>REGISTER</b></a> to post a comment in order to reduce spam</p>
                        @endif
                    </div>
                </div>
            </div>


            <div id="sp-right" class="col-sm-3 col-md-3">
                <div class="sp-column class2">

                    <div class="sp-module ">
                        <div class="section-heading mb-4">
                            <h4 style="font-size: 17px">CATEGORIES</h4>
                            <div class="section-heading-line-left mt-1"></div>
                        </div>
                        <div class="sp-module-content">

                            <ul class="list-group list-group-flush">
                                @foreach ($categories as $cat)
                                <li class="list-group-item pl-0">
                                    <a href="{{ route('blogByCategory', $cat->slug) }}">{{ $cat->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <div class="sp-module mt-4">
                        <div class="section-heading mb-4">
                            <h4 style="font-size: 17px">RECENT POST</h4>
                            <div class="section-heading-line-left mt-1"></div>
                        </div>

                        <div class="sp-module-content">
                            <div class="blog_sidebar">
                                @foreach ($recentBlog as $rblog)
                                <div class="latest-posts">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-4 latest-posts-img">
                                            @if ($rblog->image)
                                            <img src="{{ $rblog->image }}" alt="">
                                            @else
                                            <img src="{{ asset('images/blog/demo.jpg') }}" alt="">
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-8 latest-posts-text pl-0">
                                            <a href="{{ route('blogDetails', [$rblog->id, $rblog->slug]) }}">{{ $rblog->title }}</a>
                                            <span>{{ date('F d, Y', strtotime($rblog->created_at)) }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="sp-module mt-4">
                        <div class="section-heading">
                            <h4 style="font-size: 17px">TAGS</h4>
                            <div class="section-heading-line-left mt-1"></div>
                        </div>
                        <div class="sp-module-content"><div class="">
                            <a class="button-tag primary-button" href="/redbiz/component/tags/tag/business">
                                Business
                            </a>
                            <a class="button-tag primary-button" href="/redbiz/component/tags/tag/conusltant">
                                Conusltant
                            </a>
                            <a class="button-tag primary-button" href="/redbiz/component/tags/tag/coach">
                                Coach
                            </a>
                            <a class="button-tag primary-button" href="/redbiz/component/tags/tag/ui-ux">
                                UI/UX
                            </a>
                            <a class="button-tag primary-button" href="/redbiz/component/tags/tag/api">
                                API
                            </a>
                            <a class="button-tag primary-button" href="/redbiz/component/tags/tag/reputation">
                                Reputation
                            </a>
                            <a class="button-tag primary-button" href="/redbiz/component/tags/tag/research">
                                Research
                            </a>
                            <a class="button-tag primary-button" href="/redbiz/component/tags/tag/sale">
                                Sale
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function callThis(val, mssg) {
        document.getElementById('parentID').value = val;
        document.getElementById('mssgToReplyTo').innerHTML = mssg;
        document.getElementById('mssWrapper').style.display = "block";
    }
    function cancelreplTo(params) {
        document.getElementById('parentID').value = '';
        document.getElementById('mssWrapper').style.display = "none";
    }

    function likeBlog() {
        var blogID = {{ $blog->id }};
        document.getElementById('isLoadingTrue').style.display = 'inline';
        document.getElementById('isLoadingFalse').style.display = 'none';
        $.ajax({
            url: "/blog/like/submit/" + blogID,
            type: "Get",
            success: function(data){
                data = data.split('|');
                if(data && Number(data[0]) == 1) {
                    document.getElementById('getSubmitedLike').innerHTML = data[1];
                    console.log(data[1])
                    document.getElementById('isLoadingTrue').style.display = 'none';
                    document.getElementById('isLoadingFalse').style.display = 'none';
                    document.getElementById('afterLiking').style.display = 'inline';
                    // window.location.href =  "/User/auction/pay-bids/details/" + data[1];
                } else {

                }
                // document.getElementById('isLoadingTrue').style.display = 'none';
                // document.getElementById('isLoadingFalse').style.display = 'inline';
            }
        });
    }
</script>

@endsection
