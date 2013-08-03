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


                    <div class="summary-characterspecific">

                      <div class="summary-character">
                        <a class="avatar" href="/wow/ru/character/дракономор/%D0%9A%D0%B8%D1%82%D1%82%D0%BD%D0%B5%D1%81/" rel="np" style="background-image: url('http://eu.battle.net/static-render/eu/fordragon/120/73546616-avatar.jpg?alt=/wow/static/images/2d/avatar/22-1.jpg');"></a>
                        <div class="rest">
                          <div class="name">
                            <a href="/wow/ru/character/дракономор/%D0%9A%D0%B8%D1%82%D1%82%D0%BD%D0%B5%D1%81/" rel="np">Киттнес</a>
                          </div>
                          <div class="reputation">
                            <div class="guild-progress guild-replevel-7">
                              <span class="description">
                                Репутация:
                                <strong>Превознесение</strong>
                              </span>



                              <div class="profile-progress border-2 completed" >
                                <div class="bar border-2 hover" style="width: 100%"></div>
                                <div class="bar-contents">
                                  999 / 999 (100%)
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <span class="clear">
                          <!-- -->
                        </span>
                      </div> 

                      <div class="summary-simple-list summary-rewards">
                        <h3 class="category ">
                          Недавно полученнные награды
                        </h3>

                        <div class="profile-box-simple">

                          <ul>
                            <li>
                              <a href="/wow/ru/item/62038">
                                <span class="icon">




                                  <span class="icon-frame frame-27 ">
                                    <img src="http://media.blizzard.com/wow/icons/36/inv_misc_cape_19.jpg" alt="" width="27" height="27" />
                                  </span>
                                </span>
                                <span class="name color-q7">
                                  Поношенный плащ каменной горгульи
                                </span>
                                <span class="clear">
                                  <!-- -->
                                </span>
                              </a>
                            </li>
                            <li>
                              <a href="/wow/ru/item/62039">
                                <span class="icon">




                                  <span class="icon-frame frame-27 ">
                                    <img src="http://media.blizzard.com/wow/icons/36/inv_misc_cape_20.jpg" alt="" width="27" height="27" />
                                  </span>
                                </span>
                                <span class="name color-q7">
                                  Унаследованная накидка черного барона
                                </span>
                                <span class="clear">
                                  <!-- -->
                                </span>
                              </a>
                            </li>
                            <li>
                              <a href="/wow/ru/item/62040">
                                <span class="icon">




                                  <span class="icon-frame frame-27 ">
                                    <img src="http://media.blizzard.com/wow/icons/36/inv_misc_cape_05.jpg" alt="" width="27" height="27" />
                                  </span>
                                </span>
                                <span class="name color-q7">
                                  Древний плащ Кровавой Луны
                                </span>
                                <span class="clear">
                                  <!-- -->
                                </span>
                              </a>
                            </li>
                          </ul>

                          <div class="profile-linktomore">
                            <a href="/wow/ru/vault/guild/reward" rel="np">Все награды</a>
                          </div>

                          <span class="clear">
                            <!-- -->
                          </span>


                        </div>
                      </div>
                      <span class="clear">
                        <!-- -->
                      </span>

                    </div>


                    <div class="summary-events">
                      <h3 class="category ">
                        События
                      </h3>

                      <div class="profile-box-simple">

                        Нет событий
                      </div>
                    </div>


                    <div class="summary-simple-list summary-perks">
                      <h3 class="category ">
                        Бонусы
                      </h3>

                      <div class="profile-box-simple">

                        <ul> 
                          <li>

                            <a href="/wow/ru/guild/%D0%B4%D1%80%D0%B0%D0%BA%D0%BE%D0%BD%D0%BE%D0%BC%D0%BE%D1%80/%D0%A1%D0%B8%D0%B1%D0%B8%D1%80%D1%81%D0%BA%D0%B8%D0%B9_%D0%90%D0%B2%D0%B0%D0%BD%D0%B3%D0%B0%D1%80%D0%B4/perk#p9">

                              <span class="icon-wrapper"> 
                                <span  class="icon-frame frame-36 " style='background-image: url("http://media.blizzard.com/wow/icons/36/achievement_guild_doctorisin.jpg");'>
                                </span>
                                <span class="symbol"></span>
                              </span>
                              <div class="text">
                                <strong>Доктора вызывали? </strong>
                                <span class="desc" title="Эффективность исцеления при применении бинтов увеличивается на 25%. Не работает на аренах и полях боя.">Эффективность исцеления при применении бинтов увеличивается на 25%. Не рабо…</span>
                              </div>

                              <span class="type">Уровень 10</span>
                              <span class="clear">
                                <!-- -->
                              </span>

                            </a>
                          </li>


                          <li class="locked">

                            <a href="/wow/ru/guild/%D0%B4%D1%80%D0%B0%D0%BA%D0%BE%D0%BD%D0%BE%D0%BC%D0%BE%D1%80/%D0%A1%D0%B8%D0%B1%D0%B8%D1%80%D1%81%D0%BA%D0%B8%D0%B9_%D0%90%D0%B2%D0%B0%D0%BD%D0%B3%D0%B0%D1%80%D0%B4/perk#p10">

                              <span class="icon-wrapper">





                                <span  class="icon-frame frame-36 " style='background-image: url("http://media.blizzard.com/wow/icons/36/achievement_guildperk_mobilebanking.jpg");'>
                                </span>
                                <span class="symbol"></span>
                              </span>
                              <div class="text">
                                <strong>Мобильный банк </strong>
                                <span class="desc" title="Вызов гильдейского сундука, с помощью которого можно в течение 5 мин. пользоваться банком гильдии. Для пользования сундуком необходима репутация в гильдии &quot;Дружелюбие&quot; или лучше.">Вызов гильдейского сундука, с помощью которого можно в течение 5 мин. польз…</span>
                              </div>

                              <span class="type">Уровень 11</span>
                              <span class="clear">
                                <!-- -->
                              </span>

                            </a>
                          </li> 

                        </ul>

                        <div class="profile-linktomore">
                          <a href="/wow/ru/guild/%D0%B4%D1%80%D0%B0%D0%BA%D0%BE%D0%BD%D0%BE%D0%BC%D0%BE%D1%80/%D0%A1%D0%B8%D0%B1%D0%B8%D1%80%D1%81%D0%BA%D0%B8%D0%B9_%D0%90%D0%B2%D0%B0%D0%BD%D0%B3%D0%B0%D1%80%D0%B4/perk" rel="np">Все бонусы</a>
                        </div>

                        <span class="clear">
                          <!-- -->
                        </span>
                      </div>
                    </div>


                    <div class="summary-weekly-contributors">
                      <h3 class="category ">
                        Самые активные члены гильдии
                      </h3>

                      <div class="profile-box-simple">

                        Еженедельные вклады в развитие гильдии еще не учтены.

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

          <script type="text/javascript">
            //<![CDATA[
		$(function() {
			Profile.url = '/wow/ru/guild/%D0%B4%D1%80%D0%B0%D0%BA%D0%BE%D0%BD%D0%BE%D0%BC%D0%BE%D1%80/%D0%A1%D0%B8%D0%B1%D0%B8%D1%80%D1%81%D0%BA%D0%B8%D0%B9_%D0%90%D0%B2%D0%B0%D0%BD%D0%B3%D0%B0%D1%80%D0%B4/summary';
		});

			var MsgProfile = {
				tooltip: {
					feature: {
						notYetAvailable: "Эта функция пока недоступна."
					},
					vault: {
						character: "Этот раздел доступен только для авторизованных пользователей.",
						guild: "Этот раздел доступен, только если вы авторизовались с персонажа — члена данной гильдии."
					}
				}
			};
        //]]>
          </script>

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