<?php
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Update cara pembelian
if ($module=='alamat' AND $act=='update'){
  mysql_query("UPDATE mod_alamat SET alamat = '$_POST[alamat]'
                            WHERE id_alamat     = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
