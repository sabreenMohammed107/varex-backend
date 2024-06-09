@extends('layout.main')

@section('title', 'Create Product')

@section('breadcrumb')
<div class="toolbar" id="kt_toolbar">
    <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <h1 class="text-dark fw-bolder my-1 fs-2">Product</h1>
            <ul class="breadcrumb fw-bold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item text-muted">Product</li>
                <li class="breadcrumb-item text-dark">Create</li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <div class="container-xxl">
        <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Main Image</h2>
                        </div>
                    </div>
                    <div class="card-body text-center pt-0">
                        <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url('');">
                            <div class="image-input-wrapper w-150px h-150px" style="background-image: url('');"></div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change image">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <input type="file" name="main_image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <ul class="nav nav-tabs" id="productTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab">General</a>
                    </li>

                </ul>
                <div class="tab-content" id="productTabContent">
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>General</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Home Title En</label>
                                    <input type="text" name="home_title_en" class="form-control mb-2" placeholder="Product home title en" value="{{ old('home_title_en') }}" required />
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Home Title Ar</label>
                                    <input type="text" name="home_title_ar" class="form-control mb-2" placeholder="Product home title ar" value="{{ old('home_title_ar') }}" required />
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Title En</label>
                                    <input type="text" name="title_en" class="form-control mb-2" placeholder="Product title en" value="{{ old('title_en') }}" required />
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Title Ar</label>
                                    <input type="text" name="title_ar" class="form-control mb-2" placeholder="Product title ar" value="{{ old('title_ar') }}" required />
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Description En</label>
                                    <textarea name="description_en" class="form-control mb-2" placeholder="Product description" required>{{ old('description_en') }}</textarea>
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Description Ar</label>
                                    <textarea name="description_ar" class="form-control mb-2" placeholder="Product description" required>{{ old('description_ar') }}</textarea>
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Category</label>
                                    <select name="category_id" class="form-control mb-2" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name['en'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="form-label">Fully QR Image</label>
                                    <input type="file" name="fully_qr_image" class="form-control mb-2" accept=".png, .jpg, .jpeg" />
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="form-label">QR Image</label>
                                    <input type="file" name="qr_image" class="form-control mb-2" accept=".png, .jpg, .jpeg" />
                                </div>
                                 <!--begin::Input group for English name-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Vedio link</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="video_link" class="form-control mb-2" placeholder="Vedio link"
                                    value="{{ old('video_link') }}" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="mb-10 fv-row">
                                <label class="form-label">Featured Text Ar</label>
                                <textarea name="featured_text_ar" class="form-control mb-2 ckeditor" placeholder="Featured text for the product">{{old('featured_text_ar')}}</textarea>
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="form-label">Featured Text En</label>
                                <textarea name="featured_text_en" class="form-control mb-2 ckeditor" placeholder="Featured text for the product">{{old('featured_text_en')}}</textarea>
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required form-label">Tag</label>
                                <select name="tag_id" class="form-control mb-2" required>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ old('tag_id') == $tag->id ? 'selected' : '' }}>{{ $tag->title['en'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Rank</label>
                                    <input type="number" name="rank" class="form-control mb-2" placeholder="Product rank" value="{{ old('rank') }}" required />
                                </div>
                                <div class="mb-10 fv-row form-check">
                                    <input type="checkbox" name="popular" class="form-check-input" id="popular" {{ old('popular') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="popular">Popular</label>
                                </div>
                                <div class="mb-10 fv-row form-check">
                                    <input type="checkbox" name="slider" class="form-check-input" id="slider" {{ old('slider') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="slider">Slider</label>
                                </div>
                                <div class="mb-10 fv-row form-check">
                                    <input type="checkbox" name="featured" class="form-check-input" id="featured" {{ old('featured') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="featured">Featured</label>
                                </div>
                                <div class="mb-10 fv-row form-check">
                                    <input type="checkbox" name="best_selling" class="form-check-input" id="best_selling" {{ old('best_selling') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="best_selling">Best Selling</label>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="{{ route('admin.products.index') }}" id="kt_ecommerce_add_product_cancel"
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
        </form>
    </div>
</div>
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
