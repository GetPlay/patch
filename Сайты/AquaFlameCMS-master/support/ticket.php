<?php
include("../configs.php");
$page_cat = 'summary'; 
?>

<!doctype html> 
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo $website['title']; ?> - <?php echo $Support14['Support14']; ?></title>
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
        <noscript>
          <div id="javascript-warning" class="warning warning-red">
            <div class="warning-inner2">
              <?php echo $Man['Man2']; ?>
            </div>
          </div>
        </noscript>
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
              <a class="ui-button button1 " href="/support/newticket.php" id="create-ticket" tabindex="1" >
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
                <a class="ticket-link" href="viewticket.php?ticketId=<?php echo $ticket['ticketId']; ?>">
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
