<x-app-layout>
    <div x-data="{
        open: false,
        isEdit: false,
        form: { id: null, name: '', email: '', role: '', status: 1 },
    
        openCreate() {
            this.isEdit = false;
            this.form = { id: null, name: '', email: '', role: '', status: 1 };
            this.open = true;
        },
    
        openEdit(user) {
            this.isEdit = true;
            this.form = {
                id: user.id,
                name: user.name,
                email: user.email,
                role: user.roles[0]?.name ?? '',
                status: user.status ? 1 : 0
            };
            this.open = true;
        }
    }" class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <div class="flex justify-between mb-4">
                    <h2 class="text-xl font-semibold">Daftar User</h2>
                    @can('user.create')
                    <button @click="openCreate()" class="px-4 py-2 bg-blue-600 text-white rounded">
                        Tambah User
                </button>
                    @endcan
                </div>

                <!-- TABLE -->
                <table class="min-w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Role</th>
                            <th class="border px-4 py-2">Status</th>
                            @can(['user.update', 'user.delete'])
                                <th class="border px-4 py-2">Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $user->name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $user->email }}</td>
                                <td class="border px-4 py-2">
                                    {{ $user->roles->pluck('name')->join(', ') }}
                                </td>
                                <td class="border px-4 py-2">
                                    <span
                                        class="px-2 py-1 rounded text-sm text-center
                            {{ $user->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700 text-center' }}">
                                        {{ $user->status ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                @can(['user.update', 'user.delete'])
                                    <td class="border px-4 py-2 space-x-2 text-center">
                                        <button @click="openEdit({{ Js::from($user) }})" class="text-green-600">
                                            Edit
                                        </button>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="inline">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Hapus user?')" class="text-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div x-show="open" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center">
            <div @click.away="open=false" class="bg-white w-full max-w-lg p-6 rounded">

                <h3 class="text-lg font-semibold mb-4" x-text="isEdit ? 'Edit User' : 'Tambah User'"></h3>

                <form :action="isEdit ? `/users/${form.id}` : `{{ route('users.store') }}`" method="POST"
                    class="space-y-4">
                    @csrf
                    <template x-if="isEdit">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <input type="text" name="name" x-model="form.name" class="w-full border rounded px-3 py-2"
                        placeholder="Nama" required>

                    <input type="email" name="email" x-model="form.email" class="w-full border rounded px-3 py-2"
                        placeholder="Email" required>

                    <template x-if="!isEdit">
                        <input type="password" name="password" class="w-full border rounded px-3 py-2"
                            placeholder="Password" required>
                    </template>

                    <select name="role" x-model="form.role" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Pilih Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>

                    <select name="status" x-model="form.status" class="w-full border rounded px-3 py-2">
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>

                    <div class="flex justify-end gap-3">
                        <button type="button" @click="open=false" class="px-4 py-2 border rounded">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
