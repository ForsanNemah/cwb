<div>
    <section id="gallery">
        <div class="st-height-b120 st-height-lg-b80"></div>
        <div class="container">
            <div class="st-section-heading st-style1">
                <h2 class="st-section-heading-title">View our gallery</h2>
                <div class="st-seperator">
                    <div class="st-seperator-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                    <div class="st-seperator-center">
                        <livewire:en.setting.icon :team_id="$team_id" />
                    </div>
                    <div class="st-seperator-right wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                </div>
                <div class="st-section-heading-subtitle">
                    {!! $description->gallery ?? ''!!}
                </div>
            </div>
            <div class="st-height-b40 st-height-lg-b40"></div>
        </div>
        <div class="container">
            <div class="st-portfolio-wrapper">
                <div class="st-isotop-filter st-style1 text-center">
                    <ul class="st-mp0">
                        <li class="active"><a href="#" data-filter="*">All</a></li>
                        @forelse ($departments as $department)
                        <li><a href="#" data-filter=".{{$department->id}}">{{$department->name}}</a></li>
                        @empty

                        @endforelse
                    </ul>
                </div>
                <div class="st-isotop st-style1 st-port-col-3 st-has-gutter st-lightgallery">
                    <div class="st-grid-sizer"></div>



                    @forelse ($galleries as $gallery)

                    <div class="st-isotop-item cardiology {{$gallery->department_id}}">
                        <a href=" {{asset('storage/'.$gallery->image)}}"
                            class="st-project st-zoom st-lightbox-item st-link-hover-wrap">
                            <div class="st-project-img st-zoom-in"><img src=" {{asset('storage/'.$gallery->image)}}"
                                    alt="project1">
                            </div>
                            <span class="st-link-hover"><i class="fas fa-arrows-alt"></i></span>
                        </a>
                    </div><!-- .st-isotop-item -->
                    @empty

                    @endforelse





                </div><!-- .isotop -->
            </div>
        </div>
        <div class="st-height-b120 st-height-lg-b80"></div>
    </section>
</div>