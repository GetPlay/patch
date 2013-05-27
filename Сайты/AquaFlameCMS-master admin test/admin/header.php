<html>
  <head></head>
<body>
<h1><img src="../wow/static/images/logos/wof-logo.png" height="21px" width="260px"/><br />
        <span><?php echo $admin['AP']; ?></span></h1>
        <ul id="menu">
          <li><a href="dashboard.php"><?php echo $admin['dashboard']; ?></a></li>
          <li><a href="viewslideshows.php"><?php echo $admin['Slideshows']; ?></a></li>
          <li><a href="fcategory.php"><?php echo $admin['Forums']; ?></a></li>
          <li><a href="#"><?php echo $admin['LogOut']; ?></a></li>
          </li>
        </ul>
        <ul id="tablist">
          <li><a href="#a"><span><?php echo $admin['Main']; ?></span></a></li>
	        <li><a href="#b"><span><?php echo $admin['Off1']; ?></span></a></li>
	        <li><a href="#c"><span><?php echo $admin['Off2']; ?></span></a></li>
        </ul>


        <div id="tabsPanel">
          <div id="a" class="tab_content">
            <div class='carousel_container'>
              <div class='left_scroll'><img src='images/leftArrow.png' alt="" /></div>
              <div class='carousel_inner'>
              <ul class='carousel_ul'>
                <li><span rel="tooltip" title="<strong style='color:#00B6FF'><?php echo $admin['WriteNews']; ?></strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico1" href='writenews.php'></a></span></li>
				        <li><span rel="tooltip" title="<strong style='color:#00B6FF'><?php echo $admin['ViewEditNews']; ?></strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico3" href='viewnews.php'></a></span></li>
                <li><span rel="tooltip" title="<strong style='color:#00B6FF'><?php echo $admin['ViewWeb']; ?></strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico4" href='viewwebsite.php'></a></span></li>
              </ul>
              </div>
              <div class='right_scroll'><img src='images/rightArrow.png' alt="" /></div>
            </div>
          </div>



				  <div id="b" class="tab_content">
            <div class='carousel_container'>
              <div class='left_scroll'><img src='images/leftArrow.png' alt="" /></div>
              <div class='carousel_inner'>
                <ul class='carousel_ul2'>
                  <!-- To do It'll be visible just to superadmins-->
			         	<li><span rel="tooltip" title="<strong style='color:#00B6FF'><?php echo $admin['ManageMedia']; ?></strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico10" href='mediaall.php'></a></span></li>
				        <li><span rel="tooltip" title="<strong style='color:#00B6FF'><?php echo $admin['UnapprovedMedia']; ?></strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico11" href='mediaun.php'></a></span></li>
                </ul>
              </div>
              <div class='right_scroll'><img src='images/rightArrow.png' alt="" /></div>
            </div>
          </div>



				  <div id="c" class="tab_content">
            <div class='carousel_container'>
              <div class='left_scroll'><img src='images/leftArrow.png' alt="" /></div>
              <div class='carousel_inner'>
                <ul class='carousel_ul3'>
				                  <li><span rel="tooltip" title="<strong style='color:#00B6FF'><?php echo $admin['Off2']; ?></strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico5" href='#'></a></span></li>
                 </ul>
              </div>
              <div class='right_scroll'><img src='images/rightArrow.png' alt="" /></div>
            </div>
          </div>

        <!--Tab End-->  
      </div>
      <img src="images/shadow.png" class="shadow" alt="" />
</body>
</html>