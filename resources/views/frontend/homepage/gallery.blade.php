@push('styles')
    <link rel="stylesheet" href="{{ asset('plugin/swiperjs/swiper.min.css') }}" />

    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .thumbSwiper {
            height: 80%;
            width: 100%;
        }

        .mainSwiper {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .mainSwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .mainSwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .main-swiper img {
            display: block;
            width: 100%;
            height: 500px;
            object-fit: contain;
        }

        .thumb-swiper img {
            display: block;
            width: 100%;
            height: 100px;
            object-fit: cover;
        }

        .swiper-button-next{
            color : black;
        }

        .swiper-button-prev{
            color : black;
        }
    </style>
@endpush
<!-- portfolio strats -->
<section id="galleries" class="galleries section-padding pt-0 pb-0">
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-md-12">
                <div class="section-header pb-5">
                    <h4 class="text-info">Captured in frame</h4>
                    <h2><b>Our Gallery</b></h2>
                    <p>Check out our fun photos while enjoying the trip</p>
                </div>
            </div>
        </div>
        <div class="row px-3">
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper thumbSwiper">
                <div class="swiper-wrapper">
                    @forelse ($galleries as $gallery)
                        <div class="swiper-slide main-swiper">
                            <img src="{{ $gallery->getImage() }}" />
                        </div>
                    @empty
                        @include('frontend.homepage.includes.gallery_thumbnail_default')
                    @endforelse
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper mainSwiper">
                <div class="swiper-wrapper">
                    @forelse ($galleries as $gallery)
                        <div class="swiper-slide thumb-swiper">
                            <img src="{{ $gallery->getImage() }}" />
                        </div>
                    @empty
                        @include('frontend.homepage.includes.gallery_anchor_default')
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- portfolio ends -->

@push('scripts')
    <!-- Swiper JS -->
    <script src="{{ asset('plugin/swiperjs/swiper.min.js') }}"></script>

    <!-- Initialize Swiper -->
    <script>
        var mainSwiper = new Swiper(".mainSwiper", {
            loop: true,
            autoplay: {
                delay: 3000,
            },
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var thumbSwiper = new Swiper(".thumbSwiper", {
            loop: true,
            autoplay: {
                delay: 3000,
            },
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: mainSwiper,
            },
        });
    </script>
@endpush
