

<?php $__env->startSection('content'); ?>
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-start">
            <?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="aiz-user-panel">
                <div class="aiz-titlebar mt-2 mb-4">
                  <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="h3"><?php echo e(translate('Manage Profile')); ?></h1>
                    </div>
                  </div>
                </div>
                <form action="<?php echo e(route('seller.profile.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <!-- Basic Info-->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6"><?php echo e(translate('Basic Info')); ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label"><?php echo e(translate('Your Name')); ?></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="<?php echo e(translate('Your Name')); ?>" name="name" value="<?php echo e(Auth::user()->name); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label"><?php echo e(translate('Your Phone')); ?></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="<?php echo e(translate('Your Phone')); ?>" name="phone" value="<?php echo e(Auth::user()->phone); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label"><?php echo e(translate('Photo')); ?></label>
                                <div class="col-md-10">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                        </div>
                                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                        <input type="hidden" name="photo" value="<?php echo e(Auth::user()->avatar_original); ?>" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label"><?php echo e(translate('Your Password')); ?></label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" placeholder="<?php echo e(translate('New Password')); ?>" name="new_password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label"><?php echo e(translate('Confirm Password')); ?></label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" placeholder="<?php echo e(translate('Confirm Password')); ?>" name="confirm_password">
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Address -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6"><?php echo e(translate('Address')); ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row gutters-10">
                                <?php $__currentLoopData = Auth::user()->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-6">
                                        <div class="border p-3 pr-5 rounded mb-3 position-relative">
                                            <div>
                                                <span class="w-50 fw-600"><?php echo e(translate('Address')); ?>:</span>
                                                <span class="ml-2"><?php echo e($address->address); ?></span>
                                            </div>
                                            <div>
                                                <span class="w-50 fw-600"><?php echo e(translate('Postal Code')); ?>:</span>
                                                <span class="ml-2"><?php echo e($address->postal_code); ?></span>
                                            </div>
                                            <div>
                                                <span class="w-50 fw-600"><?php echo e(translate('City')); ?>:</span>
                                                <span class="ml-2"><?php echo e($address->city); ?></span>
                                            </div>
                                            <div>
                                                <span class="w-50 fw-600"><?php echo e(translate('Country')); ?>:</span>
                                                <span class="ml-2"><?php echo e($address->country); ?></span>
                                            </div>
                                            <div>
                                                <span class="w-50 fw-600"><?php echo e(translate('Phone')); ?>:</span>
                                                <span class="ml-2"><?php echo e($address->phone); ?></span>
                                            </div>
                                            <?php if($address->set_default): ?>
                                                <div class="position-absolute right-0 bottom-0 pr-2 pb-3">
                                                    <span class="badge badge-inline badge-primary"><?php echo e(translate('Default')); ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="dropdown position-absolute right-0 top-0">
                                                <button class="btn bg-gray px-2" type="button" data-toggle="dropdown">
                                                    <i class="la la-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <?php if(!$address->set_default): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('addresses.set_default', $address->id)); ?>"><?php echo e(translate('Make This Default')); ?></a>
                                                    <?php endif; ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('addresses.destroy', $address->id)); ?>"><?php echo e(translate('Delete')); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6 mx-auto" onclick="add_new_address()">
                                    <div class="border p-3 rounded mb-3 c-pointer text-center bg-light">
                                        <i class="la la-plus la-2x"></i>
                                        <div class="alpha-7"><?php echo e(translate('Add New Address')); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment System -->
                    <div class="card">
                      <div class="card-header">
                          <h5 class="mb-0 h6"><?php echo e(translate('Payment Setting')); ?></h5>
                      </div>
                      <div class="card-body">
                        <div class="row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Cash Payment')); ?></label>
                            <div class="col-md-9">
                                <label class="aiz-switch aiz-switch-success mb-3">
                                    <input value="1" name="cash_on_delivery_status" type="checkbox" <?php if(Auth::user()->seller->cash_on_delivery_status == 1): ?> checked <?php endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Bank Payment')); ?></label>
                            <div class="col-md-9">
                                <label class="aiz-switch aiz-switch-success mb-3">
                                    <input value="1" name="bank_payment_status" type="checkbox" <?php if(Auth::user()->seller->bank_payment_status == 1): ?> checked <?php endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Bank Name')); ?></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Bank Name')); ?>" value="<?php echo e(Auth::user()->seller->bank_name); ?>" name="bank_name">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Bank Account Name')); ?></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Bank Account Name')); ?>" value="<?php echo e(Auth::user()->seller->bank_acc_name); ?>" name="bank_acc_name">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Bank Account Number')); ?></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Bank Account Number')); ?>" value="<?php echo e(Auth::user()->seller->bank_acc_no); ?>" name="bank_acc_no">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Bank Routing Number')); ?></label>
                            <div class="col-md-9">
                                <input type="number" class="form-control mb-3" placeholder="<?php echo e(translate('Bank Routing Number')); ?>" value="<?php echo e(Auth::user()->seller->bank_routing_no); ?>" name="bank_routing_no">
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="form-group mb-0 text-right">
                      <button type="submit" class="btn btn-primary"><?php echo e(translate('Update Profile')); ?></button>
                  </div>
                </form>
                <br>

                <!-- Change Email -->
                <form action="<?php echo e(route('user.change.email')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                      <div class="card-header">
                          <h5 class="mb-0 h6"><?php echo e(translate('Change your email')); ?></h5>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-2">
                                  <label><?php echo e(translate('Your Email')); ?></label>
                              </div>
                              <div class="col-md-10">
                                  <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="<?php echo e(translate('Your Email')); ?>" name="email" value="<?php echo e(Auth::user()->email); ?>" />
                                    <div class="input-group-append">
                                       <button type="button" class="btn btn-outline-secondary new-email-verification">
                                           <span class="d-none loading">
                                               <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><?php echo e(translate('Sending Email...')); ?>

                                           </span>
                                           <span class="default"><?php echo e(translate('Verify')); ?></span>
                                       </button>
                                    </div>
                                  </div>
                                  <div class="form-group mb-0 text-right">
                                      <button type="submit" class="btn btn-primary"><?php echo e(translate('Update Email')); ?></button>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<div class="modal fade" id="new-address-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(translate('New Address')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-default" role="form" action="<?php echo e(route('addresses.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Address')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control mb-3" placeholder="<?php echo e(translate('Your Address')); ?>" rows="2" name="address" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Country')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control aiz-selectpicker" data-live-search="true" data-placeholder="<?php echo e(translate('Select your country')); ?>" name="country" required>
                                        <?php $__currentLoopData = \App\Country::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('City')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Your City')); ?>" name="city" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Postal code')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Your Postal Code')); ?>" name="postal_code" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Phone')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('+880')); ?>" name="phone" value="" required>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function add_new_address(){
            $('#new-address-modal').modal('show');
        }

        $('.new-email-verification').on('click', function() {
            $(this).find('.loading').removeClass('d-none');
            $(this).find('.default').addClass('d-none');
            var email = $("input[name=email]").val();

            $.post('<?php echo e(route('user.new.verify')); ?>', {_token:'<?php echo e(csrf_token()); ?>', email: email}, function(data){
                data = JSON.parse(data);
                $('.default').removeClass('d-none');
                $('.loading').addClass('d-none');
                if(data.status == 2)
                    AIZ.plugins.notify('warning', data.message);
                else if(data.status == 1)
                    AIZ.plugins.notify('success', data.message);
                else
                    AIZ.plugins.notify('danger', data.message);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shebaco1/public_html/resources/views/frontend/user/seller/profile.blade.php ENDPATH**/ ?>