<?php
require_once("configs.php"); 
require("functions/armory_func.php");
$page_cat = "services";
  if (isset($_GET['guildid'])){
  $guild = mysql_fetch_assoc(mysql_query("SELECT guildid,name,level FROM $server_cdb.guild WHERE guildid = '".$_GET['guildid']."'"));
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
  <style type="text/css">
    #content .content-top { background: url("wow/static/images/guild/summary/<?php 
							$faction_query = mysql_query("SELECT race FROM $server_cdb.guild_member inner join $server_cdb.characters on guild_member.guid = characters.guid WHERE guildid = '".$_GET['guildid']."' LIMIT 1");
				while($faction = mysql_fetch_assoc($faction_query))		
							echo''.translateBg($faction['race']).''
             ?>") left top no-repeat; }
  </style>
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
  
<div class="content-bot">	



 <div id="content">
      <div class="content-top">
        <div class="content-trail">
          <ol class="ui-breadcrumb">
            <li>
              <a href="index.php" rel="np">
                <?php echo $website['title']; ?>
              </a>
              <span class="breadcrumb-arrow"></span>
            </li>
            <li>
              <a href="services.php" rel="np">
                <?php echo $Services['Services']; ?>
              </a>
              <span class="breadcrumb-arrow"></span>
            </li>
            <li>
              <a href="search.php" rel="np">
                <?php echo $Serv['Serv7']; ?>
              </a>
              <span class="breadcrumb-arrow"></span>
            </li>
            <li>
              <a href="guild.php?guildid="
                <?php echo $_GET['guildid']; ?>" rel="np"><?php echo $guild['name']; ?> @
                <?php
              $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '".$_GET['guildid']."'"));
                if(!$realm_extra) $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '1'"));
                 $realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_extra['realmid']."'"));
                echo $realm['name']; 
            ?>
              </a>
            </li>
            <li class="last children">
              <a href="roster.php?guildid="
                <?php echo $_GET['guildid']; ?>" rel="np"><?php echo $guild1['guild2']; ?>
              </a>
            </li>
          </ol>
        </div>
        <div class="content-bot">


          <div id="profile-wrapper" class="profile-wrapper profile-wrapper-alliance">

            <div class="profile-sidebar-anchor">
              <div class="profile-sidebar-outer">
                <div class="profile-sidebar-inner">
                  <div class="profile-sidebar-contents">



                    <div class="profile-info-anchor profile-guild-info-anchor">
                      <div class="guild-tabard">

                        <canvas id="guild-tabard" width="240" height="240">
                          <div class="guild-tabard-default " ></div>
                        </canvas>
                        <script type="text/javascript">
                          //<![CDATA[
			$(document).ready(function() {
				var tabard = new GuildTabard('guild-tabard', {
					'ring': 'alliance',
					'bg': [ 0, 45 ],
					'border': [ 5, 14 ],
					'emblem': [ 190, 14 ]
				});
			});
        //]]>
                        </script>
                      </div>

                      <div class="profile-info profile-guild-info">
                        <div class="name">
                          <a href="guild.php?guildid=<?php echo $_GET['guildid']; ?>">
                            <?php echo $guild['name']; ?>
                          </a>
                        </div>
                        <div class="under-name">
                          Гильдия <span class="level">
                            <?php echo $guild['level']; ?></span>-го ур. (<?php 
							$faction_query = mysql_query("SELECT race FROM $server_cdb.guild_member inner join $server_cdb.characters on guild_member.guid = characters.guid WHERE guildid = '".$_GET['guildid']."' LIMIT 1");
				while($faction = mysql_fetch_assoc($faction_query))		
							echo''.$armory['Faction'.translateLet($faction['race'])].''
             ?>)<span class="comma">,</span>
                          <span class="realm tip" id="profile-info-realm" data-battlegroup="Вихрь">            <?php
              $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '".$_GET['guildid']."'"));
                if(!$realm_extra) $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '1'"));
                 $realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_extra['realmid']."'"));
                echo $realm['name']; 
            ?></span><span class="comma">.</span>

                          <span class="members">Членов гильдии: 11</span>
                        </div>

                        <div class="achievements">
                          <a href="#">110</a>
                        </div>
                      </div>
                    </div>

                    <ul class="profile-sidebar-menu" id="profile-sidebar-menu">
 
                      <li class=" active">
                        <a href="/guild.php?guildid=<?php echo $_GET['guildid']; ?>" class="" rel="np">
                          <span class="arrow">
                            <span class="icon"> Сводка </span>
                          </span>
                        </a>

                      </li>
                      <li class=" ">
                        <a href="/roster.php?guildid=<?php echo $_GET['guildid']; ?>" class="" rel="np">
                          <span class="arrow">
                            <span class="icon"> Состав </span>
                          </span>
                        </a>

                      </li>
                      <li class="">

                        <a href="/news.php?guildid="
                          <?php echo $_GET['guildid']; ?>" class="" rel="np">
                          <span class="arrow">
                            <span class="icon"> Новости </span>
                          </span>
                        </a>

                      </li>
                      <li class="">

                        <a href="/event.php?guildid="
                          <?php echo $_GET['guildid']; ?>" class=" vault" rel="np">
                          <span class="arrow">
                            <span class="icon"> События </span>
                          </span>
                        </a>

                      </li>
                      <li class="">

                        <a href="/achievement.php?guildid="
                          <?php echo $_GET['guildid']; ?>" class=" has-submenu" rel="np">
                          <span class="arrow">
                            <span class="icon"> Достижения </span>
                          </span>
                        </a>

                      </li>
                      <li class="">

                        <a href="/perk.php?guildid="
                          <?php echo $_GET['guildid']; ?>" class="" rel="np">
                          <span class="arrow">
                            <span class="icon"> Бонусы </span>
                          </span>
                        </a>

                      </li>

                      <li class="">

                        <a href="/reward.php?guildid="
                          <?php echo $_GET['guildid']; ?>" class=" vault" rel="np">
                          <span class="arrow">
                            <span class="icon"> Награды </span>
                          </span>
                        </a>

                      </li>

                      <li class="">

                        <a href="/challenge.php?guildid="
                          <?php echo $_GET['guildid']; ?>" class="" rel="np">
                          <span class="arrow">
                            <span class="icon"> Режим испытаний </span>
                          </span>
                        </a>

                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="profile-contents"> 
              <div class="summary"> 
                <div class="profile-section"> 
                  <div class="summary-right"> 
                    <div class="summary-events">
                      <h3 class="category ">
                        События
                      </h3> 
                      <div class="profile-box-simple"> 
                        Нет событий
                      </div>
                    </div>
                </div> 
                  <div class="summary-left"> 
                    <div class="summary-activity">
                      <h3 class="category ">
                        Последние новости
                      </h3> 
                      <div class="profile-box-simple"> 
                        Нет последних новостей. 
                      </div>
                    </div> 
                  </div> 
                  <span class="clear">
                    <!-- -->
                  </span>
                </div>
              </div> 
            </div> 
            <span class="clear">
              <!-- -->
            </span>
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