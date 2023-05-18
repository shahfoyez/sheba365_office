<div class="modal-body p-4 added-to-cart">
    <div class="text-center text-danger">
        <h2><?php echo e(translate('oops..')); ?></h2>
        <h3><?php echo e(translate('You have to add minimum '.$min_qty.' products!')); ?></h3>
    </div>
    <div class="text-center mt-5">
        <button class="btn btn-outline-primary" data-dismiss="modal"><?php echo e(translate('Back to shopping')); ?></button>
    </div>
</div>
<?php /**PATH /home/shebaco1/public_html/resources/views/frontend/partials/minQtyNotSatisfied.blade.php ENDPATH**/ ?>