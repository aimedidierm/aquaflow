<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquaflow - Sign up</title>
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
            <p class="text-gray-600 mb-6">Enter your details to sign up to your account</p>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700" for="first-name">Enter your first name</label>
                    <input
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="text" id="first-name" placeholder="Enter your first name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700" for="last-name">Enter your last name</label>
                    <input
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="text" id="last-name" placeholder="Enter your last name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700" for="email">Enter your email</label>
                    <input
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="email" id="email" placeholder="Enter your email">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700" for="password">Enter your password</label>
                    <input
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="password" id="password" placeholder="Enter your password">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700" for="password">Confirm your password</label>
                    <input
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="password" id="password" placeholder="Enter your password">
                </div>
                <div>
                    <button
                        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="submit">Continue</button>
                </div>
                <p class="mt-4 text-center text-gray-600">Already have an account? <a href="/login"
                        class="text-blue-500 hover:underline">Sign in</a></p>
            </form>
        </div>
    </div>
</body>

</html>