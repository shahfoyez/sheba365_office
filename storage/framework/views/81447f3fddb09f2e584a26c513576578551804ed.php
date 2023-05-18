

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

                    <div class="row gutters-10 justify-content-center">
                        <?php if(\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated): ?>
                            <div class="col-md-4 mx-auto mb-3" >
                                <div class="bg-grad-1 text-white rounded-lg overflow-hidden">
                                  <span class="size-30px rounded-circle mx-auto bg-soft-primary d-flex align-items-center justify-content-center mt-3">
                                      <i class="las la-upload la-2x text-white"></i>
                                  </span>
                                  <div class="px-3 pt-3 pb-3">
                                      <div class="h4 fw-700 text-center"><?php echo e(max(0, Auth::user()->seller->remaining_uploads)); ?></div>
                                      <div class="opacity-50 text-center"><?php echo e(translate('Remaining Uploads')); ?></div>
                                  </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="col-md-4 mx-auto mb-3" >
                            <a href="<?php echo e(route('seller.products.upload')); ?>">
                              <div class="p-3 rounded mb-3 c-pointer text-center bg-white shadow-sm hov-shadow-lg has-transition">
                                  <span class="size-60px rounded-circle mx-auto bg-secondary d-flex align-items-center justify-content-center mb-3">
                                      <i class="las la-plus la-3x text-white"></i>
                                  </span>
                                  <div class="fs-18 text-primary"><?php echo e(translate('Add New Product')); ?></div>
                              </div>
                            </a>
                        </div>

                        <?php if(\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated): ?>
                        <?php
                            $seller_package = \App\SellerPackage::find(Auth::user()->seller->seller_package_id);
                        ?>
                        <div class="col-md-4">
                            <a href="<?php echo e(route('seller_packages_list')); ?>" class="text-center bg-white shadow-sm hov-shadow-lg text-center d-block p-3 rounded">
                                <?php if($seller_package != null): ?>
                                    <img src="<?php echo e(uploaded_asset($seller_package->logo)); ?>" height="44" class="mw-100 mx-auto">
                                    <span class="d-block sub-title mb-2"><?php echo e(translate('Current Package')); ?>: <?php echo e($seller_package->getTranslation('name')); ?></span>
                                <?php else: ?>
                                    <i class="la la-frown-o mb-2 la-3x"></i>
                                    <div class="d-block sub-title mb-2"><?php echo e(translate('No Package Found')); ?></div>
                                <?php endif; ?>
                                <div class="btn btn-outline-primary py-1"><?php echo e(translate('Upgrade Package')); ?></div>
                            </a>
                        </div>
                        <?php endif; ?>

                    </div>

                    <div class="card">
                        <div class="card-header row gutters-5">
                            <div class="col text-center text-md-left">
                                <h5 class="mb-md-0 h6"><?php echo e(translate('All Products')); ?></h5>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm">
                                    <form class="" action="" method="GET">
                                        <input type="text" class="form-control" id="search" name="search" <?php if(isset($search)): ?> value="<?php echo e($search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Search product')); ?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table aiz-table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th width="30%"><?php echo e(translate('Name')); ?></th>
                                        <th data-breakpoints="md"><?php echo e(translate('Category')); ?></th>
                                        <th data-breakpoints="md"><?php echo e(translate('Current Qty')); ?></th>
                                        <th><?php echo e(translate('Base Price')); ?></th>
                                        <th data-breakpoints="md"><?php echo e(translate('Published')); ?></th>
                                        <th data-breakpoints="md"><?php echo e(translate('Featured')); ?></th>
                                        <th data-breakpoints="md" class="text-right"><?php echo e(translate('Options')); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(($key+1) + ($products->currentPage() - 1)*$products->perPage()); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('product', $product->slug)); ?>" target="_blank" class="text-reset">
                                                    <?php echo e($product->getTranslation('name')); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <?php if($product->category != null): ?>
                                                    <?php echo e($product->category->getTranslation('name')); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $qty = 0;
                                                    if($product->variant_product){
                                                        foreach ($product->stocks as $key => $stock) {
                                                            $qty += $stock->qty;
                                                        }
                                                    }
                                                    else{
                                                        $qty = $product->current_stock;
                                                    }
                                                    echo $qty;
                                                ?>
                                            </td>
                                            <td><?php echo e($product->unit_price); ?></td>
                                            <td>
                                                <label class="aiz-switch aiz-switch-success mb-0">
                                                    <input onchange="update_published(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->published == 1) echo "checked";?> >
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="aiz-switch aiz-switch-success mb-0">
                                                    <input onchange="update_featured(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->featured == 1) echo "checked";?> >
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="text-right">
                		                      <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="<?php echo e(route('seller.products.edit', ['id'=>$product->id, 'lang'=>env('DEFAULT_LANGUAGE')])); ?>" title="<?php echo e(translate('Edit')); ?>">
                		                          <i class="las la-edit"></i>
                		                      </a>
                                              <a href="<?php echo e(route('products.duplicate', $product->id)); ?>" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="<?php echo e(translate('Duplicate')); ?>">
                    							   <i class="las la-copy"></i>
                    						  </a>
                                              <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('products.destroy', $product->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
                                                  <i class="las la-trash"></i>
                                              </a>
                                          </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="aiz-pagination">
                                <?php echo e($products->links()); ?>

                          	</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Featured products updated successfully')); ?>');
                }
                else{
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
                }
            });
        }

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.published')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Published products updated successfully')); ?>');
                }
                else{
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shebaco1/public_html/resources/views/frontend/user/seller/products.blade.php ENDPATH**/ ?>