@php
    $locale = app()->getLocale();
@endphp
<header class="ltn__header-area ltn__header-3 section-bg-6">
    <!-- ltn__header-top-area start -->
    <div class="ltn__header-top-area">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-9 d-none d-md-block">
                    <div class="ltn__top-bar-menu add-and-phone">
                        <ul class="d-flex justify-content-lg-start justify-content-md-between">
                            <li>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($contactUsFirstRow->location[$locale] ?? '') }}"
                                    target="_blank">
                                    <img src="{{ asset('webasset/img/icons/location.png') }}" alt="" />
                                    {{ $contactUsFirstRow->location[$locale] ?? '' }}
                                </a>
                            </li>
                            <li style="font-size: 14px;color: #56778f;">
                                <img src="{{ asset('webasset/img/icons/call-phone.png') }}" alt="" />
                                {{ __('links.sale_service') }}
                                <a
                                    href="tel:{{ $contactUsFirstRow->sales_phone }}">{{ $contactUsFirstRow->sales_phone }}</a>
                                /
                                <a
                                    href="tel:{{ $contactUsFirstRow->service_support_phone }}">{{ $contactUsFirstRow->service_support_phone }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="top-bar-right text-right text-end">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li>
                                    <!-- ltn__language-menu -->
                                     <div class="ltn__drop-menu ltn__currency-menu">
                                        <ul>
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                @if(app()->getLocale() != $localeCode)
                                                    <li>
                                                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                            {{ $properties['native'] }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li>
                                                <a href="{{ $contactUsFirstRow->facebook ?? '#' }}" target="_blank"
                                                    title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $contactUsFirstRow->twitter ?? '#' }}" target="_blank"
                                                    title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $contactUsFirstRow->instagram ?? '#' }}" target="_blank"
                                                    title="Instagram"><i class="fab fa-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->
    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area p-0 ltn__header-sticky ltn__sticky-bg-black--- ltn__sticky-bg-secondary">
        <div class="container-lg">
            <div class="row justify-content-center justify-content-lg-start align-items-center">
                <div class="col col-sm-3 col-md-2 px-0">
                    <div class="site-logo">
                        <a href="{{ LaravelLocalization::localizeUrl('/') }}"><img src="{{ asset('webasset/img/logo.png') }}"
                                alt="Logo" /></a>
                    </div>
                </div>
                <div class="col header-contact-serarch-column d-none d-lg-block">
                    <div class="">
                        <div class="header-menu header-menu-2 d-flex justify-content-center">
                            <nav class="col">
                                <div class="ltn__main-menu col">
                                    <ul class="d-flex justify-content-evenly">
                                        <li class="not-special-link">
                                            <a href="{{ LaravelLocalization::localizeUrl('/') }}">{{ __('links.home') }}</a>
                                        </li>
                                        <li class="not-special-link">
                                            <a
                                                href="{{ LaravelLocalization::localizeUrl('/about-us') }}">{{ __('links.about_us') }}</a>
                                        </li>
                                        <li class="not-special-link">
                                            <a href="{{ LaravelLocalization::localizeUrl('/products') }}">{{ __('links.products') }}</a>
                                        </li>
                                        <li class="not-special-link">
                                            <a href="{{ LaravelLocalization::localizeUrl('/blogs') }}">{{ __('links.blogs') }}</a>
                                        </li>
                                        <li class="not-special-link">
                                            <a href="{{ LaravelLocalization::localizeUrl('/media') }}">{{ __('links.media') }}</a>
                                        </li>
                                        <li class="not-special-link">
                                            <a href="{{ LaravelLocalization::localizeUrl('/contact') }}">{{ __('links.contact_us') }} </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <ul class="cst-btn">
                                <li class="special-link shine">
                                    <a class="p-0" href="{{ LaravelLocalization::localizeUrl('/distribute') }} ">{{ __('links.distribute') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
    <!-- header-bottom-area start -->
    <div class="header-bottom-area ltn__border-top ltn__secondary-bg section-bg-1 menu-color-white d-none d-lg-block">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="short-by text-center col-2">
                    <select class="nice-select w-100" id="search_category" name="search_category" style="display: none">
                        <option> <a href="#" onclick="setSearchCategoryId(null); return false;">{{ __('links.all_categories') }}</a></option>
                        @foreach ($categoriesOrderedByRank as $category)
                            <option value="{{ $category->id }}">{{ $category->name[$locale] }} -{{ $category->id }}
                            </option>
                        @endforeach

                    </select>
                    <div style="
                    border: 1px solid;
                    font-weight: bold;
                    font-size: 13px;
                    color: #184363;
                    min-width: 100%;
                  "
                        class="nice-select w-100 my-3" tabindex="0">
                        <span class="current" id="current_cat"><img style="margin-right: 15px"
                                src="{{ asset('webasset/img/icons/cat-menu.png') }}" alt="" />
                            @if (isset($catObj))
                                - {{ $catObj->name[$locale] ?? '' }}
                            @else
                                @if (!empty($catName))
                                    - {{ $catName ?? '' }}
                                @else
                                {{ __('links.all_categories') }}

                                @endif

                            @endif
                            {{-- @if (isset($catObj))
                            {{ $catObj->name[$locale] ?? '' }}
                        @else
                            All Categories
                        @endif --}}
                        </span>
                        <ul class="list category-select" id="categoryList">
                            {{-- <li data-value="Default Sorting" class="option selected focus">
                                    <a href="#" data-categoryid="null">All</a>
                                </li> --}}
                            @foreach ($categoriesOrderedByRank as $category)
                                <?php
                                $id = $category->id;
                                ?>
                                <li class="option" data-id="{{ $id }}"
                                    onclick="setSearchCategoryId({{ $category->id }}, '{{ $category->name[$locale] }}'); return false;">
                                    {{ $category->name[$locale] }} ({{ $category->products_count }})
                                </li>
                            @endforeach
                        </ul>
                        {{-- <input type="text" id="selectedSearchCategoryId" name="selectedSearchCategoryId" value=""> --}}
                    </div>

                </div>
                <div class="col header-menu-column p-2">

                    <div class="header-search-2 w-100">
                        <form id="searchForm" action="{{ LaravelLocalization::localizeUrl('/products') }}" method="get">
                            <input type="hidden" id="selectedSearchCategoryId" name="selectedSearchCategoryId"
                                value="">
                            <input type="text" name="search_name" id="global-search-input"
                                value="@isset($searchTerm){{ $searchTerm }}@endisset"
                                placeholder="  {{ __('links.search_text') }}" />
                            <button id="searchButton" class="main-search" type="submit">
                                <span><i class="icon-search"></i></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-bottom-area end -->
</header>
