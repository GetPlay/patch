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
  
  if (isset($_GET['ticketId'])){
  mysql_select_db($server_cdb);
  $new = mysql_fetch_assoc(mysql_query("SELECT ticketId,name,message,comment FROM gm_tickets WHERE ticketId = '".$_GET['ticketId']."'"));
  if (!$new['id']){
    $error = true;
  }
  }else{
    $error = true;
  }

//Begin Post
  if (isset($_POST['save'])){
    $title = mysql_real_escape_string($_POST['name']);
    $image = mysql_real_escape_string($_POST['message']);
    $comment = $_POST['comment'];
    $comment = trim($comment);
    if ($_POST['author']){
      $author = $login['id'];
      }
    $emptycomment = strip_tags($comment);
    if (empty($emptycomment)){                          
      echo '<font color="red">You have to write something!</font>';
    }else{
      mysql_select_db($server_cdb);
      $change_new = mysql_query("UPDATE gm_tickets SET name = '".$name."' , message = '".$message."', comment = '".$comment."' WHERE ticketId = '".$_POST['id']."'");
      if ($change_new == true){
        echo '<div class="alert-page" align="center"> The article has been updated successfully!</div>';
        echo '<meta http-equiv="refresh" content="3;url=viewslideshows.php"/>';
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
		<title><?php echo $website['title']; ?> - <?php echo $admin['AP']; ?> - <?php echo $admin['ticket']; ?></title>
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
          <h2><?php echo $admin['RepleTicket']; ?><font color="green"><?php echo $new['name']; ?></font> #<font color="red"><?php echo $new['ticketId']; ?></font></h2>
        </div>
        <form method="post" action="" class="styleForm">
		 <div class="txt">
		  <h5><textarea style="width:600px;height:70px;"/><?php echo $new['message']; ?></textarea></h5>
		   </div>

          <h3><?php echo $admin['Reple']; ?></h3>
          <div class="txt">
		  <textarea id="input" name="comment" style="width:600px;height:70px;"/><?php echo $new['comment']; ?></textarea>
          </div>
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
