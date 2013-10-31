<?php
include("../configs.php"); 

mysql_select_db($server_adb);
$check_query = mysql_query("SELECT account.id,gmlevel from account  inner join account_access on account.id = account_access.id where username = '" . strtoupper($_SESSION['username']) . "'") or die(mysql_error());
$login = mysql_fetch_assoc($check_query);
if ($login['gmlevel'] < 3) {
    die('
<meta http-equiv="refresh" content="0;url=wrong.php"/>
		');
}
//To show the images pop-up
$path = "../news/";       //The images path
$dir = opendir($path);   //Open path
$img_total = 0;
while ($elemento = readdir($dir)) {   //read content
    if (substr($elemento, strlen($elemento) - 11, 11) == '_header.jpg') { //if a valid picture then show it
        $img_array[$img_total] = $elemento;    //Save the pictures in array
        $img_total++;
    }
}


    if (isset($_POST['save'])) {
    $title = mysql_real_escape_string($_POST['title']);
    $image = mysql_real_escape_string($_POST['image']);
    $contentlnk = mysql_real_escape_string($_POST['contentlnk']);
    $content1 = $_POST['content1'];
    $content1 = trim($content1);
    $date = date("Y-m-d H:i:s", time());

    $emptyContent1 = strip_tags($content1);
    if (empty($emptyContent1)) {                          //Check if content is empty, title will never be empty
        echo '<div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
<div class="toast-title">Uh damn !</div>
<div class="toast-message">You have to write something!</div>
</div></div>';
    } else {
        mysql_select_db($server_db);
        $save_new = mysql_query("INSERT INTO news (author, date, content1, title, contentlnk, image) VALUES ('" . $login['id'] . "','" . $date . "','" . addslashes($content1) . "','" . $title . "','" . $contentlnk . "','" . $image . "');") or die(mysql_error());
        if ($save_new == true) {
            echo '<div id="toast-container" class="toast-top-full"><div class="toast toast-success" style="display: block;">
<div class="toast-title">Great !</div>
<div class="toast-message">The news were published successfully.</div>
     <meta http-equiv="refresh" content="1;url=dashboard.php"/>
</div></div>';
        
        } else {
            echo '<div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
<div class="toast-title">Uh damn !</div>
<div class="toast-message">An error has occured while saving the news in the database!</div>
</div></div>';
        }
    }
}


//End image pop-up
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $website['title']; ?> - <?php echo $admin['AP']; ?> - <?php echo $admin['WriteNews']; ?></title>
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
            $(document).ready(function() {
                $("#input").cleditor(
                        {
                            width: 900, // width not including margins, borders or padding
                            height: 250, // height not including margins, borders or padding
                        }
                );
            });
            //This functions to work the pop-up image select
            function pop(action) {
                var frm_element = document.getElementById('pop');
                var vis = frm_element.style;
                if (action == 'open')
                {
                    vis.display = 'block';               //show/hidde the image select pop-up
                    frm_element.focus();
                }
                else if (action == 'blur') {
                    if (document.activeElement.name != 'pop') {
                        vis.display = 'true';
                    }
                }
                else
                {
                    vis.display = 'none';
                }
            }
            function changeVal(val) {
                var frm_element = document.getElementById('image'); //change the image input box value
                frm_element.value = val;                            //And the preview image
                var imgL = document.getElementById('imgLoad');
                imgL.style.display = '';
                imgL.src = '../news/' + val + '.jpg';
            }

            function preview(img, event) {
                var div = document.getElementById('preview');      //To show preview image
                div = div.style;
                var imgP = document.getElementById('imgP');
                if (event == 'on') {
                    div.display = 'block';
                    imgP.src = img;
                }
                else {
                    div.display = 'none';
                }
            }          

        </script>
</head>
<body>
  <div id="wrapper">
    <?php include('header.php'); ?>
    
    <div id="content" class="inputs-page"><!--BEGIN MAIN CONTENT-->
     <?php
     
     if (isset($_POST['edit'])) 
     {
          mysql_select_db($server_db) or die(mysql_error());
                            $editnews = mysql_query("SELECT * FROM news WHERE id = '".$_POST['actionid']."'");
                            $edit = mysql_fetch_assoc($editnews);
      ?>

      <!--WYSIWYG EDITOR-->
<form method="post" action="">
  <input type="hidden" name="editid" value="<?php echo $_POST['actionid']; ?>">
      <div id="editor-box" class="box coll g8">
        <h2 class="box-ttl"><?php echo $admin['9']; ?></h2>
        <div class="box-body no-pad">
          <textarea id="wysiwyg" name="content1" class="no-bdrad no-mg full">
            <span style=""><?php echo $edit['content1'];?></span><br><br>
          </textarea>
        </div>
      </div>
    <div id="inputs" class="box g8">
        <h2 class="box-ttl"><?php echo $admin['title&image']; ?></h2>
        <div class="box-body form">
          <span class="label input g4"><?php echo $admin['Title']; ?></span>
          <input name="title" type="text" class="g12" value="<?php echo $edit['title'];?>" class="reg" onfocus="if (this.value == 'Enter Title') this.value = ''" onblur="if (this.value == '') this.value = '<?php echo $edit['title'];?>'" />
          <span class="label input g4">URL</span>
            <input name="contentlnk" id="contentlnk" type="text" value="<?php echo $edit['contentlnk'];?>" class="g12" onfocus="if(this.value=='')this.value=''" onblur="if(this.value=='')this.value='<?php echo $edit['contentlnk'];?>'" />      
          			<span class="label input g4">Summup</span>
          <textarea name="summup" id="summup" class="g12"><?php echo $edit['summup'];?>
          </textarea>
        <span class="label input g4"><?php echo $admin['Image']; ?></span>
        <input id="image" name="image" type="text" value="<?php echo $edit['image'];?>" class="reg" onfocus="pop('open');" />
        <br>
    <span class="label input g4"></span>
    <img class ="g4 box" src="<?php echo '../news/'.$edit['image'].'.jpg'; ?>" id="imgLoad" style="display:true; margin-left: -95px;"/>


    </div>
    <div class="folder">
                                <div  class="pop-image" id="pop" name="pop" onblur="pop('blur');" tabindex="1">

                                        <table border="0">
                                            <?php
                                            for ($i = 0; $i < $img_total; $i++) { //Shows images in table
                                                $imagen = $img_array[$i];
                                                $pathimagen = $path . $imagen;
                                                $nombre = substr($imagen, 0, strlen($imagen) - 11); //Gets the name from the database
                                                echo "<tr>";
                                                echo "<td><a href='javascript:;' name='pop' onclick=changeVal('" . $nombre . "');pop('close');>
                        <img src='$pathimagen' width='160px' border=0 onmouseover=preview('" . $pathimagen . "','on'); onmouseout=preview('" . $pathimagen . "','out');>
                        </a></td>"; //Click on it and the name appear on the text-box
                                                echo "</tr>"; 
                                            }
                                            ?>
                                        </table>
                                    
                                    </div>
      </div>
    <div class="box-body form">
      <span class="label g4"><?php echo $admin['setTime']; ?></span>
          <div class="g12"><input type="checkbox" class="chbox" name="date" checked></div> 
      <span class="label g4"><?php echo $admin['setMeAuthor']; ?></span>
          <div class="g12"><input type="checkbox" class="chbox" name="author"></div> 
          </p>
      <button name="editnews" class="btn-m green has-icon">
    <span class="icon">J</span><?php echo $admin['Save']; ?></button>
  </div>
    </form>
  </div>
  <?php

     }
else
{
     ?>
      <div class="box g16">
        <h2 class="box-ttl"><?php echo $admin['lastNews']; ?></h2>
        <div class="box-body no-pad datatable-cont">
          <div id="example_wrapper" class="dataTables_wrapper" role="grid"><div id="example_length" class="dataTables_length">Show <div class="drop select"><select size="1" name="example_length" aria-controls="example" class="transformed" style="display: none;"><option value="5" selected="selected">5</option><option value="10">10</option><option value="25">25</option></select><ul><li class="sel">5</li><li class="">10</li><li>25</li></ul><span class="opt-sel" data-default-val="5">5</span><span class="arrow">&amp;</span></div> entries</div><div class="dataTables_filter" id="example_filter"><label>Search: <input type="text" aria-controls="example"></label></div><table class="display table dataTable" id="example" aria-describedby="example_info">
            <thead>
              <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 0px;"><font color="green"><?php echo $admin['Title']; ?></font></th>
              <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['author']; ?></font></th>
              <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['Desc']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['comments']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['Edit']; ?></font></th>
              <th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 0px;"><font color="green"><?php echo $admin['Del']; ?></font></th>
              </tr>
            </thead>
            
          <tbody role="alert" aria-live="polite" aria-relevant="all">
		  <?php
                            mysql_select_db($server_db) or die(mysql_error());
                            $news = mysql_query("SELECT id,author,content1,title,comments FROM news ORDER BY date");
                            while ($fcheck2 = mysql_fetch_assoc($news)) {
                            $author = mysql_fetch_assoc(mysql_query("SELECT username FROM $server_adb.account WHERE id = '" . $fcheck2['author'] . "'"));
                            echo'
								<tr class="gradeX odd">
								<td class=" sorting_1">' . substr(strip_tags($fcheck2['title']), 0, 36) . '...</td>
								<td class=" ">' . $author['username'] . '</td>
								<td class=" ">' . substr(strip_tags($fcheck2['content1']), 0, 36) . '...</td>
								<td class="center "> ' . $fcheck2['comments'] . '</td>
								<td class="center "><form method="post"><input type="hidden" name="actionid" value="'. $fcheck2['id'] .'">
								<button class="btn-m has-icon" name="edit">
								<span class="icon">U</span>'.$admin['Edit'].'</button></td>
                <td class="center ">
								<button class="btn-m red has-icon" name="delete">
								<span class="icon2">X</span>'.$admin['Del'].'</button></form></td>
								</tr>';
								}
                  ?>
				</tbody></table><div class="dataTables_paginate paging_full_numbers" id="example_paginate"><a tabindex="0" class="first button" id="example_first">First</a><a tabindex="0" class="previous button" id="example_previous">%</a><span><a tabindex="0" class="button">1</a><a tabindex="0" class="button pressed">2</a><a tabindex="0" class="button">3</a></span><a tabindex="0" class="next button" id="example_next">(</a><a tabindex="0" class="last button" id="example_last">Last</a></div></div>
        </div></div>
		<div id="grid-cont" class="full"> 
		</div>
      <!--WYSIWYG EDITOR-->
<form method="post" action="">
      <div id="editor-box" class="box coll g8">
        <h2 class="box-ttl"><?php echo $admin['9']; ?></h2>
        <div class="box-body no-pad">
          <textarea id="wysiwyg" name="content1" class="no-bdrad no-mg full">
          </textarea>
        </div>
      </div>
	  <div id="inputs" class="box g8">
        <h2 class="box-ttl"><?php echo $admin['title&image']; ?></h2>
        <div class="box-body form">
          <span class="label input g4"><?php echo $admin['Title']; ?></span>
          <input name="title" type="text" class="g12" value="" class="reg" onfocus="if (this.value == '') this.value = ''" onblur="if (this.value == '') this.value = ''" />
          <span class="label input g4">URL</span>
          <input name="contentlnk" id="contentlnk" type="text" value="" class="g12" onfocus="if(this.value=='')this.value=''" onblur="if(this.value=='')this.value=''" />
          <span class="label input g4 ttip" data-ttip-opt="dark left" data-ttip="Summup is a small introduction to the topic of the post. It appears on the index page.">Summup</span>
          <textarea name="summup" id="summup" class="g12">
          </textarea>
          <span class="label input g4"><?php echo $admin['Image']; ?></span>
        <input id="image" name="image" type="text" value="" class="reg" onfocus="pop('open');" />
        <br>
		<span class="label input g4"></span> 
		<img class ="g4 box" src="" id="imgLoad" style="display:none; margin-left: -95px;"/>

    </div>
    <div class="folder">
                                <div  class="pop-image" id="pop" name="pop" onblur="pop('blur');" tabindex="1">

                                        <table border="0">
                                            <?php
                                            for ($i = 0; $i < $img_total; $i++) { //Shows images in table
                                                $imagen = $img_array[$i];
                                                $pathimagen = $path . $imagen;
                                                $nombre = substr($imagen, 0, strlen($imagen) - 11); //Gets the name from the database
                                                echo "<tr>";
                                                echo "<td><a href='javascript:;' name='pop' onclick=changeVal('" . $nombre . "');pop('close');>
                        <img src='$pathimagen' width='160px' border=0 onmouseover=preview('" . $pathimagen . "','on'); onmouseout=preview('" . $pathimagen . "','out');>
                        </a></td>"; //Click on it and the name appear on the text-box
                                                echo "</tr>"; 
                                            }
                                            ?>
                                        </table>
                                    
                                    </div>
      </div>
    <div class="box-body form">
      <button name="save" class="btn-m green has-icon">
    <span class="icon">J</span><?php echo $admin['Write']; ?></button>
  </div>
    </form>
	</div>
  <?php
    }
?>
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
   <script language="JavaScript">
    function P91Fadeout(id, geschwindigkeit) {
  var fps = Math.round(geschwindigkeit / 100); 
  var tmp = 0;
    for(i = 100; i >= 0; i--) {
        setTimeout("P91Fadeout_fade('" + id + "'," + i + ")", (tmp * fps));
        tmp++;
    }
}
function P91Fadeout_fade(id, pas) {
  var heurix = document.getElementById(id).style;
  if(pas > 0) {
    heurix.opacity = (pas / 100);
    heurix.MozOpacity = (pas / 100);
    heurix.KhtmlOpacity = (pas / 100);
    heurix.filter = "alpha(opacity=" + pas + ")"; 
  } else {
    heurix.display = "none";
  }
}
window.setTimeout("P91Fadeout('toast-container', 2000)", 5000);
</script>
<?php
  if (isset($_POST['delete']))
  {
  $check_news = mysql_query("SELECT * FROM news WHERE id = '".$_POST['actionid']."'");
  $num_news = mysql_num_rows($check_news);
  if($num_news >= 1)
  {
  $mysql_news = mysql_query("DELETE FROM news WHERE id = '".$_POST['actionid']."'");
  $mysql_news2 = mysql_query("DELETE FROM news_comments WHERE id = '".$_POST['actionid']."'");
  echo' <div id="toast-container" class="toast-top-full">
    <div class="toast toast-success" style="display: block;">
      <div class="toast-title">Great !</div>
      <div class="toast-message">The News were deleted successfully.</div>
    </div>
  </div>';
  echo '<meta http-equiv="refresh" content="1;url=news.php"/>';
  }
  else
  {
  echo' <div id="toast-container" class="toast-top-full">
    <div class="toast toast-error" style="display: block;">
      <div class="toast-title">Uh damn !</div>
      <div class="toast-message">An error occured while deleting the News.</div>
    </div>
  </div>';
  echo '<meta http-equiv="refresh" content="1;url=news.php"/>';
  }
  }

  ?>
  <?php
  if (isset($_POST['editnews'])){
  $title = mysql_real_escape_string($_POST['title']);
  $image = mysql_real_escape_string($_POST['image']);
  $contentlnk = mysql_real_escape_string($_POST['contentlnk']);
  $content1 = $_POST['content1'];
  $content1 = trim($content1);
  $summup = $_POST['summup'];
  $summup = strip_tags($summup);
  $summup = trim($summup);
  if ($_POST['author']){
  $author = $login['id'];
  }else{
  $author = $edit['author'];
  }
  if ($_POST['date']){
  $date = date ("Y-m-d H:i:s", time());
  }else{
  $date = $edit['date'];
  }
  $emptyContent1 = strip_tags($content1);
  if (empty($emptyContent1)){                          //Check if content is empty, title will never be empty
  echo' <div id="toast-container" class="toast-top-full">
    <div class="toast toast-error" style="display: block;">
      <div class="toast-title">Uh damn !</div>
      <div class="toast-message">You have to write something.</div>
    </div>
  </div>';
  }else{
  mysql_select_db($server_db);
  $change_new = mysql_query("UPDATE news SET title = '".$title."' , author = '".$author."' , contentlnk = '".$contentlnk."' , image = '".$image."', content1 = '".addslashes($content1)."', summup = '".$summup."', date = '".$date."' WHERE id = '".$_POST['editid']."'");
  if ($change_new == true){
  echo' <div id="toast-container" class="toast-top-full">
    <div class="toast toast-success" style="display: block;">
      <div class="toast-title">Great !</div>
      <div class="toast-message">The News were updated successfully.</div>
    </div>
  </div>';
  echo '<meta http-equiv="refresh" content="1;url=news.php"/>';
  }
  else{
  echo' <div id="toast-container" class="toast-top-full">
    <div class="toast toast-error" style="display: block;">
      <div class="toast-title">Uh damn !</div>
      <div class="toast-message">An Error occured while saving the News Post in the Database.</div>
    </div>
  </div>';
  echo '<meta http-equiv="refresh" content="1;url=news.php"/>';
  }
  }
  }
  ?>
</body>
</html>