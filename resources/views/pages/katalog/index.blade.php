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

    <nav class="flex justify-between items-center py-0 mt-0 px-4">
        <div class="logo">
            <a class="navbar-logo" href="/">
                <img src="/assets/img/logo.png" alt="Logo" class="max-w-40 max-h-50">
            </a>
        </div>
        <h5 style="text-align: center">Our Catalog</h5>
        <div class="welcome-message flex items-center">
            @if(Auth::guard('pelanggan')->check())
                <div class="dropdown">
                    <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Selamat datang, {{ Auth::guard('pelanggan')->user()->fullname }}!
                    </span>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('history') }}">History</a></li>
                        <li>
                            <form action="{{ route('keluar') }}" method="POST" class="dropdown-item">
                                @csrf
                                <button type="submit" class="btn btn-secondary w-100">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endif
        </div>
    </nav>

    <div id="katalog-container" class="katalog-container">
        <section id="products-section" class="section-card">
            <!-- Products will be dynamically inserted here -->
            @foreach ($products as $product)
                <div class="card">
                    <img src="{{ asset('storage/gambar/' . $product->gambar) }}" alt="{{ $product->nama }}"
                        width="100" style="display: block; margin: auto;">
                    <h1>{{ $product->nama }}</h1>
                    <p>{{ $product->typeProduct->name}}</p>
                    <p>{{ $product->deskripsi }}</p>
                    <p class="text-red-500">Rp{{ number_format($product->harga, 0, ',', '.') }}</p>
                    <div class="button-container">
                        <form action="{{ route('pemesanan.buat', $product->id) }}" method="POST" id="pesan-form">
                            @csrf
                            <button type="submit" class="btn btn-success add-to-cart"
                                data-product-id="{{ $product->id }}">
                                <i data-feather="shopping-cart"></i> Pesan
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </section>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

    <!-- Custom JavaScript for handling pesan form -->
    <script>
        const form = document.getElementById('pesan-form');
        form.addEventListener('submit', async function(event) {
            event.preventDefault(); // Prevent default form submission

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                });

                const data = await response.json();

                if (response.ok) {
                    // Jika pesanan berhasil dibuat
                    alert('Pesanan berhasil dibuat: ' + data.message);
                } else {
                    // Jika terjadi error saat membuat pesanan
                    alert('Terjadi kesalahan: ' + data.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim data pesanan.');
            }
        });
    </script>
</body>

</html>
