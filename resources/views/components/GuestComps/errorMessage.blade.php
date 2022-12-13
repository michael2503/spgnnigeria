@if(Session::has('failed'))
<div class="container">
    <div class="d-flex row justify-content-center">
        <div class="alert alert-danger alert-dismissible col-md-auto" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="feather icon-x auth-icon"></i></span></button>
                {{Session::pull('failed')}}
        </div>
    </div>

</div>

@endif
