@extends('master')

@section('content')

    <h2 class="text-2xl font-semibold mb-4">Listas de clientes</h2>

    <a href="{{ route('clientes.create')}}"> Criar clientes </a> 
    
    <table class="min-w-full table-auto border-separate border-spacing-2 border border-gray-400 dark:border-gray-500 rounded-lg shadow-lg">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-700">
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">Nome</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">Email</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">CPF/CNPJ</th>                
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">Telefone</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800">
            @foreach ($clientes as $cliente)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-700">{{ $cliente->nome }}</td>
                <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-700">{{ $cliente->email }}</td>
                <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-700">{{ $cliente->cpf_cnpj }}</td>
                <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-700">{{ $cliente->telefone }}</td>
                <td class="px-4 py-2 text-sm text-green-700 dark:text-gray"><a href="{{ route('clientes.edit',['cliente' => $cliente -> id]) }}">Edit </a></td>
                <td class="px-4 py-2 text-sm text-green-700 "><a href="{{ route('clientes.show', ['cliente' => $cliente->id]) }}">Excluir</a></td>
                <td class="px-4 py-2 text-sm text-green-700 "><a href="{{ route('clientes.vendas.create', [$cliente->id]) }}">Adicionar uma venda</a></td>
            </tr>
            @endforeach
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">

            </tr>
        </tbody>
    </table>

@endsection
