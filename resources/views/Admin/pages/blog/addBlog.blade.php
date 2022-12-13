
@extends("Admin.AdminLayout.app")
@section('title', 'Add Blog')


@section('content')
<style>
    .post-slide{
        /* margin: 0 15px; */
        border-bottom: 1px solid #dadada;
        /* box-shadow: 0 0 5px rgba(167, 197, 167, 0.8); */
        transition: all 0.4s ease-in-out 0s;
        -webkit-box-shadow: 0px 10px 30px 0px rgb(50 50 50 / 16%);
        -moz-box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);
        box-shadow: 0px 10px 30px 0px rgb(50 50 50 / 16%);
    }
    .post-slide .post-img{
        position: relative;
        overflow: hidden;
    }
    .post-slide .post-img:before{
        content: "";
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0);
        transition: all 0.4s linear 0s;
    }
    .post-slide:hover .post-img:before{
        background: rgba(0, 0, 0, 0.6);
    }
    .post-slide .post-img img{
        width: 100%;
        height: auto;
    }
    .post-slide .category {
        width: 30%;
        font-size: 16px;
        color: #fff;
        line-height: 11px;
        text-align: center;
        text-transform: capitalize;
        padding: 11px 0;
        background: #d21e2b;
        position: absolute;
        bottom: 0;
        left: -50%;
        transition: all 0.5s ease-in-out 0s;
    }
    .post-slide:hover .category{
        left: 0;
    }
    .post-slide .post-review{
        padding: 25px 20px;
        background: #fff;
        position: relative;
    }
    .post-slide .post-title{
        margin: 0;
    }
    .post-slide .post-title a{
        display: block;
        font-size: 16px;
        color: #d21e2b;
        font-weight: bold;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 15px;
        transition: all 0.30s linear 0s;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .post-slide .post-title a:hover{
        text-decoration: none;
        color: #555;
    }
    .post-slide .post-description{
        font-size: 15px;
        color: #555;
        line-height: 26px;
        height: 105px;
    }
    .post-review .post-bar{
        margin-top: 20px;
    }
    .post-bar span{
        display: inline-block;
        font-size: 14px;
    }
    .post-bar span i{
        margin-right: 0px;
        color: #999;
    }
    .post-bar span a{
        color: #999;
        text-transform: uppercase;
    }
    .post-bar span a:hover{
        text-decoration: none;
        color: #d21e2b;
    }
    .post-bar span.comments{
        float: right;
    }
    @media only screen and (max-width: 359px) {
        .post-slide .category{ font-size: 13px; }
    }
    .owl-carousel{
        display: block;
        margin-top: 50px
    }
</style>

<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Add Blog"
                urlTitle="Home"
                url="{{ route('adminDashboard') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>




            <form method="POST" action="{{ route('submitAddedBlog') }}" id="myAwesomeDropzone" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Blog Info</h5>

                            <div class="form-group mb-3">
                                <label>Blog Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                <div class="formErr">{{$errors->first('title')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Select category</label>
                                <select name="category" class="form-control" id="">
                                    <option label="Select category"></option>
                                    @foreach ($blogCats as $cat)
                                    <option value="{{ $cat->slug }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <div class="formErr">{{$errors->first('category')}}</div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="text-uppercase mt-0 mb-1 bg-light p-2">Blog Image</h5>
                            <div class="mt-3">
                                <input type="file" class="dropify" data-default-file="" name="photo"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Blog Details</h5>
                    <label>Content</label>
                    <textarea id="elm1" name="content">{{ old('content') }}</textarea>
                    <div class="formErr">{{$errors->first('content')}}</div>
                </div>

                <!-- end row -->
                <div class="row">
                  <div class="col-12">
                    <div class="text-center mb-3">
                      <button type="submit" class="btn w-sm btn-success waves-effect waves-light">UPDATE</button>
                    </div>
                  </div> <!-- end col -->
                </div>
                <!-- end row -->
            </form>




        </div>

    </div>
</div>



<!-- jQuery  -->
<script src="{{ asset('js/wysiwug/jquery.min.js') }}"></script>
<script src="{{ asset('js/wysiwug/fastclick.js') }}"></script>
<script src="{{ asset('js/wysiwug/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
    if($("#elm1").length > 0){
        tinymce.init({
            selector: "textarea#elm1",
            theme: "modern",
            height:300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });
    }
});
</script>

@endsection
