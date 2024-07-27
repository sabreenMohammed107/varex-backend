@extends('webLayout.main')
@section('style')
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .error-message {
            color: #a94442;
            font-size: 0.875em;
            margin-top: 5px;
        }
    </style>
@endsection
@section('content')
    @php
        $locale = app()->getLocale();
    @endphp
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter pt-80" id="contact_page">
        <div class="container-lg">
            <div class="row">
                <div class="col-12 col-md-6 contact-form">
                    <h2 class="text-in-dark">
                        @if (app()->getLocale() == 'en')
                        <span class="first-word">Get</span> in touch
                        @else
                        <span class="first-word">كن</span> على تواصل
                        @endif

                    </h2>
                    <p class="sub-title-form ">{!! __('links.contact_text') !!}
                    </p>
                    <form id="contact-form" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input type="text" id="name" name="name" placeholder="{{ __('links.full_name') }}"
                                        value="{{ old('name') }}" autocomplete="name">
                                    @error('name')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input type="email" id="email" name="email" placeholder="{{ __('links.enter_email') }}"
                                        value="{{ old('email') }}" autocomplete="email">
                                    @error('email')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input type="text" id="phone" name="phone" placeholder="{{ __('links.mobile') }}"
                                        value="{{ old('phone') }}" autocomplete="phone">
                                    @error('phone')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input type="text" id="address" name="address"
                                        placeholder="{{ __('links.address') }}" autocomplete="Address" value="{{ old('address') }}">
                                    @error('address')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="message" id="message" placeholder="{{ __('links.message') }}">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="btn-wrapper mt-0 col-12">
                                <button class="btn theme-btn-1 form-contact-btn w-100" type="submit">{{ __('links.submit') }}</button>
                            </div>
                        </div>
                        <p class="form-messege mb-0 mt-20"></p>
                    </form>
                </div>
                <div class="col-12 col-md-6 map-location">
                    <div class="row">
                        <div class="col-12">
                            <!-- GOOGLE MAP AREA START -->
                            <div class="google-map">

                                <iframe src="{{ $contactUsFirstRow->g_map ?? '' }}" width="100%" height="100%"
                                    frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                            </div>
                            <!-- GOOGLE MAP AREA END -->
                            <div class="col-12 pt-5">
                                <div class="row contact-info-details">
                                    <div class="col-12 col-lg-6 d-flex pt-3">
                                        <div class="contact-icon">
                                            <img src="{{ asset('webasset/img/icons/form-contact/whats.png') }}"
                                                alt="">
                                        </div>
                                        <div class="contact-data">
                                            <h5>{{ __('links.whatsApp') }}</h5>
                                            <p>
                                                <a href="https://wa.me/{{ $contactUsFirstRow->whatsapp ?? '' }}"
                                                   target="_blank"
                                                   style="unicode-bidi: plaintext; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }};">
                                                   {{ $contactUsFirstRow->whatsapp ?? '' }}
                                                </a>
                                            </p>
                                        </div>

                                    </div>

                                    <div class="col-12 col-lg-6 d-flex pt-3">
                                        <div class="contact-icon">
                                            <img src="{{ asset('webasset/img/icons/form-contact/location.png') }}"
                                                alt="">
                                        </div>
                                        <div class="contact-data">
                                            <h5>{{ __('links.location') }}</h5>
                                            <p>
                                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($contactUsFirstRow->location[$locale] ?? '') }}"
                                                    target="_blank">
                                                    {{ $contactUsFirstRow->location[$locale] ?? '' }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 d-flex pt-3">
                                        <div class="contact-icon">
                                            <img src="{{ asset('webasset/img/icons/form-contact/phone.png') }}"
                                                alt="">
                                        </div>
                                        <div class="contact-data">
                                            <h5>{{ __('links.mobile') }}</h5>
                                            <p>
                                                <a href="tel:{{ $contactUsFirstRow->sales_phone }}"
                                                   style="unicode-bidi: plaintext; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }};">
                                                   {{ $contactUsFirstRow->sales_phone }}
                                                </a>
                                            </p>
                                            <p>
                                                <a href="tel:{{ $contactUsFirstRow->service_support_phone }}"
                                                   style="unicode-bidi: plaintext; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }};">
                                                   {{ $contactUsFirstRow->service_support_phone }}
                                                </a>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="col-12 col-lg-6 d-flex pt-3">
                                        <div class="contact-icon">
                                            <img src="{{ asset('webasset/img/icons/form-contact/mail.png') }}"
                                                alt="">
                                        </div>
                                        <div class="contact-data">
                                            <h5>{{ __('links.email') }}</h5>
                                            <p>
                                                <a href="mailto:{{ $contactUsFirstRow->email1 ?? '' }}"
                                                    class="scnd-hovr">{{ $contactUsFirstRow->email1 ?? '' }}</a>
                                            </p>
                                            <p>
                                                <a href="mailto:{{ $contactUsFirstRow->email2 ?? '' }}"
                                                    class="scnd-hovr">{{ $contactUsFirstRow->email2 ?? '' }}</a>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->
@endsection
