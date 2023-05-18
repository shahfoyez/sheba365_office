<section class="bg-white border-top mt-auto">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('terms') }}">
                    <i class="la la-file-text la-3x text-alter-2 mb-2"></i>
                    <h4 class="h6">{{ translate('Terms & conditions') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('returnpolicy') }}">
                    <i class="la la-mail-reply la-3x text-alter-2 mb-2"></i>
                    <h4 class="h6">{{ translate('Return Policy') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('supportpolicy') }}">
                    <i class="la la-support la-3x text-alter-2 mb-2"></i>
                    <h4 class="h6">{{ translate('Support Policy') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left border-right text-center p-4 d-block" href="{{ route('privacypolicy') }}">
                    <i class="las la-exclamation-circle la-3x text-alter-2 mb-2"></i>
                    <h4 class="h6">{{ translate('Privacy Policy') }}</h4>
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
                    <a href="{{ route('home') }}" class="d-block">
                        @if(get_setting('footer_logo') != null)
                            <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset(get_setting('footer_logo')) }}" alt="{{ env('APP_NAME') }}" height="56">
                        @else
                            <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" height="44">
                        @endif
                    </a>
                    <div class="my-3">
                        @php
                            echo get_setting('about_us_description');
                        @endphp
                    </div>
                    <ul class="list-inline my-3 my-md-0 social colored text-center">
                        @if ( get_setting('facebook_link') !=  null )
                        <li class="list-inline-item">
                            <a href="{{ get_setting('facebook_link') }}" target="_blank" class="facebook"><i class="lab la-facebook-f"></i></a>
                        </li>
                        @endif
                        @if ( get_setting('twitter_link') !=  null )
                        <li class="list-inline-item">
                            <a href="{{ get_setting('twitter_link') }}" target="_blank" class="twitter"><i class="lab la-twitter"></i></a>
                        </li>
                        @endif
                        @if ( get_setting('instagram_link') !=  null )
                        <li class="list-inline-item">
                            <a href="{{ get_setting('instagram_link') }}" target="_blank" class="instagram"><i class="lab la-instagram"></i></a>
                        </li>
                        @endif
                        @if ( get_setting('youtube_link') !=  null )
                        <li class="list-inline-item">
                            <a href="{{ get_setting('youtube_link') }}" target="_blank" class="youtube"><i class="lab la-youtube"></i></a>
                        </li>
                        @endif
                        @if ( get_setting('linkedin_link') !=  null )
                        <li class="list-inline-item">
                            <a href="{{ get_setting('linkedin_link') }}" target="_blank" class="linkedin"><i class="lab la-linkedin-in"></i></a>
                        </li>
                        @endif
                    </ul>
                    
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="text-center text-xl-left">
                    <ul class="list-inline long-gap mt-4">
                        @if ( get_setting('widget_one_labels') !=  null )
                            @foreach (json_decode( get_setting('widget_one_labels'), true) as $key => $value)
                            <li class="list-inline-item">
                                <a href="{{ json_decode( get_setting('widget_one_links'), true)[$key] }}" class="text-reset">
                                    {{ $value }}
                                </a>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="text-center text-xl-right">
                    <ul class="list-inline my-4">
                        @if ( get_setting('payment_method_images') !=  null )
                            @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)
                                <li class="list-inline-item">
                                    <img src="{{ uploaded_asset($value) }}" height="40" class="mw-100">
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="py-5 py-xl-4 bg-alter">
    <div class="container">
        <div class="text-center">
            @php
                echo get_setting('frontend_copyright_text');
            @endphp
        </div>
    </div>
</footer>


