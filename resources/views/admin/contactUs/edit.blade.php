@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Contact Us</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ url('/dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Contact Us</li>

                    <li class="breadcrumb-item text-dark">All</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->

        </div>
    </div>
@endsection

@section('content')
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class="container-xxl">

            <form d="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                action="{{ route('admin.contact-us.update') }}" method="POST">
                @csrf

                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row">
                                <label class="required form-label" for="email1">Email 1</label>
                                <input type="email" class="form-control mb-2" id="email1" name="email1"
                                    placeholder="Primary email address" value="{{ $contact->email1 }}" required>
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="form-label" for="email2">Email 2</label>
                                <input type="email" class="form-control mb-2" id="email2" name="email2"
                                    placeholder="Secondary email address" value="{{ $contact->email2 }}">
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="required form-label" for="sales_phone">Sales Phone</label>
                                <input type="text" class="form-control mb-2" id="sales_phone" name="sales_phone"
                                    placeholder="Sales phone number" value="{{ $contact->sales_phone }}" required>
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="form-label" for="service_support_phone">Service Support Phone</label>
                                <input type="text" class="form-control mb-2" id="service_support_phone"
                                    name="service_support_phone" placeholder="Service support phone number"
                                    value="{{ $contact->service_support_phone }}">
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="form-label" for="whatsapp">WhatsApp</label>
                                <input type="text" class="form-control mb-2" id="whatsapp" name="whatsapp"
                                    placeholder="WhatsApp number" value="{{ $contact->whatsapp }}">
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="form-label" for="g_map">Google Map URL</label>
                                <input type="text" class="form-control mb-2" id="g_map" name="g_map"
                                    placeholder="Google Map URL" value="{{ $contact->g_map }}">
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="required form-label" for="location_ar">Location (Arabic)</label>
                                <input type="text" class="form-control mb-2" id="location_ar" name="location_ar"
                                    placeholder="Location in Arabic" value="{{ json_decode($contact->location)->ar }}"
                                    required>
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="required form-label" for="location_en">Location (English)</label>
                                <input type="text" class="form-control mb-2" id="location_en" name="location_en"
                                    placeholder="Location in English" value="{{ json_decode($contact->location)->en }}"
                                    required>
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="form-label" for="facebook">Facebook URL</label>
                                <input type="text" class="form-control mb-2" id="facebook" name="facebook"
                                    placeholder="Facebook URL" value="{{ $contact->facebook }}">
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="form-label" for="twitter">Twitter URL</label>
                                <input type="text" class="form-control mb-2" id="twitter" name="twitter"
                                    placeholder="Twitter URL" value="{{ $contact->twitter }}">
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="form-label" for="instagram">Instagram URL</label>
                                <input type="text" class="form-control mb-2" id="instagram" name="instagram"
                                    placeholder="Instagram URL" value="{{ $contact->instagram }}">
                            </div>

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::General options-->


                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('admin.contact-us.edit') }}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('scripts')
@endsection
