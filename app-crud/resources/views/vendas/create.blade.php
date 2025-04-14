

@extends('master')

{{-- FORMULARIO PARA CRIAR VENDA AO CLIENTE --}}

@section('content')
    <h2 class="text-xl font-semibold mb-4">Nova Venda para {{ $cliente->nome }}</h2>

    <form action="{{ route('vendas.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">

        <div>
            <label class="block text-sm font-medium text-gray-700">Valor (R$):</label>
            <input type="number" name="valor" required step="0.01" class="mt-1 block w-full border rounded px-2 py-1">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Data da Venda:</label>
            <input type="date" name="data" required class="mt-1 block w-full border rounded px-2 py-1">
        </div>

        <div>
            <button type="submit" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Salvar Venda</button>
        </div>
    </form>
@endsection
