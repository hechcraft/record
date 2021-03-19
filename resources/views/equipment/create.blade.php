@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">


    <form action="{{route('equipments.store')}}" method="post">
        @csrf
        <div class="container">
            <input type="text" hidden name="user_id" value="{{auth()->id()}}">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Название</span>
                </div>
                <input type="text" class="form-control" placeholder="Название" name="name"
                       aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <select class="custom-select" name="type">
                    <option selected>Open this select menu</option>
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
                       aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Описание</span>
                </div>
                <input type="text" class="form-control" placeholder="Описание" name="description" aria-label="Username"
                       aria-describedby="basic-addon1">
            </div>

                <div class="mb-3 ">
                    <div class="col-md-6">
                        <select name="computer_parts_id[]" id="choices-multiple-remove-button" placeholder="Select upto 5 tags" multiple>
                            @foreach($parts as $part)
                                <option value="{{$part->id}}">{{$part->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            <div id="new_chq">
                <input type="hidden" value="1" id="total_chq">
                <div class='input-group mb-3'>

                    <input type='text' class='form-control' placeholder='computer_parts_id' name='computer_parts_id[]'>
                    <button type="button" onclick="add()" class="btn btn-outline-primary ml-2">+</button>
                    <button type="button" onclick="remove()" class="btn btn-outline-danger ml-2">-</button>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success">Подтвердить</button>
        </div>
    </form>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
    <script>
        $(document).ready(function(){

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount:10,
                searchResultLimit:5,
                renderChoiceLimit:5
            });


        });

        $('select').selectpicker();

        $('.add').on('click', add);
        $('.remove').on('click', remove);

        function add() {
            var new_chq_no = parseInt($('#total_chq').val()) + 1;
            var new_input = "        <div class='input-group mb-3' id='new_" + new_chq_no + "'><input name='computer_parts_id[]' type='text' class='form-control' placeholder='Описание' name='description'></div>"

            $('#new_chq').append(new_input);

            $('#total_chq').val(new_chq_no);
        }

        function remove() {
            var last_chq_no = $('#total_chq').val();

            if (last_chq_no > 1) {
                $('#new_' + last_chq_no).remove();
                $('#total_chq').val(last_chq_no - 1);
            }
        }

    </script>
@endsection
