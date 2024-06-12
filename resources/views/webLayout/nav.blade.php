<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="{{ url('/') }}"><img src="{{asset('webasset/img/logo.png')}}" alt="Logo" /></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="short-by text-center w-100">
            <select class="nice-select w-100" style="display: none">
                <option>All</option>
                @foreach ($categoriesOrderedByRank as $category)
                <option value="{{ $category->id }}">{{ $category->name['en'] }}</option>
            @endforeach


            </select>
            <div class="nice-select w-100 my-3" tabindex="0">

                    <span class="current"><img style="margin-right: 5px"
                        src="{{ asset('webasset/img/icons/cat-menu.png') }}" alt="" />
                        @if(isset($catObj))
                        {{ $catObj->name['en'] ?? '' }}
                    @else
                        All Categories
                    @endif</span>
                        <ul class="list category-select2" id="categoryList2">
                            {{-- <li data-value="Default Sorting" class="option selected focus">
                                <a href="#" data-categoryid="null">All</a>
                            </li> --}}
                            @foreach ($categoriesOrderedByRank as $category)
                            <?php
                            $id=$category->id ;
                            ?>
                            <li class="option" data-id="{{ $id }}" onclick="mobsetSearchCategoryId({{ $category->id }}, '{{ $category->name['en'] }}'); return false;">
                                  {{ $category->name['en'] }} ({{ $category->products_count }})
                            </li>
                            @endforeach
                        </ul>

            </div>
        </div>
        <div class="ltn__utilize-menu-search-form">
            <form action="{{ url('/products') }}">
                <input type="hidden" id="mobselectedSearchCategoryId" name="mobselectedSearchCategoryId" value="">

                <input type="text" name="mob_search_name"
                id="mob_search_name" placeholder="Search..." />
                <button id="mob_searchButton" ><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="ltn__utilize-menu">
            <ul>
                <li class="not-special-link-sm-menu">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="not-special-link-sm-menu">
                    <a href="{{ url('/about-us') }}">About Us</a>
                </li>
                <li class="not-special-link-sm-menu">
                    <a href="{{ url('/products') }}">Products</a>
                </li>
                <li class="not-special-link-sm-menu">
                    <a href="{{ url('/blogs') }}">Blogs</a>
                </li>
                <li class="not-special-link-sm-menu">
                    <a href="{{ url('/media') }}">Media</a>
                </li>
                <li class="not-special-link-sm-menu">
                    <a href="{{ url('/contact') }}">Contact Us</a>
                </li>

                <li class="special-link shine">
                    <a class="p-0" href="{{ url('/distribute') }}">Distribute With Us</a>
                </li>
            </ul>
        </div>

        <div class="ltn__social-media-2">
            <ul>
                <li>
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                </li>

                <li>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Utilize Mobile Menu End -->
<div class="ltn__utilize-overlay"></div>
<div class="mobile-header-menu-fullwidth">
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-12">
                <!-- Mobile Menu Button -->
                <div class="mobile-menu-toggle d-lg-none">
                    <span>MENU</span>
                    <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                        <svg viewBox="0 0 800 600">
                            <path
                                d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                id="top"></path>
                            <path d="M300,320 L540,320" id="middle"></path>
                            <path
                                d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
