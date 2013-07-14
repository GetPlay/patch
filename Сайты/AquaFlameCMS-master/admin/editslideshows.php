<?php
include("../configs.php");
ini_set("default_charset", "iso-8859-1" ); 

	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT account.id,gmlevel from account  inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('
<meta http-equiv="refresh" content="2;url=GTFO.php"/>
		');
	}

  //To show the images pop-up
  $path = "../images/slideshows/";       //The images path
  $dir = opendir($path);   //Open path
  $img_total=0;
  while ($elemento = readdir($dir))   //read content
  {
    if (substr($elemento, strlen($elemento)-11,11)=='.jpg') //if a valid picture then show it
    {
      $img_array[$img_total]=$elemento;    //Save the pictures in array
      $img_total++;
    }
  } 
  //End image pop-up
  
  if (isset($_GET['id'])){
  mysql_select_db($server_db);
  $new = mysql_fetch_assoc(mysql_query("SELECT id,title,description,image FROM slideshows WHERE id = '".$_GET['id']."'"));
  if (!$new['id']){
    $error = true;
  }
  }else{
    $error = true;
  }
  
//Begin Post
  if (isset($_POST['save'])){
    $title = mysql_real_escape_string($_POST['title']);
    $image = mysql_real_escape_string($_POST['image']);
    $link = mysql_real_escape_string($_POST['link']);
    $description = $_POST['description'];
    $description = trim($description);
    if ($_POST['author']){
      $author = $login['id'];
      }
    $emptydescription = strip_tags($description);
    if (empty($emptydescription)){                          //Check if content is empty, title will never be empty
      echo '<font color="red">You have to write something!</font>';
    }else{
      mysql_select_db($server_db);
      $change_new = mysql_query("UPDATE slideshows SET title = '".$title."' , image = '".$image.".jpg', description = '".$description."', link = '".$link."' WHERE id = '".$_POST['id']."'");
      if ($change_new == true){
        echo '<div class="alert-page" align="center"> The article has been updated successfully!</div>';
        echo '<meta http-equiv="refresh" content="3;url=viewslideshows.php"/>';
      }
      else{
        echo '<div class="errors" align="center"><font color="red"> An ERROR has occured while saving the article!</font></div>';
      }
    }  
  }
?>      

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<title><?php echo $website['title']; ?> - <?php echo $admin['AP']; ?> - <?php echo $admin['ViewSlide']; ?></title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
		<link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/tooltip.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
		<script type="text/javascript" src="js/script-carasoul.js"></script>
		<link href="css/tooltip.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/uniform.defaultstyle3.css" type="text/css" media="screen" />
    <script src="js/jquery-1.4.4.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
 $(document).ready(function(){
     $('.ddm').hover(
	   function(){
		 $('.ddl').slideDown();
	   },
	   function(){
		 $('.ddl').slideUp();
	   }
	 );
 });
</script>
    <script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
    <script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);

</script>
    <script type="text/javascript" src="js/script-carasoul.js"></script>
    <script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select, button").uniform();
      });
    </script>
    <link rel="stylesheet" href="css/uniform.defaultstyle2.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/jquery.cleditor.css" />
    <script type="text/javascript" src="js/jquery.cleditor.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor(
			{
				width:        900, // width not including margins, borders or padding
                height:       250, // height not including margins, borders or padding
			}
							 );
      });
//This functions to work the pop-up image select
function pop(action){
  var frm_element = document.getElementById('pop');
  var vis = frm_element.style;
  if (action=='open')
  {
    vis.display = 'block';               //show/hidde the image select pop-up
    frm_element.focus();
  }
  else if(action == 'blur'){
    if(document.activeElement.name != 'pop'){
      vis.display = 'none';
    }
  }
  else
  {
      vis.display = 'none';
  }
}
function changeVal(val){
  var  frm_element = document.getElementById('image'); //change the image input box value
  frm_element.value = val;                            //And the preview image
  var imgL = document.getElementById('imgLoad');
  imgL.src = '../images/slideshows/' + val + '.jpg';
}

function preview(img,event){
  var div = document.getElementById('preview');      //To show preview images
  div = div.style;
  var imgP = document.getElementById('imgP');
  if (event == 'on'){
    div.display = 'block';
    imgP.src= img;
  }
  else{
    div.display = 'none';
  }
  }
</script>
</head>
<body class="bgc">
	<div id="admin">
    <div id="wrap">
      <div id="head">
        <?php include('header.php'); ?>
      </div>
    <!--Content Start-->
    <div id="content">
      <div class="forms">
        <div class="heading">
          <h2><?php echo $admin['ViewSlide']; ?></h2>
        </div>
        <form method="post" action="" class="styleForm">
        <input type="hidden" name="id" value="<?php echo $new['id']; ?>" />
          <p><?php echo $admin['Title']; ?><br />
            <input name="title" type="text" value="<?php echo $new['title']; ?>" class="reg" onblur="if(this.value=='')this.value='<?php echo $new['title']; ?>'" />
          </p> 
          <p><?php echo $admin['URL']; ?><br />
            <input name="link" type="text" value="" class="reg" onfocus="if(this.value=='')this.value=''" onblur="if(this.value=='')this.value=''" />
          </p> 
          <div class="folder">
            <p><?php echo $admin['Image']; ?><br />
            <input id="image" name="image" type="text" value="<?php echo $new['image']; ?>" class="reg" onfocus="pop('open');" /> 
            </p>
            <img src="<?php echo '../news/'.$new['image'].'.jpg'; ?>" id="imgLoad" />
            <div  class="pop-image" id="pop">
              <div class="note">
                <table border=0>
                <?php       
                for ($i=0;$i<$img_total; $i++)      //show images in table
                {
                  $imagen = $img_array[$i];
                  $pathimagen=$path.$imagen;
                  $nombre = substr($imagen,0,strlen($imagen)-11); //get the name for the db
                  echo "<tr>"; // para empezar una nueva linea
                  echo "<td><a href='javascript:;' onclick=changeVal('".$nombre."');pop('close');>
                  <img src='$pathimagen' width='160px' border=0 onmouseover=preview('".$pathimagen."','on'); onmouseout=preview('".$pathiamgen."','out');></a></td>";  //Clik on it and the name appear on the textbox
                  echo "</tr>";
                }
                ?>
                </table>
              </div>
            </div>
            <div  id="preview" style="display:none; float:right; position:absolute;left:450px;top:-50px;">
              <img src="" alt="img" id="imgP" />   
            </div>   
          </div> 
          <h3><?php echo $admin['Desc']; ?></h3>
          <div class="txt">
            <textarea name="description"><?php echo $new['description']; ?></textarea>
          </div>
          <input name="save" type="submit" value="<?php echo $admin['Save']; ?>" />
          <a href="viewnews.php"><input name="reset" type="reset" value="<?php echo $admin['Cancel']; ?>" /></a>
        </form>
      </div>
    </div>
  </div>
  <div class="push"></div>
</div>
<?php include("footer.php"); ?>
</body>
