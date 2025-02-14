@extends('design.layout')

@section('content')

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <x-admin-navbar />
        <!-- Main Content -->
        <div class="w-4/5 p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold">Water Management</h1>
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
            <div class="grid grid-cols-3 gap-6 mb-6">
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Consumed this month</h2>
                    <p class="text-3xl font-bold">{{$consumptionMonthly}} cube</p>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Consumption limit</h2>
                    <p class="text-3xl font-bold">{{$limit}} cube</p>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Next month prediction</h2>
                    <p class="text-3xl font-bold">{{$prediction}} ltr</p>
                </div>
            </div>

            <!-- Consumption Comparison Chart -->
            <div class="grid grid-cols-3 gap-6 mb-6">
                <div class="p-4 bg-white rounded shadow col-span-2">
                    <h2 class="text-xl font-bold">Consumption Comparison</h2>
                    <canvas id="consumptionComparisonChart"></canvas>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Consumption Details</h2>
                    <ul>
                        <li class="mb-2">{{$consumptionWeekly}} <span class="text-gray-600">Weekly Consumption</span>
                        </li>
                        <li class="mb-2">{{$consumptionMonthly}} <span class="text-gray-600">Monthly Consumption</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Water Quality and Monthly Bill Statistics -->
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Water Quality Result</h2>
                    <ul>
                        <li class="mb-2">TDS: {{$tds->value}}</li>
                        <li class="mb-2">pH: N/A</li>
                        <li class="mb-2">Iron: N/A mg/l</li>
                        <li class="mb-2">CaCo3: N/A mg/l</li>
                        <li class="mb-2">Sulfate-Sulfur: N/A mg/l</li>
                    </ul>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">Monthly Bill Statistics</h2>
                    <canvas id="monthlyBillStatisticsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Consumption Comparison Chart Configuration
        const ctxComparison = document.getElementById('consumptionComparisonChart').getContext('2d');
        const agricultureData = @json($agriculture);
        const industrialData = @json($industrial);
        const residenceData = @json($residence);
        new Chart(ctxComparison, {
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
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Monthly Bill Statistics Chart Configuration
        const ctxMonthly = document.getElementById('monthlyBillStatisticsChart').getContext('2d');
        new Chart(ctxMonthly, {
            type: 'line',
            data: {
                labels: ['01, Jan', '02, Jan', '03, Jan', '04, Jan', '05, Jan', '06, Jan', '07, Jan', '08, Jan', '09, Jan', '10, Jan', '11, Jan', '12, Jan'],
                datasets: [
                    {
                        label: 'This Month',
                        data: [2000, 1800, 1600, 1900, 2100, 2200, 2500, 2800, 3000, 3300, 3500, 3700],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        fill: true
                    },
                    {
                        label: 'Last Month',
                        data: [1500, 1400, 1300, 1600, 1700, 1800, 2000, 2300, 2500, 2700, 2900, 3100],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: true
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