<!-- Contact starts -->
<section id="contact" class="contact section-padding">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12 col-md-6" data-aos="{{ Request::is('/') ? 'fade-up' : '' }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header text-center pb-2">
                            <h2>Contact Us</h2>
                            <p>Got any question? feel free to contact us</p>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-md-12 p-0 pt-4 pb-4">
                        <div class="bg-light p-4 m-auto p-2 mb-3">
                            <table class="table mb-0">
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td> <a href="tel:+6281317368610">+6281 317 368 610</a></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td style="word-wrap: break-word;"> <a href="mailto:">@wayanadisutiantara.com</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Facebook</td>
                                    <td>:</td>
                                    <td>Warung Paradise</td>
                                </tr>
                                <tr>
                                    <td>Instagram</td>
                                    <td>:</td>
                                    <td>@wayan_adis84</td>
                                </tr>
                            </table>
                        </div>
                        <form action="#" class="bg-light p-4 m-auto">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input class="form-control" placeholder="Your Name" id="inquiryWaName"
                                            required="" type="text">
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="mb-3">
                                        <input class="form-control" placeholder="Email" required="" type="email">
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder="Message" id="inquiryWaMessage" required="" rows="3"></textarea>
                                    </div>
                                </div><button class="btn btn-warning btn-lg btn-block mt-3" type="button"
                                    id="inquiryWaSubmitBtn">Send Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" data-aos="{{ Request::is('/') ? 'fade-up' : '' }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header text-center pb-2">
                            <h2>Payment Method</h2>
                            <p>We accept payment via :</p>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-md-12 p-0 pt-4 pb-4 text-center">
                        <img src="{{ asset('frontend/img/payment_via.png') }}" alt="" srcset="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" data-aos="{{ Request::is('/') ? 'fade-up' : '' }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header text-center pb-2">
                            <h2>Review Us</h2>
                            <p>Review Us on Tripadvisor</p>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-md-12 p-0 pt-2 pb-4">
                        {{-- <img src="{{ asset('frontend/img/tripadvisor_logo.svg') }}" class="w-100" alt="">
                        <h3> <a href="https://www.tripadvisor.com/Attraction_Review-g294226-d8090367-Reviews-Lembongan_Ocean_Adenture-Bali.html">Lembongan Ocean Adventure</a> </h3> --}}
                        <form action="#" class="bg-light p-4 m-auto">
                            <div class="row">
                                <img src="{{ asset('frontend/img/tripadvisor_logo.svg') }}" style="width: 50%"
                                    class="mb-3" alt="">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <h4><a style="color: black"
                                                href="https://www.tripadvisor.com/Attraction_Review-g294226-d8090367-Reviews-Lembongan_Ocean_Adenture-Bali.html">Lembongan
                                                Ocean Adventure</a></h4>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <p class="star-rating">
                                            <i class="my-star star-1" data-star="1"></i>
                                            <i class="my-star star-2" data-star="2"></i>
                                            <i class="my-star star-3" data-star="3"></i>
                                            <i class="my-star star-4" data-star="4"></i>
                                            <i class="my-star star-5" data-star="5"></i>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" id="reviewTitle" class="form-control" placeholder="Title your review">
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder="Describe your stay in one sentence or less. "
                                            id="reviewText" rows="3"></textarea>
                                    </div>
                                </div><button class="btn btn-success btn-lg btn-block mt-3" type="button"
                                    id="tripadvisorSendBtn">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" data-aos="{{ Request::is('/') ? 'fade-up' : '' }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header text-center pb-2">
                            <h2>Office Location</h2>
                            <p>Find us at the end of Manggrove Straight</p>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-md-12 p-0 pt-4 pb-4">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7888.512954618951!2d115.45923963189125!3d-8.667141090386263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd26d07e6407177%3A0x9b0dd209ea9eac6d!2sWarung%20paradise!5e0!3m2!1sen!2sid!4v1665151314219!5m2!1sen!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
    <style>
        /*set the default color of the stars*/
        .star-rating{
            color: #bebebe;
            font-size:2em;
        }
        /*create the star*/
        .my-star::before{
            content:"\002605";
        }
        /*remove the default style (italic) of the star*/
        .my-star{
            font-style: unset !important;
        }
        /*set active star color*/
        .is-active{
            color:#fb8900;
        }
        /*set color on hover*/
        .my-star:not(.is-active):hover{
            color: #fb8900;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            (function() {
                let sr = document.querySelectorAll('.my-star');
                let i = 0;
                //loop through stars
                while (i < sr.length) {
                    //attach click event
                    sr[i].addEventListener('click', function() {
                        //current star
                        let cs = parseInt(this.getAttribute("data-star"));
                        //output current clicked star value
                        tripadvisorStar = cs;
                        /*our first loop to set the class on preceding star elements*/
                        let pre = cs; //set the current star value
                        //loop through and set the active class on preceding stars
                        while (1 <= pre) {
                            //check if the classlist contains the active class, if not, add the class
                            if (!document.querySelector('.star-' + pre).classList.contains(
                                'is-active')) {
                                document.querySelector('.star-' + pre).classList.add('is-active');
                            }
                            //decrement our current index
                            --pre;
                        } //end of first loop

                        /*our second loop to unset the class on succeeding star elements*/
                        //loop through and unset the active class, skipping the current star
                        let succ = cs + 1;
                        while (5 >= succ) {
                            //check if the classlist contains the active class, if yes, remove the class
                            if (document.querySelector('.star-' + succ).classList.contains(
                                'is-active')) {
                                document.querySelector('.star-' + succ).classList.remove('is-active');
                            }
                            //increment current index
                            ++succ;
                        }

                    }) //end of click event
                    i++;
                } //end of while loop
            })(); //end of function
        })
    </script>
@endpush
