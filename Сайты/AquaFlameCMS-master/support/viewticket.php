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
  <link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/support/threads.css?v122" />
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
          <br/>
          <h3 class="headline">
            World Of Warcraft - Моя проблема с покупкой или оплатой не указана выше.  <span class="caption">(Запрос № EU33242898)</span>
          </h3>
        </div>
        <div id="page-content">
          <div class="columns-2 thread-actions">
            <div class="column thread-buttons">
              <a class="ui-button button1 button-icon " href="/support/ru/ticket/status" onmouseover="Tooltip.show(this, 'Вернуться к списку запросов', {'location': 'mouse'});" tabindex="1" >
                <span>
                  <span>
                    <strong class="icon">
                      <strong class="icon-16 icon-back-small"></strong>
                    </strong>
                  </span>
                </span>
              </a>
            </div>
            <div class="column thread-status">
              <h4 class="caption">
                Статус: <span class="status-archived">Архив</span>
              </h4>
              <p>
                (статус, присвоенный автоматически)
                <span class="icon-16 icon-help-small"
                onmouseover="Tooltip.show(this, 'Если запрос со статусом «Разрешен» не обновляется в течение 3 месяцев, ему автоматически присваивается статус «Архив».'
, {'location': 'bottomLeft'}
);"
></span>
              </p>
            </div>
          </div>
          <table class="message-thread" id="message-thread">
            <tbody>
              <tr class="message-row message-open" id="message-1">
                <td class="message-status message-toggle">
                  <span class="icon-16 icon-minimize" id="message-1-status"></span>
                </td>
                <td class="message-author message-toggle">
                  <span>Эд Дергелев</span>
                </td>
                <td class="message-content">
                  <div class="message-summary">
                    <p>
                      Добрый день!
                      после обновление версии аккаунта до стандартной версии в прошлом месяце, на моем кошельке battle.net остались средства.
                      Тепер
                    </p>
                    <div class="truncate-summary"></div>
                  </div>
                  <div class="message-full">
                    Добрый день!<br/>после обновление версии аккаунта до стандартной версии в прошлом месяце, на моем кошельке battle.net остались средства.<br/>Теперь же,когда срок подписки истек,хотел оплатить подписку. С помощью тех средств,оставшихся в кошельке.<br/>Возник вопрос-это возможно?<br/>при нажатии ссылки &quot;Оплатить подписку&quot;, переводит на страницу выбора способа оплаты.но кошелька battle.net там не увидел.<br/><br/>
                  </div>
                </td>
                <td class="message-meta">
                  <span class="date-summary">
                    (<span>
                      <time datetime="2013-03-24T17:18+03:00">24.03.13 17:18:03 MSK</time>
                    </span>)
                  </span>
                  <a href="#message-1" class="message-link">#1</a>
                  <span class="date-full">
                    <span>
                      <time datetime="2013-03-24T17:18+03:00">24.03.13 17:18:03 MSK</time>
                    </span>
                  </span>
                </td>
              </tr>
              <tr class="message-row message-open message-row-gm" id="message-2">
                <td class="message-status message-toggle">
                  <span class="icon-16 icon-minimize" id="message-2-status"></span>
                </td>
                <td class="message-author message-toggle">
                  <span>Хананоми</span>
                  <span class="author-title">
                    Сотрудник службы поддержки
                  </span>
                </td>
                <td class="message-content">
                  <div class="message-summary">
                    <p>
                      Добрый день!
                      Спасибо за запрос!
                      Кошелек Battle.net – это новая функция Battle.net, которая позволяет содержать средства на вашей учетн
                    </p>
                    <div class="truncate-summary"></div>
                  </div>
                  <div class="message-full">
                    Добрый день!<br/><br/>Спасибо за запрос!<br/><br/>Кошелек Battle.net – это новая функция Battle.net, которая позволяет содержать средства на вашей учетной записи Battle.net, на которые можно приобретать платные услуги и игры Blizzard Entertainment, включая электронные версии игр Diablo III, StarCraft II, World of Warcraft и дополнения к World of Warcraft.<br/><br/>Замечание: На данный момент покупка товаров в онлайн магазине Blizzard и оплата подписки при помощи кошелька Battle.net невозможна.<br/><br/>Если Вам потребуется наша консультация по какому-либо другому вопросу наш отдел всегда будет рад ответить. <br/><br/>С наилучшими пожеланиями,<br/><br/>Гейм-мастер Хананоми<br/>Служба внутриигровой поддержки<br/>Blizzard Europe
                  </div>
                </td>
                <td class="message-meta">
                  <span class="date-summary">
                    (<span>
                      <time datetime="2013-03-27T17:18+03:00">27.03.13 17:18:27 MSK</time>
                    </span>)
                  </span>
                  <a href="#message-2" class="message-link">#2</a>
                  <span class="date-full">
                    <span>
                      <time datetime="2013-03-27T17:18+03:00">27.03.13 17:18:27 MSK</time>
                    </span>
                  </span>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
        <script type="text/javascript">
          //<![CDATA[
$(function() {
	var thread = new MessageThread('#message-thread');
	var attachments = new Attachments();
	var inputs = new Inputs('#message-editor');
	var editor = new MessageEditor('#message-editor', {
	    maxCharacters: 2000
	});
	var times = new DateTime();
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
