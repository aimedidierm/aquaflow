@extends('design.layout')

@section('content')

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <x-admin-navbar />
        <!-- Main Content -->
        <div class="w-4/5 p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold">Notifications</h1>
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

            <!-- Notifications List -->
            <div class="bg-white rounded shadow p-6">
                <ul>
                    @foreach ($notifications as $notification)
                    <li class="flex items-center mb-4">
                        <img src="{{ asset('images/user_profile.png') }}" alt="User Image"
                            class="w-10 h-10 rounded-full mr-4">
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h2 class="font-bold">{{ $notification->sender }}</h2>
                                <span class="text-gray-500 text-sm">{{ $notification->timestamp }}</span>
                            </div>
                            <p class="text-gray-700">{{ $notification->message }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
@stop