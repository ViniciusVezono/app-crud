@extends('master')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow-md">
    <h1 class="text-xl font-bold mb-4">Editar Venda</h1>

    <form action="{{ route('vendas.update', $venda) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-4">
            <label class="block font-medium mb-1">Cliente</label>
            <input type="text" value="{{ $venda->cliente->nome }}" class="w-full bg-gray-100 border px-3 py-2 rounded" disabled>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Valor</label>
            <input type="number" step="0.01" name="valor" value="{{  $venda->valor }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Data</label>
            <input type="date" name="data" value="{{  $venda->data }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('vendas.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 rounded hover:bg-blue-700">Salvar</button>
        </div>

     
    </form>
 <a href="{{ route('vendas.index')}}"> Voltar </a>
</div>
@endsection
