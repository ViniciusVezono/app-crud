@extends ('master')

@section('content')
    <h1>Criar cliente</h1>

    @if (session()->has('message'))
        {{ session()->get('message')}}
    @endif

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <label for="" class="form-label">Nome</label> <br>
        <input
            type="text" 
            name="nome"
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
            type="text" 
            name="cpf_cnpj"
            aria-describedby="helpId"
            placeholder="Insira o seu cpf ou cnpj"
            required>
        </input>
        <input
            type="text" 
            name="telefone"
            aria-describedby="helpId"
            placeholder="Insira o seu telefone"
            required>
        </input>
        <button type="submit">Criar</button>
    </form> 
@endsection