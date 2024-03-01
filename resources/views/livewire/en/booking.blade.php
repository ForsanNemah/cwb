<div>
    <section id="appointment" class="st-shape-wrap st-gray-bg">
        <div class="st-shape4">
            <img src="{{asset('assets/img/shape/section_shape.png')}}" alt="shape1">
        </div>
        <div class="st-shape6">
            <img src="{{asset('assets/img/shape/contact-shape3.svg')}}" alt="shape3">
        </div>
        <div class="st-height-b120 st-height-lg-b80"></div>
        <div class="container">
            <div class="st-section-heading st-style1">
                <h2 class="st-section-heading-title">Make an appointment</h2>
                <div class="st-seperator">
                    <div class="st-seperator-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                    <div class="st-seperator-center">
                        {{-- <img src=" {{asset('storage/'.$appSettingEn->icon)}}" alt="icon"> --}}

                        <livewire:en.setting.icon :team_id="$team_id" />
                    </div>
                    <div class="st-seperator-right wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                </div>
                <div class="st-section-heading-subtitle">
                    {!! $description->appointment ?? ''!!}

                </div>
            </div>
            <div class="st-height-b40 st-height-lg-b40"></div>
        </div>
        <div class="container">
            <div class="row">

                <div class="col-lg-10 offset-lg-1">
                    <form wire:submit.prevent="Save()" class="st-appointment-form" id="appointment-form">
                        <div id="st-alert1">
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
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="st-form-field st-style1">
                                    <label>Full Name</label>
                                    <input type="text" wire:model="name" placeholder="Jhon Doe" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="st-form-field st-style1">
                                    <label>Email Address</label>
                                    <input type="email" wire:model="email" placeholder="example@gmail.com" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="st-form-field st-style1">
                                    <label>Phone Number</label>
                                    <input type="text" wire:model="phone" placeholder="+00 141 23 234" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="st-form-field st-style1">
                                    <label>Booking Date</label>
                                    <input type="date" wire:model="booking_date" placeholder="dd/mm/yy">
                                    {{-- <div class="form-field-icon"><i class="fa fa-calendar"></i></div> --}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="st-form-field st-style1">
                                    <label>{{'Department '}}</label>
                                    <div class="st-custom-select-wrap">
                                        <select class="form-control" data-placeholder="Select Department "
                                            wire:model="department_id">
                                            <option>{{'Select Department'}} </option>
                                            @forelse ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                            @empty
                                            <option></option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="st-form-field st-style1">
                                    <label>{{'Doctor'}}</label>
                                    <div class="st-custom-select-wrap">
                                        <select class="form-control" data-placeholder="Select octor  "
                                            wire:model="doctor_id">
                                            <option>{{'Select Doctor'}}</option>
                                            @forelse ($doctors as $doctor)
                                            <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                            @empty
                                            <option></option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="st-form-field st-style1">
                                    <label>{{'Branch'}} </label>
                                    <div class="st-custom-select-wrap">
                                        <select class="form-control" data-placeholder="Select Brance "
                                            wire:model="branch_id">
                                            <option>{{'Select Branch'}} </option>
                                            @forelse ($branches as $branche)
                                            <option value="{{$branche->id}}">{{$branche->name}}</option>
                                            @empty
                                            <option></option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="st-form-field st-style1">
                                    <label>Message</label>
                                    <textarea cols="30" rows="10" wire:model="message"
                                        placeholder="Write something here..."></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="st-btn st-style1 st-color1 st-size-medium"
                                    type="submit">Appointment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>