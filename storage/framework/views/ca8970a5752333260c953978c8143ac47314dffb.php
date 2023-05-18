<!-- END Top Bar -->
<header class="<?php if(get_setting('header_stikcy') == 'on'): ?> sticky-top <?php endif; ?> z-1021 bg-white border-bottom shadow-sm">
    <div class="position-relative logo-bar-area">
        <div class="container">
            <div class="d-flex align-items-center">

                <div class="col-auto col-xl-3 pl-0 pr-3 d-flex align-items-center">
                    <a class="d-block py-20px mr-3 ml-0" href="<?php echo e(route('home')); ?>">
                        <?php
                            $header_logo = get_setting('header_logo');
                        ?>
                        <?php if($header_logo != null): ?>
                            <img src="<?php echo e(uploaded_asset($header_logo)); ?>" alt="<?php echo e(env('APP_NAME')); ?>" class="mw-100 h-40px h-md-50px" height="50">
                        <?php else: ?>
                            <img src="<?php echo e(static_asset('assets/img/logo.png')); ?>" alt="<?php echo e(env('APP_NAME')); ?>" class="mw-100 h-40px h-md-50px" height="50">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="d-lg-none ml-auto mr-0">
                    <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle" data-target=".front-header-search">
                        <i class="las la-search la-flip-horizontal la-2x"></i>
                    </a>
                </div>

                <div class="col col-xl-6 front-header-search d-flex align-items-center bg-white">
                    <div class="position-relative flex-grow-1">
                        <form action="<?php echo e(route('search')); ?>" method="GET" class="stop-propagation">
                            <div class="d-flex position-relative align-items-center">
                                <div class="d-lg-none" data-toggle="class-toggle" data-target=".front-header-search">
                                    <button class="btn px-2" type="button"><i class="la la-2x la-long-arrow-left"></i></button>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="border-0 border-lg form-control" id="search" name="q" placeholder="<?php echo e(translate('I am shopping for...')); ?>" autocomplete="off">
                                    <div class="input-group-append d-none d-lg-block">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="la la-search la-flip-horizontal fs-18"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100" style="min-height: 200px">
                            <div class="search-preloader absolute-top-center">
                                <div class="dot-loader"><div></div><div></div><div></div></div>
                            </div>
                            <div class="search-nothing d-none p-3 text-center fs-16">

                            </div>
                            <div id="search-content" class="text-left">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-none d-lg-block ml-auto mr-0">
                    <div class="" id="wishlist">
                        <?php echo $__env->make('frontend.partials.wishlist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

                <div class="d-none d-lg-block align-self-stretch ml-3 mr-0" data-hover="dropdown">
                    <div class="nav-cart-box dropdown h-100" id="cart_items">
                        <?php echo $__env->make('frontend.partials.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<div class="bg-alter d-none d-xl-block position-relative z-1020">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="align-self-stretch category-menu-icon-box mr-auto">
                <div class="h-100 d-flex align-items-center" id="category-menu-icon">
                    <div class="dropdown-toggle navbar-dark bg-primary h-50px rounded-0 c-pointer px-4">
                        <span class="navbar-toggler-icon"></span>
                        <span class="text-uppercase ml-3 text-white fw-600"><?php echo e(translate('All Categories')); ?></span>
                    </div>
                </div>
            </div>
            <?php if(get_setting('header_menu_label') != null): ?>
            <div class="mx-auto">
                <?php $header_menus = json_decode(get_setting('header_menu_label'), true);  ?>
                <ul class="mb-0 list-inline">
                    <?php $__currentLoopData = $header_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-inline-item">
                        <a class="text-reset fw-600 text-uppercase px-3 py-2" href="<?php echo e(json_decode(get_setting('header_menu_link'), true)[$key]); ?>"><?php echo e($value); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <div class="ml-auto fw-600">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(isAdmin()): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-reset py-2 d-inline-block"><?php echo e(translate('My Panel')); ?></a>
                    <?php else: ?>
                        <a href="<?php echo e(route('dashboard')); ?>" class="text-reset py-2 d-inline-block"><?php echo e(translate('My Panel')); ?></a>
                    <?php endif; ?>
                        / <a href="<?php echo e(route('logout')); ?>" class="text-reset py-2 d-inline-block"><?php echo e(translate('Logout')); ?></a>
                <?php else: ?>
                    <a href="<?php echo e(route('user.login')); ?>" class="text-reset py-2 d-inline-block"><?php echo e(translate('Login')); ?></a>
                    / <a href="<?php echo e(route('user.registration')); ?>" class="text-reset py-2 d-inline-block"><?php echo e(translate('Sign Up')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="hover-category-menu position-absolute w-100 top-100 left-0 right-0 d-none z-3" id="hover-category-menu">
        <div class="container">
            <div class="row gutters-10 position-relative">
                <div class="col-lg-3 position-static">
                    <?php echo $__env->make('frontend.partials.category_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php /**PATH /home/shebaco1/public_html/resources/views/frontend/inc/nav.blade.php ENDPATH**/ ?>