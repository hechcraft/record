@extends('layouts.app')
@section('content')
    <div class="container">
        <form action={{route('parts.update', ['part' => $part->id])}}"" method="post">
            @method('put')
            @csrf
            <input type="text" hidden name="user_id" value="{{$part->user_id}}">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Название</span>
                </div>
                <input type="text" class="form-control" placeholder="Название" name="name"
                       aria-describedby="basic-addon1" value="{{$part->name}}">
            </div>
            @error('name')
            <div class="p-3 rounded mb-2 bg-danger text-white">{{$message}}</div>
            @enderror


            <div class="input-group mb-3">
                <select class="custom-select" name="type">
                    <option selected value="{{$currentType[0]->computer_parts_type}}">{{$currentType[0]->computer_parts_type}}</option>
                    @foreach($types as $type)
                        <option value="{{$type->computer_parts_type}}">{{$type->computer_parts_type}}</option>
                    @endforeach
                </select>
            </div>
            @error('type')
            <div class="p-3 mb-2 rounded bg-danger text-white">{{$message}}</div>
            @enderror

            <div class="input-group mb-3">
                <select class="custom-select" name="user_id">
                    <option selected value="{{$part->user_id}}">{{$part->user->name}}</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('user_id')
            <div class="p-3 mb-2 rounded bg-danger text-white">{{$message}}</div>
            @enderror

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Количество</span>
                </div>
                <input type="number" class="form-control" placeholder="Количество" name="amount" aria-label="Username"
                       aria-describedby="basic-addon1" value="{{$part->amount}}">
            </div>
            @error('amount')
                <div class="p-3 rounded mb-2 bg-danger text-white">{{$message}}</div>
            @enderror

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Описание</span>
                </div>
                <input type="text" class="form-control" placeholder="Описание" name="description"
                       aria-describedby="basic-addon1" value="{{$part->description}}">
            </div>
            @error('description')
                <div class="p-3 rounded mb-2 bg-danger text-white">{{$message}}</div>
            @enderror


            <div class="d-flex justify-content-center">
                <button class="btn btn-outline-success ">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
