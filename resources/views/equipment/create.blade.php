@extends('layouts.app')
@section('content')
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


    <script>
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
