<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_menuutama/aksi_menuutama.php";
switch($_GET[act]){
  // Tampil Menu Utama
  default:
    echo "<header><h3>MENU UTAMA</h3></header>
          <div class='module_content'><input type=button class='button' value='Tambahkan Menu Utama' 
          onclick=\"window.location.href='?module=menuutama&act=tambahmenuutama';\">
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Menu Utama</th><th>Link</th><th>Aktif</th><th>Aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM mainmenu");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_menu]</td>
             <td>$r[link]</td>
             <td align=left>$r[aktif]</td>
             <td><a href=?module=menuutama&act=editmenuutama&id=$r[id_main]><img src='images/icn_edit.png' title='Edit'></a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    echo "<div id=paging>*) Data pada Menu tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Menu Utama.</div><br>";
    break;
  
  // Form Tambah Menu Utama
  case "tambahmenuutama":
    echo "<header><h3>TAMBAH MENU UTAMA</h3></header>
          <form method=POST action='$aksi?module=menuutama&act=input'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Menu</td><td> : <input type=text name='nama_menu' size=40></td></tr>
          <tr><td>Link</td><td> : <input type=text name='link' size=40></td></tr>
          <tr><td colspan=2><input type=submit name=submit class='button' value=Simpan>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Menu Utama
  case "editmenuutama":
    $edit=mysql_query("SELECT * FROM mainmenu WHERE id_main='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<header><h3>EDIT MENU UTAMA</h3></header>
          <form method=POST action=$aksi?module=menuutama&act=update>
          <input type=hidden name=id value='$r[id_main]'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Menu</td><td> : <input type=text name='nama_menu' value='$r[nama_menu]' size=40></td></tr>
          <tr><td>Link</td><td> : <input type=text name='link' value='$r[link]' size=40></td></tr>";
    if ($r[aktif]=='Y'){
      echo "<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }

    echo "<tr><td colspan=2><input type=submit class='button'  value=Update>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
