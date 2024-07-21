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
                <li>{{ __('links.blogs') }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BREADCRUMB AREA END -->
  <!-- PRODUCT DETAILS AREA START -->
  <div class="ltn__product-area ltn__product-gutter" id="all_blogs_page">
    <div class="container-lg">
      <div class="row">
        @if ($masterBlog)
        <div class="main-bg-img-container">
            <img src="{{ asset("$masterBlog->main_image") }}" alt="" class="image-bg-cover w-100">
            <div class="overlay-content d-none d-sm-block">
              <div class="ltn__blog-brief">
                <div class="ltn__blog-meta">
                  <ul>
                    <li class="ltn__blog-badge-main">
                        {{ $masterBlog->category->name[$locale] ?? '' }}
                    </li>
                  </ul>
                </div>
                <h3 class="ltn__blog-title animated fadeIn"><a href="{{ url('blog/'.$masterBlog->slug[$locale]) ?? '#'}}" tabindex="0" class="
                  l-space-1 f-s-35">{{ $masterBlog->title[$locale] ?? '' }}</a></h3>
                <div class="ltn__blog-meta-btn">
                  <div class="ltn__blog-meta">
                    <ul>
                      <li class="ltn__blog-date f-clr-gray-plus">{{ \Carbon\Carbon::parse($masterBlog->publish_date)->diffForHumans() }}</li>
                    </ul>
                  </div>

                </div>
              </div>
            </div>
            <div class="overlay-content-mobile d-block d-sm-none">
              <div class="ltn__blog-brief">
                <div class="ltn__blog-meta">
                  <ul>
                    <li class="ltn__blog-badge-main">
                        {{ $masterBlog->category->name[$locale] ?? '' }}
                    </li>
                  </ul>
                </div>
                <h3 class="ltn__blog-title animated fadeIn"><a href="{{ url('blog/'.$masterBlog->slug[$locale]) ?? '#'}}" tabindex="0" class="
                  l-space-1 f-s-35">{{ $masterBlog->title[$locale] ?? '' }}</a></h3>
                <div class="ltn__blog-meta-btn">
                  <div class="ltn__blog-meta">
                    <ul>
                      <li class="ltn__blog-date f-clr-gray-plus">{{ \Carbon\Carbon::parse($masterBlog->publish_date)->diffForHumans() }}</li>
                    </ul>
                  </div>

                </div>
              </div>
            </div>
          </div>
    @endif

      </div>
      <div id="blog-list">
        @include('blogs.partials.blogs', ['blogs' => $blogs])
    </div>

    </div>
  </div>
  <!-- PRODUCT DETAILS AREA END -->
@endsection
@section('webScript')
<script>
    $(document).on('click', '.ltn__pagination a', function(event) {
        event.preventDefault();
        var url = $(this).attr('href');
        fetchBlogs(url);
    });

    function fetchBlogs(url) {
        $.ajax({
            url: url,
            success: function(data) {
                $('#blog-list').html(data);
            }
        });
    }
</script>
@endsection
