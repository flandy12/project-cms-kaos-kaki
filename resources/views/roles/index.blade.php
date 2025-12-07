<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Your content -->

            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Daftar Role</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-left border rounded-lg">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="py-3 px-4 border-b">#</th>
                                <th class="py-3 px-4 border-b">Nama Role</th>
                                <th class="py-3 px-4 border-b">Slug</th>
                                <th class="py-3 px-4 border-b">Deskripsi</th>
                                <th class="py-3 px-4 border-b">Total Permissions</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600">

                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 border-b">1</td>
                                <td class="py-3 px-4 border-b font-medium">Administrator</td>
                                <td class="py-3 px-4 border-b">
                                    <span class="px-2 py-1 bg-gray-200 rounded text-sm">admin</span>
                                </td>
                                <td class="py-3 px-4 border-b">Akses penuh ke seluruh fitur sistem</td>
                                <td class="py-3 px-4 border-b">12 Permissions</td>
                            </tr>

                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 border-b">2</td>
                                <td class="py-3 px-4 border-b font-medium">Manager</td>
                                <td class="py-3 px-4 border-b">
                                    <span class="px-2 py-1 bg-gray-200 rounded text-sm">manager</span>
                                </td>
                                <td class="py-3 px-4 border-b">Mengelola data operasional & laporan</td>
                                <td class="py-3 px-4 border-b">8 Permissions</td>
                            </tr>

                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 border-b">3</td>
                                <td class="py-3 px-4 border-b font-medium">Staff</td>
                                <td class="py-3 px-4 border-b">
                                    <span class="px-2 py-1 bg-gray-200 rounded text-sm">staff</span>
                                </td>
                                <td class="py-3 px-4 border-b">Mengelola tugas rutin</td>
                                <td class="py-3 px-4 border-b">5 Permissions</td>
                            </tr>

                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 border-b">4</td>
                                <td class="py-3 px-4 border-b font-medium">Viewer</td>
                                <td class="py-3 px-4 border-b">
                                    <span class="px-2 py-1 bg-gray-200 rounded text-sm">viewer</span>
                                </td>
                                <td class="py-3 px-4 border-b">Hanya dapat melihat data</td>
                                <td class="py-3 px-4 border-b">2 Permissions</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

</x-app-layout>
