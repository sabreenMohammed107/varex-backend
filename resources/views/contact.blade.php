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
                    <h2 class="text-in-dark"><span class="first-word">Get</span> in touch</h2>
                    <p class="sub-title-form ">Let's stay connected and continue the conversation! Reach out whenever <br>
                        you're
                        ready; We’re here to chat.
                    </p>
                    <form id="contact-form" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input type="text" name="name" placeholder="Your Name and Surname"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input type="email" name="email" placeholder="E-mail Address"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input type="text" name="phone" placeholder="Telephone Number"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input type="text" name="address" placeholder="Address" value="{{ old('address') }}">
                                    @error('address')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="message" placeholder="Enter message">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="btn-wrapper mt-0 col-12">
                                <button class="btn theme-btn-1 form-contact-btn w-100" type="submit">Submit</button>
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
                                            <img src="img/icons/form-contact/whats.png" alt="">
                                        </div>
                                        <div class="contact-data">
                                            <h5>WhatsApp</h5>
                                            <p>{{ $contactUsFirstRow->whatsapp ?? '' }}</p>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 d-flex pt-3">
                                        <div class="contact-icon">
                                            <img src="img/icons/form-contact/location.png" alt="">
                                        </div>
                                        <div class="contact-data">
                                            <h5>Location</h5>
                                            <p>{{ $contactUsFirstRow->location['en'] ?? '' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 d-flex pt-3">
                                        <div class="contact-icon">
                                            <img src="img/icons/form-contact/phone.png" alt="">
                                        </div>
                                        <div class="contact-data">
                                            <h5>Phone Number</h5>
                                            <p>{{ $contactUsFirstRow->sales_phone }} </p>
                                            <p>{{ $contactUsFirstRow->service_support_phone }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 d-flex pt-3">
                                        <div class="contact-icon">
                                            <img src="img/icons/form-contact/mail.png" alt="">
                                        </div>
                                        <div class="contact-data">
                                            <h5>E-MAIL</h5>
                                            <p>{{ $contactUsFirstRow->email1 }}</p>
                                            <p>{{ $contactUsFirstRow->email2 }}</p>
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
