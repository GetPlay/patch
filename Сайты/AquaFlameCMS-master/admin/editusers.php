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

  
  if (isset($_GET['id'])){
  mysql_select_db($server_db);
  $new = mysql_fetch_assoc(mysql_query("SELECT id,firstName,lastName FROM users WHERE id = '".$_GET['id']."'"));
  if (!$new['id']){
    $error = true;
  }
  }else{
    $error = true;
  }

    if (isset($_GET['id'])){
  mysql_select_db($server_adb);
  $new2 = mysql_fetch_assoc(mysql_query("SELECT id,username,email FROM account WHERE id = '".$_GET['id']."'"));
  if (!$new2['id']){
    $error = true;
  }
  }else{
    $error = true;
  }
  
//Begin Post
  if (isset($_POST['save'])){
    $firstName = mysql_real_escape_string($_POST['firstName']);
    $lastName = mysql_real_escape_string($_POST['lastName']);
    $email = mysql_real_escape_string($_POST['email']);
    $AdminLevel = mysql_real_escape_string($_POST['groupId']);
    $unbandate = mysql_real_escape_string($_POST['unbandate']);
    $banreason = mysql_real_escape_string($_POST['banreason']);
    $username = $_POST['username'];
    $username = trim($username);
    if ($_POST['author']){
      $author = $login['id'];
      }
    $emptyusername = strip_tags($username);
    if (empty($emptyusername)){ 
      echo '<font color="red">You have to write something!</font>';
    }else{
      mysql_select_db($server_db);
      $change_new = mysql_query("UPDATE users SET firstName = '".$firstName."', lastName = '".$lastName."' WHERE id = '".$_POST['id']."'");
	  mysql_select_db($server_adb);
	  $change2_new = mysql_query("UPDATE account SET email ='".$email."', username = '".$username."' WHERE id = '".$_POST['id']."'");
	  mysql_select_db($server_adb);
	  $change3_new = mysql_query("UPDATE account_banned SET unbandate = '".$unbandate."', bannedby = '".$bannedby."', banreason = '".$banreason."' WHERE id = '".$_POST['id']."'");
      if ($change_new == true){
        echo '<div class="alert-page" align="center"> The article has been updated successfully!</div>';
        echo '<meta http-equiv="refresh" content="3;url=dashboard.php"/>';
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
		<title><?php echo $website['title']; ?> - <?php echo $admin['AP']; ?> - <?php echo $admin['ViewSlide']; ?></title>
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
    <script type="text/javascript">
 $(document).ready(function(){
     $('.ddm').hover(
	   function(){
		 $('.ddl').slideDown();
	   },
	   function(){
		 $('.ddl').slideUp();
	   }
	 );
 });
</script>
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
          <h2><?php echo $admin['EditUsers']; ?><?php echo $new2['username']; ?></h2>
        </div>
        <form method="post" action="" class="styleForm">
        <input type="hidden" name="id" value="<?php echo $new['id']; ?>" />
          <p><?php echo $admin['Name']; ?><br />
            <input name="firstName" type="text" value="<?php echo $new['firstName']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $new['firstName']; ?>'" />
          </p> 
          <p><?php echo $admin['LastName']; ?><br />
            <input name="lastName" type="text" value="<?php echo $new['lastName']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $new['lastName']; ?>'" />
          </p> 
		  <p><?php echo $admin['Username']; ?><br />
            <input name="username" type="text" value="<?php echo $new2['username']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $new2['username']; ?>'" />
          </p> 
		  <p><?php echo $admin['email']; ?><br />
            <input name="email" type="text" value="<?php echo $new2['email']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $new2['email']; ?>'" />
          </p> 
		  <p><?php echo $admin['AdminLevel']; ?><br />
            <input name="AdminLevel" type="text" value="<?php echo $new['AdminLevel']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $new['AdminLevel']; ?>'" />
          </p>
		  <h3><?php echo $admin['Ban']; ?></h3> 
		  <p><?php echo $admin['BanAcc']; ?><br />
            <input name="unbandate" type="text" value="<?php echo $new['unbandate']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $new['unbandate']; ?>'" />
          </p> 
		  <p><?php echo $admin['banreason']; ?><br />
            <input name="banreason" type="text" value="<?php echo $new['banreason']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $new['banreason']; ?>'" />
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
