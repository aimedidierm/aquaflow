@extends('design.layout')

@section('content')

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <x-worker-navbar />
        <!-- Main Content -->
        <div class="w-4/5 p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold">Water Quality</h1>
                <div class="flex items-center">
                    <div class="relative">
                        <input type="text" placeholder="Search here..." class="border rounded py-2 px-4">
                    </div>
                    <a href="/worker/notifications" class="ml-4 p-2 bg-gray-200 rounded-full">
                        <span class="material-symbols-outlined">
                            notifications
                        </span>
                    </a>
                    <a href="/worker/settings" class="ml-4 p-2 bg-gray-200 rounded-full">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                    </a>
                </div>
            </div>

            <!-- Summary Section -->
            <div class="grid grid-cols-3 gap-6 mb-6">
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Current TDS</h2>
                    <canvas id="currentPhChart"></canvas>
                    <p class="text-3xl font-bold text-center">{{$tds->value}}</p>
                    <p class="text-center">Average TDS today <span class="font-bold">{{$tds->value}}</span></p>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">pH-Histogram</h2>
                    <canvas id="phHistogramChart"></canvas>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Current Dissolved Oxygen</h2>
                    <canvas id="currentOxygenChart"></canvas>
                    <p class="text-3xl font-bold text-center">12.00</p>
                    <p class="text-center">Average Dissolved Oxygen today <span class="font-bold">7.55</span></p>
                </div>
            </div>

            <!-- Water Consumption and Energy Consumption -->
            <div class="grid grid-cols-3 gap-6 mb-6">
                <div class="p-4 bg-white rounded shadow col-span-2">
                    <h2 class="text-xl font-bold">Current Water Consumption</h2>
                    <canvas id="currentWaterConsumptionChart"></canvas>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Current pH Chart Configuration
        const ctxPh = document.getElementById('currentPhChart').getContext('2d');
        const agricultureData = @json($agriculture);
        const industrialData = @json($industrial);
        const residenceData = @json($residence);
        new Chart(ctxPh, {
            type: 'doughnut',
            data: {
                labels: ['pH'],
                datasets: [{
                    data: [9, 14 - 9],
                    backgroundColor: ['#4caf50', '#cddc39'],
                }]
            },
            options: {
                cutoutPercentage: 70,
                rotation: -Math.PI,
                circumference: Math.PI,
                tooltips: { enabled: false },
                hover: { mode: null },
            }
        });

        // pH-Histogram Chart Configuration
        const ctxPhHistogram = document.getElementById('phHistogramChart').getContext('2d');
        new Chart(ctxPhHistogram, {
            type: 'bar',
            data: {
                labels: ['06:00', '08:00', '10:00', '12:00', '14:00', '16:00'],
                datasets: [{
                    label: 'pH',
                    data: [2000, 2500, 3000, 3500, 3000, 2500],
                    backgroundColor: '#42a5f5',
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Current Dissolved Oxygen Chart Configuration
        const ctxOxygen = document.getElementById('currentOxygenChart').getContext('2d');
        new Chart(ctxOxygen, {
            type: 'doughnut',
            data: {
                labels: ['Dissolved Oxygen'],
                datasets: [{
                    data: [12, 14 - 12],
                    backgroundColor: ['#42a5f5', '#cddc39'],
                }]
            },
            options: {
                cutoutPercentage: 70,
                rotation: -Math.PI,
                circumference: Math.PI,
                tooltips: { enabled: false },
                hover: { mode: null },
            }
        });

        // Current Water Consumption Chart Configuration
        const ctxWaterConsumption = document.getElementById('currentWaterConsumptionChart').getContext('2d');
        new Chart(ctxWaterConsumption, {
            type: 'bar',
            data: {
                labels: ['2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024'],
                datasets: [
                    {
                        label: 'Residential',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, residenceData],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Agriculture',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, agricultureData],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Industrial',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, industrialData],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
            </script>
</body>
@stop