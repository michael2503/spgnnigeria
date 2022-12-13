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
                <h4>CONFIRM CODE</h4> <br>
            </div>


            <x-GuestComps.successMessage/>
            <x-GuestComps.errorMessage/>

            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="feature-box-5 wow fadeInUp"> <i class="fa fa-lock"></i>


                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('submitCode') }}">
                            @csrf

                            <div class="form-group mt-4">
                                <label for="code">Enter Code</label>
                                <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" autocomplete="code" autofocus>
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="text-center mb-0 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Code') }}
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
