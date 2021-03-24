@extends('layouts.app')
@section('content')
    <style>
        .card {
            margin: 0 auto;
            float: none;
            margin-bottom: 10px;
        }
    </style>
    <div class="container">
        <div class="card w-75">
            <div class="card-body">
                <h5 class="card-title d-flex">
                    <p class=""><i class="fa-th"></i>{{$part->name}}</p>
                    <p class="ml-auto">Материально отвественное лицо: {{$user->name}}</p>
                </h5>
                <p class="card-text">Количество: {{$part->amount}}</p>
                <p class="card-text">Описание: {{$part->description}}</p>
                <hr>
                <footer class="d-flex pt-2 ">
                    <p class=""><i class="fa-th"></i>Дата создания: {{$part->created_at}}</p>
                    <p class="ml-auto">Дата последнего изменения: {{$part->updated_at}}</p>
                </footer>
                <a href="{{url()->previous()}}" class="btn btn-outline-primary">Назад</a>
            </div>
        </div>
    </div>
@endsection
