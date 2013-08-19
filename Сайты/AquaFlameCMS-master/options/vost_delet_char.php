<?php
include("../configs.php");
$page_cat = "security";
if (!isset($_SESSION['username'])) {
        header('Location: account_log.php');		
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
<title><?php echo $website['title']; ?> - <?php echo $vostChar['1']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/index.ico" type="image/x-icon" />
<link rel="stylesheet" media="all" href="../wow/static/local-common/css/management/common.css" />
<link rel="stylesheet" media="all" href="../wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="../wow/static/css/bnet-print.css" />
<link rel="stylesheet" media="all" href="../wow/static/css/management/dashboard.css" />
<link rel="stylesheet" media="all" href="../wow/static/css/management/wow/dashboard.css" />
<script src="../wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="../wow/static/local-common/js/core.js"></script>
<script src="../wow/static/local-common/js/tooltip.js"></script>
<script src="../wow/static/local-common/js/third-party/swfobject.js?v37"></script>
<script src="../wow/static/js/management/dashboard.js?v23"></script>
<script src="../wow/static/js/management/wow/dashboard.js?v23"></script>
<script src="../wow/static/js/bam.js?v23"></script>
<script src="../wow/static/local-common/js/tooltip.js?v37"></script>
<script src="../wow/static/local-common/js/menu.js?v37"></script> 
</head>
<body class="en-gb logged-in">
<div id="layout-top">
<div class="wrapper">
<div id="header">
<?php include("../functions/header_account.php"); ?>
<?php include("../functions/footer_man_nav.php"); ?>
</div>
</div>
</div>
<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="page-header">
<span class="float-right"><span class="form-req">*</span> <?php echo $Reg['Reg']; ?></span>
<?php
  $price = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.prices WHERE service = 'vost_char'"));
   if ($price['id']=='' || ($price['vp']==0 && $price['dp']==0)){
   $free = 1;
  }else{
   $free = 0;
  }
?>
<h3 class="headline"><?php echo $vostChar['2']; ?>
<?php
if ($free!= 1 && ($price['vp'] > 0 || $price['dp'] > 0)){
  echo ' (';
  if ($price['vp'] > 0){
    echo $price['vp'].' VP';
  }
  if ($price['vp'] > 0 && $price['dp'] > 0){ echo $or['or2'];}
  if ($price['dp'] > 0){
    echo $price['dp'].' DP';
  }
  echo ')';
}
?>
</h3>
</div>
<div id="page-content" class="page-content"> 
<p><?php echo $vostChar['3']; ?></p>
<form autocomplete="off" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<input type="hidden" name="csrftoken" value="" />
<?php 
if(isset($_POST['submit']))
{
	$type=$_POST['type'];
	if ($type==1){  
		$method="dp";
		$method1="donation_points";
		$method2="donation points";
	}else{
		$method="vp";
		$method1="vote_points";
		$method2="vote points";
	}
	
	$buscarpuntos = mysql_fetch_array(mysql_query("SELECT * FROM $server_db.users WHERE id='".$account_information['id']."'"));
	
	$character = intval($_POST['character']);

	$errors = Array();

	$dont2 = 0;

	$check = mysql_query("SELECT * FROM $server_cdb.characters WHERE guid = '".$character."' AND deleteInfos_Account = '".$account_information['id']."'");

	if(empty($character) || mysql_num_rows($check) < 1) $errors[] = "You have not selected an eligible character for name change.";
	
	if ($buscarpuntos[$method1]<$price[$method]) $errors[] = "You dont have enough ".$method2;

	if(count($errors) < 1){
		$total=$buscarpuntos[$method1]-$price[$method];
		$substract = mysql_query("UPDATE $server_db.users SET $method1=$total WHERE id='".$account_information['id']."'");
		$change = mysql_query("UPDATE $server_cdb.characters SET account = deleteInfos_Account, name = deleteInfos_Name, at_login = 1 WHERE guid = '".$character."'"); 
		$delete = mysql_query("UPDATE $server_cdb.characters SET deleteInfos_Account = null, deleteInfos_Name = null, deleteDate = null WHERE guid = '".$character."'"); 
		echo '<p align="center"><font color="green"><strong>'.$vostChar['10'].'</strong></font><br/>';
		echo '<strong>'.$vostChar['11'].'</strong>';
		echo '</p>';
		echo '<meta http-equiv="refresh" content="2;url=../account_man.php"/>';

	}else{
	  echo '<p align="center"><font color="red"><strong>'.$vostChar['12'].'</strong></font><br/>';
		foreach($errors AS $error){
			echo $error . '<br>';
		}
		echo '</p>';
		echo '<meta http-equiv="refresh" content="2;url=vost_delet_char.php"/>';

	}

}
else{
?>
	<div class="form-row required">
		<label for="firstname" class="label-full ">
			<strong><?php echo $vostChar['4']; ?></strong>
			<span class="form-required">*</span>
		</label>
		<input type="text" id="firstname" name="account" value="<?php echo strtolower($_SESSION['username']); ?>" class=" input border-5 glow-shadow-2 form-disabled" maxlength="16" tabindex="1" />
	</div>

	<div class="form-row required">
		<label for="character" class="label-full ">
			<strong><?php echo $vostChar['5']; ?></strong>
			<span class="form-required">*</span>
		</label>
		
		<select id="character" name="character">
			<?php
			$online = 0;
			$get_chars = mysql_query("SELECT * FROM $server_cdb.characters WHERE deleteInfos_Account = '".$account_information['id']."' AND at_login = '0'");
			//Get chars that doesn't have a current at_login change activated
      	while($character = mysql_fetch_array($get_chars)){
					echo '<option value="'.$character['guid'].'">'.$character['deleteInfos_Name'].'</option>';
					if($character['online'] == 1) $online = 1;
				}
			?>
		</select>
	</div>
		<?php 
	if($free==0){
		echo '<div class="form-row required">
			<label for="type" class="label-full ">
				<strong>'.$vostChar['6'].'</strong>
				<span class="form-required">*</span>
			</label>
			<select id="type" name="type">';
				if ($price['dp'] > 0) echo '<option value="1">Donation Points</option>';
				if ($price['vp'] > 0) echo '<option value="2">Vote Points</option>';
			echo'</select>
		</div>';
	} ?>
	<fieldset class="ui-controls " >
		<?php
		if (mysql_num_rows($get_chars) < 1){
      echo '*'.$vostChar['7'].'.<br><br>
      <button class="ui-button button1 disabled" type="submit" name="submit" id="settings-submit" value="Continue" tabindex="1" disabled="disabled">';
    }
		elseif($online == 1) echo '*One of your characters is online<br><br><button class="ui-button button1 disabled" type="submit" name="submit" id="settings-submit" value="Continue" tabindex="1" disabled="disabled">';
    else echo '<button class="ui-button button1" type="submit" name="submit" id="settings-submit" value="Purchase" tabindex="1">';
		?>
		<span><span><?php echo $vostChar['8']; ?></span></span>
		</button>
		
		<a class="ui-cancel" href="../account_man.php" tabindex="1"><span><?php echo $vostChar['9']; ?></span></a>
	</fieldset>

</form>
<?php
}
?>
</div>
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div> 
</body>
</html>