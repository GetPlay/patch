
    <!--USER PANEL-->
	<?php 	$login_query = mysql_query("SELECT * FROM $server_adb.account WHERE username = '" . mysql_real_escape_string($_SESSION["username"]) . "'");
			$login2 = mysql_fetch_assoc($login_query);
       $joindate = date("d.m.Y ", strToTime($login2['joindate']));
	
			$uI = mysql_query("SELECT avatar FROM $server_db.users WHERE id = '" . $login2['id'] . "'");
			$userInfo = mysql_fetch_assoc($uI);
	?>
    <div id="usr-panel">
      <div class="av-overlay"></div>
      <img src="<?php echo $website['root']; ?>images/avatars/2d/<?php echo $account_extra['avatar']; ?>" id="usr-av">
      <div id="usr-info">
        <span id="usr-name"><?php echo $account_extra['firstName']; ?></span><span id="usr-role"><?php echo $admin['admin']; ?></span>
        <button id="usr-btn" class="orange" data-modal="#usr-mod #mod-home"><?php echo $admin['userCP']; ?></button>
      </div>
    </div>

    <!--NAVIGATION-->

    <div id="nav">
      <ul>
        <li><a href="dashboard.php"></a><span class="icon">H</span><?php echo $admin['dashboard']; ?></li>
        <li><a href="news.php"></a><span class="icon">&lt;</span><?php echo $admin['n2']; ?></li>
        <li><a href="forum.php"></a><span class="icon">P</span><?php echo $admin['Forums']; ?></li>
        <li><a href="media.php"></a><span class="icon">F</span><?php echo $admin['Off1']; ?></li>
        <li><a href="users.php"></a><span class="icon">G</span><?php echo $admin['Off2']; ?></li>
        <li data-modal="#usr-mod #mod-set" id="set-btn"><span class="icon">)</span><?php echo $admin['setings']; ?></li>
        <li id="logout"><a href="logout.php"></a><span class="icon icon-grad">B</span><?php echo $admin['LogOut']; ?></li>
      </ul>
      <br class="clear">
    </div>