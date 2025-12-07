<x-app-layout>
    <div class="bg-gray-100 py-10">

        <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">

            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold">Tambah Produk Baru</h1>

                <a href="/products" class="flex items-center gap-2 text-gray-600 hover:text-gray-900">
                    <!-- Back Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali
                </a>
            </div>

            <!-- Form -->
            <form action="/products" method="POST" enctype="multipart/form-data" class="space-y-6">
                <!-- Nama Produk -->
                <div>
                    <label class="block mb-1 font-medium">Foto Produk</label>

                    <!-- Input File -->
                    <input id="productImageInput" type="file" accept="image/*"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">

                    <!-- Preview -->
                    <div class="mt-4">
                        <img id="previewImage" class="max-h-72 rounded-lg hidden" />
                    </div>

                    <!-- Area Cropper -->
                    <div id="cropperArea" class="hidden mt-4">
                        <img id="cropperImage" class="max-h-[450px] mx-auto rounded-lg" />
                    </div>

                    <!-- Tombol Crop -->
                    <button type="button" id="cropButton"
                        class="hidden mt-4 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                        Crop Gambar
                    </button>

                    <!-- Hasil Crop -->
                    <input type="hidden" id="croppedImageInput" name="cropped_image">
                </div>

                <!-- Nama Produk -->
                <div>
                    <label class="block mb-1 font-medium">Nama Produk</label>
                    <input type="text" name="name"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan nama produk">
                </div>

                <!-- Harga Produk -->
                <div>
                    <label class="block mb-1 font-medium">Harga Produk</label>
                    <input type="number" name="price"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan harga">
                </div>

                <!-- Stok Produk -->
                <div>
                    <label class="block mb-1 font-medium">Stok</label>
                    <input type="number" name="stock"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Jumlah stok">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block mb-1 font-medium">Deskripsi</label>
                    <textarea name="description" rows="4"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tulis deskripsi produk"></textarea>
                </div>

                <!-- Upload Foto -->
                <div>
                    <label class="block mb-1 font-medium">Foto Produk</label>
                    <input type="file" name="image"
                        class="block w-full text-sm border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition">

                        <!-- Add Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>

                        Tambah Produk
                    </button>
                </div>
            </form>

        </div>

    </div>

    @push('scripts')
        <script>
            let cropper;
            const productImageInput = document.getElementById('productImageInput');
            const previewImage = document.getElementById('previewImage');
            const cropperArea = document.getElementById('cropperArea');
            const cropperImage = document.getElementById('cropperImage');
            const cropButton = document.getElementById('cropButton');
            const croppedImageInput = document.getElementById('croppedImageInput');

            productImageInput.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = () => {
                        cropperImage.src = reader.result;
                        cropperArea.classList.remove('hidden');
                        cropButton.classList.remove('hidden');

                        if (cropper) {
                            cropper.destroy();
                        }
                        cropper = new Cropper(cropperImage, {
                            aspectRatio: 1,
                            viewMode: 1,
                        });
                    };
                    reader.readAsDataURL(file);
                }
            });

            cropButton.addEventListener('click', () => {
                const canvas = cropper.getCroppedCanvas();
                previewImage.src = canvas.toDataURL();
                previewImage.classList.remove('hidden');

                // Simpan hasil crop ke input tersembunyi
                croppedImageInput.value = canvas.toDataURL();

                // Sembunyikan area cropper
                cropperArea.classList.add('hidden');
                cropButton.classList.add('hidden');
            });
        </script>
    @endpush
</x-app-layout>
