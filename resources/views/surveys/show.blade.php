<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Respuestas de la Encuesta
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Resultados de la Encuesta: {{ $survey->title }}</h3>

                @foreach ($chartData as $index => $data)
                    <div class="mb-8">
                        <h4 class="text-lg font-semibold mb-4">{{ $index + 1 }}. {{ $data['question'] }}</h4>

                        <!-- Centrado de los elementos -->
                        <div class="flex justify-center gap-6 items-center">
                            <!-- Canvas más pequeño -->
                            <div class="flex-1 flex justify-center">
                                <canvas id="chart-{{ $index }}" width="300" height="300"></canvas>
                            </div>

                            <!-- Cuadro con los votos -->
                            <div class="flex-1 pl-6 max-w-xs">
                                <div class="space-y-2">
                                    @foreach ($data['answers'] as $answer => $count)
                                        <div class="flex items-center">
                                            <!-- Color correspondiente al segmento -->
                                            <div class="w-4 h-4 mr-2" style="background-color: {{ $chartColors[$loop->index] }};"></div>
                                            <!-- Texto con el conteo de votos -->
                                            <span class="text-gray-700">{{ $answer }} = {{ $count }} votos</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <a href="{{ route('surveys.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                    Volver a Encuestas
                </a>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @foreach ($chartData as $index => $data)
                const ctx{{ $index }} = document.getElementById('chart-{{ $index }}').getContext('2d');
                const chart{{ $index }} = new Chart(ctx{{ $index }}, {
                    type: 'pie', // Tipo de gráfico: pastel
                    data: {
                        labels: {!! json_encode(array_keys($data['answers'])) !!},
                        datasets: [{
                            data: {!! json_encode(array_values($data['answers'])) !!},
                            backgroundColor: {!! json_encode($chartColors) !!},
                            borderColor: {!! json_encode($chartColors) !!},
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: false, // Desactiva responsividad para tamaño fijo
                        maintainAspectRatio: false, // Permite control total del tamaño
                    }
                });
            @endforeach
        });
    </script>
</x-app-layout>
