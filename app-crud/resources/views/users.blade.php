@extends('master')

@section('content')

<div class="flex justify-center items-center min-h-screen bg-gray-400 px-4">
    <div class="w-full max-w-4xl bg-slate-500 p-8 rounded-lg shadow-md">

        <h2 class="text-2xl font-bold text-center text-gray-100 mb-6">Lista de Usuários</h2>

        <div class="flex justify-center gap-4 mb-6">
            <a href="{{ route('users.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                Criar Usuário
            </a>
            <a href="{{ route('clientes.index') }}"
               class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                Ir para Clientes
            </a>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="flex justify-center gap-4 mb-6">
            @csrf
            <button type="submit"class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition">Sair</button>
        </form>

        <div class="overflow-x-auto rounded-lg shadow border border-gray-300 dark:border-gray-600">
            <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-600 text-sm text-left text-gray-800 dark:text-gray-200">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 font-semibold">Nome</th>
                        <th class="px-4 py-2 font-semibold">Senha</th>
                        <th class="px-4 py-2 font-semibold text-center" colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <td class="px-4 py-2 border-t border-gray-300 dark:border-gray-700">{{ $user->name }}</td>
                            <td class="px-4 py-2 border-t border-gray-300 dark:border-gray-700">{{ $user->password }}</td>
                            <td class="px-4 py-2 border-t border-gray-300 dark:border-gray-700 text-center">
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                   class="text-indigo-600 hover:underline font-medium">
                                    Editar
                                </a>
                            </td>
                            <td class="px-4 py-2 border-t border-gray-300 dark:border-gray-700 text-center">
                                <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                   class="text-red-600 hover:underline font-medium">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center px-4 py-4 text-gray-600 dark:text-gray-400">
                                Nenhum usuário encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
