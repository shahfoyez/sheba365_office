<?php if(count($combinations[0]) > 0): ?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(translate('Variant')); ?></label>
				</td>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(translate('Purchase Price')); ?></label>
				</td>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(translate('Price')); ?></label>
				</td>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(translate('SKU')); ?></label>
				</td>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(translate('Quantity')); ?></label>
				</td>
				<td></td>
			</tr>
		</thead>
		<tbody>


<?php $__currentLoopData = $combinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php
		$sku = '';
		foreach (explode(' ', $product_name) as $key => $value) {
			$sku .= substr($value, 0, 1);
		}

		$str = '';
		foreach ($combination as $key => $item){
			if($key > 0 ){
				$str .= '-'.str_replace(' ', '', $item);
				$sku .='-'.str_replace(' ', '', $item);
			}
			else{
				if($colors_active == 1){
					$color_name = \App\Color::where('code', $item)->first()->name;
					$str .= $color_name;
					$sku .='-'.$color_name;
				}
				else{
					$str .= str_replace(' ', '', $item);
					$sku .='-'.str_replace(' ', '', $item);
				}
			}
		}
	?>
	<?php if(strlen($str) > 0): ?>
			<tr class="variant">
				<td>
					<label for="" class="control-label"><?php echo e($str); ?></label>
				</td>
				<td>
					<input type="number" lang="en" name="purchase_price_<?php echo e($str); ?>" value="<?php echo e($unit_price); ?>" min="0" step="0.01" class="form-control" required>
				</td>
				<td>
					<input type="number" lang="en" name="price_<?php echo e($str); ?>" value="<?php echo e($unit_price); ?>" min="0" step="0.01" class="form-control" required>
				</td>
				<td>
					<input type="text" name="sku_<?php echo e($str); ?>" value="" class="form-control">
				</td>
				<td>
					<input type="number" lang="en" name="qty_<?php echo e($str); ?>" value="10" min="0" step="1" class="form-control" required>
				</td>
				<td>
					<button type="button" class="btn btn-icon btn-sm btn-danger" onclick="delete_variant(this)"><i class="las la-trash"></i></button>
				</td>
			</tr>
	<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
<?php endif; ?>
<?php /**PATH /home/shebaco1/public_html/resources/views/backend/product/products/sku_combinations.blade.php ENDPATH**/ ?>