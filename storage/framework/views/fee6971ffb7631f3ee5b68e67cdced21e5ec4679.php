

<?php $__env->startSection('content'); ?>
    
    <?php if(get_setting('home_slider_images') != null): ?>
    <div class="home-banner-area">
        <?php $slider_images = json_decode(get_setting('home_slider_images'), true);  ?>
        <div class="aiz-carousel dots-inside-bottom dot-small-white" data-dots="true" data-infinite="true" data-autoplay='true'>
            <?php $__currentLoopData = $slider_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="position-relative">
                <img
                    class="d-block mw-100 lazyload img-fit rounded shadow-sm absolute-full"
                    src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                    data-src="<?php echo e(uploaded_asset(json_decode(get_setting('home_slider_background'), true)[$key])); ?>"
                    alt="<?php echo e(env('APP_NAME')); ?> promo"
                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';"
                >

                <div class="container position-relative z-1 py-4 py-md-5 text-white">
                    <div class="row align-items-center">
                        <div class="col-lg-6 text-center text-lg-left pb-3 pb-lg-0">
                            <p class="text-uppercase mb-2"><?php echo e(json_decode(get_setting('home_slider_subtitle'), true)[$key]); ?></p>
                            <h2 class="mb-4 fw-900 h1"><?php echo json_decode(get_setting('home_slider_title'), true)[$key] ?></h2>
                            <a href="<?php echo e(json_decode(get_setting('home_slider_links'), true)[$key]); ?>" class="btn bg-alter rounded-0 text-uppercase"><?php echo e(translate('View Products')); ?></a>
                        </div>
                        <div class="col-lg-6 text-center">
                            <div class="px-4 px-md-0">
                                <img src="<?php echo e(uploaded_asset($slider_images[$key])); ?>" class="img-fluid mx-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>
    
  
    <!-- <section class="bg-alter-3 py-4">
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light text-center">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse font-weight-bold" id="navbarNav">
        
    <ul class="navbar-nav text-center" style="font-weight: bolder; color: #ff330d!important">
      <li class="nav-item mr-3">
        <a class="nav-link" href="#" style="font-weight: bolder; color: #ff330d!important">FLIGHT</a>
      </li>
      <li class="nav-item mr-3">
        <a class="nav-link" href="#" style="font-weight: bolder; color: #ff330d!important">HOTEL</a>
      </li>
      <li class="nav-item mr-3">
        <a class="nav-link" href="#" style="font-weight: bolder; color: #ff330d!important">TRAIN</a>
      </li>

      <li class="nav-item mr-3">
        <a class="nav-link" href="#" style="font-weight: bolder; color: #ff330d!important">TOUR</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" style="font-weight: bolder; color: #ff330d!important">VISA</a>
      </li>
    </ul>
            
  </div>
</nav>
</div>
</section> -->

<div class="d-flex align-items-center pt-3 pb-3">
    <div class="mx-auto">
            <ul class="mb-0 list-inline">
                <li class="list-inline-item">
                    <a class="text-reset fw-600 text-uppercase px-3 py-2" href="https://travel.sheba365.com.bd/">FLIGHT</a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset fw-600 text-uppercase px-3 py-2" href="#">HOTEL</a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset fw-600 text-uppercase px-3 py-2" href="#">TRAIN</a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset fw-600 text-uppercase px-3 py-2" href="#">TOUR</a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset fw-600 text-uppercase px-3 py-2" href="#">VISA</a>
                </li>
        </ul>
    </div>
