@extends('master')

@section('content')
    <div class="w-full md:max-w-6xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Lista de Clientes</h2>
            <a href="{{ route('users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Voltar para Usuários
            </a>
        </div>

        <div class="flex flex-wrap gap-4 mb-6">
            <a href="{{ route('clientes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Criar Cliente
            </a>
            <a href="{{ route('vendas.relatorio') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                Visualizar Todas as Vendas
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-separate border-spacing-0 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 border">Nome</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 border">Email</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 border">CPF/CNPJ</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 border">Telefone</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 border">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    @foreach ($clientes as $cliente)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <td class="px-4 py-2 border text-gray-800 dark:text-gray-200">{{ $cliente->nome }}</td>
                            <td class="px-4 py-2 border text-gray-800 dark:text-gray-200">{{ $cliente->email }}</td>
                            <td class="px-4 py-2 border text-gray-800 dark:text-gray-200">{{ $cliente->cpf_cnpj }}</td>
                            <td class="px-4 py-2 border text-gray-800 dark:text-gray-200">{{ $cliente->telefone }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex flex-col gap-1">
                                    <a href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}" class="text-blue-600 hover:underline">Editar</a>
                                    <a href="{{ route('clientes.show', ['cliente' => $cliente->id]) }}" class="text-red-600 hover:underline">Excluir</a>
                                    <a href="{{ route('clientes.vendas.create', [$cliente->id]) }}" class="text-green-600 hover:underline">Adicionar Venda</a>
                                    <a href="{{ route('vendas.index', ['cliente' => $cliente->id]) }}" class="text-purple-600 hover:underline">Ver Vendas</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if ($clientes->isEmpty())
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                Nenhum cliente encontrado.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
