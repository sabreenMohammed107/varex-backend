@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Faq</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ url('/dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Faq</li>

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
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                action="{{ route('admin.faqs.store') }}" method="post" enctype="multipart/form-data">
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
                            <!--begin::Input group for Arabic name-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label"> Question Ar</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="question_ar" class="form-control mb-2"
                                    placeholder="Question in Arabic" value="{{ old('question_ar') }}" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group for English name-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label"> Question En</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="question_en" class="form-control mb-2"
                                    placeholder="Question in English" value="{{ old('question_en') }}" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group for Arabic answer-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label"> Answer Ar</label>
                                <!--end::Label-->
                                <!--begin::Textarea-->
                                <textarea name="answer_ar" class="form-control mb-2" placeholder="Answer in Arabic" required>{{ old('answer_ar') }}</textarea>
                                <!--end::Textarea-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group for English answer-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label"> Answer En</label>
                                <!--end::Label-->
                                <!--begin::Textarea-->
                                <textarea name="answer_en" class="form-control mb-2" placeholder="Answer in English" required>{{ old('answer_en') }}</textarea>
                                <!--end::Textarea-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group for Rank-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label"> Rank</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="rank" class="form-control mb-2" placeholder="Faq rank"
                                    value="{{ old('rank') }}" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row w-100 flex-md-root">
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" name="active" value="1"
                                        id="flexSwitchDefault" />
                                    <label class="form-check-label" for="flexSwitchDefault">
                                        active
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::General options-->


                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('admin.faqs.index') }}" id="kt_ecommerce_add_product_cancel"
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
