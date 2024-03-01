@extends('layouts.app_en')

@section('title','Blog Details')

@section('content')

<livewire:en.setting.navbar :team_id="$team_id" />

<div class="st-content ">
    <div class=" st-page-heading st-dynamic-bg" data-src=" {{asset('storage/'.$BlogCategory->image)}}">
        <div class="container">
            <div class="st-page-heading-in text-center">
                <h1 class="st-page-heading-title">
                    {{$BlogCategory->name}}
                </h1>
                <div class="st-post-label">
                    {{-- <span>بواسطة <a href="#">{{$BlogCategory->writer}}</a></span> --}}
                </div>
            </div>
        </div>
    </div><!-- .st-page-heading -->
    <div class="st-height-b100 st-height-lg-b80"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="st-post-details st-style1">


                    <div class="st-post-info">
                        <div class="st-post-text">
                            {!!$blog->content!!}
                            <br>
                            {!!$blog->created_at->format('d-m-Y')!!}
                        </div>
                    </div>
                    <br>
                    <br>


                </div>

                <div class="st-post-details st-style1">

                    @forelse ($blogs as $blog)
                    <div class="st-post-info">
                        <div class="st-post-text">
                            {!!$blog->content!!}
                            <br>
                            {!!$blog->created_at->format('d-m-Y')!!}
                        </div>
                    </div>
                    <br>
                    <br>
                    @empty

                    @endforelse
                </div>

            </div>



            <div class="col-lg-4">
                <div class="st-height-b0 st-height-lg-b40"></div>
                <div class="st-widget st-sidebar-widget">
                    <h3 class="st-widget-title">Categories </h3>
                    <ul class="st-widget-list">

                        @forelse ($BlogCategories as $BlogCategory)
                        <li><a
                                href="{{url('/blog-details-en/'.$BlogCategory->id.'/team_id/'.$team_id)}}">{{$BlogCategory->name}}</a>
                        </li>
                        @empty
                        @endforelse
                    </ul>
                </div>


                {{-- <div class="st-height-b30 st-height-lg-b30"></div>
                <div class="st-widget st-sidebar-widget">
                    <h3 class="st-widget-title">Arachives</h3>
                    <ul class="st-widget-list">
                        <li><a href="#">March 2020</a></li>
                        <li><a href="#">May 2020</a></li>
                        <li><a href="#">June 2020</a></li>
                        <li><a href="#">August 2020</a></li>
                        <li><a href="#">September 2020</a></li>
                        <li><a href="#">October 2020</a></li>
                    </ul>
                </div> --}}


                <div class="st-height-b30 st-height-lg-b30"></div>
                <div class="st-widget st-sidebar-widget">
                    <h3 class="st-widget-title">{{'Popular Tags '}}</h3>
                    <div class="st-tagcloud">

                        @forelse ($blogs as $blog)
                        <a class="st-tag" href="{{url('/blog-en/'.$blog->id.'/team_id/'.$team_id)}}">{!!
                            $blog->keywords !!}</a>
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="st-height-b100 st-height-lg-b80"></div>
</div>



@endsection