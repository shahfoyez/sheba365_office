<?php if(get_setting('vendor_system_activation') == 1): ?>
    <section class="bg-white pt-5 pb-4">
        <div class="container">
            <div class="separator separator-alter mb-4">
                <span class="bg-white px-5 h4 fw-900"><?php echo e(translate('Featured Shops')); ?></span>
            </div>
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="3" data-lg-items="3"  data-md-items="2" data-sm-items="2" data-xs-items="1" data-rows="2" data-autoplay="true">
                <?php $__currentLoopData = json_decode(get_setting('featured_shops')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $shop = \App\Shop::find($value);
                    $total = 0;
                    $rating = 0;
                    foreach ($shop->user->products as $key => $seller_product) {
                        $total += $seller_product->reviews->count();
                        $rating += $seller_product->reviews->sum('rating');
                    }
                ?>
                <?php if($shop != null): ?>
                    <div class="carousel-box">
                        <div class="row no-gutters box-3 align-items-center bg-alter-3 my-2 has-transition p-2">
                            <div class="col-auto">
                                <a href="<?php echo e(route('shop.visit', $shop->slug)); ?>" class="d-block p-3 size-110px bg-white">
                                    <img
                                        src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                        data-src="<?php if($shop->logo !== null): ?> <?php echo e(uploaded_asset($shop->logo)); ?> <?php else: ?> <?php echo e(static_asset('assets/img/placeholder.jpg')); ?> <?php endif; ?>"
                                        alt="<?php echo e($shop->name); ?>"
                                        class="img-fluid lazyload"
                                    >
                                </a>
                            </div>
                            <div class="col">
                                <div class="px-3 text-left">
                                    <h2 class="h6 fw-600 text-truncate">
                                        <a href="<?php echo e(route('shop.visit', $shop->slug)); ?>" class="text-reset"><?php echo e($shop->name); ?></a>
                                    </h2>
                                    <div class="rating rating-sm mb-2">
                                        <?php if($total > 0): ?>
                                            <?php echo e(renderStarRating($rating/$total)); ?>

                                        <?php else: ?>
                                            <?php echo e(renderStarRating(0)); ?>

                                        <?php endif; ?>
                                    </div>
                                    <a href="<?php echo e(route('shop.visit', $shop->slug)); ?>" class="btn btn-primary btn-sm rounded-0 text-uppercase fs-12">
                                        <?php echo e(translate('Visit Store')); ?> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /home/shebaco1/public_html/resources/views/frontend/partials/best_sellers_section.blade.php ENDPATH**/ ?>