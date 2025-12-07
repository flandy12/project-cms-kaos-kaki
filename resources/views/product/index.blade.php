<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Your content -->

            <x-slot name="header">
                <div class="flex justify-between">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Product List') }}
                    </h2>
                    <a href="{{ route('product.create') }}"
                        class="bg-green-400 w-fit flex items-center justify-center gap-4 p-2 rounded-md text-white hover:bg-green-500 cursor-pointer font-semibold">
                        Add Product
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" stroke="#f2f2f2">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                stroke="#CCCCCC" stroke-width="0.192"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z"
                                    fill="#ffffff"></path>
                            </g>
                        </svg>

                    </a>
                </div>
            </x-slot>

            <div class="relative overflow-x-auto bg-white shadow-xs rounded-base border border-default">
                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="bg-neutral-secondary-soft border-b border-default">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Warna
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Tipe
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                Kaos Kaki Sport Pro
                            </th>
                            <td class="px-6 py-4">Black</td>
                            <td class="px-6 py-4">Kaos Kaki</td>
                            <td class="px-6 py-4">Sport</td>
                            <td class="px-6 py-4">$5</td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="#" class="text-green-500">Edit</a>
                                <a href="#" class="text-red-500">Delete</a>
                            </td>
                        </tr>

                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                Kaos Kaki Casual Thin Fit
                            </th>
                            <td class="px-6 py-4">Gray</td>
                            <td class="px-6 py-4">Kaos Kaki</td>
                            <td class="px-6 py-4">Casual</td>
                            <td class="px-6 py-4">$4</td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="#" class="text-green-500">Edit</a>
                                <a href="#" class="text-red-500">Delete</a>
                            </td>
                        </tr>

                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                Kaos Kaki Premium Long
                            </th>
                            <td class="px-6 py-4">Navy</td>
                            <td class="px-6 py-4">Kaos Kaki</td>
                            <td class="px-6 py-4">Premium</td>
                            <td class="px-6 py-4">$7</td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="#" class="text-green-500">Edit</a>
                                <a href="#" class="text-red-500">Delete</a>
                            </td>
                        </tr>

                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                Kaos Kaki Anti Bakteri
                            </th>
                            <td class="px-6 py-4">White</td>
                            <td class="px-6 py-4">Kaos Kaki</td>
                            <td class="px-6 py-4">Health</td>
                            <td class="px-6 py-4">$6</td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="#" class="text-green-500">Edit</a>
                                <a href="#" class="text-red-500">Delete</a>
                            </td>
                        </tr>

                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                Kaos Kaki Running Max
                            </th>
                            <td class="px-6 py-4">Blue</td>
                            <td class="px-6 py-4">Kaos Kaki</td>
                            <td class="px-6 py-4">Running</td>
                            <td class="px-6 py-4">$8</td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="#" class="text-green-500">Edit</a>
                                <a href="#" class="text-red-500">Delete</a>
                            </td>
                        </tr>

                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                Kaos Kaki Invisible Comfort
                            </th>
                            <td class="px-6 py-4">Brown</td>
                            <td class="px-6 py-4">Kaos Kaki</td>
                            <td class="px-6 py-4">Invisible</td>
                            <td class="px-6 py-4">$3</td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="#" class="text-green-500">Edit</a>
                                <a href="#" class="text-red-500">Delete</a>
                            </td>
                        </tr>

                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                Kaos Kaki Harian Soft Cotton
                            </th>
                            <td class="px-6 py-4">Cream</td>
                            <td class="px-6 py-4">Kaos Kaki</td>
                            <td class="px-6 py-4">Daily</td>
                            <td class="px-6 py-4">$4</td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="#" class="text-green-500">Edit</a>
                                <a href="#" class="text-red-500">Delete</a>
                            </td>
                        </tr>

                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                Kaos Kaki Outdoor Trek
                            </th>
                            <td class="px-6 py-4">Olive</td>
                            <td class="px-6 py-4">Kaos Kaki</td>
                            <td class="px-6 py-4">Outdoor</td>
                            <td class="px-6 py-4">$9</td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="#" class="text-green-500">Edit</a>
                                <a href="#" class="text-red-500">Delete</a>
                            </td>
                        </tr>

                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                Kaos Kaki Gym Grip
                            </th>
                            <td class="px-6 py-4">Red</td>
                            <td class="px-6 py-4">Kaos Kaki</td>
                            <td class="px-6 py-4">Gym</td>
                            <td class="px-6 py-4">$6</td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="#" class="text-green-500">Edit</a>
                                <a href="#" class="text-red-500">Delete</a>
                            </td>
                        </tr>

                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                Kaos Kaki Kerja Formal
                            </th>
                            <td class="px-6 py-4">Black</td>
                            <td class="px-6 py-4">Kaos Kaki</td>
                            <td class="px-6 py-4">Formal</td>
                            <td class="px-6 py-4">$5</td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="#" class="text-green-500">Edit</a>
                                <a href="#" class="text-red-500">Delete</a>
                            </td>
                        </tr>
                    </tbody>

                </table>

                <div class="flex justify-between items-center px-6 py-4">
                    <p class="text-sm text-gray-600">Showing 1 to 10 of 50 results</p>

                    <nav class="flex items-center space-x-1">
                        <a href="#" class="px-3 py-1 border rounded-md hover:bg-gray-100">Prev</a>
                        <a href="#" class="px-3 py-1 border rounded-md bg-blue-500 text-white">1</a>
                        <a href="#" class="px-3 py-1 border rounded-md hover:bg-gray-100">2</a>
                        <a href="#" class="px-3 py-1 border rounded-md hover:bg-gray-100">3</a>
                        <a href="#" class="px-3 py-1 border rounded-md hover:bg-gray-100">Next</a>
                    </nav>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
