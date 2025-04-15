@extends('master')


@section('content')
    <div class="w-full max-w-md mx-auto mt-10 p-6 bg-gray-800 text-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">Nova Venda para {{ $cliente->nome }}</h2>

        <form action="{{ route('vendas.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">

            <div>
                <label class="block text-sm font-medium mb-1">Valor (R$)</label>
                <input 
                    type="number" 
                    name="valor" 
                    step="0.01" 
                    required 
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Data da Venda</label>
                <input 
                    type="date" 
                    name="data" 
                    required 
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition">
                Salvar Venda
            </button>

            <a 
                href="{{ route('clientes.index') }}" 
                class="block text-center mt-2 bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-md transition">
                Cancelar
            </a>
        </form>
    </div>
@endsection
