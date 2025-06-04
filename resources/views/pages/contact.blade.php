@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Contact Us</h1>
    @livewire('contact-form')
</div>
@endsection