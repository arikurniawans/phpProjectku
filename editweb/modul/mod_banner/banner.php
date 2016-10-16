<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_banner/aksi_banner.php";
switch($_GET[act]){
  // Tampil Banner
  default:
    echo "<header><h3>EDIT LINK TERKAIT</h3></header>
          <div class='module_content'><input type=button  class=button value='Tambahkan Banner' onclick=location.href='?module=banner&act=tambahbanner'>
            <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Judul</th><th>URL</th><th>Tgl. Posting</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td><a href=$r[url] target=_blank>$r[url]</a></td>
                <td>$tgl</td>
                <td><a href=?module=banner&act=editbanner&id=$r[id_banner]>
				<img src='images/icn_edit.png' title='Edit'></a>
	                  <a href=$aksi?module=banner&act=hapus&id=$r[id_banner]>
					  <img src='images/icn_trash.png' title='Hapus'></a>

		        </td></tr>";
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambahbanner":
    echo "<header><h3>TAMBAHKAN LINK TERKAIT</h3></header>
          <form method=POST action='$aksi?module=banner&act=input' enctype='multipart/form-data'>
            <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Judul</td><td>  : <input type=text name='judul' size=30></td></tr>
          <tr><td>Url</td><td>   : <input type=text name='url' size=50 value='http://'></td></tr>
          <tr><td>Gambar</td><td> : <input type=file name='fupload' size=40></td></tr>
          <tr><td colspan=2><input type=submit class=button value=Simpan>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
     break;
    
  case "editbanner":
    $edit = mysql_query("SELECT * FROM banner WHERE id_banner='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<header><h3>EDIT LINK TERKAIT</h3></header>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=banner&act=update>
          <input type=hidden name=id value=$r[id_banner]>
            <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Judul</td><td>     : <input type=text name='judul' size=30 value='$r[judul]'></td></tr>
          <tr><td>Url</td><td>      : <input type=text name='url' size=50 value='$r[url]'></td></tr>
          <tr><td>Gambar</td><td>    : <img src='../foto_banner/$r[gambar]'></td></tr>
          <tr><td>Ganti Gambar</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit class=button value=Update>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
