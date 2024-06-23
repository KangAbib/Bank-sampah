<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>


    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Feather Icon -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Sign In</h2>
        <p class="text-center mb-8 text-gray-600">Sign in with Credentials DATABASE-Banksampah</p>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            @if (session('error'))
                <div class="text-red-500 text-center mb-4">{{ session('error') }}</div>
            @endif
            <div class="mb-4">
                <label class="block text-gray-700" for="email">Email</label>
                <input class="w-full p-2 border border-gray-300 rounded mt-1" type="email" id="email"
                    name="email" required>
            </div>
            <div class="mb-6 relative">
                <label class="block text-gray-700" for="password">Password</label>
                <input class="w-full p-2 border border-gray-300 rounded mt-1" type="password" id="password"
                    name="password" required>
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600"
                    onclick="togglePassword()">
                    <i data-feather="eye"></i>
                </button>
            </div>
            <div class="flex justify-center">
                <button id="signin-btn"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                    type="submit">
                    Sign In
                </button>
            </div>

        </form>
        <div class="flex justify-center mt-8 space-x-4">
            <a href="#" class="text-blue-500 hover:underline">Terms</a>
            <a href="#" class="text-blue-500 hover:underline">Info</a>
            <a href="#" class="text-blue-500 hover:underline">Contact Us</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var passwordIcon = passwordInput.nextElementSibling.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.setAttribute('data-feather', 'eye-off');
            } else {
                passwordInput.type = 'password';
                passwordIcon.setAttribute('data-feather', 'eye');
            }

            feather.replace(); // Replace the feather icons to update the icon
        }

        // Initialize Feather icons
        feather.replace();

       
    </script>


</body>

</html>
