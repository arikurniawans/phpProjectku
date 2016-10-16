<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_album/aksi_album.php";
switch($_GET[act]){
  // Tampil Album
  default:
     echo "<header><h3>EDIT ALBUM FOTO</h3></header>
             <div class='module_content'><input type=button class=button value='Buat Album Baru' 
          onclick=\"window.location.href='?module=album&act=tambahalbum';\">
         <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Judul Album</th><th>Aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM album ORDER BY id_album DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[jdl_album]</td>
             <td><a href=?module=album&act=editalbum&id=$r[id_album]><img src='images/icn_edit.png' title='Edit'></a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    echo "<div id=paging>*) Data pada Album tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Album.</div><br>";
    break;
  
  // Form Tambah Album
  case "tambahalbum":
  echo "<header><h3>MEMBUAT ALBUM </h3></header>
          <form method=POST action='$aksi?module=album&act=input' enctype='multipart/form-data'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Judul Album</td><td> : <input type=text name='jdl_album' size=40></td></tr>
          <tr><td>Gambar</td><td> : <input type=file name='fupload' size=40></td></tr>
          <tr><td colspan=2><input type=submit name=submit class=button value=Simpan>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Album  
  case "editalbum":
    $edit=mysql_query("SELECT * FROM album WHERE id_album='$_GET[id]'");
    $r=mysql_fetch_array($edit);

     echo "<header><h3>EDIT ALBUM </h3></header>

          <form method=POST enctype='multipart/form-data' action=$aksi?module=album&act=update>
          <input type=hidden name=id value='$r[id_album]'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Judul Album</td><td> : <input type=text name='jdl_album' value='$r[jdl_album]' size=40></td></tr>
          <tr><td>Gambar</td><td>    : <img src='../img_album/kecil_$r[gbr_album]'></td></tr>
          <tr><td>Ganti Gambar</td><td> : <input type=file name='fupload' size=40></td></tr>";
    if ($r[aktif]=='Y'){
      echo "<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }         
    echo "<tr><td colspan=2><input type=submit class=button value=Update>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
