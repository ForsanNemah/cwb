<div>
    <!-- Start Team Section -->
    <section id="doctors">
        <div class="st-height-b120 st-height-lg-b80"></div>
        <div class="container">
            <div class="st-section-heading st-style1">
                <h2 class="st-section-heading-title">Meet our specialists</h2>
                <div class="st-seperator">
                    <div class="st-seperator-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                    <div class="st-seperator-center">
                        {{-- <img src=" {{asset('storage/'.$appSettingEn->icon)}}" alt="icon"> --}}
                        <livewire:en.setting.icon :team_id="$team_id" />
                    </div>
                    <div class="st-seperator-right wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                </div>
                <div class="st-section-heading-subtitle">
                    {!! $description->doctor ?? ''!!}
                </div>
            </div>
            <div class="st-height-b40 st-height-lg-b40"></div>
        </div>
        <div class="container">
            <div class="st-slider st-style2">
                <div class="slick-container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"
                    data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3"
                    data-lg-slides="4" data-add-slides="4">
                    <div class="slick-wrapper">
                        @forelse ($doctors as $doctor)
                        <div class="slick-slide-in">
                            <div class="st-member st-style1 st-zoom">
                                <div class="st-member-img">
                                    <img src=" {{asset('storage/'.$doctor->image)}}" alt="member4" class="st-zoom-in">
                                    <a class="st-doctor-link"
                                        href="{{url('/doctor-en/'.$doctor->id.'/team_id/'.$team_id)}}"><i
                                            class="fas fa-link"></i></a>
                                    <div class="st-member-social-wrap">
                                        <img src="{{asset('assets/img/shape/member-shape.svg')}}" alt="shape"
                                            class="st-member-social-bg">
                                        <ul class="st-member-social st-mp0">
                                            <li>
                                                <a href="{{$doctor->facebook}}">
                                                    <i class="fab fa-facebook-square"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{$doctor->instagram}}"><i class="fab fa-linkedin"></i> </a>
                                            </li>
                                            <li>
                                                <a href="{{$doctor->pinterest}}">
                                                    <i class="fab fa-pinterest-square"></i>
                                                </a>
                                            </li>
                                            <li><a href="{{$doctor->twitter}}"><i class="fab fa-twitter-square"></i></a>
                                            </li>
                                            <li><a href="{{$doctor->dribbble}}">
                                                    <i class=" fab fa-dribbble-square"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="st-member-meta">
                                    <div class="st-member-meta-in">
                                        <h3 class="st-member-name"><a href="doctor-profile.html">
                                                Dr\

                                                {{$doctor->name}}</a>
                                        </h3>
                                        {{--التخصص --}}
                                        <div class="st-member-designation">{{$doctor->speciality}}</div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .slick-slide-in -->
                        @empty

                        @endforelse
                    </div>
                </div><!-- .slick-container -->
                <div class="pagination st-style1 st-flex st-hidden"></div>
                <!-- If dont need Pagination then add class .st-hidden -->
                <div class="swipe-arrow st-style1">
                    <!-- If dont need navigation then add class .st-hidden -->
                    <div class="slick-arrow-left"><i class="fa fa-chevron-left"></i></div>
                    <div class="slick-arrow-right"><i class="fa fa-chevron-right"></i></div>
                </div>
            </div><!-- .st-slider -->
        </div><!-- .container -->
        <div class="st-height-b120 st-height-lg-b80"></div>
    </section>
    <!-- End Team Section -->
    <hr>
</div>