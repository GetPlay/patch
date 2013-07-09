<?php
include("../configs.php");
ini_set("default_charset", "iso-8859-1" );    

	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT account.id,gmlevel from account  inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('
<meta http-equiv="refresh" content="2;url=GTFO.php"/>
		');
	}

  
  if (isset($_POST['save'])){
    $world_db = mysql_real_escape_string($_POST['world_db']);
    $char_db = mysql_real_escape_string($_POST['char_db']);
    $realmid = mysql_real_escape_string($_POST['realmid']);
    $version = mysql_real_escape_string($_POST['version']);
    $drop_rate = mysql_real_escape_string($_POST['drop_rate']);
    $exp_rate = $_POST['exp_rate'];
    $exp_rate = trim($exp_rate);

    $emptyexp_rate = strip_tags($exp_rate);
    if (empty($emptyexp_rate)){                          //Check if content is empty, title will never be empty
      echo '<font color="red">You have to write something!</font>';
    }else{
      mysql_select_db($server_db);
      $save_new = mysql_query("INSERT INTO realms (world_db, char_db, realmid, version, drop_rate, exp_rate) VALUES ('".$world_db."','".$char_db."','".$realmid."','".$version."','x".$drop_rate."','x".$exp_rate."');") or die(mysql_error());
      if ($save_new == true){
        echo '<div class="alert-page" align="center"> The new has been created successfully!</div>';
        echo '<meta http-equiv="refresh" content="3;url=dashboard.php"/>';
      }
      else{
        echo '<div class="errors" align="center"><font color="red"> An ERROR has occured while saving the post in the database!</font></div>';
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
          <h2><?php echo $admin['infoRate']; ?></h2>
        </div>
        <form method="post" action="" class="styleForm">
          <p><?php echo $admin['worldName']; ?><br />
            <input name="world_db" type="text" value="" class="reg" onfocus="if(this.value=='')this.value=''" onblur="if(this.value=='')this.value=''" />
          </p> 

          <p><?php echo $admin['CharName']; ?><br />
            <input name="char_db" type="text" value="" class="reg" onfocus="if(this.value=='')this.value=''" onblur="if(this.value=='')this.value=''" />
          </p> 

          <p><?php echo $admin['realmid']; ?><br />
            <input name="realmid" type="text" value="" class="reg" onfocus="if(this.value=='')this.value=''" onblur="if(this.value=='')this.value=''" />
          </p> 

          <p><?php echo $admin['Version']; ?><br />
            <input name="version" type="text" value="" class="reg" onfocus="if(this.value=='')this.value=''" onblur="if(this.value=='')this.value=''" />
          </p> 

          <p><?php echo $admin['drop']; ?><br />
            <input name="drop_rate" type="text" value="" class="reg" onfocus="if(this.value=='')this.value=''" onblur="if(this.value=='')this.value=''" />
          </p> 

          <p><?php echo $admin['rate']; ?><br />
            <input name="exp_rate" type="text" value="" class="reg" onfocus="if(this.value=='')this.value=''" onblur="if(this.value=='')this.value=''" />
          </p> 

          
          <input name="save" type="submit" value="<?php echo $admin['Save']; ?>" />
          <input name="reset" type="reset" value="<?php echo $admin['Cancel']; ?>" />
        </form>
      </div>
    </div>
  </div>
  <div class="push"></div>
</div>
<?php include("footer.php"); ?>
</body>