<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white ">
    <div class="d-flex justify-content-around align-items-center">
        <a href="{{ route('home') }}" class="flex-grow-1 text-center py-2 {{ areActiveRoutes(['home'],'text-primary')}}">
            <i class="las la-home fs-20"></i>
            <span class="d-block fs-11 fw-600">{{ translate('Home') }}</span>
        </a>
        <a href="javascript:void(0)" class="text-reset flex-grow-1 text-center py-2 mobile-category-trigger" data-toggle="class-toggle" data-target=".mobile-category-sidebar">
            <i class="las la-list-ul fs-20"></i>
            <span class="d-block fs-11 fw-600">{{ translate('Categories') }}</span>
        </a>
        <a href="{{ route('cart') }}" class="flex-grow-1 text-center py-2 {{ areActiveRoutes(['cart'],'text-primary')}}">
            <i class="las la-shopping-cart fs-20"></i>
            <span class="d-block fs-11 fw-600">
                {{ translate('Cart') }}
                @if(Session::has('cart'))
                <span class="" id="cart_items_sidenav">({{ count(Session::get('cart'))}})</span>
                @else
                    <span class="" id="cart_items_sidenav">(0)</span>
                @endif
            </span>
        </a>
        @if (Auth::check())
            @if(isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="text-reset flex-grow-1 text-center py-2">
                    <span class="d-block mx-auto mb-1">
                        @if(Auth::user()->photo != null)
                            <img src="{{ custom_asset(Auth::user()->avatar_original)}}" class="rounded-circle size-20px">
                        @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="rounded-circle size-20px">
                        @endif
                    </span>
                    <span class="d-block fs-11 fw-600">{{ translate('Account') }}</span>
                </a>
            @else
                <a href="javascript:void(0)" class="text-reset flex-grow-1 text-center py-2 mobile-side-nav-thumb" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav">
                    <span class="d-block mx-auto mb-1">
                        @if(Auth::user()->photo != null)
                            <img src="{{ custom_asset(Auth::user()->avatar_original)}}" class="rounded-circle size-20px">
                        @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="rounded-circle size-20px">
                        @endif
                    </span>
                    <span class="d-block fs-11 fw-600">{{ translate('Account') }}</span>
                </a>
            @endif
        @else
            <a href="{{ route('user.login') }}" class="text-reset flex-grow-1 text-center py-2">
                <span class="d-block mx-auto mb-1">
                    <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="rounded-circle size-20px">
                </span>
                <span class="d-block fs-11 fw-600">{{ translate('Account') }}</span>
            </a>
        @endif
    </div>
</div>
@if (Auth::check() && !isAdmin())
    <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
        <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
        <div class="collapse-sidebar bg-white">
            @include('frontend.inc.user_side_nav')
        </div>
    </div>
@endif

<div class="mobile-category-sidebar collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
    <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-target=".mobile-category-sidebar" data-same=".mobile-category-trigger"></div>
    <div class="collapse-sidebar bg-white">
        <div class="pt-4 position-relative z-1 shadow-sm">
            <div class="px-4">
                <h4 class="fw-600 h5">{{ translate('All Categories') }}</h4>
            </div>
            <div class="absolute-top-right">
                <button class="btn btn-sm p-2" data-toggle="class-toggle" data-target=".mobile-category-sidebar" data-same=".mobile-category-trigger">
                    <i class="las la-times la-2x"></i>
                </button>
            </div>
            <div>
                @foreach (\App\Category::where('level', 0)->orderBy('name', 'asc')->get() as $key => $category)
                    <div class="mt-3">
                        <div class="p-3 border-bottom fs-16 fw-600">
                            <a href="{{ route('products.category', $category->slug) }}" class="text-reset">{{  $category->getTranslation('name') }}</a>
                        </div>
                        <div class="p-3 p-lg-4">
                            @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category->id) as $key => $first_level_id)
                            <div class="">
                                <h6 class="mb-3"><a class="text-reset fw-600 fs-14" href="{{ route('products.category', \App\Category::find($first_level_id)->slug) }}">{{ \App\Category::find($first_level_id)->getTranslation('name') }}</a></h6>
                                <ul class="mb-3 list-unstyled pl-2">
                                    @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($first_level_id) as $key => $second_level_id)
                                    <li class="mb-2">
                                        <a class="text-reset" href="{{ route('products.category', \App\Category::find($second_level_id)->slug) }}" >{{ \App\Category::find($second_level_id)->getTranslation('name') }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
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
