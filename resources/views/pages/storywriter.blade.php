@extends('layouts.app')

@section('title', 'Home')


@section('content')
<iframe src="{{ config('app.storywriter_url') }}/storywriter" style="width:100%; height:100vh; border:0;"></iframe>

@endsection