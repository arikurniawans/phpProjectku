<script language="javascript">
  
  function validasi(form){
  if (form.nama.value == ""){
  alert("Anda belum mengisikan Nama.");
  form.nama.focus();
  return (false);}  
    
  if (form.alamat.value == ""){
  alert("Anda belum mengisikan Alamat.");
  form.alamat.focus();
  return (false); }
  
  if (form.telpon.value == ""){
  alert("Anda belum mengisikan Telpon.");
  form.telpon.focus();
  return (false);}
  
  if (form.email.value == ""){
  alert("Anda belum mengisikan Email.");
  form.email.focus();
  return (false);}
  
  if (form.jasa.value == 0){
  alert("Anda belum memilih jasa pengiriman barang.");
  form.jasa.focus();
  return (false);}
  
  if (form.kota.value == 0){
  alert("Anda belum mengisikan Kota.");
  form.kota.focus();
  return (false);}
  
  if (form.kode.value == ""){
  alert("Anda belum mengisikan Kode.");
  form.kode.focus();
  return (false);}
	
  return (true);}

  function harusangka(jumlah){
  var karakter = (jumlah.which) ? jumlah.which : event.keyCode
  if (karakter > 31 && (karakter < 48 || karakter > 57))
  return false;
  return true;}

  $(document).ready(function() {
  $('#jasa').change(function() { 
  var category = $(this).val();
  $.ajax({
  type: 'GET',
  url: 'config/kota.php',
  data: 'perusahaan=' + category, // Untuk data di MySQL dengan menggunakan kata kunci tsb
  dataType: 'html',
  beforeSend: function() {
  $('#kota').html('<tr><td colspan=2>Loading ....</td></tr>');	
  },
  success: function(response) {
  $('#kota').html(response);
  }
  });
  });
  });

  </script>

  <?php
  // INTRODUKSI
  if ($_GET[module]=='store'){
  $profil = mysql_query("SELECT * FROM modul WHERE id_modul='56'");
  $r      = mysql_fetch_array($profil);
  echo "<div class='profil2'>$r[static_content]<br /></div></div> "; 
  //=======================================================================================================

				  
  // PRODUK TERBARU 	  
  echo "<h4 class='heading colr'><br /> <br /><br />Produk Terbaru</h4><br />";
  $sql=mysql_query("SELECT * FROM produk WHERE diskon='0' ORDER BY rand() DESC LIMIT 8");
  while ($r=mysql_fetch_array($sql)){

  include "diskon_stok.php";

  echo "<div class='prod_box'>
  <div class='center_prod_box'>            
  <div class='product_title'>
  <a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
  <div class='product_img'><a href='produk-$r[id_produk]-$r[produk_seo].html'>
  <a href='foto_produk/$r[gambar]' rel='prettyPhoto[mainteasers]' title='$r[nama_produk]'>
  <img src='foto_produk/small_$r[gambar]' border='0' height=172 width=129 
  class='tooltip' title='klik untuk memperbesar gambar'></a></div>
  $divharga
  <div class='prod_details_tab'>
  $tombol   
  <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a> 
  </div></div>";}
  //=======================================================================================================
   

// PRODUK DISKON
  echo "<h4 class='heading colr'><br /> <br />Produk Diskon Terbaru</h4></div>";   
  $sql=mysql_query("SELECT * FROM produk WHERE diskon ORDER BY id_produk DESC LIMIT 4"); 
  while ($r=mysql_fetch_array($sql)){

  include "diskon_stok.php";
  
  echo "<div class='prod_box'>
  <div class='center_prod_box'>            
  <div class='product_title'><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
  <div class='product_img'><a href='produk-$r[id_produk]-$r[produk_seo].html'>
  <a href='foto_produk/$r[gambar]' rel='prettyPhoto[mainteasers]' title='$r[nama_produk]'>
  <img src='foto_produk/small_$r[gambar]' border='0' height=172 width=129
  class='tooltip' title='klik untuk memperbesar gambar'></a></div>
  $divharga
  <div class='prod_details_tab'>
  $tombol            
  <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a> 
  </div></div>";}}  
  //=======================================================================================================


  // DETAIL PRODUK
  elseif ($_GET[module]=='detailproduk'){
  $detail=mysql_query("SELECT * FROM produk,kategori    
  WHERE kategori.id_kategori=produk.id_kategori AND id_produk='$_GET[id]'");
  $r = mysql_fetch_array($detail);
  
  include "diskon_stok2.php";
  
  echo "<h4 class='heading colr'>Kategori: <a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>
  $r[nama_kategori]</a></h4></div>";
  if ($d[gambar]!=''){
  echo "<div class='prod_img3'>
  <a href='foto_produk/$r[gambar]'  rel='prettyPhoto[mainteasers]' title='$r[nama_produk]'>
  <img src='foto_produk/$r[gambar]' width=200  class='tooltip' 
  title='klik untuk memperbesar gambar'/></a></div>";}
  echo"<div class='product_information'><span><a name='fb_share' type='button_count' href='http://www.facebook.com/sharer.php'>
  Bagikan halaman ini</a><script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'>
  </script></span><br/><br/>
  <div class='product_status in_stock'><span>$r[nama_produk]</span></div>
  <div class='row end'>&nbsp;</div>
  <p class='description'>$r[deskripsi]</p>
  <div class='product_options'>
  $tombol 
  $divharga
  <div class='rating_holder'><span>Stok:&nbsp;&nbsp; $r[stok] item</span></div>
  <div class='clear'></div></div>
  </div> <div class='clear'></div>
  </div><br /> ";
  //=======================================================================================================
			
					  
  // REKOMENDASI PRODUK       
  $sql=mysql_query("SELECT * FROM produk ORDER BY rand() LIMIT 4");
  echo "<h4 class='heading colr'>Rekomendasi Produk</h4></div>";
  while ($r=mysql_fetch_array($sql)){

  include "diskon_stok.php";

  echo "<div class='prod_box'>
  <div class='center_prod_box'>            
  <div class='product_title'>
  <a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
  <div class='product_img'><a href='produk-$r[id_produk]-$r[produk_seo].html'>
  <a href='foto_produk/$r[gambar]' rel='prettyPhoto[mainteasers]' title='$r[nama_produk]'>
  <img src='foto_produk/small_$r[gambar]' border='0' height=172 width=129 
  class='tooltip' title='klik untuk memperbesar gambar'></a></div>
  $divharga
  <div class='prod_details_tab'>
  $tombol   
  <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a> 
  </div></div>";}}
  //=======================================================================================================
  
			
  // PRODUK PER KATEGORI
  elseif ($_GET[module]=='detailkategori'){
  $sq = mysql_query("SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
  $n = mysql_fetch_array($sq);
  echo "<h4 class='heading colr'>Kategori: <span class=jud_kategori>$n[nama_kategori]</h4></div>";
  $p      = new Paging3;
  $batas  = 16;
  $posisi = $p->cariPosisi($batas);
  $sql = mysql_query("SELECT * FROM produk WHERE id_kategori='$_GET[id]' ORDER BY id_produk DESC LIMIT $posisi,$batas");		 
  $jumlah = mysql_num_rows($sql);
  if ($jumlah > 0){
  while ($r=mysql_fetch_array($sql)){
  
  include "diskon_stok.php";

  echo "<div class='prod_box'>
  <div class='center_prod_box'>            
  <div class='product_title'>
  <a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
  <div class='product_img'><a href='produk-$r[id_produk]-$r[produk_seo].html'>
  <a href='foto_produk/$r[gambar]' rel='prettyPhoto[mainteasers]' title='$r[nama_produk]'>
  <img src='foto_produk/small_$r[gambar]' border='0' height=172 width=129 
  class='tooltip' title='klik untuk memperbesar gambar'></a></div>
  $divharga
  <div class='prod_details_tab'>
  $tombol   
  <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a> 
  </div></div>";}

  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE id_kategori='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halkategori], $jmlhalaman);

  echo "<div class=halaman>Halaman :  $linkHalaman </div><br>";}
  else{
  echo "<p align=left><span class='table7'>Belum ada produk pada kategori ini.</p>";}}
  //=======================================================================================================
			
  
  // DETAIL BLOG
  elseif ($_GET['module']=='detailblog'){         
  $detail=mysql_query("SELECT * FROM blog,users,kategoriblog WHERE users.username=blog.username 
  AND kategoriblog.id_kategoriblog=blog.id_kategoriblog AND id_blog='$_GET[id]'");
  $d   = mysql_fetch_array($detail);
  $tgl = tgl_indo($d[tanggal]);
  $baca = $d[dibaca]+1;
  
  echo "<br/><h6>$d[nama_kategoriblog]</h6>";
  echo "<span ><h4><class style=\"color:#D87A3D;\">$d[judul]</h4></span>";
  echo "<span class=posting>Diposting oleh :<b>$d[nama_lengkap]</b><br /> 
  <span class=tanggalberita>$d[hari], $tgl - $d[jam] WIB</span><br />
  <span><a name='fb_share' type='button_count' href='http://www.facebook.com/sharer.php'>
  bagikan berita</a><script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'>
  </script>&nbsp;&nbsp;
  <a href='http://twitter.com/share' class='twitter-share-button' data-count='none' 
  data-via='YOUR-TWITTER-USERNAME'>Tweet</a><script type='text/javascript' 
  src='http://platform.twitter.com/widgets.js'></script></span>&nbsp;&nbsp;Dibaca: <b>$baca</b> kali</span><br /><br />";
  
  
 // Apabila ada gambar dalam blog, tampilkan   
  if ($d[gambar]!=''){
  echo "<span class=imageberita><img src='foto_blog/$d[gambar]' height=229 width=320  border=0></span>";}
  //=================================================
  
  echo "<div class=isiberita3>$d[isi_blog]</div>";	 		  
  //=================================================
  
  echo "<br/><br/><br/><img src=$f[folder]/images/berita_terkait.jpg><br />";

  $pisah_kata  = explode(",",$d[tag]);
  $jml_katakan = (integer)count($pisah_kata);

  $jml_kata = $jml_katakan-1; 
  $ambil_id = substr($_GET[id],0,4);

  $cari = "SELECT * FROM blog WHERE (id_blog<'$ambil_id') and (id_blog!='$ambil_id') and (" ;
  for ($i=0; $i<=$jml_kata; $i++){
  $cari .= "tag LIKE '%$pisah_kata[$i]%'";
  if ($i < $jml_kata ){
  $cari .= " OR "; }}
  $cari .= ") ORDER BY id_blog DESC LIMIT 5";
  $hasil  = mysql_query($cari);
  while($h=mysql_fetch_array($hasil)){
  echo " <span class=berkit><a href=blog-$h[id_blog]-$h[judul_seo].html>$h[judul]<br/></a></span>";}      
  echo "</ul><br />";

  mysql_query("UPDATE blog SET dibaca=$d[dibaca]+1 
  WHERE id_blog='$_GET[id]'");       
  echo "</div></div>";
  
  // Hitung jumlah komentar
  $komentar = mysql_query("select count(komentar.id_komentar) as jml from komentar WHERE id_blog='$_GET[id]' AND aktif='Y'");
  $k = mysql_fetch_array($komentar); 
  echo " <class style=\"color:#990000;font-size:14px\"><br /><b>$k[jml]</b> 
  <class style=\"color:#757575;font-size:12px\">Komentar :<br /><span class='garisberita'></span>";

  // Paging komentar
  $p      = new Paging7;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas);

  // Komentar blog
  $sql = mysql_query("SELECT * FROM komentar WHERE id_blog='$_GET[id]' AND aktif='Y' LIMIT $posisi,$batas");
  $jml = mysql_num_rows($sql);
  // Apabila sudah ada komentar, tampilkan 
  if ($jml > 0){
  while ($s = mysql_fetch_array($sql)){
  $tanggal = tgl_indo($s[tgl]);
  // Apabila ada link website diisi, tampilkan dalam bentuk link   
  if ($s[url]!=''){
  echo "<br/><span class=komentar><a name=$s[id_komentar] id=$s[id_komentar]>
  <a href='http://$s[url]' target='_blank'>$s[nama_komentar]</a></a></span><br />";}
  
  else{echo "<br /><span class=komentar>$s[nama_komentar]</span><br />"; }
  
  echo "<span class=testi5>$tanggal - $s[jam_komentar] WIB</span><br />";
  $isian=nl2br($s[isi_komentar]); // membuat paragraf pada isi komentar
  $isikan=sensor($isian); 
 
  echo autolink($isikan);
  echo "<span class='garisberita'></span>";}

  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM komentar WHERE id_blog='$_GET[id]' AND aktif='Y'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET['halkomentar'], $jmlhalaman);

  echo "<div class='halaman'>Halaman : $linkHalaman </div>";}
  
 // Form komentar
  echo "<br/><br /><b><h6>Isi Komentar :</h6><br/>
        <table width=100% style='border: 0pt dashed #0000CC;padding: 10px;'>
        <form name='form' action=simpankomentar.php method=POST onSubmit=\"return validasi(this)\">
        <input type=hidden name=id value=$_GET[id]>
		
  <tr><td><span class='isikoment3'>Nama:</td><td><input type=text name='nama_komentar' class='isikoment2' size=45></td></tr>
  <tr><td><span class='isikoment3'>Website:</td><td><input type=text name='url' class='isikoment2'  size=45></td></tr>
  <tr><td valign=top><span class='isikoment3'>Komentar:</td><td><textarea  name='isi_komentar' 
  class='isikoment2' style='width: 278px; height: 150px;'></textarea></td></tr>
  <tr><td>&nbsp;</td><td><img src='captcha3.php'></td></tr>
  <tr><td>&nbsp;</td><td><span class=isikomen>(masukkan 6 kode di atas)<br />
  <input type=text class='isikoment2' name=kode size=10 maxlength=6><br /></td></tr>
  </td><td colspan=2><p style='padding-top:15px;padding-left:130px;'><input style=' width: 110px; height: 26px;' 
  type=submit  class=button value='KIRIM PESAN'></td></tr></form></table><br /><br /><br />";
  echo "</div></div>";}
  
  //=======================================================================================================


  // BLOG PERKATEGORI
  elseif ($_GET['module']=='detailkategoriblog'){
  echo "<div id='content'>          
  <div id='content-detail'>";            
  // Tampilkan nama kategoriblog
  $sq = mysql_query("SELECT nama_kategoriblog from kategoriblog where id_kategoriblog='$_GET[id]'");
  $n = mysql_fetch_array($sq);
  echo "<h4 class='heading colr'>Kategori: <span class=jud_kategoriblogblog2>$n[nama_kategoriblog]</h4></div></span>";
  
  $p      = new Paging3;
  $batas  = 8;
  $posisi = $p->cariPosisi($batas);
  
  // Tampilkan daftar blog sesuai dengan kategoriblog yang dipilih
  $sql   = "SELECT * FROM blog WHERE id_kategoriblog='$_GET[id]' 
            ORDER BY id_blog DESC LIMIT $posisi,$batas";		 

  $hasil = mysql_query($sql);
  $jumlah = mysql_num_rows($hasil);
  // Apabila ditemukan blog dalam kategoriblog
  if ($jumlah > 0){
  while($r=mysql_fetch_array($hasil)){
  $tgl = tgl_indo($r[tanggal]);
		
  echo "<table><tr><td><span class=tanggalberita2>
  <img src=$f[folder]/images/ico-bullet-11.png> $r[hari], $tgl - $r[jam] WIB</span><br />";
  echo "<h5><a href=blog-$r[id_blog]-$r[judul_seo].html><class style=\"color:#990000;\">$r[judul]</a></h5>";

  // Apabila ada gambar dalam blog, tampilkan
  if ($r['gambar']!=''){
  echo "<span class=imageberita2><a href='foto_blog/$r[gambar]' rel='prettyPhoto[mainteasers]' title='$r[judul]'>
  <img  src='foto_blog/small_$r[gambar]'  width=90 height=70 border=0 
  class='tooltip' title='klik untuk memperbesar gambar'></a></span>";}
 
  // Tampilkan hanya sebagian isi blog
  $isi_blog = htmlentities(strip_tags($r[isi_blog])); 
  $isi = substr($isi_blog,0,500); 
  $isi = substr($isi_blog,0,strrpos($isi," ")); 

  echo "<div class=isiberita2>$isi ... <a href=blog-$r[id_blog]-$r[judul_seo].html>
  <span class=lengkap2>[selengkapnya] &nbsp;</a><br /></td></tr></table> <span class='garisberita2'></span></div>";}
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM blog WHERE id_kategoriblog='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halkategoriblog], $jmlhalaman);

  echo " <span class=halaman>Hal: <span class=halaman2>$linkHalaman";
  }
  else{
    echo " <h6>Belum ada berita pada kategori ini.</h6>";
  }
  echo "</div>
    </div>";}

 //=======================================================================================================
 
  // SEMUA BLOG
  elseif ($_GET['module']=='semuablog'){
  echo "<h4 class='heading colr'>Ragam Info</h4></div>";
  $p      = new Paging8;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua blog
  $sql=mysql_query("select count(komentar.id_komentar) as jml, judul, judul_seo, jam, 
  blog.id_blog, hari, tanggal, gambar, isi_blog from blog left join komentar 
  on blog.id_blog=komentar.id_blog and aktif='Y' group by blog.id_blog DESC LIMIT $posisi,$batas");
  while($r=mysql_fetch_array($sql)){
  $tgl = tgl_indo($r[tanggal]);
  
  echo "<table><tr><td><span class=tanggalberita2>
  <img src=$f[folder]/images/ico-bullet-11.png> $r[hari], $tgl - $r[jam] WIB</span><br />";
  echo "<h5><a href=blog-$r[id_blog]-$r[judul_seo].html><class style=\"color:#990000;\">$r[judul]</a></h5>";

   // Apabila ada gambar dalam blog, tampilkan
  if ($r['gambar']!=''){
  echo "<span class=imageberita2><a href='foto_blog/$r[gambar]' rel='prettyPhoto[mainteasers]' title='$r[judul]'>
  <img  src='foto_blog/small_$r[gambar]'  width=90 height=70 border=0 
  class='tooltip' title='klik untuk memperbesar gambar'></a></span>";}
 
  // Tampilkan hanya sebagian isi blog
  $isi_blog = htmlentities(strip_tags($r[isi_blog])); 
  $isi = substr($isi_blog,0,500); 
  $isi = substr($isi_blog,0,strrpos($isi," ")); 

  echo "<div class=isiberita2>$isi ... <a href=blog-$r[id_blog]-$r[judul_seo].html>
  <span class=lengkap2>[selengkapnya] &nbsp;</a><br /></td></tr></table> <span class='garisberita2'></span></div>";}
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM blog"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halblog], $jmlhalaman);
  echo "<div class='halaman'>Halaman : $linkHalaman </div>";
  echo "</div></div>";}
  //=======================================================================================================


  // HALAMAN STATIS
  elseif ($_GET['module']=='halamanstatis'){
  $detail=mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]'");
  $d   = mysql_fetch_array($detail);
  $tgl_posting   = tgl_indo($d[tgl_posting]);
  echo "<h4 class='heading colr'>$d[judul]</h4></div></span><br />";
  
  if ($d[gambar]!=''){
  echo "<span class=imageberita2><img src='foto_banner/$d[gambar]' width=300  border=0></span>";}
  
  echo "<div class=isiberita2>$d[isi_halaman]</div>";}
  //=======================================================================================================


  // PROFIL KAMI
  if ($_GET['module']=='profilkami'){
  $profil = mysql_query("SELECT * FROM modul WHERE id_modul='43'");
  $r      = mysql_fetch_array($profil);
  echo "<h4 class='heading colr'>Profil Kami</h4>
  <div class='profil'>$r[static_content]</div>";}
  //=======================================================================================================

  // HASIL POLING
  elseif ($_GET['module']=='hasilpoling'){
  if (isset($_COOKIE["poling"])) {
  echo "<p align=left><span class=testi>Maaf, anda sudah pernah melakukan pemilihan</p>";
  echo "<p align=left><span class=testi>terhadap jajak pendapat ini.</p>";}
  else{
  
  // membuat cookie dengan nama poling
  // cookie akan secara otomatis terhapus dalam waktu 24 jam
  setcookie("poling", "sudah poling", time() + 3600 * 24);
  
  echo "<h4 class='heading colr'>Hasil Polling</h4></div>";

  $u=mysql_query("UPDATE poling SET rating=rating+1 WHERE id_poling='$_POST[pilihan]'");

  echo "<p align=left><span class='pol1'>Terima kasih atas partisipasi anda mengikuti polling kami
  <br /><br /> Hasil polling saat ini: </p><br />";
  
  echo "<table width=100% style='border: 1pt dashed #CCC;padding: 10px;'>";
  $jml=mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
  $j=mysql_fetch_array($jml);  
  $jml_vote=$j[jml_vote];  
  $sql=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");  
  while ($s=mysql_fetch_array($sql)){ 	
  $prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
  $gbr_vote   = $prosentase * 3;
  echo "<tr><td width=200><span class='pol2'>$s[pilihan] ($s[rating]) </td><td> 
  <img src=$f[folder]/images/red.jpg width=$gbr_vote height=18 border=0> $prosentase % 
  </td></tr>";}
  echo "</table>
  <p><br/><span class='pol1'>Jumlah Pemilih: <span class='pol2'>$jml_vote</p>";}
  echo "</div></div>";}


  // HASIL POLING
  elseif ($_GET['module']=='lihatpoling'){
  echo "<h4 class='heading colr'>Hasil Polling</h4></div>";
  echo "<p align=left><span class='pol1'>
  Hasil polling saat ini: </p><br />";
   
  echo "<table width=100% style='border: 1pt dashed #CCC;padding: 10px;'>";
  $jml=mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
  $j=mysql_fetch_array($jml);  
  $jml_vote=$j[jml_vote];  
  $sql=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");  
  while ($s=mysql_fetch_array($sql)){ 	
  $prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
  $gbr_vote   = $prosentase * 3;
  echo "<tr><td width=150><span class=pol2>$s[pilihan] ($s[rating]) </td><td> 
  <img src=$f[folder]/images/red.jpg width=$gbr_vote height=18 border=0> $prosentase % 
  </td></tr>";}
  echo "</table>
  <p><br/><span class='pol1'>Jumlah Pemilih: <span class='pol2'>$jml_vote</p>";
  echo "</div></div>";}
 //=======================================================================================================


  // CARA PEMBELIAN
  if ($_GET['module']=='carabeli'){
  // Data cara pembelian mengacu pada id_modul=45
  $cara = mysql_query("SELECT * FROM modul WHERE id_modul='45'");
  $r      = mysql_fetch_array($cara);
  echo "<h4 class='heading colr'>Cara Pembelian</h4>
  <div class='carabeli'><div>$r[static_content]</div>";}
 //=======================================================================================================


  // DOWNLOAD KATALOG
  elseif ($_GET['module']=='semuadownload'){
  echo "<h4 class='heading colr'>Download Katalog</h4>"; 
  $p      = new Paging5;
  $batas  = 20;
  $posisi = $p->cariPosisi($batas);
  
  // Tampilkan semua download
  $sql = mysql_query("SELECT * FROM download  ORDER BY id_download DESC LIMIT $posisi,$batas");		  
  while($d=mysql_fetch_array($sql)){
  echo "<p class='download'><a href='downlot.php?file=$d[nama_file]'>
  <span class='download3'> $d[judul]</a><span class='download2'>(didownload: $d[hits]x)</p>";}

  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM download"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[haldownload], $jmlhalaman);

  echo "<div class='halaman'>Halaman : $linkHalaman </div>";
  echo "</div> </div>";}
 //=======================================================================================================


  // SEMUA PRODUK
  elseif ($_GET[module]=='semuaproduk'){
  echo "<h4 class='heading colr'>Semua Produk</h4>";

  // Tentukan berapa data yang akan ditampilkan per halaman (paging)
  $p      = new Paging2;
  $batas  = 16;
  $posisi = $p->cariPosisi($batas);

  // Tampilkan semua produk
  $sql=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT $posisi,$batas");
  while ($r=mysql_fetch_array($sql)){
  
  include "diskon_stok.php";
  
  echo "<div class='prod_box'>
  <div class='center_prod_box'>            
  <div class='product_title'>
  <a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
  <div class='product_img'><a href='produk-$r[id_produk]-$r[produk_seo].html'>
  <a href='foto_produk/$r[gambar]' rel='prettyPhoto[mainteasers]' title='$r[nama_produk]'>
  <img src='foto_produk/small_$r[gambar]' border='0' height=172 width=129 
  class='tooltip' title='klik untuk memperbesar gambar'></a></div>
  $divharga
  <div class='prod_details_tab'>
  $tombol   
  <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a> 
  </div></div>";}  
    
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halproduk], $jmlhalaman);

  echo "<div class='halaman'>Halaman : $linkHalaman </div>";}
  //=======================================================================================================

  // KERANJANG BELANJA
  elseif ($_GET[module]=='keranjangbelanja'){
  $sid = session_id();
  $sql = mysql_query("SELECT * FROM orders_temp, produk 
			                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
  $ketemu=mysql_num_rows($sql);
  if($ketemu < 1){
  echo "<script>window.alert('Keranjang Belanja anda masih kosong. Silahkan Anda berbelanja terlebih dahulu.');
        window.location=('index.php')</script>";
  }
  else{  

  echo "<h4 class='heading colr'>Keranjang Belanja</h4>


  <form method=post action=aksi.php?module=keranjang&act=update>

  <table width=670 border=0 cellpadding=0 cellspacing=1 align=center><tbody><tr  class='tab_bg' align=center height=23>
  <th><span class='table'>No</th>
  <th><span class='table'>Produk</th>
  <th><span class='table'>Nama Produk</th>
  <th><span class='table'>Berat(Kg)</th>
  <th><span class='table'>Qty</th>
  <th><span class='table'>Harga</th>
  <th><span class='table'>Sub Total</th>
  <th><span class='table'>Hapus</th></tr>";  

  $no=1;
  while($r=mysql_fetch_array($sql)){
    $disc        = ($r[diskon]/100)*$r[harga];
    $hargadisc   = number_format(($r[harga]-$disc),0,",",".");
    $subtotal    = ($r[harga]-$disc) * $r[jumlah];
    $total       = $total + $subtotal;  
    $subtotal_rp =  number_format(($subtotal),0,",",".");
	$total_rp    =  number_format(($total),0,",",".");
    $harga       =  number_format(($r[harga]),0,",",".");
    
  echo "<tr  class='tab_bg2' align=center>
  <td><span class='table2'>$no</td><input type=hidden name=id[$no] value=$r[id_orders_temp]>

  <td align=center><a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='foto_produk/$r[gambar]'    
  rel='prettyPhoto[mainteasers]' title='$r[nama_produk]'><img width=80 class='imgcart' src=foto_produk/small_$r[gambar]    
  class='tooltip' title='klik untuk memperbesar gambar'></a></td>

  <td><span class='table2'>$r[nama_produk]</td>
  <td align=center><span class='table2'>$r[berat]</td>
				  
  <td><select name='jml[$no]' value=$r[jumlah] onChange='this.form.submit()'>";
  for ($j=1;$j <= $r[stok];$j++){
  if($j == $r[jumlah]){
  echo "<option selected>$j</option>";}
  else{
  echo "<option>$j</option>";}}
  echo"</select>
			  
  <td><span class='table2'>$hargadisc</td>
  <td><span class='table2'>$subtotal_rp</td>
  <td align=center><a href='aksi.php?module=keranjang&act=hapus&id=$r[id_orders_temp]'>
  <img src=$f[folder]/images/kali.png border=0 title=Hapus></a></td></tr>";

  $no++; } 

  echo "<tr><td colspan=6 align=right><span class='table3'><br/>Total Harga:&nbsp;&nbsp;</td>
  <td colspan=2><span class='table3'><br/>Rp. $total_rp,-</b></td></tr>
  <tr><td colspan=2><br /><a href=javascript:history.go(-1)><input style='width: 135px; height: 26px;' type=submit 
  class= button value='LANJUTKAN BELANJA'></a><br /></td>
        
  <td colspan=4 align=right><br /><a href=selesai-belanja.html><input style='width: 115px; height: 26px;' type=button 
  class=button value='SELESAI BELANJA'><br /></td></tr>
  </tbody></table>";

  echo "<br /><br /><span class='table2'>**  Total harga di atas belum termasuk ongkos kirim yang akan dihitung saat <b>
  Selesai Belanja</b><br /></div>";}}    
  //=======================================================================================================
  

  
  // HUBUNGI KAMI
  elseif ($_GET['module']=='hubungikami'){
  echo "<h4 class='heading colr'>Hubungi Kami</h4>"; 
  
  $alamat=mysql_query("SELECT * FROM mod_alamat ORDER BY id_alamat DESC");
  while($b=mysql_fetch_array($alamat)){
  echo "<br/><span class='table5'>$b[alamat]</span><br/>
  
<iframe width='600' height='350' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'  
src='http://maps.google.co.id/maps/ms?msa=0&amp;msid=203381980094640223245.0004aea3b102f7a4b1e3b&amp;ie=UTF8&amp;t=m&amp;vpsrc=1&amp;ll=-6.264899,106.841472&amp;spn=0,0&amp;output=embed'></iframe><br /><small><a href='http://maps.google.co.id/maps/ms?msa=0&amp;msid=203381980094640223245.0004aea3b102f7a4b1e3b&amp;ie=UTF8&amp;t=m&amp;vpsrc=1&amp;ll=-6.264899,106.841472&amp;spn=0,0&amp;source=embed' style='color:#990000;font-size:12px; text-align:left'>
[lihat peta lebih besar]</a></small><br/><br/><br/><br/>";}
  
  echo "<div class='table5'><i>Untuk menghubungi secara online silahkan mengisi form di bawah ini</i>:<br/>
  <table width=100% style='border: 0pt dashed #0000CC;padding: 10px;'>
  <form action=hubungi-aksi.html enctype='multipart/form-data' method=POST onSubmit='return hubungi(this)'>
  <tr><td><span class='isikoment3'>Nama:</td><td><input type=text class='isikoment2' name=nama size=45></td></tr>
  <tr><td><span class='isikoment3'>Email:</td><td><input type=text class='isikoment2' name=email size=45></td></tr>
  <tr><td><span class='isikoment3'>Subjek:</td><td><input type=text class='isikoment2' name=subjek size=45></td></tr>
  <tr><td valign=top><span class='isikoment3'>Pesan:</td><td><textarea class='isikoment2' name=pesan  style='width: 278px; 
  height: 150px;'></textarea></td></tr>
  
  <tr><td>&nbsp;</td><td><img src='captcha3.php'></td></tr>
  <tr><td>&nbsp;</td><td><span class=isikomen>(masukkan 6 kode di atas)<br />
  <input type=text class='isikoment2' name=kode size=10 maxlength=6><br /></td></tr>

  </td><td colspan=2><p style='padding-top:15px;padding-left:90px;'><input style=' width: 110px; height: 26px;' 
  type=submit  class=button value='KIRIM PESAN'></td></tr></form></table><br />";
  echo "</div></div>";}

  // HUBUNGI KAMI (aksi)
  elseif ($_GET['module']=='hubungiaksi'){

  $nama=trim($_POST[nama]);
  $email=trim($_POST[email]);
  $subjek=trim($_POST[subjek]);
  $pesan=trim($_POST[pesan]);

  if (empty($nama)){
  echo "<span class='table8'>Anda belum mengisikan NAMA<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";}
		  
  elseif (empty($email)){
  echo "<span class='table8'>Anda belum mengisikan EMAIL<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";}
		  
  elseif (empty($subjek)){
  echo "<span class='table8'>Anda belum mengisikan SUBJEK<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";}
		  
  elseif (empty($pesan)){
  echo "<span class='table8'>Anda belum mengisikan PESAN<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";}
  else{
  if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['captcha_session']){

  mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
  echo "<h4 class='heading colr'>Hubungi Kami</h4></span><br />"; 
  echo "<p><img src=$f[folder]/images/terimakasih.jpg   border=0></p>";}
  else{
  echo "<span class='table8'>Kode yang Anda masukkan tidak cocok<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";}}
  else{
  echo "<span class='table8'>Anda belum memasukkan kode<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";}}
  echo "</div> </div>";}
 //=======================================================================================================
  

  // TESTIMONI
  elseif ($_GET['module']=='testimoni'){
  echo "<h4 class='heading colr'>Testimoni Pelanggan</h4>"; 
  echo "<b> <div class='table5'>Berikan pesan atau kesan anda terhadap pelayanan toko online kami:</b><br/><br/>

  <table width=100% style='border: 0pt dashed #0000CC;padding: 10px;'>
  <form action=testimoni-aksi.html enctype='multipart/form-data' method=POST onSubmit='return testimoni(this)'>

  <tr><td><span class='isikoment3'>Nama:</td><td><input type=text class='isikoment2' name=nama size=45></td></tr>
  <tr><td><span class='isikoment3'>Email:</td><td><input type=text class='isikoment2' name=email size=45></td></tr>
  <tr><td valign=top><span class='isikoment3'>Testimoni:</td><td><textarea class='isikoment2' maxlength=100 name=pesan 
  style='width: 245px; height: 80px; '></textarea></td></tr>

  <tr><td>&nbsp;</td><td><span class=isikomen>(testimoni maksimal 100 karakter)<br /><br />
  <tr><td>&nbsp;</td><td><img src='captcha3.php'></td></tr>
  <tr><td>&nbsp;</td><td><span class=isikomen>(masukkan 6 kode di atas)<br />
  <input type=text class='isikoment2' name=kode size=10 maxlength=6><br /></td></tr>
  </td><td colspan=2><p style='padding-top:15px ;'><input style='width: 130px; height: 26px;' type=submit
  class=button value='KIRIM TESTIMONI'></td></tr></form></table><br />";
  echo "</div></div>";}

  //TESTIMONI (aksi)
  elseif ($_GET[module]=='testimoniaksi'){
  $nama=trim($_POST['nama']);
  $email=trim($_POST['email']);
  $pesan=trim($_POST['pesan']);

  if (empty($nama)){
  echo "<span class='table8'>Anda belum mengisikan NAMA<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";}
  
  elseif (empty($email)){
  echo "<span class='table8'>Anda belum mengisikan EMAIL<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";}

  elseif (empty($pesan)){
  echo "<span class='table8'>Anda belum mengisikan PESAN<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";}

  else{
  if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['captcha_session']){

  mysql_query("INSERT INTO testimoni(nama,
                                    email,
                                    pesan,
                                    tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
							   
  echo "<h4 class='heading colr'>Testimoni</h4></span><br />"; 
  echo "<p><img src=$f[folder]/images/testimoni.jpg   border=0></p>";}  
  else{
  echo "<span class='table8'>Kode yang Anda masukkan tidak cocok<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";}}
  
  else{
  echo "<span class='table8'>Anda belum memasukkan kode<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";}}
  
  echo "</div></div>";}
 //=======================================================================================================


   // HASIL PENCARIAN
  elseif ($_GET['module']=='hasilcari'){
  // menghilangkan spasi di kiri dan kanannya
  $kata = trim($_POST['kata']);
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);
  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  $cari = "SELECT * FROM produk WHERE " ;
  for ($i=0; $i<=$jml_kata; $i++){
  $cari .= "deskripsi LIKE '%$pisah_kata[$i]%' OR nama_produk LIKE '%$pisah_kata[$i]%'";
  if ($i < $jml_kata ){
  $cari .= " OR "; }}
  
  $cari .= " ORDER BY id_produk DESC LIMIT 12";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

  echo "<h4 class='heading colr'>Hasil Pencarian</h4>";
   
  if ($ketemu > 0){
  
  echo "<div class='profil'>Ditemukan <b>$ketemu</b> produk dengan kata <font style='background-color:#FFEFB0'>
  <b>$kata</b></font>  <b>:</b></div><br/><br/><br/>";
  
  while($t=mysql_fetch_array($hasil)){
  
  $isi_produk = htmlentities(strip_tags($t['deskripsi'])); 
  $isi = substr($isi_produk,0,400); 
  $isi = substr($isi_produk,0,strrpos($isi," ")); 
  
  echo "<div>
  <a href=produk-$t[id_produk]-$t[produk_seo].html><h5>$t[nama_produk]</h5></a></span></div>
  
  <span class=imageberita2><a href='foto_produk/$t[gambar]' rel='prettyPhoto[mainteasers]' title='$t[judul]'>
  <img  src='foto_produk/small_$t[gambar]'  width=80 height=60 border=0 
  class='tooltip' title='klik untuk memperbesar gambar'></a></span>
 
  <div class='hasilcari'>$isi ... <a href=produk-$t[id_produk]-$t[produk_seo].html>
  <span class='lengkap2'>[selengkapnya]</a></div> <BR/><div class='main-spacer'>&nbsp;</div>";}}
  else{
  echo "<p><div class='profil'>Tidak ditemukan produk dengan kata <font style='background-color:#FFEFB0'><b>$kata</b></p>";}}
 //=======================================================================================================



  // SELESAI BELANJA
  if ($_GET['module']=='selesaibelanja'){
  $sid = session_id();
  $sql = mysql_query("SELECT * FROM orders_temp, produk WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
  $ketemu=mysql_num_rows($sql);
  if($ketemu < 1){
  echo "<script> alert('Keranjang belanja masih kosong');window.location='index.php'</script>\n";
  exit(0);}
  else{
  echo "<h4 class='heading colr'>Data Pembeli</h4>
      <form name=form action=simpan-transaksi.html method=POST onSubmit=\"return validasi(this)\">
      <table width=650>
      <tr><td><span class='isikoment3'>Nama</td><td><input type=text name=nama size=30 class='isikoment2'></td></tr>
      <tr><td><span class='isikoment3'>Alamat Lengkap</td><td><input type=text name=alamat size=70 class='isikoment2'></td></tr>
      <tr><td><span class='isikoment3'>Telpon/HP</td><td><input type=text name=telpon class='isikoment2'></td></tr>
      <tr><td><span class='isikoment3'>Email</td><td><input type=text name=email class='isikoment2'></td></tr>
	  
      <tr><td valign=top><span class='table4'>Jasa Pengiriman</td><td>  
      <select name='jasa' id='jasa' class='table5'>
      <option value='0' selected>- Pilih Jenis Jasa Pengiriman -</option>";
      $tampil=mysql_query("SELECT * FROM shop_pengiriman ORDER BY nama_perusahaan");
      while($r=mysql_fetch_array($tampil)){
      echo "<option value='$r[id_perusahaan]'>$r[nama_perusahaan]</option>";}
      echo "</select></td></tr>
      <tr><td><span class='table4'>Kota Tujuan</td><td><span id='kota'><select name='kota' id='kota' class='table5'>
	  <option value='0' selected>Tentukan Jenis Jasa Pengiriman Dahulu</option></select></span></td></tr>
	  
	  <tr><td>&nbsp;</td><td><br /><img src='captcha.php'></td></tr>
      <tr><td>&nbsp;</td><td><span class=isikomen3>(masukkan 6 kode di atas)<br />
	  <input type=text class='isikoment2' name=kode size=10 maxlength=6><br /></td></tr>
      <tr><td colspan=2><input style='width: 60px; height: 25px;' type=submit class= button value=PROSES></td></tr>
      </table><br/><br/>";
		  
  echo "<h4 class='heading colr'>Konfirmasi Keranjang Belanja Anda</h4>
  <table width=670 border=0 cellpadding=0 cellspacing=1 align=center>
  <tbody><tr class='tab_bg' align=center height=23><th><span class='table'>No</th><th>
  <span class='table'>Nama Produk</th><th>
  <span class='table'>Berat(Kg)</th>
  <th><span class='table'>Qty</th>
  <th><span class='table'>Harga</th>
  <th><span class='table'>Sub Total</th></tr>";  
  
  $no=1;
  while($r=mysql_fetch_array($sql)){
  //nampilkan diskon per produk 
    $disc        = ($r[diskon]/100)*$r[harga];
    $hargadisc   = number_format(($r[harga]-$disc),0,",","."); 
    $subtotal    = ($r[harga]-$disc) * $r[jumlah];
	
  //akhir nampilkan diskon per produk 
    $total       = $total + $subtotal;  
    $subtotal_rp =  number_format(($subtotal),0,",",".");
	$total_rp    =  number_format(($total),0,",",".");
    $harga       =  number_format(($r['harga']),0,",",".");
    $subtotalberat = $r['berat'] * $r['jumlah']; 
    $totalberat  = $totalberat + $subtotalberat;  

  echo "<tr class='tab_bg2' align=center height=23><td><span class='table2'>$no</td>
  <input type=hidden name=id[$no] value=$r[id_orders_temp]>
  <td><span class='table2'>$r[nama_produk]</td>
  <td align=center><span class='table2'>$r[berat]</td>
  <td align=center><span class='table2'>$r[jumlah]</td>
  <td><span class='table2'>$harga</td>
  <td><span class='table2'>$subtotal_rp</td></tr>";
  $no++; }
  echo "<tr><td colspan=2 align=right><span class='table3'><br/>Total Berat:</td>
  <td align=center><br/><span class='table3'>$totalberat kg</b></td>
  <td align=right colspan=2><br/><span class='table3'>Total Harga:</td>
  <td align=center><br/><span class='table3'>Rp. $total_rp,-</td></tr>
  </tbody></table></div>";
  echo "<br/><table width=520><tr><td>
  <input style='width: 70px; height: 26px;'  class= button type=button value='KEMBALI' onclick=self.history.back()>
  <span style='float : right;'><input style='width: 110px; height: 26px;' type=submit  class= button value='PROSES ORDER'></span>  </td></tr></table></div>";}}      
  //===========================================================================================================================

  // SIMPAN TRANSAKSI
  elseif ($_GET[module]=='simpantransaksi'){
  $kar1=strstr($_POST[email], "@");
  $kar2=strstr($_POST[email], ".");

  if (empty($_POST[nama]) || empty($_POST[alamat]) || empty($_POST[telpon]) || empty($_POST[email]) || empty($_POST[kota])){
  echo "<span class='table3'>Data yang Anda isikan belum lengkap.<br /><br />
  <a href=javascript:history.go(-1)><input style='width: 100px; height: 25px;' type=submit  
  class= button value='ULANGI LAGI'></a>";}

  elseif (!ereg("[a-z|A-Z]","$_POST[nama]")){
  echo "<span class='table3'>Nama tidak boleh diisi dengan angka atau simbol.<br /><br />
  <a href=javascript:history.go(-1)><input style='width: 100px; height: 25px;' type=submit  
  class= button value='ULANGI LAGI'></a>";}

  elseif (strlen($kar1)==0 OR strlen($kar2)==0){
  echo "<span class='table3'>Alamat email Anda tidak valid, mungkin kurang tanda titik (.) atau tanda @.<br /><br />
  <a href=javascript:history.go(-1)><input style='width: 100px; height: 25px;' type=submit 
  class= button value='ULANGI LAGI'></a>";}

  else{
  // fungsi untuk mendapatkan isi keranjang belanja
  function isi_keranjang(){
  $isikeranjang = array();
  $sid = session_id();
  $sql = mysql_query("SELECT * FROM orders_temp WHERE id_session='$sid'");
	
  while ($r=mysql_fetch_array($sql)) 
  {$isikeranjang[] = $r;}
  return $isikeranjang;}
  $tgl_skrg = date("Ymd");
  $jam_skrg = date("H:i:s");

  if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['captcha_session']){

  function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;}

  $nama   = antiinjection($_POST['nama']);
  $alamat = antiinjection($_POST['alamat']);
  $telpon = antiinjection($_POST['telpon']);
  //=====================================================================================================


  // PROSES TRANSAKSI SELESAI

  // simpan data pemesanan 
  mysql_query("INSERT INTO orders(nama_kustomer, alamat, telpon, email, tgl_order, jam_order, id_kota) 
  VALUES('$_POST[nama]','$_POST[alamat]','$_POST[telpon]','$_POST[email]','$tgl_skrg','$jam_skrg','$_POST[kota]')");
  
  // mendapatkan nomor orders
  $id_orders=mysql_insert_id();

  // panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
  $isikeranjang = isi_keranjang();
  $jml          = count($isikeranjang);

  // simpan data detail pemesanan  
  for ($i = 0; $i < $jml; $i++){
  mysql_query("INSERT INTO orders_detail(id_orders, id_produk, jumlah) 
  VALUES('$id_orders',{$isikeranjang[$i]['id_produk']}, {$isikeranjang[$i]['jumlah']})");}
  
  // setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (orders_temp)
  for ($i = 0; $i < $jml; $i++) {
  mysql_query("DELETE FROM orders_temp WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");}

  echo "<h4 class='heading colr'>Proses Transaksi Selesai</h4>";

  echo "<div class='prod_box_big'>

      <b><class style=\"color:#464646;font-size:14px;\">Data pemesan dan order anda adalah sebagai berikut:</b> <br /><br />
      <table>
      <tr><td><span class='pemesanan'>Nama           </td><td> : <span class='pemesanan'>
	  <class style=\"color:#660099;font-size:14px;\"><b>$_POST[nama]</b> </td></tr>
      <tr><td><span class='pemesanan'>Alamat Lengkap </td><td> : <span class='pemesanan'>$_POST[alamat] </td></tr>
      <tr><td><span class='pemesanan'>Telpon         </td><td> : <span class='pemesanan'>$_POST[telpon] </td></tr>
      <tr><td><span class='pemesanan'>E-mail         </td><td> : <span class='pemesanan'>$_POST[email] </td></tr></table><br />
      
      Nomor Order: <b> <span class='table6'>$id_orders</b><br /><br />";

      $daftarproduk=mysql_query("SELECT * FROM orders_detail,produk 
                                 WHERE orders_detail.id_produk=produk.id_produk 
                                 AND id_orders='$id_orders'");

  echo "<table width=640 border=0 cellpadding=0 cellspacing=1 align=center>
  <tr background='$f[folder]/images/bg_tab.jpg' align=center height=23><th><span class='table'>No</th>
  <th><span class='table'>Nama Produk</th>
  <th><span class='table'>Berat(Kg)</th>
  <th><span class='table'>Qty</th><th>
  <span class='table'>Harga</th><th>
  <span class='table'>Sub Total</th></tr>";

  $pesan="Terimakasih telah melakukan pemesanan online di toko kami<br /><br />  
        Nama: $_POST[nama] <br />
        Alamat: $_POST[alamat] <br/>
        Telpon: $_POST[telpon] <br /><hr />
        Nomor Order: $id_orders <br />
        Data order Anda adalah sebagai berikut: <br /><br />";
		
  $no=1;
  while ($d=mysql_fetch_array($daftarproduk)){
   $subtotalberat = $d[berat] * $d[jumlah]; 
   $totalberat  = $totalberat + $subtotalberat; 
   $disc        = ($d[diskon]/100)*$d[harga];
   $hargadisc   = number_format(($d[harga]-$disc),0,",","."); 
   $subtotal    = ($d[harga]-$disc) * $d[jumlah];
   $total       = $total + $subtotal;
   $subtotal_rp =  number_format(($subtotal),0,",",".");
   $total_rp    =  number_format(($total),0,",",".");
   $harga       =  number_format(($r['harga']),0,",",".");
   
  echo "<tr background='$f[folder]/images/bg_tab2.jpg' align=center height=23><td>$no</td>
  <td>$d[nama_produk]</td><td align=center>$d[berat]</td><td align=center>$d[jumlah]</td>
  <td>Rp. $harga,-</td>
  <td>Rp. $subtotal_rp,-</td></tr>";

  $pesan.="$d[jumlah] $d[nama_produk] -> Rp. $harga -> Subtotal: Rp. $subtotal_rp <br />";
  $no++;}

  $ongkos=mysql_fetch_array(mysql_query("SELECT ongkos_kirim FROM kota WHERE id_kota='$_POST[kota]'"));
  $ongkoskirim1=$ongkos[ongkos_kirim];
  $ongkoskirim = $ongkoskirim1 * $totalberat;
  $grandtotal    = $total + $ongkoskirim; 
  $ongkoskirim_rp =  number_format(($ongkoskirim),0,",",".");
  $ongkoskirim1_rp =  number_format(($$ongkoskirim1),0,",",".");
  $grandtotal_rp =  number_format(($grandtotal),0,",",".");
  //=====================================================================================================
  
  
  //HARUS DIRUBAH (setting email) *periksa pula modul>mod_order>order.php
  $pesan.="Total : Rp. $total_rp,-
         <br />Ongkos Kirim untuk Tujuan Kota Anda : Rp. $ongkoskirim1_rp/Kg 
         <br />Total Berat : $totalberat Kg
         <br />Total Ongkos Kirim  : Rp. $ongkoskirim_rp		 
         <br />Grand Total : Rp. $grandtotal_rp,-
         <br /><br />Silahkan lakukan pembayaran ke Bank Mandiri sebanyak Grand Total yang tercantum, 
		 nomor rekeningnya <b>1260005244719</b> a.n. Niken Sulanjari";

  $subjek="Pemesanan Online Griya Gaya";

  // Kirim email dalam format HTML
  $dari = "From: rizal_fzl@yahoo.com \n";
  $dari .= "Content-type: text/html \r\n";

  // Kirim email ke kustomer
  mail($_POST[email],$subjek,$pesan,$dari);

  // Kirim email ke pengelola toko online
  mail("rizal_fzl@yahoo.com ",$subjek,$pesan,$dari);


  echo "<tr><td colspan=5 align=right>Total : Rp. </td><td align=right><b>$total_rp</b></td></tr>
  <tr><td colspan=5 align=right>Ongkos Kirim untuk Tujuan Kota Anda: Rp. </td>
  <td align=right><b>$ongkoskirim1_rp</b>/Kg</td></tr>      
  <tr><td colspan=5 align=right>Total Berat : </td><td align=right><b>$totalberat Kg</b></td></tr>
  <tr><td colspan=5 align=right>Total Ongkos Kirim : Rp. </td><td align=right><b>$ongkoskirim_rp</b></td></tr>      
  <tr><td colspan=5 align=right>Grand Total : Rp. </td><td align=right><b>$grandtotal_rp</b></td></tr>
  </table>";

  echo "<br /><br /><p>&bull; Data order dan nomor rekening transfer sudah terkirim ke email Anda. <br />
  &bull; Apabila Anda tidak melakukan pembayaran dalam 3 hari, maka data order Anda akan terhapus (transaksi batal)</p></div>"; }

  else{
  echo "<span class='table3'><b>Kode yang Anda masukkan tidak cocok!</b><br /><br />
  <a href=javascript:history.go(-1)><input style='width: 110px; height: 22px;' type=submit 
  class= button value='ULANGI LAGI'></a>";}}

  else{
  echo "<span class='table3'><b>Anda belum memasukkan kode!</b><br /><br />
  <a href=javascript:history.go(-1)><input style='width: 100px; height: 25px;' type=submit  
  class= button value='ULANGI LAGI'></a>";}}}
  //=====================================================================================================
  
  //========= Copyright © 2011. Depeloved by: Rizal Faizal  =================================================================  

?>