</div>







    <?php
        $featured_categories = \App\Category::where('featured', 1)->get();
    ?>
    <?php if(count($featured_categories) > 0): ?>
    <section class="bg-alter-3 py-5">
        <div class="container">
            <div class="row gutters-5">
                <?php $__currentLoopData = $featured_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-md-6">
                    <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="bg-white border d-block text-reset rounded p-2 shadow-sm mb-2">
                        <div class="row align-items-center no-gutters">
                            <div class="col-3 text-center">
                                <img
                                    src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                    data-src="<?php echo e(uploaded_asset($category->banner)); ?>"
                                    alt="<?php echo e($category->getTranslation('name')); ?>"
                                    class="img-fluid img lazyload h-60px"
                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';"
                                >
                            </div>
                            <div class="col-7">
                                <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left"><?php echo e($category->getTranslation('name')); ?></div>
                            </div>
                            <div class="col-2 text-center">
                                <i class="la la-angle-right text-primary"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-md-6">
                    <a href="<?php echo e(route('categories.all')); ?>" class="bg-dark border d-block text-white rounded p-2 shadow-sm mb-2">
                        <div class="row align-items-center no-gutters">
                            <div class="col-3 text-center">
                                <img
                                    src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                    data-src="<?php echo e(static_asset('assets/img/all_categories.png')); ?>"
                                    alt="<?php echo e($category->getTranslation('name')); ?>"
                                    class="img-fluid img lazyload h-60px py-10px"
                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';"
                                >
                            </div>
                            <div class="col-7">
                                <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left"><?php echo e(translate('Browse All Categories')); ?></div>
                            </div>
                            <div class="col-2 text-center">
                                <i class="la la-angle-right text-white"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <section class="bg-white pt-6">
        <div class="container">
            <div class="border border-alter px-4 pb-4">
                <div class="text-center mb-4">
                    <div class="d-inline-block w-300px">
                        <img class="bg-white px-4 mb-3 mt-n4" src="<?php echo e(uploaded_asset(get_setting('falaaq_store_logo'))); ?>">
                        <p class="fs-15"><?php echo e(get_setting('falaaq_store_text')); ?></p>
                    </div>
                </div>
                <div class="aiz-carousel gutters-5 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-infinite='true' data-autoplay="true">
                    <?php $__currentLoopData = filter_products(\App\Product::where('published', 1)->orderBy('num_of_sale', 'desc'))->limit(12)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-box">
                            <div class="aiz-card-box border border-alter border-width-2">
                                <div class="position-relative">
                                    <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block">
                                        <img
                                            class="img-fit lazyload mx-auto h-140px h-md-210px"
                                            src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                            data-src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"
                                            alt="<?php echo e($product->getTranslation('name')); ?>"
                                            onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';"
                                        >
                                    </a>
                                    <div class="absolute-top-right aiz-p-hov-icon">
                                        <a href="javascript:void(0)" onclick="addToWishList(<?php echo e($product->id); ?>)" data-toggle="tooltip" data-title="<?php echo e(translate('Add to wishlist')); ?>" data-placement="left">
                                            <i class="la la-heart-o"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="showAddToCartModal(<?php echo e($product->id); ?>)" data-toggle="tooltip" data-title="<?php echo e(translate('Add to cart')); ?>" data-placement="left">
                                            <i class="las la-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="p-md-3 p-2 text-center bg-alter">
                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 h-35px">
                                        <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block text-reset"><?php echo e($product->getTranslation('name')); ?></a>
                                    </h3>
                                    <div class="fs-15">
                                        <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                            <del class="fw-600 opacity-50 mr-1"><?php echo e(home_base_price($product->id)); ?></del>
                                        <?php endif; ?>
                                        <span class="fw-700 text-primary"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                    </div>

                                    <?php if(\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated): ?>
                                        <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                            <?php echo e(translate('Club Point')); ?>:
                                            <span class="fw-700 float-right"><?php echo e($product->earn_point); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="border-top border-light border-width-2">
                                    <button type="button" onclick="showAddToCartModal(<?php echo e($product->id); ?>)" class="btn btn-block bg-alter fw-700 rounded-0">
                                        <?php echo e(translate('Add to Cart')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="text-center mt-4">
                    <a href="<?php echo e(route('search')); ?>" class="btn btn-primary rounded-0 text-uppercase"><?php echo e(translate('View All')); ?></a>
                </div>
            </div>
        </div>
    </section>

    
    <?php
        $flash_deal = \App\FlashDeal::where('status', 1)->where('featured', 1)->first();
    ?>
    <?php if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date): ?>
    <section class="pt-4 bg-white">
        <div class="container">
            <div class="separator separator-alter mb-4">
                <span class="bg-white px-5 text-center d-inline-block">
                    <span class="h4 fw-900"><?php echo e(translate('Flash Sale')); ?></span>
                    <div class="aiz-count-down align-items-center justify-content-center mt-3" data-date="<?php echo e(date('Y/m/d H:i:s', $flash_deal->end_date)); ?>"></div>
                </span>
            </div>
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-infinite='true' data-autoplay="true">
                <?php $__currentLoopData = $flash_deal->flash_deal_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flash_deal_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $product = \App\Product::find($flash_deal_product->product_id);
                    ?>
                    <?php if($product != null && $product->published != 0): ?>
                        <div class="carousel-box">
                            <div class="aiz-card-box border border-alter border-width-2">
                                <div class="position-relative">
                                    <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block">
                                        <img
                                            class="img-fit lazyload mx-auto h-140px h-md-210px"
                                            src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                            data-src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"
                                            alt="<?php echo e($product->getTranslation('name')); ?>"
                                            onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';"
                                        >
                                    </a>
                                    <div class="absolute-top-right aiz-p-hov-icon">
                                        <a href="javascript:void(0)" onclick="addToWishList(<?php echo e($product->id); ?>)" data-toggle="tooltip" data-title="<?php echo e(translate('Add to wishlist')); ?>" data-placement="left">
                                            <i class="la la-heart-o"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="showAddToCartModal(<?php echo e($product->id); ?>)" data-toggle="tooltip" data-title="<?php echo e(translate('Add to cart')); ?>" data-placement="left">
                                            <i class="las la-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="p-md-3 p-2 text-center bg-alter">
                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 h-35px">
                                        <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block text-reset"><?php echo e($product->getTranslation('name')); ?></a>
                                    </h3>
                                    <div class="fs-15">
                                        <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                            <del class="fw-600 opacity-50 mr-1"><?php echo e(home_base_price($product->id)); ?></del>
                                        <?php endif; ?>
                                        <span class="fw-700 text-primary"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                    </div>
                                    <?php if(\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated): ?>
                                        <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                            <?php echo e(translate('Club Point')); ?>:
                                            <span class="fw-700 float-right"><?php echo e($product->earn_point); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="border-top border-light border-width-2">
                                    <button type="button" onclick="showAddToCartModal(<?php echo e($product->id); ?>)" class="btn btn-block bg-alter fw-700 rounded-0">
                                        <?php echo e(translate('Add to Cart')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="text-center mt-4">
                <a href="<?php echo e(route('flash-deal-details', $flash_deal->slug)); ?>" class="btn btn-primary rounded-0 text-uppercase"><?php echo e(translate('View All')); ?></a>
            </div>
        </div>
    </section>
    <?php endif; ?>

    
    <div class="bg-white pt-5">
        <div class="container">
            <div class="row gutters-10">
                <?php if(get_setting('home_banner1_images') != null): ?>
                    <?php $banner_1_imags = json_decode(get_setting('home_banner1_images')); ?>
                    <?php $__currentLoopData = $banner_1_imags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl col-md-6">
                            <div class="mb-3 mb-lg-0">
                                <a href="<?php echo e(json_decode(get_setting('home_banner1_links'), true)[$key]); ?>" class="d-block text-reset">
                                    <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>" data-src="<?php echo e(uploaded_asset($banner_1_imags[$key])); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo" class="img-fluid lazyload w-100">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div id="section_featured">

    </div>

    <section class="bg-white py-6 bg-center bg-cover" style="background-image: url('<?php echo e(uploaded_asset(get_setting('big_banner_bg'))); ?>')">
        <div class="container">
            <img src="<?php echo e(uploaded_asset(get_setting('big_banner_logo'))); ?>">
            <div class="mt-3">
                <a href="<?php echo e(get_setting('big_banner_link')); ?>" class="btn text-uppercase rounded-0 bg-alter-4 text-white"><?php echo e(translate('View Product')); ?></a>
            </div>
        </div>
    </section>

    
    <div id="section_home_categories">

    </div>

    
    <?php if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1): ?>
        <?php
            $customer_products = \App\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
        ?>
           <?php if(count($customer_products) > 0): ?>
               <section class="pt-5 bg-white">
                   <div class="container">
                        <div class="separator separator-alter mb-4">
                            <span class="bg-white px-5 h4 fw-900"><?php echo e(translate('Classified Ads')); ?></span>
                        </div>
                        <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true' data-autoplay="true">
                           <?php $__currentLoopData = $customer_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <div class="carousel-box">
                                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                        <div class="position-relative">
                                            <a href="<?php echo e(route('customer.product', $customer_product->slug)); ?>" class="d-block">
                                                <img
                                                    class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                    src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                                    data-src="<?php echo e(uploaded_asset($customer_product->thumbnail_img)); ?>"
                                                    alt="<?php echo e($customer_product->getTranslation('name')); ?>"
                                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';"
                                                >
                                            </a>
                                            <div class="absolute-top-left pt-2 pl-2">
                                                <?php if($customer_product->conditon == 'new'): ?>
                                                   <span class="badge badge-inline badge-success"><?php echo e(translate('new')); ?></span>
                                                <?php elseif($customer_product->conditon == 'used'): ?>
                                                   <span class="badge badge-inline badge-danger"><?php echo e(translate('Used')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="p-md-3 p-2 text-left">
                                            <div class="fs-15 mb-1">
                                                <span class="fw-700 text-primary"><?php echo e(single_price($customer_product->unit_price)); ?></span>
                                            </div>
                                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                <a href="<?php echo e(route('customer.product', $customer_product->slug)); ?>" class="d-block text-reset"><?php echo e($customer_product->getTranslation('name')); ?></a>
                                            </h3>
                                        </div>
                                   </div>
                               </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="text-center mt-4">
                            <a href="<?php echo e(route('customer.products')); ?>" class="btn btn-primary rounded-0 text-uppercase"><?php echo e(translate('View All')); ?></a>
                        </div>
                   </div>
               </section>
           <?php endif; ?>
       <?php endif; ?>

    
    <div class="pt-5 bg-white">
        <div class="container">
            <div class="row gutters-10">
                <?php if(get_setting('home_banner2_images') != null): ?>
                    <?php $banner_2_imags = json_decode(get_setting('home_banner2_images')); ?>
                    <?php $__currentLoopData = $banner_2_imags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl col-md-6">
                            <div class="mb-3 mb-lg-0">
                                <a href="<?php echo e(json_decode(get_setting('home_banner2_links'), true)[$key]); ?>" class="d-block text-reset">
                                    <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>" data-src="<?php echo e(uploaded_asset($banner_2_imags[$key])); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo" class="img-fluid lazyload  w-100">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <?php if(\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
    <div id="section_best_sellers">

    </div>
    <?php endif; ?>

    
    <section class="py-6 bg-cover bg-center" style="background-image: url('<?php echo e(uploaded_asset(get_setting('shop_by_brands_bg'))); ?>');">
        <div class="container">
            <div class="separator separator-white mb-5">
                <span class="bg-alter px-5 h4 fw-900"><?php echo e(translate('Shop By Brands')); ?></span>
            </div>
            <div class="aiz-carousel gutters-5 half-outside-arrow dot-small-black" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-dots='true' data-autoplay="true">
                <?php $top10_brands = json_decode(get_setting('top10_brands')); ?>
                <?php $__currentLoopData = $top10_brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $brand = \App\Brand::find($value); ?>
                <?php if($brand != null): ?>
                <div class="carousel-box">
                    <div class="bg-white border border-light rounded hov-shadow-md my-2 p-3 has-transition">
                        <img
                            src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                            data-src="<?php echo e(uploaded_asset($brand->logo)); ?>"
                            alt="<?php echo e($brand->getTranslation('name')); ?>"
                            class="img-fluid img lazyload h-60px mx-auto"
                            onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';"
                        >
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $.post('<?php echo e(route('home.section.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('<?php echo e(route('home.section.best_selling')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('<?php echo e(route('home.section.home_categories')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });

            <?php if(\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
            $.post('<?php echo e(route('home.section.best_sellers')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
            });
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shebaco1/public_html/resources/views/frontend/index.blade.php ENDPATH**/ ?>