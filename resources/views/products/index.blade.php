@extends('webLayout.main')

@section('style')
    <style>
        #allProductsPage .product-img .home-img img {
            object-fit: contain;
        }

        #allProductsPage .product-img .qr-back-face-product {
            display: none;

        }

        #allProductsPage .product-img:hover .qr-back-face-product {
            display: block;
            position: relative;
            z-index: 500;
            object-fit: contain;
            width: 100%;
            height: 100%;
            padding: 25px;
        }

        #allProductsPage .product-img:hover img.qr-front-face-product {
            display: none;
        }

        #allProductsPage .product-img:hover .product-badge {
            /* display: none; */
        }

        #allProductsPage .home-img {
            width: 100%;
            height: 100%;
        }

        #allProductsPage #liton_product_grid .ltn__product-tab-content-inner .ltn__product-item:hover {
            -webkit-box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.25);
            -moz-box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.25);
            box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.25);
        }


        #allProductsPage #liton_product_list .ltn__product-list-view .ltn__product-item-3 .product-info {
            padding: 7px 25px 20px 2px;
        }

        #allProductsPage #liton_product_list .ltn__product-tab-content-inner .ltn__product-item.ltn__product-item-3 .product-img img {
            height: 100% !important;
        }

        #allProductsPage #liton_product_list .ltn__product-tab-content-inner .ltn__product-item.ltn__product-item-3 img.qr-code-img {
            padding-bottom: 25px;
        }

        /* Mobile screens: Disable hover effect */
        @media (max-width: 768px),
        (pointer: coarse) {
            #allProductsPage .product-img .qr-back-face-product {
                display: none;
            }

            #allProductsPage .product-img:hover .qr-back-face-product {
                display: none;
            }

            #allProductsPage .product-img:hover img.qr-front-face-product {
                display: block;
            }

            #allProductsPage .product-img:hover .product-badge {
                display: block;
            }
        }

        .tag-bg {
            cursor: pointer;
        }
        @media (min-width: 1600px) {
            .ltn__slide-item-3-normal {
                min-height: 566px !important;
                max-height: 566px !important;
            }
        }
    </style>
