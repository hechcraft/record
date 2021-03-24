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
                    <p class=""><i class="fa-th"></i>{{$equipment->name}}</p>
                    <p class="ml-auto">Материально отвественное лицо: {{$user->name}}</p>
                </h5>
                <p class="card-text">Количество: {{$equipment->amount}}</p>
                <p class="card-text">Описание: {{$equipment->description}}</p>
                <hr>
                <h3 class="card-text">Комплектющие</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Количество</th>
                            <th scope="col">4</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($parts as $part)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$part->name}}</td>
                            <td>{{$part->amount}}</td>
                            <td>
                                <form action="{{route('parts.show', ['part' => $part->id])}}">
                                    <button class="btn btn-outline-primary">Подробнее</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <footer class="d-flex pt-2 ">
                    <p class=""><i class="fa-th"></i>Дата создания: {{$equipment->created_at}}</p>
                    <p class="ml-auto">Дата последнего изменения: {{$equipment->updated_at}}</p>
                </footer>
                <a href="{{route('equipments')}}" class="btn btn-outline-primary">Назад</a>
            </div>
        </div>
    </div>
@endsection
