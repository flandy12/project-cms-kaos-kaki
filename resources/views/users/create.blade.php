<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Your content -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between">
                    <h2 class="text-xl font-semibold mb-4">Tambah User</h2>
                </div>

                <div class="overflow-x-auto">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-3 py-2 border rounded-lg" placeholder="Masukkan nama lengkap">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-3 py-2 border rounded-lg" placeholder="Masukkan alamat email">
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 font-medium mb-2">Role</label>
                            <select id="role" name="role" class="w-full px-3 py-2 border rounded-lg">
                                <option value="">Pilih role</option>
                                <option value="owner">Owner</option>
                                <option value="manager">Manajer</option>
                                <option value="cashier">Kasir</option>
                            </select>
                        </div>

                        <div class="flex gap-5">
                            <button type="submit"
                                class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
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
