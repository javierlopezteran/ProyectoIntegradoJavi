<x-modal name="crear-rutina" :show="$errors->any()" focusable>
    <form method="post" action="{{ route('rutinas.store') }}" class="p-6 bg-white rounded-lg shadow-md">
        @csrf
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('Creación de rutinas:') }}</h2>
        <p class="mb-6 text-sm text-gray-600">
            {{ __('Indica un nombre, descripción y la cantidad de ejercicios que tendrá dicha rutina.') }}</p>
        <div class="mb-4">
            <x-input-label for="name" value="{{ __('Nombre') }}" />
            <x-text-input id="name" name="name" type="text"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="{{ __('Nombre') }}" required />
        </div>

        <div class="mb-4">
            <x-input-label for="description" value="{{ __('Descripción') }}" />
            <x-text-input id="description" name="description" type="text"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="{{ __('Descripción') }}" required />
        </div>

        <div class="flex justify-end">
            <x-danger-button x-on:click="$dispatch('close')"
                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-md shadow-sm">
                {{ __('Cancelar') }}
            </x-danger-button>
            <x-primary-button
                class="ms-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-md shadow-sm">
                {{ __('Crear rutina') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
