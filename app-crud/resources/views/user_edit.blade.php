@extends('master')

@section('content')

<div class="flex justify-center items-center min-h-screen bg-gray-400 px-4">
    <div class="w-full max-w-xl bg-slate-500 p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-100 mb-6">Editar Usuário</h1>

        @if (session()->has('message'))
            <div class="mb-4 text-sm text-green-600 dark:text-green-400 text-center">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-100">Nome</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $user->name) }}"
                    required
                    class="mt-1 w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-100">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $user->email) }}"
                    required
                    class="mt-1 w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
