<?php
	session_start();
	
	include_once './include/config.php';
	include_once './include/functions.php';
	include_once './include/string.php';
	
	if (isset($_GET['page'])) {
		if (preg_match("/^[a-zA-Z0-9_]+$/", $_GET['page'])) {
			$page = $_GET['page'];
		} else { $page = 'main'; }
	} else { $page = 'main'; }
	
	if (isset($_GET['do'])) {
		if (preg_match("/^[a-zA-Z0-9_]+$/", $_GET['do'])) {
			$do = $_GET['do'];
		} else { $do = ''; }
	} else { $do = ''; }
	
	if (isset($_GET['guid'])) {
		if (preg_match("/^[0-9]+$/", $_GET['guid'])) {
			$guid = $_GET['guid'];
		} else { $guid = ''; }
	} else { $guid = ''; }
	
	if (isset($_GET['realm'])) {
		if (preg_match("/^[0-9]+$/", $_GET['realm'])) {
			$realm_num = $_GET['realm'];
			if ($realm_num < '1' || $realm_num > $realm_count) { $realm_num = '1';} 
		} else { $realm_num = '1'; }
	} else { $realm_num = '1'; }
	
	if (isset($_SESSION['logined'])) { 
		$user_logined = $_SESSION['logined'];
		$user_guid = $_SESSION['acc_id'];
	} else { $user_logined = '0'; }
	
	if (isset($_GET['vote'])) { $vote = $_GET['vote']; } else { $vote = ''; }
	
	if ($page=="main"){
	    $page_title = "Главная страница";
		$page_path = "./modules/main_page.php";
	} elseif($page=="online"){
	    $page_title = "Онлайн";
		$page_path = "./modules/online_page.php";
	} elseif($page=="ban"){
	    $page_title = "Баны";
		$page_path = "./modules/ban_page.php";
	} elseif($page=="rules"){
	    $page_title = "Правила";
		$page_path = "./modules/rules_page.php";
	} elseif($page=="how_to_play"){
	    $page_title = "Как начать";
		$page_path = "./modules/begin_page.php";
	} elseif($page=="license"){
	    $page_title = "Лицензия и права";
		$page_path = "./modules/license_page.php";
	} elseif($page=="about"){
	    $page_title = "О сервере";
		$page_path = "./modules/info_page.php";
	} elseif($page=="statistics"){
	    $page_title = "Статистика";
		$page_path = "./modules/statistics_page.php";
	} elseif($page=="transfer"){
	    $page_title = "Трансфер";
		$page_path = "./modules/transfer_page.php";
	} elseif($page=="reg"){
	    $page_title = "Регистрация";
		$page_path = "./modules/reg_page.php";
	} elseif($page=="lk" && $do == "main"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/main_page.php";
	} elseif($page=="lk" && $do == "setpassword"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/set_password.php";
	} elseif($page=="lk" && $do == "setmail"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/set_mail.php";
	} elseif($page=="lk" && $do == "getbonuses"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/donate_page.php";
	} elseif($page=="lk" && $do == "buyitem"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/buy_item_page.php";
	} elseif($page=="lk" && $do == "buyitem"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/buy_item_page.php";
	} elseif($page=="lk" && $do == "buygold"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/buy_gold_page.php";
	} elseif($page=="lk" && $do == "buyunban"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/buy_unban_page.php";
	} elseif($page=="armory" && $do=="viewchar"){
	    $page_title = "Просмотр персонажа";
		$page_path = "./modules/armory/view_character.php";
	} elseif($page=="armory" && $do=="rep"){
	    $page_title = "Просмотр персонажа";
		$page_path = "./modules/armory/view_rep.php";
	} elseif($page=="armory" && $do=="search"){
	    $page_title = "Поиск персонажа";
		$page_path = "./modules/armory/search_character.php";
	} elseif($page=="armory" && $do=="ubar"){
	    $page_title = "Юзербар";
		$page_path = "./modules/armory/view_ubar.php";
	} elseif($page=="armory"){
	    $page_title = "Поиск персонажа";
		$page_path = "./modules/armory/search_character.php";
	} elseif($page=="spay"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/success_pay.php";
	} elseif($page=="fpay"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/fail_pay.php";
	} elseif($page=="lk" && $do == "vote"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/vote_page.php";
	} elseif($page=="lk" && $do == "buylvl"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/buy_lvl_page.php";
	} elseif($page=="lk" && $do == "buy"){
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/buy_page.php";
	} elseif($page=="lk"){ 
	    $page_title = "Личный кабинет";
		$page_path = "./modules/lk/main.php";
	} else {
	    $page_title = "Главная страница";
		$page_path = "./modules/main_page.php";
	}
	
	for ($i = 1; $i <= $realm_count; $i++) {
		$ConnectDB[$i] = @mysql_connect($mysql_path[$i], $mysql_login[$i], $mysql_password[$i]);
		@mysql_query("SET NAMES 'cp1251'", $ConnectDB[$i]);
	}
?>

<html>
	<head>
		<link rel="SHORTCUT ICON" href="./favicon.ico">
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251" />
		<title><?php echo $site_title;?></title>
		<link type="text/css" href="./style/main.css" rel="stylesheet">
		<script type="text/javascript" src="./style/ajax.js"></script>
		<script type="text/javascript" src="./style/utils.js"></script>
		<script type="text/javascript" src="./style/my_tooltip.js"></script>
		<link type="text/css" href="./style/wh.css" rel="stylesheet">
		<script type="text/javascript" src="./style/power.js"></script>
	</head>
	<body>
	<div class="header">
			<div class="header_logo"></div>
			<div class="header_state"><?php include './modules/mini_statistics_page.php';?></div>
		</div>

		<div class="main_contaner">
			<div class="main_contaner_main_block">
				<?php include './modules/sitemenu_page.php';?>
				<div class="main_block_sep"></div>
				<?php include $page_path;?>
				<div class="main_block_sep"></div>
				<?php include './modules/footer.php';?>
			</div>
		</div>
	</body>
</html>
<?php 
	for ($i = 1; $i <= $realm_count; $i++) {
		@mysql_close($ConnectDB[$i]);
	}
?>