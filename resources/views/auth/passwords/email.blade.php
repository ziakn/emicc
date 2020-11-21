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
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form class="login100-form" method="POST" action="{{ route('password.email') }}">
                @csrf
                <span class="login100-form-title">
                    Reset Password
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

                
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>

            

                
                
            </form>
        </div>
    </div>
</div>

@endsection
