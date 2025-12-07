<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-xl font-semibold mb-4">Daftar Permission</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full text-left border rounded-lg">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-3 px-4 border-b">#</th>
                    <th class="py-3 px-4 border-b">Nama Permission</th>
                    <th class="py-3 px-4 border-b">Slug</th>
                    <th class="py-3 px-4 border-b">Deskripsi</th>
                </tr>
            </thead>

            <tbody class="text-gray-600">
                
                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4 border-b">1</td>
                    <td class="py-3 px-4 border-b font-medium">View Users</td>
                    <td class="py-3 px-4 border-b">
                        <span class="px-2 py-1 bg-gray-200 rounded text-sm">view-users</span>
                    </td>
                    <td class="py-3 px-4 border-b">Melihat daftar user</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4 border-b">2</td>
                    <td class="py-3 px-4 border-b font-medium">Create Users</td>
                    <td class="py-3 px-4 border-b">
                        <span class="px-2 py-1 bg-gray-200 rounded text-sm">create-users</span>
                    </td>
                    <td class="py-3 px-4 border-b">Menambahkan user baru</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4 border-b">3</td>
                    <td class="py-3 px-4 border-b font-medium">Edit Users</td>
                    <td class="py-3 px-4 border-b">
                        <span class="px-2 py-1 bg-gray-200 rounded text-sm">edit-users</span>
                    </td>
                    <td class="py-3 px-4 border-b">Mengubah data user</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4 border-b">4</td>
                    <td class="py-3 px-4 border-b font-medium">Delete Users</td>
                    <td class="py-3 px-4 border-b">
                        <span class="px-2 py-1 bg-gray-200 rounded text-sm">delete-users</span>
                    </td>
                    <td class="py-3 px-4 border-b">Menghapus user</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4 border-b">5</td>
                    <td class="py-3 px-4 border-b font-medium">Manage Roles</td>
                    <td class="py-3 px-4 border-b">
                        <span class="px-2 py-1 bg-gray-200 rounded text-sm">manage-roles</span>
                    </td>
                    <td class="py-3 px-4 border-b">Mengelola role pengguna</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>


        </div>
    </div>

</x-app-layout>
