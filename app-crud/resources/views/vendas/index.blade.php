@extends('master')

@section('content')
    <div class="max-w-6xl mx-auto mt-10 px-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Relatório de Vendas</h2>

        <table class="w-full table-auto border-separate border-spacing-y-2 border border-gray-300 dark:border-gray-600 shadow-md rounded-md overflow-hidden">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Cliente</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Valor</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Data</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800">
                @foreach($vendas as $venda)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">{{ $venda->cliente->nome }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">R$ {{ number_format($venda->valor, 2, ',', '.') }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">{{ \Carbon\Carbon::parse($venda->data)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2">
                            @if($venda->recebida)
                                <span class="text-green-600 font-semibold">Recebida</span>
                            @else
                                <form action="{{ route('vendas.receber', $venda->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded shadow">
                                        Marcar como Recebida
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            <a href="{{ route('clientes.index') }}"
                class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-md shadow">
                 Voltar para Clientes
            </a>
        </div>
    </div>
@endsection
