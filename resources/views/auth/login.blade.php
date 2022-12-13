@extends('guest.layouts.appmain')
@section('title', 'Login')

@section('content')
<style>
    .feature-box-5:hover{
        background: #101010
    }
</style>

    <div class="section-block-parallax" style="background-image: url('{{ asset('images/banner/bg14.jpg') }}');">
        <div class="container">

            <div class="section-heading center-holder white-color">
                <h4>LOGIN</h4> <br>
            </div>

            <x-GuestComps.successMessage/>
            <x-GuestComps.errorMessage/>

            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="feature-box-5 wow fadeInUp"> <i class="fa fa-sign-in"></i>

                        <form method="POST" action="{{ route('login') }}">
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

                            <div class="form-group mt-4">
                                <label for="email">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <a class="text-white" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>


                            <div class="text-center mb-0 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <div class="mt-4" style="font-size: 12px">
                                    Not a member? <a class="text-white" href="{{ route('register') }}">
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
