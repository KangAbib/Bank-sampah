<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank Sampah</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Favicon -->
    <link rel="icon" href="/assets/img/logo.jpg" type="image/gif" sizes="16x16" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/style.css" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <nav class="flex justify-between items-center py-0 mt-0">
        <div class="logo">
            <a class="navbar-logo" href="#">
                <img src="/assets/img/logo.png" alt="Logo" class="max-w-40 max-h-50">
            </a>
        </div>
        <ul id="nav-links" class="flex items-center space-x-4">
            <!-- Other nav links can go here -->
            <li id="login-nav">
                <a href="{{ route('login.index') }}" class="nav-navigation flex items-center" id="login-link">
                    <i class="feather-icon mr-2" data-feather="log-in"></i>
                    Login
                </a>
            </li>
        </ul>
    </nav>

    <section id="hero">
        <img src="/assets/img/hero.jpeg" alt="Hero Image">
    </section>

    <main id="main">
        <div class="container">
            <img src="/assets/img/logo.png" alt="Logo">
        </div>
        <div class="main-container">
            <h1>Visi Misi Bank Sampah Sri Wilis</h1>
            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem sapiente deserunt est exercitationem
                eius obcaecati in ratione vel soluta totam libero, deleniti facere magnam, alias labore. Nesciunt
                officia
                molestiae nihil alias inventore impedit itaque nisi, nostrum tenetur. Debitis ut vero error, fugit
                fuga
                aperiam deserunt laudantium reprehenderit ratione ab quas?</h5>
        </div>
    </main>

    <h1 style="font-weight: bold; text-align: center; font-size: 2rem;">Katalog Produk</h1>
    <main id="main">
        <div class="container">
            <img src="/assets/img/katalog-pic.jpg" alt="Logo" class="w-96">
        </div>
        <div class="main-container">
            <h5>Selamat datang di katalog produk Bank Sampah Sri Wilis. Kami menyediakan berbagai produk kreatif
                hasil daur ulang sampah, yang tidak hanya membantu menjaga lingkungan, tetapi juga mendukung
                komunitas lokal. Jelajahi beragam pilihan produk ramah lingkungan kami yang dibuat dengan dedikasi
                dan cinta oleh anggota komunitas kami. Dari dekorasi rumah hingga barang-barang fungsional
                sehari-hari, temukan bagaimana limbah dapat diubah menjadi karya yang bernilai dan berdaya guna. Mari
                bersama-sama menciptakan dunia yang lebih hijau dan berkelanjutan!</h5>
            <p class="text-center mt-5">
                <a href="{{ route('katalog.index') }}" class="btn btn-primary" id="view-more-btn">Lihat Selengkapnya</a>
            </p>
    </main>

    <div class="map-container flex flex-col items-center justify-center text-center mt-20">
        <h1 class="mb-5 font-bold text-4xl">Peta Bank Sampah Sri Wilis</h1>
        <div class="map-wrapper">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15810.989881172925!2d111.9831883!3d-7.8165333!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7856e99c76c89f%3A0x7a069b9ca6c8bf3!2sBank%20Sampah%20Sri%20Wilis!5e0!3m2!1sen!2sid!4v1709887660243!5m2!1sen!2sid"
                width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <img src="/assets/img/logo.png" alt="Logo" class="w-48 mt-5">
    </div>

    <footer id="footer" class="text-black py-8">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="social-media">
                <h5 class="text-lg font-bold mb-4">Social Media</h5>
                <div class="flex items-center space-x-2 mb-3">
                    <i class="feather-icon" data-feather="instagram"></i>
                    <span>Bank Sampah Sri Wilis</span>
                </div>
                <div class="flex items-center space-x-2 mb-3">
                    <i class="feather-icon" data-feather="facebook"></i>
                    <span>Bank Sampah Sri Wilis</span>
                </div>
                <div class="flex items-center space-x-2 mb-3">
                    <i class="feather-icon" data-feather="youtube"></i>
                    <span>Bank Sampah Sri Wilis</span>
                </div>
            </div>
            <div class="contact-us">
                <h5 class="text-lg font-bold mb-4">Kontak Kami</h5>
                <div class="flex items-center space-x-2 mb-3">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>+6281-2214-2000</span>
                </div>
                <div class="flex items-center space-x-2 mb-3">
                    <i class="feather-icon" data-feather="mail"></i>
                    <span>BankSampahSriWilis@gmail.com</span>
                </div>
                <div class="flex items-center space-x-2 mb-3">
                    <i class="feather-icon" data-feather="map-pin"></i>
                    <span>Jl. G. Tigabelas No.1, Pojok, Kec. Mojoroto, Kota Kediri, Jawa Timur 64115</span>
                </div>
            </div>
            <div class="about-us">
                <h5 class="text-lg font-bold mb-4">Tentang Kami</h5>
                <p>Bank Sampah yang bergerak dalam pengelolaan sampah berbasis masyarakat, yang dijadikan sebuah
                    kerajinan</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace();

            // Check if the user is logged in
            const user = window.User;
            if (user) {
                document.getElementById('login-nav').style.display = 'none';
                const navLinks = document.getElementById('nav-links');
                const logoutLink = document.createElement('li');
                logoutLink.innerHTML = `
                    <a href="#" class="nav-navigation flex items-center" id="logout-link">
                        <i class="feather-icon mr-2" data-feather="log-out"></i>
                        Logout
                    </a>
                `;
                navLinks.appendChild(logoutLink);

                // Add event listener for logout link
                document.getElementById('logout-link').addEventListener('click', function(e) {
                    e.preventDefault();
                    // Handle logout logic here, e.g., making an API call to logout
                    // For example:
                    fetch('{{ route('logout') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        },
                    }).then(response => {
                        if (response.ok) {
                            window.location.reload();
                        }
                    });
                });
            }

            // Event listener for view more button
            document.getElementById('view-more-btn').addEventListener('click', function(e) {
                if (!user) {
                    e.preventDefault();
                    window.location.href = '{{ route('login.index') }}?redirectTo={{ route('katalog.index') }}';
                } else {
                    window.location.href = '{{ route('katalog.index') }}';
                }
            });

            function showLoginForm() {
                const loginFormHtml = `
                    <div class="login-overlay fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                        <div class="bg-white p-8 rounded shadow-md relative">
                            <button type="button" class="close-btn absolute top-2 right-2" onclick="closeLoginForm()">
                                <i class="feather-icon" data-feather="x"></i>
                            </button>
                            <h2 class="text-2xl mb-4">Login Pelanggan</h2>
                            <form id="login-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group mb-3">
                                    <label for="username">Username:</label>
                                    <input type="text" id="username" name="username" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                            <div id="login-result" class="mt-3"></div>
                        </div>
                    </div>
                `;
                document.body.insertAdjacentHTML('beforeend', loginFormHtml);
                feather.replace();

                // Add event listener for the login form submission
                document.getElementById('login-form').addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(this);
                    fetch("{{ route('login') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                        },
                        body: formData,
                    })
                        .then(response => response.json())
                        .then(data => {
                            const loginResult = document.getElementById('login-result');
                            if (data.success) {
                                loginResult.innerHTML = '<div class="alert alert-success">' + data.message + '</div>';
                                setTimeout(() => {
                                    document.querySelector('.login-overlay').remove();
                                    window.location.href = '{{ route('katalog.index') }}'; // Redirect to katalog.index
                                }, 2000);
                            } else {
                                loginResult.innerHTML = '<div class="alert alert-danger">' + data.message + '</div>';
                            }
                        });
                });
            }

            window.closeLoginForm = function() {
                document.querySelector('.login-overlay').remove();
            }
        });
        </script>

</body>

</html>
