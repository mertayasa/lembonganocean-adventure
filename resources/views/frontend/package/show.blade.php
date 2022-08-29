@extends('frontend.layouts.app')

@push('meta')
    <title>{{ $package->title ?? 'Snorkling nusa lembongan and nusa penida trip' }} - Lembongan Ocean Adventure</title>
    <meta name="description" content="Book now! {{ $package->title ?? 'Snorkling nusa lembongan and nusa penida trip' }}">
    <meta name="keywords" content="nusa penida, nusa penida tour, blue lagoon lembongan, yellow bridge, nusa lembongan, nusa lembongan tour, dream beach lembongan, snorkeling nusa penida, manta, kelingking, atuh, broken beach, crystal bay">

    <meta property="og:url" content="{{ ('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $package->title ?? 'Snorkling nusa lembongan and nusa penida trip' }} - Lembongan Ocean Adventure" />
    <meta property="og:description" content="Book now! {{ $package->short_description ?? 'Snorkling nusa lembongan and nusa penida trip' }}" />
    <meta property="og:image" content="{{ $package->getImage() }}" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{ $package->title ?? 'Snorkling nusa lembongan and nusa penida trip' }} - Lembongan Ocean Adventure" />
    <meta name="twitter:description" content="Book now! {{ $package->short_description ?? 'Snorkling nusa lembongan and nusa penida trip' }}" />
    <meta name="twitter:image" content="{{ $package->getImage() }}" />
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <style>
        thead, tr {
            border-color: #ced4da;
            border-style: solid;
            border-width: 1px;
        }

        .carousel-caption {
            bottom: 20vh;
            z-index: 2;
        }

        .pacakage-detail > p > img {
            max-width: 100%;
            height: 100%;
        }

        @media only screen and (max-width: 767px){
            .carousel-caption {
                bottom: 20vh;
            }
        }
    </style>
@endpush

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 60vh">
                <img src="{{ $package->getImage() }}" class="d-block w-100" alt="{{ $package->title }}">
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
                <a href="https://api.whatsapp.com/send?phone=6281934316124&text=Hi Lembongan Ocean Adventure, i want to ask about {{ $package->title }}" target="_blank" class="btn bg-success text-white"> <i class="fa-brands fa-whatsapp"></i> Book Now</a>
            </div>
            <hr>
            <h5 class="mt-3 mt-md-4">Similiar Package : </h5>
            <div class="row">
                @forelse ($similiar_packages as $similiar_package)
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <img class="card-img-top" style="height: 100px; object-fit:cover" src="{{ $similiar_package->getImage() }}" alt="{{ $package->title }}">
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



