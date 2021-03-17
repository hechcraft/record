@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table table-striped">
            <thread>
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Email</th>
                    <th scope="col">Роль пользователя</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Дата изменения</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <th scope="col">
                            <div style="display: flex; height: 36px; align-items: center">
                                {{$user->name}}
                            </div>
                        </th>
                        <th scope="col">
                            <div style="display: flex; height: 36px; align-items: center">
                                {{$user->email}}
                            </div>
                        </th>
                        <th scope="col">
                            <div style="display: flex; height: 36px; align-items: center">
                                @php($type = $user->userType)
                                {{$type->type}}
                            </div>
                        </th>
                        <th scope="col">
                            <div style="display: flex; height: 36px; align-items: center">
                                {{$user->created_at}}
                            </div>
                        </th>
                        <th scope="col">
                            <div style="display: flex; height: 36px; align-items: center">
                                {{$user->updated_at}}
                            </div>
                        </th>
                        <th scope="col">
                            @if($user->is_verified === 0)
                                <form method="post" action="{{route('verification')}}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary">Аутентифицировать</button>
                                    <input name="id" type="hidden" value="{{$user->id}}">
                                </form>
                            @else
                                <div style="display: flex; height: 36px; align-items: center">
                                    Верифицирован
                                </div>
                            @endif
                        </th>
                        <th scope="col">
                            <form action="{{route('users.show', ['user' => $user->id])}}" method="get">
                                <button type="submit" class="btn btn-outline-success">Изменить</button>
                            </form>
                        </th>
                        <th scope="col">
                            @if($user->id != auth()->id())
                                <form method="POST" action="{{route('users.delete', ['user' => $user->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Удалить</button>
                                </form>
                            @endif
                        </th>
                    </tr>
            </thread>
            @endforeach
        </table>
    </div>
@endsection
