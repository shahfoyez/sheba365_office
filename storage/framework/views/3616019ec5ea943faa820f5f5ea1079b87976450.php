<section class="bg-white border-top mt-auto">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="<?php echo e(route('terms')); ?>">
                    <i class="la la-file-text la-3x text-alter-2 mb-2"></i>
                    <h4 class="h6"><?php echo e(translate('Terms & conditions')); ?></h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="<?php echo e(route('returnpolicy')); ?>">
                    <i class="la la-mail-reply la-3x text-alter-2 mb-2"></i>
                    <h4 class="h6"><?php echo e(translate('Return Policy')); ?></h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="<?php echo e(route('supportpolicy')); ?>">
                    <i class="la la-support la-3x text-alter-2 mb-2"></i>
                    <h4 class="h6"><?php echo e(translate('Support Policy')); ?></h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left border-right text-center p-4 d-block" href="<?php echo e(route('privacypolicy')); ?>">
                    <i class="las la-exclamation-circle la-3x text-alter-2 mb-2"></i>
                    <h4 class="h6"><?php echo e(translate('Privacy Policy')); ?></h4>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-black pt-5 text-light">
    <div class="container">
        <div class="mt-4 text-center border-bottom border-gray-800">
            <div class="row">
                <div class="col-xl-6 col-lg-8 mx-auto pb-5">
                    <a href="<?php echo e(route('home')); ?>" class="d-block">
                        <?php if(get_setting('footer_logo') != null): ?>
                            <img class="lazyload" src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>" data-src="<?php echo e(uploaded_asset(get_setting('footer_logo'))); ?>" alt="<?php echo e(env('APP_NAME')); ?>" height="56">
                        <?php else: ?>
                            <img class="lazyload" src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>" data-src="<?php echo e(static_asset('assets/img/logo.png')); ?>" alt="<?php echo e(env('APP_NAME')); ?>" height="44">
                        <?php endif; ?>
                    </a>
                    <div class="my-3">
                        <?php
                            echo get_setting('about_us_description');
                        ?>
                    </div>
                    <ul class="list-inline my-3 my-md-0 social colored text-center">
                        <?php if( get_setting('facebook_link') !=  null ): ?>
                        <li class="list-inline-item">
                            <a href="<?php echo e(get_setting('facebook_link')); ?>" target="_blank" class="facebook"><i class="lab la-facebook-f"></i></a>
                        </li>
                        <?php endif; ?>
                        <?php if( get_setting('twitter_link') !=  null ): ?>
                        <li class="list-inline-item">
                            <a href="<?php echo e(get_setting('twitter_link')); ?>" target="_blank" class="twitter"><i class="lab la-twitter"></i></a>
                        </li>
                        <?php endif; ?>
                        <?php if( get_setting('instagram_link') !=  null ): ?>
                        <li class="list-inline-item">
                            <a href="<?php echo e(get_setting('instagram_link')); ?>" target="_blank" class="instagram"><i class="lab la-instagram"></i></a>
                        </li>
                        <?php endif; ?>
                        <?php if( get_setting('youtube_link') !=  null ): ?>
                        <li class="list-inline-item">
                            <a href="<?php echo e(get_setting('youtube_link')); ?>" target="_blank" class="youtube"><i class="lab la-youtube"></i></a>
                        </li>
                        <?php endif; ?>
                        <?php if( get_setting('linkedin_link') !=  null ): ?>
                        <li class="list-inline-item">
                            <a href="<?php echo e(get_setting('linkedin_link')); ?>" target="_blank" class="linkedin"><i class="lab la-linkedin-in"></i></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="text-center text-xl-left">
                    <ul class="list-inline long-gap mt-4">
                        <?php if( get_setting('widget_one_labels') !=  null ): ?>
                            <?php $__currentLoopData = json_decode( get_setting('widget_one_labels'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-inline-item">
                                <a href="<?php echo e(json_decode( get_setting('widget_one_links'), true)[$key]); ?>" class="text-reset">
                                    <?php echo e($value); ?>

                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="text-center text-xl-right">
                    <ul class="list-inline my-4">
                        <?php if( get_setting('payment_method_images') !=  null ): ?>
                            <?php $__currentLoopData = explode(',', get_setting('payment_method_images')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-inline-item">
                                    <img src="<?php echo e(uploaded_asset($value)); ?>" height="40" class="mw-100">
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="py-5 py-xl-4 bg-alter">
    <div class="container">
        <div class="text-center">
            <?php
                echo get_setting('frontend_copyright_text');
            ?>
        </div>
    </div>
</footer>


<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white ">
    <div class="d-flex justify-content-around align-items-center">
        <a href="<?php echo e(route('home')); ?>" class="flex-grow-1 text-center py-2 <?php echo e(areActiveRoutes(['home'],'text-primary')); ?>">
            <i class="las la-home fs-20"></i>
            <span class="d-block fs-11 fw-600"><?php echo e(translate('Home')); ?></span>
        </a>
        <a href="javascript:void(0)" class="text-reset flex-grow-1 text-center py-2 mobile-category-trigger" data-toggle="class-toggle" data-target=".mobile-category-sidebar">
            <i class="las la-list-ul fs-20"></i>
            <span class="d-block fs-11 fw-600"><?php echo e(translate('Categories')); ?></span>
        </a>
        <a href="<?php echo e(route('cart')); ?>" class="flex-grow-1 text-center py-2 <?php echo e(areActiveRoutes(['cart'],'text-primary')); ?>">
            <i class="las la-shopping-cart fs-20"></i>
            <span class="d-block fs-11 fw-600">
                <?php echo e(translate('Cart')); ?>

                <?php if(Session::has('cart')): ?>
                <span class="" id="cart_items_sidenav">(<?php echo e(count(Session::get('cart'))); ?>)</span>
                <?php else: ?>
                    <span class="" id="cart_items_sidenav">(0)</span>
                <?php endif; ?>
            </span>
        </a>
        <?php if(Auth::check()): ?>
            <?php if(isAdmin()): ?>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-reset flex-grow-1 text-center py-2">
                    <span class="d-block mx-auto mb-1">
                        <?php if(Auth::user()->photo != null): ?>
                            <img src="<?php echo e(custom_asset(Auth::user()->avatar_original)); ?>" class="rounded-circle size-20px">
                        <?php else: ?>
                            <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>" class="rounded-circle size-20px">
                        <?php endif; ?>
                    </span>
                    <span class="d-block fs-11 fw-600"><?php echo e(translate('Account')); ?></span>
                </a>
            <?php else: ?>
                <a href="javascript:void(0)" class="text-reset flex-grow-1 text-center py-2 mobile-side-nav-thumb" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav">
                    <span class="d-block mx-auto mb-1">
                        <?php if(Auth::user()->photo != null): ?>
                            <img src="<?php echo e(custom_asset(Auth::user()->avatar_original)); ?>" class="rounded-circle size-20px">
                        <?php else: ?>
                            <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>" class="rounded-circle size-20px">
                        <?php endif; ?>
                    </span>
                    <span class="d-block fs-11 fw-600"><?php echo e(translate('Account')); ?></span>
                </a>
            <?php endif; ?>
        <?php else: ?>
            <a href="<?php echo e(route('user.login')); ?>" class="text-reset flex-grow-1 text-center py-2">
                <span class="d-block mx-auto mb-1">
                    <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>" class="rounded-circle size-20px">
                </span>
                <span class="d-block fs-11 fw-600"><?php echo e(translate('Account')); ?></span>
            </a>
        <?php endif; ?>
    </div>
</div>
<?php if(Auth::check() && !isAdmin()): ?>
    <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
        <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
        <div class="collapse-sidebar bg-white">
            <?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php endif; ?>

<div class="mobile-category-sidebar collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
    <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-target=".mobile-category-sidebar" data-same=".mobile-category-trigger"></div>
    <div class="collapse-sidebar bg-white">
        <div class="pt-4 position-relative z-1 shadow-sm">
            <div class="px-4">
                <h4 class="fw-600 h5"><?php echo e(translate('All Categories')); ?></h4>
            </div>
            <div class="absolute-top-right">
                <button class="btn btn-sm p-2" data-toggle="class-toggle" data-target=".mobile-category-sidebar" data-same=".mobile-category-trigger">
                    <i class="las la-times la-2x"></i>
                </button>
            </div>
            <div>
                <?php $__currentLoopData = \App\Category::where('level', 0)->orderBy('name', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mt-3">
                        <div class="p-3 border-bottom fs-16 fw-600">
                            <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="text-reset"><?php echo e($category->getTranslation('name')); ?></a>
                        </div>
                        <div class="p-3 p-lg-4">
                            <?php $__currentLoopData = \App\Utility\CategoryUtility::get_immediate_children_ids($category->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $first_level_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="">
                                <h6 class="mb-3"><a class="text-reset fw-600 fs-14" href="<?php echo e(route('products.category', \App\Category::find($first_level_id)->slug)); ?>"><?php echo e(\App\Category::find($first_level_id)->getTranslation('name')); ?></a></h6>
                                <ul class="mb-3 list-unstyled pl-2">
                                    <?php $__currentLoopData = \App\Utility\CategoryUtility::get_immediate_children_ids($first_level_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $second_level_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="mb-2">
                                        <a class="text-reset" href="<?php echo e(route('products.category', \App\Category::find($second_level_id)->slug)); ?>" ><?php echo e(\App\Category::find($second_level_id)->getTranslation('name')); ?></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>
<?php /**PATH /home/shebaco1/public_html/resources/views/frontend/inc/footer.blade.php ENDPATH**/ ?>