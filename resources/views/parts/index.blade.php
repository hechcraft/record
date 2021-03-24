@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="accordion" id="accordionExample">
            @foreach($parts as $part)
                <div class="card">
                    <div class="card-header" id="heading1">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapse{{$part->id}}" aria-expanded="true"
                                    aria-controls="collapse{{$part->id}}">
                                {{$part->name}}
                            </button>
                        </h2>
                    </div>
                    <div id="collapse{{$part->id}}" class="collapse {{($loop->iteration === 1) ? 'show' : ''}}"
                         aria-labelledby="heading{{$part->id}}" data-parent="#accordionExample">
                        <div class="card-body">
                            {{$part->description}}
                        </div>
                        <div class="ml-4 mb-2 form form-inline">
                            <form action="{{route('parts.show', ['part' => $part->id])}}" method="get"
                                  class="form-group col-xs-12">
                                <button class="btn btn-outline-primary">Подробней</button>
                            </form>
                            <form action="{{route('parts.edit', ['part' => $part->id])}}" method="get"
                                  class="form-group col-xs-12 ml-2">
                                <button class="btn btn-outline-success">Изменить</button>
                            </form>
                            <form class="form-group col-xs-12 ml-2"
                                  action="{{route('parts.delete', ['part' => $part->id])}}" method="post">
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
