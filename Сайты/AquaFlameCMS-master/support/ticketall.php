<?php
include("../configs.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
<head>
<title><?php echo $website['title']; ?> - <?php echo $Support['Support']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common.css?v22" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common-ie.css?v22" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common-ie6.css?v22" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common-ie7.css?v22" /><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/support/support.css?v122" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/support/search.css?v46" />
<script type="text/javascript" src="../wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script type="text/javascript" src="../wow/static/local-common/js/core.js?v22"></script>
<script type="text/javascript" src="../wow/static/local-common/js/tooltip.js?v22"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '/account';
Core.sharedStaticUrl= 'wow/static/local-common';
Core.baseUrl = '/account';
Core.supportUrl = 'http://eu.battle.net/support/';
Core.secureSupportUrl= 'https://eu.battle.net/support/';
Core.project = 'bam';
Core.locale = 'en-gb';
Core.buildRegion = 'eu';
Core.shortDateFormat= 'dd/MM/yyyy';
Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
Core.loggedIn = true;
Flash.videoPlayer = 'http://eu.media.blizzard.com/global-video-player/themes/bam/video-player.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/bam/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/global-video-player/ratings/bam/rating-pegi.jpg';
Flash.expressInstall= 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
//]]>
</script>
</head>
<body class="en-gb logged-in">
<div id="layout-top">
<div class="wrapper">
<div id="header">
<?php include("../functions/header_account.php"); ?>
</div>

<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="page-content" class="support-search-results">
<div class="relative-container-outer">
<div class="relative-container-middle">
<div class="relative-container-inner">
<div class="search-left support-left-container">
<div>
<div class="submit-ticket">
<h3 class="support-header" id="submit-ticket-header">Обратиться за помощью</h3>
<p> Вам так и не удалось разобраться, что делать?.. Не беда. Подайте запрос в службу поддержки. Мы вам обязательно поможем! </p>
<button class="ui-button button1 " type="button" id="submit-ticket-button" onclick="window.location.href='/support/ru/ticket/submit'" tabindex="2" >
<span>
<span>Обратиться за помощью</span>
</span>
</button>
</div>
</div>
</div>
<div class="search-right support-right-container">
<div class="search-header">
<div id="support-search">
<form id="support-search-form" class="transparent search" action="../search_s.php" method="get">
<div>
<input id="support-search-field" type="text" name="search" maxlength="200" autocomplete="off" alt="Поиск по статьям службы поддержки" value="Поиск по статьям службы поддержки" tabindex="50" accesskey="q"/>
<button class="ui-button search-button " type="submit" id="support-search-button" tabindex="1" >
<span>
<span>Поиск</span>
</span>
</button>
</div>
</form>
</div>
<div class="shadow-drop"></div>
</div>


<div id="search-results-container">
<div class="helpers">
<h3 class="category "> Результаты поиска </h3>
</div>
<div class="summary">
<div class="results results-grid support-results">
<div class="grid">
<div class="support">
							<?php
							$articles_query = mysql_query("SELECT ticketId,name,message,comment FROM $server_cdb.gm_tickets ORDER BY ticketId desc LIMIT 4")or print("No Articles");
							while($articles = mysql_fetch_array($articles_query)){
							?>	
<br />
			<strong>
					<em>

							<div class="meta">Тикет: 
								<a href="ticketinfo.php?ticketId=<?php echo $articles['ticketId']; ?>">
									<span class="featured-desc"> <?php echo $articles['message']; ?> </span>
								</a>
							</div>
					</em>
			</strong>
<div class="meta"><strong>Ответ:</strong> <?php echo $articles['comment']; ?> </div>
<div class="meta"><strong>Автор:</strong> <?php echo $articles['name']; ?></div>
<div class="meta"><strong>Номер статьи (ID):</strong> <?php echo $articles['ticketId']; ?></div>
<div class="meta"><strong>Обновление:</strong> </div>
							<?php
							}
							?>
<span class="clear"><!-- --></span>
</div>
</div>
     
<span class="clear"><!-- --></span>
</div>
</div> 
</div>
</div>
</div>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
<!--[if IE 6]> <script type="text/javascript" src="/support/static/local-common/js/third-party/DD_belatedPNG.js?v46"></script>
<script type="text/javascript">
//<![CDATA[
DD_belatedPNG.fix('.icon-16');
DD_belatedPNG.fix('.icon-alert-success');
DD_belatedPNG.fix('.icon-64');
DD_belatedPNG.fix('.input-radio');
DD_belatedPNG.fix('.input-checkbox');
DD_belatedPNG.fix('.relative-container-middle');
DD_belatedPNG.fix('.shadow-drop');
DD_belatedPNG.fix('.item-active');
DD_belatedPNG.fix('.comments-link');
DD_belatedPNG.fix('.game-icon-small');
DD_belatedPNG.fix('.search');
DD_belatedPNG.fix('.view-all a');
DD_belatedPNG.fix('.fader');
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
$(function(){
SupportSearch.initialize('/support/ru/search/suggest', '/support/ru/search');
new SearchDropdownManipulator(55);
FacetFilter.initialize();
Search.map.kb = 'kb';
Search.initialize('/support/ru/search/suggest', '#search-field');
});
//]]>
</script>
</div>
</div>
</div>

<div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div>
<script type="text/javascript">
//<![CDATA[
var xsToken = '99fdec16-4132-4511-9b04-8df6e4a12088';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}'s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
ticketAll: 'View All Tickets'
},
cms: {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Item Lvl",
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
}
};
//]]>
</script>
<script type="text/javascript" src="wow/static/js/bam.js?v21"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js?v22"></script>
<script type="text/javascript" src="wow/static/local-common/js/menu.js?v22"></script>
<script type="text/javascript">
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Locale.dataPath = 'data/i18n.frag.xml';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v22"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script type="text/javascript" src="wow/static/js/download/download.js?v21"></script>
<script type="text/javascript" src="wow/static/js/management/d3/dashboard.js?v21"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("wow/static/local-common/js/overlay.js?v22");
Core.load("wow/static/local-common/js/search.js?v22");
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v22");
Core.load("wow/static/local-common/js/third-party/jquery.mousewheel.min.js?v22");
Core.load("wow/static/local-common/js/third-party/jquery.tinyscrollbar.custom.js?v22");
Core.load("wow/static/local-common/js/login.js?v22", false, function() {
Login.embeddedUrl = '<?php echo $website['root'];?>loginframe.php';
});
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
(function() {
var ga = document.createElement('script');
var src = "https://ssl.google-analytics.com/ga.js";
if ('http:' == document.location.protocol) {
src = "http://www.google-analytics.com/ga.js";
}
ga.type = 'text/javascript';
ga.setAttribute('async', 'true');
ga.src = src;
var s = document.getElementsByTagName('script');
s = s[s.length-1];
s.parentNode.insertBefore(ga, s.nextSibling);
})();
//]]>
</script>
</body>
</html>