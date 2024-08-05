@extends('design.layout')

@section('content')

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <x-admin-navbar />
        <!-- Main Content -->
        <div class="w-4/5 p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold">Water Analytics</h1>

                <div class="flex items-center">
                    <a href="/admin/report" class="ml-4 p-2 bg-gray-200 rounded-full">
                        Generate report
                    </a>
                    <a href="/admin/notifications" class="ml-4 p-2 bg-gray-200 rounded-full">
                        <span class="material-symbols-outlined">
                            notifications
                        </span>
                    </a>
                    <a href="/admin/settings" class="ml-4 p-2 bg-gray-200 rounded-full">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                    </a>
                </div>
            </div>

            <!-- Summary Section -->
            <div class="grid grid-cols-4 gap-6 mb-6">
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Consumed per week</h2>
                    <p class="text-3xl font-bold text-center">{{$consumptionWeekly}} cube</p>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Consumed For All Time</h2>
                    <p class="text-3xl font-bold text-center">{{$consumption}} cube</p>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Temperature</h2>
                    <p class="text-3xl font-bold text-center">30.2°C</p>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Battery Level</h2>
                    <p class="text-3xl font-bold text-center">20%</p>
                </div>
            </div>

            <!-- Consumption Comparison and Meter Details -->
            <div class="grid grid-cols-3 gap-6 mb-6">
                <div class="p-4 bg-white rounded shadow col-span-2">
                    <h2 class="text-xl font-bold">Consumption Comparison</h2>
                    <canvas id="consumptionComparisonChart"></canvas>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Meter Details</h2>
                    <ul>
                        <li class="mb-2">Name: <span class="font-bold">WM0000125</span></li>
                        <li class="mb-2">Status: <span class="font-bold">Active</span></li>
                        <li class="mb-2">Name: <span class="font-bold">Water TDS Meter</span></li>
                        <li class="mb-2">Location: <span class="font-bold">Kigali, Rwanda</span></li>
                    </ul>
                    <div class="mt-4">
                        <img src="/images/sensor.png" alt="Sensor Image 1" class="mb-2">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Consumption Comparison Chart Configuration
        const ctxConsumptionComparison = document.getElementById('consumptionComparisonChart').getContext('2d');
        const agricultureData = @json($agriculture);
        const industrialData = @json($industrial);
        const residenceData = @json($residence);
        new Chart(ctxConsumptionComparison, {
            type: 'bar',
            data: {
                labels: ['2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023','2024'],
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