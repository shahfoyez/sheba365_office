<a href="<?php echo e(route('wishlists.index')); ?>" class="position-relative text-reset btn bg-sm btn-circle btn-icon bg-alter">
    <i class="la la-heart-o opacity-80 fs-20"></i>
    <span class="absolute-top-right" style="top: -5px;right: -5px;">
        <?php if(Auth::check()): ?>
            <span class="badge badge-primary badge-inline badge-pill"><?php echo e(count(Auth::user()->wishlists)); ?></span>
        <?php else: ?>
            <span class="badge badge-primary badge-inline badge-pill">0</span>
        <?php endif; ?>
    </span>
</a>
<?php /**PATH /home/shebaco1/public_html/resources/views/frontend/partials/wishlist.blade.php ENDPATH**/ ?>