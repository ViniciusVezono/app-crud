@extends ('master')

@section('content')
    <h1>Editar usuarios</h1>

    @if (session()->has('message'))
        {{ session()->get('message')}}
    @endif

    <form action="{{ route('users.update', ['user'=> $user->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <label for="" class="form-label">Nome</label> <br>
        <input
            type="text" 
            name="name"
            aria-describedby="helpId"
            value="{{ $user->name }}">
        </input>
        <input
            type="email"
            name="email"
            aria-describedby="helpId"
            value="{{ $user->email }}">
        </input>
        <button type="submit">Enviar</button>
    </form> 
@endsection