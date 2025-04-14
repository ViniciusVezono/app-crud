@extends('master')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4">Relatório de Vendas</h1>
        <a href="{{ route('clientes.index')}}"> Voltar </a> 
        
        <table class="w-full table-auto border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Cliente</th>
                    <th class="border px-4 py-2">Valor</th>
                    <th class="border px-4 py-2">Data</th>
                    <th class="border px-4 py-2">Recebida</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vendas as $venda)
                    <tr>
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Nenhuma venda registrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
