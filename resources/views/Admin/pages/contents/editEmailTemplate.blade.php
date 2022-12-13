
@extends("Admin.AdminLayout.app")
@section('title', 'Edit Email template')


@section('content')

<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Edit Email Template"
                urlTitle="Email Template"
                url="{{ route('emailTemplateView') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>



            <form method="POST" action="{{ route('submitUpdatedEmail') }}" id="myAwesomeDropzone" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Email Title</h5>
                            <label><small class="text-danger">Do not edit content from and with the curly braces {...}</small></label>
                            <div class="form-group mb-3">
                                <input type="text" name="title" class="form-control" value="{{ $mail->title }}">
                                <input type="hidden" name="id" class="form-control" value="{{ $mail->id }}">
                                <div class="formErr">{{$errors->first('title')}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Email Contents</h5>
                    <label><small class="text-danger">Do not edit content from and with the curly braces {...}</small></label>
                    <textarea id="elm1" name="content">{{ $mail->content }}</textarea>
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
