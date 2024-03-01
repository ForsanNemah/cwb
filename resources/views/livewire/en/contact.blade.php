<div>
    <section class="st-shape-wrap" id="contact">
        <div class="st-shape1"><img src="{{asset('assets/img/shape/contact-shape1.svg')}}" alt="shape1"></div>
        <div class="st-shape2"><img src="{{asset('assets/img/shape/contact-shape2.svg')}}" alt="shape2"></div>
        <div class="st-height-b120 st-height-lg-b80"></div>
        <div class="container">
            <div class="st-section-heading st-style1">
                <h2 class="st-section-heading-title">Stay connect with us</h2>
                <div class="st-seperator">
                    <div class="st-seperator-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                    <div class="st-seperator-center">
                        {{-- <img src="assets/img/icons/4.png" alt="icon"> --}}
                        <livewire:en.setting.icon :team_id="$team_id" />
                    </div>
                    <div class="st-seperator-right wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                </div>
                <div class="st-section-heading-subtitle">
                    {!! $description->connect ?? ''!!}
                </div>
            </div>
            <div class="st-height-b40 st-height-lg-b40"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="py-3 py-md-12">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-wrong">
                        {{ session('error') }}
                    </div>
                    @endif
                </div>

                <div class="col-lg-10 offset-lg-1">
                    <div id="st-alert"></div>
                    <form wire:submit.prevent="Save()" class="row st-contact-form st-type1">
                        <div class="col-lg-6">
                            <div class="st-form-field st-style1">
                                <label>Full Name</label>
                                <input type="text" id="name" wire:model.defer="name" placeholder="Jhon Doe" required>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="st-form-field st-style1">
                                <label>Email Address</label>
                                <input type="email" id="email" wire:model.defer="email" placeholder="example@gmail.com"
                                    required>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="st-form-field st-style1">
                                <label>Subject</label>
                                <input type="text" id="subject" wire:model.defer="subject" placeholder="Write subject"
                                    required>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="st-form-field st-style1">
                                <label>Phone</label>
                                <input type="text" id="phone" wire:model.defer="phone" placeholder="+00 376 12 465"
                                    required>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-12">
                            <div class="st-form-field st-style1">
                                <label>Your Message</label>
                                <textarea cols="30" rows="10" id="msg" wire:model.defer="message"
                                    placeholder="Write something here..." required></textarea>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-12">
                            <div class="text-center">
                                <div class="st-height-b10 st-height-lg-b10"></div>
                                <button class="st-btn st-style1 st-color1 st-size-medium" type="submit" id="submit"
                                    name="submit">Send
                                    message</button>
                            </div>
                        </div><!-- .col -->
                    </form>
                </div><!-- .col -->
            </div>
        </div>
        <div class="st-height-b120 st-height-lg-b80"></div>
    </section>
</div>