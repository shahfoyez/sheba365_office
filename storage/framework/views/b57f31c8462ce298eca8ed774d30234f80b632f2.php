<?php $home_categories = json_decode(get_setting('home_categories')); ?>
<?php $__currentLoopData = $home_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $category = \App\Category::find($value); ?>
    <section class="pt-5 bg-white">
        <div class="container">
            <div class="separator separator-alter mb-4">
                <span class="bg-white px-5 h4 fw-900"><?php echo e($category->getTranslation('name')); ?></span>
            </div>
            <div class="aiz-carousel gutters-5 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-infinite='true' data-autoplay="true">
                <?php $__currentLoopData = get_cached_products($category->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-box">
                        <div class="aiz-card-box border border-alter border-width-2">
                            <div class="position-relative bg-alter-3">
                                <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block">
                                    <img
                                        class="img-fit lazyload mx-auto h-140px h-md-210px h-xl-220px"
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
                <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="btn btn-primary rounded-0 text-uppercase"><?php echo e(translate('View All')); ?></a>
            </div>
        </div>
    </section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\SHEBA_FINAL\resources\views/frontend/partials/home_categories_section.blade.php ENDPATH**/ ?>