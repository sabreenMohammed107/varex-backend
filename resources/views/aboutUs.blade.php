@extends('webLayout.main')



@section('content')
<!-- BREADCRUMB AREA START -->
@php
    $locale = app()->getLocale();
@endphp
<div class="py-3">
    <div class="container-lg">
      <div class="row">
        <div class="col-lg-12">
          <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2">
            <div class="ltn__breadcrumb-list ">
              <ul>
                <li><a href="{{ LaravelLocalization::localizeUrl('/') }}">{{ __('links.home') }}</a></li>
                <li> {{ __('links.about_us') }}</li>
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
            <h3 class="f-s-96">{{ __('links.about') }} Varex</h3>
            <p class="f-s-24">{!! $about->about_banner_text[$locale] ?? ' ' !!}</p>
          </div>
        </div>
        <div class="container-lg pt-100">
          <div class="row">
            <div class="section-our-mission">
              <h3 class="main-title text-in-dark f-s-45 text-center pb-70">{!! $about->mission_title[$locale] ?? ' ' !!}
                <img class="mission-title-img" src="{{asset('webasset/img/icons/header-under-title.png')}}" alt="" srcset="">
              </h3>
              <div class="our-mission-p1 row">
                <div class="mission-content-left py-5 order-2 order-md-1 px-5 col-12 col-md-6">
                  <div class="title-head-content">
                    <h3 class="text-in-dark f-s-36">{!! $about->mission_sub_title[$locale] ?? ' ' !!}</h3>
                  </div>
                  <div class="paragraph-content ">
                    <p class="clr-gry py-3">{!! $about->mission_description[$locale] ?? ' ' !!}</p>
                  </div>
                  <div class="btn-content">
                    <ul class="cst-btn p-0">
                      <li class="special-link shine w-fit-content p-0 m-0">
                        <a class="p-0 m-0" href="{{ LaravelLocalization::localizeUrl('/products') }}">{{ __('links.all_products') }}</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="mission-content-right-img order-1 order-md-2 col-12 col-md-6">
                    <div class="main-img-group">
                        <img class="item-img-bg" src="{{asset('webasset/img/about-us/y-bg.png')}}" alt="" srcset="">
                        <img class="item-img-hash" src="{{asset('webasset/img/about-us/small-shape.png')}}" alt="" srcset="">
                        <img class="item-img-star" src="{{asset('webasset/img/about-us/star-bg.png')}}" alt="" srcset="">
                        <img class="item-img-main" src="{{ asset($about->mission_image) }}" alt="" srcset="">
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
                        <img class="item-img-main" src="{{asset($about->quality_image)}}" alt="" srcset="">
                        <img class="item-img-zegzag" src="{{asset('webasset/img/about-us/Frame.png')}}" alt="" srcset="">
                      </div>
                </div>

                <div class="mission-content-left py-5 px-5 col-12 col-md-6">
                  <div class="title-head-content">
                    <h3 class="text-in-dark f-s-36">{!! $about->quality_title[$locale] ?? ' ' !!}</h3>
                  </div>
                  <div class="paragraph-content ">
                    <p class="clr-gry py-3">{!! $about->quality_description[$locale] ?? ' ' !!}</p>
                  </div>
                  <div class="btn-content">
                    <ul class="cst-btn p-0">
                      <li class="special-link shine w-fit-content p-0 m-0">
                        <a class="p-0 m-0" href="{{ $about->company_katalog }}" download="" >{{ __('links.katalog') }}</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="section-our-mission pt-100">
              <h3 class="main-title text-in-dark f-s-45 text-center pb-70">{!! $about->vision_title[$locale] ?? ' ' !!}
                <img class="mission-title-img" src="{{asset('webasset/img/icons/header-under-title.png')}}" alt="" srcset="">
              </h3>
              <div class="our-vision-section-content">
                <div class="vision-content border-r-30 p-5">
                  <p>{!! $about->vision_description[$locale] ?? ' ' !!}</p>
                </div>
                <div class="vision-img">
                  <img src="{{ asset($about->vision_image) }}" class="w-100 object-fit-cover border-r-30 h-100" alt="">
                </div>
              </div>
            </div>
            <div class="section-our-mission pt-100">
              <h3 class="main-title text-in-dark f-s-45 text-center pb-70">{{ __('links.co_founder') }}
                <img class="mission-title-img" src="{{asset('webasset/img/icons/header-under-title.png')}}" alt="" srcset="">
              </h3>
              <div class="about-us-ceo-word-section">
                <div class="row">
                  <div class="col-12 col-md-8 ceo-content">
                    {!! $about->seo_description[$locale] ?? ' ' !!}
                    <div class="ceo-sign">
                      <h3 class="text-in-dark">{!! $about->manager_name[$locale] ?? ' ' !!}</h3>
                      <p class="clr-gry">{!! $about->manager_position[$locale] ?? ' ' !!}</p>
                    </div>
                  </div>
                  <div class="col-12 col-md-4 ceo-img">
                    <img src="{{ asset($about->image) }}" alt="" srcset="">
                  </div>
                </div>
              </div>
            </div>
            <div class="section-our-mission pt-100">
              <h3 class="main-title text-in-dark f-s-45 text-center pb-70">{{ __('links.why_varex') }}
                <img class="mission-title-img" src="{{asset('webasset/img/icons/header-under-title.png')}}" alt="" srcset="">
              </h3>
              <div class="why-us-info row">
                @isset($whyUs)
                    @foreach ($whyUs as $obj)
                    <div class="col-12 col-md-4 text-center">
                        <div class="why-us-icon py-2">
                          <img src="{{  $obj->icon }}" alt="">
                        </div>
                        <div class="why-us-head pt-3">
                          <h4>{!! $obj->title[$locale] ?? ' ' !!}</h4>
                        </div>
                        <div class="why-us-info">
                          <p class="clr-gry p-3">I{!! $obj->description[$locale] ?? ' ' !!}</p>
                        </div>
                      </div>
                    @endforeach
                @endisset


              </div>
            </div>
            <div class="section-our-mission pt-100 pb-100">
              <h3 class="main-title text-in-dark f-s-45 text-center pb-70">{{ __('links.important_question') }}
                <img class="mission-title-img" src="{{asset('webasset/img/icons/header-under-title.png')}}" alt="" srcset="">
              </h3>
              <div class="faq-sextion-about-us">
                <div class="row">
                  <div class="col-12 col-md-8">
                    <div class="ltn__faq-inner ltn__faq-inner-2">
                      <div id="accordion_2">
                        <!-- card -->
                        @isset($faqs)
                        @foreach ($faqs as $index=>$faq)
                        <div class="card">
                            <h6 class="ltn__card-title collapsed" data-bs-toggle="collapse" data-bs-target="#faq-item-2-{{ $index+1 }}"
                              aria-expanded="false">
                             {!! $faq->question[$locale] ?? ''!!}
                            </h6>
                            <div id="faq-item-2-{{ $index+1 }}" class="collapse" data-parent="#accordion_2" style="">
                              <div class="card-body">
                                <p>{!! $faq->answer[$locale] ?? ''!!}</p>
                              </div>
                            </div>
                          </div>
                        @endforeach
                        @endisset
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-4 d-flex align-items-center">
                    <div class="logo-catalog">
                      <div class="main-logo">
                        <img src="{{asset('webasset/img/logo.png')}}" alt="">
                      </div>
                      <div class="btn-content">
                        <ul class="cst-btn p-0">
                          <li class="special-link shine w-fit-content p-0 m-0">
                            <a class="p-0 m-0" href="{{ $about->company_katalog }}" download="" >{{ __('links.katalog') }}</a>
                          </li>
                        </ul>
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
