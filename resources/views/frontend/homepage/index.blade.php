@extends('frontend.layouts.app')

@push('meta')
    <title>Cheap Nusa Penida Lembongan Tour - Lembongan Ocean Adventure</title>
    <meta name="description" content="Book now! let's go snorkeling and go around nusa lembongan and nusa penida">
    <meta name="keywords" content="nusa penida, nusa penida tour, blue lagoon lembongan, yellow bridge, nusa lembongan, nusa lembongan tour, dream beach lembongan, snorkeling nusa penida, manta, kelingking, atuh, broken beach, crystal bay">

    <meta property="og:url" content="{{ ('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Nusa Penida Lembongan Tour - Lembongan Ocean Adventure" />
    <meta property="og:description" content="Book now! let's go snorkeling and go around nusa lembongan and nusa penida" />
    <meta property="og:image" content="{{ asset('frontend/img/penidatrip-thumbnail.jpeg') }}" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Nusa Penida Lembongan Tour - Lembongan Ocean Adventure" />
    <meta name="twitter:description" content="Book now! let's go snorkeling and go around nusa lembongan and nusa penida" />
    <meta name="twitter:image" content="{{ asset('frontend/img/motorbike_tour.jpg') }}" />
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
@endpush

@section('content')
    @include('frontend.homepage.header')
    @include('frontend.homepage.about')
    @include('frontend.homepage.service')
    @include('frontend.homepage.package')
    @include('frontend.homepage.gallery')
    {{-- @include('frontend.homepage.destination') --}}
    @include('frontend.homepage.contact')
@endsection



