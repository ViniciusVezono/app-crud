@extends('master')

@section('content')

<div class="max-w-md mx-auto mt-10 p-6 bg-gray-800 text-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Cliente - {{ $cliente->nome }}</h2>

    <form 
        action="{{ route('clientes.destroy', ['cliente'=>$cliente->id]) }}" 
        method="POST"
        onsubmit="return confirm('Tem certeza que deseja deletar este cliente?');"
    >
        @csrf
        @method('DELETE')

        <button 
            type="submit" 
            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-md transition">
            Deletar Cliente
        </button>
    </form>

    <a 
        href="{{ route('clientes.index') }}" 
        class="block text-center mt-4 bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-md transition">
        Cancelar
    </a>
</div>

@endsection