@endsection

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
                                <li> {{ __('links.products') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter" id="allProductsPage">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-9 order-lg-2 mb-120">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="showing-product-number text-right text-end">
                                    <span>{{ __('links.products') }} </span><span id="product-cat">
                                        @if (isset($catObj))
                                            - {{ $catObj->name[$locale] ?? '' }}
                                        @else
                                        {{-- @if (!empty($catName)) --}}
                                        - {{ $catName ?? '' }}

                                        {{-- @endif --}}

                                        @endif
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i
                                                class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="product-list">
                        @include('products.partials.products_list', ['products' => $products])
                    </div>

                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination pagination">
                            <ul id="pagination-links">
                                {!! $products->links('vendor.pagination.custom') !!}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  mb-120">
                    <aside class="sidebar ltn__shop-sidebar">
                        <!-- Category Widget -->

                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">{{ __('links.categories') }}</h4>
                            <ul>
                                <li><a href="#" onclick="setCategoryId(0); return false;">{{ __('links.all_categories') }}
                                        ({{ $countAll }})</a></li>
                                @foreach ($categoriesOrderedByRank as $category)
                                    <li><a href="#" class="proCategory" data-categoryid="{{ $category->id }}"
                                            onclick="setCategoryId({{ $category->id }}); return false;">
                                            {{ $category->name[$locale] }} ({{ $category->products_count }})
                                        </a></li>
                                @endforeach

                            </ul>
                            <input type="hidden" id="selectedCategoryId" value="">
                        </div>

                        <!-- Price Filter Widget -->
                        <div class="widget ltn__price-filter-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">{{ __('links.tags') }}</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <span class="tag-bg f-s-13 proTag" onclick="setTagId(0); return false;"
                                        style="cursor: pointer;">{{ __('links.all_tags') }}</span>
                                    @foreach ($tags as $tag)
                                        <span class="tag-bg f-s-13 proTag"  data-tagid="{{ $tag->id }}" onclick="setTagId({{ $tag->id }}); return false;"
                                            style="cursor: pointer;">
                                            {{ $tag->title[$locale] ?? '' }}
                                        </span>
                                    @endforeach
                                </div>
                                <input type="hidden" id="selectedTagId" value="">
                            </div>
                        </div>
                        <!-- Top Rated Product Widget -->

                        <div class="logo-catalog">
                            <div class="main-logo">
                                <img src="{{ asset('webasset/img/logo.png') }}" alt="">
                            </div>
                            <ul class="cst-btn p-0">
                                <li class="special-link shinep-0">
                                    <a class="p-0" href="{{ asset($about->company_katalog) }}" download="">Download
                                        Katalog</a>
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
@section('webScript')
    <script>
        $(document).ready(function($) {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var pageUrl = $(this).attr('href');
                var page = pageUrl ? pageUrl.split('page=')[1] : 1;
                console.log("Extracted page:", page); // Debugging log
                fetchProducts(page);

            });

            $('#searchButton').click(function(e) {
                var searchQuery = $('#global-search-input').val(); // Get search query
                if (searchQuery.trim() !== '') {
                    // Redirect to search results page
                    window.location.href = "/products?search_name=" + encodeURIComponent(searchQuery);
                }
            });

            // Initial fetch
            fetchProducts();
        });

        // Function to set the selected category ID

        function setCategoryId(categoryId) {
            // Set the value of the element
            $('#selectedCategoryId').val(categoryId);
            fetchProducts(); // Fetch products for the first page when category changes

            // Remove the blue color and bold font weight from all categories
            $('.proCategory').css({
                'color': '',
                'font-weight': ''
            });

            // Set the color and bold font weight of the selected category
            $(`.proCategory[data-categoryid="${categoryId}"]`).css({
                'color': '#ae123c',
                'font-weight': 'bold'
            });
        }
        // Function to set the selected tagId ID

        function setTagId(tagId) {
            // Set the value of the element
            $('#selectedTagId').val(tagId);
            fetchProducts(); // Fetch products for the first page when category changes

            // Remove the blue color and bold font weight from all categories
            $('.proTag').css({
                'color': '',
                'font-weight': ''
            });

            // Set the color and bold font weight of the selected category
            $(`.proTag[data-tagid="${tagId}"]`).css({
                'color': '#ae123c',
                'font-weight': 'bold'
            });
        }

        function mobsetSearchCategoryId(categoryId) {
            // Set the value of the element
            console.log(" mobcategoryId:", categoryId);
            $('#mobselectedSearchCategoryId').val(categoryId);
            // fetchProducts(); // Fetch products for the first page when category changes


        }

        // function setSearchCategoryId(categoryId) {
        //     // Set the value of the element
        //     console.log(" categoryId:", categoryId);
        //     $('#selectedSearchCategoryId').val(categoryId);
        //     setCategoryId(categoryId)


        // }
        // Function to initialize the event listeners



        function fetchProducts(page) {

            // Get the search query from the input field

            // Get the selected category ID
            var categoryId = $('#selectedCategoryId').val();
            var tagId = $('#selectedTagId').val();
            // Get the selected search category ID from the global search
            var searchCategoryId = $('#selectedSearchCategoryId').val();

            var mobsearchQuery = $('#mob_search_name').val();
            // Determine URL
            var url = "/products";

            // Check if global search input exists
            if ($('#global-search-input').length) {
                searchQuery = $('#global-search-input').val();
            }
            // // Function to get URL parameter value
            function getUrlParameter(name) {
                name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
                var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
                var results = regex.exec(location.search);
                return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
            }
            // var searchQuery = $('#search_name').val();

            // Get the search_name parameter from the URL
            var searchQuery = getUrlParameter('search_name');

            $.ajax({
                url: url + "?page=" + page,
                url: url,
                data: {
                    page: page,
                    searchQuery: searchQuery,
                    category_id: categoryId,
                    tag_id: tagId,
                    searchCategoryId: searchCategoryId, // Add the selectedSearchCategoryId to the request data
                    mobsearchQuery: mobsearchQuery,
                },
                success: function(data) {
                    $('#product-list').html(data.products);
                    $('#pagination-links').html(data.pagination);
                    if (data.productCat) {
                        $('#product-cat').html('-' + data.productCat);
                        $('#current_cat').html(data.productCat);
                    } else {
                        //  $('#product-cat').html('');
                        //  $('#current_cat').html('All Categories');

                    }


                },
                error: function(xhr, status, error) {
                    console.error("Error fetching products:", error);
                }
            });
        }
    </script>
@endsection
