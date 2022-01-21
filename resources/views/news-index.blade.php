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

<!--================ News Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">

                    @forelse ($data as $d)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="storage/images/{{ $d->thumbnail }}" alt="{{$d->title}}" title="{{$d->title}}">
                            <a href="/news/{{$d->slug}}" class="blog_item_date">
                                <h3>{{ \Carbon\Carbon::parse($d->created_at)->format('d') }}</h3>
                                <p>{{ \Carbon\Carbon::parse($d->created_at)->format('M') }}</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="/news/{{$d->slug}}">
                                <h2>{{$d->title}}</h2>
                            </a>
                            <p>{!! Str::limit( strip_tags( $d->content ), 220 ) !!}</p>
                            <ul class="blog-info-link">
                                <li><a href="/news/{{$d->slug}}">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </article>
                    @empty
                    <i>No data yet...</i>
                    @endforelse

                    {{ $data->links() }}

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
<!--================ News Area =================-->

<style>
    .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
      display: none;
    }
</style>

@stop