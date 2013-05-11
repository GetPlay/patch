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
  $new = mysql_fetch_assoc(mysql_query("SELECT id,content FROM forum_replies WHERE id = '".$_GET['id']."'"));
  if (!$new['id']){
    $error = true;
  }
  }else{
    $error = true;
  }
  
//Begin Post
  if (isset($_POST['save'])){
    $admin = mysql_real_escape_string($_POST['admin']);
    $title = mysql_real_escape_string($_POST['name']);
    $image = mysql_real_escape_string($_POST['image']);
    $content = $_POST['content'];
    $content = trim($content);

    $emptyContent = strip_tags($content);
    if (empty($emptyContent)){                          //Check if content is empty, title will never be empty
      echo '<font color="red">You have to write something!</font>';
    }else{
      mysql_select_db($server_db);
      $change_new = mysql_query("UPDATE forum_replies SET content = '".$content."-----(Отредактированно администратором: )-----' WHERE id = '".$_POST['id']."'");
      if ($change_new == true){
        echo '<div class="alert-page" align="center"> Сообщение изменено!</div>';
        echo '<meta http-equiv="refresh" content="3;url=forumposts.php"/>';
      }
      else{
        echo '<div class="errors" align="center"><font color="red"> Ошибка!Сообщение не было изменено!</font></div>';
      }
    }  
  }
?>      

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<title>Admin Panel</title>
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
    <script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
    <script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);

</script>
    <script type="text/javascript" src="js/script-carasoul.js"></script>
    <script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select, button").uniform();
      });
    </script>
    <link rel="stylesheet" href="css/uniform.defaultstyle2.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/jquery.cleditor.css" />
    <script type="text/javascript" src="js/jquery.cleditor.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor(
			{
				width:        900, // width not including margins, borders or padding
                height:       250, // height not including margins, borders or padding
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
          <h2>Редактирование сообщения: <?php if($error){die ('<font color="red">Sorry an error has ocurred!</font>');} ?><?php echo $new['name']; ?></h2>

         </div>
        <form method="post" action="" class="styleForm">
        <input type="hidden" name="id" value="<?php echo $new['id']; ?>" />

          <div class="folder">


            <div  id="preview" style="display:none; float:right; position:absolute;left:450px;top:-50px;">
              <img src="" alt="img" id="imgP" />   
            </div>   
          </div> 

          <h3>Сообщение</h3>
          <div class="txt">
            <textarea id="input" name="content"><?php echo $new['content']; ?></textarea>
          </div>
          <input name="save" type="submit" value="Сохранить" />
          <a href="forumposts.php"><input name="reset" type="reset" value="Выйти" /></a>
        </form>
      </div>
    </div>
  </div>
  <div class="push"></div>
</div>
<?php include("footer.php"); ?>
</body>
