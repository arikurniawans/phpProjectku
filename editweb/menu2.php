<?php
include "../config/koneksi.php";

if ($_SESSION[leveluser]=='admin'){
  $sql=mysql_query("select * from modul where aktif='Y' order by urutan");
}

if ($m=mysql_fetch_array($sql)){  



echo "<li><a href='?module=album'><b>Edit Album Foto</b></a></li>";
echo "<li><a href='?module=galerifoto'><b>Edit Galeri Foto</b></a></li>";
echo "<li><a href='?module=logo'><b>Ganti Logo Website</b></a></li>";
echo "<li><a href='?module=header'><b>Ganti Header</b></a></li>";
echo "<li><a href='?module=templates'><b>Ganti Template Web</b></a></li>";
echo "<li><a href='?module=testimoni'><b>Lihat Testimoni</b></a></li>";
echo "<li><a href='?module=alamat'><b>Edit Kontak Kami</b></a></li>";
echo "<li><a href='?module=ym'><b>Edit Layanan Pelanggan</b></a></li>";
echo "<li><a href='?module=bank'><b>Edit Rekening Bank</b></a></li>";
echo "<li><a href='?module=banner'><b>Edit Link Terkait</b></a></li>";
echo "<li><a href='?module=sekilasinfo'><b>Edit Sekilas Info</b></a></li>";
echo "<li><a href='?module=poling'><b>Edit Polling</b></a></li>";
  
  
}
?>
