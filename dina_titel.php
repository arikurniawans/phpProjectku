<?php
$module=$_GET['module'];
if($module=='detailproduk'){
	$sql2 = @mysql_query("select nama_produk from produk where id_produk='$_GET[id]'");
	$k   = @mysql_fetch_array($sql2);
	$deskripsi = htmlentities(strip_tags($k['nama_produk']));
}else{
	$deskripsi="$nama_toko";
}
echo"$deskripsi";
?>