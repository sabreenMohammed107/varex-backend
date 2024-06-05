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
                                <li><a href="index.html">Home</a></li>
                                <li>Products</li>
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
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-9 order-lg-2 mb-120">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="showing-product-number text-right text-end">
                                    <span>Products</span>
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
                            <h4 class="ltn__widget-title ltn__widget-title-border">Categories</h4>
                            <ul>
                                <li><a href="#" onclick="setCategoryId(null); return false;">All Category
                                        ({{ $countAll }})</a></li>
                                @foreach ($categoriesOrderedByRank as $category)
                                    <li><a href="#"
                                            onclick="setCategoryId({{ $category->id }}); return false;">{{ $category->name['en'] }}
                                            ({{ $category->products_count }})
                                        </a></li>
                                @endforeach
                            </ul>
                            <input type="hidden" id="selectedCategoryId" value="">
                        </div>

                        <!-- Price Filter Widget -->
                        <div class="widget ltn__price-filter-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Tags</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <span class="tag-bg f-s-13">All Tags</span>
                                    <span class="tag-bg f-s-13">Egyptian Natural Loofah for Bath</span>
                                    <span class="tag-bg f-s-13">Dish Washing</span>
                                    <span class="tag-bg f-s-13">Scrubber Sponge</span>
                                    <span class="tag-bg f-s-13">Towel</span>
                                    <span class="tag-bg f-s-13">Non-Woven Mop</span>
                                    <span class="tag-bg f-s-13">Broom</span>
                                    <span class="tag-bg f-s-13">Cotton Mop</span>
                                    <span class="tag-bg f-s-13">Shower Loofah</span>
                                    <span class="tag-bg f-s-13">Roll Non-Woven Towels</span>
                                    <span class="tag-bg f-s-13">Dishcloyh Sponge</span>
                                    <span class="tag-bg f-s-13">Non-Woven Towel</span>
                                </div>
                            </div>
                        </div>
                        <!-- Top Rated Product Widget -->

                        <div class="logo-catalog">
                            <div class="main-logo">
                                <img src="img/logo.png" alt="">
                            </div>
                            <ul class="cst-btn p-0">
                                <li class="special-link shinep-0">
                                    <a class="p-0" download="#">Download Katalog</a>
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
                var page = $(this).attr('href').split('page=')[1];
                fetchProducts(page);

            });
            // Event handler for search button click
            $('#searchButton').click(function(e) {
                e.preventDefault();
                var searchQuery = $('#search_name').val(); // Get the search query from the input field
                var searchCategory = $('#search_category')
            .val(); // Get the search query from the input field
                fetchProducts();

            });
            // Event handler for pressing Enter key
            $('#search_name').keypress(function(e) {
                if (e.which == 13) { // 13 is the Enter key code
                    e.preventDefault(); // Prevent default form submission behavior
                    var searchQuery = $('#search_name').val(); // Get the search query from the input field
                    var searchCategory = $('#search_category')
                .val(); // Get the search query from the input field
                    fetchProducts();
                }
            });

            // Initial fetch
            fetchProducts();



        });
        // Function to set the selected category ID
        function setCategoryId(categoryId) {
            $('#selectedCategoryId').val(categoryId);
            fetchProducts(1); // Fetch products for the first page when category changes
        }

        function fetchProducts(pageUrl = null) {
            var page = pageUrl ? pageUrl.split('page=')[1] : 1
            console.log("Fetching products for page: " + page);
            var searchQuery = $('#search_name').val(); // Get the search query from the input field
            var categoryId = $('#selectedCategoryId').val(); // Get the selected category ID
            var searchCategory = $('#search_category').val(); // Get the search query from the input field
            console.log("Received categoryId:", categoryId);
            $.ajax({
                url: "/products?page=" + page,
                data: {
                    search_name: searchQuery,
                    category_id: categoryId, // Pass the selected category ID as data
                    searchCategory: searchCategory
                },
                success: function(data) {
                    // console.log("Received data:", data);
                    $('#product-list').html(data.products);
                    $('#pagination-links').html(data.pagination);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching products:", error);
                }
            });
        }
    </script>
@endsection
