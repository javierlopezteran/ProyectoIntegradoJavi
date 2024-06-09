<x-modal name="eliminar-user-modal{{$usuario->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('delete.user') }}" class="p-6">
        @csrf

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('¿Estás seguro de que quieres eliminar esta usuario?') }}
        </h2>

        <div class="mt-6">
            <x-input-label for="id" value="{{ $usuario->id }}" class="sr-only" />

            <x-text-input
                id="id"
                name="id"
                type="text"
                class="mt-1 block w-3/4 sr-only"
                value="{{ $usuario->id }}"
            />

        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Eliminar usuario') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>