@extends('master')

@section('content')
    <div class="w-full md:w-[600px] mx-auto bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800 dark:text-white text-center">Criar Usuário</h1>

        @if (session()->has('message'))
            <div class="mb-4 text-green-600 dark:text-green-400 text-center">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST" class="space-y-6 text-lg">
            @csrf

            <div>
                <label for="name" class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Nome</label>
                <input 
                    type="text" 
                    name="name" 
                    placeholder="Insira o seu nome"
                    value="{{ old('name') }}"
                    required
                    class="block w-full px-4 py-2 rounded-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Insira o seu email"
                    value="{{ old('email') }}"
                    required
                    class="block w-full px-4 py-2 rounded-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Senha</label>
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Insira a sua senha"
                    required
                    class="block w-full px-4 py-2 rounded-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 text-lg font-medium">
                    Criar
                </button>

                <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
