@extends('layouts.app')
@section('content')
    <link rel="stylesheet"
          href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">

    <div class="container">
        <form action={{route('equipments.update', ['equipment' => $equipment->id])}}"" method="post">
            @method('put')
            @csrf
            <input type="text" hidden name="user_id" value="{{$equipment->user_id}}">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Название</span>
                </div>
                <input type="text" class="form-control" placeholder="Название" name="name"
                       aria-describedby="basic-addon1" value="{{$equipment->name}}">
            </div>

            <div class="input-group mb-3">
                <select class="custom-select" name="type">
                    <option selected>{{$currentType[0]->computer_equipment_type}}</option>
                    @foreach($types as $type)
                        <option value="{{$type->computer_equipment_type}}">{{$type->computer_equipment_type}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Количество</span>
                </div>
                <input type="number" class="form-control" placeholder="Количество" name="amount" aria-label="Username"
                       aria-describedby="basic-addon1" value="{{$equipment->amount}}">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Описание</span>
                </div>
                <input type="text" class="form-control" placeholder="Описание" name="description"
                       aria-describedby="basic-addon1" value="{{$equipment->description}}">
            </div>

            <div class="mb-3 d-flex justify-content-center">
                <div class="col-md-6">
                    <select name="computer_parts_id[]" id="choices-multiple-remove-button"
                            placeholder="Выберите необходимы части ПК" multiple>
                        @foreach($parts as $part)
                            <option value="{{$part->id}}" selected>{{$part->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-outline-success ">Сохранить</button>
            </div>
        </form>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script
        src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
    <script>
        $(document).ready(function () {

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount: 10,
                searchResultLimit: 5,
                renderChoiceLimit: 5
            });


        });
    </script>
@endsection
