@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5"></div>
        @guest
            <div class="row mt-5"></div>
            <div class="row mt-5"></div>
            <div class="row d-flex">
                <div class="col">
                    <div class="ml-auto card" style="width: 18rem;">
                        <img class="card-img-top" src="images/login.png" alt="Card image cap">
                        <div class="card-body d-flex justify-content-center">
                            <a href="{{route('login')}}" class="btn btn-outline-primary">Войти</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="images/register.png" alt="Card image cap">
                        <div class="card-body d-flex justify-content-center">
                            <a href="{{route('register')}}" class="btn btn-outline-primary">Зарегестрироваться</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row d-flex">
                <div class="col">
                    <div class="ml-auto card" style="width: 18rem;">
                        <img class="card-img-top" src="images/parts.jpg" alt="Card image cap">
                        <div class="card-body d-flex justify-content-center">
                            <a href="{{route('parts')}}" class="btn btn-outline-primary">Комплектующие</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class=" card" style="width: 18rem;">
                        <img class="card-img-top" src="images/equipment.jpg" alt="Card image cap">
                        <div class="card-body d-flex justify-content-center">
                            <a href="{{route('equipments')}}" class="btn btn-outline-primary">Оборудование</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="ml-auto card" style="width: 18rem;">
                        <img class="card-img-top" src="images/users.png" alt="Card image cap">
                        <div class="card-body d-flex justify-content-center">
                            <a href="{{route('users')}}" class="btn btn-outline-primary">Пользователи</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class=" card" style="width: 18rem;">
                        <img class="card-img-top" src="images/logout.png" alt="Card image cap">
                        <div class="card-body d-flex justify-content-center">
                            <a href="{{route('logout')}}" class="btn btn-outline-danger">Выйти</a>
                        </div>
                    </div>
                </div>
            </div>
        @endguest
    </div>
@endsection
