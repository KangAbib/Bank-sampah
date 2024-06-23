<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Sampah</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    {{-- Css File --}}
    {{-- <link href="/assets/style-login.css" rel="stylesheet"> --}}

    {{-- Feather Icon --}}
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

</head>

<body class="bg-green-500 flex justify-center items-center h-screen">
    <div class="container flex justify-center items-center h-screen">
        <div
            class="login-container w-3/4 h-3/4 p-10 bg-white rounded-3xl shadow-md flex flex-col justify-center items-center">
            <div class="img mb-4 mt-6">
                <img src="/assets/img/login-ava.png" alt="" class="h-40 w-40 ml-18">
            </div>
            <form action="{{ route('auth') }}" method="POST" class="flex flex-col space-y-6">
                @csrf
                <h2 class="font-bold text-center mb-4">WELCOME</h2>
                <div class="input-div relative">
                    <i class="feather-icon absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                        data-feather="user"></i>
                    <input
                        class="input pl-10 border-b-2 border-gray-300 focus:outline-none focus:border-green-500 text-center"
                        type="email" name="email" id="email" placeholder="Email" autocomplete="off">
                </div>
                <div class="input-div relative">
                    <i class="feather-icon absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                        data-feather="unlock"></i>
                    <input
                        class="input pl-10 border-b-2 border-gray-300 focus:outline-none focus:border-green-500 text-center"
                        type="password" name="password" id="password" placeholder="Password" autocomplete="off">
                </div>
                <input type="submit"
                    class="btn-login bg-green-500 text-white font-bold py-2 rounded-full cursor-pointer hover:bg-green-600 transition duration-300"
                    value="login">
            </form>
        </div>
    </div>
</body>




<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace(); // Menginisialisasi dan menampilkan ikon Feather
</script>

</html>
