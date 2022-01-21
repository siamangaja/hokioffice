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

    <!-- appertment_area_start -->
    <div class="appertment_area appertment_area2">
        <div class="container">
            <div class="row">

                @forelse ($data as $d)
                <div class="col-lg-4 col-md-6">
                    <div class="single_appertment mb-30">
                        <a href="services/{{$d->slug}}">
                            <div class="thumb">
                                <img src="storage/images/{{$d->thumbnail}}" alt="{{$d->title}}" title="{{$d->title}}">
                            </div>
                        </a>
                        <div class="appertment_info">
                            <a href="services/{{$d->slug}}"><span>{{$d->title}}</span></a>
                        </div>
                    </div>
                </div>
                @empty
                <i>No data yet...</i>
                @endforelse

                {{ $data->links() }}

            </div>
        </div>
    </div>
    <!-- appertment_area_end -->
    
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
                                <h3>{{opsi('mobile')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
      display: none;
    }
</style>

@stop