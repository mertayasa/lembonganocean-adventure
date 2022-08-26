@extends('frontend.layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
@endpush

@section('content')
    @include('frontend.homepage.header')
    @include('frontend.homepage.about')
    @include('frontend.homepage.service')
    {{-- @include('frontend.homepage.package') --}}
    {{-- @include('frontend.homepage.destination') --}}
    @include('frontend.homepage.contact')
@endsection



