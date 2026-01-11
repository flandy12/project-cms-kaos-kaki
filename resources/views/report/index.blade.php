<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Report
                </h2>
            </x-slot>

            <!-- SUMMARY -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-gradient-to-br from-yellow-400 to-yellow-500 text-white rounded-xl">
                    <h3 class="text-sm">Total Penghasilan Bulan Ini</h3>
                    <p class="text-3xl font-bold mt-2">Rp <span id="totalIncome">0</span></p>
                </div>

                <div class="p-6 bg-gradient-to-br from-blue-400 to-blue-600 text-white rounded-xl">
                    <h3 class="text-sm">Total Produk Terjual Bulan Ini</h3>
                    <p class="text-3xl font-bold mt-2"><span id="monthlySold">0</span> pcs</p>
                </div>

                <div class="p-6 bg-gradient-to-br from-green-400 to-green-600 text-white rounded-xl">
                    <h3 class="text-sm">Rata-rata Harga Produk</h3>
                    <p class="text-3xl font-bold mt-2">
                        Rp {{ number_format($avgPrice) }}
                    </p>
                </div>
            </div>

            <!-- INCOME CHART -->
            <div class="bg-white rounded-xl p-8">
                <h2 class="font-bold mb-4">Total Penghasilan Per Bulan</h2>
                <div class="flex gap-3 mb-4">
                    <div class="flex gap-4 items-center ">
                        <input type="date" id="startDate" class="border p-2 rounded"> -
                        <input type="date" id="endDate" class="border p-2 rounded">
                    </div>
                    <button id="filterBtn" class="bg-blue-600 text-white px-4 rounded">
                        Filter
                    </button>
                </div>

                <div id="incomeChart" class="h-[350px]"></div>
            </div>

            <!-- TABLE -->
            <div class="bg-white rounded-xl p-6">
                <h2 class="text-xl font-semibold mb-4">Laporan Penjualan</h2>

                <table class="min-w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th>#</th>
                            <th>Produk</th>
                            <th>Warna</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stockMovements as $item)
                            <tr class="border-b">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->product->color }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp {{ number_format($item->product->price) }}</td>
                                <td>
                                    Rp {{ number_format($item->quantity * $item->product->price) }}
                                </td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $stockMovements->links() }}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            window.months = @json($months);
            window.monthlyIncome = @json($monthlyIncome);
            window.monthlySold = @json($monthlySold);
        </script>
    @endpush
</x-app-layout>
