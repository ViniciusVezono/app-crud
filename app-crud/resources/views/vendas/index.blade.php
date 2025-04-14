<table class="min-w-full border">
    <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Cliente</th>
            <th class="px-4 py-2">Valor</th>
            <th class="px-4 py-2">Data</th>
            <th class="px-4 py-2">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vendas as $venda)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $venda->cliente->nome }}</td>
                <td class="px-4 py-2">R$ {{ number_format($venda->valor, 2, ',', '.') }}</td>
                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($venda->data)->format('d/m/Y') }}</td>
                <td class="px-4 py-2">
                    @if($venda->recebida)
                        <span class="text-green-600 font-semibold">Recebida</span>
                    @else
                        <form action="{{ route('vendas.receber', $venda->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="bg-green-500 hover:bg-green-600 px-3 py-1 rounded">
                                Marcar como Recebida
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table
