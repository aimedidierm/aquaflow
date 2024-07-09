@extends('design.layout')

@section('content')

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <x-admin-navbar />
        <!-- Main Content -->
        <div class="w-4/5 p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold">Water Analytics Predictions</h1>
                <div class="flex items-center">
                    <div class="relative">
                        <input type="text" placeholder="Search here..." class="border rounded py-2 px-4">
                    </div>
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
                    <h2 class="text-xl font-bold">Consumed per current week</h2>
                    <p class="text-3xl font-bold">5125.71 cube</p>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Active Devices</h2>
                    <p class="text-3xl font-bold">3</p>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Low battery Devices</h2>
                    <p class="text-3xl font-bold">0</p>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Inactive Devices</h2>
                    <p class="text-3xl font-bold">0</p>
                </div>
            </div>

            <!-- Daily Water Consumption Chart -->
            <div class="p-4 bg-white rounded shadow mb-6">
                <h2 class="text-2xl font-bold mb-4">Daily water consumption</h2>
                <canvas id="dailyWaterConsumptionChart"></canvas>
                <p class="mt-4 text-gray-600">*Attention: Actual water consumption has exceeded the predicted levels.
                    The blue line is consistently higher than the green line. Please be aware of the increased water
                    usage, and consider taking measures to conserve water resources.</p>
                <button class="mt-4 p-2 bg-blue-500 text-white rounded">Confirm to get Alert</button>
            </div>
        </div>
    </div>
    <script>
        // Daily Water Consumption Chart Configuration
        const ctxDaily = document.getElementById('dailyWaterConsumptionChart').getContext('2d');
        new Chart(ctxDaily, {
            type: 'line',
            data: {
                labels: ['01, Jan', '02, Jan', '03, Jan', '04, Jan', '05, Jan', '06, Jan', '07, Jan', '08, Jan', '09, Jan', '10, Jan', '11, Jan', '12, Jan'],
                datasets: [
                    {
                        label: 'Consumed water',
                        data: [100, 150, 130, 200, 180, 170, 220, 3000, 3500, 4000, 3800, 3600],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        fill: false
                    },
                    {
                        label: 'Predicted water',
                        data: [90, 140, 120, 190, 170, 160, 210, 2500, 3000, 3500, 3200, 3100],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
@stop