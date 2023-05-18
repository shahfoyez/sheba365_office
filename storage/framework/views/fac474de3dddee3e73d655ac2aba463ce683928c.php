<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3"><?php echo e(translate('Website Header')); ?></h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8 mx-auto">
		<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">
			<?php echo csrf_field(); ?>
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0"><?php echo e(translate('Header Setting')); ?></h6>
				</div>
				<div class="card-body">
					<div class="form-group row">
	                    <label class="col-md-3 col-from-label"><?php echo e(translate('Header Logo')); ?></label>
						<div class="col-md-8">
		                    <div class=" input-group " data-toggle="aizuploader" data-type="image">
		                        <div class="input-group-prepend">
		                            <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
		                        </div>
		                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
								<input type="hidden" name="types[]" value="header_logo">
		                        <input type="hidden" name="header_logo" class="selected-files" value="<?php echo e(get_setting('header_logo')); ?>">
		                    </div>
		                    <div class="file-preview"></div>
						</div>
	                </div>
	                <div class="form-group row">
						<label class="col-md-3 col-from-label"><?php echo e(translate('Enable stikcy header?')); ?></label>
						<div class="col-md-8">
							<label class="aiz-switch aiz-switch-success mb-0">
								<input type="hidden" name="types[]" value="header_stikcy">
								<input type="checkbox" name="header_stikcy" <?php if( get_setting('header_stikcy') == 'on'): ?> checked <?php endif; ?>>
								<span></span>
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0"><?php echo e(translate('Header Menu')); ?></h6>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label><?php echo e(translate('Label & Links')); ?></label>
						<div class="header-menu-target">
							<?php if(get_setting('header_menu_label') != null): ?>
								<?php $__currentLoopData = json_decode(get_setting('header_menu_label'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="row gutters-5">
									<div class="col-md">
										<div class="form-group">
											<input type="hidden" name="types[]" value="header_menu_label">
											<input type="text" class="form-control" placeholder="Label" name="header_menu_label[]" value="<?php echo e(json_decode(get_setting('header_menu_label'), true)[$key]); ?>">
										</div>
									</div>
									<div class="col-md">
										<div class="form-group">
											<input type="hidden" name="types[]" value="header_menu_link">
											<input type="text" class="form-control" placeholder="link with http:// or https://" name="header_menu_link[]" value="<?php echo e(json_decode(get_setting('header_menu_link'), true)[$key]); ?>">
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</div>
					</div>
					<button
						type="button"
						class="btn btn-soft-secondary btn-sm"
						data-toggle="add-more"
						data-target=".header-menu-target"
						data-content='<div class="row gutters-5">
									<div class="col-md">
										<div class="form-group">
											<input type="hidden" name="types[]" value="header_menu_label">
											<input type="text" class="form-control" placeholder="Label" name="header_menu_label[]">
										</div>
									</div>
									<div class="col-md">
										<div class="form-group">
											<input type="hidden" name="types[]" value="header_menu_link">
											<input type="text" class="form-control" placeholder="link with http:// or https://" name="header_menu_link[]">
										</div>
									</div>
								</div>'
					><?php echo e(translate('Add New')); ?>

					</button>
				</div>
			</div>
			<div class="text-right mb-3">
				<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
			</div>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SHEBA_FINAL\resources\views/backend/website_settings/header.blade.php ENDPATH**/ ?>