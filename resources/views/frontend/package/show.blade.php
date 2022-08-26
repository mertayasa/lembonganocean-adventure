@extends('frontend.layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <style>
        thead, tr {
            border-color: #ced4da;
            border-style: solid;
            border-width: 1px;
        }
    </style>
@endpush

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 60vh">
                <img src="{{ $package->getImage() }}" class="d-block w-100" alt="Banner Pandu Winata Tour Lembongan">
                <div class="carousel-caption">
                    <h5> <b> {{ $package->title }} </b></h5>
                </div>
            </div>
        </div>
    </div>

    <section id="pacakages" class="pacakages section-padding">
        <div class="container">
            <h1>{{ $package->title }}</h1>
            <h3 class="card-title text-start text-warning"> <b>IDR {{ formatPrice($package->price_start) }} {{ $package->price_end != null ? '~ '. formatPrice($package->price_end) : '' }} </b> </h3>
            <hr>
            <h5 class="mt-4">Package Detail : </h5>
            <div class="pacakage-detail">
                {!! $package->full_description !!}
            </div>
            <div class="cta">
                <a href="https://api.whatsapp.com/send?phone=6281934316124&text=Hi Pandu Wisata Tour Lembongan, i want to ask about {{ $package->title }}" target="_blank" class="btn bg-success text-white"> <i class="fa-brands fa-whatsapp"></i> Book Now</a>
            </div>
            <hr>
            <h5 class="mt-3 mt-md-4">Similiar Package : </h5>
            <div class="row">
                @forelse ($similiar_packages as $similiar_package)
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <img class="card-img-top" style="height: 100px; object-fit:cover" src="{{ $similiar_package->getImage() }}" alt="Card image cap">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-start text-warning"> <b>IDR {{ formatPrice($similiar_package->price_start) }} {{ $similiar_package->price_end != null ? '~ '. formatPrice($similiar_package->price_end) : '' }} </b> </h5>
                                <h6 class="card-title text-start">{{ $similiar_package->title }}</h6>

                                <div class="mt-auto">
                                    <a href="{{ route('package.show', $similiar_package->slug) }}" class="btn btn-sm btn-warning">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="alert alert-warning">
                            <h5>No similiar package found</h5>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    @include('frontend.homepage.contact')
@endsection



