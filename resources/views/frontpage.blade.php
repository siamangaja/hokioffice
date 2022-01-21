@extends('layouts.app')
@section('title', $title)
@section('content')

    <!-- slider_area_start -->
        <div class="slider_area">
            <div class="slider_active owl-carousel">
                <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-8">
                                <div class="slider_text">
                                    <span></span>
                                    <h3>We Create your dream appartment</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipilit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Quis.</p>
                                    <a href="/about" class="boxed-btn3">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-8">
                                <div class="slider_text">
                                    <span></span>
                                    <h3>We Create
                                        your deam
                                        appartment</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipilit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Quis.</p>
                                    <a href="#" class="boxed-btn3">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-8">
                                <div class="slider_text">
                                    <span></span>
                                    <h3>We Create
                                        your deam
                                        appartment</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipilit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Quis.</p>
                                    <a href="#" class="boxed-btn3">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider_area_end -->

        <!-- about_area_start -->
        <div class="about_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="about_exp d-flex align-items-center justify-content-center">
                            <div class="about_exp_inner_upper d-flex align-items-center justify-content-center">
                                <div class="about_exp_inner text-center">
                                    <span>10</span>
                                    <p>Years of Experiences</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about_info pl-70">
                            <div class="section_title mb-55">
                                <h3>We Are<br>
                                    <span>Real Estate Company</span></h3>
                                <div class="devider">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                            <div class="info_inner">

                                {!! $About !!}

                                <div class="customer_info d-flex">
                                    <div class="single_info d-flex align-items-baseline">
                                        <span class="counter">125</span>
                                        <p>Buildings</p>
                                    </div>
                                    <div class="single_info d-flex align-items-baseline">
                                        <span ><span class="counter">500</span>+</span>
                                        <p>Clients</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about_area_end -->

        <!-- features_area_start -->
        <div class="our_facilitics_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title text-center white_title mb-80">
                            <h3>Our Features</h3>
                            <div class="devider">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($Features as $f)
                    <div class="col-lg-4 col-md-6">
                        <div class="single_feature text-center">
                            <div class="icon">
                                {!! $f->icon !!}
                            </div>
                            <h3>{{$f->title}}</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
        <!-- features_area_end -->
        
        <!-- property_certificates_start -->
        <!-- <div class="property_certificates">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="section_title">
                            <h3>Property
                                <span>Certificates</span></h3>
                            <div class="devider">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="certificate_listing d-flex justify-content-between align-items-center">
                            <div class="single_list">
                                <div class="thumb">
                                    <img src="img/certificates/1.png" alt="">
                                </div>
                            </div>
                            <div class="single_list">
                                <div class="thumb">
                                    <img src="img/certificates/2.png" alt="">
                                </div>
                            </div>
                            <div class="single_list">
                                <div class="thumb">
                                    <img src="img/certificates/3.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- property_certificates_end -->

        <!-- services_area_start -->
        <div class="appertment_area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <h3>Our Services</h3>
                        <div class="devider">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="appertment_active owl-carousel">
                @forelse ($Services as $s)
                <div class="single_appertment">
                    <div class="thumb">
                        <img src="storage/images/{{$s->thumbnail}}" alt="{{$s->title}}" title="{{$s->title}}">
                    </div>
                    <div class="appertment_info">
                        <a href="services/{{$s->slug}}"><span>{{$s->title}}</span></a>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        <!-- services_area_end -->
        
        <!-- testimonial_area -->
        <div class="testimonial_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="testmonial_active owl-carousel">
                            @forelse ($Testimonials as $testi)
                            <div class="single_carousel">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div class="single_testmonial text-center">
                                            <div class="author_thumb">
                                                <img src="storage/images/{{$testi->image}}" alt="{{$testi->name}}" title="{{$testi->name}}">
                                            </div>
                                            <div class="testmonial_author">
                                                <h3>{{$testi->name}}</h3>
                                                <span>{{$testi->company}}</span>
                                            </div>
                                            <p>{!! $testi->content !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <i>No data yet...</i>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /testimonial_area -->

        <!-- quotation_area_start -->
        <div class="quotation_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="quotation_text d-flex align-items-center justify-content-between">
                            <div class="quotation_info">
                                <h3>Get a free <br>
                                    quotation Today!</h3>
                                    <p>Have any questions in mind?</p>
                                <a href="{{route('contact')}}" class="boxed-btn3">Contact Us</a>
                            </div>
                            <div class="sayhello d-flex align-items-center">
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="num">
                                    <span>Contact Us Now</span>
                                    <h3>{{opsi ('mobile')}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- quotation_area_end -->

        <!-- latest_news_area_start -->
        <div class="our_latest_news_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title text-center mb-80">
                            <h3>Latest News</h3>
                            <div class="devider">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="news_active owl-carousel">

                            @forelse ($News as $n)
                            <div class="single_news">
                                <div class="thumb">
                                    <a href="/news/{{$n->slug}}">
                                        <img src="storage/images/{{ $n->thumbnail }}" alt="{{$n->title}}" title="{{$n->title}}">
                                    </a>
                                </div>
                                <div class="news_info d-flex">
                                    <div class="date">
                                        <p><span>{{ \Carbon\Carbon::parse($n->created_at)->format('d') }}</span> <br>{{ \Carbon\Carbon::parse($n->created_at)->format('M') }}</p>
                                    </div>
                                    <div class="news_meta">
                                        <small>{{$n->created_at}}</small>
                                        <a href="/news/{{$n->slug}}"><h3>{{$n->title}}</h3></a>
                                        <a class="read_more" href="/news/{{$n->slug}}">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <i>No data yet...</i>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest_news_area_end -->

@stop