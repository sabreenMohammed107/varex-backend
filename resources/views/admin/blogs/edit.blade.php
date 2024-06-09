@extends('layout.main')

@section('title', 'Create Blog')

@section('breadcrumb')
<div class="toolbar" id="kt_toolbar">
    <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <h1 class="text-dark fw-bolder my-1 fs-2">Blog</h1>
            <ul class="breadcrumb fw-bold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item text-muted">Blog</li>
                <li class="breadcrumb-item text-dark">Update</li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <div class="container-xxl">
        <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" action="{{ route('admin.blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <!--begin::Thumbnail settings-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2> Edit Icon</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Image input wrapper-->
                    <div class="card-body text-center pt-0">
                        <!--begin::Image input-->
                        <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                            style="background-image:  url('{{ asset("$blog->main_image") }}');">
                            <div class="image-input-wrapper w-150px h-150px"
                                style="background-image:  url('{{ asset("$blog->main_image") }}');">

                            </div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Edit-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="main_image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit-->

                        </div>
                        <!--end::Image input-->
                    </div>
                    <!--end::Image input wrapper-->
                </div>
                <!--end::Thumbnail settings-->
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
                                    <label class="required form-label">Title En</label>
                                    <input type="text" name="title_en" class="form-control mb-2" placeholder="Blog title en" value="{{ $blog->title['en']  }}" required />
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Title Ar</label>
                                    <input type="text" name="title_ar" class="form-control mb-2" placeholder="Blog title ar" value="{{ $blog->title['ar'] }}" required />
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Publish Date</label>
                                    <input type="date" name="publish_date" class="form-control mb-2 ckeditor" placeholder="Blog date " value="{{ $blog->publish_date }}" required />
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Description En</label>
                                    <textarea name="description_en" class="form-control mb-2 ckeditor" placeholder="Blog description" required>{{ $blog->description['en'] }}</textarea>
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Description Ar</label>
                                    <textarea name="description_ar" class="form-control mb-2" placeholder="Blog description" required>{{ $blog->description['ar'] }}</textarea>
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Category</label>
                                    <select name="category_id" class="form-control mb-2" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->name['en'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="form-label">Featured Image</label>
                                    @if($blog->featured_image)
                                        <div class="mb-2">
                                            <img src="{{ asset($blog->featured_image) }}" alt="Featured Image" style="max-width: 200px;">
                                        </div>
                                    @endif
                                    <input type="file" name="featured_image" class="form-control mb-2" accept=".png, .jpg, .jpeg" />
                                </div>
                                <div class="mb-10 fv-row form-check">
                                    <input type="checkbox" name="master" class="form-check-input" id="master" {{ $blog->master==1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="master">Master</label>
                                </div>
                                <div class="mb-10 fv-row form-check">
                                    <input type="checkbox" name="active" class="form-check-input" id="slider" {{ $blog->active==1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="mb-10 fv-row form-check">
                                    <input type="checkbox" name="featured" class="form-check-input" id="featured" {{ $blog->featured==1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="featured">Featured</label>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="{{ route('admin.blogs.index') }}" id="kt_ecommerce_add_product_cancel"
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

</script>
@endsection
