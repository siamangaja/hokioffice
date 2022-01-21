@extends('layouts.app')
@section('title', $title)
@section('content')

<!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{$title}}</h3>
                        <p> <a href="{{route('frontpage')}}">Home</a> / About</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- about_area_start  -->
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

                            {!! $data !!}

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
    <!-- about_area_end  -->
    
    <!-- testimonial_area  -->
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
                         @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /testimonial_area  -->

    <div class="quotation_area ex_margin">
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

@stop