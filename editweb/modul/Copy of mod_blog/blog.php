<?php    
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

function GetCheckboxes($table, $key, $Label, $Nilai='') {
  $s = "select * from $table order by nama_tag";
  $r = mysql_query($s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysql_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
    $str .= "<input type=checkbox name='".$key."[]' value='$w[$key]' $_ck>$w[$Label] ";
  }
  return $str;
}

$aksi="modul/mod_blog/aksi_blog.php";
switch($_GET[act]){
  // Tampil blog
  default:
  echo "<header><h3>TAMBAH BLOG</h3></header>
           <div class='module_content'>
          <form method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=blog>
          <div id=paging>Pencarian Blog : <input type=text name='kata' value='masukan judul blog' size=40> <input type=submit class=button  value=Cari></div>
          </form><br/>
          <input type=button class=button value='Tambah blog' onclick=\"window.location.href='?module=blog&act=tambahblog';\">";

    if (empty($_GET['kata'])){
     echo " <table id='rounded-corner'>
          <tr><th>No</th><th>Judul</th><th>Tgl. Posting</th><th>Aksi</th></tr>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM blog ORDER BY id_blog DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM blog 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_blog DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$tgl_posting</td>
		            <td><a href=?module=blog&act=editblog&id=$r[id_blog]><img src='images/icn_edit.png' title='Edit'></a>  
<a href='$aksi?module=blog&act=hapus&id=$r[id_blog]&namafile=$r[gambar]'><img src='images/icn_trash.png' title='Edit'></a>
				</td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM blog"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM blog WHERE username='$_SESSION[namauser]'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br>";
 
    break;    
    }
    else{
    echo "<table>  
          <tr><th>no</th><th>judul</th><th>tgl. posting</th><th>aksi</th></tr>";

    $p      = new Paging9;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM blog WHERE judul LIKE '%$_GET[kata]%' ORDER BY id_blog DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM blog 
                           WHERE username='$_SESSION[namauser]'
                           AND judul LIKE '%$_GET[kata]%'       
                           ORDER BY id_blog DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$tgl_posting</td>
		            <td><a href=?module=blog&act=editblog&id=$r[id_blog]>Edit</a> | 
		                <a href='$aksi?module=blog&act=hapus&id=$r[id_blog]&namafile=$r[gambar]'>Hapus</a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM blog WHERE judul LIKE '%$_GET[kata]%'"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM blog WHERE username='$_SESSION[namauser]' AND judul LIKE '%$_GET[kata]%'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br>";
 
    break;    
    }

  
  case "tambahblog":
    echo "<header><h3>TAMBAHKAN BLOG</h3></header>
          <form method=POST action='$aksi?module=blog&act=input' enctype='multipart/form-data'>
            <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td width=70>Judul</td>     <td> : <input type=text name='judul' size=60></td></tr>
          <tr><td width=170>Kategori Blog</td>  <td> : 
          <select name='kategoriblog'>
            <option value=0 selected>- Pilih kategoriblog -</option>";
            $tampil=mysql_query("SELECT * FROM kategoriblog ORDER BY nama_kategoriblog");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategoriblog]>$r[nama_kategoriblog]</option>";
            }
    
      echo "
          <tr><td valign=top>Isi blog</td>  <td> <textarea name='isi_blog'  style='width: 550px; height: 350px;'></textarea></td></tr>
          <tr><td>Gambar</td>      <td> : <input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>";

    $tag = mysql_query("SELECT * FROM tag ORDER BY tag_seo");
    echo "<tr><td>Tag (Label)</td><td> ";
    while ($t=mysql_fetch_array($tag)){
      echo "<input type=checkbox value='$t[tag_seo]' name=tag_seo[]>$t[nama_tag] ";
    }
    
    echo "</td></tr>
          <tr><td colspan=2><input type=submit class=button value=Simpan>
                            <input type=button class=button  value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
    
  case "editblog":
    $edit = mysql_query("SELECT * FROM blog WHERE id_blog='$_GET[id]' AND username='$_SESSION[namauser]'");
    $r    = mysql_fetch_array($edit);

     echo "<header><h3>EDIT BLOG</h3></header>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=blog&act=update>
          <input type=hidden name=id value=$r[id_blog]>
         <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td width=70>Judul</td>     <td> : <input type=text name='judul' size=60 value='$r[judul]'></td></tr>
          <tr><td>Kategori</td>  <td> : <select name='kategoriblog'>";
 
          $tampil=mysql_query("SELECT * FROM kategoriblog ORDER BY nama_kategoriblog");
          if ($r[id_kategoriblog]==0){
            echo "<option value=0 selected>- Pilih kategoriblog -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kategoriblog]==$w[id_kategoriblog]){
              echo "<option value=$w[id_kategoriblog] selected>$w[nama_kategoriblog]</option>";
            }
            else{
              echo "<option value=$w[id_kategoriblog]>$w[nama_kategoriblog]</option>";
            }
          }

   
      echo "<tr><td valign=top>Isi blog</td>   <td> <textarea name='isi_blog' style='width: 550px; height: 350px;'>$r[isi_blog]</textarea></td></tr>
          <tr><td>Gambar</td>       <td> :  ";
          if ($r[gambar]!=''){
              echo "<img src='../foto_blog/small_$r[gambar]'>";  
          }
    echo "</td></tr>
          <tr><td>Ganti Gambar</td>    <td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>";

    $d = GetCheckboxes('tag', 'tag_seo', 'nama_tag', $r[tag]);


    echo "<tr><td>Tag (Label)</td><td> $d </td></tr>";
 
    echo  "<tr><td colspan=2><input type=submit class=button value=Update>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}

}
?>
