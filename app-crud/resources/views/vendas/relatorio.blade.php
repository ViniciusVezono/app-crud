@extends('master')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white rounded shadow-md">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Relatório de Vendas</h1>
            <a href="{{ route('clientes.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded shadow">
                ← Voltar para Clientes
            </a>
        </div>

        <table class="w-full table-auto border border-gray-300 rounded shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">Cliente</th>
                    <th class="border px-4 py-2 text-left">Valor</th>
                    <th class="border px-4 py-2 text-left">Data</th>
                    <th class="border px-4 py-2 text-left">Recebida</th>
                    <th class="border px-4 py-2 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vendas as $venda)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $venda->cliente->nome }}</td>
                        <td class="border px-4 py-2">R$ {{ number_format($venda->valor, 2, ',', '.') }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($venda->data)->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2">
                            @if ($venda->recebida)
                                <span class="text-green-600 font-semibold">Sim</span>
                            @else
                                <span class="text-red-600 font-semibold">Não</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('vendas.edit', $venda->id) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow text-sm">
                                Editar
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Nenhuma venda registrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
