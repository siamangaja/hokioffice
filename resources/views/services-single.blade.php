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
                        <p> <a href="{{route('frontpage')}}">Home</a> / Services</p>
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
                <div class="col-lg-12">
                    <div class="about_info pl-70">
                        <div class="section_title mb-55">
                            <h3><span>{{$title}}</span></h3>
                            <div class="devider">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="info_inner">
                            {!! $data->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end  -->
    
    
    <!-- quotation_area_start  -->
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