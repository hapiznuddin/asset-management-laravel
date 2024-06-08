@extends('layouts.app')

@section('title', 'Create Product')

@section('contents')
<div class="max-w-7xl mx-auto">
    <h1 class="font-bold text-2xl text-center">Tambah Aset</h1>
    <hr />
    <div class="border-b border-gray-900/10 w-full max-w-2xl mx-auto pb-12">
        <div class="mt-10 w-full">
            <form action="{{ route('admin/assets/store') }}" method="POST" enctype="multipart/form-data" class='w-full'>
                @csrf
                <div class="sm:col-span-4 w-full">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Kode Barang</label>
                    <div class="mt-2">
                        <input type="text" name="code" id="title"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-4 mt-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Nama Barang</label>
                    <div class="mt-2">
                        <input id="price" name="name" type="text"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-4 mt-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Tipe Barang</label>
                    <div class="mt-2">
                        {{-- <input id="product_code" name="type" type="text"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"> --}}

                        <select name="type" id="type" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="" hidden >Pilih tipe</option>
                            <option value="meja">Meja</option>
                            <option value="kursi">Kursi</option>
                            <option value="perangkat komputer">Perangkat Komputer</option>
                            <option value="lemari">Lemari</option>
                            <option value="papan tulis">Papan Tulis</option>
                            <option value="alat tulis kelas">Alat Tulis Kelas</option>
                            <option value="jam">Jam</option>
                            <option value="pendingin ruangan">Pendingin Ruangan</option>
                            <option value="perangkat suara">Perangkat Suara</option>
                            <option value="apar">APAR</option>
                            <option value="perangkat praktikum lab">Perangkat Praktikum LAB</option>
                            <option value="alat musik">Alat Musik</option>
                            <option value="alat olahraga">Alat Olahraga</option>
                            <option value="p3k">P3K</option>
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-4 mt-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Lokasi</label>
                    <div class="mt-2">
                        <input id="location" name="location" type="text"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <button type="submit"
                    class="flex w-full justify-center mt-10 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
