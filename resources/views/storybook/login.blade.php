@extends('layouts.app')

@section('title', 'Storybook Login')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow mt-10">
    <form method="POST" action="{{ route('storybook.login.submit') }}">
        @csrf
        <div class="mb-4">
            <label class="block font-medium mb-1">Name</label>
            <input name="name" required class="w-full border p-2 rounded" />
        </div>
        <div class="mb-6">
            <label class="block font-medium mb-1">Email</label>
            <input name="email" type="email" required class="w-full border p-2 rounded" />
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded w-full">
            Enter Storybook
        </button>
    </form>
</div>
@endsection
