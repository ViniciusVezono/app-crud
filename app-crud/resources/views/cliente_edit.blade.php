@extends ('master')

@section('content')
    <h1>Editar usuarios</h1>

    @if (session()->has('message'))
        {{ session()->get('message')}}
    @endif

    <form action="{{ route('clientes.update', ['cliente'=> $cliente->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <label for="" class="form-label">Nome</label> <br>
        <input
            type="text" 
            name="nome"
            aria-describedby="helpId"
            value="{{ $cliente->nome }}">
        </input>
        <input
            type="email"
            name="email"
            aria-describedby="helpId"
            value="{{ $cliente->email }}">
        </input>
        <input
            type="text"
            name="email"
            aria-describedby="helpId"
            value="{{ $cliente->cpf_cnpj }}">
        </input>
        <input
            type="text"
            name="telefone"
            aria-describedby="helpId"
            value="{{ $cliente->telefone }}">
        </input>
        <button type="submit">Enviar</button>
    </form> 
@endsection