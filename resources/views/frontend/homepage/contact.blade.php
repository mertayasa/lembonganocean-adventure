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
                                    <td style="word-wrap: break-word;"> <a href="mailto:">test test test @gmail.com</a> </td>
                                </tr>
                                <tr>
                                    <td>Facebook</td>
                                    <td>:</td>
                                    <td>Adi Putra Tour</td>
                                </tr>
                                <tr>
                                    <td>Instagram</td>
                                    <td>:</td>
                                    <td>@----</td>
                                </tr>
                            </table>
                        </div>
                        <form action="#" class="bg-light p-4 m-auto">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input class="form-control" placeholder="Your Name" id="inquiryWaName" required="" type="text">
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
                                </div><button class="btn btn-warning btn-lg btn-block mt-3" type="button" id="inquiryWaSubmitBtn">Send Now</button>
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
                        <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=warung%20paradise%20Nusa%20lembongan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.whatismyip-address.com"></a><br><style>.mapouter{position:relative;text-align:right;height:100%;width:100%;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style></div></div>

                        {{-- <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Yellow%20bridge%20lembongan&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.whatismyip-address.com"></a><br><style>.mapouter{position:relative;text-align:right;height:100%;width:100%;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style></div></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
