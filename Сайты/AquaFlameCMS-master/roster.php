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
<script src="wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="wow/static/local-common/js/core.js?v17"></script>
<script src="wow/static/local-common/js/tooltip.js?v17"></script>
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
  <div class="content-trail">
    <ol class="ui-breadcrumb">
      <li>
        <a href="index.php" rel="np">
          <?php echo $website['title']; ?>
        </a>
        <span class="breadcrumb-arrow"></span>
      </li>
      <li>
        <a href="services.php" rel="np"><?php echo $Services['Services']; ?></a>
        <span class="breadcrumb-arrow"></span>
      </li>
      <li>
        <a href="search.php" rel="np"><?php echo $Serv['Serv7']; ?></a>
        <span class="breadcrumb-arrow"></span>
      </li>
      <li>
        <a href="guild.php?guildid=<?php echo $_GET['guildid']; ?>" rel="np"><?php echo $guild['name']; ?> @ 
        <?php
              $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '".$_GET['guildid']."'"));
                if(!$realm_extra) $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '1'"));
                 $realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_extra['realmid']."'"));
                echo $realm['name']; 
            ?>
        </a>
      </li>
      <li class="last children">
        <a href="roster.php?guildid=<?php echo $_GET['guildid']; ?>" rel="np"><?php echo $guild1['guild2']; ?></a>
      </li>
    </ol>
  </div>
