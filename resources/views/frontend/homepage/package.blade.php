<!-- portfolio strats -->
<section id="pacakages" class="pacakages section-padding">
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-md-12">
                <div class="section-header text-center pb-5">
                    <h2>Our Packages</h2>
                    <p>Multiple packages selection to suit your trip</p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($packages as $package)
                <div class="col-12 col-md-6 mb-3 col-lg-4" data-aos="fade-up">
                    <div class="card border-0 shadow-sm text-light text-center bg-white pb-2 h-100">
                        <div class="card-body text-dark d-flex flex-column">
                            <div class="img-area mb-4">
                                <img src="{{ $package->getImage() }}" loading="lazy" class="img-fluid" style="height: 300px; object-fit:cover" alt="{{ $package->title }}">
                            </div>
                            <h3 class="card-title text-start text-warning"> <b>IDR {{ formatPrice($package->price_start) }} {{ $package->price_end != null ? '~ '. formatPrice($package->price_end) : '' }} </b> </h3>
                            <h3 class="card-title text-start">{{ $package->title }}</h3>
                            <p class="text-start">{{ $package->short_description }}</p>
                            <div class="mt-auto">
                                <div class="row">
                                    <div class="col-6 mb-2 mb-md-0">
                                        <a href="https://api.whatsapp.com/send?phone=6281934316124&text=Hi Pandu Wisata Tour Lembongan, i want to ask about {{ $package->title }}" target="_blank" class="btn bg-success text-white" style="width:100%"> <i class="fa-brands fa-whatsapp"></i> Book Now</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('package.show', $package->slug) }}" target="_blank" class="btn bg-warning text-dark" style="width:100%">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 col-md-6 mb-3 col-lg-4">
                    <div class="card text-light text-center bg-white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="{{ asset('frontend/img/banner3') }}" class="img-fluid" alt="">
                            </div>
                            <h3 class="card-title">Oppss !! we don't have anything yet</h3>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- portfolio ends -->
