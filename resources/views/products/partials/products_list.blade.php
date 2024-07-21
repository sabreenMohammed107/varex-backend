<!-- resources/views/products/partials/products_list.blade.php -->
@php
    $locale = app()->getLocale();
@endphp

<div class="tab-content">
    <div class="tab-pane fade active show" id="liton_product_grid">
        <div class="ltn__product-tab-content-inner ltn__product-grid-view">
            <div class="row">
                @foreach($products as $product)
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">

                            <a href="{{ url('product/'.$product->slug[$locale]) }}" class="home-img">
                                <img src="{{ asset("$product->main_image") }}" alt="#" >
                            </a>
                        </div>
                        @if ($product->tag)
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge" style="background-color:{{ $product->tag->tag_color ?? '#e9184f' }}" >{{ $product->tag->title[$locale] ?? ''}}</li>
                                    @if ($locale == 'ar')
                                    <div class="badge-shape" style="border-left: 15px solid {{ $product->tag->tag_color ?? '#e9184f' }};"></div>

                                    @else
                                    <div class="badge-shape" style="border-left: 16px solid {{ $product->tag->tag_color ?? '#e9184f' }};"></div>

                                    @endif
                                </ul>
                            </div>
                        @endif
                        <div class="product-info">
                            <h2 class="product-title mx-2">
                                <a href="{{ url('product/'.$product->slug[$locale]) }}" class="f-s-18 text-in-dark">
                                    {!! $product->home_title[$locale] !!}
                                </a>
                            </h2>
                            <div class="product-price">
                                <span class="f-s-15 text-in-dark-light f-w-400"> {{ $product->category->name[$locale] ??
                                    ''}}</span>
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

                    <div class="ltn__product-item ltn__product-item-3 row">
                        <div class="product-img col-12 col-md-4">
                            <a href="{{ url('product/'.$product->slug[$locale]) }}" class="home-img">
                                <img src="{{ asset("$product->main_image") }}" alt="#">
                                @if ($product->tag)
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge" style="background-color:{{ $product->tag->tag_color ?? '#e9184f' }}" >{{ $product->tag->title[$locale] ?? ''}}</li>
                                            <div class="badge-shape" style="border-left: 16px solid {{ $product->tag->tag_color ?? '#e9184f' }};"></div>
                                        </ul>
                                    </div>
                                @endif
                            </a>


                        </div>
                        <div class="product-list-content row mt-3 col-12 col-md-8">
                            <div class="prod-list-left col-md-9">
                                <div class="product-info">
                                    <h2 class="product-title">
                                        <a href="{{ url('product/'.$product->slug[$locale]) }}" class="f-s-25 text-in-dark">
                                            {!! $product->home_title[$locale] !!}
                                        </a>
                                    </h2>
                                    <div class="product-price">
                                        <span class="f-s-15 text-in-dark-light f-w-400">{{
                                            $product->category->name[$locale] ?? ''}}</span>
                                    </div>
                                </div>
                                <div class="product-brief">
                                    <p class="f-clr-gry">{{ $product->description[$locale] }}</p>
                                </div>
                            </div>
                            <div
                                class="prod-list-right col-4 col-sm-3 d-flex flex-column justify-items-end justify-content-end">
                                <img src="{{ asset("$product->qr_image") }}" alt="" class="qr-code-img">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
