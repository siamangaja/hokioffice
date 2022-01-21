<!-- footer_start  -->
        <footer class="footer footer_bg_1">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget ">
                                <h3 class="footer_title">
                                    About Us
                                </h3>
                                <h5 style="color: #fff;">{{opsi ('website')}}</h5>
                                <p>{{opsi ('slogan')}}</p>
                                <div class="footer_logo">
                                    <a href="{{route('frontpage')}}">
                                        <img src="/img/logo.png" alt="{{opsi ('website')}}" title="{{opsi ('website')}}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget ">
                                <h3 class="footer_title">
                                    Contact Info
                                </h3>
                                <ul>
                                    <li>Address: {{opsi ('address')}}</li>
                                    <li>Phone: {{opsi ('phone')}}</li>
                                    <li>Mobile: {{opsi ('mobile')}}</li>
                                    <li>Email: {{opsi ('email')}}</li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget ">
                                <h3 class="footer_title">
                                    Navigations
                                </h3>
                                <ul>
                                    <li><a href="{{route('frontpage')}}">Home</a></li>
                                    <li><a href="/about">About</a></li>
                                    <li><a href="/services">Services</a></li>
                                    <li><a href="/news">News</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                    Other Links
                                </h3>
                                <ul>
                                    <li><a href="/login">Login</a></li>
                                    <li><a href="/career">Career</a></li>
                                    <li><a href="/disclaimer">Disclaimer</a></li>
                                    <li><a href="/terms-conditions">Terms & Conditions</a></li>
                                    <li><a href="/privacy-policy">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right_text">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-lg-8">
                            <p class="copy_right">
                                <span>Copyright &copy; 2022 {{opsi ('website')}}. All rights reserved.</span>
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="{{opsi ('facebook')}}" target="_blank">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{opsi ('twitter')}}" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{opsi ('instagram')}}" target="_blank">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer_end  -->

        <!-- JS here -->
       <script src="{{ asset('js/modernizr-3.5.0.min.js') }}"></script>
       <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
       <script src="{{ asset('js/popper.min.js') }}"></script>
       <script src="{{ asset('js/bootstrap.min.js') }}"></script>
       <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
       <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
       <script src="{{ asset('js/ajax-form.js') }}"></script>
       <script src="{{ asset('js/waypoints.min.js') }}"></script>
       <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
       <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
       <script src="{{ asset('js/scrollIt.js') }}"></script>
       <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
       <script src="{{ asset('js/wow.min.js') }}"></script>
       <script src="{{ asset('js/nice-select.min.js') }}"></script>
       <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
       <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
       <script src="{{ asset('js/plugins.js') }}"></script>
       <script src="{{ asset('js/gijgo.min.js') }}"></script>
       <script src="{{ asset('js/slick.min.js') }}"></script>
        <!--contact js-->
       <script src="{{ asset('js/contact.js') }}"></script>
       <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
       <script src="{{ asset('js/jquery.form.js') }}"></script>
       <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
       <script src="{{ asset('js/mail-script.js') }}"></script>
       <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>