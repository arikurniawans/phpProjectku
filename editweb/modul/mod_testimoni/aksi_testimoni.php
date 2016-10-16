<?php
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus hubungi
if ($module=='testimoni' AND $act=='hapus'){
  mysql_query("DELETE FROM testimoni WHERE id_testimoni='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
?>
