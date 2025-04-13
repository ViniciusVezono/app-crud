@extends ('master')

@section('content')
    <h1>Criar usuario</h1>

    @if (session()->has('message'))
        {{ session()->get('message')}}
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="" class="form-label">Nome</label> <br>
        <input
            type="text" 
            name="name"
            aria-describedby="helpId"
            placeholder="Insira o seu nome" 
            required>
        </input>
        <input
            type="email"
            name="email"
            aria-describedby="helpId"
            placeholder="Insira o seu email"
            required>
        </input>
        <input
            type="password" 
            name="password"
            aria-describedby="helpId"
            placeholder="Insira a sua senha"
            required>
        </input>
        <button type="submit">Criar</button>
    </form> 
@endsection