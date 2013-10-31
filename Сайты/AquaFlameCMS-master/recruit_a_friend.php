<?php
require_once("configs.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" xmlns:xml="http://www.w3.org/XML/1998/namespace" class="chrome chrome8">
<head>
<title><?php echo $website['title']; ?> - <?php echo $Services['Services']; ?></title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/index.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css?v15" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie.css?v17" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie6.css?v17" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie7.css?v17" /><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow.css?v7" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/shop/recruit-a-friend.css?v33" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie.css?v7" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie6.css?v7" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie7.css?v7" /><![endif]-->
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/core.js?v15"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js?v15"></script>

<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '/wow/static';
Core.sharedStaticUrl= '/wow/static/local-common';
Core.baseUrl = '/wow/en';
Core.project = 'wow';
Core.locale = 'en-gb';
Core.buildRegion = 'eu';
Core.loggedIn = false;
Flash.videoPlayer = 'http://eu.media.blizzard.com/wow/player/videoplayer.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
Flash.ratingImage = '../../../eu.media.blizzard.com/wow/player/rating-pegi.jpg';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_trackPageview']);
//]]>
</script>

<body class=" recruid-a-friend logged-in">
<div id="wrapper">
<?php $page_cat="services"; include("header.php"); ?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li><a href="index.php" rel="np"><?php echo $website['title']; ?></a></li>
<li><a href="services.php" rel="np"><?php echo $Serv['Serv']; ?></a></li>
<li class="last"><a href="recruit-a-friend.php" rel="np"><?php echo $ha['ha24']; ?></a></li>
</ol>
</div>
<div class="content-bot">	
	<div class="summary-div">
		<div class="page-titles">
			<span><?php echo $ha['ha24']; ?></span>
			<em><?php echo $Serv['info1']; ?></em>
		</div>
		<div class="button-section">
			

	<a class="ui-button button4 button-apply " href="raf-invite.php" >
		<span>
			<span><?php echo $Serv['info2']; ?></span>
		</span>
	</a>

				
	<a class="ui-cancel " href="#" >
		<span><?php echo $Serv['read']; ?></span>
	</a>

		</div>
    </div>
	
	<div class="summary-div-top">
		<div class="step-1">
			<h1><?php echo $Serv['info2']; ?></h1>
			<p><?php echo $Serv['info3']; ?></p>
		</div>
		<div class="step-2">
			<h1><?php echo $Serv['info4']; ?></h1>
			<p><?php echo $Serv['info5']; ?></p>
			<p class="summon"><?php echo $Serv['info6']; ?></p>
			<p class="bonus"><?php echo $Serv['info7']; ?></p>
		</div>
		<div class="step-3">
			<h1><?php echo $Serv['info8']; ?></h1>
			<p>Е<?php echo $Serv['info9']; ?></p>
			<p><?php echo $Serv['info10']; ?></p>
			<p class="mount"><a class="color-q4" href="/wow/ru/item/83086">Сердце Крыла Ночи</a></p>
		</div>
		
	</div>
	
	<div class="summary-div-bottom">
	
		<div class="desc">
			<p><?php echo $Serv['info11']; ?></p>
			<p><?php echo $Serv['info12']; ?> <a href="account_log.php"><?php echo $Serv['info13']; ?></a> <?php echo $Serv['info14']; ?><a href="#"><?php echo $Serv['info15']; ?></a><?php echo $Serv['info16']; ?></p>
			<p><?php echo $Serv['info17']; ?></p>
			<p><?php echo $Serv['info18']; ?></p>
	
			<div class="button-section">
	<table class="dynamic-center ">
		<tr>
			<td>					

	<a class="ui-button button4 button-apply " href="raf-invite.php" >
		<span>
			<span><?php echo $Serv['info2']; ?></span>
		</span>
	</a>

					
	<a class="ui-cancel " href="#" >
		<span><?php echo $Serv['read']; ?></span>
	</a>

</td>
		</tr>
	</table>
			</div>
		</div>
		
	</div>	
</div>
</div>
</div>

<?php include("footer.php"); ?>
<div id="fansite-menu" class="ui-fansite"></div><div id="menu-container"></div><ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" role="listbox" aria-activedescendant="ui-active-menuitem" style="z-index: 6; top: 0px; left: 0px; display: none; "></ul></body>
</html>