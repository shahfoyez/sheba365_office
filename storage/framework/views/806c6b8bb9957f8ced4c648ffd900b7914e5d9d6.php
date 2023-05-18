

<?php $__env->startSection('meta_title'); ?><?php echo e($shop->meta_title); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?><?php echo e($shop->meta_description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($shop->meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($shop->meta_description); ?>">
    <meta itemprop="image" content="<?php echo e(uploaded_asset($shop->logo)); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="<?php echo e($shop->meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($shop->meta_description); ?>">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="<?php echo e(uploaded_asset($shop->meta_img)); ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($shop->meta_title); ?>" />
    <meta property="og:type" content="Shop" />
    <meta property="og:url" content="<?php echo e(route('shop.visit', $shop->slug)); ?>" />
    <meta property="og:image" content="<?php echo e(uploaded_asset($shop->logo)); ?>" />
    <meta property="og:description" content="<?php echo e($shop->meta_description); ?>" />
    <meta property="og:site_name" content="<?php echo e($shop->name); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php
        $total = 0;
        $rating = 0;
        foreach ($shop->user->products as $key => $seller_product) {
            $total += $seller_product->reviews->count();
            $rating += $seller_product->reviews->sum('rating');
        }
    ?>

    <section class="py-5 mb-4 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="d-flex justify-content-center">
                        <img
                            height="70"
                            class="lazyload"
                            src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                            data-src="<?php if($shop->logo !== null): ?> <?php echo e(uploaded_asset($shop->logo)); ?> <?php else: ?> <?php echo e(static_asset('assets/img/placeholder.jpg')); ?> <?php endif; ?>"
                            alt="<?php echo e($shop->name); ?>"
                        >
                        <div class="pl-4">
                            <h1 class="fw-600 h4 mb-0"><?php echo e($shop->name); ?>

                                <?php if($shop->user->seller->verification_status == 1): ?>
                                    <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
                                <?php else: ?>
                                    <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span>
                                <?php endif; ?>
                            </h1>
                            <div class="rating rating-sm mb-1">
                                <?php if($total > 0): ?>
                                    <?php echo e(renderStarRating($rating/$total)); ?>

                                <?php else: ?>
                                    <?php echo e(renderStarRating(0)); ?>

                                <?php endif; ?>
                            </div>
                            <div class="location opacity-60"><?php echo e($shop->address); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-4">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-md-8 mx-auto">
                    <div class="bg-white rounded shadow-sm p-4 text-center">
                        <h3 class="fw-600 h4">
                            <?php echo e($seller->user->name); ?> <?php echo e(translate('has not been verified yet.')); ?>

                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shebaco1/public_html/resources/views/frontend/seller_shop_without_verification.blade.php ENDPATH**/ ?>