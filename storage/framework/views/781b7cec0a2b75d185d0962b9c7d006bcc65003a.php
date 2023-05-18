

<?php $__env->startSection('content'); ?>

    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-start">
                <?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="aiz-user-panel">

                    <div class="aiz-titlebar mt-2 mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h1 class="h3"><?php echo e(translate('Products')); ?></h1>
                            </div>
                        </div>
                    </div>
                    <form class="" action="<?php echo e(route('digitalproducts.store')); ?>" method="POST" enctype="multipart/form-data" id="choice_form">
                        <?php echo csrf_field(); ?>
                		<input type="hidden" name="added_by" value="seller">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"><?php echo e(translate('General')); ?></h5>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Product Name')); ?> <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="name" placeholder="<?php echo e(translate('Product Name')); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row" id="category">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Category')); ?> <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select class="form-control aiz-selectpicker" name="category_id" id="category_id" required>
                                            <?php $__currentLoopData = \App\Category::where('parent_id', 0)->where('digital', 1)->with('childrenCategories')->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->getTranslation('name')); ?></option>
                                                <?php $__currentLoopData = $category->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo $__env->make('categories.child_category', ['child_category' => $childCategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Product File')); ?> <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <div class="custom-file">
                                            <label class="custom-file-label">
                                                <input type="file" name="file" class="custom-file-input" required>
                                                <span class="custom-file-name"><?php echo e(translate('Choose file')); ?></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Tags')); ?> <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control aiz-tag-input" name="tags[]" placeholder="<?php echo e(translate('Type and hit enter')); ?>">
                                        <small class="text-muted"><?php echo e(translate('This is used for search. Input those words by which cutomer can find this product.')); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"><?php echo e(translate('Images')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="signinSrEmail"><?php echo e(translate('Gallery Images')); ?> <small>(600x600)</small></label>
                                    <div class="col-lg-9">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                            </div>
                                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                            <input type="hidden" name="photos" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                        <small class="text-muted"><?php echo e(translate('These images are visible in product details page gallery. Use 600x600 sizes images.')); ?></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="signinSrEmail"><?php echo e(translate('Thumbnail Image')); ?> <small>(300x300)</small></label>
                                    <div class="col-lg-9">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                            </div>
                                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                            <input type="hidden" name="thumbnail_img" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                        <small class="text-muted"><?php echo e(translate('This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.')); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"><?php echo e(translate('Meta Tags')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Meta Title')); ?></label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="meta_title" placeholder="<?php echo e(translate('Meta Title')); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Description')); ?></label>
                                    <div class="col-lg-9">
                                        <textarea name="meta_description" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="signinSrEmail"><?php echo e(translate('Meta Image')); ?></label>
                                    <div class="col-lg-9">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                            </div>
                                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                            <input type="hidden" name="meta_img" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"><?php echo e(translate('Price')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Unit price')); ?> <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="number" min="0" value="0" step="0.01" placeholder="<?php echo e(translate('Unit price')); ?>" name="unit_price" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Purchase price')); ?> <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="number" min="0" value="0" step="0.01" placeholder="<?php echo e(translate('Purchase price')); ?>" name="purchase_price" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Tax')); ?> <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="number" min="0" value="0" step="0.01" placeholder="<?php echo e(translate('Tax')); ?>" name="tax" class="form-control" required>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control aiz-selectpicker" name="tax_type">
                                            <option value="amount"><?php echo e(translate('Flat')); ?></option>
                                            <option value="percent"><?php echo e(translate('Percent')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Discount')); ?> <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="number" min="0" value="0" step="0.01" placeholder="<?php echo e(translate('Discount')); ?>" name="discount" class="form-control" required>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control aiz-selectpicker" name="discount_type">
                                            <option value="amount"><?php echo e(translate('Flat')); ?></option>
                                            <option value="percent"><?php echo e(translate('Percent')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"><?php echo e(translate('Product Information')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Description')); ?></label>
                                    <div class="col-lg-9">
                                        <textarea class="aiz-text-editor" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary"><?php echo e(translate('Save Product')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shebaco1/public_html/resources/views/frontend/user/seller/digitalproducts/product_upload.blade.php ENDPATH**/ ?>