@extends('design.layout')

@section('content')

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <x-admin-navbar />
        <!-- Main content -->
        <div class="flex-1 p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold">Overview</h1>
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-4 rounded shadow-md">
                    <div class="text-xl font-bold">Water Consumption</div>
                    <div class="text-4xl font-bold mt-2">{{$consumption}}<span class="text-lg">cube</span></div>
                </div>
                <div class="bg-white p-4 rounded shadow-md">
                    <div class="text-xl font-bold">Wasted water</div>
                    <div class="text-4xl font-bold mt-2">{{$wasted}}<span class="text-lg">cube</span></div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded shadow-md">
                    <div class="text-xl font-bold mb-2">Water Analytics</div>
                    <canvas id="waterAnalyticsChart" class="h-48"></canvas>
                </div>
                <div class="bg-white p-4 rounded shadow-md">
                    <div class="text-xl font-bold mb-2">Water Data Trends</div>
                    <canvas id="waterDataTrendsChart" class="h-48"></canvas>
                </div>
                <div class="bg-white p-4 rounded shadow-md">
                    <div class="text-xl font-bold mb-2">Wasted Water</div>
                    <canvas id="wastedWaterChart" class="h-48"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Water Analytics Chart
        const ctx1 = document.getElementById('waterAnalyticsChart').getContext('2d');
        const agricultureData = @json($agriculture);
        const industrialData = @json($industrial);
        const residenceData = @json($residence);
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Northern Pro', 'Southern Pro', 'Eastern Pro', 'Western Pro', 'Kigali City'],
                datasets: [{
                    label: 'Water Analytics',
                    data: [0, 0, 0, 0, 6],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    fill: false
                }]
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

        // Water Data Trends Chart
        const ctx2 = document.getElementById('waterDataTrendsChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['2020', '2021', '2022', '2023', '2024'],
                datasets: [
                    {
                        label: 'Agriculture',
                        data: [0, 0, 0, 0, agricultureData],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Industrial',
                        data: [0, 0, 0, 0, industrialData],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Residence',
                        data: [0, 0, 0, 0, residenceData],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
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

        // Wasted Water Chart
        const ctx3 = document.getElementById('wastedWaterChart').getContext('2d');
        new Chart(ctx3, {
            type: 'line',
            data: {
                labels: ['Northern Pro', 'Southern Pro', 'Eastern Pro', 'Western Pro', 'Kigali City'],
                datasets: [{
                    label: 'Wasted Water',
                    data: [0, 0, 0, 0, 5.3],
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    fill: false
                }]
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
    @stop