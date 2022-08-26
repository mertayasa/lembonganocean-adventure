<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @forelse ($banners as $key => $banner)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key }}"></button>
        @empty
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        @endforelse
    </div>
    <div class="carousel-inner">
        @forelse ($banners as $key => $banner)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                {{-- <video class="d-block w-100" style="object-fit:cover" autoplay loop muted>
                    <source src="{{ $banner->getImage() }}" type="video/mp4" />
                </video> --}}
                <img src="{{ $banner->getImage() }}" class="d-block w-100" alt="{{ $banner->title ?? 'Banner Pandu Winata Tour Lembongan' }}">
                <div class="carousel-caption">
                    <h5> <b> {{ $banner->title }} </b> </h5>
                    <p>{{ $banner->caption }}</p>
                    @if ($banner->link)
                        <p><a href="{{ $banner->link }}" class="btn btn-warning mt-3">{{ $banner->button_text ?? 'Learn More' }}</a></p>
                    @endif
                </div>
            </div>
        @empty
            <div class="carousel-item active">
                <img src="{{ asset('frontend/img/banner2.jpg') }}" class="d-block w-100" alt="Banner Pandu Winata Tour Lembongan">
                {{-- <div class="carousel-caption">
                    <h5>Always Dedicated</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt
                        excepturi quas vero.</p>
                    <p><a href="#" class="btn btn-warning mt-3">Learn More</a></p>
                </div> --}}
            </div>
        @endforelse
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
