@extends('layouts.app')
@section('style')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<link href="{{ asset('css/util.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">


@endsection
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic " >
                <img src="/logo.png"  alt="IMG">
            </div>

            <form class="login100-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title">
                    Login
                </span>
                <div class="p-b-10">
                    <div class="wrap-input100 " >
                        <input id="email" type="text" name="email" placeholder="Email" class="input100  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>


                


                
                <div class="wrap-input100 " >
                    <input id="password"  type="password" placeholder="Password" class="input100 @error('password') is-invalid 
                    @enderror" name="password" required autocomplete="current-password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="p-t-5">
                    <div class="form-check text-center">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label txt2" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                

                @if (Route::has('password.request'))
                <div class="text-center txt2 p-t-12">
                    <a class="txt2" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
                @endif

                @if (Route::has('register'))
                    <div class="text-center txt2 p-t-12">
                        <a class="txt2" href="{{ route('register') }}">
                            {{ __('Create your Account') }}
                            <i class="m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                @endif
                
            </form>
        </div>
    </div>
</div>


@endsection
