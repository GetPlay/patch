<?php
require_once("../configs.php");
$page_cat="media";
$type = intval($_GET['type']);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/s7.addthis.com/static/r07/widget49.css" media="all" />
<title>Media - World of Warcraft</title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/wow.ico" type="image/x-icon"/>
<link rel="stylesheet" href="../wow/static/local-common/css/common.css?v39" />
<link title="World of Warcraft - Noticias" href="../wow/es/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="../wow/static/css/wow.css?v23" />
<link rel="stylesheet" href="../wow/static/local-common/css/media-gallery.css?v39" />
<link rel="stylesheet" href="../wow/static/css/media/media.css?v23" />
<link rel="stylesheet" href="../wow/static/local-common/css/cms/comments.css?v39" />
<link rel="stylesheet" href="../wow/static/css/cms.css?v23" />
<script src="../wow/static/local-common/js/third-party/jquery.js?v39"></script>
<script src="../wow/static/local-common/js/core.js?v39"></script>
<script src="../wow/static/local-common/js/tooltip.js?v39"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
</head>
<body class="en-gb logged-in">
<div id="wrapper">
	<?php include("../header.php"); ?>
		<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li>
<a href="../index.php" rel="np">
<?php echo $website['title']; ?>
</a>
</li>
<li>
<a href="../media.php" rel="np">
<?php echo $Media['Media']; ?>
</a>
</li>
<li class="last childless">
<a href="images_index.php?type=<?php echo $type; ?>" rel="np">
<?php
  switch($type){
    case 1: echo $Media['Wallpapers']; break;
    case 2: echo $Media['Screenshots']; break; 
    case 3: echo $Media['Artwork']; break;    
    case 4: echo $Media['Comics']; break;  
  }
?>
</a>
</li>
</ol>
</div>
<div class="content-bot"> <div class="media-content">
<div class="currently-viewing">
<a id="toggle-thumbnail-page" href="images_index.php?type=<?php echo $type; ?>" data-tooltip="Switch to large thumbails view"
class="view-link float-right"></a>
<a id="toggle-film-strip" href="#" data-tooltip="Switch to filmstrip view"
class="view-link active float-right"></a>
</div>
      <?php
        $count = 0;
        $index = '';
        $paths = '';
        mysql_select_db($server_db) or die(mysql_error());
        $images = mysql_query("SELECT * FROM media WHERE visible = '1' AND type ='".$type."'");
        while ($image= mysql_fetch_assoc($images)){
          $index = $index.',"'.$image['id'].'"';
          $paths = $paths.',"'.$image['link'].'"';
          if($count == 0){
            $index1 = $image['id'];
            $path1 =  $image['link'];
            $count = 1;
          } 
        }
        $index = substr($index,1,strlen($index));
        $paths = substr($paths,1,strlen($paths));
      ?>

<script type="text/javascript">
//<![CDATA[
var galleryType = "images";
var dataKey = "screenshots";
var viewType = "film-strip";
var indices = [<?php echo $index; ?>];
var itemPaths = [<?php echo $paths; ?>];
//var discussionSigs = ["a6862cfb175efc54ec1c3e57ee52694b", "749ee3682634875064a9d069c7e91866", "bad2df75abfceafb012bc4c70129017b", "c25670f2c7e041d88d64c25dea08eac5", "c4b2151e98d4de982339b546d5c40bce", "bd64f8e8ffb217a1131f5e245b9e34df", "79cdbbb77369916c0de1a928f9b270dc", "2854346e36a18f1de100143e8344ad53", "f33051bdec5d23c825928278a7551b1b", "7f9702bd0c7c19fcce7f57f82318e715", "1e9d66f16b482fd962e043e9e31e837b", "378c8c3ee0bb576b9248f674452eda98", "e4646ca682df38b81f939801cd7ac6f5", "f3ce908c263e342a00952dcb7ef8ee57", "db557ffd3a1da19270b02562a7dca162", "576f79c5e2d5e55393f281e5d6258e03", "5d70d4f9e88c11b1761db68bb2130acd"];
//]]>
</script>
<div class="film-strip-wrapper">
  <div id="film-strip">
    <div class="viewport-scrollbar">
      <div class="track">
        <div id="scroll-thumb" class="thumb">
          <div class="thumb-bot">
          </div>
        </div>
      </div>
    </div>
    <div class="viewport-content">
      <div id="film-strip-thumbnails">
      <?php 
        mysql_select_db($server_db) or die(mysql_error());
        $images = mysql_query("SELECT * FROM media WHERE visible = '1' AND type ='".$type."'");
        while ($thumb = mysql_fetch_assoc($images)){
      ?>
      <a id="<?php echo $thumb['id']; ?>" class="film-strip-thumb-wrapper"  
        style="background-image:url(../images/wallpapers/<?php echo $thumb['id_url']; ?>);background-size: 120px 75px;"
        href="#/<?php echo $thumb['id']; ?>" onclick="GalleryViewer.loadItem('<?php echo $thumb['id']; ?>');">
        <span class="film-strip-thumb-frame"></span>
      </a>      

      <?php } ?>
      </div>
    </div>
