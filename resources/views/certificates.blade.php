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
                <li>Certificate</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BREADCRUMB AREA END -->
  <!-- PRODUCT DETAILS AREA START -->

  <!-- Gallery area start -->
  <div class="ltn__gallery-area mb-120" id="Certificate_page">
    <div class="container">

      <!-- Portfolio Wrapper Start -->
      <!-- (ltn__gallery-info-hide) Class for 'ltn__gallery-item-info' not showing -->
      <div class="ltn__gallery-active row ltn__gallery-style-2 ltn__gallery-info-hide---">
        <div class="ltn__gallery-sizer col-1"></div>
        @isset($certificates)
        @foreach ($certificates as $certificate)
        <!-- gallery-item -->
        <div class="ltn__gallery-item filter_category_3 col-lg-6 col-sm-6 col-12">
          <div class="ltn__gallery-item-inner">
            <div class="ltn__gallery-item-img d-flex justify-content-center">
              <a href="{{ asset("$certificate->image") }}" data-rel="lightcase:myCollection">
                <img src="{{ asset("$certificate->image") }}" alt="Image">
                <div class="hover-layout"></div>

                <div class="hover-content">
                    <h3>{{ $certificate->name['en'] ?? ''}}</h3>
                </div>
              </a>
            </div>
          </div>
        </div>
        <!-- gallery-item -->
        @endforeach
        @endisset



      </div>


    </div>
  </div>
  <!-- Gallery area end -->
@endsection
