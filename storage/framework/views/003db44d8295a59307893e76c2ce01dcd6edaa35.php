

<?php $__env->startSection('content'); ?>


    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-start">
                <?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="aiz-user-panel">

                    <div class="aiz-titlebar mt-2 mb-4">
                      <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1 class="h3"><?php echo e(translate('Update your product')); ?></h1>
                        </div>
                      </div>
                    </div>

                    <form class="" action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data" id="choice_form">
                        <input name="_method" type="hidden" value="POST">
                        <input type="hidden" name="lang" value="<?php echo e($lang); ?>">
                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                        <?php echo csrf_field(); ?>
                		<input type="hidden" name="added_by" value="seller">
                        <div class="card">
                            <ul class="nav nav-tabs nav-fill border-light">
                                <?php $__currentLoopData = \App\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset <?php if($language->code == $lang): ?> active <?php else: ?> bg-soft-dark border-light border-left-0 <?php endif; ?> py-3" href="<?php echo e(route('seller.products.edit', ['id'=>$product->id, 'lang'=> $language->code] )); ?>">
                                            <img src="<?php echo e(static_asset('assets/img/flags/'.$language->code.'.png')); ?>" height="11" class="mr-1">
                                            <span><?php echo e($language->name); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Product Name')); ?></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="name" placeholder="<?php echo e(translate('Product Name')); ?>" value="<?php echo e($product->getTranslation('name')); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row" id="category">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Category')); ?></label>
                                    <div class="col-lg-8">
                                        <select class="form-control aiz-selectpicker" name="category_id" id="category_id" data-selected=<?php echo e($product->category_id); ?> required>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->getTranslation('name')); ?></option>
                                                <?php $__currentLoopData = $category->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo $__env->make('categories.child_category', ['child_category' => $childCategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="brand">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Brand')); ?></label>
                                    <div class="col-lg-8">
                                        <select class="form-control aiz-selectpicker" name="brand_id" id="brand_id">
                                            <option value=""><?php echo e(('Select Brand')); ?></option>
                                            <?php $__currentLoopData = \App\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($brand->id); ?>" <?php if($product->brand_id == $brand->id): ?> selected <?php endif; ?>><?php echo e($brand->getTranslation('name')); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Unit')); ?></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="unit" placeholder="<?php echo e(translate('Unit (e.g. KG, Pc etc)')); ?>" value="<?php echo e($product->getTranslation('unit')); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Minimum Qty')); ?></label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control" name="min_qty" value="<?php if($product->min_qty <= 1): ?><?php echo e(1); ?><?php else: ?><?php echo e($product->min_qty); ?><?php endif; ?>" min="1" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Tags')); ?></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control aiz-tag-input" name="tags[]" id="tags" value="<?php echo e($product->tags); ?>" placeholder="<?php echo e(translate('Type to add a tag')); ?>" data-role="tagsinput">
                                    </div>
                                </div>
                                <?php
                                    $pos_addon = \App\Addon::where('unique_identifier', 'pos_system')->first();
                                ?>
                                <?php if($pos_addon != null && $pos_addon->activated == 1): ?>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-from-label"><?php echo e(translate('Barcode')); ?></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="barcode" placeholder="<?php echo e(translate('Barcode')); ?>" value="<?php echo e($product->barcode); ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php
                                    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                                ?>
                                <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-from-label"><?php echo e(translate('Refundable')); ?></label>
                                        <div class="col-lg-8">
                                            <label class="aiz-switch aiz-switch-success mb-0" style="margin-top:5px;">
                                                <input type="checkbox" name="refundable" <?php if($product->refundable == 1): ?> checked <?php endif; ?>>
                                                <span class="slider round"></span></label>
                                            </label>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"><?php echo e(translate('Product Images')); ?></h5>
                            </div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="signinSrEmail"><?php echo e(translate('Gallery Images')); ?></label>
                                    <div class="col-md-8">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                            </div>
                                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                            <input type="hidden" name="photos" value="<?php echo e($product->photos); ?>" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="signinSrEmail"><?php echo e(translate('Thumbnail Image')); ?> <small>(290x300)</small></label>
                                    <div class="col-md-8">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                            </div>
                                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                            <input type="hidden" name="thumbnail_img" value="<?php echo e($product->thumbnail_img); ?>" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"><?php echo e(translate('Product Videos')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Video Provider')); ?></label>
                                    <div class="col-lg-8">
                                        <select class="form-control aiz-selectpicker" name="video_provider" id="video_provider">
                                            <option value="youtube" <?php if($product->video_provider == 'youtube') echo "selected";?> ><?php echo e(translate('Youtube')); ?></option>
                                            <option value="dailymotion" <?php if($product->video_provider == 'dailymotion') echo "selected";?> ><?php echo e(translate('Dailymotion')); ?></option>
                                            <option value="vimeo" <?php if($product->video_provider == 'vimeo') echo "selected";?> ><?php echo e(translate('Vimeo')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Video Link')); ?></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="video_link" value="<?php echo e($product->video_link); ?>" placeholder="<?php echo e(translate('Video Link')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"><?php echo e(translate('Product Variation')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" value="<?php echo e(translate('Colors')); ?>" disabled>
                                    </div>
                                    <div class="col-lg-8">
                                        <select class="form-control aiz-selectpicker" data-live-search="true" data-selected-text-format="count" name="colors[]" id="colors" multiple>
                                            <?php $__currentLoopData = \App\Color::orderBy('name', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($color->code); ?>"
                                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:<?php echo e($color->code); ?>'></span><span><?php echo e($color->name); ?></span></span>"
                                                    <?php if(in_array($color->code, json_decode($product->colors))) echo 'selected'?>
                                                ></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-1">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input value="1" type="checkbox" name="colors_active" <?php if(count(json_decode($product->colors)) > 0) echo "checked";?> >
                                            <span></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" value="<?php echo e(translate('Attributes')); ?>" disabled>
                                    </div>
                                    <div class="col-lg-8">
                                        <select name="choice_attributes[]" data-live-search="true" data-selected-text-format="count" id="choice_attributes" class="form-control aiz-selectpicker" multiple data-placeholder="<?php echo e(translate('Choose Attributes')); ?>">
                                            <?php $__currentLoopData = \App\Attribute::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($attribute->id); ?>" <?php if($product->attributes != null && in_array($attribute->id, json_decode($product->attributes, true))): ?> selected <?php endif; ?>><?php echo e($attribute->getTranslation('name')); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="">
                                    <p><?php echo e(translate('Choose the attributes of this product and then input values of each attribute')); ?></p>
                                    <br>
                                </div>

                                <div class="customer_choice_options" id="customer_choice_options">
                                    <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                <input type="hidden" name="choice_no[]" value="<?php echo e($choice_option->attribute_id); ?>">
                                                <input type="text" class="form-control" name="choice[]" value="<?php echo e(\App\Attribute::find($choice_option->attribute_id)->getTranslation('name')); ?>" placeholder="<?php echo e(translate('Choice Title')); ?>" disabled>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control aiz-tag-input" name="choice_options_<?php echo e($choice_option->attribute_id); ?>[]" placeholder="<?php echo e(translate('Enter choice values')); ?>" value="<?php echo e(implode(',', $choice_option->values)); ?>" data-on-change="update_sku">
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"><?php echo e(translate('Product price + stock')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Unit price')); ?></label>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="<?php echo e(translate('Unit price')); ?>" name="unit_price" class="form-control" value="<?php echo e($product->unit_price); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Purchase price')); ?></label>
                                    <div class="col-lg-6">
                                        <input type="number" min="0" step="0.01" placeholder="<?php echo e(translate('Purchase price')); ?>" name="purchase_price" class="form-control" value="<?php echo e($product->purchase_price); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Tax')); ?></label>
                                    <div class="col-lg-6">
                                        <input type="number" min="0" step="0.01" placeholder="<?php echo e(translate('tax')); ?>" name="tax" class="form-control" value="<?php echo e($product->tax); ?>" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control aiz-selectpicker" name="tax_type" required>
                                            <option value="amount" <?php if($product->tax_type == 'amount') echo "selected";?> ><?php echo e(translate('Flat')); ?></option>
                                            <option value="percent" <?php if($product->tax_type == 'percent') echo "selected";?> ><?php echo e(translate('Percent')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Discount')); ?></label>
                                    <div class="col-lg-6">
                                        <input type="number" min="0" step="0.01" placeholder="<?php echo e(translate('Discount')); ?>" name="discount" class="form-control" value="<?php echo e($product->discount); ?>" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control aiz-selectpicker" name="discount_type" required>
                                            <option value="amount" <?php if($product->discount_type == 'amount') echo "selected";?> ><?php echo e(translate('Flat')); ?></option>
                                            <option value="percent" <?php if($product->discount_type == 'percent') echo "selected";?> ><?php echo e(translate('Percent')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="quantity">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Quantity')); ?></label>
                                    <div class="col-lg-6">
                                        <input type="number" value="<?php echo e($product->current_stock); ?>" step="1" placeholder="<?php echo e(translate('Quantity')); ?>" name="current_stock" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="sku_combination" id="sku_combination">

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"><?php echo e(translate('Product Description')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Description')); ?></label>
                                    <div class="col-lg-9">
                                        <textarea class="aiz-text-editor" name="description"><?php echo e($product->getTranslation('description')); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'product_wise_shipping'): ?>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6"><?php echo e(translate('Product Shipping Cost')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <div class="card-heading">
                                                <h5 class="mb-0 h6"><?php echo e(translate('Free Shipping')); ?></h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-from-label"><?php echo e(translate('Status')); ?></label>
                                                <div class="col-lg-8">
                                                    <label class="aiz-switch aiz-switch-success mb-0">
                                                        <input type="radio" name="shipping_type" value="free" <?php if($product->shipping_type == 'free'): ?> checked <?php endif; ?>>
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <div class="card-heading">
                                                <h5 class="mb-0 h6"><?php echo e(translate('Flat Rate')); ?></h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-from-label"><?php echo e(translate('Status')); ?></label>
                                                <div class="col-lg-8">
                                                    <label class="aiz-switch aiz-switch-success mb-0">
                                                        <input type="radio" name="shipping_type" value="flat_rate" <?php if($product->shipping_type == 'flat_rate'): ?> checked <?php endif; ?>>
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-from-label"><?php echo e(translate('Shipping cost')); ?></label>
                                                <div class="col-lg-8">
                                                    <input type="number" min="0" value="<?php echo e($product->shipping_cost); ?>" step="0.01" placeholder="<?php echo e(translate('Shipping cost')); ?>" name="flat_shipping_cost" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"><?php echo e(translate('PDF Specification')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="signinSrEmail"><?php echo e(translate('PDF Specification')); ?></label>
                                    <div class="col-md-8">
                                        <div class="input-group" data-toggle="aizuploader">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                            </div>
                                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                            <input type="hidden" name="pdf" value="<?php echo e($product->pdf); ?>" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6"><?php echo e(translate('SEO Meta Tags')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Meta Title')); ?></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="meta_title" value="<?php echo e($product->meta_title); ?>" placeholder="<?php echo e(translate('Meta Title')); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-from-label"><?php echo e(translate('Description')); ?></label>
                                    <div class="col-lg-8">
                                        <textarea name="meta_description" rows="8" class="form-control"><?php echo e($product->meta_description); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="signinSrEmail"><?php echo e(translate('Meta Images')); ?></label>
                                    <div class="col-md-8">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                            </div>
                                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                            <input type="hidden" name="meta_img" value="<?php echo e($product->meta_img); ?>" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"><?php echo e(translate('Slug')); ?></label>
                                    <div class="col-lg-8">
                                        <input type="text" placeholder="<?php echo e(translate('Slug')); ?>" id="slug" name="slug" value="<?php echo e($product->slug); ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mar-all text-right">
                            <button type="submit" name="button" class="btn btn-primary"><?php echo e(translate('Update Product')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

    function add_more_customer_choice_option(i, name){
        $('#customer_choice_options').append('<div class="form-group row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="<?php echo e(translate('Choice Title')); ?>" readonly></div><div class="col-md-8"><input type="text" class="form-control aiz-tag-input" name="choice_options_'+i+'[]" placeholder="<?php echo e(translate('Enter choice values')); ?>" data-on-change="update_sku"></div></div>');

        AIZ.plugins.tagify();
    }

    $('input[name="colors_active"]').on('change', function() {
        if(!$('input[name="colors_active"]').is(':checked')){
            $('#colors').prop('disabled', true);
        }
        else{
            $('#colors').prop('disabled', false);
        }
        update_sku();
    });

    $('#colors').on('change', function() {
        update_sku();
    });

    function delete_row(em){
        $(em).closest('.form-group').remove();
        update_sku();
    }

    function delete_variant(em){
        $(em).closest('.variant').remove();
    }

    function update_sku(){
        $.ajax({
           type:"POST",
           url:'<?php echo e(route('products.sku_combination_edit')); ?>',
           data:$('#choice_form').serialize(),
           success: function(data){
               $('#sku_combination').html(data);
               if (data.length > 1) {
                   $('#quantity').hide();
               }
               else {
                    $('#quantity').show();
               }
           }
       });
    }

    AIZ.plugins.tagify();


    $(document).ready(function(){
        update_sku();

        $('.remove-files').on('click', function(){
            $(this).parents(".col-md-4").remove();
        });
    });

    $('#choice_attributes').on('change', function() {
        $.each($("#choice_attributes option:selected"), function(j, attribute){
            flag = false;
            $('input[name="choice_no[]"]').each(function(i, choice_no) {
                if($(attribute).val() == $(choice_no).val()){
                    flag = true;
                }
            });
            if(!flag){
                add_more_customer_choice_option($(attribute).val(), $(attribute).text());
            }
        });

        var str = <?php echo $product->attributes ?>;

        $.each(str, function(index, value){
            flag = false;
            $.each($("#choice_attributes option:selected"), function(j, attribute){
                if(value == $(attribute).val()){
                    flag = true;
                }
            });
            if(!flag){
                $('input[name="choice_no[]"][value="'+value+'"]').parent().parent().remove();
            }
        });

        update_sku();
    });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shebaco1/public_html/resources/views/frontend/user/seller/product_edit.blade.php ENDPATH**/ ?>