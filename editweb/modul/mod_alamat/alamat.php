<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_alamat/aksi_alamat.php";
switch($_GET[act]){
  // Tampil Alamat
  default:
    $sql  = mysql_query("SELECT * FROM mod_alamat WHERE id_alamat ");
    $r    = mysql_fetch_array($sql);

    echo "<header><h3>EDIT KONTAK KAMI</h3></header>
          <form method=POST action=$aksi?module=alamat&act=update>
          <input type=hidden name=id value=$r[id_alamat]>
         <div class='module_content'>
          <table id='rounded-corner'>
         <tr><td><textarea name='alamat' style='width: 650px; height: 350px;'>$r[alamat]</textarea></td></tr>
         <tr><td><input type=submit class=button value=Update></td></tr>
         </form></table>";
    break;  
}
}
?>