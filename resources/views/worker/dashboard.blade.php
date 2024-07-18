@extends('design.layout')

@section('content')

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <x-worker-navbar />
        <!-- Main content -->
        <div class="flex-1 p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold">Dashboard</h1>
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
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold mb-4">Record water distribution</h2>
                    @if($errors->any())
                    <span style="color: red;">{{$errors->first()}}</span>
                    @endif
                    <form action="/worker/distributions" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700">Sector</label>
                            <select name="sector" id="sector" class="border rounded py-2 px-4 w-full">
                                <option value="Agriculture">Agriculture</option>
                                <option value="Agriculture">Industrial</option>
                                <option value="Agriculture">Residence</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Volume</label>
                            <input type="number" name="volume" class="border rounded py-2 px-4 w-full" required>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Submit</button>
                    </form>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold mb-4">Record water consumption</h2>
                    @if($errors->any())
                    <span style="color: red;">{{$errors->first()}}</span>
                    @endif
                    <form action="/worker/consumptions" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700">Sector</label>
                            <select name="sector" id="sector" class="border rounded py-2 px-4 w-full">
                                <option value="Agriculture">Agriculture</option>
                                <option value="Agriculture">Industrial</option>
                                <option value="Agriculture">Residence</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Volume</label>
                            <input type="number" name="volume" class="border rounded py-2 px-4 w-full">
                        </div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop