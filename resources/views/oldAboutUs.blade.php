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
                <li><a href="">Home</a></li>
                <li>About Us</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BREADCRUMB AREA END -->
  <!-- PRODUCT DETAILS AREA START -->
  <div class="ltn__product-area ltn__product-gutter" id="about_us_page">
    <div class="main-bg-img-container">
      <img src="{{asset('webasset/img/bg/postive-caring-relationships-teachers 1.png')}}" alt="" class="image-bg-cover w-100">
      <div class="main-img-content">
        <h3 class="f-s-96">About Varex</h3>
        <p class="f-s-24"> {!! $about->about_banner_text['en'] ?? ' ' !!}</p>
      </div>
    </div>
    <div class="container-lg pt-100">
      <div class="row">
        <div class="section-our-mission">
          <h3 class="main-title text-in-dark f-s-45 text-center pb-70">{!! $about->mission_title['en'] ?? ' ' !!}</
            <img class="mission-title-img" src="{{asset('webasset/img/icons/header-under-title.png')}}" alt="" srcset="">
          </h3>
          <div class="our-mission-p1 row">
            <div class="mission-content-left py-5 order-2 order-md-1 px-5 col-12 col-md-6">
              <div class="title-head-content">
                <h3 class="text-in-dark f-s-36">{!! $about->mission_sub_title['en'] ?? ' ' !!}</h3>
              </div>
              <div class="paragraph-content ">
                <p class="clr-gry py-3">{!! $about->mission_description['en'] ?? ' ' !!}</p>
              </div>
              <div class="btn-content">
                <ul class="cst-btn p-0">
                  <li class="special-link shine w-fit-content p-0 m-0">
                    <a class="p-0 m-0" href="{{ url('/products') }}">All Products</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="mission-content-right-img order-1 order-md-2 col-12 col-md-6">
              <div class="main-img-group">
                <img class="item-img-bg" src="{{asset('webasset/img/about-us/y-bg.png')}}" alt="" srcset="">
                <img class="item-img-hash" src="{{asset('webasset/img/about-us/small-shape.png')}}" alt="" srcset="">
                <img class="item-img-star" src="{{asset('webasset/img/about-us/star-bg.png')}}" alt="" srcset="">
                <img class="item-img-main" src="{{asset('webasset/img/about-us/1.png')}}" alt="" srcset="">
                <img class="item-img-zegzag" src="{{asset('webasset/img/about-us/Frame.png')}}" alt="" srcset="">
              </div>
            </div>
          </div>
          <div class="our-mission-p2 pt-100 row">

            <div class="mission-content-right-img col-12 col-md-6">
              <div class="main-img-group">
                <img class="item-img-bg" src="{{asset('webasset/img/about-us/y-bg.png')}}" alt="" srcset="">
                <img class="item-img-hash" src="{{asset('webasset/img/about-us/small-shape.png')}}" alt="" srcset="">
                <img class="item-img-star" src="{{asset('webasset/img/about-us/star-bg.png')}}" alt="" srcset="">
                <img class="item-img-main" src="{{asset('webasset/img/about-us/2.png')}}" alt="" srcset="">
                <img class="item-img-zegzag" src="{{asset('webasset/img/about-us/Frame.png')}}" alt="" srcset="">
              </div>
            </div>

            <div class="mission-content-left py-5 px-5 col-12 col-md-6">
              <div class="title-head-content">
                <h3 class="text-in-dark f-s-36">{!! $about->vision_title['en'] ?? ' ' !!}</h3>
              </div>
              <div class="paragraph-content ">
                <p class="clr-gry py-3">{!! $about->vision_description['en'] ?? ' ' !!}</p>
              </div>
              <div class="btn-content">
                <ul class="cst-btn p-0">
                  <li class="special-link shine w-fit-content p-0 m-0">
                    <a class="p-0 m-0" href="{{ $about->company_katalog }}" download="" >Download Katalog</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- PRODUCT DETAILS AREA END -->
@endsection
