<x-app-layout>
    <div class="container mt-8 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Rutinas:</h1>
        <div class="mb-3">
            <x-danger-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'crear-rutina')">{{ __('Crear Rutina') }}
            </x-danger-button>
        </div>
        <div class="space-y-6 mt-4">
            @foreach ($routines as $routine)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h1 class="text-xl font-semibold">{{ $routine->name }}</h1>
                    <p class="mt-2 text-gray-600">{{ $routine->description }}</p>
                    <div class="mt-4 flex space-x-4">
                        <x-primary-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'aniadir-ejercicios-rutina{{ $routine->id }}')">{{ __('Editar') }}
                        </x-primary-button>
                        <x-danger-button class="ml-3" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'eliminar-rutina-modal{{ $routine->id }}')">{{ __('Eliminar') }}
                        </x-danger-button>
                    </div>
                </div>
                @include('modal.eliminarRutinaModal')
                @include('modal.aniadirEjerciciosRutina')
            @endforeach
        </div>
    </div>
    
    @include('modal.crearRutinaModal')
</x-app-layout>
