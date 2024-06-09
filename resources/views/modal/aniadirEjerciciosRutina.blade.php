<x-modal name="aniadir-ejercicios-rutina{{ $routine->id }}" :show="$errors->any()" focusable>
    <form method="post" action="{{ route('rutinas.addExercises') }}" class="p-6 bg-white rounded-lg shadow-md">
        @csrf
        <x-text-input id="id" name="id" type="text" class="mt-1 block w-3/4 sr-only"
            value="{{ $routine->id }}" />
        <div>
            {{-- Verifica si hay ejercicios para esta rutina --}}
            @if (isset($routineExercises[$routine->id]) && is_array($routineExercises[$routine->id]))
                @foreach ($routineExercises[$routine->id] as $routineExercise)
                    <p>{{ $routineExercise->name }}</p>
                @endforeach
            @else
                <p>{{ __('No hay ejercicios en esta rutina') }}</p>
            @endif
        </div>
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('Añadir ejercicios a la rutina') }}</h2>
        <div id="exercises-container-{{ $routine->id }}">
            <div class="exercise-select mb-4">
                <label for="exercise-1-{{ $routine->id }}" class="block text-gray-700">{{ __('Ejercicio') }}</label>
                <select name="exercises[]" id="exercise-1-{{ $routine->id }}"
                    class="block w-full mt-1 rounded-md shadow-sm">
                    @foreach ($exercises as $exercise)
                        <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="button" id="add-exercise-button-{{ $routine->id }}"
            class="bg-green-500 hover:bg-green-600 text-black font-semibold py-2 px-4 rounded-md shadow-sm">
            {{ __('Añadir otro ejercicio') }}
        </button>

        <div class="flex justify-end mt-4">
            <button type="button" x-on:click="$dispatch('close')"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-md shadow-sm">
                {{ __('Cancelar') }}
            </button>
            <button type="submit"
                class="ms-3 bg-blue-600 hover:bg-blue-700 text-black font-semibold py-2 px-4 rounded-md shadow-sm">
                {{ __('Guardar ejercicios') }}
            </button>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let exerciseCount = 1;
            const exercisesContainer = document.getElementById('exercises-container-{{ $routine->id }}');
            const addExerciseButton = document.getElementById('add-exercise-button-{{ $routine->id }}');
            const exercises = @json($exercises);
            addExerciseButton.addEventListener('click', function() {
                exerciseCount++;
                const newSelectDiv = document.createElement('div');
                newSelectDiv.classList.add('exercise-select', 'mb-4');
                newSelectDiv.innerHTML =
                    `<label for="exercise-${exerciseCount}-{{ $routine->id }}" class="block text-gray-700">{{ __('Ejercicio') }}</label>
                    <select name="exercises[]" id="exercise-${exerciseCount}-{{ $routine->id }}" class="block w-full mt-1 rounded-md shadow-sm">
                        ${exercises.map(exercise => `<option value="${exercise.id}">${exercise.name}</option>`).join('')}
                    </select>`;
                exercisesContainer.appendChild(newSelectDiv);
            });
        });
    </script>
</x-modal>
