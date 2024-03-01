@extends('layouts.app_en')

@section('title','Doctor Profile')

@section('content')

<livewire:en.setting.navbar :team_id="$team_id" />
<div class=" st-content">
    <!-- Start Doctors Profile -->
    <section class="st-shape-wrap">
        <div class="st-shape6">
            <img src="{{asset('assets/img/shape/contact-shape3.svg')}}" alt="shape3">
        </div>
        <div class="st-height-b120 st-height-lg-b80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-3">
                    <div class="st-doctors-info-left">
                        <div class="st-member st-style1 st-zoom">
                            <div class="st-member-img">
                                <img src=" {{asset('storage/'.$doctor->image)}}" alt="" class="st-zoom-in">
                                <div class="st-member-social-wrap">
                                    <img src="{{asset('assets/img/shape/member-shape.svg')}}" alt="shape"
                                        class="st-member-social-bg">
                                    <ul class="st-member-social st-mp0">
                                        <li><a href="{{$doctor->facebook}}"><i class="fab fa-facebook-square"></i></a>
                                        </li>
                                        <li><a href="{{$doctor->instagram}}"><i class="fab fa-linkedin"></i></a></li>
                                        <li><a href="{{$doctor->pinterest}}"><i class="fab fa-pinterest-square"></i></a>
                                        </li>
                                        <li><a href="{{$doctor->twitter}}"><i class="fab fa-twitter-square"></i></a>
                                        </li>
                                        <li><a href="{{$doctor->dribbble}}"><i class="fab fa-dribbble-square"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-9">
                    <div class="st-height-b25 st-height-lg-b25"></div>
                    <div class="st-doctors-info-right">
                        <div class="st-doctor-heading">
                            <h3 class="st-doctor-name">Dr. {{$doctor->name}}</h3>
                            <div class="st-doctor-designation">{{$doctor->speciality}}</div>
                            <div class="st-doctor-desc">
                                {{$doctor->department->name}} <br>
                                {{$doctor->branch->name}}
                                <br>
                                {{$doctor->branch->location}}
                            </div>
                        </div>
                        <div class="st-height-b20 st-height-lg-b20"></div>
                        <ul class="st-doctors-special st-mp0">
                            <li><b>Speciality :</b>
                                {{-- عرض تخصصات الدكتور من جدول التخصصات --}}
                                @forelse ($Specialities as $Speciality)
                                <span>{{$Speciality->speciality}},</span>
                                @empty
                                <span>{{$doctor->speciality}}</span>
                                @endforelse
                            </li>
                            <li><b>Experience :</b><span>{{$doctor->experience}}</span></li>
                            <li><b>Languages :</b>
                                @forelse ($languageDrs as $languageDr)

                                <span>{{$languageDr->language_code}} - </span>
                                @empty

                                @endforelse
                            </li>
                            <li><b>Types Of :</b><span>{{$doctor->types_of}}</span></li>
                        </ul>
                        <div class="st-height-b30 st-height-lg-b30"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="st-shedule-wrap st-style1">
                                    <div class="st-shedule">
                                        <h2 class="st-shedule-title">Contact info</h2>
                                        <div class="st-height-b10 st-height-lg-b10"></div>
                                        <ul class="st-footer-contact-list st-mp0">
                                            <li><span class="st-footer-contact-title">Address:</span>
                                                {{-- عنوان الدكتور--}}
                                                {{$doctor->address}}
                                            </li>
                                            <li><span class="st-footer-contact-title">Email:</span>
                                                {{--البريد الالكتروني--}}
                                                {{$doctor->email}}
                                            </li>
                                            <li><span class="st-footer-contact-title">Phone:</span>
                                                {{--رقم هاتف الدكتور --}}
                                                {{$doctor->phone}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="st-height-b0 st-height-lg-b30"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="st-shedule-wrap st-style2">
                                    <div class="st-shedule">
                                        <h2 class="st-shedule-title">Working hours</h2>
                                        <ul class="st-shedule-list">
                                            @forelse ($WorkingHours as $WorkingHour)
                                            <li>
                                                {{--اليوم --}}
                                                <div class="st-shedule-left">{{$WorkingHour->day}}</div>
                                                {{--بداية ساعات العمل ونهايته--}}
                                                <div class="st-shedule-right">{{$WorkingHour->for_hour}} –
                                                    {{$WorkingHour->to_hour}} </div>
                                            </li>
                                            @empty

                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="st-height-b25 st-height-lg-b25"></div>
                        <div class="st-tabs st-fade-tabs st-style2">
                            <ul class="st-tab-links st-style2 st-mp0">
                                <li class="st-tab-title active ">
                                    <a href="#Biography">Biography</a>
                                </li>
                                <li class="st-tab-title">
                                    <a href="#Education">Education</a>
                                </li>
                            </ul>
                            <div class="st-height-b25 st-height-lg-b25"></div>
                            <div class="tab-content">
                                <div id="Biography" class="st-tab active">
                                    <div class="st-doctor-details-box">
                                        @forelse ($Biographies as $Biography)

                                        <p>
                                            {{--السيرة الذاتية للدكتور --}}
                                            {!!$Biography->biography!!}

                                        </p>
                                        @empty

                                        @endforelse
                                    </div>
                                </div>
                                <div id="Education" class="st-tab">
                                    <div class="st-doctor-details-box">
                                        <ul>
                                            @forelse ($educationDrs as $educationDr)
                                            <li> {!!$educationDr->education!!}</li>
                                            @empty

                                            @endforelse
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div><!-- .st-tabs -->
                    </div>
                </div>
            </div>
        </div>
        <div class="st-height-b120 st-height-lg-b80"></div>
    </section>
    <!-- End Doctors Profile -->
    <hr>
    {{-- بداية الحجز--}}
    <livewire:en.booking :team_id="$team_id" :description="$description" />
    {{-- نهاية الحجز --}}
</div>


@endsection