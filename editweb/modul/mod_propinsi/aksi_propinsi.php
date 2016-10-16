<?php
session_start();
include "../../../config/koneksi.php";
//include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Kategori
if ($module=='propinsi' AND $act=='hapus'){
  mysql_query("DELETE FROM propinsi WHERE id_propinsi='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input propinsi
elseif ($module=='propinsi' AND $act=='input'){
//  $propinsi_seo = seo_title($_POST['nama_propinsi']);
  mysql_query("INSERT INTO propinsi(nama_propinsi) VALUES('$_POST[nama_propinsi]')");
  header('location:../../media.php?module='.$module);
}

// Update propinsi
elseif ($module=='propinsi' AND $act=='update'){
//  $propinsi_seo = seo_title($_POST['nama_propinsi']);
  mysql_query("UPDATE propinsi SET nama_propinsi = '$_POST[nama_propinsi]' WHERE id_propinsi = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
