@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="post" action="{{route('types.store')}}">
            @csrf
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="isEquipment" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Тип оборудования
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="isPart" type="checkbox" value="1" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Тип комплектующего
                </label>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Название типа</label>
                <input type="text" name="typeName" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp" required>
            </div>
            <button type="submit" class="btn btn-outline-success">Сохранить</button>

            @if(session()->get('customError'))
                    <p><strong>{{ session()->get('customError') }}</strong></p>
            @endif
        </form>
    </div>
@endsection
