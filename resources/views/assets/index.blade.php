@extends('layouts.app')

@section('title', 'Asset List')

@section('contents')
    <div class="w-full max-w-7xl mx-auto">
        <div class="flex justify-between items-center">

            <h1 class="font-bold text-2xl ml-3">Asset List</h1>

            <form id="typeForm" method="GET" action="{{ route('admin/assets') }}">
                <div class="flex gap-2 w-full max-w-lg">
                    <select name="filter" id="filter"
                        class="block w-full rounded-lg border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        onchange="document.getElementById('typeForm').submit();" value="{{ request()->input('filter') }}">
                        <option value="" hidden>Pilih tipe</option>
                        <option value="Meja">Meja</option>
                        <option value="Kursi">Kursi</option>
                        <option value="Perangkat Komputer">Perangkat Komputer</option>
                        <option value="Lemari">Lemari</option>
                        <option value="Papan Tulis">Papan Tulis</option>
                        <option value="Alat Tulis Kelas">Alat Tulis Kelas</option>
                        <option value="Jam">Jam</option>
                        <option value="Pendingin Ruangan">Pendingin Ruangan</option>
                        <option value="Perangkat Suara">Perangkat Suara</option>
                        <option value="APAR">APAR</option>
                        <option value="Perangkat Praktikum Lab">Perangkat Praktikum LAB</option>
                        <option value="Alat Musik">Alat Musik</option>
                        <option value="Alat Olahraga">Alat Olahraga</option>
                        <option value="P3K">P3K</option>
                    </select>
                    <div data-search-form class="relative w-full">
                        <div class="text-gray-500">
                            <svg data-search-icon class="absolute fill-current w-4" viewBox="0 0 512 512"
                                style="top: 0.7rem; left: 1rem;">
                                <path
                                    d="M225.474 0C101.151 0 0 101.151 0 225.474c0 124.33 101.151 225.474 225.474 225.474 124.33 0 225.474-101.144 225.474-225.474C450.948 101.151 349.804 0 225.474 0zm0 409.323c-101.373 0-183.848-82.475-183.848-183.848S124.101 41.626 225.474 41.626s183.848 82.475 183.848 183.848-82.475 183.849-183.848 183.849z" />
                                <path
                                    d="M505.902 476.472L386.574 357.144c-8.131-8.131-21.299-8.131-29.43 0-8.131 8.124-8.131 21.306 0 29.43l119.328 119.328A20.74 20.74 0 00491.187 512a20.754 20.754 0 0014.715-6.098c8.131-8.124 8.131-21.306 0-29.43z" />
                            </svg>
                        </div>
                        <input type="text" placeholder="Search" name="search" id="search"
                            onchange="document.getElementById('typeForm').submit();"
                            value="{{ request()->input('search') }}"
                            class="h-auto pl-10 w-full w-48 py-2 bg-gray-100 text-sm border border-gray-500 rounded-lg focus:outline-none focus:bg-white">
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>

        </div>

        <a href="{{ route('admin/assets/create') }}"
            class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-5">Tambah
            Barang</a>

        @if (Session::has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ Session::get('success') }}
            </div>
        @endif



        <div class="overflow-x-auto w-full max-w-7xl mx-auto mt-16 border-2 rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-sm text-gray-700 bg-blue-50 dark:bg-blue-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 text-center">No</th>
                        <th scope="col" class="py-3">Kode Barang</th>
                        <th scope="col" class="py-3">Nama Barang</th>
                        <th scope="col" class="py-3">Tipe barang</th>
                        <th scope="col" class="py-3">Lokasi</th>
                        <th scope="col" class="py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($assets->count())
                        @foreach ($assets as $i => $rs)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 font-medium">
                                <th scope="row"
                                    class="font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                    {{ $assets->firstItem() + $i }}
                                </th>
                                <td>
                                    {{ $rs->code }}
                                </td>
                                <td>
                                    {{ $rs->name }}
                                </td>
                                <td>
                                    {{ $rs->type }}
                                </td>
                                <td>
                                    {{ $rs->location }}
                                </td>
                                <td class="w-1/6 py-3">
                                    <div class="flex items-center gap-2">
                                        <button
                                            class="text-blue-800 hover:bg-blue-200 hover:text-blue-800 px-3 py-2 rounded-lg active:scale-90 font-medium transition-all"
                                            onclick="location.href='{{ route('admin/assets/detail', $rs->id) }}'">
                                            Detail
                                            {{-- <a href="{{ route('admin/assets/detail', $rs->id) }}" class="text-blue-800">Detail</a>  --}}
                                        </button> |
                                        <button
                                            class="text-green-800 hover:bg-green-300 hover:text-green-800 px-3 py-2 rounded-lg active:scale-90 font-medium transition-all"
                                            onclick="location.href='{{ route('admin/assets/edit', $rs->id) }}'">
                                            Edit
                                        </button> |
                                        {{-- <a href="{{ route('admin/assets/edit', $rs->id)}}" class="text-green-800 pl-2">Edit</a> | --}}
                                        <form action="{{ route('admin/assets/delete', $rs->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')"
                                            class="text-red-800 hover:bg-red-300 hover:text-red-800 px-3 py-2 rounded-lg active:scale-90 font-medium transition-all">
                                            @csrf
                                            @method('DELETE')
                                            <button>Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="5">No assets found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $assets->links() }}
        </div>
    </div>
@endsection
