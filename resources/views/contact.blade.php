@extends('layouts.app')
@section('title', $title)
@section('content')

    <!-- bradcam_area -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{$title}}</h3>
                        <p> <a href="{{route('frontpage')}}">Home</a> / {{$title}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area -->

    <!-- ================ contact section start ================= -->
        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>{{opsi ('website')}}</h3>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-location-pin"></i></span>
                            <div class="media-body">
                                <h3>{{opsi ('address')}}</h3>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                            <div class="media-body">
                                <h3>{{opsi ('phone')}}</h3>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-mobile"></i></span>
                            <div class="media-body">
                                <h3>{{opsi ('mobile')}}</h3>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>{{opsi ('email')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->

@stop