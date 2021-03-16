@extends('layouts.app')
@section('content')
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"
      integrity="sha512-rRQtF4V2wtAvXsou4iUAs2kXHi3Lj9NE7xJR77DE7GHsxgY9RTWy93dzMXgDIG8ToiRTD45VsDNdTiUagOFeZA=="
      crossorigin="anonymous"/>

<link rel="stylesheet" href="{{asset('css/auth.css')}}">
<div class="main">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form" action="{{route('register')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Ваше имя"/>
                        </div>
                        @error('name')
                            <p>{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Ваш Email" value="{{old('email')}}"/>
                        </div>
                        @error('email')
                            <p>{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Пароль"/>
                        </div>
                        @error('password')
                        <p>{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password_confirmation" id="re_pass" placeholder="Повторите ваш пароль"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Подтвердить"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="{{route('login')}}" class="signup-image-link">Я уже пользователь</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sing in  Form -->
{{--    <section class="sign-in">--}}
{{--        <div class="container">--}}
{{--            <div class="signin-content">--}}
{{--                <div class="signin-image">--}}
{{--                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>--}}
{{--                    <a href="#" class="signup-image-link">Create an account</a>--}}
{{--                </div>--}}

{{--                <div class="signin-form">--}}
{{--                    <h2 class="form-title">Sign up</h2>--}}
{{--                    <form method="POST" class="register-form" id="login-form">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>--}}
{{--                            <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>--}}
{{--                            <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term"/>--}}
{{--                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember--}}
{{--                                me</label>--}}
{{--                        </div>--}}
{{--                        <div class="form-group form-button">--}}
{{--                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <div class="social-login">--}}
{{--                        <span class="social-label">Or login with</span>--}}
{{--                        <ul class="socials">--}}
{{--                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>--}}
{{--                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>--}}
{{--                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

</div>

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
