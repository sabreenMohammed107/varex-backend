@extends('webLayout.main')

@section('content')
@php
    $locale = app()->getLocale();
@endphp
    <!-- BREADCRUMB AREA START -->
    <div class="py-3">
        <div class="container-lg">
          <div class="row">
            <div class="col-lg-12">
              <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2">
                <div class="ltn__breadcrumb-list ">
                  <ul>
                    <li><a href="{{ LaravelLocalization::localizeUrl('/') }}">{{ __('links.home') }}</a></li>
                    <li><a href="{{  LaravelLocalization::localizeUrl('/blogs') }}" class="text-in-gray-light">{{ __('links.home') }}</a></li>
                    <li class="text-in-black">{{ $blog->title[$locale] ?? '' }} </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- BREADCRUMB AREA END -->
      <!-- Blog DETAILS AREA START -->
      <div class="ltn__product-area ltn__product-gutter" id="sngl_blog_page">
        <div class="container-lg">
          <div class="row">
            <div class="main-bg-img-container">
              <img src="{{ asset("$blog->main_image") }}" alt="" class="image-bg-cover w-100">
              <div class="overlay-content-blog-details">
                <div class="ltn__blog-brief">
                  <div class="ltn__blog-meta-btn">
                    <div class="ltn__blog-meta">
                      <ul>
                        <li class="ltn__blog-date f-clr-gray-plus">{{ \Carbon\Carbon::parse($blog->publish_date)->diffForHumans() }}</li>
                      </ul>
                    </div>

                  </div>
                  <h3 class="ltn__blog-title animated fadeIn l-space-1">{{ $blog->title[$locale] ?? '' }}</h3>
                  <div class="sngl-blog-details">
                    <p class="pt-5">{!! $blog->description[$locale] ?? ''  !!}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- Blog DETAILS AREA END -->
@endsection
