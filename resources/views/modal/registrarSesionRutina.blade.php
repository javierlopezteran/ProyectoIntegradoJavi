<x-modal name="registrar-sesion-rutina{{ $routine->id }}" :show="$errors->any()" focusable>
    <form method="post" action="{{ route('sesiones.registerSesion') }}" class="p-6 bg-white rounded-lg shadow-md">
        @csrf
        <x-text-input id="id" name="id" type="text" class="mt-1 block w-3/4 sr-only" value="{{ $routine->id }}" />
        <div>
            <div class="mb-4">
                <h1 class="text-lg font-semibold">Fecha del entrenamiento:</h1>
                <input type="date" id="fechaEntrenamiento" name="fechaEntrenamiento" required>
            </div>
            <div class="mb-4">
                <h1 class="text-lg font-semibold">Notas del entrenamiento:</h1>
                <input type="text" id="notas" name="notas" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            @if (isset($routineExercises[$routine->id]) && is_array($routineExercises[$routine->id]))
            @foreach ($routineExercises[$routine->id] as $key => $routineExercise)
            <div class="mb-4">
                <h1 class="text-lg font-semibold">{{ $routineExercise->name }}</h1>
                <div class="grid grid-cols-3 gap-4 mt-2">
                    <div>
                        <label for="series_{{ $routineExercise->id }}" class="block text-sm font-medium text-gray-700">Series</label>
                        <input type="number" id="series_{{ $routineExercise->id }}" name="series[{{ $routineExercise->id }}]" min="1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="repetitions_{{ $routineExercise->id }}" class="block text-sm font-medium text-gray-700">Repeticiones</label>
                        <input type="number" id="repetitions_{{ $routineExercise->id }}" name="repetitions[{{ $routineExercise->id }}]" min="1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="weight_{{ $routineExercise->id }}" class="block text-sm font-medium text-gray-700">Kilos</label>
                        <input type="number" id="weight_{{ $routineExercise->id }}" name="weight[{{ $routineExercise->id }}]" min="0" step="0.1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="flex justify-end mt-4">
                <button type="button" x-on:click="$dispatch('close')" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-md shadow-sm">
                    {{ __('Cancelar') }}
                </button>
                <button type="submit" class="ms-3 bg-blue-600 hover:bg-blue-700 text-black font-semibold py-2 px-4 rounded-md shadow-sm">
                    {{ __('Registrar rutina') }}
                </button>
            </div>
            @else
            <p>{{ __('No hay ejercicios en esta rutina') }}</p>
            <div class="flex justify-end mt-4">
                <button type="button" x-on:click="$dispatch('close')" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-md shadow-sm">
                    {{ __('Cancelar') }}
                </button>
            </div>
            @endif
        </div>
    </form>
</x-modal>