@extends('webLayout.main')

@section('style')

    </style>
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    <!-- SLIDER AREA START (slider-3) -->
    <div class="ltn__slider-area ltn__slider-3 section-bg-1" id='home_page_slider'>
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
            <!-- ltn__slide-item -->
            @isset($sliders)
             @foreach ($sliders as $slider)
             <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3 ltn__slide-item-3-normal bg-image"
             data-bg="{{asset('webasset/img/slider/1/Rectangle-26.png')}}">
             <div class="ltn__slide-item-inner  text-end">
                 <div class="container-lg">
                     <div class="row">
                         <div class="col-lg-12 align-self-center">
                             <div class="slide-item-info d-none d-sm-block">
                                 <div class="slide-item-info-inner ltn__slide-animation row">
                                     <div
                                         class="slid-data-info animated col-5 col-lg-3 d-flex flex-column justify-content-center">
                                         <h6 class="slide-sub-title animated whit-clr">
                                             {{ $slider->category->name['en'] ?? ''}}
                                         </h6>
                                         <h1 class="slide-title animated whit-clr">
                                            {!! $slider->home_title['en'] !!}<br />

                                         </h1>
                                         <div class="btn-wrapper animated">
                                             <a href="{{ url('product/'.$slider->slug['en']) }}" class="theme-btn-1 btn text-uppercase">More
                                                 Details</a>
                                         </div>
                                     </div>
                                     <div class="slid-logo-img animated col-3 d-none d-lg-block">
                                         {{-- <img src="{{asset('webasset/img/slider/logo-dark-2.png')}}" alt="" srcset="" /> --}}
                                     </div>
                                     <div class="slid-itm-img animated col-7 col-lg-6 ">
                                         <img src="{{ asset("$slider->main_image") }}" alt="" srcset="" />
                                     </div>
                                 </div>
                             </div>
                             <div class="slide-item-info-mob d-block d-sm-none">

                                 <div class="slid-itm-img animated col-12">
                                     <img src="{{ asset("$slider->main_image") }}" alt="" srcset="" />
                                 </div>
                                 <div class="slid-data-info-mob animated col-12">
                                     <h6 class="slide-sub-title animated whit-clr">
                                        {{ $slider->category->name['en'] ?? ''}}
                                     </h6>
                                     <h1 class="slide-title animated whit-clr">
                                        {!! $slider->home_title['en'] !!} <br />
                                     </h1>
                                     <div class="btn-wrapper animated">
                                         <a href="{{ url('product/'.$slider->slug['en']) }}" class="theme-btn-1 btn text-uppercase">More
                                             Details</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
             @endforeach
            @endisset
        </div>
    </div>
    <!-- SLIDER AREA END -->

    <div class="scnd-section ltn__blog-area ltn__blog-item-3-normal mb-70 mt-70">
        <div class="container-lg">
            <div class="row">
                @isset( $features)
                  @foreach ( $features as  $feature)
                  <div class="col-12 col-md-6 col-xl-4">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-info">
                            <h4 class="text-in-dark f-s-16 mb-3">
                                {!! $feature->home_title['en'] !!}
                            </h4>
                            {!! $feature->featured_text_en !!}

                        </div>
                        <div class="ltn__testimoni-img">
                            <img src="{{ asset("$feature->main_image") }}" alt="#" />
                        </div>
                        <div class="btn-wrapper animated">
                            <a href="{{ url('product/'.$feature->slug['en']) }}" class="theme-btn-1 btn f-s-11-5">Know More </a>
                        </div>
                    </div>
                </div>
                  @endforeach
                @endisset

            </div>
        </div>
    </div>
    <!-- PRODUCT AREA START (product-item-3) -->
    <div class="ltn__product-area best-selling-prod">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title">Best Selling Products</h1>
                    </div>
                </div>
            </div>
            <div
                class="row justify-content-between align-items-end row-cols-xxl-5 row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-xs-2 row-cols-1">
               @isset($best_sellings)
                  @foreach ($best_sellings as $best_selling)
                       <!-- ltn__product-item -->
                <div class="col px-lg-0 m-auto text-center text-md-start">
                    <div class="ltn__product-item ltn__product-item-3 text-left px-2 mx-5 mx-sm-0">
                        <div class="product-img" style="height: 240px !important">
                            <a href="{{ url('product/'.$best_selling->slug['en']) }}"><img  style="height: 100%" src="{{ asset("$best_selling->main_image") }}" alt="#" /></a>
                        </div>
                        <div class="product-info">
                            <h2 class="product-title">
                                <a href="{{ url('product/'.$best_selling->slug['en']) }}" class="f-s-13 text-in-blue f-w-r">{{ $best_selling->category->name['en'] ?? ''}}
                                </a>
                            </h2>
                            <div class="product-price">
                                <span class="f-s-16 text-in-dark">{{ strip_tags( \Illuminate\Support\Str::words($best_selling->home_title['en'], 5,'')) }}</span>
                            </div>
                        </div>
                        <a href="{{ url('product/'.$best_selling->slug['en']) }}"
                            class="product-details-btn w-100 d-inline-block text-center text-in-dark fw-bold f-s-14">More
                            Details</a>
                    </div>
                </div>
                  @endforeach
               @endisset


            </div>
        </div>
    </div>
    <!-- PRODUCT AREA END -->
    <!-- CALL TO ACTION START (call-to-action-4) -->
    <div class="container-lg">
        <div class="ltn__call-to-action-area ltn__call-to-action-4 pt-20">
            <div class="call-to-action-inner call-to-action-inner-4 text-center">
                <div class="section-title-area ltn__section-title-2">
                    <h1 class="section-title white-color d-flex"> <i class="fab fa-whatsapp px-2 d-block d-sm-none"></i>
                        {{ $contactUsFirstRow->whatsapp }}</h1>
                </div>
                <div class="btn-wrapper d-none d-sm-block">
                    <a href="tel:+201006069642" class="btn-for-whatsapp">Whatsapp <i
                            class="fas fa-angle-right text-clr-wh"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->

    <div class="ltn__img-slider-area ltn__img-slider-2 pb-70">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h2 class="section-title">Browsed By Catagory<span>.</span></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-lg text-center">
            <div class="row ltn__category-slider-active slick-arrow-1">
                @foreach ($categoriesOrderedByRank as $category)
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-3 text-center">
                        <div class="ltn__category-item-img">
                            <a href="{{ url('/products') }}" onclick="setSearchCategoryId({{ $category->id }}, '{{ $category->name['en'] }}'); return false;" >
                                <img src="{{asset($category->icon)}}" alt="Image" />
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h5>
                                <a href="{{ url('/products') }}" onclick="setSearchCategoryId({{ $category->id }}, '{{ $category->name['en'] }}'); return false;" class="f-s-15 text-in-dark">{{ $category->name['en'] }}</a>
                            </h5>
                            <h6 class="f-s-13 text-in-dark">[ {{ $category->products_count }} item{{ $category->products_count > 1 ? 's' : '' }} ]</h6>
                        </div>
                    </div>
                </div>
            @endforeach


            </div>
            <a href="{{ url('products') }}" class="f-s-17 text-in-dark all-prod">All Products</a>
        </div>
    </div>
    <!-- BANNER AREA START -->
    <div class="ltn__about-us-area pb-70">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-5 align-self-center justify-content-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img width="100%" src="{{asset('webasset/img/bg/Group15128(1).png')}}" alt="About Us Image" />
                    </div>
                </div>
                <div class="col-lg-7 row align-content-end p-5">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle f-s-16 text-in-dark">
                                Know More About Us
                            </h6>
                            <h1 class="section-title f-s-50 text-in-d-blue">
                                {!! $about->about_title['en'] !!}
                            </h1>
                            <div class="d-flex align-items-baseline">
                                <img src="{{asset('webasset/img/icons/line.png')}}" alt="" srcset="" style="margin-right: 10px;">
                                <p class="f-s-18 " style="flex-basis: 67%;">
                                    {!! $about->about_sub_title['en'] !!}
                                </p>
                            </div>
                        </div>
                        <p class="f-s-18 clr-gry">
                            {!! $about->about_description['en'] !!}
                        </p>
                    </div>
                    <div class="about-author-info d-flex flex-wrap justify-content-between  p-xs-5 p-sm-5 p-md-5 p-lg-1">
                        <div class="author-name-designation align-self-center mr-30 ">
                            <h4 class="mb-0 f-s-18 text-in-dark"> {!! $about->manager_name['en'] !!}</h4>
                            <small class="f-s-16 clr-gry">/  {!! $about->manager_position['en'] !!}</small>
                        </div>
                        <div class="author-sign align-self-center mt-3">
                            <a href="{{ $about->company_katalog }}" download="" class="special-link-products shine">Download Katalog</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER AREA END -->
    @endsection
