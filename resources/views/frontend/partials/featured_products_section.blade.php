<section class="pt-5 pb-4 bg-white">
    <div class="container">
        <div class="separator separator-alter mb-4">
            <span class="bg-white px-5 h4 fw-900">{{ translate('Featured Products') }}</span>
        </div>
        <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-infinite='true' data-autoplay="true">
            @foreach (filter_products(\App\Product::where('published', 1)->where('featured', '1'))->limit(12)->get() as $key => $product)
            <div class="carousel-box">
                <div class="aiz-card-box border border-alter border-width-2">
                    <div class="position-relative">
                        <a href="{{ route('product', $product->slug) }}" class="d-block">
                            <img
                                class="img-fit lazyload mx-auto h-140px h-md-210px"
                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                alt="{{  $product->getTranslation('name')  }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                            >
                        </a>
                        <div class="absolute-top-right aiz-p-hov-icon">
                            <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                                <i class="la la-heart-o"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
                                <i class="las la-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-md-3 p-2 text-center bg-alter">
                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 h-35px">
                            <a href="{{ route('product', $product->slug) }}" class="d-block text-reset">{{  $product->getTranslation('name')  }}</a>
                        </h3>
                        <div class="fs-15">
                            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
                            @endif
                            <span class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                        </div>

                        @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                            <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                {{ translate('Club Point') }}:
                                <span class="fw-700 float-right">{{ $product->earn_point }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="border-top border-light border-width-2">
                        <button type="button" onclick="showAddToCartModal({{ $product->id }})" class="btn btn-block bg-alter fw-700 rounded-0">
                            {{ translate('Add to Cart') }}
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('search') }}" class="btn btn-primary rounded-0 text-uppercase">{{ translate('View All') }}</a>
        </div>
    </div>
</section>
