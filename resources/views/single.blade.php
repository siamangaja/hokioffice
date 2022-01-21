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
                        <p> <a href="{{route('frontpage')}}">Home</a> / {{$title}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about_info pl-70">
                        <div class="info_inner">
                            {!! $data !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop