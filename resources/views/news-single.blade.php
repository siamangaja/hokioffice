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
                  <p> <a href="{{route('frontpage')}}">Home</a> / News</p>
              </div>
          </div>
      </div>
  </div>
</div>
<!--/ bradcam_area  -->

<!--================ News Area =================-->
<section class="blog_area single-post-area section-padding">
  <div class="container">
     <div class="row">
        <div class="col-lg-8 posts-list">
           <div class="single-post">
              <div class="feature-img">
                 <img class="img-fluid" src="/storage/images/{{ $data->thumbnail }}" alt="{{ $data->title }}" title="{{ $data->title }}">
              </div>
              <div class="blog_details">
                 <h2>{{ $data->title }}</h2>
                 <ul class="blog-info-link mt-3 mb-4">
                    <li><i class="fa fa-calendar-o"></i> {{ $data->created_at }}</li>
                 </ul>
                 <p>
                    {!! $data->content !!}
                 </p>
              </div>
           </div>

        </div>

        <div class="col-lg-4">
           <div class="blog_right_sidebar">

            <aside class="single_sidebar_widget popular_post_widget">
                <h3 class="widget_title">Latest News</h3>
                @forelse ($latest as $d)
                <div class="media post_item">
                    <div class="media-body">
                        <a href="/news/{{$d->slug}}">
                            <h3>{{$d->title}}</h3>
                        </a>
                        <p>{{ \Carbon\Carbon::parse($d->created_at)->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                @endforelse
            </aside>

           </div>
        </div>
     </div>
  </div>
</section>
<!--================ News Area end =================-->

@stop