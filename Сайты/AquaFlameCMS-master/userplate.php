<?php
if(!isset($_SESSION['username'])){
    ?>
    <div class="user-plate">
        <a href="?login" onclick="return Login.open()" class="card-login">
        <? echo $uplate['login']?>
        </a>
        
        <div class="card-overlay"></div>
    </div>
    <?php 
}else{
    $side = rand(1,2);
    switch($side){
        case 1:
          $side = "alliance";
        break;
        case 2:
          $side = "horde";
        break;
    }
    
    if(isset($_GET['cc'])){
        $character_id = intval($_GET['cc']);
        $realm_id = intval($_GET['r']);
        
        $realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_id."'"));
        $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE realmid = '".$realm_id."'"));
        
        $server_cdb = $realm_extra['char_db'];
        
        $select = mysql_fetch_assoc(mysql_query("SELECT guid,race,gender FROM $server_cdb.characters WHERE guid = '".$character_id."' AND account = '".$account_information['id']."'"));
        
        if($select){
            $avatar = $select['race']."-".$select['gender'].".jpg";	
            $update = mysql_query("UPDATE users SET `avatar` = '".$avatar."', `character` ='".$character_id."', `char_realm` = '".$realm_extra['id']."' WHERE id = '".$account_extra['id']."'");
            echo '<meta http-equiv="refresh" content="0;url=index.php"/>';
        }else{
            echo '<meta http-equiv="refresh" content="0;url=index.php"/>';
        }
    }
      
    $login_query = mysql_query("SELECT * FROM $server_adb.account WHERE username = '".mysql_real_escape_string($_SESSION["username"])."'");
    $login2 = mysql_fetch_assoc($login_query);	
    
	$uI = mysql_query("SELECT * FROM $server_db.users WHERE id = '".$login2['id']."'");
	@$userInfo = mysql_fetch_assoc($uI);
    
    $numchars = 0;
    
    if($account_extra['character'] != 0){
        $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE realmid = '".$account_extra['char_realm']."'"));
        $realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_extra['realmid']."'"));
        
        $server_cdb = $realm_extra['char_db'];
        $server_wdb = $realm_extra['world_db'];
        
        $query001 = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '".$account_information['id']."' AND guid = '".$account_extra['character']."'");
        if(mysql_num_rows($query001) > 0){
            $actualchar = mysql_fetch_assoc($query001);
            $numchars++;
        }
		else {
            mysql_query("UPDATE $server_db.users SET `character` = 0 WHERE id = $account_extra[id]")
				or die(mysql_error("Cannot remove character from web db"));
            header("Location : index.php");
        }
        
    }else{
        
        $get_realms = mysql_query("SELECT * FROM $server_adb.realmlist ORDER BY `id` DESC");
        if($get_realms){
            while($realm = mysql_fetch_array($get_realms)){
                $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE realmid = '".$realm['id']."'"));
                
                $server_cdb = $realm_extra['char_db'];
                $server_wdb = $realm_extra['world_db'];
                                   
                $check_chars = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '".$account_information['id']."' ORDER BY `guid` DESC");
                if($check_chars){
                    
                    //Re-Check
                    $account_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.users WHERE id = '".$account_information['id']."'"));
                    
                    if($account_extra['character'] == 0){
                        $actualchar = mysql_fetch_assoc($check_chars);
                        $avatar = $actualchar['race']."-".$actualchar['gender'].".jpg";
                        
                        @$set_character = mysql_query("UPDATE users SET `avatar` = '".$avatar."', `character` = '".$actualchar['id']."', `char_realm` = '".$realm_extra['id']."' WHERE id = '".$account_extra['id']."'");
                   }
                }
                $numchars = $numchars + mysql_num_rows($check_chars); 
            }
        }
                
    }
    
    if($numchars != 0){
    
	switch( $actualchar["race"] )
	{
		case 2:
		case 5:
		case 6:
		case 8:
        case 9:
		case 10: $side = "Орда";
		break;
		default: $side = "Альянс";
	}
    
    function racetxt($race){
        switch($race){
            case 1: return "Человек - "; break;
            case 2: return "Орк - "; break;
            case 3: return "Дворф - "; break;
            case 4: return "Ночной Эльф - "; break;
            case 5: return "Нежить - "; break;
            case 6: return "Таурен - "; break;
            case 7: return "Гном - "; break;
            case 8: return "Троль - "; break;
            case 9: return "Гоблин - "; break;
            case 10: return "Эльф крови - "; break;
            case 11: return "Дреней - "; break;
            case 22: return "Ворген - "; break;
            
        }
    }
            
    function classtxt($class){
        switch($class){
            case 1: return "Воин"; break;
            case 2: return "Паладин"; break;
            case 3: return "Охотник"; break;
            case 4: return "Разбойник"; break;
            case 5: return "Жрец"; break;
            case 6: return "Рыцарь смерти"; break;
            case 7: return "Шаман"; break;
            case 8: return "Маг"; break;
            case 9: return "Чернокнижник"; break;
            case 10: return "Друид"; break;                
        }
    }
    
	?>
<div class="user-plate">
<div id="user-plate" class="card-character plate-<?php echo $side; ?> ajax-update" style="background: url(<?php echo $website['root']; ?>wow/static/images/2d/card/<?php echo $actualchar["race"] . "-" . $actualchar["gender"];?>.jpg) 0 100% no-repeat;">
<div class="card-overlay"></div>
<span class="hover"></span>
</a>
<div class="meta">
<div class="player-name"><?php echo $account_extra['firstName'].' '.$account_extra['lastName']; ?></div>
	  
	  <div class="character">
	  <a class="character-name context-link" href="#" rel="np" data-tooltip="Change character"><?php echo $actualchar["name"]; ?><span class="arrow"></span></a>
	  <div class="guild">
<a class="guild-name" href="#">
<?php echo $realm['name'] ?>
</a>
</div>
		<div id="context-1" class="ui-context character-select">
		
		  <div class="context">
			<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
			
			<div class="context-user">
			<strong><?php echo $actualchar["name"]; ?></strong>
			<br />
			<span class="realm up"><?php echo $realm['name'] ?></span>
			</div>
		  
			<div class="context-links">
			<a href="<?php echo $website['root'];?>advanced.php?name=<?php echo $actualchar["name"]; ?>" title="<? echo $uplate['profile']; ?>" class="icon-profile link-first"><? echo $uplate['profile']; ?></a>
			<a href="search_f.php" title="<?php echo $uplate['post']; ?>" class="icon-posts"> </a>
			<a href="#" title="<?php echo $uplate['auction']; ?>" rel="np"class="icon-auctions"> </a>
			<a href="#" title="<?php echo $uplate['events']; ?>" rel="np" class="icon-events link-last"> </a>
			</div>
		  </div>
          
		  <div class="character-list">
			<div class="primary chars-pane">
                <div class="char-wrapper">
                    <?php
                   	
                    
                    $get_realms = mysql_query("SELECT * FROM $server_adb.realmlist ORDER BY `id` DESC");
                    if($get_realms){
                        while($realm = mysql_fetch_array($get_realms)){
                            $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE realmid = '".$realm['id']."'"));
                            
                            $server_cdb = $realm_extra['char_db'];                                               
                            $check_chars = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '".$account_information['id']."' ORDER BY `guid` DESC");
                            
                            $current_realm = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '".$account_extra['char_realm']."'"));
                            
                            if($check_chars){
                                while($char = mysql_fetch_array($check_chars)){
                                    
                                    echo '
                                    <a href="?cc='.$char['guid'].'&r='.$realm['id'].'" class="char ';
                                    if($char['guid'] == $actualchar['guid'] && $realm['id'] == $current_realm['realmid']) echo 'pinned';
                                    echo '" rel="np">
                                        <span class="pin"></span>
                                        <span class="name">'.$char["name"].'</span>
                                        <span class="class color-c'.$char["class"].'"> ' . racetxt($char['race']) . ' ' . classtxt($char['class']).', '.$char["level"] . ' Ур.</span>
                                        <span class="realm';
                                        
                                        $host = $realm['address'];
                                        $world_port = $realm['port'];
                                        $world = @fsockopen($host, $world_port, $err, $errstr, 2);
                                        
                                        if(!$world) echo ' down';
                                        
                                        echo '">'.$realm['name'].'</span>
                                    </a>
                                    ';
                                }
                            }
                        }
                    }
                    ?>
                </div>
                

			</div>
		  </div>
		</div>
	  </div>
	</div>
	</div>
	<script type="text/javascript">

	//<![CDATA[
	$(document).ready(function() {
	Tooltip.bind('#header .user-meta .character-name', { location: 'topCenter' });
	});
	//]]>
	</script>
	<?php }else{
	echo'
  <div class="user-plate ajax-update">
    <div class="card-nochars">
	   <div class="player-name">
	     '.$userInfo['firstName'].' '.$userInfo['lastName'].'
	   </div>
     '.$uplate['nochars'].'
    </div>
  </div>';	
	} }
	mysql_select_db($server_db,$connection_setup)or die(mysql_error());?>
