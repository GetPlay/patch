<?php
include("configs.php");
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
<title><?php echo $website['title']; ?><?php echo @$Man['Man']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/index.ico" type="image/x-icon" />
<link rel="stylesheet" media="all" href="wow/static/local-common/css/management/common.css" />
<link rel="stylesheet" media="all" href="wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="wow/static/css/bnet-print.css" />
<link rel="stylesheet" media="all" href="wow/static/css/management/dashboard.css" />
<link rel="stylesheet" media="all" href="wow/static/css/management/wow/dashboard.css" />
  <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/support/chatinvitation.css?v122" />
  <link rel="stylesheet" type="text/css" media="print" href="wow/static/css/support/support-print.css?v122" />
  <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/support/tickets.css?v122" />  
  <script src="wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="wow/static/local-common/js/core.js"></script>
<script src="wow/static/local-common/js/tooltip.js"></script>
<script src="wow/static/local-common/js/third-party/swfobject.js?v37"></script>
<script src="wow/static/js/management/dashboard.js?v23"></script>
<script src="wow/static/js/management/wow/dashboard.js?v23"></script>
<script src="wow/static/js/bam.js?v23"></script>
<script src="wow/static/local-common/js/tooltip.js?v37"></script>
<script src="wow/static/local-common/js/menu.js?v37"></script>
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
<?php include("functions/header_account.php"); ?>
<?php include("functions/footer_man_nav.php"); ?>
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
          <h3 class="headline">Состояние запросов</h3>
        </div>
        <div id="page-content">
          <div class="ticket-filters">
            <span class="create-ticket">
              <a class="ui-button button1 " href="/support/ru/ticket/submit" id="create-ticket" tabindex="1" >
                <span>
                  <span>Подать запрос</span>
                </span>
              </a>
            </span>
 
            <div class="ticket-filter" id="ticket-filter" style="display: none;">
              <form method="get" action="/support/ru/ticket/status">
                <span class="input-left">
                  <label for="filter-select">
                    <span class="label-text">
                      Показывать:
                    </span>
                    <span class="input-required"></span>
                  </label>
                </span>
                <span class="input-right">
                  <span class="input-select input-select-extra-small">
                    <select name="show" id="filter-select" class=" extra-small border-5 glow-shadow-2" tabindex="1">
                      <option value="active" selected="selected">Открытые запросы</option>
                      <option value="all">Все запросы</option>
                    </select>
                    <span class="inline-message" id="filter-select-message"> </span>
                  </span>
                </span>
                <script type="text/javascript">
                  //<![CDATA[
(function() {
var ticketFilter = document.getElementById('ticket-filter');
ticketFilter.style.display = 'inline-block';
})();
//]]>
                </script>
              </form>
            </div>
            <span class="clear">
              <!-- -->
            </span>
          </div>
          <table id="ticket-history">
            <thead>
              <tr>
                <th scope="col" class="ticket-id">
                  <a href="#" class="sort-link">
                    <span class="arrow">Запрос</span>
                  </a>
                </th>
                <th scope="col" class="ticket-subject">
                  <a href="#" class="sort-link">
                    <span class="arrow">Тема</span>
                  </a>
                </th>
                <th scope="col" class="ticket-date">
                  <a href="#" class="sort-link">
                    <span class="arrow down">Обновлен</span>
                  </a>
                </th>
                <th scope="col" class="ticket-type">
                  <a href="#" class="sort-link">
                    <span class="arrow">Автор</span>
                  </a>
                </th>
                <th scope="col" class="ticket-status">
                  <a href="#" class="sort-link">
                    <span class="arrow">Статус</span>
                  </a>
                </th>
              </tr>
            </thead>
            <tbody>


              <?php
      mysql_select_db($server_cdb);
          $ticket_query = mysql_query("SELECT U.guid,U.name,A.title,A.ticketId,A.closedBy FROM characters U, gm_tickets A 
            WHERE A.guid = U.guid");
          while ($ticket = mysql_fetch_assoc($ticket_query)){
          ?>
              <tr class="ticket-read">
                <td class="ticket-id" >
                <a class="ticket-link" href="/<?php echo $ticket['ticketId']; ?>">
                  <span class="ticket">EU<?php echo $ticket['ticketId']; ?>
                  </span>
                </a>
                </td>
                  <td class="ticket-subject" >
                <div class="subject">
                  <div class="subject-line">
                    <?php echo $ticket['title']; ?>
                  </div>
                  <div class="truncate-subject"></div>
                </div>
                  </td>
                <td class="ticket-date" >
                <span>
                  <time datetime="">-</time>
                </span>
                </td>

                    <td class="ticket-date" >
                <div class="subject">
                  <div class="subject-line">
                    <?php echo $ticket['name']; ?>
                  </div>
                  <div class="truncate-subject"></div>
                </div>
                    </td>
                    <td class="ticket-status" >
                <?php
      mysql_select_db($server_cdb);
          $ticket_query2 = mysql_query("SELECT A.guid,A.name,U.ticketId,U.closedBy FROM gm_tickets U, characters A 
            WHERE A.guid = U.closedBy limit 1");
          while ($ticket2 = mysql_fetch_assoc($ticket_query2)){
          ?>
                <div class="status status-archived" data-tooltip="
                  <?php 
           if ($ticket['closedBy'] > 0) {                         
            echo 'Ваш запрос был перенесен в архив администратором: ' ;
            echo $ticket2['name'];
             }else{
            echo 'Не просмотрен';
            }
         ?>" data-tooltip-options='{"location": "mouse"}'>
                  <?php 
           if ($ticket['closedBy'] > 0) {                         
            echo 'Архив' ;
             }else{
            echo 'Открыт';
            }
         ?>          <?php
        }
        ?>
                </div>
                    </td>
              </tr>

              <?php
        }
        ?> 
              <tr class="no-results">
                <td class="empty-table" colspan="5">
                  <div class="no-tickets">
                    <p>
                      В настоящий момент у вас нет открытых запросов в службу поддержки. Если вы хотите просмотреть свои предыдущие запросы, откройте <a href="" id="filter-link" rel="all">список «Все запросы»</a>.
                    </p>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="ticket-assistance columns-2"> </div>
        </div>
        <script type="text/javascript">
          //<![CDATA[
$(function() {
var history = new TicketHistory({
results: 10
});
});
//]]>
        </script>
        <!--[if IE 6]> <script type="text/javascript" src="/support/static/local-common/js/third-party/DD_belatedPNG.js?v46"></script>
<script type="text/javascript">
//<![CDATA[
DD_belatedPNG.fix('.icon-16');
DD_belatedPNG.fix('.icon-alert-success');
DD_belatedPNG.fix('.icon-64');
DD_belatedPNG.fix('.input-radio');
DD_belatedPNG.fix('.input-checkbox');
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
<?php include("functions/footer_man.php"); ?>
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
