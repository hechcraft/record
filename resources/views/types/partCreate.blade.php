@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="post" action="{{route('types.store')}}">
            @csrf
            <div class="form-check">
                <input class="form-check-input" name="isPart" type="checkbox" value="1" id="flexCheckChecked" hidden checked>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Название типа</label>
                <input type="text" name="typeName" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp" required>
            </div>
            @error('typeName')
                <div class="p-3 rounded mb-2 bg-danger text-white">{{$message}}</div>
            @enderror
            <button type="submit" class="btn btn-outline-success">Сохранить</button>
        </form>
    </div>
@endsection
