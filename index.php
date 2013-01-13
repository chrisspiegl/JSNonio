<?php
	require_once('./config.php');
?>

<!doctype html>
<html lang="en" manifest="NonioGameDotCom.appcache">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="apple-touch-icon" href="<?=ASSETSPATH;?>img/icon-v2.png"/>
	<link rel="apple-touch-startup-image" href="<?=ASSETSPATH;?>img/icon-v2.png" />
	
	<link rel="stylesheet" href="<?=ASSETSPATH;?>css/style.css" type="text/css" media="screen, mobile" title="main" charset="utf-8">
	
	<title>NonioGame.com</title>
</head>

<body>
<header>
	<h1><a href="<?=SITEURL;?>">NonioGame.com</a></h1>
</header>

<article>
	<h2>The rules:</h2>
	<p>The goal is to remove all numbers from the table. You can remove numbers in the two following cases:</p>
	<ul>
		<li>The numbers are next to each other and the sum is 10.</li>
		<li>The numbers are next to each other and are equal.</li>
	</ul>
	<p>You can remove numbers vertically, horizontally and in reading direction over row endings.</p>
	<p><a class="hide" title="Hide the Rules" href="javascript:void(0);">Hide Rules</a></p>
</article>




<div id="grid"></div>
<div id="buttons">
	<a id="reprint" href="">Reprint</a>
	<a id="restart" href="">Restart</a>
</div>





<footer>
	<p><small>Copyright <a href="http://CHRISSP.com" title="CHRISSP.com">CHRISSP.com</a> <?=date('Y');?>. All Rights Reserved.</small></p>
</footer>

<!-- here comes the javascript -->

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='<?=ASSETSPATH;?>js/jquery-1.7.1.min.js'>\x3C/script>")</script-->


<script src="<?=ASSETSPATH;?>js/jquery-1.7.1.min.js"></script>
<script src="<?=ASSETSPATH;?>js/jquery.ba-throttle-debounce.min.js"></script>
<script src="<?=ASSETSPATH;?>js/functions.js"></script>
<!--script src="<?=ASSETSPATH;?>js/offlinetest.js"></script-->

<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
	 
<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
-->
</body>
</html>