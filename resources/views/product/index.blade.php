<x-app-layout>
    <div x-data="{
        open: {{ $errors->any() ? 'true' : 'false' }},
        isEdit: false,
        form: {
            id: null,
            name: '',
            color: '',
            category: '',
            type: '',
            price: '',
        },
    
        openCreate() {
            this.isEdit = false
            this.form = {
                id: null,
                name: '',
                color: '',
                category: '',
                type: '',
                price: '',
            }
            this.open = true
        },
    
        openEdit(product) {
            this.isEdit = true
            this.form = {
                id: product.id,
                name: product.name,
                color: product.color,
                category: product.category,
                type: product.type,
                price: product.price,
                image: product.image,
            }
            this.open = true
        }
    
    }" class="py-6">

        <!-- CONTENT -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-md rounded-lg p-6">

                <!-- HEADER -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">Daftar Produk</h2>
                    @can('product.create')
                        <button @click="openCreate()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Tambah Produk
                        </button>
                    @endcan
                </div>

                <!-- TABLE -->
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left border rounded-lg text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">#</th>
                                <th class="px-4 py-2 border">Nama</th>
                                <th class="px-4 py-2 border">Image</th>
                                <th class="px-4 py-2 border">Warna</th>
                                <th class="px-4 py-2 border">Kategori</th>
                                <th class="px-4 py-2 border">Tipe</th>
                                <th class="px-4 py-2 border">Stock</th>
                                <th class="px-4 py-2 border">Harga</th>
                                @can(['product.update', 'product.delete'])
                                    <th class="px-4 py-2 border text-center">Aksi</th>
                                @endcan
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border">{{ $product->name }}</td>
                                    <td class="px-4 py-2 border">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="w-16 h-16 object-cover">
                                    </td>
                                    <td class="px-4 py-2 border">{{ $product->color }}</td>
                                    <td class="px-4 py-2 border">{{ $product->category }}</td>
                                    <td class="px-4 py-2 border">{{ $product->type }}</td>
                                    <td class="px-4 py-2 border">{{ $product->stock }}</td>
                                    <td class="px-4 py-2 border">
                                        Rp{{ number_format($product->price) }}
                                    </td>
                                    @can(['product.update', 'product.delete'])
                                        <td class="px-4 py-2 border text-center space-x-3">
                                            <button @click="openEdit({{ Js::from($product) }})" class="text-green-600">
                                                Edit
                                            </button>

                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Yakin hapus produk?')"
                                                    class="text-red-600">
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
                        {{ $products->links() }}
                    </div>
                </div>

            </div>
        </div>

        <!-- MODAL -->
        <div x-show="open" x-transition x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-scroll">
            <div @click.away="open = false" class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6">

                <!-- MODAL HEADER -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold" x-text="isEdit ? 'Edit Produk' : 'Tambah Produk'">
                    </h3>
                    <button @click="open = false">✕</button>
                </div>

                <!-- FORM -->
                <form
                    :action="isEdit
                        ?
                        `/product/${form.id}` :
                        `{{ route('product.store') }}`"
                    enctype="multipart/form-data" method="POST" class="space-y-4">


                    @csrf

                    <template x-if="isEdit">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <!-- Nama -->
                    <div>
                        <label class="text-sm font-medium">Nama Produk</label>
                        <input type="text" name="name" x-model="form.name"
                            class="w-full border rounded px-3 py-2 mt-1">
                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-sm font-medium">Image</label>

                        <template x-if="isEdit && form.image">
                            <img :src="`/storage/${form.image}`" class="w-24 h-24 object-cover rounded mb-2">
                        </template>

                        <input type="file" name="image" class="w-full border rounded px-3 py-2 mt-1">

                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Warna -->
                    <div>
                        <label class="text-sm font-medium">Warna</label>
                        <input type="text" name="color" x-model="form.color"
                            class="w-full border rounded px-3 py-2 mt-1">
                        @error('color')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="text-sm font-medium">Kategori</label>
                        <input type="text" name="category" x-model="form.category"
                            class="w-full border rounded px-3 py-2 mt-1">
                        @error('category')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tipe -->
                    <div>
                        <label class="text-sm font-medium">Tipe</label>
                        <input type="text" name="type" x-model="form.type"
                            class="w-full border rounded px-3 py-2 mt-1">
                        @error('type')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div>
                        <label class="text-sm font-medium">Harga</label>
                        <input type="number" name="price" x-model="form.price"
                            class="w-full border rounded px-3 py-2 mt-1">
                        @error('price')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- ACTION -->
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
