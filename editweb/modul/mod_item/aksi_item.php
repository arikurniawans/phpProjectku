<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus sub menu
if ($module=='submenu' AND $act=='hapus'){
  mysql_query("DELETE FROM subitem WHERE id_item='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input sub menu
elseif ($module=='subitem' AND $act=='input'){
    mysql_query("INSERT INTO subitem(nama_item,
                                    id_sub,
                                    link_item) 
                            VALUES('$_POST[nama_item]',
                                   '$_POST[sub_menu]',
                                   '$_POST[link_item]')");
  header('location:../../media.php?module='.$module);
}

// Update sub menu
elseif ($module=='subitem' AND $act=='update'){
    mysql_query("UPDATE subitem SET nama_item  = '$_POST[nama_item]',
                                   id_sub = '$_POST[sub_menu]',
                                   link_item  = '$_POST[link_item]'  
                             WHERE id_item   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
