
<x-app-layout>
    <div class="container mx-auto mt-8 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Lista de usuarios:</h1>
        <div class="mb-3">
        </div>
        <div class="space-y-6 mt-4">
            @foreach ($listaUsuarios as $usuario)
            <div class="bg-white p-6 rounded-lg shadow-md mx-3">
                <h1 class="text-xl font-semibold">Nombre de usuario: {{ $usuario->name }}</h1>
                <p class="mt-2 text-gray-600">ID:{{ $usuario->id }}</p>
                <div class="mt-4 flex space-x-4">
                    <x-danger-button class="ml-3" x-data="" x-on:click.prevent="$dispatch('open-modal', 'eliminar-user-modal{{ $usuario->id }}')">{{ __('Eliminar') }}
                    </x-danger-button>
                </div>
                @include('modal.eliminarUserModal')
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>