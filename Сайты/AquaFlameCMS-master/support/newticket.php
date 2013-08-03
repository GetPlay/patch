<?php
include("../configs.php");
$page_cat = 'summary';
 
if (isset($_GET['ticketId'])){
 if (!$ticket['ticketId']){
    $error = true;
  }
  }else{
    $error = true;
  }
?>

<!doctype html> 
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo $website['title']; ?> - </title>
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
<script type="text/javascript">
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Locale.dataPath = 'data/i18n.frag.xml';
});
</script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
</head>
<body class="en-gb logged-in">
<div id="layout-top">
<div class="wrapper">
<div id="header">
<?php include("../functions/header_account.php"); ?>
<?php include("../functions/footer_man_nav.php"); ?>
</div>
<div id="warnings-wrapper">
<!--[if lt IE 8]>
<div id="browser-warning" class="warning warning-red">
<div class="warning-inner2">
You are using an outdated web browser.<br />
<a href="http://eu.blizzard.com/support/article/browserupdate">Upgrade</a> or <a href="http://www.google.com/chromeframe/?hl=en-GB" id="chrome-frame-link">install Google Chrome Frame</a>.
<a href="#close" class="warning-close" onclick="App.closeWarning('#browser-warning', 'browserWarning'); return false;"></a>
</div>
</div>
<![endif]-->
<!--[if lte IE 8]>
<script type="text/javascript" src="wow/static/local-common/js/third-party/CFInstall.min.js?v22"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
var age = 365 * 24 * 60 * 60 * 1000;
var src = 'https://www.google.com/chromeframe/?hl=en-GB';
if ('http:' == document.location.protocol) {
src = 'http://www.google.com/chromeframe/?hl=en-GB';
}
document.cookie = "disableGCFCheck=0;path=/;max-age="+age;
$('#chrome-frame-link').bind({
'click': function() {
App.closeWarning('#browser-warning');
CFInstall.check({
mode: 'overlay',
url: src
});
return false;
}
});
});
//]]>
</script>
<![endif]-->
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

 
          <br/>
          <div id="category-title" class="title-text">
            <span class="field-name">Тема:</span> 
          </div>
 
          <div id="submit-form">
            <form method="post" action="/support/ru/ticket/details" id="create-ticket" enctype="multipart/form-data" >
              <input type="hidden" id="csrftoken" name="csrftoken" value="cb36e0f5-f248-4199-a442-3f386aa7a67c" />
              <div id="ticket-form-fields">
 
                <div id="d3compromised">
                </div>
                <div class="editor" id="post-edit">
                  <div class="input-row input-row-textarea">






                    <span class="input-left">
                      <label for="description">
                        <span class="label-text">
                          Описание:
                        </span>
                        <span class="input-required">*</span>
                      </label>
                    </span>
                    <span class="input-right">
                      <span class="input-textarea input-textarea-extra-large">
                        <textarea name="description" id="description"  class="extra-large border-5 glow-shadow-2" cols="78" rows="8" tabindex="1" required="required" placeholder="Опишите ситуацию как можно точнее и подробнее. Чем яснее и детальнее описание, тем быстрее мы сможем разрешить проблему." maxlength="2000"></textarea>
                        <span id="description-charcount" class="inline-message">&#160;</span>
                        <span class="inline-message" id="description-message"> </span>
                      </span>
                    </span>
                  </div>
                </div>
 
              </div>
              <input type="hidden" id="categoryId" name="categoryId" value = "205" />
              <input type="hidden" id="categoryIds" name="categoryIds" value = "0,197,205" />
              <input type="hidden" id="game" name="game" value="1" />
              <input type="hidden" id="channel" name="channel" value="TICKET" />
              <div class="submit-row">
                <div class="input-left"></div>
                <div class="input-right">


                  <button class="ui-button button1 " type="submit" id="form-submit" tabindex="1" >
                    <span>
                      <span>Отправить</span>
                    </span>
                  </button>


                  <a class="ui-cancel" href="../account_man.php" tabindex="1">
                    <span>
                      Отмена
                    </span>
                  </a>

                </div>
              </div>
              <script type="text/javascript">
                //<![CDATA[
	(function() {
		var questionSubmit = document.getElementById('form-submit');
		questionSubmit.disabled = 'disabled';
		questionSubmit.className = questionSubmit.className + ' disabled';
	})();
        //]]>
              </script>
              <script type="text/javascript">
                //<![CDATA[
			var ReplyMsg = {
				textareaMessage0: 'Осталось {0} симв.',
				textareaMessage1: 'Осталось {0} симв.',
				textareaMessage2: '<span class="inline-error">Допустимый объем ответа — не более {0} символов.</span>',
				parenthesis: '({0})',
				myLicenses: 'Мои записи игр',
				myRealms: 'Мои игровые миры',
				myCharacters: 'Мои персонажи'
			};
        //]]>
              </script>
            </form>
          </div>
          <div id="live-chat-submit-response" class="ticket-submit-response">
            <p class="ticket-create-received">
              Ваш запрос отправлен. Как только кто-то из сотрудников освободится, он ответит вам в новом окне чата.
            </p>
            <p class="reference-ticket">
              Номер запроса:
              <a id="chat-ticket-link" href="#">
                <span id="chat-ticket-id"></span>
              </a>
            </p>
          </div>

        </div>
        <div class="footer-padding">
        </div>
        <script type="text/javascript">
          //<![CDATA[
$(function() {
	 
	var inputs = new Inputs('#create-ticket');
	var selectionInputs = new Inputs('#select-topic');
	var details = new TicketDetails(1);
	var categories = new TicketCategories(details, inputs);
	details.setCategories(categories);
	details.selectTicketCategory([0,197,205]);
	var attachments = new Attachments();
	isUserAuthenticated = true;
});
        //]]>
        </script>

        <!--[if IE 6]>		<script type="text/javascript" src="/support/static/local-common/js/third-party/DD_belatedPNG.js?v46"></script>
        <script type="text/javascript">
        //<![CDATA[
			DD_belatedPNG.fix('.icon-16');
			DD_belatedPNG.fix('.icon-32');
			DD_belatedPNG.fix('.icon-64');
			DD_belatedPNG.fix('.input-radio');
			DD_belatedPNG.fix('.input-checkbox');
			DD_belatedPNG.fix('.parchment');
        //]]>
        </script>
<![endif]-->

        <script type="text/javascript">
          //<![CDATA[
		$(function(){
		});
        //]]>
        </script>

      </div>
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
<script src="wow/static/js/bam.js?v23"></script>
<script src="wow/static/local-common/js/tooltip.js?v37"></script>
<script src="wow/static/local-common/js/menu.js?v37"></script>
<script type="text/javascript" src="wow/static/js/tickets.php/tickets.js?v122"></script>
<script src="wow/static/local-common/js/third-party/swfobject.js?v37"></script>
<script src="wow/static/js/management/dashboard.js?v23"></script>
<script src="wow/static/js/management/wow/dashboard.js?v23"></script>


</body>
</html>
