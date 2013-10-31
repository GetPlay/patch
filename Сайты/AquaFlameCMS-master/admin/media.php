<?php
include("../configs.php");
mysql_select_db($server_adb);
$check_query = mysql_query("SELECT gmlevel from account inner join account_access on account.id = account_access.id where username = '" . strtoupper($_SESSION['username']) . "'") or die(mysql_error());
$login = mysql_fetch_assoc($check_query);
if ($login['gmlevel'] < 3) {
    die('
<meta http-equiv="refresh" content="0;url=wrong.php"/>
        ');
}


if (isset($_GET['sort']) == 'type') {    //Order by...
    $order = ' type ASC, ';
} elseif (isset($_GET['sort']) == 'title') {
    $order = ' title ASC, ';
} elseif (isset($_GET['sort']) == 'author') {
    $order = ' author ASC, ';
} else {
    $order = '';
}
//MEDIA TYPES VIEW **** Types: 0-video, 1-screen,2-wall,3-art,4-comic,5-download
if (isset($_GET['type']) == '') {
    $type = "";
} else {
    $type = "AND type='";
    $type .= $_GET['type'];
    $type .= "'";
}

mysql_select_db($server_db) or die(mysql_error());
$sql = mysql_query("SELECT * FROM media WHERE visible = '0' ".$type."");
$sql2 = mysql_query("SELECT * FROM media WHERE visible = '1' ".$type."");

//PAGINATION BEGIN
$size = 10;
$num_r = mysql_num_rows($sql);
$num_p = ceil($num_r / $size);
//Look for the number page, if not then first
if (!isset($_GET['page']) || empty($_GET['page']) || $_GET['page'] < 1) {   //More control for 'go to' textbox
    $page = 1;
} elseif ($_GET['page'] > $num_p) { //If overflow the show last page
    $page = $num_p;
} else {
    $page = $_GET['page'];
}
$start = ($page - 1) * $size;  //the first result to show
//PAGINATION END
$sql_string = "SELECT * FROM media WHERE visible = '0' " .$type. " ORDER BY " . $order . " date DESC LIMIT $start,$size";
$sql_string2 = "SELECT * FROM media WHERE visible = '1' " .$type. " ORDER BY " . $order . " date DESC LIMIT $start,$size";
$sql_query = mysql_query($sql_string); //add limit for pagination work
$sql_query2 = mysql_query($sql_string2);
?>
<?php   $login_query = mysql_query("SELECT * FROM $server_adb.account WHERE username = '" . mysql_real_escape_string($_SESSION["username"]) . "'");
      $login2 = mysql_fetch_assoc($login_query);
      $joindate = date("d.m.Y ", strToTime($login2['joindate']));
  
      $uI = mysql_query("SELECT avatar FROM $server_db.users WHERE id = '" . $login2['id'] . "'");
      $userInfo = mysql_fetch_assoc($uI);
  ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $website['title']; ?> - <?php echo $admin['AP']; ?> - <?php echo $admin['Media']; ?></title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
  <link rel="shortcut icon" href="img/favicon.png">
  <!---CSS Files-->
  <link rel="stylesheet" href="css/core.css">
  <link rel="stylesheet" href="css/ui.css">
  <link rel="stylesheet" href="css/style.css">
  <!---jQuery Files-->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/inputs.js"></script>
  <script src="js/minicolors.js"></script>
  <script src="js/cleditor.js"></script>
  <script src="js/functions.js"></script>
  <script type="text/javascript">
    function changeType(num) 
    {
      objVid = document.getElementById('videoLnk');
      objImg = document.getElementById('uploadImg');
      objFieldVid = document.getElementById('fieldVideo');
      objFieldImg = document.getElementById('fieldUpload');
      if (num == '0') 
      {
        objVid.style.display = '';
        objFieldVid.style.display = '';
        objFieldVid.required = 'required';
        objImg.style.display = 'none';
        objFieldImg.required = '';
      } 
      else 
      {
        objVid.style.display = 'none';
        objFieldVid.style.display  = 'none';
        objFieldVid.required = '';
        objImg.style.display = '';
        objFieldImg.required = 'required';
      }
    }
               
  </script>
</head>
<body>
  <div id="wrapper">
    <?php include('header.php'); ?>
    <div id="content" class="inputs-page">
<div class="box g16">
        <h2 class="box-ttl"><?php echo $admin['unapprovedMedia']; ?></h2>                   
        <div class="box-body no-pad datatable-cont">
          <div id="example_wrapper" class="dataTables_wrapper" role="grid"><div id="example_length" class="dataTables_length">Show <div class="drop select"><select size="1" name="example_length" aria-controls="example" class="transformed" style="display: none;"><option value="5" selected="selected">5</option><option value="10">10</option><option value="25">25</option></select><ul><li class="sel">5</li><a href="?type=0" style="color: #999999;"><li class="">10</li></a><li>25</li></ul><span class="opt-sel" data-default-val="5">5</span><span class="arrow">&amp;</span></div> entries</div>
          <div style="width: 25px;"></div>
          <div id="example_length" class="dataTables_length">
            Select 
            <div class="drop select" style="width: 90px;">
              <ul>
                <a href="media.php" style="color: #999999;"><li class="sel"><?php echo $Media['All']; ?></li></a>
                <a href="?type=0" style="color: #999999;"><li class=""><?php echo $Media['Videos']; ?></li></a>
                <a href="?type=2" style="color: #999999;"><li class=""><?php echo $Media['Screenshots']; ?></li></a>
                <a href="?type=1" style="color: #999999;"><li class=""><?php echo $Media['Wallpapers']; ?></li></a>
                <a href="?type=3" style="color: #999999;"><li class=""><?php echo $Media['Artwork']; ?></li></a>
                <a href="?type=4" style="color: #999999;"><li class=""><?php echo $Media['Comics']; ?></li></a>
                <a href="?type=5" style="color: #999999;"><li class=""><?php echo $Media['Download']; ?></li></a>
              </ul>
              <span class="opt-sel" data-default-val="All"><?php echo $Media['All']; ?></span>
              <span class="arrow">&amp;</span>
            </div>
          </div>
          <div class="dataTables_filter" id="example_filter"><label>Search: <input type="text" aria-controls="example"></label></div><table class="display table dataTable" id="example" aria-describedby="example_info">
            <thead>
              <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 0px;"><font color="green"><?php echo $admin['Title']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['author']; ?></font></th>
              <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['Desc']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['Date']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['Type']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 170px;"><font color="green"><?php echo $admin['approved']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 140px;"><font color="green"><?php echo $admin['Del']; ?></font></th></tr>
            </thead>
            
          <tbody role="alert" aria-live="polite" aria-relevant="all">
          <?php
          
                                    while ($row = mysql_fetch_assoc($sql_query)) {
                                    $author = mysql_fetch_assoc(mysql_query("SELECT username FROM $server_adb.account WHERE id = '" . $row['author'] . "'"));
                                    echo'
                                <tr class="gradeX odd">
                                <td class=" sorting_1">' . $row['title'] . '...</td>
                                <td class="center">' . $author['username'] . '</td>
                                <td>' . strip_tags(substr($row['description'], 0, 60)) . '...</td>                      
                                <td class="center ">' . date('d-m-Y', strtotime($row['date'])) . '</td>
                                <td class="center ">';
                                    if ($row['type'] == '0') {
                                        echo ''.$Media['Videos'].'';
                                    } elseif ($row['type'] == '1') {
                                        echo ''.$Media['Wallpapers'].'';
                                    } elseif ($row['type'] == '2') {
                                        echo ''.$Media['Screenshots'].'';
                                    } elseif ($row['type'] == '3') {
                                        echo ''.$Media['Artwork'].'';
                                    } elseif ($row['type'] == '4') {
                                        echo ''.$Media['Comics'].'';
                                    } elseif ($row['type'] == '5') {
                                        echo ''.$Media['Download'].'';
                                    }
                                    echo'</td>
                                <td class="center "><form method="post"><input type="hidden" name="actionid" value="'. $row['id'] .'"><a href="">
                                <button class="btn-m green has-icon-r" name="approve">                         
                                <span class="icon">&lt;</span>'.$admin['approved'].'</button></a>
								<td class="center "><a href="">
                                <button class="btn-m red has-icon" name="delete">
                                <span class="icon2">X</span>'.$admin['Del'].'</button></a></form></td>
                                </tr>';
                                }
                  ?>
                </tbody></table><div class="dataTables_info" id="example_info">Showing 0 to 0 of 0 entries</div><div class="dataTables_paginate paging_full_numbers" id="example_paginate"><a tabindex="0" class="first button" id="example_first">First</a><a tabindex="0" class="previous button" id="example_previous">%</a><span><a tabindex="0" class="button">1</a><a tabindex="0" class="button pressed">2</a><a tabindex="0" class="button">3</a></span><a tabindex="0" class="next button" id="example_next">(</a><a tabindex="0" class="last button" id="example_last">Last</a></div></div>
        </div></div>
      <div id="inputs" class="box g6">
        <h2 class="box-ttl"><?php echo $Media['SendMedia']; ?></h2>
        <p>&nbsp;</p>
        <div id="page-content">
          <div class="filter" style="padding-left: 10px;">
            <label for="filter-status"><?php echo $Media['ChooseMediaSend']; ?></label>
          </div>
          <div class="box-body form" id="inputs">
            <form action="" enctype="multipart/form-data" method="post">
              <select name="type" id="type" class="input border-5 glow-shadow-2 form-disabled" style="width:150px" data-filter="column" data-column="0" onchange="changeType(this.selectedIndex)">
                <option value="0" selected="selected"><?php echo $Media['Videos']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="1"><?php echo $Media['Wallpapers']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="2"><?php echo $Media['Screenshots']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="3"><?php echo $Media['Artwork']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="4"><?php echo $Media['Comics']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="5"><?php echo $Media['Download']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
              </select>
              <br>
              <br>
              <br>
              <br>
              <p>&nbsp;</p>
              <span class="label input g4"><?php echo $admin['Title']; ?></span>
              <input type="text" maxlength="40" name="title_form"  type="url" class="g12" placeholder="<?php echo $admin['Entertitle']; ?>" required="required" >
              <div id="videoLnk">
                <span id="videoLnk" class="label input g4"><?php echo $admin['YTLink']; ?></span>
                <input id="fieldVideo" name="url_form" type="url" class="g12" placeholder="<?php echo $admin['EnterURLYT']; ?>" required="required" />
              </div>
              <div id="uploadImg" style="display: none;">
                <span class="label input g4"><?php echo $admin['FileSelect']; ?></span>
                <div class="file-sel g12">
                  <input type="hidden" name="MAX_SIZE" value="20000000" />
                  <input type="file" class="file full" id="fieldUpload" name="file">
                  <span class="icon">,</span>
                </div>
              </div>
              <span class="label input g4"><?php echo $admin['Desc']; ?></span>
              <textarea type="text" name="description_form" class="g12" required="required" ></textarea>
              <div style="float: right; padding-right: 10px;">
              <button type="submit" class="btn-m green" name="send"><?php echo $admin['SubMedia']; ?></button>
              <button align="right" type="reset" class="btn-m" class="ui-cancel "><?php echo $admin['Cancel']; ?></button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <div class="box g10">
        <h2 class="box-ttl"><?php echo $admin['approvedMedia']; ?></h2>
            <div class="box-body no-pad datatable-cont">
          <div id="example_wrapper" class="dataTables_wrapper" role="grid"><div id="example_length" class="dataTables_length">Show <div class="drop select"><select size="1" name="example_length" aria-controls="example" class="transformed" style="display: none;"><option value="5" selected="selected">5</option><option value="10">10</option><option value="25">25</option></select><ul><li class="sel">5</li><a href="?type=0" style="color: #999999;"><li class="">10</li></a><li>25</li></ul><span class="opt-sel" data-default-val="5">5</span><span class="arrow">&amp;</span></div> entries</div>
          <div style="width: 25px;"></div>
          <div id="example_length" class="dataTables_length">
            Select 
            <div class="drop select" style="width: 90px;">
              <ul>
                <a href="media.php" style="color: #999999;"><li class="sel"><?php echo $Media['All']; ?></li></a>
                <a href="?type=0" style="color: #999999;"><li class=""><?php echo $Media['Videos']; ?></li></a>
                <a href="?type=2" style="color: #999999;"><li class=""><?php echo $Media['Screenshots']; ?></li></a>
                <a href="?type=1" style="color: #999999;"><li class=""><?php echo $Media['Wallpapers']; ?></li></a>
                <a href="?type=3" style="color: #999999;"><li class=""><?php echo $Media['Artwork']; ?></li></a>
                <a href="?type=4" style="color: #999999;"><li class=""><?php echo $Media['Comics']; ?></li></a>
                <a href="?type=5" style="color: #999999;"><li class=""><?php echo $Media['Download']; ?></li></a>
              </ul>
              <span class="opt-sel" data-default-val="All"><?php echo $Media['All']; ?></span>
              <span class="arrow">&amp;</span>
            </div>
          </div>
          <div class="dataTables_filter" id="example_filter"><label>Search: <input type="text" aria-controls="example"></label></div><table class="display table dataTable" id="example" aria-describedby="example_info">
            <thead>
              <tr role="row">
              <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 0px;"><font color="green"><?php echo $admin['Title']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['author']; ?></font></th>
              <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['Desc']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['Date']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['Type']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 170px;"><font color="green"><?php echo $admin['unapproved']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 140px;"><font color="green"><?php echo $admin['Del']; ?></font></th>
              </tr>
            </thead>
            
          <tbody role="alert" aria-live="polite" aria-relevant="all">
      <?php
      
                  while ($row2 = mysql_fetch_assoc($sql_query2)) {
                                    $author2 = mysql_fetch_assoc(mysql_query("SELECT username FROM $server_adb.account WHERE id = '" . $row2['author'] . "'"));
                                    echo'
                <tr class="gradeX odd">
                <td class=" sorting_1">' . $row2['title'] . '...</td>
                <td class="center">' . $author2['username'] . '</td>
                <td>' . strip_tags(substr($row2['description'], 0, 40)) . '...</td>            
                <td class="center ">' . date('d-m-Y', strtotime($row2['date'])) . '</td>
                <td class="center ">';
                                    if ($row2['type'] == '0') {
                                        echo ''.$Media['Videos'].'';
                                    } elseif ($row2['type'] == '1') {
                                        echo ''.$Media['Wallpapers'].'';
                                    } elseif ($row2['type'] == '2') {
                                        echo ''.$Media['Screenshots'].'';
                                    } elseif ($row2['type'] == '3') {
                                        echo ''.$Media['Artwork'].'';
                                    } elseif ($row2['type'] == '4') {
                                        echo ''.$Media['Comics'].'';
                                    } elseif ($row2['type'] == '5') {
                                        echo ''.$Media['Download'].'';
                                    }
                                    echo'</td>
                                <td class="center "><form method="post"><input type="hidden" name="actionid" value="'. $row2['id'] .'">
								<a href="">
                                <button class="btn-m orange has-icon-r" name="unapprove">
								<span class="icon">&lt;</span>'.$admin['unapproved'].'</button>
								</a>
                                </td>
								<td class="center ">
								<a href="">
								<button class="btn-m red has-icon" name="delete">
								<span class="icon">X</span>'.$admin['Del'].'</button>
								</a></form></td>
                </tr>';
                }
                  ?>
        </tbody></table><div class="dataTables_info" id="example_info">Showing 0 to 0 of 0 entries</div><div class="dataTables_paginate paging_full_numbers" id="example_paginate"><a tabindex="0" class="first button" id="example_first">First</a><a tabindex="0" class="previous button" id="example_previous">%</a><span><a tabindex="0" class="button">1</a><a tabindex="0" class="button pressed">2</a><a tabindex="0" class="button">3</a></span><a tabindex="0" class="next button" id="example_next">(</a><a tabindex="0" class="last button" id="example_last">Last</a></div></div>
        </div>
      </div>
<div id="grid-cont" class="full">
        <div class="box g16"><span><center>All rights reserved. | Powered by: <a style="color: #CE9109;" href="http://aquaflame.org">AquaFlame CMS</a></center></span></div>
      </div>
                                    
    </div><!--END MAIN CONTENT-->
    <?php include('footer.php'); ?>
  </div><!--END WRAPPER-->

  <span id="load">
    <img src="img/load.png"><img src="img/spinner.png" id="spinner">
  </span>

  <!---jQuery Code-->
  <script type='text/javascript'>

    // LOAD FUNCTIONS

    $.fn.loadfns( function() {
      $.fn.inputgrp();
      $('#wysiwyg').cleditor({ height: 326 });
      $('#eula').nanoScroller();

      if ($('#ads').width() < 800) $('#ads').nanoScroller();
    });
    $.fn.inputs();
    $('#sample-form').validate();
    $('.datepicker').glDatePicker({ showAlways: false });
    $('.nav-hz').scrollspy();
    $('#age-inp').spinner({ min: 16, max: 99 });
    $('#decimal').spinner({ step: 0.1101001101010011, numberFormat: "n" });
    $('#card-num').mask('9999-9999-9999-9999');
    $('#exp-inp').mask('99/99', {placeholder:'.'});
  </script>
  <?php 
if (isset($_POST['approve'])) 
        {
            $check_media = mysql_query("SELECT * FROM media WHERE id = '".$_POST['actionid']."'");
            $num_media = mysql_num_rows($check_media);
            if($num_media >= 1)
            {
            $mysql_media = mysql_query("UPDATE media SET visible = 1 WHERE id = '".$_POST['actionid']."'");
            echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-success" style="display: block;">
                  <div class="toast-title">Great !</div>
                  <div class="toast-message">The Media were approved successfully.</div>
                  </div></div>';
            echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
            else
            {
            echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
                  <div class="toast-title">Uh damn !</div>
                  <div class="toast-message">An error occured while approving the Media.</div>
                  </div></div>';
            echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
        }
        if (isset($_POST['unapprove'])) 
        {
            $check_media = mysql_query("SELECT * FROM media WHERE id = '".$_POST['actionid']."'");
            $num_media = mysql_num_rows($check_media);
            if($num_media >= 1)
            {
            $mysql_media = mysql_query("UPDATE media SET visible = 0 WHERE id = '".$_POST['actionid']."'");
            echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-success" style="display: block;">
                  <div class="toast-title">Great !</div>
                  <div class="toast-message">The Media were unapproved successfully.</div>
                  </div></div>';
            echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
            else
            {
            echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
                  <div class="toast-title">Uh damn !</div>
                  <div class="toast-message">An error occured while unapproving the Media.</div>
                  </div></div>';
            echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
        }
        if (isset($_POST['delete'])) 
        {
            $check_media = mysql_query("SELECT * FROM media WHERE id = '".$_POST['actionid']."'");
            $num_media = mysql_num_rows($check_media);
            if($num_media >= 1)
            {
            $mysql_media = mysql_query("DELETE FROM media WHERE id = '".$_POST['actionid']."'");
            $mysql_media2 = mysql_query("DELETE FROM media_comments WHERE id = '".$_POST['actionid']."'");

            $unlink_media = mysql_query("SELECT * FROM media WHERE id = '".$_POST['actionid']."'");
            $unlink = mysql_fetch_assoc($check_media);
            if($unlink['type'] != '1' || $unlink['type'] != '5')
            {
              unlink('../images/wallpapers/'.$mysql_media2['id_url']);
            }
            echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-success" style="display: block;">
                  <div class="toast-title">Great !</div>
                  <div class="toast-message">The Media were deleted successfully.</div>
                  </div></div>';
            echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
            else
            {
            echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
                  <div class="toast-title">Uh damn !</div>
                  <div class="toast-message">An error occured while deleting the Media.</div>
                  </div></div>';
            echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
        }
        if (isset($_POST['send'])) 
        {
          $title = mysql_real_escape_string($_POST['title_form']);
          $description = mysql_real_escape_string($_POST['description_form']);
          //types: 0 videos, 1 wallpapers, 2 screenshots, 3 artwork, 4 comic, 5 DOWNLOAD
          if ($_POST['type'] == '0') //Youtube video sent
          { 
            $url = $_POST['url_form'];
            $exp = "/v\/?=?([0-9A-Za-z-_]{11})/is";
            preg_match_all($exp, $url, $matches);
            $id = $matches[1][0];
          } 
          elseif($_POST['type'] == '5')
          {
            $url = $website['address'] . $website['root'] . 'files/download/';   //absolute route
            $path = '../files/download/';                                   //relative route
            if ($_FILES["file"]["error"] > 0) 
            {
              echo "Error: " . $_FILES["file"]["error"] . ". File couldn't be sent.<br />";
            } 
            elseif (!($_FILES["file"]["size"] < $_POST['MAX_SIZE'])) 
            {
              echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
                    <div class="toast-title">Uh damn !</div>
                    <div class="toast-message">The file must be less than 2 MB.</div>
                    </div></div>';
              echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            } 
            else 
            {
              $file = pathinfo($_FILES["file"]["name"]);
              $ext = '.' . $file['extension'];
              $part = date('dmYHis', time());
              $random = rand(10, 100);
              $fileName = $_POST['type'] . $part . $random . $ext; //An unique media name for file storage
              $url = $url . $fileName;  //The absolute route for links
              $id = $fileName;       //The filename for php refers, unlink(), etc.
              if (move_uploaded_file($_FILES["file"]["tmp_name"], $path . $fileName)) 
              {
                $error = false;
              }
            }
          }
          else //Image sent and upload to host
          {  
            $url = $website['address'] . $website['root'] . 'images/wallpapers/';   //absolute route
            $path = '../images/wallpapers/';                                   //relative route
            if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/bmp") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < $_POST['MAX_SIZE'])) 
            {     //allowed extensions: jpg,jpeg,bmp,png,gif
              if ($_FILES["file"]["error"] > 0) 
              {
                echo "Error: " . $_FILES["file"]["error"] . ". File couldn't be sent.<br />";
              } 
              else 
              {
                $file = pathinfo($_FILES["file"]["name"]);
                $ext = '.' . $file['extension'];
                $part = date('dmYHis', time());
                $random = rand(10, 100);
                $fileName = $_POST['type'] . $part . $random . $ext; //An unique media name for file storage
                $url = $url . $fileName;  //The absolute route for links
                $id = $fileName;       //The filename for php refers, unlink(), etc.

                if (move_uploaded_file($_FILES["file"]["tmp_name"], $path . $fileName)) 
                {
                  $error = false;
                }
              }
            } 
            elseif (!($_FILES["file"]["size"] < $_POST['MAX_SIZE'])) 
            {
              echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
                    <div class="toast-title">Uh damn !</div>
                    <div class="toast-message">The file must be less than 2 MB.</div>
                    </div></div>';
              echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            } 
          }
          if (!$error) 
          {
            mysql_select_db($server_adb);
            $check_query = mysql_query("SELECT account.id,gmlevel from account  inner join account_access on account.id = account_access.id where username = '" . strtoupper($_SESSION['username']) . "'");
            $login = mysql_fetch_assoc($check_query);

            mysql_select_db($server_db);
            $save_media = mysql_query("INSERT INTO media (author, id_url, title, description, link, type) VALUES ('" . $login['id'] . "','" . $id . "','" . $title . "','" . $description . "','" . $url . "','" . $_POST['type'] . "');");
            mysql_close($connection_setup);

            if ($save_media == true && $check_query == true) 
            {
              echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-success" style="display: block;">
                    <div class="toast-title">Great !</div>
                    <div class="toast-message">The Media were uploaded successfully.</div>
                    </div></div>';
              echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            } 
            else 
            {
              echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
                    <div class="toast-title">Uh damn !</div>
                    <div class="toast-message">An error occured while saving the Media.</div>
                    </div></div>';
              echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
          }
        }
        else
        {

        }
  ?>
</body>
</html>