@extends('layouts.user')

@section('title', 'Detail Asset')

@section('contents')
    <h1 class="font-bold text-2xl ml-3">Detail Barang</h1>
    <hr />
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-gray-900">Kode Barang</label>
                <div class="mt-2">
                    {{ $asset->code }}
                </div>
            </div>

            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-gray-900">Nama Barang</label>
                <div class="mt-2">
                    {{ $asset->name }}
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-gray-900">Tipe Barang</label>
                <div class="mt-2">
                    {{ $asset->type }}
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-gray-900">Lokasi</label>
                <div class="mt-2">
                    {{ $asset->location }}
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
