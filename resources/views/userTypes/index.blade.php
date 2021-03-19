@extends('layouts.app')
@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach($types as $type)
                <form action="{{route('users.types.delete', ['id' => $type->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="list-group-item list-group-item-action list-group-item-danger mt-2">
                        {{$type->type}}
                    </button>
                </form>
            @endforeach
        </ul>
    </div>
@endsection
