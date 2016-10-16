<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
echo "<link href='css/layout.css' rel='stylesheet' type='text/css'><link href='css/login.css' rel='stylesheet' type='text/css'><link href='css/style.css' rel='stylesheet' type='text/css'>

 <center><br><br><br><br><br><br><br><br><br><center class='warning'>Maaf, untuk masuk <b>Halaman Administrator</b><br>
  <center>anda harus <b>Login</b> dahulu!<br><br>";
 echo "<div> <a href='index.php'><img src='images/kunci.png'  height=176 width=143></a>
             </div>";
  echo "<input type=button class=button value='LOGIN DI SINI' onclick=location.href='index.php'></a></center>";
}
else{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8"/>
	<title>.:: HALAMAN ADMINISTRATOR ::.</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<link rel="shortcut icon" type="image/x-icon" href="images/gg_h.png">
	
	
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
    <script language="javascript" type="text/javascript"
src="../editor/tiny_mce_src.js"></script>
<script type="text/javascript">
tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,preview,zoom,separator,forecolor,backcolor,liststyle",
		theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
		theme_advanced_buttons3_add : "emotions,flash",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		extended_valid_elements : "hr[class|width|size|noshade]",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		apply_source_formatting : true
});

	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
		var enableAutoTypeSelection = true;
		
		var cType;
		tinymcpuk_field = field_name;
		tinymcpuk = win;
		
		switch (type) {
			case "image":
				cType = "Image";
				break;
			case "flash":
				cType = "Flash";
				break;
			case "file":
				cType = "File";
				break;
		}
		
		if (enableAutoTypeSelection && cType) {
			connector += "&Type=" + cType;
		}
		
		window.open(connector, "tinymcpuk", "modal,width=600,height=400");
	}
</script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html"><img src="images/logo.png" width="185" height="80" /></a></h1>
			<h2 class="section_title"></h2>
	  </hgroup>
	</header> <!-- end of header bar -->
	
<section id="secondary_bar">
		<div class="user">
		  <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="?module=home" class="current">Beranda</a><div class="breadcrumb_divider"></div> 
            <a href="../?module=store" class="current">Lihat Web</a><div class="breadcrumb_divider"></div> <a href="logout.php" class="current">Keluar</a></article>
		</div>
</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
	  <h3>MENU UTAMA </h3>
		<ul class="toggle">
			<?php include "menu.php"; ?>
		</ul>
		<h3>KONTEN WEB </h3>
		<ul class="toggle">
			<?php include "menu2.php"; ?>
		</ul>
		<h3>MANAJEMEN ADMIN </h3>
		<ul class="toggle">
			 <?php include "menu3.php"; ?>
		</ul>
		
		<footer>
			<hr />
			<p><strong>&copy; 2011 Depeloved by: Rizal Faizal</strong></p>
			
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column"><!-- end of content manager article -->
      <!-- end of messages article -->
      <!-- end of post new article -->
      <!-- end of stats article -->
<article class="module width_full">
					  <?php include "content.php"; ?>
					
	  </article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>

</html>
<?php
}
?>