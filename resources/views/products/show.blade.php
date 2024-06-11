@extends('webLayout.main')

@section('style')
<style>
#single-product-details .ltn__product-slider-area.ltn__product-gutter .ltn__related-product-slider-one-active .ltn__product-item .product-img .qr-back-face-product {
            display: none;

        }
    #single-product-details .ltn__product-slider-area.ltn__product-gutter  .ltn__related-product-slider-one-active .ltn__product-item .product-img:hover .qr-back-face-product {
            display: block;
            position: relative;
            z-index: 500;
            object-fit: contain;
            width: 100%;
            height: 100%;
            padding:25px;
        }
    #single-product-details .ltn__product-slider-area.ltn__product-gutter  .ltn__related-product-slider-one-active .ltn__product-item .product-img:hover a {

            width: 100%;
            height: 100%;
        }

    #single-product-details .ltn__product-slider-area.ltn__product-gutter  .ltn__related-product-slider-one-active .ltn__product-item .product-img:hover img.qr-front-face-product {
        display: none;
    }

    #single-product-details .ltn__product-slider-area.ltn__product-gutter  .ltn__related-product-slider-one-active .ltn__product-item .product-img:hover .product-badge {
        display: none;
        }

        #single-product-details .ltn__product-slider-area.ltn__product-gutter  .ltn__related-product-slider-one-active .ltn__product-item .home-img {
            width:100%;
            height:100%;
        }
/* Mobile screens: Disable hover effect */
@media (max-width: 768px), (pointer: coarse) {
        #allProductsPage .product-img .qr-back-face-product {
            display: none;
        }

        #allProductsPage .product-img:hover .qr-back-face-product {
            display: none;
        }

        #allProductsPage .product-img:hover img.qr-front-face-product {
            display: block;
        }

        #allProductsPage .product-img:hover .product-badge {
            display: block;
        }
    }

</style>
@endsection

@section('content')
  <!-- BREADCRUMB AREA START -->
  <div class="py-3">
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2">
                    <div class="ltn__breadcrumb-list ">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/products') }}" class="text-in-gray-light">Products</a></li>
                            <li class="text-in-black">{{ $product->title['en'] ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter" id='single-product-details'>
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-9 order-lg-2 mb-20">
                    <div class="tab-content">
                        <div class="row pt-4 pb-3 px-2  bg-clr-blue-gray">
                            <div class="col-md-4">
                                <div class="ltn__shop-details-img-gallery w-100">
                                    <div class="ltn__shop-details-large-img">
                                        @isset($product->imageGalleries)
                                            @foreach ($product->imageGalleries as $image)
                                                <div class="single-large-img">
                                                    <a href="{{ asset("$image->image_path") }}"
                                                        data-rel="lightcase:myCollection">
                                                        <img src="{{ asset("$image->image_path") }}" class="border-r-30 w-100"
                                                            alt="Image">
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endisset
                                    </div>
                                    <div class="ltn__shop-details-small-img slick-arrow-2">
                                        @isset($product->imageGalleries)
                                            @foreach ($product->imageGalleries as $image)
                                                <div class="single-small-img">
                                                    <img src="{{ asset("$image->image_path") }}" class="border-r-15"
                                                        alt="Image">
                                                </div>
                                            @endforeach
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <h3 class="text-in-dark">{{ $product->title['en'] ?? '' }}</h3>
                                    <h5 class="text-in-dark">{{ $product->category->name['en'] ?? '' }} </h5>
                                    <div class="ltn__product-details-menu-2">
                                        <p class="sngl-product-details f-s-15 txt-black-gray"> {!! $product->description['en'] ?? '' !!}</p>
                                    </div>
                                    <hr>
                                    <div class="ltn__product-qr_and_code ">
                                        <img src="{{ asset("$product->fully_qr_image") }}" alt="" srcset=""
                                            class="img-qr-code border-r-15">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 py-3 py-md-0">
                                <div class="row">
                                    <div
                                        class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start">
                                        <a class="ltn__video-icon-2 ltn__video-icon-2-border---"
                                            href="{{ $product->video_link }}"
                                            data-rel="lightcase:myCollection">
                                            <i class="fa fa-play"></i>
                                        </a>
                                        <span class="px-2 video-title">Introductory Video</span>
                                    </div>
                                    <div class="col-12 col-md-6 social-data-icons justify-content-center justify-content-md-end py-2 py-md-0">
                                        <span class="social-modern-icons px-2">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('product/'.$product->slug['en'])) }}" target="_blank">
                                                <img src="{{asset('webasset/img/icons/social/facebook.png')}}" alt="" srcset="">
                                            </a>
                                        </span>
                                        <span class="social-modern-icons px-2">
                                            <a href="fb-messenger://share/?link={{ urlencode(url('product/'.$product->slug['en'])) }}" target="_blank">
                                                <img src="{{asset('webasset/img/icons/social/messenger.png')}}" alt="" srcset="">
                                            </a>
                                        </span>
                                        <span class="social-modern-icons px-2">
                                            <a href="https://www.instagram.com" target="_blank">
                                                <img src="{{ asset('webasset/img/icons/social/social.png') }}" alt="" srcset="">
                                            </a>
                                        </span>

                                        <span class="social-modern-icons px-2">
                                            <a href="https://t.me/share/url?url={{ urlencode(url('product/'.$product->slug['en'])) }}" target="_blank">
                                                <img src="{{asset('webasset/img/icons/social/telegram.png')}}" alt="" srcset="">
                                            </a>
                                        </span>
                                        <span class="social-modern-icons px-2">
                                            <a href="https://api.whatsapp.com/send?text={{ urlencode(url('product/'.$product->slug['en'])) }}" target="_blank">
                                                <img src="{{asset('webasset/img/icons/social/whatsapp.png')}}" alt="" srcset="">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SHOP DETAILS AREA END -->

                        <!-- PRODUCT SLIDER AREA START -->
                        <div class="ltn__product-slider-area ltn__product-gutter pb-20 pt-70"
                            id="single-product-page-data-slide">
                            <div class="container-lg">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-title-area ltn__section-title-2">
                                            <h1 class="section-title text-in-dark f-s-35 l-space-2">Related Products .</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ltn__related-product-slider-one-active slick-arrow-1 align-items-stretch">
                                    @isset($relatedProducts)
                                    @foreach ($relatedProducts as $product)
                                           <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="{{ url('product/'.$product->slug['en']) }}">
                                                    <img src="{{ asset("$product->main_image") }}" alt="#" class='qr-front-face-product'>
                                                    <img src="{{ asset("$product->qr_image") }}" alt="#"
                                                    class='qr-back-face-product'>
                                                        </a>
                                                        @if ($product->tag)
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="sale-badge">{{ $product->tag->title['en'] ?? ''}}</li>
                                                            </ul>
                                                        </div>
                                                        @endif
                                            </div>
                                            <div class="product-info">
                                                <div class="product-price">
                                                    <span>{!! $product->home_title['en'] !!}</span>
                                                </div>
                                                <h2 class="product-title"><a href="{{ url('product/'.$product->slug['en']) }}">{{ $product->category->name['en'] ?? ''}}</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endisset


                                </div>
                            </div>
                        </div>
                        <!-- PRODUCT SLIDER AREA END -->
                    </div>
                </div>
                <div class="col-lg-3 mb-20">
                    <aside class="sidebar ltn__shop-sidebar">
                        <!-- Category Widget -->

                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Categories</h4>
                            <ul>
                                <li><a href="{{ url('/products') }}" onclick="setCategoryId(null); return false;">All Category
                                        ({{ $countAll }})</a></li>
                                @foreach ($categoriesOrderedByRank as $category)
                                    <li><a href="{{ url('/products') }}"
                                            onclick="setCategoryId({{ $category->id }}); return false;">{{ $category->name['en'] }}
                                            ({{ $category->products_count }})
                                        </a></li>
                                @endforeach
                            </ul>
                            <input type="hidden" id="selectedCategoryId" value="">
                         </div>

                        <!-- Price Filter Widget -->
                        <div class="widget ltn__price-filter-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Tags</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <span class="tag-bg f-s-13">All Tags</span>
                                    @foreach ($tags as $tag )
                                    <span class="tag-bg f-s-13">{{ $tag->title['en'] ?? '' }}</span>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <!-- Top Rated Product Widget -->

                        <div class="logo-catalog">
                            <div class="main-logo">
                                <img src="{{asset('webasset/img/logo.png')}}" alt="">
                            </div>
                            <ul class="cst-btn p-0">
                                <li class="special-link shinep-0">
                                    <a class="p-0" href="{{ $about->company_katalog }}" download="">Download Katalog</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->
@endsection
