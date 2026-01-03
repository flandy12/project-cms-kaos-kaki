<x-app-layout>
    <div x-data="{
        open: {{ $errors->any() ? 'true' : 'false' }},
        isEdit: false,
        form: { id: null, name: '', permissions: [] },
    
        openCreate() {
            this.isEdit = false;
            this.form = { id: null, name: '', permissions: [] };
            this.open = true;
        },
    
        openEdit(role) {
            this.isEdit = true;
            this.form = {
                id: role.id,
                name: role.name,
                permissions: role.permissions.map(p => p.name)
            };
            this.open = true;
        }
    }" class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <div class="flex justify-between mb-4">
                    <h2 class="text-xl font-semibold">Daftar Role</h2>
                    @can('role.create')
                    <button @click="openCreate()" class="px-4 py-2 bg-blue-600 text-white rounded">
                        Tambah Role
                    </button>
                    @endcan
                </div>

                <table class="min-w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">#</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Permission</th>
                            @can(['role.update', 'role.delete'])
                                <th class="px-4 py-2 border">Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border">{{ $role->name }}</td>
                                <td class="px-4 py-2 border text-sm">
                                    {{ $role->permissions->pluck('name')->join(', ') }}
                                </td>
                                @can(['role.update', 'role.delete'])
                                    <td class="px-4 py-2 border space-x-2">
                                        <button @click="openEdit({{ Js::from($role) }})" class="text-green-600">
                                            Edit
                                        </button>

                                        <form action="{{ route('roles.destroy', $role->name) }}" method="POST"
                                            class="inline">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Hapus role?')" class="text-red-600">
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
                    {{ $roles->links() }}
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div x-show="open" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center">
            <div @click.away="open=false" class="bg-white w-full max-w-xl p-6 rounded">

                <h3 class="text-lg font-semibold mb-4" x-text="isEdit ? 'Edit Role' : 'Tambah Role'"></h3>

                <form :action="isEdit ? `/roles/${form.id}` : `{{ route('roles.store') }}`" method="POST"
                    class="space-y-4">
                    @csrf
                    <template x-if="isEdit">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div>
                        <label class="text-sm font-medium">Nama Role</label>
                        <input type="text" name="name" x-model="form.name"
                            class="w-full border rounded px-3 py-2 mt-2">

                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Permissions -->
                    <div>
                        <label class="text-sm font-medium">Permissions</label>
                        <div class="grid grid-cols-2 gap-2 mt-2 max-h-48 overflow-y-auto">
                            @foreach ($permissions as $permission)
                                <label class="flex items-center gap-2 text-sm">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                        :checked="form.permissions.includes('{{ $permission->name }}')">
                                    {{ $permission->name }}
                                </label>
                            @endforeach
                        </div>

                        @error('permissions')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button" @click="open=false" class="px-4 py-2 border rounded">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                            <span x-text="isEdit ? 'Update' : 'Simpan'"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
