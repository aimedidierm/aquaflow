<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquaflow - Homepage</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold">AFM</span>
                    </div>
                    <div class="hidden md:flex md:space-x-8 ml-10">
                        <a href="/" class="text-gray-900 text-sm font-medium">Home</a>
                        <a href="#" class="text-gray-500 text-sm font-medium">Our Services</a>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="/login" class="text-gray-500 text-sm font-medium">Sign in</a>
                    <a href="/register" class="px-4 py-2 bg-black text-white rounded-full text-sm font-medium">Create
                        account</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold text-gray-900">Streamlining Water Care</h1>
            <p class="mt-4 px-40 text-lg text-gray-500">Dive into AquaSage, where intelligent water resource management
                meets
                user-friendly simplicity, empowering you to track, conserve, and optimize your water usage effortlessly.
            </p>
            <br>
            <a href="/login" class="mt-8 px-8 py-3 bg-black text-white rounded-full">Start now</a>
        </div><img src="/images/water_waves.PNG" alt="Pipeline Image 1" class="rounded-lg shadow-lg w-full">
    </section>

    <!-- Services Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Our Services
                </p>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Smart Water
                    Management Simplified</p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">Monitor, conserve, and make a positive impact
                    with real-time insights, personalized conservation tips, and a community-driven approach to
                    sustainable
                    water usage.</p>
            </div>
            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="pt-6">
                        <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                            <div class="-mt-6">
                                <div>
                                    <span
                                        class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                                        <!-- Real-time Monitoring Icon -->
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4h16M4 10h16M4 16h16" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Real-time Monitoring
                                </h3>
                                <p class="mt-5 text-base text-gray-500">Keep a constant eye on your water usage with our
                                    app’s real-time monitoring feature.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                            <div class="-mt-6">
                                <div>
                                    <span
                                        class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                                        <!-- Smart Conservation Tips Icon -->
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4H8v-2h4V8h1v2h4v2h-4v4z" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Smart Conservation
                                    Tips
                                </h3>
                                <p class="mt-5 text-base text-gray-500">Receive personalized and actionable conservation
                                    tips tailored to your usage patterns.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <div class="flow-root bg-blue-500 rounded-lg px-6 pb-8">
                            <div class="-mt-6">
                                <div>
                                    <span
                                        class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                                        <!-- Usage Analytics Icon -->
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 17h2v2h-2zm0-8h2v6h-2zm-7 8h2v2H4zm0-8h2v6H4zm14 8h2v2h-2zm0-8h2v6h-2z" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-white tracking-tight">Usage Analytics</h3>
                                <p class="mt-5 text-base text-white">Dive into detailed analytics to understand your
                                    water
                                    consumption trends over time.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                            <div class="-mt-6">
                                <div>
                                    <span
                                        class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                                        <!-- Leak Detection and Alerts Icon -->
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Leak Detection and
                                    Alerts
                                </h3>
                                <p class="mt-5 text-base text-gray-500">Detect leaks early with our advanced leak
                                    detection
                                    system. Receive instant alerts, enabling prompt action to conserve water, prevent
                                    damage, and save on utility costs.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <div class="flow-root bg-blue-500 rounded-lg px-6 pb-8">
                            <div class="-mt-6">
                                <div>
                                    <span
                                        class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                                        <!-- Community Impact Insights Icon -->
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 20h9M3 20h9m-3-7h2v3h-2zm-4-5h10M6 7h10m0-3H6m0 6h6m-6 3h2v3H6z" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-white tracking-tight">Community Impact Insights
                                </h3>
                                <p class="mt-5 text-base text-white">Explore the collective impact of your community’s
                                    water
                                    conservation efforts. Our app provides insights into the broader sustainability
                                    initiatives, fostering a sense of shared responsibility and environmental
                                    stewardship.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pipeline Solutions Section -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900">"AquaFlow Pipeline Solutions"</h2>
            <p class="mt-4 text-lg text-gray-500">Empower your water infrastructure with AquaFlow - a comprehensive
                suite of pipeline solutions ensuring efficient transport, conservation, and sustainable management of
                water resources.</p>
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="col-span-1 lg:col-span-2">
                    <img src="/images/pipe1.png" alt="Pipeline Image 1" class="rounded-lg shadow-lg w-full">
                </div>
                <div class="col-span-1 lg:col-span-1">
                    <img src="/images/pipe2.png" alt="Pipeline Image 2" class="rounded-lg shadow-lg w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Hydration Tips Section -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900">Remember to stay hydrated throughout the day</h2>
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-blue-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-900">High-quality water storage tank</h3>
                    <p class="mt-2 text-gray-500">Encouraging responsible water management through the use of water
                        storage tanks involves raising awareness about the tangible benefits and environmental impact of
                        this practice.</p>
                </div>
                <div class="bg-blue-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-900">Water Conservation</h3>
                    <p class="mt-2 text-gray-500">Promote water-saving habits at the individual and community levels,
                        such as fixing leaks, using water-efficient appliances, and turning off taps when not in use.
                    </p>
                </div>
                <div class="bg-blue-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-900">Rainwater Harvesting</h3>
                    <p class="mt-2 text-gray-500">Implement rainwater harvesting systems to collect and store rainwater
                        for non-potable uses like irrigation, cleaning, and flushing toilets.</p>
                </div>
                <div class="bg-blue-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-900">Improved Irrigation Practices</h3>
                    <p class="mt-2 text-gray-500">Encourage the adoption of water-efficient irrigation methods, such as
                        drip irrigation or precision agriculture, to minimize water wastage in agriculture.</p>
                </div>
                <div class="bg-blue-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-900">Wastewater Treatment and Reuse</h3>
                    <p class="mt-2 text-gray-500">Develop and implement advanced wastewater treatment technologies to
                        safely treat and reuse water for non-potable purposes, such as industrial processes and
                        irrigation.</p>
                </div>
                <div class="bg-blue-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-900">Government Policies and Regulations</h3>
                    <p class="mt-2 text-gray-500">Implement rainwater harvesting systems to collect and store rainwater
                        for non-potable uses like irrigation, cleaning, and flushing toilets.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-500">Copyright © 2024 Water Resource Management. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>