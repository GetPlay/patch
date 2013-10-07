<?php
include("../configs.php");
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $website['title']; ?> - <?php echo $admin['AP']; ?> - <?php echo $admin['Login']; ?></title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
  <link rel="shortcut icon" href="../wow/static/local-common/images/wow.png">
  <!---CSS Files-->
  <link rel="stylesheet" href="css/core.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/ui.css">  
  <!---jQuery Files-->
  <script src="js/jquery.js"></script>
  <script src="js/inputs.js"></script>
</head>
<body>

  <div id="wrapper">

    <div id="header">
      <div id="logo"></div>
      <h1><?php echo $admin['AP']; ?> - <?php echo $admin['Login']; ?></h1>
    </div>
	  <?php
          if (!isset($_SESSION['username'])) {
            $sessionid = @$_SESSION['id'];
            if (isset($_POST['accountName'])) {
              $accountName = mysql_real_escape_string($_POST['accountName']);
              $accountPass = mysql_real_escape_string($_POST['password']);
              $sha_pass_hash = sha1(strtoupper($accountName) . ":" . strtoupper($accountPass));
              $db_setup = mysql_select_db($server_adb, $connection_setup) or die(mysql_error());
              $login_query = mysql_query("SELECT gmlevel,username,sha_pass_hash from account inner join account_access on account.id = account_access.id where username = '" . strtoupper($accountName) . "'");
              $login = mysql_fetch_assoc($login_query);
                //print_r($login);
              if (strtoupper($login['sha_pass_hash']) === strtoupper($sha_pass_hash) && $login['gmlevel'] >= 3) {
                $_SESSION['username'] = $accountName;
    ?>
                    
    <div id="body">
      <div id="head">
        <span class="icon">K</span>
        <h2><?php echo $admin['YouLog']; ?></h2>
        <meta http-equiv="refresh" content="0"/>
        <br class="clear">
      </div>
      <span id="load">
        <img src="img/load.png"><img src="img/spinner.png" id="spinner">
      </span>
    </div>
            
		<?php
        } else {
    ?>
		<div id="body">
			<div id="head">
				<span class="icon">K</span>
				<h2><?php echo $admin['WrongPassAccName']; ?></h2>
				<meta http-equiv="refresh" content="2"/>
				<br class="clear">
			</div>
			<span id="load">
			 <img src="img/load.png"><img src="img/spinner.png" id="spinner">
			</span>
		</div>
                                
                                <?php
                            }
                            ?>
							<?php } else { ?>
    <div id="body">
      <div id="head">
        <span class="icon">K</span>
        <h2><?php echo $admin['EnterCredLog']; ?></h2>
        <br class="clear">
      </div>
      <form id="alt-lg-form" method="post" action="?SSID:<?php echo $sessionid; ?>">
        <div id="middle">
            <ul id="lg-input">
              <li id="usr-li">
                <input type="text" id="accountName" name="accountName" class="required" placeholder="<?php echo $admin['Log']; ?>">
                <span class="icon">a</span>
              </li>
              <li id="psw-li">
                <input type="password" id="password" name="password" class="required" placeholder="<?php echo $admin['Pass']; ?>">
                <a href="recoverpass.php" id="forgot-psw"><?php echo $admin['Forgot']; ?></a>
                <span class="icon">/</span>
              </li>
            </ul>
        </div>
        <div id="bottom">
          <input type="checkbox" id="rb-check" class="light-bg" checked="checked">
          <span id="rb-label"><?php echo $admin['RememberMe']; ?></span>
          <button type="submit" id="lg-submit" class="button inset submit"><?php echo $admin['Login']; ?></button>
          <br class="clear">
        </div>
      </form>
    </div>
 

  </div>
  <?php
                        }
                    } else {
                        mysql_select_db($server_adb);
                        $check_query = mysql_query("SELECT gmlevel from account inner join account_access on account.id = account_access.id where username = '" . strtoupper($_SESSION['username']) . "'") or die(mysql_error());
                        $login = mysql_fetch_assoc($check_query);
                        if ($login['gmlevel'] >= 3) {
                            ?>
                            <script>
            parent.postMessage("{\"action\":\"success\"}", "<?php echo $website['address']; ?>");
                            </script>
                            <?php
                            echo '<div id="body">
									<div id="head">
									<span class="icon">K</span>
									<h2>'.$admin['YouLog'].'</h2>
									<meta http-equiv="refresh" content="1;url=dashboard.php"/>
									<br class="clear">
									</div>
									<span id="load">
									<img src="img/load.png"><img src="img/spinner.png" id="spinner">
									</span>
								  </div>';
                        } else {
                            die('<div id="body">
									<div id="head">
									<span class="icon">K</span>
									<h2>'.$admin['YouNotHere'].'</h2>
									<meta http-equiv="refresh" content="2;url=../index.php"/>
									<br class="clear">
									</div>
									<span id="load">
									<img src="img/load.png"><img src="img/spinner.png" id="spinner">
									</span>
								  </div>');
                        }
                    }
                    mysql_select_db($server_db);
                    ?>
  <span id="load">
    <img src="img/load.png"><img src="img/spinner.png" id="spinner">
  </span>

  <!---jQuery Code-->
  <script type='text/javascript'>
    $('#wrapper, .notification, #forgot-psw').hide();
    $('#load').fadeIn(400);
    $(window).load( function() {
      $('#load').fadeOut(400, function() {
        $('#wrapper').fadeIn(600, function() {
          $('#welcome.notification').delay(500).fadeIn(400).loginNotif();
          $('#psw').focus();
        });
      });
    });

    $('#rb-check').flcheck();

    $('#alt-lg-form').validateLogin();

  </script>
</body>
</html>