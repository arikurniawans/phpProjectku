<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus kategoriblog
if ($module=='kategoriblog' AND $act=='hapus'){
  mysql_query("DELETE FROM kategoriblog WHERE id_kategoriblog='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input kategoriblog
elseif ($module=='kategoriblog' AND $act=='input'){
  $kategoriblog_seo = seo_title($_POST['nama_kategoriblog']);
  mysql_query("INSERT INTO kategoriblog(nama_kategoriblog,kategoriblog_seo) VALUES('$_POST[nama_kategoriblog]','$kategoriblog_seo')");
  header('location:../../media.php?module='.$module);
}

// Update kategoriblog
elseif ($module=='kategoriblog' AND $act=='update'){
  $kategoriblog_seo = seo_title($_POST['nama_kategoriblog']);
  mysql_query("UPDATE kategoriblog SET nama_kategoriblog = '$_POST[nama_kategoriblog]', kategoriblog_seo='$kategoriblog_seo' WHERE id_kategoriblog = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
