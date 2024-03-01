<div>
    <section id="department">
        <div class="st-height-b120 st-height-lg-b80"></div>
        <div class="container">
            <div class="st-section-heading st-style1">
                <h2 class="st-section-heading-title">Our department</h2>
                <div class="st-seperator">
                    <div class="st-seperator-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                    <div class="st-seperator-center">
                        <livewire:en.setting.icon :team_id="$team_id" />
                        {{-- <img src="assets/img/icons/4.png" alt="icon"> --}}
                    </div>
                    <div class="st-seperator-right wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                </div>
                <div class="st-section-heading-subtitle">
                    {!! $description->department ?? ''!!}
                </div>
            </div>
            <div class="st-height-b40 st-height-lg-b40"></div>
        </div>
        <div class="container">
            <div class="st-tabs st-fade-tabs st-style1">
                <ul class="st-tab-links st-style1 st-mp0">
                    @forelse ($departments as $key => $department)
                    <li class="st-tab-title {{$key ==0 ? 'active' : ''}}">
                        <a href="#{{$department->id}}" class="st-blue-box">
                            <img src=" {{asset('storage/'.$department->icon)}}" alt="">
                            <span>{{$department->name}}</span>
                        </a>
                    </li>
                    @empty
                    @endforelse

                </ul>
                <div class="st-height-b25 st-height-lg-b25"></div>
                <div class="tab-content">


                    @forelse ($departments as $key => $department)
                    <div id="{{$department->id}}" class="st-tab {{$key ==0 ? 'active' : ''}} ">
                        <div class=" st-imagebox st-style2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="st-imagebox-img"><img src=" {{asset('storage/'.$department->image)}}"
                                            alt="service">
                                    </div>
                                    <div class="st-height-b0 st-height-lg-b30"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="st-vertical-middle">
                                        <div class="st-vertical-middle-in">
                                            <div class="st-imagebox-info">
                                                <h2 class="st-imagebox-title">{{'Welcome to our'}} <span>
                                                        {!!$department->name!!}</span>
                                                </h2>
                                                <h4 class="st-imagebox-subtitle">
                                                    {!!$department->short_des!!}

                                                </h4>
                                                <div class="st-imagebox-text">
                                                    {!!$department->description!!}</div>
                                            </div>
                                            {{-- <div class="st-imagebox-btn">
                                                <a href="#" class="st-btn st-style1 st-size-medium st-color1">Read
                                                    More</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty

                    @endforelse



                </div>
            </div><!-- .st-tabs -->
        </div>
        <div class="st-height-b120 st-height-lg-b80"></div>
    </section>
</div>