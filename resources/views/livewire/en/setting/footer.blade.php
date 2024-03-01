<!-- Start Footer -->
<footer class="st-site-footer st-sticky-footer st-dynamic-bg" data-src="assets/img/footer-bg.png">
    <div class="st-main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="st-footer-widget">
                        <div class="st-text-field">
                            <img src="{{asset('storage/'.$websiteSettingEn->logo)}}"
                                alt="{{$websiteSettingEn->name ?? ''}}" class="st-footer-logo">
                            <div class="st-height-b25 st-height-lg-b25"></div>
                            <div class="st-footer-text">
                                {!! $websiteSettingEn->short_des_footer !!}

                            </div>
                            <div class="st-height-b25 st-height-lg-b25"></div>
                            <ul class="st-social-btn st-style1 st-mp0">
                                <li><a href="{{$websiteSettingEn->facebook ?? ''}}"><i
                                            class="fab fa-facebook-square"></i></a>
                                </li>
                                <li><a href="{{$websiteSettingEn->pinterest}}"><i
                                            class="fab fa-pinterest-square"></i></a>
                                </li>
                                <li><a href="{{$websiteSettingEn->instagram ?? ''}}"><i class="fab fa-linkedin"></i></a>
                                </li>
                                <li><a href="{{$websiteSettingEn->twitter ?? ''}}"><i
                                            class="fab fa-twitter-square"></i></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div><!-- .col -->

                <div class="col-lg-4">
                    <div class="st-footer-widget">
                        <div class="st-text-field">

                        </div>
                    </div>
                </div><!-- .col -->

                <div class="col-lg-4">
                    <div class="st-footer-widget">
                        <h2 class="st-footer-widget-title">Contacts</h2>
                        <ul class="st-footer-contact-list st-mp0">
                            <li><span class="st-footer-contact-title">Address:</span>

                                {{$websiteSettingEn->address}}
                            </li>
                            <li><span class="st-footer-contact-title">Email:</span>
                                {{$websiteSettingEn->email}}</li>
                            <li><span class="st-footer-contact-title">Phone:</span>
                                {{$websiteSettingEn->phone1}}
                                <br>
                                {{$websiteSettingEn->phone2}}
                            </li>
                        </ul>
                    </div>
                </div><!-- .col -->
            </div>
        </div>
    </div>
    <div class="st-copyright-wrap">
        <div class="container">
            <div class="st-copyright-in">
                <div class="st-left-copyright">
                    <div class="st-copyright-text">Copyright 2021. Design by Laralink</div>
                </div>
                <div class="st-right-copyright">
                    <div id="st-backtotop"><i class="fas fa-angle-up"></i></div>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- End Footer -->