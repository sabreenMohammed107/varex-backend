

    <div class="row scnd-blog-section">
        <div class="col-12 mb-20">
          <div class="ltn__shop-options">
            <ul>
              <li>
                <div class="showing-product-number text-right text-end">
                  <span>Latest Posts</span>
                </div>
              </li>
            </ul>
          </div>
          <div class="tab-content media-content">
            <div class="row px-2">
              <!-- Blog Item -->
              @foreach ($blogs as $blog)
              <div class="col-lg-4 col-sm-6 col-12">
                <div class="ltn__blog-item ltn__blog-item-5 ltn__blog-item-video">
                  <div class="ltn__video-img border-r-5">
                    <img src="{{ asset("$blog->featured_image") }}" alt="video popup bg image border-r-5">
                  </div>
                  <div class="ltn__blog-brief">
                    <div class="ltn__blog-meta">
                      <ul>
                        <li class="ltn__blog-badge">
                        {{ $blog->category->name['en'] ?? '' }}
                        </li>
                      </ul>
                    </div>
                    <h3 class="ltn__blog-title"><a href="{{ url('blog/'.$blog->slug['en']) ?? '#'}}" class="text-in-dark"> {{ $blog->title['en'] ?? '' }}</a></h3>
                    <div class="ltn__blog-meta-btn">
                      <div class="ltn__blog-meta">
                        <ul>
                          <li class="ltn__blog-date f-clr-gray-plus">{{ \Carbon\Carbon::parse($blog->publish_date)->diffForHumans() }}</li>
                        </ul>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              @endforeach
            </div>
          </div>
        </div>
      </div>


@if ($blogs->hasPages())
    <div class="ltn__pagination-area text-center mb-5">
        <div class="ltn__pagination">
            <ul>
                {{-- Previous Page Link --}}
                @if ($blogs->onFirstPage())
                    <li class="disabled"><span><i class="fas fa-angle-double-left"></i></span></li>
                @else
                    <li><a href="{{ $blogs->previousPageUrl() }}" rel="prev"><i class="fas fa-angle-double-left"></i></a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                    @if ($page == $blogs->currentPage())
                        <li class="active"><a href="#">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($blogs->hasMorePages())
                    <li><a href="{{ $blogs->nextPageUrl() }}" rel="next"><i class="fas fa-angle-double-right"></i></a></li>
                @else
                    <li class="disabled"><span><i class="fas fa-angle-double-right"></i></span></li>
                @endif
            </ul>
        </div>
    </div>
@endif
