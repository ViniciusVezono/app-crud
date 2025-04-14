@extends('master')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Vendas</h1>

    <table class="min-w-full bg-white rounded shadow-md">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Cliente</th>
                <th class="py-2 px-4">Valor</th>
                <th class="py-2 px-4">Data</th>
                <th class="py-2 px-4">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
            <tr class="border-t">
                <td class="py-2 px-4">{{ $venda->id }}</td>
                <td class="py-2 px-4">{{ $venda->cliente->nome }}</td>
                <td class="py-2 px-4">R$ {{ number_format($venda->valor, 2, ',', '.') }}</td>
                <td class="py-2 px-4">{{ \Carbon\Carbon::parse($venda->data)->format('d/m/Y') }}</td>
                <td class="py-2 px-4 flex space-x-2">
                    <a href="{{ route('vendas.edit', $venda) }}" class="bg-yellow-400 px-3 py-1 rounded hover:bg-yellow-500">Editar</a>
                </td>
                <td class="py-2 px-4 flex space-x-2">
                    <form action="{{ route('vendas.destroy', $venda) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500  px-3 py-1 rounded hover:bg-red-600">Excluir</button>
                    </form>
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection