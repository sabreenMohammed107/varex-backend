@extends('webLayout.main')

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
    <div class="ltn__product-area ltn__product-gutter">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-9 order-lg-2 mb-20">
                    <div class="tab-content">
                        <div class="row pt-4 pb-3 px-2  bg-clr-blue-gray">
                            <div class="col-md-4">
                                <div class="ltn__shop-details-img-gallery w-100">
                                    <div class="ltn__shop-details-large-img">
                                        <div class="single-large-img">
                                            @isset($product->imageGalleries)
                                                @foreach ($product->imageGalleries as $image)
                                                    <a href="{{ asset("$image->image_path") }}"
                                                        data-rel="lightcase:myCollection">
                                                        <img src="{{ asset("$image->image_path") }}" class="border-r-30 w-100"
                                                            alt="Image">
                                                    </a>
                                                @endforeach
                                            @endisset
                                        </div>
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
                                        <p class="sngl-product-details f-s-15 txt-black-gray">
                                            {!! $product->description['en'] ?? '' !!}
                                        </p>
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
                                                <img src="img/icons/social/facebook.png" alt="" srcset="">
                                            </a>
                                        </span>
                                        <span class="social-modern-icons px-2">
                                            <a href="fb-messenger://share/?link={{ urlencode(url('product/'.$product->slug['en'])) }}" target="_blank">
                                                <img src="img/icons/social/messenger.png" alt="" srcset="">
                                            </a>
                                        </span>
                                        <span class="social-modern-icons px-2">
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url('product/'.$product->slug['en'])) }}" target="_blank">
                                                <img src="img/icons/social/twitter.png" alt="" srcset="">
                                            </a>
                                        </span>
                                        <span class="social-modern-icons px-2">
                                            <a href="https://t.me/share/url?url={{ urlencode(url('product/'.$product->slug['en'])) }}" target="_blank">
                                                <img src="img/icons/social/telegram.png" alt="" srcset="">
                                            </a>
                                        </span>
                                        <span class="social-modern-icons px-2">
                                            <a href="https://api.whatsapp.com/send?text={{ urlencode(url('product/'.$product->slug['en'])) }}" target="_blank">
                                                <img src="img/icons/social/whatsapp.png" alt="" srcset="">
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
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="single_product.html"><img src="img/product/Png(2).png"
                                                        alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge">Popular</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-price">
                                                    <span>Pouf Shower Loofah For Bath</span>
                                                </div>
                                                <h2 class="product-title"><a href="single_product.html">Luffa Bath</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="single_product.html"><img src="img/product/Png(3).png"
                                                        alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge">Popular</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-price">
                                                    <span>Pouf Shower Loofah for Bath - Box</span>
                                                </div>
                                                <h2 class="product-title"><a href="single_product.html">Luffa Bath</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="single_product.html"><img src="img/product/luffa bath/V-47.jpg"
                                                        alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge">Popular</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-price">
                                                    <span>Egyptian Natural Loofah for Bath - Long</span>
                                                </div>
                                                <h2 class="product-title"><a href="single_product.html">Luffa Bath</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="single_product.html"><img src="img/product/Png(2).png"
                                                        alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge">Popular</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-price">
                                                    <span>Pouf Shower Loofah For Bath</span>
                                                </div>
                                                <h2 class="product-title"><a href="single_product.html">Luffa Bath</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="single_product.html"><img src="img/product/Png(3).png"
                                                        alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge">Popular</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-price">
                                                    <span>Pouf Shower Loofah for Bath - Box</span>
                                                </div>
                                                <h2 class="product-title"><a href="single_product.html">Luffa Bath</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="single_product.html"><img src="img/product/luffa bath/V-47.jpg"
                                                        alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge">Popular</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-price">
                                                    <span>Egyptian Natural Loofah for Bath - Long</span>
                                                </div>
                                                <h2 class="product-title"><a href="single_product.html">Luffa Bath</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
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
                                <li><a href="#">All Category ( 65 )</a></li>
                                <li><a href="#">Scrubber Sponge ( 10 ) </a>
                                </li>
                                <li><a href="#">Premium Scrubber Sponge ( 7 ) </a>
                                </li>
                                <li><a href="#">Plastic Scrubber Sponge ( 11 ) </a>
                                </li>
                                <li><a href="#">Super Abrasive for Grills ( 2 )</a></li>
                                <li><a href="#">Power of Steel ( 7 ) </a></li>
                                <li><a href="#">Towel ( 10 ) </a></li>
                                <li><a href="#">Luffa Bath ( 8 ) </a>
                                <li><a href="#">Beauty ( 3 ) </a>
                                <li><a href="#">House Tools ( 6 ) </a>
                                <li><a href="#">Liquid ( 1 ) </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Price Filter Widget -->
                        <div class="widget ltn__price-filter-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Tags</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <span class="tag-bg f-s-13">All Tags</span>
                                    <span class="tag-bg f-s-13">Egyptian Natural Loofah for Bath</span>
                                    <span class="tag-bg f-s-13">Dish Washing</span>
                                    <span class="tag-bg f-s-13">Scrubber Sponge</span>
                                    <span class="tag-bg f-s-13">Towel</span>
                                    <span class="tag-bg f-s-13">Non-Woven Mop</span>
                                    <span class="tag-bg f-s-13">Broom</span>
                                    <span class="tag-bg f-s-13">Cotton Mop</span>
                                    <span class="tag-bg f-s-13">Shower Loofah</span>
                                    <span class="tag-bg f-s-13">Roll Non-Woven Towels</span>
                                    <span class="tag-bg f-s-13">Dishcloyh Sponge</span>
                                    <span class="tag-bg f-s-13">Non-Woven Towel</span>
                                </div>
                            </div>
                        </div>
                        <!-- Top Rated Product Widget -->

                        <div class="logo-catalog">
                            <div class="main-logo">
                                <img src="img/logo.png" alt="">
                            </div>
                            <ul class="cst-btn p-0">
                                <li class="special-link shinep-0">
                                    <a class="p-0" download="#">Download Katalog</a>
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


