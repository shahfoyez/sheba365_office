

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

                    <div class="row gutters-10">
                        <div class="col-md-4 mx-auto mb-3" >
                            <div class="bg-grad-1 text-white rounded-lg overflow-hidden">
                              <span class="size-30px rounded-circle mx-auto bg-soft-primary d-flex align-items-center justify-content-center mt-3">
                                  <i class="las la-upload la-2x text-white"></i>
                              </span>
                              <div class="px-3 pt-3 pb-3">
                                  <div class="h4 fw-700 text-center"><?php echo e(max(0, Auth::user()->remaining_uploads)); ?></div>
                                  <div class="opacity-50 text-center"><?php echo e(translate('Remaining Uploads')); ?></div>
                              </div>
                            </div>
                        </div>

                        <div class="col-md-4 mx-auto mb-3" >
                            <a href="<?php echo e(route('customer_products.create')); ?>">
                              <div class="p-3 rounded mb-3 c-pointer text-center bg-white shadow-sm hov-shadow-lg has-transition">
                                  <span class="size-60px rounded-circle mx-auto bg-secondary d-flex align-items-center justify-content-center mb-3">
                                      <i class="las la-plus la-3x text-white"></i>
                                  </span>
                                  <div class="fs-18 text-primary"><?php echo e(translate('Add New Product')); ?></div>
                              </div>
                            </a>
                        </div>

                        <?php
                            $customer_package = \App\CustomerPackage::find(Auth::user()->customer_package_id);
                        ?>
                        <div class="col-md-4">
                            <a href="<?php echo e(route('customer_packages_list_show')); ?>" class="text-center bg-white shadow-sm hov-shadow-lg text-center d-block p-3 rounded">
                                <?php if($customer_package != null): ?>
                                    <img src="<?php echo e(uploaded_asset($customer_package->logo)); ?>" height="44" class="mw-100 mx-auto">
                                    <span class="d-block sub-title mb-2"><?php echo e(translate('Current Package')); ?>: <?php echo e($customer_package->getTranslation('name')); ?></span>
                                <?php else: ?>
                                    <i class="la la-frown-o mb-1 la-3x"></i>
                                    <div class="d-block sub-title mb-2"><?php echo e(translate('No Package Found')); ?></div>
                                <?php endif; ?>
                                <div class="btn btn-outline-primary py-1"><?php echo e(translate('Upgrade Package')); ?></div>
                            </a>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="col text-center text-md-left">
                                <h5 class="mb-md-0 h6"><?php echo e(translate('All Products')); ?></h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table aiz-table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(translate('Name')); ?></th>
                                        <th><?php echo e(translate('Price')); ?></th>
                                        <th><?php echo e(translate('Available Status')); ?></th>
                                        <th><?php echo e(translate('Admin Status')); ?></th>
                                        <th><?php echo e(translate('Options')); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><a href="<?php echo e(route('customer.product', $product->slug)); ?>"><?php echo e($product->name); ?></a></td>
                                        <td><?php echo e(single_price($product->unit_price)); ?></td>
                                        <td><label class="aiz-switch aiz-switch-success mb-0">
                                            <input onchange="update_status(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->status == 1) echo "checked";?> >
                                            <span class="slider round"></span></label>
                                        </td>
                                        <td>
                                            <?php if($product->published == '1'): ?>
                                                <span class="badge badge-inline badge-success"><?php echo e(translate('PUBLISHED')); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-inline badge-info"><?php echo e(translate('PENDING')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('customer_products.edit', ['id'=>$product->id, 'lang'=>env('DEFAULT_LANGUAGE')] )); ?>" title="<?php echo e(translate('Edit')); ?>">
            								   <i class="las la-edit"></i>
            							    </a>
                                            
                                            <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('customer_products.destroy', $product->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
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

        function update_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('customer_products.update.status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Status has been updated successfully')); ?>');
                }
                else{
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
                }
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shebaco1/public_html/resources/views/frontend/user/customer/products.blade.php ENDPATH**/ ?>