<?php
require_once("configs.php");
mysql_select_db($server_cdb);
  if (isset($_GET['guildid'])){
  $guild = mysql_fetch_assoc(mysql_query("SELECT guildid,name,level FROM guild WHERE guildid = '".$_GET['guildid']."'"));
    $guild2 = mysql_fetch_assoc(mysql_query("SELECT U.guid,U.rank,level,race,class,name FROM guild_member U, characters A WHERE A.guid = U.guid = '".$_GET['guildid']."'"));
 if (!$guild['id']){
    $error = true;
  }
  }else{
    $error = true;
  }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
 <html lang="en-gb">
<html>
<head>
<title><?php echo $website['title']; ?> - <?php echo $guild['name']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/index.ico" type="image/x-icon" />
<link rel="stylesheet" href="wow/static/local-common/css/common.css" />
<link title="World of Warcraft - News" href="http://eu.battle.net/wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="wow/static/css/wow.css" />
<link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/guild/roster.css?v33" />
<link rel="stylesheet" href="wow/static/css/armory/profile.css" />
<link rel="stylesheet" href="wow/static/css/guild/guild.css" />
<link rel="stylesheet" href="wow/static/css/guild/summary.css" />
<script src="wow/static/local-common/js/third-party/jquery6cc4.js"></script>
<script src="wow/static/local-common/js/core6cc4.js"></script>
<script src="wow/static/local-common/js/tooltip6cc4.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
</head>
<body class=" logged-in">
  <div id="wrapper">
<?php include("header.php"); ?>

<div id="content">
<div class="content-top">
<div class="content-bot">	


	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-alliance">

		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">

		<div class="profile-sidebar-tabard">

			<div class="profile-sidebar-info">
				<div class="name"><a href="#"><?php echo $guild['name']; ?></a></div>

        <div class="under-name"> Гильдия <span class="level">
            <strong>
              <?php echo $guild['level']; ?>
            </strong>
          </span>-го ур. (<span class="faction">-</span>)
        </div>

        <div class="realm">
					<span id="profile-info-realm" class="tip" data-battlegroup="Вихрь">
            <?php
              $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '".$_GET['guildid']."'"));
                if(!$realm_extra) $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '1'"));
                 $realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_extra['realmid']."'"));
                echo $realm['name']; 
            ?>
          </span>
				</div> 
			</div> 
		</div>
	
	<ul class="profile-sidebar-menu" id="profile-sidebar-menu">

			<li class="">
<a href="#" class="back-to" rel="np"><span class="arrow"><span class="icon">-</span></span></a>
      </li>
			<li class=" active">
		<a href="/guild.php?guildid=<?php echo $_GET['guildid']; ?>" class="" rel="np">
			<span class="arrow"><span class="icon"> Сводка </span>
      </span>
		</a>

			</li>
			<li class=" ">
		<a href="/roster.php?guildid=<?php echo $_GET['guildid']; ?>" class="" rel="np">
      <span class="arrow"><span class="icon"> Состав </span></span>
		</a>

			</li>
			<li class="">

		<a href="/news.php?guildid=<?php echo $_GET['guildid']; ?>" class="" rel="np">
			<span class="arrow"><span class="icon"> Новости </span></span>
		</a>

			</li>
			<li class="">

		<a href="/event.php?guildid=<?php echo $_GET['guildid']; ?>" class=" vault" rel="np">
			<span class="arrow"><span class="icon"> События </span></span>
		</a>

			</li>
			<li class="">

		<a href="/achievement.php?guildid=<?php echo $_GET['guildid']; ?>" class=" has-submenu" rel="np">
			<span class="arrow"><span class="icon"> Достижения </span></span>
		</a>

			</li>
			<li class="">

		<a href="/perk.php?guildid=<?php echo $_GET['guildid']; ?>" class="" rel="np">
			<span class="arrow"><span class="icon"> Бонусы </span></span>
		</a>

			</li>

			<li class="">

		<a href="/reward.php?guildid=<?php echo $_GET['guildid']; ?>" class=" vault" rel="np">
			<span class="arrow"><span class="icon"> Награды </span></span>
		</a>

			</li>

			<li class="">

		<a href="/challenge.php?guildid=<?php echo $_GET['guildid']; ?>" class="" rel="np">
			<span class="arrow"><span class="icon"> Режим испытаний </span></span>
		</a>

			</li>
	</ul>

					</div>
				</div>
			</div>
		</div>
		

    
    
    
    
    
	<span class="clear"><!-- --></span>
	</div>

</div>
</div>
</div>

<?php include("footer.php"); ?>



</body>
</html>