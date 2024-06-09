<x-app-layout>
    <div class="container mx-auto mt-8">
        <div class="mb-3 mx-auto" style="max-width: 600px;">
            <h1 class="text-2xl font-bold mb-4">Ejercicios Realizados de cada grupo muscular:</h1>
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const ctx = document.getElementById('myChart').getContext('2d');
            const data = @json($data);

            const labels = Object.keys(data);
            const values = Object.values(data);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Cantidad de Ejercicios',
                        data: values,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
