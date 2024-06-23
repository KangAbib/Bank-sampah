<!-- Sidebar -->
<div class="bg-gray-900 text-white h-full w-64 fixed top-0 left-0 flex flex-col justify-between z-20">
    <div class="p-4">
        <div class="mb-4">
            <h1 class="text-xl font-semibold">DATABASE BankSampah</h1>
        </div>
        <ul>
            <!-- Tautan Dashboard dengan ikon Feather Home -->
            <li>
                <a href="/dashboard" class="block py-2 px-4 hover:bg-gray-800">
                    <span data-feather="home" class="inline-block w-5 h-5 mr-2"></span> Dashboard
                </a>
            </li>
            <li class="mt-4">
                <h2 class="text-sm font-semibold text-gray-600">Data BankSampah</h2>
            </li>
            <!-- Tautan Produk dengan ikon Feather Edit -->
            <li>
                <a href="{{ route('products.index') }}" class="block py-2 px-4 hover:bg-gray-800">
                    <span data-feather="edit" class="inline-block w-5 h-5 mr-2"></span> Produk
                </a>
            </li>
            <!-- Tautan Tipe Produk dengan ikon Feather Edit -->
            <li>
                <a href="{{ route('typeproduct.index') }}" class="block py-2 px-4 hover:bg-gray-800">
                    <span data-feather="edit" class="inline-block w-5 h-5 mr-2"></span> Tipe Produk
                </a>
            </li>
            <li>
                <a href="{{ route('pemesanan.index') }}" class="block py-2 px-4 hover:bg-gray-800">
                    <span data-feather="edit" class="inline-block w-5 h-5 mr-2"></span>  Data Pemesanan
                </a>
            </li>
            <li>
                <a href="{{ route('pelanggan.index') }}" class="block py-2 px-4 hover:bg-gray-800">
                    <span data-feather="edit" class="inline-block w-5 h-5 mr-2"></span>  Data Pelanggan
                </a>
            </li>
            <li>
                <a href="{{ route('pickup.index') }}" class="block py-2 px-4 hover:bg-gray-800">
                    <span data-feather="edit" class="inline-block w-5 h-5 mr-2"></span>  Data Pickup
                </a>
            </li>
        </ul>
    </div>
    <!-- Tombol Logout -->
    <div class="p-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Logout</button>
        </form>
    </div>
</div>

<!-- Script untuk inisialisasi Feather Icons -->
<script>
    feather.replace(); // Mengaktifkan Feather Icons
</script>
