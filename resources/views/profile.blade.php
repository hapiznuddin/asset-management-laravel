@extends('layouts.app')

@section('title', 'Profile Settings')

@section('contents')
<div class="max-w-7xl mx-auto">
    <h1 class="font-bold text-2xl text-center">Profil</h1>
    <hr />
        <div class="my-4">
            <label class="label">
                <span class="text-base label-text font-bold">Name</span>
            </label>
                <p>{{ auth()->user()->name }}</p>
        </div>
        <div>
            <label class="label">
                <span class="text-base label-text font-bold">Email</span>
            </label>
                <p>{{ auth()->user()->email }}</p>
        </div>
</div>
@endsection
