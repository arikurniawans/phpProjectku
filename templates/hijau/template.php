  <?php 
  error_reporting(0);
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  
  <HEAD>
  <title><?php include "dina_titel.php"; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index, follow">
  <meta name="description" content="<?php include "dina_meta1.php"; ?>">
  <meta name="keywords" content="<?php include "dina_meta2.php"; ?>">
  <meta http-equiv="Copyright" content="Rizal Faizal" "rizal_fzl@yahoo.com">
  <meta name="author" content="Rizal Faizal" "http://griyagaya.co.cc">
  <meta http-equiv="imagetoolbar" content="no">
  <meta name="language" content="Betawi-Indonesia">
  <meta name="revisit-after" content="7">
  <meta name="webcrawlers" content="all">
  <meta name="rating" content="general">
  <meta name="spiders" content="all">

  <!--// SHORTCUT //-->
  <link rel="shortcut icon" href="gg_i.png" />

  <!--// JAVASCRIPT//-->
  <script src="<?php echo "$f[folder]/js/clearbox.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/config/jquery.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/jquery.min.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/cufon-yui.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/sansation_700.font.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/cufon.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/newsticker.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/jquery2.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/showcase.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/jquery.min14.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/ddaccordion.js" ?>" type="text/javascript"></script>
  <script type="text/javascript">
    ddaccordion.init({
	headerclass: "submenuheader", 
	contentclass: "submenu", 
	revealtype: "click", 
	mouseoverdelay: 200, 
	collapseprev: true, 
	defaultexpanded: [], 
	onemustopen: false, 
	animatedefault: false, 
	persiststate: true, 
	toggleclass: ["", ""], 
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", 
	"<img src='images/minus.gif' class='statusicon' />"], 
	animatespeed: "slow", 
	oninit:function(headers, expandedindices){ },
	onopenclose:function(header, index, state, isuseractivated){ }
    })
    </script>
	
	<script src="<?php echo "$f[folder]/js/easy.js" ?>" type="text/javascript"></script>
    <script type="text/javascript">
	$(document).ready(function(){		
	$.easy.tooltip();	
    });</script>

	
  <!--// CSS//-->
  <link rel="stylesheet" href="<?php echo "$f[folder]/css/nivo-slider.css" ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo "$f[folder]/css/menu.css" ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo "$f[folder]/css/produk.css" ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo "$f[folder]/css/default.advanced.css" ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo "$f[folder]/style.css" ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo "$f[folder]/css/style.css" ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo "$f[folder]/css/ticker.css" ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo "$f[folder]/css2/prettyPhoto.css" ?>" type="text/css" />

  <style type="text/css">
  .style3 {
  color: #66CC00;
  font-weight: bold;}
  </style>
   
  </HEAD>
  <body>
  
  <a name="top"></a>
  
  <div id="wrapper_sec">
  <div id="head">
  
  <!--========= LOGO ========================-->
  <div class="logo">
  <?php
  $logo=mysql_query("SELECT * FROM logo ORDER BY id_logo DESC LIMIT 1");
  while($b=mysql_fetch_array($logo)){
  echo "<a><img height=96 src='logo/$b[gambar]'/></a>";}
  ?>
  </div>
  <!--========= AKHIR LOGO ========================-->
  
  <!--========= ALMANAK ========================-->
  <div class="rightnavi">
  <p class="bold right"><a id="various1" href="#inline1"></a></p>
  <div class="clear">
  <ul><b><script src="<?php echo "$f[folder]/js/almanak.js" ?>" type="text/javascript"></script> 
  <span class="style3">&nbsp;&nbsp;I&nbsp;&nbsp;</span>
  <script src="<?php echo "$f[folder]/js/selamat.js" ?>" type="text/javascript"></script>
  </b></ul></div>
  </div><div class="clear"></div>
  <!--========= AKHIR ALMANAK ========================-->
   
  <!--========= MENU UTAMA ========================-->
  <div class="navigation">
  <ul id="nav" class="dropdown dropdown-linear dropdown-columnar">
  <?php               
  $main=mysql_query("SELECT * FROM mainmenu WHERE aktif='Y'");
  while($r=mysql_fetch_array($main)){
  echo "<li><a href='$r[link]'>$r[nama_menu]</a>
  <ul>";
  $sub=mysql_query("SELECT * FROM submenu, mainmenu  
  WHERE submenu.id_main=mainmenu.id_main AND submenu.id_main=$r[id_main]");
  while($w=mysql_fetch_array($sub)){
  echo " <li class='clear'><a href='$w[link_sub]'>$w[nama_sub]</a></li>";}
  echo "</ul></li>";}
  ?>
  </ul>
  </div></div>
  <div class="clear"></div>
  <!--========= AKHIR MENU UTAMA ========================-->
  
   <!--========= CRUMB & SEARCH ========================-->
  <div id="crumb">
  <ul class="left"><li><p>anda berada di:</p></li></ul>
  <ul class="left2"><?php include "breadcrumb.php";?></ul>

  <ul class="search right"><form method="POST" action="hasil-pencarian.html">
  <li><input name="kata" type="text" value="cari produk"  class="bar" /></li>
  <li><input type="submit" class="go" value="" /></li></form></ul>
  </div><div class="clear"></div>
  <!--========= AKHIR CRUMB & SEARCH ========================-->
 
  <!--========= HEADER ========================-->
  
   <?php
  $sekilas=mysql_query("SELECT * FROM sekilasinfo
  WHERE aktif='Y' ORDER BY id_sekilas DESC LIMIT 1");
  while($s=mysql_fetch_array($sekilas)){
  echo "<div class='book-table'>
  <p><span class='isiberita'>$s[info]</span> </p></div>";}?>
 
  
  <div id="banner">
  <div id="slider4" class="nivoSlider">                   
  <?php
  $header=mysql_query("SELECT * FROM header ORDER BY id_header DESC LIMIT 5");
  while($b=mysql_fetch_array($header)){
  echo "<a><img width=940 src='header/$b[gambar]'/></a>";}
  ?>
  </div>
  <script src="<?php echo "$f[folder]/js/jquery.nivo.slider.pack.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/nivo.js" ?>" type="text/javascript"></script>
  <img src=<?php echo "$f[folder]/images/shadow.jpg" ?> width="940" height="26"/>
  </div><div class="clear"></div>
  <!--========= AKHIR HEADER ========================-->	
  
  
  <!--========= ISI HALAMAN ========================-->		
  <div id="content_sec">
  <div class="col1">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr><td><span class="center_content2"><?php include "isi.php";?></td></tr></table>
  <div class="clear"></div></div>
  <!--========= AKHIR ISI HALAMAN ========================-->	
  
  
  
  
  
  <!--========= BAGIAN SIDEBAR ========================-->
  <div class="col2">
  
  

  <!--========= Keranjang Belanja ========================-->
  <div class="mycart">
  <div class="small_heading">
  <h5>Keranjang Belanja</h5>
  </div><table width="81%" border="0" cellspacing="0" cellpadding="0">
  <tr><td width="27%"><?php require_once "item.php";?></td>
  <td width="73%"><img src=<?php echo "$f[folder]/images/beli.png" ?> width="50" height="45" /></td>
  </tr></table></div>
  <!--========= Akhir Keranjang Belanja ========================-->
  
  <!--========= Kategori Produk ========================-->
  <div class="myaccount">
  <div class="small_heading">
  <h5>Kategori Produk</h5></div>
  <ul>
  <?php
  $kategori=mysql_query("select nama_kategori, kategori.id_kategori, kategori_seo,  
  count(produk.id_produk) as jml from kategori left join produk 
  on produk.id_kategori=kategori.id_kategori group by nama_kategori");
  $no=1;
  while($k=mysql_fetch_array($kategori)){
  if(($no % 2)==0){
  echo "<li><a href='kategori-$k[id_kategori]-$k[kategori_seo].html'> $k[nama_kategori] 
  <span class='jum'>&nbsp;($k[jml])</a></li>";}
  else{
  echo "<li><a href='kategori-$k[id_kategori]-$k[kategori_seo].html'> $k[nama_kategori] 
  <span class='jum'>&nbsp;($k[jml])</a></li>";}
  $no++;}
  ?>
  </ul>
  </ul>
  </div>
  <!--========= Akhir Kategori Produk ========================-->		
	
	
  <!--========= Cek Pengiriman Barang ========================-->		
  <div class="poll3">
  <div class="small_heading">
  <h5>Cek Pengiriman Barang </h5></div>
  <div align="center">
  <img src=<?php echo "$f[folder]/images/jne.jpg" ?> width="129" height="63" />
  <form action="http://jne.co.id/index.php?mib=tracking&lang=IN" method="POST">
  <input type="text" name="awbnum" id="awbnum" style='font-size: 12px;' value="masukan kode"  size='23'/>
  <input style='width: 40px; height: 27px;' type="submit" value="CEK"  class= "button" name="submittracking" id="trksubmit"/>
  </form>
  </div></div>
  <!--========= Cek Pengiriman Barang  ========================-->		
	
  <!--========= Layanan Pelanggan ========================-->		
  <div class="poll3">
  <div class="small_heading">
  <h5>Layanan Pelanggan</h5></div>
  <div align="center">
  <?php 
  $ym=mysql_query("select * from mod_ym order by id desc");
  while($t=mysql_fetch_array($ym)){
  echo "<span class='table2'>$t[nama]
  <a href='ymsgr:sendIM?$t[username]'>
  <img src='http://opi.yahoo.com/online?u=$t[username]&amp;m=g&amp;t=1' 
  border='0' height='16' width='64'></a>";}
  ?>
  </div></div>
  <!--========= Akhir Layanan Pelanggan ========================-->			
	
	
  <!--========= Bank Pembayaran ========================-->		 
  <div class="poll">
  <div class="small_heading">
  <h5>Bank Pembayaran</h5></div>
  <div align="center"><span class="border_box">
  <?php
  $bank=mysql_query("SELECT * FROM mod_bank ORDER BY nama_bank ASC");
  while($b=mysql_fetch_array($bank)){
  echo "<div class='bank'>$a[nama_bank]</div>
  <div class='bank'><img src='foto_banner/$b[gambar]' border='0'></div>
  <div class='bank'>$b[nama_bank] No. Rek : $b[no_rekening]</div>
  <div class='bank'>an. $b[pemilik]</div><br/>";}?>
  </span></div></div>
  <!--========= Akhir Bank Pembayaran ========================-->		  
		  
  <!--========= Testimoni Pelanggan ========================-->		  
  <div class="poll">
  <div class="small_heading">
  <h5>Testimoni Pelanggan</h5></div>
  <div class="ticker2">
  <ul><li>
  <?php
  $testi=mysql_query("SELECT *  FROM testimoni ORDER BY id_testimoni DESC LIMIT 4");
  while($t=mysql_fetch_array($testi)){
  $tgl = tgl_indo($t[tanggal]); 
  echo "<div><span class='testi5'>$tgl</span><br/>
  <span class='testi'>$t[nama]</span><br/>
  <span class='testi3'>$t[pesan]<span class='testi2'></span></div>";}
  ?>
  </li></ul></div>
  <div align="right"><a href="testimoni.html" class="button" input style='width: 80px; height: 10px;'>
  tulis testimoni</a></div></div>
  <!--========= Akhir Testimoni Pelanggan ========================-->		  

     <!--========= Link Terkait ========================-->    
  <div class="poll">
  <div class="small_heading">
  <h5>Link Terkait</h5></div>
  <MARQUEE direction=down height=185 onmouseout=this.start() 
  onmouseover=this.stop() scrollAmount=3 scrollDelay=13><TABLE><TBODY><TR><TD>
  <?php
  $banner=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC LIMIT 10");
  while($b=mysql_fetch_array($banner)){
  echo "<p align='center'><a href='$b[url]'' target='_blank' title='$b[judul]'>
  <img width=200 src='foto_banner/$b[gambar]' border=0></a></p>";}
  ?>
  </TD></TR></TBODY></TABLE></MARQUEE></div>
  <!--========= Akhir Link Terkait ========================-->    			  
		  

  </div><div class="clear"></div></div>
  <div class="clear"></div>
  <!--========= BAGIAN FOOTER ========================-->
  <div id="footer">
	
	
  <!--========= Pengunjung ========================-->   
  <div class="aboutus">
  <h5>Pengunjung</h5>
  <p>
  <?php
  // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

  echo "
       <span class='pengunjung'><img src=counter/ikon3.png>    Pengunjung Online : $pengunjungonline <br />
	   <span class='pengunjung'><img src=counter/ikon3.png>  Pengunjung Hari Ini : $hits[hitstoday] <br />
	   <span class='pengunjung'><img src=counter/ikon3.png> Total pengunjung    : $totalpengunjung <br />
       <span class='pengunjung'><img src=counter/ikon3.png> Hits hari ini    : $hits[hitstoday] <br />
       <span class='pengunjung'><img src=counter/ikon3.png> Total Hits       : $totalhits <br />";
  ?> 
  </p></div>
  <!--========= Akhir Pengunjung ========================-->   	
  
  <!--========= Akhir Kabar-kabari ========================-->    
  <div class="ourblog">
  <h5>Gaya Blog</h5>
  <ul>
  <?php            
  $sebelum=mysql_query( "SELECT * FROM blog ORDER BY id_blog DESC LIMIT 10");		 
  while($t=mysql_fetch_array($sebelum)){
  $tgl = tgl_indo($t['tanggal']);
  echo "<div id='listticker'><li><a href=blog-$t[id_blog]-$t[judul_seo].html>
  <div class=judul>$t[judul]</a></div>"; 		    
  // Tampilkan hanya sebagian isi blog
  $isi_blog = htmlentities(strip_tags($t['isi_blog'])); // membuat paragraf pada isi blog dan mengabaikan tag html
  $isi = substr($isi_blog,0,150); // ambil karakter
  $isi = substr($isi_blog,0,strrpos($isi," ")); // potong per spasi kalimat
  echo " <div class=isiblog>$isi ... <a href=blog-$t[id_blog]-$t[judul_seo].html>
  <span class=lengkap>[selengkapnya] &nbsp;</span></div></a></li>";} 
  ?>
  </ul></div>
  <!--========= Akhir Kabar-kabari ========================-->    		
	
	
  <!--========= Polling ========================-->  	
  <div class="joinnews">
  <h5>Polling</h5>
  <ul><li>
  <?php
  $tanya=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Pertanyaan'");
  $t=mysql_fetch_array($tanya);
  echo " <class style=\"color:#fff;font-size:13px;font-weight:700\"> $t[pilihan]</span><br /><br />";
  echo "<form method=POST action='hasil-poling.html'>";
  $poling=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
  while ($p=mysql_fetch_array($poling)){
  echo "<input class=marginpoling type=radio name=pilihan value='$p[id_poling]'/><class    
  style=\"color:#fff;font-size:12px;font-weight:400\">&nbsp;&nbsp;$p[pilihan]<br /><br />";}
  echo "<input style='width: 50px; height: 20px;' type=submit class=simplebtn value=PILIH /></form>
  <a href=lihat-poling.html><input style='width: 50px; height: 20px;' 
  type=button class=simplebtn  value=LIHAT HASIL /></a>";
  ?>
  </li></ul></div>
  <!--========= Akhir Polling ========================-->  	
  
  <!--========= Kontak Kami ========================-->		
  <div class="contactus">
  <h5>Kontak Kami</h5>
  <ul>
  <?php
  $alamat=mysql_query("SELECT * FROM mod_alamat ORDER BY id_alamat DESC");
  while($b=mysql_fetch_array($alamat)){
  echo "<li>$b[alamat] </li>";}
  ?> 
  </ul></div><div class="clear"></div>
  <!--========= Akhir Kontak Kami ========================-->			
	
	
  <!--========= BAGIAN BAWAH AKHIR ========================-->		
  <div class="copyright_network">
  <p>Copyright © 2011. Depeloved by: <a href="mailto:rizal_fzl@yahoo.com?subject=Order Web">Rizal Faizal</p>

  <ul class="network"><li>
  <script language="javascript">
  document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'><img src='<?php echo "$f[folder]/images/twitter_icon.gif" ?>' border='0'/></a> &nbsp; <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'><img src='<?php echo "$f[folder]/images/facebook_icon.gif" ?>' border='0'/></a>");
  </script></li>
  	   <!--========= Sound Flash========================-->			
		<li>
		<object
        classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
        codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,79,0"
        id="sound"
        width="21" height="21">
        <param name="movie" value="sound.swf">
        <param name="bgcolor" value="#D4D4D4">
        <param name="quality" value="high">
        <param name="wmode" value="transparent">
        <param name="allowscriptaccess" value="samedomain">
        <embed
        type="application/x-shockwave-flash"
        pluginspage="http://www.macromedia.com/go/getflashplayer"
        name="sound"
        width="21" height="21"
        src="<?php echo "$f[folder]/images/sound.swf" ?>"
        quality="high"
        wmode="transparent"
        swliveconnect="true"
        allowscriptaccess="samedomain">
        <noembed>
        </noembed>
        </embed>
		</object>
        </li>
        <!--========= Akhir Sound Flash ========================-->    
		
		 
  <li><a href="#top" class="top">ke atas</a></li>
  </ul></div>
  <div class="clear"></div>
  <!--========= TUTUP BAGIAN BAWAH AKHIR ========================-->		

  <!--// JAVASCRIPT TAMBAHAN//-->	
  <script src="<?php echo "$f[folder]/js/jquery.cycle.all.min.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/jcarousellite_1.0.1c4.js" ?>" type="text/javascript"></script>
  <script type="text/javascript">
  var $ = jQuery.noConflict();
  $(document).ready(function(){	
	 	$('.boxslideshow').cycle({
		timeout: 2000,  
		fx:      'fade',        
		pause:   0,	 
		pauseOnPagerHover: 0 
		});
		
		$(".ticker").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 1,
		auto:3000,
		speed:2000,
		btnNext: ".next_item",
    	btnPrev: ".prev_item"
		});
		
		$(".ticker2").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 1,
		auto:3500,
		speed:3000,
		btnNext: ".next_item2",
    	btnPrev: ".prev_item2"
		});
        });	
  </script>
  
  <script src="<?php echo "$f[folder]/js/jquery.tools.min.js" ?>" type="text/javascript"></script>
  <script type="text/javascript">
  jQuery.noConflict();
  jQuery(document).ready(function(){	
  jQuery("#featured").scrollable({
	vertical: true,
	size: 1,
	speed:800,
	clickable: false,
	loop:true,
	keyboard: 'static',
	onSeek: function(event, i) {
	horizontal.scrollable(i).focus();}
  }).autoscroll({autoplay: true}).navigator("#main_navi");
  var horizontal =jQuery(".items").scrollable({size: 1}).circular().navigator(".navi");
  horizontal.eq(0).scrollable().focus();
  });
  </script>
  <script src="<?php echo "$f[folder]/js2/cufon-yui.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js2/jquery-1.4.4.min.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js2/jquery.prettyPhoto.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js2/screen.js" ?>" type="text/javascript"></script>

  </body>
  </html>
  <!--========= Copyright © 2011. Depeloved by: Rizal Faizal  ========================-->		  
