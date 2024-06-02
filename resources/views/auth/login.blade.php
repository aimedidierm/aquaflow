<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquaflow - Login Page</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-sm mx-auto">
        <div class="flex flex-col items-center">
            <h1 class="text-3xl font-bold">AFM</h1>
            <p class="text-gray-500 mb-8">AquaFlow Manager</p>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-lg border border-blue-200">
            <h2 class="text-2xl font-bold text-blue-500 mb-2">Log In</h2>
            <p class="text-gray-600 mb-6">Enter your details to sign in to your account</p>
            @if($errors->any())
            <span style="color: red;">{{$errors->first()}}</span>
            @endif
            <form action="/auth/login" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700" for="email">Enter your email</label>
                    <input
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="email" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700" for="password">Enter your password</label>
                    <input
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="password" name="password" id="password" placeholder="Enter your password">
                </div>
                <div>
                    <button
                        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="submit">Continue</button>
                </div>
                <p class="mt-4 text-center text-gray-600">You don't have an account? <a href="/register"
                        class="text-blue-500 hover:underline">Sign up</a></p>
            </form>
        </div>
    </div>
</body>

</html>