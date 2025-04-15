@extends('master')

@section('content')
<div class="max-w-md w-full bg-white dark:bg-gray-800 p-6 rounded shadow-lg">
    <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-white">Usuário: {{ $user->name }}</h2>

    <p class="mb-6 text-gray-700 dark:text-gray-300">Tem certeza que deseja excluir este usuário?</p>

    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" class="flex justify-end space-x-2">
        @csrf
        @method('DELETE')
        <a href="{{ route('users.index') }}" 
           class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
            Cancelar
        </a>
        <button type="submit" 
            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition duration-200">
            Deletar Usuário
        </button>
    </form>
</div>
@endsection
