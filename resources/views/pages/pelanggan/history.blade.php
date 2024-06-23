<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Pemesanan</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Riwayat Pemesanan</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if($pemesanan->isEmpty())
            <p class="text-center text-gray-500">Anda belum memiliki riwayat pemesanan.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-2 px-4 border-b text-left">#</th>
                            <th class="py-2 px-4 border-b text-left">Produk</th>
                            <th class="py-2 px-4 border-b text-left">Harga</th>
                            <th class="py-2 px-4 border-b text-left">Tanggal</th>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemesanan as $order)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b text-left">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 border-b text-left">{{ $order->produk->nama }}</td>
                                <td class="py-2 px-4 border-b text-left">Rp{{ number_format($order->harga, 0, ',', '.') }}</td>
                                <td class="py-2 px-4 border-b text-left">{{ $order->created_at->format('d M Y') }}</td>
                                <td class="py-2 px-4 border-b text-left">
                                    <span class="inline-block px-3 py-1 rounded-full text-sm
                                        @if($order->status == 'dikonfirmasi')
                                            bg-green-200 text-green-800
                                        @else
                                            bg-yellow-200 text-yellow-800
                                        @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html>