<div class="content-bot">	


	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-alliance">

		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">

		<div class="profile-sidebar-tabard">

			<div class="profile-sidebar-info">
				<div class="name">
          <a href="guild.php?guildid=<?php echo $_GET['guildid']; ?>" rel="np"><?php echo $guild['name']; ?></a>
          </div>

        <div class="under-name"><?php echo $guild1['guild']; ?><span class="level">
          <strong><?php echo $guild['level']; ?></strong></span>-го ур. (<?php
            mysql_select_db($server_cdb);
							$faction_query = mysql_query("SELECT race FROM guild_member inner join characters on guild_member.guid = characters.guid WHERE guildid = '".$_GET['guildid']."' LIMIT 1");
				while($faction = mysql_fetch_assoc($faction_query))		
							echo''.$armory['Faction'.translateLet($faction['race'])].''
             ?>)
        </div>

        <div class="realm">
					<span id="profile-info-realm" class="tip" data-battlegroup="Вихрь">
            <?php echo $realm['name']; ?>
          </span>
				</div> 
			</div> 
		</div>
	
	<ul class="profile-sidebar-menu" id="profile-sidebar-menu">

			<li class="">
    <a href="#" class="back-to" rel="np"><span class="arrow"><span class="icon">-</span></span></a>
      </li>
			<li class="">
		<a href="/guild.php?guildid=<?php echo $_GET['guildid']; ?>" class="" rel="np">
			<span class="arrow"><span class="icon"><?php echo $guild1['guild1']; ?></span>
      </span>
		</a>
			</li>
			<li class=" active">
		<a href="/roster.php?guildid=<?php echo $_GET['guildid']; ?>" class="" rel="np">
      <span class="arrow"><span class="icon"><?php echo $guild1['guild2']; ?></span></span>
		</a>
			</li>
			<li class="">
		<a href="/news.php?guildid=<?php echo $_GET['guildid']; ?>" class="" rel="np">
			<span class="arrow"><span class="icon"><?php echo $guild1['guild3']; ?></span></span>
		</a>
			</li>
			<li class="">
		<a href="/event.php?guildid=<?php echo $_GET['guildid']; ?>" class=" vault" rel="np">
			<span class="arrow"><span class="icon"><?php echo $guild1['guild4']; ?></span></span>
		</a>
			</li>
			<li class="">
		<a href="/achievement.php?guildid=<?php echo $_GET['guildid']; ?>" class=" has-submenu" rel="np">
			<span class="arrow"><span class="icon"><?php echo $guild1['guild5']; ?></span></span>
		</a>
			</li>
			<li class="">
		<a href="/perk.php?guildid=<?php echo $_GET['guildid']; ?>" class="" rel="np">
			<span class="arrow"><span class="icon"><?php echo $guild1['guild6']; ?></span></span>
		</a>
			</li>
			<li class="">
		<a href="/reward.php?guildid=<?php echo $_GET['guildid']; ?>" class=" vault" rel="np">
			<span class="arrow"><span class="icon"><?php echo $guild1['guild7']; ?></span></span>
		</a>
			</li>
			<li class="">
		<a href="/challenge.php?guildid=<?php echo $_GET['guildid']; ?>" class="" rel="np">
			<span class="arrow"><span class="icon"><?php echo $guild1['guild8']; ?></span></span>
		</a>
			</li>
	</ul>

					</div>
				</div>
			</div>
		</div>
		
		<div class="profile-contents">
		<div class="profile-section-header">
	<h3 class="category "><?php echo $guild1['guild2']; ?></h3>
		</div>

		<div class="profile-section">

			<form id="roster-form" action="">
				<div class="roster-filters clear-after">
					<input type="hidden" name="view" id="filter-view" value="achievementPoints" />

					<div id="roster-buttons">						


	<button class="ui-button button2 " type="submit" >
		<span>
			<span> Фильтр </span>
		</span>
	</button>
						
	<button class="ui-button button2 " type="button" onclick="Guild.reset();" >
		<span>
			<span> Сброс </span>
		</span>
	</button>
					</div>
			
					<div class="selection inputs-name">
						<label for="filter-name" title='Имя'>Имя</label>
						<input type="text" name="name" class="input character" id="filter-name" data-column="0" value="" data-filter="column" alt="Введите имя"/>
					</div>
			
					<div class="selection inputs-level">
						<label for="filter-minLvl" title='Уровень'>Уровень</label>
						<input type="text" name="minLvl" id="filter-minLvl" class="input level" value="1" maxlength="2" data-min="1" data-filter="range" data-column="3" /> -
						<input type="text" name="maxLvl" id="filter-maxLvl" class="input level" value="90" maxlength="2" data-max="85" data-filter="range" data-column="3" />
					</div>

					<div class="selection inputs-race">
						<label for="filter-race" title='Раса'>Раса</label>
						<select name="race" class="input select class" id="filter-race" data-column="1" data-filter="column">
							<option value="">Все расы</option>
								<option value="1">Человек</option>
								<option value="3">Дворф</option>
								<option value="4">Ночной эльф</option>
								<option value="7">Гном</option>
								<option value="11">Дреней</option>
								<option value="22">Ворген</option>
								<option value="25">пандарен</option>
						</select>
					</div>

					<div class="selection inputs-class">
						<label for="filter-class" title='Класс'>Класс</label>
						<select name="class" class="input select class" id="filter-class" data-column="2" data-filter="column">
							<option value="">Все классы</option>
								<option value="6">Рыцарь смерти</option>
								<option value="11">Друид</option>
								<option value="3">Охотник</option>
								<option value="8">Маг</option>
								<option value="10">Монах</option>
								<option value="2">Паладин</option>
								<option value="5">Жрец</option>
								<option value="4">Разбойник</option>
								<option value="7">Шаман</option>
								<option value="1">Воин</option>
								<option value="9">Чернокнижник</option>
						</select>
					</div>

					<div class="selection inputs-rank">
						<label for="filter-rank" title='Ранг в гильдии'>Ранг в гильдии</label>
						<select name="rank" class="input select guildrank" id="filter-rank" data-column="4" data-filter="column">
							<option value="">Все ранги</option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="4">4</option>
								<option value="6">6</option>
						</select>
					</div>

	<span class="clear"><!-- --></span>
				</div>
			</form>

	<div class="table-options data-options "> Результаты <strong class="results-start">1</strong>–<strong class="results-end">11</strong> из <strong class="results-total">11</strong>

	<span class="clear"><!-- --></span>
	</div>

	<div id="roster" class="table">
		<table>
			<thead>
				<tr>
						<th class="name">

	<a href="?sort=name&amp;dir=a" class="sort-link">
		<span class="arrow"> Имя </span>
	</a>
						</th>
						<th class="race align-center">

	<a href="?sort=race&amp;dir=a" class="sort-link">
		<span class="arrow"> Раса </span>
	</a>
						</th>
						<th class="cls align-center">

	<a href="?sort=class&amp;dir=a" class="sort-link">
		<span class="arrow"> Класс </span>
	</a>
						</th>
						<th class="lvl align-center">

	<a href="?sort=lvl&amp;dir=a" class="sort-link">
		<span class="arrow"> Уровень </span>
	</a>
						</th>
						<th class="rank align-center">

	<a href="?sort=rank&amp;dir=a" class="sort-link">
		<span class="arrow"> Ранг в гильдии </span>
	</a>
						</th>
						<th class="ach-points align-center">

	<a href="?sort=achievements&amp;dir=d" class="sort-link">
		<span class="arrow up"> Очки достижений </span>
	</a>
						</th>
				</tr>
			</thead>
      <?php
            mysql_select_db($server_cdb);
							$guild_query = mysql_query("SELECT name,guildid,level,rank,race,class,gender FROM guild_member inner join characters on guild_member.guid = characters.guid WHERE guildid = '".$_GET['guildid']."'");
				while($guild2 = mysql_fetch_assoc($guild_query))		{
							?>

			<tbody>
      <tr class="row1" data-level="50">
				<td class="name"><strong><a href="advanced.php?name=<?php echo $guild2['name']; ?>" class="color-c">
          <?php echo $guild2['name']; ?>
          
        </a></strong></td>
				<td class="race" data-raw="7">
			<span class="icon-frame frame-14 " data-tooltip="<?php echo $guild2['race']?>"><img src="wow/static/images/icons/race/<?php echo $guild2['race']?>-<?php echo $guild2['gender']?>.gif" alt="" width="14" height="14" />
    </span>
		</span>
				</td>
				<td class="cls" data-raw="4">
          <span class="icon-frame frame-14 " data-tooltip=""><img src="wow/static/images/icons/class/<?php echo $guild2["class"]?>.gif" alt="" width="14" height="14" />
          </span>
		</span>
				</td>
				<td class="lvl">
          <?php echo $guild2['level']; ?>
        </td>
				<td class="rank" data-raw="6">
					<span >
         <?php 
           if ($guild2['rank'] < 1) {                         
            echo '
              <span class="guild-master">
                   Глава гильдии
               <span class="symbol"></span>
              </span>';
             }else{
            echo $armory['rank']; 
            echo $guild2['rank']; 
            }
         ?>
            </span>
				</td>
				<td class="ach-points">
					<span class="ach-icon">-</span>
				</td>
			</tr>
        <?php
        }
        ?>
			</tbody>
		</table>
	</div>

 <div class="table-options data-options "> Результаты <strong class="results-start">1</strong>–<strong class="results-end">11</strong> из <strong class="results-total">11</strong>

	<span class="clear"><!-- --></span>
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