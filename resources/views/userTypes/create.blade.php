@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('users.types.store')}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Тип пользователя</label>
                    <input type="text" name="type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите тип пользователя">
                </div>
            <button class="btn btn-outline-success">Сохранить</button>
        </form>
    </div>
@endsection
