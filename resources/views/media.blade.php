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
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Media</li>
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
    <div class="container">
      <div class="row">
        <div class="col-12 mb-20">
          <div class="ltn__shop-options">
            <ul>
              <li>
                <div class="showing-product-number text-right text-end">
                  <span>Media</span>
                </div>
              </li>
            </ul>
          </div>
          <div class="tab-content media-content">
            <div class="row">
                @isset($all_media)
                @foreach ($all_media as $media)
                     <!-- ltn__product-item -->
              <div class="col-md-5 offset-md-1 col-12">
                <div class="ltn__blog-item ltn__blog-item-5 ltn__blog-item-video">
                  <div class="ltn__video-img">
                    <img src="{{ asset("$media->image") }}" alt="video popup bg image">
                    <a class="ltn__video-icon-2 ltn__secondary-bg ltn__video-icon-2-border---"
                      href="{{ $media->vedio_link }}"
                      data-rel="lightcase:myCollection">
                      <i class="fa fa-play"></i>
                    </a>
                  </div>
                  <div class="ltn__blog-brief">
                    <h3 class="ltn__blog-title "><a href="#" class="text-in-dark">{!! $media->title[$locale] ?? ''!!}</a></h3>
                    <p>{!! $media->description[$locale] ?? '' !!}</p>
                  </div>
                </div>
              </div>
              <!-- ltn__product-item -->
                @endforeach
                @endisset


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- PRODUCT DETAILS AREA END -->
@endsection
