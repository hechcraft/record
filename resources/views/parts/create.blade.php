@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('parts.store')}}" method="post">
            @csrf
            <input type="text" hidden name="user_id" value="{{auth()->id()}}">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Название</span>
                </div>
                <input type="text" class="form-control" placeholder="Название" name="name"
                       aria-describedby="basic-addon1" value="{{old('name')}}">
            </div>
            @error('name')
                <div class="p-3 rounded mb-2 bg-danger text-white">{{$message}}</div>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Количество</span>
                </div>
                <input type="number" class="form-control" placeholder="Количество" name="amount"
                       aria-describedby="basic-addon1" value="{{old('amount')}}">
            </div>
            @error('amount')
                <div class="p-3 rounded mb-2 bg-danger text-white">{{$message}}</div>
            @enderror
            <div class="input-group mb-3">
                <select class="custom-select" name="type">
                    <option selected value="">Выберите тип комплектующего</option>
                    @foreach($types as $type)
                        <option value="{{$type->computer_parts_type}}">{{$type->computer_parts_type}}</option>
                    @endforeach
                </select>
            </div>
            @error('type')
                <div class="p-3 mb-2 rounded bg-danger text-white">{{$message}}</div>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Описание</span>
                </div>
                <input type="text" class="form-control" placeholder="Описание" name="description"
                       aria-describedby="basic-addon1" value="{{old('description')}}">
            </div>
            @error('description')
                <div class="p-3 mb-2 rounded bg-danger text-white">{{$message}}</div>
            @enderror
            <button type="submit" class="btn btn-outline-success">Сохранить</button>
        </form>
    </div>
@endsection
