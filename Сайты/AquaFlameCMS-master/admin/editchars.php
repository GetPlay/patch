<?php
include("../configs.php");

	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT account.id,gmlevel from account  inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('
<meta http-equiv="refresh" content="2;url=GTFO.php"/>
		');
	} 
	 

  //End image pop-up
  
  if (isset($_GET['guid'])){
  mysql_select_db($server_cdb);
  $char = mysql_fetch_assoc(mysql_query("SELECT guid,name,race,class,gender,level,money,at_login,arenaPoints,totalHonorPoints FROM characters WHERE guid = '".$_GET['guid']."'"));
  if (!$new['id']){
    $error = true;
  }
  }else{
    $error = true;
  }
  
//Begin Post
  if (isset($_POST['save'])){
    $totalHonorPoints = mysql_real_escape_string($_POST['totalHonorPoints']);
    $arenaPoints = mysql_real_escape_string($_POST['arenaPoints']); 
    $race = mysql_real_escape_string($_POST['race']);
    $class = mysql_real_escape_string($_POST['class']);
    $gender = mysql_real_escape_string($_POST['gender']);
    $level = mysql_real_escape_string($_POST['level']);
    $money = mysql_real_escape_string($_POST['money']); 
    $at_login = mysql_real_escape_string($_POST['at_login']); 
    $name = $_POST['name'];
    $name = trim($name);  
    $emptyName = strip_tags($name);
    if (empty($emptyName)){                          //Check if content is empty, title will never be empty
      echo '<font color="red">You have to write something!</font>';
    }else{
      mysql_select_db($server_cdb);
      $change_new = mysql_query("UPDATE characters SET at_login = '".$at_login."', money = '".$money."', totalHonorPoints = '".$totalHonorPoints."', arenaPoints = '".$arenaPoints."', race = '".$race."',  class = '".$class."', gender = '".$gender."', name = '".addslashes($name)."', level = '".$level."' WHERE guid = '".$_GET['guid']."'");
      if ($change_new == true){
        echo '<div class="alert-page" align="center"> The article has been updated successfully!</div>';
        echo '<meta http-equiv="refresh" content="2;url=viewchars.php"/>';
      }
      else{
        echo '<div class="errors" align="center"><font color="red"> An ERROR has occured while saving the article!</font></div>';
      }
    }  
  }
?>      

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<title><?php echo $website['title']; ?> - <?php echo $admin['AP']; ?></title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
		<link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/tooltip.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
		<script type="text/javascript" src="js/script-carasoul.js"></script>
		<link href="css/tooltip.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/uniform.defaultstyle3.css" type="text/css" media="screen" />
    <script src="js/jquery-1.4.4.js" type="text/javascript" charset="utf-8"></script>
 
    <script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
 
    <script type="text/javascript" src="js/script-carasoul.js"></script>
    <script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
 
    <link rel="stylesheet" href="css/uniform.defaultstyle2.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/jquery.cleditor.css" />
    <script type="text/javascript" src="js/jquery.cleditor.js"></script> 
 
</head>
<body class="bgc">
	<div id="admin">
    <div id="wrap">
      <div id="head">
        <?php include('header.php'); ?>
      </div>
    <!--Content Start-->
    <div id="content">
      <div class="forms">
        <div class="heading">
          <h2><?php echo $admin['EditUsers']; ?><font color="blue"><?php echo $char['name']; ?></font></h2>
        </div>
        <form method="post" action="" class="styleForm">
        <input type="hidden" name="id" value="<?php echo $new['id']; ?>" /> 

          <p><?php echo $admin['totalHonorPoints']; ?><br />
            <input name="totalHonorPoints" type="text" value="<?php echo $char['totalHonorPoints']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $char['totalHonorPoints']; ?>'" />
          </p> 
          <p><?php echo $admin['arenaPoints']; ?><br />
            <input name="arenaPoints" type="text" value="<?php echo $char['arenaPoints']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $char['arenaPoints']; ?>'" />
          </p> 
          <p><?php echo $admin['name']; ?><br />
            <input name="name" type="text" value="<?php echo $char['name']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $char['name']; ?>'" />
          </p> 
          <p><?php echo $admin['race']; ?><br />
            <input name="race" type="text" value="<?php echo $char['race']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $char['race']; ?>'" />
          </p> 
          <p><?php echo $admin['class']; ?><br />
            <input name="class" type="text" value="<?php echo $char['class']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $char['class']; ?>'" />
          </p> 
          <p><?php echo $admin['gender']; ?><br /> 
		   <select name="gender" id="gender" class="extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="<?php echo $char['gender']; ?>" selected="selected"><?php  if ($char['gender'] < 1) { echo 'Мужской'; }else{ echo  'Женский';  } ?></option>
<option value="<?php  if ($char['gender'] > 0) { echo '0'; }else{ echo  '1';  } ?>"><?php  if ($char['gender'] > 0) { echo 'Мужской'; }else{ echo  'Женский';  } ?></option> 

</select>
<span class="inline-message" id="dobMonth-message"> </span> 
   </p> 
          <p><?php echo $admin['level']; ?><br />
            <input name="level" type="text" value="<?php echo $char['level']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $char['level']; ?>'" />
          </p> 
          <p><?php echo $admin['money']; ?><br />
            <input name="money" type="text" value="<?php echo $char['money']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $char['money']; ?>'" />
          </p>
		   <p><?php echo $admin['at_login']; ?><br />
<select name="at_login" id="at_login" class="extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="0" selected="selected">не выбрано</option>
<option value="1">смена имени</option>
<option value="2">Сброс заклинания (профессий)</option>
<option value="4">Сброс талантов</option>
<option value="8">Настройка Символов</option>
<option value="16">Сброс ПЭТ таланты</option>
<option value="32">?</option>
<option value="64">Смена фракции</option>
<option value="128">Смена расы</option> 
</select>
<span class="inline-message" id="dobMonth-message"> </span> 
  </p> 
          <input name="save" type="submit" value="<?php echo $admin['Save']; ?>" />
          <a href="viewnews.php"><input name="reset" type="reset" value="<?php echo $admin['Cancel']; ?>" /></a>
        </form>
      </div>
    </div>
  </div>
  <div class="push"></div>
</div>
<?php include("footer.php"); ?>
</body>
