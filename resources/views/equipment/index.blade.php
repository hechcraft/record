@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="accordion" id="accordionExample">
            @foreach($equipments as $item)
                <div class="card">
                    <div class="card-header" id="heading1">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapse{{$item->id}}" aria-expanded="true"
                                    aria-controls="collapse{{$item->id}}">
                                {{$item->name}}
                            </button>
                        </h2>
                    </div>
                    <div id="collapse{{$item->id}}" class="collapse {{($loop->iteration === 1) ? 'show' : ''}}"
                         aria-labelledby="heading{{$item->id}}" data-parent="#accordionExample">
                        <div class="card-body">
                            {{$item->description}}
                        </div>
                        <div class="ml-4 mb-2 form form-inline">
                            <form action="" class="form-group col-xs-12">
                                <button class="btn btn-outline-primary">Подробней</button>
                            </form>
                            <form action="{{route('equipments.edit', ['equipment' => $item->id])}}" method="get"
                                  class="form-group col-xs-12 ml-2">
                                <button class="btn btn-outline-success">Изменить</button>
                            </form>
                            <form class="form-group col-xs-12 ml-2"
                                  action="{{route('equipments.delete', ['equipment' => $item->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
