@extends('guest.layouts.appmain')
@section('title', 'Reset Password')

@section('content')
<style>
    .feature-box-5:hover{
        background: #101010
    }
</style>

    <div class="section-block-parallax" style="background-image: url('{{ asset('images/banner/bg14.jpg') }}');">
        <div class="container">

            <div class="section-heading center-holder white-color">
                <h4>FORGOT PASSWORD</h4> <br>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="feature-box-5 wow fadeInUp"> <i class="fa fa-lock"></i>


                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('submitEmailForPassword') }}">
                            @csrf

                            <div class="form-group mt-4">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="text-center mb-0 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Code') }}
                                </button>

                                <div class="mt-4" style="font-size: 12px">
                                    <a class="text-white" href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a> OR <a class="text-white" href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
