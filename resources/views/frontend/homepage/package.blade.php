<!-- portfolio strats -->
<section id="pacakages" class="pacakages section-padding">
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-md-12">
                <div class="section-header pb-5">
                    <h4 class="text-info">Interested ?</h4>
                    <h2><b>Our Packages</b></h2>
                    <p>Check out our activity packages</p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($packages as $package)
            <div class="mb-3">
                <div class="row">
                    <div class="col-12 col-md-6 text-center text-md-start mb-4 mb-md-0" data-aos="fade-up">
                        <img src="{{ $package->getImage() }}" loading="lazy" class="img-fluid" style="min-width: 100% !important; height: 300px; object-fit:cover" alt="{{ $package->title }}">
                    </div>
                    <div class="col-12 col-md-6 px-4 px-md-0 mb-4 mb-md-0" data-aos="fade-up">
                        <h3 class="card-title text-center text-md-start text-warning"> <b>IDR {{ formatPrice($package->price_start) }} {{ $package->price_end != null ? '~ '. formatPrice($package->price_end) : '' }} </b> </h3>
                        <h3 class="card-title text-center text-md-start">{!! $package->title !!}</h3>
                        <p class="text-center text-md-start">{!! $package->short_description !!}</p>
                        <div class="row">
                            <div class="col-6 mb-2 mb-md-0">
                                <a href="https://api.whatsapp.com/send?phone=6281317368610&text=Hi Lembongan Ocean Adventure, i want to ask about {{ $package->title }}" target="_blank" class="btn bg-success text-white" style="width:100%"> <i class="fa-brands fa-whatsapp"></i> Book Now</a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('package.show', $package->slug) }}" target="_blank" class="btn bg-warning text-dark" style="width:100%">Learn More</a>
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
