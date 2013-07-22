<?php
require_once("configs.php");
$page_cat = "community";
?>
<HTML>
<head>
<title><?php echo $website['title']; ?> - <?php echo $Community['Community']; ?></title>
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/index.ico" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css?v15" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie.css?v15" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie6.css?v15" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie7.css?v15" /><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow.css?v3" />
<link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/cms.css?v33" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/community/community-index.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/community/community-ie.css?v3" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/community/community-ie6.css?v3" /><![endif]-->
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow-ie.css?v3" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow-ie6.css?v3" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow-ie7.css?v3" /><![endif]-->
<style type="text/css">
.bnr04 .banner-title, .bnr04 .banner-desc, .bnr04:hover .banner-desc  {color:#625841;}
.bnr04 {border:1px solid #261e16; cursor:default;}
.bnr04:hover {background-position:0 0; border:1px solid #261e16; cursor:default;}
</style>
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/core.js?v15"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js?v15"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]></script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = 'wow/static';
Core.baseUrl = 'wow/en';
Core.project = 'wow';
Core.locale = 'en-gb'
Core.buildRegion = 'eu';
Core.loggedIn = true;
Flash.videoPlayer = 'http://eu.media.blizzard.com/wow/player/videoplayer.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/wow/player/rating-pegi.jpg';
//]]>
</script>
<body class="en-gb community-home"><div id="predictad_div" class="predictad" style="display: none; left: 788px; top: 104px; width: 321px; "></div>

<div id="wrapper">
<?php
include("header.php");
?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li><a href="index.php" rel="np"><?php echo $website['title']; ?></a></li>
<li class="last"><a href="community.php" rel="np"><?php echo $Community['Community']; ?></a></li>
</ol>
</div>
<div class="content-bot">	
	
	<div id="left">
		<div class="profiles">
			<h4><?php echo $Community['Community']; ?></h4>
			<div class="profiles-section">

	<div class="sidebar-module " id="sidebar-profiles-search">
			<div class="sidebar-title">
	<h3 class="category title-profiles-search"><?php echo $Community['prof']; ?></h3>
			</div>

		<div class="sidebar-content">
					<div class="profiles-search-block">
						<span class="profiles-search-title"><?php echo $Community['Char']; ?></span>
						<form action="search_c.php" method="get">
							<input type="hidden" name="f" value="wowcharacter" />
							<input type="text" id="wowcharacter" name="search" />

	<button class="ui-button button1 " type="submit" >
		<span>
			<span><?php echo $Ind['Ind2']; ?></span>
		</span>
	</button>

						</form>
					</div>
					<div class="profiles-search-block">
						<span class="profiles-search-title"><?php echo $Community['Guild']; ?></span>
						<form action="search_g.php" method="get">
							<input type="hidden" name="f" value="wowguild" />
							<input type="text" id="wowguild" name="search" />
							

	<button class="ui-button button1 " type="submit" >
		<span>
			<span><?php echo $Ind['Ind2']; ?></span>
		</span>
	</button>

						</form>
					</div>
		</div>
	</div>
				<p class="profiles-tip"><?php echo $Community['Community2']; ?></p>
	<span class="clear"><!-- --></span>


						</form>
		</div>

</div>
</div>
	

	<div class="community-content-body">
		<div class="body-wrapper">
			<div class="content-wrapper">
				
				<div class="outside-col">
					<div class="outside-section social-media">
						<div class="title-block">
							<span class="title"><?php echo $Community['comm9']; ?></span>
						<span class="clear"><!-- --></span>
						</div>
						<div class="content-block">
							<ul>
								<li><a href="<?php echo $comun_link['Facebook']; ?>" class="facebook" target="_blank"><span class="content-title"><?php echo $website['title']; ?> <?php echo $Community['comm16']; ?></span><span class="content-desc"><?php echo $Community['comm10']; ?></span></a></li>
								<li><a href="<?php echo $comun_link['Twitter']; ?>" class="Twitter" target="_blank"><span class="content-title"><?php echo $website['title']; ?> <?php echo $Community['comm17']; ?></span><span class="content-desc"><?php echo $Community['comm11']; ?></span></a></li>
								<li><a href="<?php echo $comun_link['Youtube']; ?>" class="Youtube" target="_blank"><span class="content-title"><?php echo $website['title']; ?> <?php echo $Community['comm18']; ?></span><span class="content-desc"><?php echo $Community['comm12']; ?></span></a></li>
								<li><a href="<?php echo $comun_link['vk']; ?>" class="vk" target="_blank"><span class="content-title"><?php echo $website['title']; ?> <?php echo $Community['comm15']; ?></span><span class="content-desc"><?php echo $Community['comm14']; ?></span></a></li>
								
						</div>
						<span class="clear"><!-- --></span>
				</div>
					
				</div>
				<div class="inside-col">				
					<div class="official-content">
						<div class="inside-section contests">
							<a href="javascript:;" target="_blank" class="main-link" style="background-image:url('wow/static/images/community/thumbnails/thumb-contests.jpg');">
								<span>
									<span class="wrapper">
										<span class="banner-title"><?php echo $Community['comm1']; ?></span>
										<span class="banner-desc"><?php echo $Community['comm2']; ?></span>
									</span>
								</span>
							</a>
						</div>
						
						<div class="inside-section forum">
							<a href="javascript:;" class="main-link" style="background-image:url('wow/static/images/community/thumbnails/thumb-forum.jpg');">
								<span>
									<span class="wrapper">
										<span class="banner-title"><?php echo $Forums['Forums']; ?> </span>
										<span class="banner-desc"><?php echo $Community['comm3']; ?><?php echo $website['title']; ?><?php echo $Community['comm4']; ?></span>
									</span>
								</span>
							</a>
						</div>
						
						<span class="clear"><!-- --></span>
						
						<div class="inside-section fanart">

                                <?php
								$consulta0 = mysql_query(" SELECT * FROM media WHERE visible = 1 AND type = '3'");
								$totalSql = mysql_num_rows($consulta0);
								?>

							<a href="media/images_index.php?type=3" class="main-link" style="background-image:url('wow/static/images/community/thumbnails/thumb-fanart.jpg');">
								<span class="panel">
									<span class="wrapper">
										<span class="banner-title"><?php echo $Community['FanArt']; ?><em><span class="total">(<?php echo $totalSql; ?>)</span></em></span>
										<span class="view-all"><?php echo $View_all['View_all']; ?></span>
									</span>
								</span>
							</a>
								<a href="media/send_media.php" class="tosubmit external"><?php echo $Community['comm5']; ?></a>
						</div>
						



						<div class="inside-section comics">
							<a href="media/images_index.php?type=4" class="main-link" style="background-image:url('wow/static/images/community/thumbnails/thumb-comics.jpg');">

                                <?php
								$consulta0 = mysql_query(" SELECT * FROM media WHERE visible = 1 AND type = '4'");
								$totalSql = mysql_num_rows($consulta0);
								?>
								<span class="panel">
									<span class="wrapper">
										<span class="banner-title"><?php echo $Media['Comics']; ?> <em><span class="total">(<?php echo $totalSql; ?>)</span></em></span>
										<span class="view-all"><?php echo $View_all['View_all']; ?></span>
									</span>
								</span>
							</a>
								<a href="/media/send_media.php" class="tosubmit external"><?php echo $Community['comm6']; ?></a>
						</div>
						
						<span class="clear"><!-- --></span>
						
						<div class="inside-section screenshot">
							<a href="media/images_index.php?type=2" class="main-link" style="background-image:url('wow/static/images/community/thumbnails/thumb-screenshot.jpg');">
								<span class="panel">
									<span class="wrapper">

                                <?php
								$consulta0 = mysql_query(" SELECT * FROM media WHERE visible = 1 AND type = '2'");
								$totalSql = mysql_num_rows($consulta0);
								?>

										<span class="banner-title"><?php echo $Community['Screenshots']; ?> <em><span class="total">(<?php echo $totalSql; ?>)</span></em></span>
										<span class="view-all"><?php echo $View_all['View_all']; ?></span>
									</span>
								</span>
							</a>
								<a href="media/send_media.php" class="tosubmit external"><?php echo $Community['comm7']; ?></a>
						</div>
						
						<div class="inside-section wallpaper">
							<a href="media/images_index.php?type=1" class="main-link" style="background-image:url('wow/static/images/community/thumbnails/thumb-wallpaper.jpg');">
								<span class="panel">
									<span class="wrapper">
                                <?php
								$consulta0 = mysql_query(" SELECT * FROM media WHERE visible = 1 AND type = '1'");
								$totalSql = mysql_num_rows($consulta0);
								?>

										<span class="banner-title"><?php echo $Community['Wallpap']; ?> <em><span class="total">(<?php echo $totalSql; ?>)</span></em></span>
										<span class="view-all"><?php echo $View_all['View_all']; ?></span>
									</span>
								</span>
							</a>
								<a href="media/send_media.php" class="tosubmit external"><?php echo $Community['comm8']; ?></a>
						</div>
						
						<span class="clear"><!-- --></span>
					</div>	
				</div>
			</div>		
		</div>	
	</div>
			
	<span class="clear"><!-- --></span>
</div>
</div>
</div>
<?php include("footer.php"); ?>
<div id="fansite-menu" class="ui-fansite"></div><div id="menu-container"></div><ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" role="listbox" aria-activedescendant="ui-active-menuitem" style="z-index: 6; top: 0px; left: 0px; display: none; "></ul></body>
</html>