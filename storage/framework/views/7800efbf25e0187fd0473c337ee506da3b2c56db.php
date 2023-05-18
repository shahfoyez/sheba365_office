

<?php $__env->startSection('content'); ?>
<section class="py-8 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto text-center">
                <h1 class="mb-0 fw-700"><?php echo e(translate('Premium Packages for Customers')); ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="py-4 py-lg-5">
    <div class="container">
        <div class="row row-cols-xxl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 gutters-10 justify-content-center">
            <?php $__currentLoopData = $customer_packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer_package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="text-center mb-4 mt-3">
                                <img class="mw-100 mx-auto mb-4" src="<?php echo e(uploaded_asset($customer_package->logo)); ?>" height="100">
                                <h5 class="mb-3 h5 fw-600"><?php echo e($customer_package->getTranslation('name')); ?></h5>
                            </div>
                            <ul class="list-group list-group-raw fs-20 mb-5">
                                <li class="list-group-item py-2">
                                    <i class="las la-check text-success mr-2"></i>
                                    <?php echo e($customer_package->product_upload); ?> <?php echo e(translate('Product Upload')); ?>

                                </li>
                            </ul>

                            <div class="mb-5 d-flex align-items-center justify-content-center">
                                <?php if($customer_package->amount == 0): ?>
                                    <span class="display-4 fw-600 lh-1 mb-0"><?php echo e(translate('Free')); ?></span>
                                <?php else: ?>
                                    <span class="display-4 fw-600 lh-1 mb-0"><?php echo e(single_price($customer_package->amount)); ?></span>
                                <?php endif; ?>

                            </div>
                            <div class="text-center">
                                <?php if($customer_package->amount == 0): ?>
                                    <button class="btn btn-primary" onclick="get_free_package(<?php echo e($customer_package->id); ?>)"><?php echo e(translate('Free Package')); ?></button>
                                <?php else: ?>
                                    <?php if(\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated ): ?>
                                        <button class="btn btn-primary" onclick="select_payment_type(<?php echo e($customer_package->id); ?>)"><?php echo e(translate('Purchase Package')); ?></button>
                                    <?php else: ?>
                                        <button class="btn btn-primary" onclick="show_price_modal(<?php echo e($customer_package->id); ?>)"><?php echo e(translate('Purchase Package')); ?></button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>

    <!-- Select Payment Type Modal -->
    <div class="modal fade" id="select_payment_type_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(translate('Select Payment Type')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="package_id" name="package_id" value="">
                    <div class="row">
                        <div class="col-md-2">
                            <label><?php echo e(translate('Payment Type')); ?></label>
                        </div>
                        <div class="col-md-10">
                            <div class="mb-3">
                                <select class="form-control aiz-selectpicker" onchange="payment_type(this.value)"
                                        data-minimum-results-for-search="Infinity">
                                    <option value=""><?php echo e(translate('Select One')); ?></option>
                                    <option value="online"><?php echo e(translate('Online payment')); ?></option>
                                    <option value="offline"><?php echo e(translate('Offline payment')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-primary transition-3d-hover mr-1" id="select_type_cancel" data-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Online payment Modal -->
    <div class="modal fade" id="price_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(translate('Purchase Your Package')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="" id="package_payment_form" action="<?php echo e(route('customer_packages.purchase')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="customer_package_id" value="">
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Payment Method')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control selectpicker" data-live-search="true" name="payment_option">
                                        <?php if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1): ?>
                                            <option value="paypal"><?php echo e(translate('Paypal')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1): ?>
                                            <option value="stripe"><?php echo e(translate('Stripe')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1): ?>
                                            <option value="sslcommerz"><?php echo e(translate('sslcommerz')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1): ?>
                                            <option value="instamojo"><?php echo e(translate('Instamojo')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1): ?>
                                            <option value="razorpay"><?php echo e(translate('RazorPay')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1): ?>
                                            <option value="paystack"><?php echo e(translate('PayStack')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1): ?>
                                            <option value="voguepay"><?php echo e(translate('Voguepay')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'payhere')->first()->value == 1): ?>
                                            <option value="payhere"><?php echo e(translate('Payhere')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'ngenius')->first()->value == 1): ?>
                                            <option value="ngenius"><?php echo e(translate('Ngenius')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'iyzico')->first()->value == 1): ?>
                                            <option value="iyzico"><?php echo e(translate('Iyzico')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\Addon::where('unique_identifier', 'african_pg')->first() != null && \App\Addon::where('unique_identifier', 'african_pg')->first()->activated): ?>
                                            <?php if(\App\BusinessSetting::where('type', 'mpesa')->first()->value == 1): ?>
                                                <option value="mpesa"><?php echo e(translate('Mpesa')); ?></option>
                                            <?php endif; ?>
                                            <?php if(\App\BusinessSetting::where('type', 'flutterwave')->first()->value == 1): ?>
                                                <option value="flutterwave"><?php echo e(translate('Flutterwave')); ?></option>
                                            <?php endif; ?>
                                            <?php if(\App\BusinessSetting::where('type', 'payfast')->first()->value == 1): ?>
                                              <option value="payfast"><?php echo e(translate('PayFast')); ?></option>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="button" class="btn btn-sm btn-secondary transition-3d-hover mr-1" data-dismiss="modal"><?php echo e(translate('cancel')); ?></button>
                            <button type="submit" class="btn btn-sm btn-primary transition-3d-hover mr-1"><?php echo e(translate('Confirm')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- offline payment Modal -->
    <div class="modal fade" id="offline_customer_package_purchase_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(translate('Offline Package Purchase ')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="offline_customer_package_purchase_modal_body"></div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        function select_payment_type(id) {
            $('input[name=package_id]').val(id);
            $('#select_payment_type_modal').modal('show');
        }

        function payment_type(type) {
            var package_id = $('#package_id').val();
            if (type == 'online') {
                $("#select_type_cancel").click();
                show_price_modal(package_id);
            } else if (type == 'offline') {
                $("#select_type_cancel").click();
                $.post('<?php echo e(route('offline_customer_package_purchase_modal')); ?>', {
                    _token: '<?php echo e(csrf_token()); ?>',
                    package_id: package_id
                }, function (data) {
                    $('#offline_customer_package_purchase_modal_body').html(data);
                    $('#offline_customer_package_purchase_modal').modal('show');
                });
            }
        }

        function show_price_modal(id) {
            $('input[name=customer_package_id]').val(id);
            $('#price_modal').modal('show');
        }


        function get_free_package(id) {
            $('input[name=customer_package_id]').val(id);
            $('#package_payment_form').submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shebaco1/public_html/resources/views/frontend/user/customer_packages_lists.blade.php ENDPATH**/ ?>