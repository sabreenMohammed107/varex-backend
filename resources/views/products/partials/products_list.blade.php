

<!-- resources/views/products/partials/products_list.blade.php -->

<div class="tab-content">
    <div class="tab-pane fade active show" id="liton_product_grid">
        <div class="ltn__product-tab-content-inner ltn__product-grid-view">
            <div class="row">
                @foreach($products as $product)
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">

                            <a href="{{ url('product/'.$product->slug['en']) }}" class="home-img">
                                <img src="{{ asset("$product->main_image") }}" alt="#">
                            </a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">@if($product->best_selling == 1)Popular @endif</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <h2 class="product-title mx-2">
                                <a href="{{ url('product/'.$product->slug['en']) }}" class="f-s-18 text-in-dark">
                                    {!! $product->home_title['en'] !!}
                                </a>
                            </h2>
                            <div class="product-price">
                                <span class="f-s-15 text-in-dark-light f-w-400"> {{ $product->category->name['en'] ?? ''}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="liton_product_list">
        <div class="ltn__product-tab-content-inner ltn__product-list-view">
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-3">
                        <div class="product-img">
                            <a href="#" class="home-img">
                                <img src="{{ asset("$product->main_image") }}" alt="#">
                            </a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">@if($product->best_selling == 1)Popular @endif</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-list-content row mt-3">
                            <div class="prod-list-left col-md-9">
                                <div class="product-info">
                                    <h2 class="product-title">
                                        <a href="#" class="f-s-25 text-in-dark">
                                            {!! $product->home_title['en'] !!}
                                        </a>
                                    </h2>
                                    <div class="product-price">
                                        <span class="f-s-15 text-in-dark-light f-w-400">{{ $product->category->name['en'] ?? ''}}</span>
                                    </div>
                                </div>
                                <div class="product-brief">
                                    <p class="f-clr-gry">{{ $product->description['en'] }}</p>
                                </div>
                            </div>
                            <div class="prod-list-right col-md-3 d-flex flex-column justify-items-end justify-content-end">
                                <img src="img/product/qr/1.png" alt="" class="qr-code-img">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
