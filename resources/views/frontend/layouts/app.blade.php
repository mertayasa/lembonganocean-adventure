<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="o82UidUsptg1_N4x599a9hwYOgAOUI7BzLEsXGANcNo" />
    {{-- <title>Snorkling nusa lembongan and nusa penida trip - Lembongan Ocean Adventure</title> --}}

    @stack('meta')

    <!-- All CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/aos-master/dist/aos.css') }}">
    @stack('styles')
    <style>
        body{
            overflow-x: hidden !important;
        }
        #btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            z-index: 1;
        }
    </style>

    <style>
        .img-gradient:before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: linear-gradient(to top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.8) 100%);
        }
    </style>
</head>

<body>

    <!-- Back to top button -->
    <button type="button" class="btn btn-warning btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand d-none d-md-block" href="{{ Request::is('/') ? '#' : '/' }}">Lembongan Ocean Adventure</a>
            <a class="navbar-brand d-block d-md-none" href="{{ Request::is('/') ? '#' : '/' }}">Lembongan <br> Ocean Adventure </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Request::is('/') ? '#' : '/' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Request::is('/') ? '#about' : url('/') . '#about' }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ Request::is('/') ? '#services' : url('/') . '#services' }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Request::is('/') ? '#pacakages' : url('/') . '#pacakages' }}">Tour
                            Package</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#team">Destination</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- footer starts -->
    <footer class="bg-dark p-2 text-center">
        <div class="container">
            <p class="text-white">All Right Reserved By Lembongan Ocean Adventure</p>
        </div>
    </footer>
    <!-- footer ends -->

    <!-- All Js -->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugin/fontawesome-free/js/all.min.js') }}"></script>
    <script src="{{ asset('plugin/aos-master/dist/aos.js') }}"></script>
    <script>
        AOS.init();
        const inquiryWaName = document.getElementById('inquiryWaName')
        const inquiryWaMessage = document.getElementById('inquiryWaMessage')
        const inquiryWaSubmitBtn = document.getElementById('inquiryWaSubmitBtn')

        inquiryWaSubmitBtn.addEventListener('click', (e) => {
            e.preventDefault()
            if (inquiryWaName.value == '') {
                alert('Please fill in your name')
            } else if (inquiryWaMessage.value == '') {
                alert('Please fill in your message')
            } else {
                const url =
                    `https://api.whatsapp.com/send?phone=6281317368610&text=Hi Lembongan Ocean Adventure, my name ${inquiryWaName.value}, ${inquiryWaMessage.value}`
                window.open(url, '_blank').focus();
            }
        })

        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    @stack('scripts')
</body>

</html>
