<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_header/aksi_header.php";
switch($_GET[act]){
  // Tampil header
  default:
    echo "<header><h3>EDIT HEADER</h3></header>
          <div class='module_content'><input type=button  class=button value='Tambahkan Header' onclick=location.href='?module=header&act=tambahheader'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Judul</th><th>Tgl. Posting</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM header ORDER BY id_header DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$tgl</td>
                <td><a href=?module=header&act=editheader&id=$r[id_header]><img src='images/icn_edit.png' title='Edit'></a>
	                  <a href=$aksi?module=header&act=hapus&id=$r[id_header]><img src='images/icn_trash.png' title='Hapus'></a>
		        </td></tr>";
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambahheader":
    echo "<header><h3>TAMBAHKAN HEADER</h3></header>
          <form method=POST action='$aksi?module=header&act=input' enctype='multipart/form-data'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Judul</td><td>  : <input type=text name='judul' size=30></td></tr>
          <tr><td>Gambar</td><td> : <input type=file name='fupload' size=40></td></tr>
          <tr><td colspan=2><input type=submit class=button value=Simpan>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
     break;
    
  case "editheader":
    $edit = mysql_query("SELECT * FROM header WHERE id_header='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<header><h3>EDIT HEADER</h3></header>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=header&act=update>
          <input type=hidden name=id value=$r[id_header]>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Judul</td><td>     : <input type=text name='judul' size=30 value='$r[judul]'></td></tr>
          <tr><td valign=top>Gambar</td><td>    : <img width=500 src='../header/$r[gambar]'></td></tr>
          <tr><td>Ganti Gambar</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) File gambar disarankan JPG/JPEG ukuran 960px x 297px. Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit class=button value=Update>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
