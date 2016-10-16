<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_tag/aksi_tag.php";
switch($_GET[act]){
  // Tampil Tag
  default:
    echo "<header><h3>TAG BLOG</h3></header>
	 <div class='module_content'>
          <input type=button class=button value='Tambah Tag' 
          onclick=\"window.location.href='?module=tag&act=tambahtag';\">
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>no</th><th>nama tag</th><th>aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM tag ORDER BY id_tag DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_tag]</td>
             <td><a href=?module=tag&act=edittag&id=$r[id_tag]><img src='images/icn_edit.png' title='Edit'></a>  
	               <a href=$aksi?module=tag&act=hapus&id=$r[id_tag]><img src='images/icn_trash.png' title='Edit'></a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah Tag
  case "tambahtag":
   echo "<header><h3>TAMBAH TAG BLOG</h3></header>
          <form method=POST action='$aksi?module=tag&act=input'>
         <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Tag</td><td> : <input type=text name='nama_tag' SIZE=30></td></tr>
          <tr><td colspan=2><input type=submit name=submit class=button  value=Simpan>
                            <input type=button class=button  value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Kategori  
  case "edittag":
    $edit=mysql_query("SELECT * FROM tag WHERE id_tag='$_GET[id]'");
    $r=mysql_fetch_array($edit);

  echo "<header><h3>EDIT TAG BLOG</h3></header>
          <form method=POST action=$aksi?module=tag&act=update>
          <input type=hidden name=id value='$r[id_tag]'>
        <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Tag</td><td> : <input type=text name='nama_tag' value='$r[nama_tag]' size=30></td></tr>
          <tr><td colspan=2><input type=submit class=button value=Update>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
