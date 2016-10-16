<?php
include "../config/koneksi.php";

if ($_SESSION[leveluser]=='admin'){
  $sql=mysql_query("select * from modul where aktif='Y' order by urutan");
}
elseif ($_SESSION['leveluser']=='user'){
  $sql=mysql_query("select * from modul where status='user' and aktif='Y' order by urutan"); 

} 
if ($m=mysql_fetch_array($sql)){  
echo "<li><a href='?module=menuutama'><b>Edit Menu Utama</b></a></li>";
echo "<li><a href='?module=submenu'><b>Edit Sub Menu Level 1</b></a></li>";
echo "<li><a href='?module=subitem'><b>Edit Sub Menu Level 2</b></a></li>";
echo "<li><a href='?module=profil'><b>Edit Profil</b></a></li>"; 
echo "<li><a href='?module=welcome'><b>Edit Selamat Datang</b></a></li>"; 
echo "<li><a href='?module=option'><b>Edit Nama Toko</b></a></li>"; 
echo "<li><a href='?module=produk'><b>Tambah Produk</b></a></li>"; 
echo "<li><a href='?module=kategori'><b>Tambah Kategori Produk</b></a></li>"; 
echo "<li><a href='?module=subkategori'><b>Tambah Sub Kategori</b></a></li>"; 
echo "<li><a href='?module=blog'><b>NgeBlog</b></a></li>";
echo "<li><a href='?module=kategoriblog'><b>Tambah Kategori Blog</b></a></li>"; 
echo "<li><a href='?module=tag'><b>Edit Tag Blog</b></a></li>";
echo "<li><a href='?module=komentar'><b>Lihat Komentar Blog</b></a></li>";
echo "<li><a href='?module=carabeli'><b>Edit Cara Pembelian</b></a></li>"; 
echo "<li><a href='?module=order'><b>Lihat Order Masuk</b></a></li>"; 
echo "<li><a href='?module=hubungi'><b>Lihat Pesan Masuk</b></a></li>"; 
echo "<li><a href='?module=ongkoskirim'><b>Edit Ongkos Kirim</b></a></li>"; 
echo "<li><a href='?module=jasapengiriman'><b>Edit Jasa Pengiriman</b></a></li>"; 
echo "<li><a href='?module=download'><b>Edit Downnload Katalog</b></a></li>"; 
echo "<li><a href='?module=halamanstatis'><b>Membuat Halaman Baru</b></a></li>"; 

}
?>
