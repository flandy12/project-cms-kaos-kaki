<x-app-layout>
    <div x-data="{
        open: {{ $errors->any() ? 'true' : 'false' }},
        isEdit: false,
        form: {
            id: null,
            name: '',
        },
        openCreate() {
            this.isEdit = false;
            this.form = { id: null, name: '' };
            this.open = true;
        },
        openEdit(permission) {
            this.isEdit = true;
            this.form = permission;
            this.open = true;
        }
    }" class="py-6">

        <!-- CONTENT -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">Daftar Permission</h2>

                    @can('permission.create')
                        <button @click="openCreate()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Tambah Permission
                        </button>
                    @endcan
                </div>

                <!-- TABLE -->
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left border rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">#</th>
                                <th class="px-4 py-2 border">Nama</th>
                                @can(['permission.update', 'permission.delete'])
                                    <th class="px-4 py-2 border text-center">Aksi</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border">{{ $permission->name }}</td>
                                    @can(['permission.update', 'permission.delete'])
                                        <td class="px-4 py-2 border text-center space-x-3">

                                            <!-- EDIT -->
                                            <button @click="openEdit({{ Js::from($permission) }})" class="text-green-600">
                                                Edit
                                            </button>

                                            <!-- DELETE -->
                                            <form action="{{ route('permissions.destroy', $permission->name) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Yakin hapus?')" class="text-red-600">
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
                        {{ $permissions->links() }}
                    </div>
                </div>

            </div>
        </div>

        <!-- MODAL -->
        <div x-show="open" x-transition x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div @click.away="open = false" class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6">
                <!-- HEADER -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold" x-text="isEdit ? 'Edit Permission' : 'Tambah Permission'">
                    </h3>
                    <button @click="open = false">✕</button>
                </div>

                <!-- FORM -->
                <form
                    :action="isEdit
                        ?
                        `/permissions/${form.id}` :
                        `{{ route('permissions.store') }}`"
                    method="POST" class="space-y-4">
                    @csrf
                    <template x-if="isEdit">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div>
                        <label class="text-sm font-medium">Nama Permission</label>
                        <input type="text" name="name" x-model="form.name"
                            class="w-full border rounded px-3 py-2 mt-4">

                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" @click="open = false" class="px-4 py-2 border rounded">
                            Batal
                        </button>

                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded"
                            x-text="isEdit ? 'Update' : 'Simpan'">
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
