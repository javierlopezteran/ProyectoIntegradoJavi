<x-app-layout>
    <div class="container mt-8 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Historial de entrenamientos:</h1>
        @foreach ($workoutsAr as $workout)
            <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                <h1 class="text-xl font-semibold">{{ \Carbon\Carbon::parse($workout->date)->format('d/m/Y') }}</h1>
                <p class="mt-2 text-gray-600">{{ $workout->notes }}</p>
                
                <div class="mt-4">
                    @foreach ($workout->workoutExercise as $exercise)
                        <div class="border-t border-gray-200 pt-4 mt-4">
                            <h2 class="text-lg font-semibold">{{ $exercise->exercise->name }}</h2>
                            <p>Series: {{ $exercise->sets }}</p>
                            <p>Repeticiones: {{ $exercise->reps }}</p>
                            <p>Peso: {{ $exercise->weight }} kg</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
