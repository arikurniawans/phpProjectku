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
if ($module=='subkategori' AND $act=='hapus'){
  mysql_query("DELETE FROM subkategori WHERE id_subkategori='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input sub menu
elseif ($module=='subkategori' AND $act=='input'){
    mysql_query("INSERT INTO subkategori(nama_subkategori,
                                    id_kategori,
                                    link_subkategori) 
                            VALUES('$_POST[nama_subkategori]',
                                   '$_POST[kategori]',
                                   '$_POST[link_subkategori]')");
  header('location:../../media.php?module='.$module);
}

// Update sub menu
elseif ($module=='subkategori' AND $act=='update'){
    mysql_query("UPDATE subkategori SET nama_subkategori  = '$_POST[nama_subkategori]',
                                   id_kategori= '$_POST[kategori]',
                                   link_subkategori  = '$_POST[link_subkategori]'  
                             WHERE id_subkategori   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
