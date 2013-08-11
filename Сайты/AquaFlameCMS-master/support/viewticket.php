<?php
include("../configs.php");
$page_cat = 'summary';
 
if (!isset($_SESSION['username'])) {
        header('Location: account_log.php');		
}

if (isset($_GET['ticketId'])){
 if (!$ticket['ticketId']){
    $error = true;
  }
  }else{
    $error = true;
  }
  
  if (isset($_GET['ticketId'])){
  mysql_select_db($server_cdb);
  $ticket = mysql_fetch_assoc(mysql_query("SELECT * FROM gm_tickets WHERE ticketId = '".$_GET['ticketId']."'"));
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
<title><?php echo $website['title']; ?> - <?php echo $Support15['Support15']; ?>
</title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/index.ico" type="image/x-icon" />
<link rel="stylesheet" media="all" href="../wow/static/local-common/css/management/common.css" />
<link rel="stylesheet" media="all" href="../wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="../wow/static/css/bnet-print.css" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/support/support.css?v122" /> 
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/support/chatinvitation.css?v122" />
<link rel="stylesheet" type="text/css" media="print" href="../wow/static/css/support/support-print.css?v122" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/support/tickets.css?v122" />
  <link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/support/threads.css?v122" />
  <script src="../wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="../wow/static/local-common/js/core.js"></script>
<script src="../wow/static/local-common/js/tooltip.js"></script> 
<script src="../wow/static/js/bam.js?v23"></script> 
</head>
<body class="en-gb logged-in">
<div id="layout-top">
<div class="wrapper">
<div id="header">
<?php include("../functions/header_account.php"); ?>
<?php include("../functions/footer_man_nav.php"); ?>
</div>
<div id="warnings-wrapper"> 
</div>
</div>
</div>
  <div id="layout-middle">
    <div class="wrapper"> 
      <div id="content"> 
        <div class="page-header" id="page-header"> 
          <br/>
          <h3 class="headline">
            World Of Warcraft - <?php echo $ticket['title']; ?>.  <span class="caption">(Запрос № EU<?php echo $ticket['ticketId']; ?>)</span>
          </h3>
        </div>
        <div id="page-content">
          <div class="columns-2 thread-actions">
            <div class="column thread-buttons">
              <a class="ui-button button1 button-icon " href="ticket.php" onmouseover="Tooltip.show(this, 'Вернуться к списку запросов', {'location': 'mouse'});" tabindex="1" >
                <span>
                  <span>назад</span>
                </span>
              </a>
            </div>
            <div class="column thread-status">
              <h4 class="caption">
                Статус: <span class="status-archived">
               <?php   if($ticket['closedBy'] != 0)
                  echo  ' архив  ';
                  else
                  echo  ' открыт  ';?>
                </span>
              </h4> 
            </div>
          </div>
          <table class="message-thread" id="message-thread">
            <tbody>
              <tr class="message-row message-open" id="message-1">
                <td class="message-status message-toggle">
                  <span class="icon-16 icon-minimize" id="message-1-status"></span>
                </td>
                <td class="message-author message-toggle">
                  <span><?php echo $ticket['name']; ?></span>
                  <span class="author-title">
                    (Эд Дергелев)
                  </span>
                </td>
                <td class="message-content">
                  <div class="message-summary">
                    <div class="truncate-summary"></div>
                  </div>
                  <div class="message-full">
                    <?php echo $ticket['message']; ?>
                  </div>
                </td>
                <td class="message-meta">
                  <span class="date-full">
                    <span> 
                        <?php echo $ticket['createTime']; ?> MSK 
                    </span>
                  </span> 
                </td>
              </tr>
              <tr class="message-row message-open message-row-gm" id="message-2">
                <td class="message-status message-toggle">
                  <span class="icon-16 icon-minimize" id="message-2-status"></span>
                </td>
                <td class="message-author message-toggle">
                  <?php
              if($ticket['comment'] != NULL)
              echo  ' <span> '.$ticket['closedBy'].'  <span class="author-title">
                    Сотрудник службы поддержки
                  </span> 
                <td class="message-content"> 
                    <div class="truncate-summary"></div> 
                  <div class="message-full"> 
                    Добрый день!
                   '.$ticket['comment'].' 
                    <br/><br/>С наилучшими пожеланиями,
                    <br/><br/>Гейм-мастер '.$ticket['closedBy'].' 
                    <br/>Служба внутриигровой поддержки
                    <br/>'.$website['title'].'                </td>
                <td class="message-meta">
                  <span class="date-full">
                    <span>'.$ticket['lastModifiedTime'].' MSK
                    </span>
                    </span> ';
              else {
              echo  '  
              '; }?>


                </td>
              </tr>
            </tbody>
          </table>

        </div>
 

      </div>
    </div>
  </div>

  <div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div> 
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
} 
};
//]]>
</script> 


</body>
</html>
