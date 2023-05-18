

<?php $__env->startSection('content'); ?>

    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-start">
                <?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="aiz-user-panel">

                    <div class="aiz-titlebar mt-2 mb-4">
                      <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1 class="h3"><?php echo e(translate('Shop Settings')); ?>

                                <a href="<?php echo e(route('shop.visit', $shop->slug)); ?>" class="btn btn-link btn-sm" target="_blank">(<?php echo e(translate('Visit Shop')); ?>)<i class="la la-external-link"></i>)</a>
                            </h1>
                        </div>
                      </div>
                    </div>

                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6"><?php echo e(translate('Basic Info')); ?></h5>
                        </div>
                        <div class="card-body">
                            <form class="" action="<?php echo e(route('shops.update', $shop->id)); ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PATCH">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <label class="col-md-2 col-form-label"><?php echo e(translate('Shop Name')); ?><span class="text-danger text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Shop Name')); ?>" name="name" value="<?php echo e($shop->name); ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-2 col-form-label"><?php echo e(translate('Shop Logo')); ?></label>
                                    <div class="col-md-10">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                            </div>
                                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                            <input type="hidden" name="logo" value="<?php echo e($shop->logo); ?>" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 col-form-label"><?php echo e(translate('Shop Address')); ?> <span class="text-danger text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Address')); ?>" name="address" value="<?php echo e($shop->address); ?>" required>
                                    </div>
                                </div>
                                <?php if(\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'seller_wise_shipping'): ?>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(translate('Shipping Cost')); ?> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="number" min="0" class="form-control mb-3" placeholder="<?php echo e(translate('Shipping Cost')); ?>" name="shipping_cost" value="<?php echo e($shop->shipping_cost); ?>" required>
                                        </div>
                                    </div>
                                <?php endif; ?> 
                                <?php if(\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1): ?>
                                <div class="row mb-3">
                                    <label class="col-md-2 col-form-label"><?php echo e(translate('Pickup Points')); ?></label>
                                    <div class="col-md-10">
                                        <select class="form-control aiz-selectpicker" data-placeholder="<?php echo e(translate('Select Pickup Point')); ?>" id="pick_up_point" name="pick_up_point_id[]" multiple>
                                            <?php $__currentLoopData = \App\PickupPoint::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pick_up_point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(Auth::user()->shop->pick_up_point_id != null): ?>
                                                    <option value="<?php echo e($pick_up_point->id); ?>" <?php if(in_array($pick_up_point->id, json_decode(Auth::user()->shop->pick_up_point_id))): ?> selected <?php endif; ?>><?php echo e($pick_up_point->getTranslation('name')); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($pick_up_point->id); ?>"><?php echo e($pick_up_point->getTranslation('name')); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="row">
                                    <label class="col-md-2 col-form-label"><?php echo e(translate('Meta Title')); ?><span class="text-danger text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Meta Title')); ?>" name="meta_title" value="<?php echo e($shop->meta_title); ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 col-form-label"><?php echo e(translate('Meta Description')); ?><span class="text-danger text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <textarea name="meta_description" rows="3" class="form-control mb-3" required><?php echo e($shop->meta_description); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6"><?php echo e(translate('Banner Settings')); ?></h5>
                        </div>
                        <div class="card-body">
                            <form class="" action="<?php echo e(route('shops.update', $shop->id)); ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PATCH">
                                <?php echo csrf_field(); ?>

                                <div class="row mb-3">
                                    <label class="col-md-2 col-form-label"><?php echo e(translate('Banners')); ?> (1500x450)</label>
                                    <div class="col-md-10">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                            </div>
                                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                            <input type="hidden" name="sliders" value="<?php echo e($shop->sliders); ?>" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                        <small class="text-muted"><?php echo e(translate('We had to limit height to maintian consistancy. In some device both side of the banner might be cropped for height limitation.')); ?></small>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6"><?php echo e(translate('Social Media Link')); ?></h5>
                        </div>
                        <div class="card-body">
                            <form class="" action="<?php echo e(route('shops.update', $shop->id)); ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PATCH">
                                <?php echo csrf_field(); ?>
                                <div class="form-box-content p-3">
                                    <div class="row mb-3">
                                        <label class="col-md-2 col-form-label"><?php echo e(translate('Facebook')); ?></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="<?php echo e(translate('Facebook')); ?>" name="facebook" value="<?php echo e($shop->facebook); ?>">
                                            <small class="text-muted"><?php echo e(translate('Insert link with https ')); ?></small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-2 col-form-label"><?php echo e(translate('Twitter')); ?></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="<?php echo e(translate('Twitter')); ?>" name="twitter" value="<?php echo e($shop->twitter); ?>">
                                            <small class="text-muted"><?php echo e(translate('Insert link with https ')); ?></small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-2 col-form-label"><?php echo e(translate('Google')); ?></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="<?php echo e(translate('Google')); ?>" name="google" value="<?php echo e($shop->google); ?>">
                                            <small class="text-muted"><?php echo e(translate('Insert link with https ')); ?></small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-2 col-form-label"><?php echo e(translate('Youtube')); ?></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="<?php echo e(translate('Youtube')); ?>" name="youtube" value="<?php echo e($shop->youtube); ?>">
                                            <small class="text-muted"><?php echo e(translate('Insert link with https ')); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shebaco1/public_html/resources/views/frontend/user/seller/shop.blade.php ENDPATH**/ ?>