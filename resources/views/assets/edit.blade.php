@extends('layouts.app')

@section('title', 'Edit Asset')

@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <form action="{{ route('admin/assets/update', $asset->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Kode barang</label>
                    <div class="mt-2">
                        <input type="text" name="code" id="code" value="{{ $asset->code }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Nama Barang</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" value="{{ $asset->name }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Tipe Barang</label>
                    <div class="mt-2">
                        <input id="type" name="type" value="{{ $asset->type }}" type="text"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Lokasi</label>
                    <div class="mt-2">
                        <textarea name="location" placeholder="Descriptoin" rows="3"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    {{ $asset->location }}
                    </textarea>
                    </div>
                </div>
                <button type="submit"
                    class="flex w-full justify-center mt-10 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </form>
        </div>
    </div>
@endsection
