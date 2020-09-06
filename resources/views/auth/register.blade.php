@extends('layouts.authlayout')

@section('form')
<style>
    .input100{
       border-radius: 40px 40px 40px 40px!important;
       background-color: #E8F0FE;
    }
    .wrap-input100{
        border: none;
    }
    .login100-form-btn{
     border-radius: 40px 40px 40px 40px;
     background-color: blue; 
    }
 </style>
 
 <div class="login100-more"> <img src="{{ asset('img/selfilogin.gif') }}" width="100%" height="100%" alt="img-login" /></div>
    <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
        @csrf
        <span class="login100-form-title p-b-34">
            Sign Up
        </span>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Type user name">
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"  name="email" placeholder="Email">
            <span class="focus-input100"></span>
             @error('email')
                <span class="invalid-feedback m-l-16" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Type user name">
            <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" placeholder="Full Name" value="{{ old('name') }}" autocomplete="name" autofocus>
            <span class="focus-input100"></span>
            @error('name')
                <span class="invalid-feedback m-l-16" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="wrap-input100 validate-input m-b-20" data-validate="Type user name">
            <input id="username" type="text" class="input100 @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') }}" autocomplete="username" autofocus>
            <span class="focus-input100"></span>
            @error('username')
                <span class="invalid-feedback m-l-16" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="wrap-input100 validate-input m-b-20" data-validate="Type password">
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"  name="password" placeholder="Password" autocomplete="new-password">
            <span class="focus-input100"></span>
            @error('password')
                <span class="invalid-feedback m-l-16" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Type password">
            <input id="password-confirm" type="password" class="input100"  name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
            <span class="focus-input100"></span>
            @error('password-confirm')
                <span class="invalid-feedback m-l-16" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn" >
                Register
            </button>
        </div>

        <div class="w-full text-center m-t-49">
            <a href="{{ route('login') }}" class="txt3 text-primary">
                Login
            </a>
        </div>

    </form>
@endsection