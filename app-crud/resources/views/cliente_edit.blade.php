@extends('master')

@section('content')
    <div class="w-full max-w-md mx-auto mt-10 p-6 bg-gray-800 text-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Editar Usuário</h1>

        @if (session()->has('message'))
            <div class="mb-4 text-green-400">{{ session()->get('message') }}</div>
        @endif

        <form action="{{ route('clientes.update', ['cliente'=> $cliente->id]) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium mb-1">Nome</label>
                <input 
                    type="text" 
                    name="nome" 
                    value="{{ $cliente->nome }}" 
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ $cliente->email }}" 
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">CPF/CNPJ</label>
                <input 
                    type="text" 
                    name="cpf_cnpj" 
                    value="{{ $cliente->cpf_cnpj }}" 
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Telefone</label>
                <input 
                    type="text" 
                    name="telefone" 
                    value="{{ $cliente->telefone }}" 
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
            </div>

           <div class="flex justify-between gap-4 mt-4">
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition">
                    Atualizar
                </button>
                <a 
                    href="{{ route('users.index') }}" 
                    class="w-full text-center bg-gray-300 text-gray-800 hover:bg-gray-400 py-2 px-4 rounded-md transition dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
