@extends('layouts.app')
@section('style')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<link href="{{ asset('css/util.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
@endsection
@section('content')
<div class="limiter">
    <div class="container-login150">
        <div class="wrap-login150">

            <form class="regis100-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="reg100-pic">
                    <img src="/images/img-02.png" class="d-flex" alt="">
                </div>
                <span class="reg100-form-title">
                    Registration
                </span>
                <div class="p-b-10 row">
                    <div class="wrap-input100 col-md-12 col-sm-12" >
                        <input type="text" name="name" placeholder=" Name" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                  
                </div>

                <div class="p-b-10 row">
                    <div class="wrap-input100 col-lg-6" >
                        <input type="text" name="email" placeholder="Email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 col-lg-6" >
                        <input type="tel" name="contact" value="{{ old('contact') }}" placeholder="Mobile Number" class="input100">
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>

                <div class="p-b-10 ">
                    <div class="wrap-input100 " >
                        <input  type="text" name="company_name" placeholder="Company Name" value="{{ old('company_name') }}" required class="input100">
                        <span class="symbol-input100">
                            <i class="fa fa-building" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>

                <div class="p-b-10 row">
                    <div class="wrap-input100 col-md-6 col-sm-12" >
                        <input type="text" name="city" placeholder="City" value="{{ old('city') }}" required  class="input100">
                        <span class="symbol-input100">
                            <i class="fa fa-building" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="wrap-input100 col-md-6 col-sm-12" >
                        <input type="text" name="postcode" placeholder="Postcode" value="{{ old('postcode') }}" required class="input100">
                        <span class="symbol-input100">
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
                <div class="p-b-10 ">
                    <div class="wrap-input100 " >
                        <input  type="text" name="address" placeholder="Street Address" value="{{ old('address') }}" required class="input100">
                        <span class="symbol-input100">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
                <div class="p-b-10 row">
                <div class="wrap-input100 col-md-6 col-sm-12" >
                        <select name="country" class="input100">
                            <option value="Country" selected>Country</option>
                            <option value="saab">a</option>
                            <option value="fiat" >a</option>
                            <option value="audi">a</option>
                        </select>
                        <span class="symbol-input100">
                            <i class="fa fa-globe-asia" aria-hidden="true"></i>
                        </span>
                </div>
                <div class="wrap-input100 col-md-6 col-sm-12" >
                        <input type="text" name="company_contact" placeholder="Company Contact" value="{{ old('company_contact') }}" required  class="input100">
                        <span class="symbol-input100">
                            <i class="fa fa-grip-lines" aria-hidden="true"></i>
                        </span>
                    </div>
                    </div>
                


                <div class="p-b-10 row">
                    <div class="wrap-input100 col-md-6 col-sm-12" >
                        <input type="password" id="password" name="password" placeholder="Password" class="input100 @error('password') is-invalid @enderror"  required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 col-md-6 col-sm-12" >
                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" class="input100">
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
                
                <div class="p-t-5">
                    <div class="form-check text-center">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label txt2" for="remember">
                            {{ __('I have read and agree to the Terms of Service') }}
                        </label>
                    </div>
                </div>
                
                <div class="container-login100-form-btn">
                    <button type="submit" class="login150-form-btn">
                        {{ __('Register') }}
                    </button>
                </div>

                
            </form>
        </div>
    </div>
</div>
@endsection
