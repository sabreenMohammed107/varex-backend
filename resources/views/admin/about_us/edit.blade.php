@extends('layout.main')


@section('content')
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class="container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>About Us Information</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!-- About Title -->

                                <!-- About Title -->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label" for="about_title">About Title (Arabic)</label>
                                    <input type="text" class="form-control mb-2" id="about_title_ar"
                                        name="about_title_ar" placeholder="About Title (Arabic)"
                                        value="{{ $aboutUs->about_title['ar'] ?? '' }}" required>
                                    <label class="required form-label" for="about_title">About Title (English)</label>
                                    <input type="text" class="form-control mb-2" id="about_title_en"
                                        name="about_title_en" placeholder="About Title (English)"
                                        value="{{ $aboutUs->about_title['en'] }}" required>
                                </div>
                                <!-- About Sub Title -->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label" for="about_sub_title">About Sub Title
                                        (Arabic)</label>
                                    <input type="text" class="form-control mb-2" id="about_sub_title_ar"
                                        name="about_sub_title_ar" placeholder="About Sub Title (Arabic)"
                                        value="{{ $aboutUs->about_sub_title['ar'] ?? '' }}" required>
                                    <label class="required form-label" for="about_sub_title">About Sub Title
                                        (English)</label>
                                    <input type="text" class="form-control mb-2" id="about_sub_title_en"
                                        name="about_sub_title_en" placeholder="About Sub Title (English)"
                                        value="{{ $aboutUs->about_sub_title['en'] }}" required>
                                </div>

                                <!-- About Description -->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label" for="about_description">About Description
                                        (Arabic)</label>
                                    <textarea class="form-control mb-2ckeditor" id="about_description_ar" name="about_description_ar"
                                        placeholder="About Description (Arabic)" required>{{ $aboutUs->about_description['ar'] ?? '' }}</textarea>
                                    <label class="required form-label" for="about_description">About Description
                                        (English)</label>
                                    <textarea class="form-control mb-2ckeditor" id="about_description_en" name="about_description_en"
                                        placeholder="About Description (English)" required>{{ $aboutUs->about_description['en'] }}</textarea>
                                </div>
                                <!-- Manager Name -->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label" for="manager_name">Manager Name (Arabic)</label>
                                    <input type="text" class="form-control mb-2" id="manager_name_ar"
                                        name="manager_name_ar" placeholder="Manager Name (Arabic)"
                                        value="{{ $aboutUs->manager_name['ar'] ?? '' }}" required>
                                    <label class="required form-label" for="manager_name">Manager Name (English)</label>
                                    <input type="text" class="form-control mb-2" id="manager_name_en"
                                        name="manager_name_en" placeholder="Manager Name (English)"
                                        value="{{ $aboutUs->manager_name['en'] }}" required>
                                </div>

                                <!-- Manager Position -->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label" for="manager_position">Manager Position
                                        (Arabic)</label>
                                    <input type="text" class="form-control mb-2" id="manager_position_ar"
                                        name="manager_position_ar" placeholder="Manager Position (Arabic)"
                                        value="{{ $aboutUs->manager_position['ar'] ?? '' }}" required>
                                    <label class="required form-label" for="manager_position">Manager Position
                                        (English)</label>
                                    <input type="text" class="form-control mb-2" id="manager_position_en"
                                        name="manager_position_en" placeholder="Manager Position (English)"
                                        value="{{ $aboutUs->manager_position['en'] }}" required>
                                </div>

                                <!-- Company Katalog -->
                                <div class="mb-10 fv-row">
                                    <label class="form-label" for="company_katalog">Company Katalog</label>
                                    <input type="file" class="form-control mb-2" id="company_katalog"
                                        name="company_katalog">
                                    @if ($aboutUs->company_katalog)
                                        <p>Current Katalog: <a href="{{ asset($aboutUs->company_katalog) }}"
                                                target="_blank">View</a></p>
                                    @endif
                                </div>

                                <!-- About Banner Text -->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label" for="about_banner_text">About Banner Text
                                        (Arabic)</label>
                                    <input type="text" class="form-control mb-2" id="about_banner_text_ar"
                                        name="about_banner_text_ar" placeholder="About Banner Text (Arabic)"
                                        value="{{ $aboutUs->about_banner_text['ar'] ?? '' }}" required>
                                    <label class="required form-label" for="about_banner_text">About Banner Text
                                        (English)</label>
                                    <input type="text" class="form-control mb-2" id="about_banner_text_en"
                                        name="about_banner_text_en" placeholder="About Banner Text (English)"
                                        value="{{ $aboutUs->about_banner_text['en'] }}" required>
                                </div>

                                <!-- Mission Title -->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label" for="mission_title">Mission Title (Arabic)</label>
                                    <input type="text" class="form-control mb-2" id="mission_title_ar"
                                        name="mission_title_ar" placeholder="Mission Title (Arabic)"
                                        value="{{ $aboutUs->mission_title['ar'] ?? '' }}" required>
                                    <label class="required form-label" for="mission_title">Mission Title (English)</label>
                                    <input type="text" class="form-control mb-2" id="mission_title_en"
                                        name="mission_title_en" placeholder="Mission Title (English)"
                                        value="{{ $aboutUs->mission_title['en'] }}" required>
                                </div>

                                <!-- Mission Sub Title -->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label" for="mission_sub_title">Mission Sub Title
                                        (Arabic)</label>
                                    <input type="text" class="form-control mb-2" id="mission_sub_title_ar"
                                        name="mission_sub_title_ar" placeholder="Mission Sub Title (Arabic)"
                                        value="{{ $aboutUs->mission_sub_title['ar'] ?? '' }}" required>
                                    <label class="required form-label" for="mission_sub_title">Mission Sub Title
                                        (English)</label>
                                    <input type="text" class="form-control mb-2" id="mission_sub_title_en"
                                        name="mission_sub_title_en" placeholder="Mission Sub Title (English)"
                                        value="{{ $aboutUs->mission_sub_title['en'] }}" required>
                                </div>

                                <!-- Mission Description -->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label" for="mission_description">Mission Description
                                        (Arabic)</label>
                                    <textarea class="form-control mb-2 ckeditor" id="mission_description_ar" name="mission_description_ar"
                                        placeholder="Mission Description (Arabic)" required>{{ $aboutUs->mission_description['ar'] ?? '' }}</textarea>
                                    <label class="required form-label" for="mission_description">Mission Description
                                        (English)</label>
                                    <textarea class="form-control mb-2 ckeditor" id="mission_description_en" name="mission_description_en"
                                        placeholder="Mission Description (English)" required>{{ $aboutUs->mission_description['en'] }}</textarea>
                                </div>

                                   <!-- Quality Title -->
                                   <div class="mb-10 fv-row">
                                    <label class="required form-label" for="quality_title">Quality Title (Arabic)</label>
                                    <input type="text" class="form-control mb-2" id="quality_title_ar"
                                        name="quality_title_ar" placeholder="Quality Title (Arabic)"
                                        value="{{ $aboutUs->quality_title['ar'] ?? '' }}" required>
                                    <label class="required form-label" for="quality_title">Quality Title (English)</label>
                                    <input type="text" class="form-control mb-2" id="quality_title_en"
                                        name="quality_title_en" placeholder="Quality Title (English)"
                                        value="{{ $aboutUs->quality_title['en'] }}" required>
                                </div>

                                <!-- Quality Description -->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label" for="quality_description">Quality Description
                                        (Arabic)</label>
                                    <textarea class="form-control mb-2 ckeditor" id="quality_description" name="quality_description_ar"
                                        placeholder="Quality Description (Arabic)" required>{{ $aboutUs->quality_description['ar'] ?? '' }}</textarea>
                                    <label class="required form-label" for="quality_description">Quality Description
                                        (English)</label>
                                    <textarea class="form-control mb-2 ckeditor" id="quality_description_en" name="quality_description_en"
                                        placeholder="Quality Description (English)" required>{{ $aboutUs->quality_description['en'] }}</textarea>
                                </div>


                                <!-- Vision Title -->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label" for="vision_title">Vision Title (Arabic)</label>
                                    <input type="text" class="form-control mb-2" id="vision_title_ar"
                                        name="vision_title_ar" placeholder="Vision Title (Arabic)"
                                        value="{{ $aboutUs->vision_title['ar'] ?? '' }}" required>
                                    <label class="required form-label" for="vision_title">Vision Title (English)</label>
                                    <input type="text" class="form-control mb-2" id="vision_title_en"
                                        name="vision_title_en" placeholder="Vision Title (English)"
                                        value="{{ $aboutUs->vision_title['en'] }}" required>
                                </div>

                                <!-- Vision Description -->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label" for="vision_description">Vision Description
                                        (Arabic)</label>
                                    <textarea class="form-control mb-2 ckeditor" id="vision_description_ar" name="vision_description_ar"
                                        placeholder="Vision Description (Arabic)" required>{{ $aboutUs->vision_description['ar'] ?? '' }}</textarea>
                                    <label class="required form-label" for="vision_description">Vision Description
                                        (English)</label>
                                    <textarea class="form-control mb-2 ckeditor" id="vision_description_en" name="vision_description_en"
                                        placeholder="Vision Description (English)" required>{{ $aboutUs->vision_description['en'] }}</textarea>
                                </div>
                                 <!-- Seo Description -->
                                 <div class="mb-10 fv-row">
                                    <label class="required form-label" for="seo_description">Seo Description
                                        (Arabic)</label>
                                    <textarea class="form-control mb-2 ckeditor" id="seo_description_ar" name="seo_description_ar"
                                        placeholder="Seo Description (Arabic)" required>{{ $aboutUs->seo_description['ar'] ?? '' }}</textarea>
                                    <label class="required form-label" for="seo_description">Seo Description
                                        (English)</label>
                                    <textarea class="form-control mb-2 ckeditor" id="seo_description_en" name="seo_description_en"
                                        placeholder="Seo Description (English)" required>{{ $aboutUs->seo_description['en'] }}</textarea>
                                </div>

                            </div>
                            <!--end::Card body-->

                        </div>
                        <!--end::General options-->
                        <!-- Button -->
                        <div class="d-flex justify-content-end">
                            <!-- Cancel Button -->
                            <a href="{{ route('admin.about.edit') }}" class="btn btn-light me-5">Cancel</a>
                            <!-- Save Button -->
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
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
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
   ClassicEditor
        .create(document.querySelectorAll('.ckeditor'))
        .catch(error => {
            console.error(error);
        });
    document.getElementById('addImage').addEventListener('click', function () {
        let div = document.createElement('div');
        div.innerHTML = `<input type="file" name="image_galleries[]" class="form-control mb-2" accept=".png, .jpg, .jpeg">`;
        document.getElementById('galleryImages').appendChild(div);
    });
</script>
@endsection
