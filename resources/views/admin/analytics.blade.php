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
            <!-- Search and Toggle Buttons -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex mb-6">
                    <button id="waterAvailabilityBtn" class="mr-2 p-2 bg-gray-200 rounded-full">Water
                        Availability</button>
                    <button id="waterUsageBtn" class="p-2 bg-gray-200 rounded-full">Water Usage</button>
                </div>
            </div>

            <!-- Water Availability Section -->
            <div id="waterAvailabilitySection">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-xl font-bold mb-4">Industrial</h2>
                        <canvas id="industrialChart"></canvas>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold mb-4">Agriculture</h2>
                        <canvas id="agricultureChart"></canvas>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold mb-4">Residential</h2>
                        <canvas id="residentialChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Water Usage Section -->
            <div id="waterUsageSection" class="hidden">
                <h2 class="text-2xl font-bold mb-4">Water Usage Summary</h2>
                <canvas id="waterUsageChart"></canvas>
            </div>
        </div>
    </div>
    <script>
        // Chart.js configurations for the different charts
            const ctx1 = document.getElementById('industrialChart').getContext('2d');
            const agricultureData = @json($agriculture);
            const industrialData = @json($industrial);
            const residenceData = @json($residence);
            const wastedData = @json($wasted);
            const consumptionData = @json($consumption);

            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['2016', '2017', '2018', '2019', '2020', '2021', '2022','2023', '2024'],
                    datasets: [
                        {
                            label: 'Predicted water',
                            data: [0, 0, 0, 0, 0, 0, 0, 0, 3900],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Used water',
                            data: [0, 0, 0, 0, 0, 0, 0, 0, industrialData],
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
    
            const ctx2 = document.getElementById('agricultureChart').getContext('2d');
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023','2024'],
                    datasets: [
                        {
                            label: 'Predicted water',
                            data: [0, 0, 0, 0, 0, 0, 0, 0, 4100],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Used water',
                            data: [0, 0, 0, 0, 0, 0, 0, 0, agricultureData],
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
    
            const ctx3 = document.getElementById('residentialChart').getContext('2d');
            new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: ['2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023','2024'],
                    datasets: [
                        {
                            label: 'Predicted water',
                            data: [0, 0, 0, 0, 0, 0, 0, 0, 3700],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Used water',
                            data: [0, 0, 0, 0, 0, 0, 0, 0, residenceData],
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
            const ctx5 = document.getElementById('waterUsageChart').getContext('2d');
            new Chart(ctx5, {
                type: 'bar',
                data: {
                    labels: ['2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024'],
                    datasets: [
                        {
                            label: 'Predicted water',
                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 800],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Used water',
                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, consumptionData ],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Wasted water',
                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, wastedData],
                            backgroundColor: 'rgba(255, 206, 86, 0.2)',
                            borderColor: 'rgba(255, 206, 86, 1)',
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
    
            // JavaScript for toggling between sections
            document.getElementById('waterAvailabilityBtn').addEventListener('click', function() {
                document.getElementById('waterAvailabilitySection').classList.remove('hidden');
                document.getElementById('waterUsageSection').classList.add('hidden');
            });
    
            document.getElementById('waterUsageBtn').addEventListener('click', function() {
                document.getElementById('waterAvailabilitySection').classList.add('hidden');
                document.getElementById('waterUsageSection').classList.remove('hidden');
            });
    </script>
</body>
@stop