</div>
<div class="ajax-frame">
<table>
<tr>
<td id="film-strip-ajax-target" onclick="GalleryViewer.getNextItem();" style="cursor:pointer">
<img id="current-image" src="<?php if(intval($_GET['id']) == $index1 || !isset($_GET['id'])){ echo $path1; } ?>" alt="" width="704" height="440" style="display:none;" />
</td>
</tr>
</table>
<a href="javascript:;" onclick="GalleryViewer.getNextItem();" class="paging-arrow next"></a>
<a href="javascript:;" onclick="GalleryViewer.getPreviousItem();" class="paging-arrow previous"></a>
</div>
</div>
<div id="media-meta-data">
<div class="meta-data">
<dl class="meta-details">
<dt><?php echo $Media['dataadd']; ?></dt>
<dd></dd><?php echo $Media['Author']; ?></dt>
<dd></dd>
</dl>
<dl class="meta-details">
<dt class="dt-downloads">
<a class="format" href="#" onclick="window.open(this.href);return false;">
<?php echo $Media['LoadOr']; ?>
</a>
</dt>
</dl> 
            <?php
					$videos_id = intval($_GET['id']);
					if($videos_id > 0) {
            $error = 0;
       			$videos_query = mysql_query("SELECT * FROM media WHERE id = '".$videos_id."'")or $error=1;
					  $videos = mysql_fetch_assoc($videos_query) or $error = 1;  
          }
          else {$error = 1;}
				?>  
 
					<?php
						if($error == 0){
						  $posted = 0;
							if(isset($_POST['vali'])){
							   mysql_select_db($server_adb)or die(mysql_error());
							   $get_accountinfo = mysql_query("SELECT * FROM account WHERE username = '".strtoupper($_SESSION['username'])."'");
							   $accountinfo = mysql_fetch_assoc($get_accountinfo);
							   $author = $accountinfo['id'];
							   $comment = stripslashes($_POST['detail']);
							   
									/* Replace some HTML tags */
									$comment = strip_tags($comment);

									/* End of Replacing */
									$comment = addslashes($comment);
									$comment = nl2br($comment);
								 mysql_select_db($server_db) or die(mysql_error());
								 $insert = mysql_query("INSERT INTO media_comments (mediaid,comment,accountid) VALUES ('".$_POST['videoId']."','".$comment."','".$author."')")or print("Could not post the comment!");

								 $update = mysql_query("UPDATE media SET comments = comments + 1 WHERE id = '".$_POST['videoId']."'");
								 $update = mysql_query("UPDATE media SET date = '".$date."' WHERE id = '".$_POST['videoId']."'");
								 $posted = 1;

									echo '<center><br /><br />Comment Posted<br />';
									echo '
										<style type="text/css">
										.loader {
											width:24px;
											height:24px;
											background: url("'.$website['root'].'wow/static/images/loaders/canvas-loader.gif") no-repeat;
											}
										</style>';
										echo '<div class="loader"></div><br /></center>';
										echo '<meta http-equiv="refresh" content="1;url=images_visor.php?type='.$type.'&id='.$_POST['videoId'].'#/'.$_POST['videoId'].'"/>';
										$show_comment=false;
							}
              else{				
							 $posterInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.users WHERE id = '".$videos['author']."'"));					
				  ?>  
          </div>
          <table width="940">
		  <tr><td width="40" height="40"></td><td width="860" valign="bottom"><span style="font-size:20px; font-family:Verdana,Geneva,sans-serif;"><?php echo $comments['comments']; ?>(<?php echo $videos['comments']; ?>)</span></td><td width="40"></td></tr>
          </table>
          <?php
					   $show_comment=true;
						}
					}
		      ?>
        </div>
								
      <script type="text/javascript">
			//<![CDATA[
			$(function(){
					Cms.Comments.commentInit();
			});
			//]]>
			</script>
      <!-- [if IE 6] >
			<script type="text/javascript">
			//<![CDATA[
			$(function() {
				Cms.Comments.commentInitIe();
			});
			//]]>
			</script>
			< [endif] -->
      
      <?php if($show_comment == true){ ?>
			  <span id="comments"></span>
				<div id="page-comments">
				  <div class="page-comment-interior" id="comments">
				  <div class="comments-container">
						<script type="text/javascript">
						//<![CDATA[
							var textAreaFocused = false;
						//]]>
						</script>
          <?php
						if(isset($_SESSION['username'])){
							if($posted == 1){
							}else{
									$user_query = mysql_query("SELECT * FROM users WHERE id = '".mysql_real_escape_string($account_information['id'])."'");
									$user = mysql_fetch_assoc($user_query);
					?>
						<form action="" method="post" onSubmit="return Cms.Comments.validateComment(this);" id="comment-form">
							<fieldset>
								<input type="hidden" name="videoId" value="<?php echo intval($_GET['id']); ?>">
								<input type="hidden" name="ref" value="" />
								<input type="hidden" name="xstoken" value="" />
								<input type="hidden" name="vali" value="" />
							</fieldset>
							<div class="new-post">
								<div class="comment">
									<div class="portrait-b ajax-update">
										<div class="avatar-interior">
											<a href="#"><img height="64" width="64" src="../images/avatars/2d/<?php echo $user['avatar']; ?>" alt="" /></a>
										</div>
									</div>
									<div class="comment-interior">
										<div class="character-info user ajax-update">
										<!--commentThrottle[]-->
											<div class="user-name">
												<a href="#" class="context-link" rel="np"><?php echo ucfirst($user['firstName']); ?></a>
											</div>
										</div>
										<div class="content">
											<div class="comment-ta">
												<textarea id="comment-ta" cols="78" rows="3" name="detail" onFocus="textAreaFocused = true;" onBlur="textAreaFocused = false;"></textarea>
											</div>
											<div class="action">
												<div class="submit">
													<button class="ui-button button1 comment-submit" type="submit">
													<span><span><?php echo $post['post']; ?></span></span>
													</button>
												</div>
												<span class="clear"><!-- --></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					<?php
						  }
						}else{
							echo'
							 <table class="dynamic-center"><tr><td>
							 <a class="ui-button button1 " href="?login" onclick="return Login.open(\'../loginframe.php\')"><span><span>Добавить комментарий</span></span></a>
							 </td></tr></table>';
						}
						$get_comments = mysql_query("SELECT * FROM media_comments WHERE mediaid = '".$videos['id']."' ORDER BY DATE DESC");
						if(mysql_num_rows($get_comments) > 0){
							while($comment = mysql_fetch_array($get_comments)){
								mysql_select_db($server_adb)or die(mysql_error());
								$accountInfo_query = mysql_query("SELECT * FROM account WHERE id = '".$comment['accountId']."'");
								$accountInfo = mysql_fetch_assoc($accountInfo_query);
											
								mysql_select_db($server_db)or die(mysql_error());
								$userInfo_query = mysql_query("SELECT * FROM users WHERE id = '".$accountInfo['id']."'");
								$userInfo = mysql_fetch_assoc($userInfo_query);
					?>
											<div class="comment" id="">
												<div class="avatar portrait-b">
												<a href="#">
												<img height="64" src="../images/avatars/2d/<?php echo $userInfo['avatar']; ?>" alt="" />
												</a>
												</div>

												<div class="comment-interior">
												  <div class="character-info user">
													<div class="user-name">
													  <a href="#" class="context-link" rel="np">
														<?php echo ucfirst($user['firstName']); ?>
													  </a>
													</div>
													
													<span class="time"><a href="#"><?php echo date('d-m-Y H:i:s', strtotime($comment['date'])); ?></a></span>
												  </div>
												  <div class="content"><?php echo html_entity_decode($comment['comment']); ?></div>
												  <div class="comment-actions"><a class="reply-link" href="#" onClick=""><?php echo $reply['reply']; ?></a></div>
												</div>
											</div>
											<?php
											}
										}
							?>
							<div class="page-nav-container">
												<div class="page-nav-int"></div>
											</div>
										</div>
								<?php } ?>
							</div>
						</div>

						<script type="text/javascript">
						//<![CDATA[
								var addthis_config = {
									 username: "wow"
								}
						//]]>
						</script>

</div>
<div style="display:none" id="media-preload-container"></div>
</div>
</div>
</div>
<script type="text/javascript" src="../wow/static/local-common/js/dropdown.js?v39"></script>
<script type="text/javascript" src="../wow/static/local-common/js/media/gallery-viewer.js?v39"></script>
<script type="text/javascript" src="../wow/static/local-common/js/media/data.js"></script>
<script type="text/javascript" src="../wow/static/local-common/js/third-party/jquery.mousewheel.min.js?v39"></script>
<!--[if lt IE 8]> <script type="text/javascript" src="../wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v39"></script>
<script type="text/javascript">
//<![CDATA[
$('.png-fix').pngFix(); //]]>
</script>
<![endif]-->
	<?php include("../footer.php"); ?>
</div>
</body>
</html>