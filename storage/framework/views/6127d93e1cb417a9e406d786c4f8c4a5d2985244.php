<div >
	<div class="form-group">
		<label><?php echo e(translate('File Name')); ?></label>
		<input type="text" class="form-control" value="<?php echo e($file->file_name); ?>" disabled>
	</div>
	<div class="form-group">
		<label><?php echo e(translate('File Type')); ?></label>
		<input type="text" class="form-control" value="<?php echo e($file->type); ?>" disabled>
	</div>
	<div class="form-group">
		<label><?php echo e(translate('File Size')); ?></label>
		<input type="text" class="form-control" value="<?php echo e(formatBytes($file->file_size)); ?>" disabled>
	</div>
	<div class="form-group">
		<label><?php echo e(translate('Uploaded By')); ?></label>
		<input type="text" class="form-control" value="<?php echo e($file->user->name); ?>" disabled>
	</div>
	<div class="form-group">
		<label><?php echo e(translate('Uploaded At')); ?></label>
		<input type="text" class="form-control" value="<?php echo e($file->created_at); ?>" disabled>
	</div>
	<div class="form-group text-center">
		<?php
			if($file->file_original_name == null){
			    $file_name = translate('Unknown');
			}else{
				$file_name = $file->file_original_name;
			}
		?>
		<a class="btn btn-secondary" href="<?php echo e(my_asset($file->file_name)); ?>" target="_blank" download="<?php echo e($file_name); ?>.<?php echo e($file->extension); ?>"><?php echo e(translate('Download')); ?></a>
	</div>
</div><?php /**PATH C:\xampp\htdocs\SHEBA_FINAL\resources\views/backend/uploaded_files/info.blade.php ENDPATH**/ ?>