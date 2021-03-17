@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="post" action="{{route('users.update', ['user' => $user->id])}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <select name="user_role" class="custom-select custom-select-lg mb-3">
                    <option selected>Open this select menu</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach
                </select>
{{--                <label for="user_role" class="form-label">Роль пользователя</label>--}}
{{--                <input type="text" class="form-control" id="user_role" name="user_role" value="{{$user->user_role ?? 'Роль не задана'}}">--}}
{{--                @error('user_role')--}}
{{--                <div class="alert alert-danger">--}}
{{--                    {{$message}}--}}
{{--                </div>--}}
{{--                @enderror--}}
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-success">Изменить</button>
            </div>
        </form>
    </div>
@endsection

