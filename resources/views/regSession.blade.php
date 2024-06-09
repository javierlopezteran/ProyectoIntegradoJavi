<x-app-layout>
    <div class="container mt-8 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Rutinas:</h1>
        <div class="space-y-6 mt-4">
            @foreach ($routines as $routine)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h1 class="text-xl font-semibold">{{ $routine->name }}</h1>
                    <p class="mt-2 text-gray-600">{{ $routine->description }}</p>
                    <div class="mt-4 flex space-x-4">
                        <x-primary-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'registrar-sesion-rutina{{ $routine->id }}')">{{ __('Registrar entreno') }}
                        </x-primary-button>
                    </div>
                </div>
                @include('modal.registrarSesionRutina')
            @endforeach
        </div>
    </div>
</x-app-layout>
