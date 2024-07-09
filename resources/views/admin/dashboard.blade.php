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
                    <div class="text-4xl font-bold mt-2">5000<span class="text-lg">cube</span></div>
                </div>
                <div class="bg-white p-4 rounded shadow-md">
                    <div class="text-xl font-bold">Response rate</div>
                    <div class="text-4xl font-bold mt-2">81%</div>
                </div>
                <div class="bg-white p-4 rounded shadow-md">
                    <div class="text-xl font-bold">Total Meter Cube/pro</div>
                    <div class="text-4xl font-bold mt-2">100,000</div>
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
                <div class="bg-white p-4 rounded shadow-md">
                    <div class="text-xl font-bold mb-2">Water Quality</div>
                    <canvas id="waterQualityMap" class="h-48"></canvas>
                </div>
                <div class="bg-white p-4 rounded shadow-md col-span-1 lg:col-span-2">
                    <div class="text-xl font-bold mb-2">Usage Distribution</div>
                    <canvas id="usageDistributionChart" class="h-48"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Water Analytics Chart
                                        const ctx1 = document.getElementById('waterAnalyticsChart').getContext('2d');
                                        new Chart(ctx1, {
                                            type: 'line',
                                            data: {
                                                labels: ['Northern Pro', 'Southern Pro', 'Eastern Pro', 'Western Pro', 'Kigali City'],
                                                datasets: [{
                                                    label: 'Water Analytics',
                                                    data: [3, 4, 5, 4, 6],
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
                                                labels: ['2019', '2020', '2021', '2022', '2023'],
                                                datasets: [
                                                    {
                                                        label: 'Agriculture',
                                                        data: [1500, 1600, 1700, 1600, 1800],
                                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                                        borderColor: 'rgba(255, 99, 132, 1)',
                                                        borderWidth: 1
                                                    },
                                                    {
                                                        label: 'Industrial',
                                                        data: [1000, 1200, 1100, 1300, 1200],
                                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                                        borderColor: 'rgba(54, 162, 235, 1)',
                                                        borderWidth: 1
                                                    },
                                                    {
                                                        label: 'Residence',
                                                        data: [900, 1000, 900, 1100, 1000],
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
                                                    data: [5.1, 5.5, 5.2, 5.8, 5.3],
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
                                
                                        // Usage Distribution Chart
                                        const ctx4 = document.getElementById('usageDistributionChart').getContext('2d');
                                        new Chart(ctx4, {
                                            type: 'doughnut',
                                            data: {
                                                labels: ['Agriculture', 'Industrial', 'Residence'],
                                                datasets: [{
                                                    label: 'Usage Distribution',
                                                    data: [50, 30, 20],
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255, 99, 132, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(75, 192, 192, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                responsive: true
                                            }
                                        });
    </script>
    @stop