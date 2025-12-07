<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Your content -->

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Report') }}
                </h2>
            </x-slot>

            <!-- TOTAL PENGHASILAN PER BULAN -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-gradient-to-br from-yellow-400 to-yellow-500 text-white rounded-xl shadow-lg">
                    <h3 class="text-sm font-semibold opacity-90">Total Penghasilan Bulan Ini</h3>
                    <p class="text-3xl font-bold mt-2">Rp <span id="totalIncome">0</span></p>
                </div>

                <div class="p-6 bg-gradient-to-br from-blue-400 to-blue-600 text-white rounded-xl shadow-lg">
                    <h3 class="text-sm font-semibold opacity-90">Total Produk Terjual Bulan Ini</h3>
                    <p class="text-3xl font-bold mt-2"><span id="monthlySold">0</span> pcs</p>
                </div>

                <div class="p-6 bg-gradient-to-br from-green-400 to-green-600 text-white rounded-xl shadow-lg">
                    <h3 class="text-sm font-semibold opacity-90">Rata-rata Harga Produk</h3>
                    <p class="text-3xl font-bold mt-2">Rp 13.000</p>
                </div>
            </div>

            <!-- INCOME CHART -->
            <div class="bg-white shadow-xs rounded-xl p-8">
                <h2 class="font-bold text-gray-800 mb-4 text-lg">Total Penghasilan Per Bulan</h2>
                <div id="incomeChart" class="h-[350px]"></div>
            </div>

            <!-- EXISTING CHART SECTION -->
            <div class="bg-white shadow-xs rounded-xl p-8 space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <div class="p-6 rounded-xl border shadow-sm bg-gradient-to-br from-blue-50 to-blue-100">
                        <h2 class="font-bold text-gray-800 mb-4 text-lg">Product Analysis</h2>
                        <div id="productChart" class="h-[350px]"></div>
                    </div>

                    <div class="p-6 rounded-xl border shadow-sm bg-gradient-to-br from-green-50 to-green-100">
                        <h2 class="font-bold text-gray-800 mb-4 text-lg">Product Terjual</h2>
                        <div id="salesChart" class="h-[350px]"></div>
                    </div>

                </div>
            </div>

            <div class="relative overflow-x-auto bg-white shadow-xs rounded-base border border-default">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Laporan Penjualan Produk Kaos Kaki</h2>

                    <div class="overflow-x-auto">
                        <div class="flex justify-between items-center mb-5">
                            <div>
                                <input type="text" id="searchInput" placeholder="Cari produk, warna, tanggal..."
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <button id="exportExcel"
                                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 shadow">
                                    Export Excel
                                </button>
                            </div>
                        </div>
                        <table class="min-w-full text-left border rounded-lg">
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="py-3 px-4 border-b">#</th>
                                    <th class="py-3 px-4 border-b">Nama Produk</th>
                                    <th class="py-3 px-4 border-b">Warna</th>
                                    <th class="py-3 px-4 border-b">Qty</th>
                                    <th class="py-3 px-4 border-b">Harga</th>
                                    <th class="py-3 px-4 border-b">Total</th>
                                    <th class="py-3 px-4 border-b">Tanggal</th>
                                </tr>
                            </thead>

                            <tbody class="text-gray-600">

                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b">1</td>
                                    <td class="py-3 px-4 border-b font-medium">Kaos Kaki Sport Ultra</td>
                                    <td class="py-3 px-4 border-b">Hitam</td>
                                    <td class="py-3 px-4 border-b">12</td>
                                    <td class="py-3 px-4 border-b">Rp 25.000</td>
                                    <td class="py-3 px-4 border-b">Rp 300.000</td>
                                    <td class="py-3 px-4 border-b">2025-01-03</td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b">2</td>
                                    <td class="py-3 px-4 border-b font-medium">Kaos Kaki Ankle Soft</td>
                                    <td class="py-3 px-4 border-b">Putih</td>
                                    <td class="py-3 px-4 border-b">8</td>
                                    <td class="py-3 px-4 border-b">Rp 20.000</td>
                                    <td class="py-3 px-4 border-b">Rp 160.000</td>
                                    <td class="py-3 px-4 border-b">2025-01-04</td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b">3</td>
                                    <td class="py-3 px-4 border-b font-medium">Kaos Kaki Casual Stripe</td>
                                    <td class="py-3 px-4 border-b">Abu</td>
                                    <td class="py-3 px-4 border-b">15</td>
                                    <td class="py-3 px-4 border-b">Rp 22.000</td>
                                    <td class="py-3 px-4 border-b">Rp 330.000</td>
                                    <td class="py-3 px-4 border-b">2025-01-06</td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b">4</td>
                                    <td class="py-3 px-4 border-b font-medium">Kaos Kaki Running Pro</td>
                                    <td class="py-3 px-4 border-b">Navy</td>
                                    <td class="py-3 px-4 border-b">10</td>
                                    <td class="py-3 px-4 border-b">Rp 27.000</td>
                                    <td class="py-3 px-4 border-b">Rp 270.000</td>
                                    <td class="py-3 px-4 border-b">2025-01-07</td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b">5</td>
                                    <td class="py-3 px-4 border-b font-medium">Kaos Kaki Harian Basic</td>
                                    <td class="py-3 px-4 border-b">Cream</td>
                                    <td class="py-3 px-4 border-b">20</td>
                                    <td class="py-3 px-4 border-b">Rp 18.000</td>
                                    <td class="py-3 px-4 border-b">Rp 360.000</td>
                                    <td class="py-3 px-4 border-b">2025-01-10</td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b">6</td>
                                    <td class="py-3 px-4 border-b font-medium">Kaos Kaki Premium Wool</td>
                                    <td class="py-3 px-4 border-b">Hitam</td>
                                    <td class="py-3 px-4 border-b">5</td>
                                    <td class="py-3 px-4 border-b">Rp 35.000</td>
                                    <td class="py-3 px-4 border-b">Rp 175.000</td>
                                    <td class="py-3 px-4 border-b">2025-01-11</td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b">7</td>
                                    <td class="py-3 px-4 border-b font-medium">Kaos Kaki Invisible Thin</td>
                                    <td class="py-3 px-4 border-b">Putih</td>
                                    <td class="py-3 px-4 border-b">14</td>
                                    <td class="py-3 px-4 border-b">Rp 17.000</td>
                                    <td class="py-3 px-4 border-b">Rp 238.000</td>
                                    <td class="py-3 px-4 border-b">2025-01-15</td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b">8</td>
                                    <td class="py-3 px-4 border-b font-medium">Kaos Kaki Sekolah Anak</td>
                                    <td class="py-3 px-4 border-b">Hitam</td>
                                    <td class="py-3 px-4 border-b">18</td>
                                    <td class="py-3 px-4 border-b">Rp 12.000</td>
                                    <td class="py-3 px-4 border-b">Rp 216.000</td>
                                    <td class="py-3 px-4 border-b">2025-01-18</td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b">9</td>
                                    <td class="py-3 px-4 border-b font-medium">Kaos Kaki Outdoor Thick</td>
                                    <td class="py-3 px-4 border-b">Hijau Army</td>
                                    <td class="py-3 px-4 border-b">6</td>
                                    <td class="py-3 px-4 border-b">Rp 30.000</td>
                                    <td class="py-3 px-4 border-b">Rp 180.000</td>
                                    <td class="py-3 px-4 border-b">2025-01-19</td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b">10</td>
                                    <td class="py-3 px-4 border-b font-medium">Kaos Kaki Sport Mesh</td>
                                    <td class="py-3 px-4 border-b">Biru</td>
                                    <td class="py-3 px-4 border-b">9</td>
                                    <td class="py-3 px-4 border-b">Rp 24.000</td>
                                    <td class="py-3 px-4 border-b">Rp 216.000</td>
                                    <td class="py-3 px-4 border-b">2025-01-20</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between mt-4 px-4">

                <!-- Info halaman -->
                <p class="text-sm text-gray-600">
                    Menampilkan <span class="font-semibold">1–10</span> dari <span class="font-semibold">50</span>
                    data
                </p>

                <!-- Pagination -->
                <nav class="flex items-center space-x-1">

                    <!-- Previous -->
                    <button
                        class="px-3 py-2 border rounded-lg text-gray-500 bg-white hover:bg-gray-100 cursor-pointer">
                        ‹ Prev
                    </button>

                    <!-- Number -->
                    <button class="px-3 py-2 border rounded-lg bg-blue-600 text-white font-medium">
                        1
                    </button>

                    <button class="px-3 py-2 border rounded-lg text-gray-700 bg-white hover:bg-gray-100">
                        2
                    </button>

                    <button class="px-3 py-2 border rounded-lg text-gray-700 bg-white hover:bg-gray-100">
                        3
                    </button>

                    <span class="px-3 py-2 text-gray-500">...</span>

                    <button class="px-3 py-2 border rounded-lg text-gray-700 bg-white hover:bg-gray-100">
                        5
                    </button>

                    <!-- Next -->
                    <button
                        class="px-3 py-2 border rounded-lg text-gray-500 bg-white hover:bg-gray-100 cursor-pointer">
                        Next ›
                    </button>

                </nav>

            </div>

        </div>
    </div>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

        <script>
            /* PRODUCT DATA */
            const productLabels = [
                "Kaos Kaki Pendek",
                "Kaos Kaki Panjang",
                "Kaos Kaki Motif",
                "Kaos Kaki Sport",
                "Kaos Kaki Anak",
            ];

            const productStock = [120, 80, 95, 150, 60];
            const productSold = [90, 65, 70, 120, 40];

            /* MONTHLY SALES DATA */
            const months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"];
            const monthlySold = [320, 280, 350, 300, 420, 390];

            // Rata-rata harga
            const avgPrice = 13000;

            // Total income per month
            const monthlyIncome = monthlySold.map(s => s * avgPrice);

            // Update card (bulan terakhir)
            document.getElementById("totalIncome").innerText = monthlyIncome[5].toLocaleString("id-ID");
            document.getElementById("monthlySold").innerText = monthlySold[5];


            /* INCOME MONTHLY CHART */
            var incomeChart = new ApexCharts(document.querySelector("#incomeChart"), {
                chart: {
                    type: "area",
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: "Penghasilan (Rp)",
                    data: monthlyIncome
                }],
                xaxis: {
                    categories: months
                },
                colors: ["#f59e0b"],
                stroke: {
                    curve: "smooth",
                    width: 3
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.45,
                        opacityTo: 0.1
                    }
                }
            });

            incomeChart.render();


            /* PRODUCT ANALYSIS CHART */
            var productChart = new ApexCharts(document.querySelector("#productChart"), {
                chart: {
                    type: "bar",
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: "Stock Ready",
                    data: productStock
                }],
                xaxis: {
                    categories: productLabels
                },
                colors: ["#1D4ED8"],
                plotOptions: {
                    bar: {
                        borderRadius: 6,
                        columnWidth: "45%"
                    }
                },
            });

            productChart.render();


            /* PRODUCT SOLD DONUT */
            var salesChart = new ApexCharts(document.querySelector("#salesChart"), {
                chart: {
                    type: "donut",
                    height: 350
                },
                series: productSold,
                labels: productLabels,
                colors: ["#16A34A", "#22C55E", "#4ADE80", "#86EFAC", "#bbf7d0"],
                legend: {
                    position: "bottom"
                }
            });

            salesChart.render();


            // SEARCH FUNCTIONALITY
            const searchInput = document.getElementById("searchInput");
            const rows = document.querySelectorAll("table tbody tr");

            searchInput.addEventListener("keyup", function() {
                const searchValue = this.value.toLowerCase();

                rows.forEach(row => {
                    const rowText = row.innerText.toLowerCase();
                    row.style.display = rowText.includes(searchValue) ? "" : "none";
                });
            });


            // EXPORT TO EXCEL FUNCTIONALITY
            document.getElementById("exportExcel").addEventListener("click", function() {

                // Ambil element tabel
                const table = document.querySelector("table");

                // Convert table ke worksheet
                const workbook = XLSX.utils.table_to_book(table, {
                    sheet: "Laporan"
                });

                // Export ke file Excel
                XLSX.writeFile(workbook, "laporan-penjualan-kaoskaki.xlsx");
            });
        </script>
    @endpush

</x-app-layout>
