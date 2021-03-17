@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="border col">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Тип комплектующего</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($computerPartsType as $partType)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$partType->computer_parts_type}}</td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="col border ml-2">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Тип оборудования</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach($computerEquipmentType as $equipmentType)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$equipmentType->computer_equipment_type}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
