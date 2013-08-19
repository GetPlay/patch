<?php
include("../configs.php");
$page_cat = 'summary'; 
  if (!isset($_SESSION['username'])) {
        header('Location: ../account_log.php');		
}  
  
    if (isset($_POST['save'])){ 
    $name = mysql_real_escape_string($_POST['name']);
    $guid = $character['guid'];
    $message = mysql_real_escape_string($_POST['message']); 
    $title = $_POST['title'];
    $title = trim($title);

    $emptytitle = strip_tags($title);
    if (empty($emptytitle)){  
      echo '<font color="red">Возможно, Вы что-то забыли заполнить?!</font>';
    }else{
      mysql_select_db($server_cdb);
      $save_new = mysql_query("INSERT INTO gm_tickets (guid, name, message, title) VALUES ('".$guid."','".$name."','".$message."','".$title."');") or die(mysql_error());
      if ($save_new == true){
        echo 'Ваш запрос отправлен. Как только кто-то из сотрудников освободится, он ответит вам в новом окне чата.';
        echo '<meta http-equiv="refresh" content="1;url=../account_man.php"/>';
      }
      else{
        echo '<div class="errors" align="center"><font color="red"> An ERROR has occured while saving the post in the database!</font></div>';
      }
    }
  }
?>

<!doctype html> 
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo $website['title']; ?> - <?php echo $Support3['Support3']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/index.ico" type="image/x-icon" />
<link rel="stylesheet" media="all" href="../wow/static/local-common/css/management/common.css" />
<link rel="stylesheet" media="all" href="../wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="../wow/static/css/bnet-print.css" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/support/support.css?v122" />
<link rel="stylesheet" media="all" href="../wow/static/css/management/dashboard.css" />
<link rel="stylesheet" media="all" href="../wow/static/css/management/wow/dashboard.css" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/support/chatinvitation.css?v122" />
<link rel="stylesheet" type="text/css" media="print" href="../wow/static/css/support/support-print.css?v122" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/support/tickets.css?v122" />  
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
        <div class="page-header" id="page-header"> 
          <h3 class="headline">
            Обращение в службу поддержки — Подать запрос
          </h3>
          <div class="parchment"></div>
        </div>
        <div id="page-content"> 
        <form method="post" action="" class="styleForm">
          <div id="category-title" class="title-text">
            <span class="field-name">Тема:</span>
            <input name="title" id="title" type="text" value="" class="reg" onfocus="if(this.value=='')this.value=''" onblur="if(this.value=='')this.value=''" />
          </div> 
          <br />
          <div id="submit-form"> 
                <div id="customFields">
                  <div id = "fields-205" class="custom-fields">
                    <div class="custom-field-block">  
                            <span class="input-left input-disabled">
                              <label for="wow-character-205">
                                <span class="label-text">
                                  Персонаж:
                                </span>
                                <span class="input-required"></span>
                              </label>
                            </span>
                            <span class="input-right input-disabled">
                              <span class="input-select input-select-small">
                                <select name="name" id="name" class="extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required"> 
			<?php 
			$get_chars = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '".$account_information['id']."' "); 
      	while($character = mysql_fetch_array($get_chars)){
					echo '<option value="'.$character['name'].'">'.$character['name'].' ('.$character['guid'].')</option>'; 
				}
			?>
                                </select>
                                <span class="inline-message" id="name"> </span>
                              </span>
                              <span class="input-info-tooltip" data-tooltip=" Если вашего игрового мира или персонажа нет в списке, укажите их в описании проблемы.&lt;/p&gt;" data-tooltip-options='{"location": "mouse"}'>Вашего игрового мира или персонажа нет в списке?</span>
                            </span>
                          </div>
                        </div>
                      </div> 

                <span class="input-left"> 
                        <span class="label-text">
                          Описание:
                        </span>
                        <span class="input-required">*</span> 
                    </span>
                    <span class="input-right">
                      <span class="input-textarea input-textarea-extra-large"> 
                        <div class="txt">
                        <textarea name="message"  id="input" class="extra-large border-5 glow-shadow-2" cols="78" rows="8" tabindex="1" required="required" placeholder=" ." maxlength="2000"/></textarea>
                      </div> 
                         </span>
                    </span> 
              <div class="submit-row">
                <div class="input-left"></div> 
                <input name="save" type="submit" value="<?php echo $admin['Save']; ?>" /> 
                </form>
                  <a class="ui-cancel" href="../account_man.php" tabindex="1">
                    <span>
                      Отмена
                    </span>
                  </a> 
                </div>
              </div> 
          </div> 
        </div>
        <div class="footer-padding"></div> 
      </div> 
  </div>



  <div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div>
<script src="wow/static/local-common/js/search.js?v37"></script>
<script type="text/javascript">
//<![CDATA[
var xsToken = '';
var supportToken = '';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Canceled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
ticketAll: 'View All Tickets'
},
cms: {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
stickyHasBeenRequested: 'You have already sent a sticky request for this topic.',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Level {0}",
shortQuery: "Search requests must be at least three characters long."
},
bml: {
bold: 'Bold',
italics: 'Italics',
underline: 'Underline',
list: 'Unordered List',
listItem: 'List Item',
quote: 'Quote',
quoteBy: 'Posted by {0}',
unformat: 'Remove Formating',
cleanup: 'Fix Linebreaks',
code: 'Code Blocks',
item: 'WoW Item',
itemPrompt: 'Item ID:',
url: 'URL',
urlPrompt: 'URL Address:'
},
ui: {
submit: 'Submit',
cancel: 'Cancel',
reset: 'Reset',
viewInGallery: 'View in gallery',
loading: 'Loading…',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on…',
fansiteFindType: 'Find {0} on…',
fansiteNone: 'No fansites available.'
},
grammar: {
colon: '{0}:',
first: 'First',
last: 'Last'
},
fansite: {
achievement: 'achievement',
character: 'character',
faction: 'faction',
'class': 'class',
object: 'object',
talentcalc: 'talents',
skill: 'profession',
quest: 'quest',
spell: 'spell',
event: 'event',
title: 'title',
arena: 'arena team',
guild: 'guild',
zone: 'zone',
item: 'item',
race: 'race',
npc: 'NPC',
pet: 'pet'
},
search: {
kb: 'Support',
post: 'Forums',
article: 'Blog Articles',
static: 'General Content',
wowcharacter: 'Characters',
wowitem: 'Items',
wowguild: 'Guilds',
wowarenateam: 'Arena Teams',
other: 'Other'
}
};
//]]>
</script> 
</body>
</html>
