@extends('layouts.app')
@section('content')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"
          integrity="sha512-rRQtF4V2wtAvXsou4iUAs2kXHi3Lj9NE7xJR77DE7GHsxgY9RTWy93dzMXgDIG8ToiRTD45VsDNdTiUagOFeZA=="
          crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="{{route('register')}}" class="signup-image-link">Создать аккаунт</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="login-form" action="{{route('login')}}">
                            @csrf
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="your_name" placeholder="Ваш Email"/>
                            </div>
                            @error('email')
                            <p>{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Пароль"/>
                            </div>
                            @error('password')
                            <p>{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <input type="checkbox" name="remembere" id="remember-me" class="agree-term"/>
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Запомнить
                                    меня</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Войти"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
