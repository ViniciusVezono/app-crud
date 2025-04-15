@extends ('master')

@section('content')
    <div class="w-full max-w-md mx-auto mt-10 p-6 bg-gray-800 text-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-6 text-center">Criar Cliente</h1>

        @if (session()->has('message'))
            <div class="mb-4 text-green-400 text-center">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('clientes.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Nome</label>
                <input
                    type="text" 
                    name="nome"
                    placeholder="Insira o seu nome"
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    placeholder="Insira o seu email"
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">CPF/CNPJ</label>
                <input
                    type="text"
                    name="cpf_cnpj"
                    placeholder="Insira o seu CPF ou CNPJ"
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Telefone</label>
                <input
                    type="number"
                    name="telefone"
                    placeholder="Insira o seu telefone"
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <button
                type="submit"
                class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition">
                Criar
            </button>

            <a href="{{ route('clientes.index') }}"
               class="block text-center mt-2 bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-md transition">
                Cancelar
            </a>
        </form>
    </div>
@endsection
