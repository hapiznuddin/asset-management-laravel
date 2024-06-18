@extends('layouts.user')

@section('title', 'Home')

@section('contents')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4">
            <h1 class="text-3xl font-bold text-gray-900">
                Check Asset
            </h1>
        </div>
    </header>
    <hr />
    <main class="max-w-7xl mx-auto px-6 md:px-4">
        <div data-search-form class="relative md:inline-block w-1/55 my-6">
            <div class="text-gray-500">
                <svg data-search-icon class="absolute fill-current w-4" viewBox="0 0 512 512"
                    style="top: 0.7rem; left: 1rem;">
                    <path
                        d="M225.474 0C101.151 0 0 101.151 0 225.474c0 124.33 101.151 225.474 225.474 225.474 124.33 0 225.474-101.144 225.474-225.474C450.948 101.151 349.804 0 225.474 0zm0 409.323c-101.373 0-183.848-82.475-183.848-183.848S124.101 41.626 225.474 41.626s183.848 82.475 183.848 183.848-82.475 183.849-183.848 183.849z" />
                    <path
                        d="M505.902 476.472L386.574 357.144c-8.131-8.131-21.299-8.131-29.43 0-8.131 8.124-8.131 21.306 0 29.43l119.328 119.328A20.74 20.74 0 00491.187 512a20.754 20.754 0 0014.715-6.098c8.131-8.124 8.131-21.306 0-29.43z" />
                </svg>
            </div>
            <form method="GET" action="{{ route('home') }}">
                <input type="text" placeholder="Search" name="search" id="search"
                    value="{{ request()->input('search') }}"
                    class="h-auto pl-10 w-full w-48 py-2 bg-gray-100 text-sm border border-gray-500 rounded-full focus:outline-none focus:bg-white">
            </form>
        </div>
        <div class="overflow-x-auto w-full max-w-7xl mx-auto border-2 rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-sm text-gray-700 bg-blue-50">
                    <tr>
                        <th scope="col" class="py-3 text-center px-1">No</th>
                        <th scope="col" class="py-3">Kode Barang</th>
                        <th scope="col" class="py-3">Nama Barang</th>
                        <th scope="col" class="py-3">Tipe barang</th>
                        <th scope="col" class="py-3">Lokasi</th>
                        <th scope="col" class="py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($asset->count() > 0)
                        @foreach ($asset as $i => $rs)
                            <tr
                                class="bg-white border-b hover:bg-gray-50 font-medium">
                                <th scope="row"
                                    class="font-medium text-gray-900 whitespace-nowrap text-center">
                                    {{ $asset->firstItem() + $i }}
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
                                <td class="py-3">
                                    <div class="flex items-center gap-2">
                                        <button
                                            class="text-blue-800 hover:bg-blue-200 hover:text-blue-800 px-3 py-2 rounded-lg active:scale-90 font-medium transition-all"
                                            onclick="location.href='{{ route('home/asset', $rs->id) }}'">
                                            Detail
                                            {{-- <a href="{{ route('admin/assets/detail', $rs->id) }}" class="text-blue-800">Detail</a>  --}}
                                        </button> 
                                        {{-- <button
                                            class="text-green-800 hover:bg-green-300 hover:text-green-800 px-3 py-2 rounded-lg active:scale-90 font-medium transition-all"
                                            onclick="location.href='{{ route('admin/assets/edit', $rs->id) }}'">
                                            Edit
                                        </button> |
                                        <form action="{{ route('admin/assets/delete', $rs->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')"
                                            class="text-red-800 hover:bg-red-300 hover:text-red-800 px-3 py-2 rounded-lg active:scale-90 font-medium transition-all">
                                            @csrf
                                            @method('DELETE')
                                            <button>Delete</button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="5">Product not found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $asset->links() }}
        </div>
    </main>
@endsection
