@extends('master')

@section('content')

    <h2>Usuários</h2>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>

@endsection
