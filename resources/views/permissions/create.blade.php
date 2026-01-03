<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Your content -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between">
                    <h2 class="text-xl font-semibold mb-4">Daftar Permission</h2>
                    <span class="curson-pointer">
                        <a href="{{ route('permissions.create') }}"
                            class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah
                            Permission</a>
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Nama Permission</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-3 py-2 border rounded-lg" placeholder="Masukkan nama permission">
                        </div>
                        <div class="mb-4">
                            <label for="slug" class="block text-gray-700 font-medium mb-2">Slug</label>
                            <input type="text" id="slug" name="slug"
                                class="w-full px-3 py-2 border rounded-lg" placeholder="Masukkan slug permission">
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-gray-700 font-medium mb-2">Kategori</label>
                            <input type="text" id="category" name="category"
                                class="w-full px-3 py-2 border rounded-lg" placeholder="Masukkan kategori permission">
                        </div>
                        <div class="mb-4"></div>
                        <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                        <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Masukkan deskripsi permission"></textarea>

                        <div class="flex gap-5">
                            <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                                <a href="{{ route('users') }}">Batal</a>
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
