@extends('layouts.app')
@section('content')
    <form action="{{route('printEquipmentRegistrationNumber')}}" method="get">
        <div class="container">
            <div class="row">
                @foreach($equipments as $equipment)
                    <div class="col-sm-6 mt-2 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="m-2">
                                    <input class="form-check-input" type="checkbox" name="exampleRadios[]"
                                           id="exampleRadios{{$equipment->id}}"
                                           value="{{$equipment->id}}">
                                    <label class="form-check-label" for="exampleRadios{{$equipment->id}}">
                                        {{$equipment->name}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class=" mt-2 btn btn-outline-primary">Печать</button>
            </div>
        </div>
    </form>
@endsection
