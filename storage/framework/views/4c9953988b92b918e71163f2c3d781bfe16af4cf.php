<div class="container">
    <div class="row">
        <div class="col-xxl-8 col-xl-10 mx-auto">
            <div class="shadow-sm bg-white p-3 p-lg-4 rounded">
                <div class="mb-4">
                    <div class="row gutters-5 d-none d-md-flex border-bottom mb-3 pb-3">
                        <div class="col-md-5 fw-600"><?php echo e(translate('Product')); ?></div>
                        <div class="col fw-600"><?php echo e(translate('Price')); ?></div>
                        <div class="col fw-600"><?php echo e(translate('Tax')); ?></div>
                        <div class="col fw-600"><?php echo e(translate('Quantity')); ?></div>
                        <div class="col fw-600"><?php echo e(translate('Total')); ?></div>
                        <div class="col-auto fw-600"><?php echo e(translate('Remove')); ?></div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php
                        $total = 0;
                        ?>
                        <?php $__currentLoopData = Session::get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $product = \App\Product::find($cartItem['id']);
                            $total = $total + $cartItem['price']*$cartItem['quantity'];
                            $product_name_with_choice = $product->getTranslation('name');
                            if ($cartItem['variant'] != null) {
                                $product_name_with_choice = $product->getTranslation('name').' - '.$cartItem['variant'];
                            }
                            ?>
                            <li class="list-group-item px-0 px-lg-3">
                                <div class="row gutters-5">
                                    <div class="col-lg-5 d-flex">
                                        <span class="mr-2">
                                            <img
                                                src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"
                                                class="img-fit size-60px rounded"
                                                alt="<?php echo e($product->getTranslation('name')); ?>"
                                            >
                                        </span>
                                        <span class="fs-14 opacity-60"><?php echo e($product_name_with_choice); ?></span>
                                    </div>

                                    <div class="col-lg col-4 order-1 order-lg-0 my-3 my-lg-0">
                                        <span class="opacity-60 fs-12 d-block d-lg-none"><?php echo e(translate('Price')); ?></span>
                                        <span class="fw-600 fs-16"><?php echo e(single_price($cartItem['price'])); ?></span>
                                    </div>
                                    <div class="col-lg col-4 order-2 order-lg-0 my-3 my-lg-0">
                                        <span class="opacity-60 fs-12 d-block d-lg-none"><?php echo e(translate('Tax')); ?></span>
                                        <span class="fw-600 fs-16"><?php echo e(single_price($cartItem['tax'])); ?></span>
                                    </div>

                                    <div class="col-lg col-6 order-4 order-lg-0">
                                        <?php if($cartItem['digital'] != 1): ?>
                                            <div class="row no-gutters align-items-center aiz-plus-minus mr-3">
                                                <button class="btn col-auto btn-icon btn-sm btn-circle btn-light" type="button" data-type="minus" data-field="quantity[<?php echo e($key); ?>]">
                                                    <i class="las la-minus"></i>
                                                </button>
                                                <input type="text" name="quantity[<?php echo e($key); ?>]" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="<?php echo e($cartItem['quantity']); ?>" min="1" max="10" readonly onchange="updateQuantity(<?php echo e($key); ?>, this)">
                                                <button class="btn col-auto btn-icon btn-sm btn-circle btn-light" type="button" data-type="plus" data-field="quantity[<?php echo e($key); ?>]">
                                                    <i class="las la-plus"></i>
                                                </button>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg col-4 order-3 order-lg-0 my-3 my-lg-0">
                                        <span class="opacity-60 fs-12 d-block d-lg-none"><?php echo e(translate('Total')); ?></span>
                                        <span class="fw-600 fs-16 text-primary"><?php echo e(single_price(($cartItem['price']+$cartItem['tax'])*$cartItem['quantity'])); ?></span>
                                    </div>
                                    <div class="col-lg-auto col-6 order-5 order-lg-0 text-right">
                                        <a href="javascript:void(0)" onclick="removeFromCartView(event, <?php echo e($key); ?>)" class="btn btn-icon btn-sm btn-soft-primary btn-circle">
                                            <i class="las la-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <div class="px-3 py-2 mb-4 border-top d-flex justify-content-between">
                    <span class="opacity-60 fs-15"><?php echo e(translate('Subtotal')); ?></span>
                    <span class="fw-600 fs-17"><?php echo e(single_price($total)); ?></span>
                </div>

                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-left order-1 order-md-0">
                        <a href="<?php echo e(route('home')); ?>" class="btn btn-link">
                            <i class="las la-arrow-left"></i>
                            <?php echo e(translate('Return to shop')); ?>

                        </a>
                    </div>
                    <div class="col-md-6 text-center text-md-right">
                        <?php if(Auth::check()): ?>
                            <a href="<?php echo e(route('checkout.shipping_info')); ?>" class="btn btn-primary fw-600"><?php echo e(translate('Continue to Shipping')); ?></a>
                        <?php else: ?>
                            <button class="btn btn-primary fw-600" onclick="showCheckoutModal()"><?php echo e(translate('Continue to Shipping')); ?></button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    AIZ.extra.plusMinus();
</script>
<?php /**PATH /home/shebaco1/public_html/resources/views/frontend/partials/cart_details.blade.php ENDPATH**/ ?>