<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus produk
if ($module=='produk' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM produk WHERE id_produk='$_GET[id]'"));
  if ($data[gambar]!=''){
  mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
  unlink("../../../foto_produk/$_GET[namafile]");   
  unlink("../../../foto_produk/small_$_GET[namafile]");
}
else{
     mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);
}


// Hapus gambar produk lama
if ($module=='produk' AND $act=='delgambar'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM produk WHERE id_produk='$_GET[id]'"));
  if ($data[gambar]!=''){
  unlink("../../../foto_produk/$_GET[namafile]");   
  unlink("../../../foto_produk/small_$_GET[namafile]");
}
else{
  $r=mysql_fetch_array(mysql_query("SELECT * FROM produk ORDER BY id_produk DESC"));
  echo "<script>window.alert('Tidak gambar yang dihapus!');
        window.location=('../../media.php?module=produk&act=editproduk&id=$r[id_produk]')</script>";
  }
  $r=mysql_fetch_array(mysql_query("SELECT * FROM produk ORDER BY id_produk DESC"));
  echo "<script>window.alert('Hapus gambar sukses!');
        window.location=('../../media.php?module=produk&act=editproduk&id=$r[id_produk]')</script>";
}


// Input produk
elseif ($module=='produk' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file;
  $size= $_FILES['fupload']['size'];  
  $ukuran_max_foto=1000000; // Dalam bytes
  
  if (empty($lokasi_file)){
        echo "<script>window.alert('Harus ada gambar bertipe *.JPG');
        window.location=('../../media.php?module=produk')</script>";
  }elseif (!($tipe_file =="image/jpeg" OR
        $tipe_file =="image/jpg" OR
		$tipe_file=="image/gif" OR
        $tipe_file=="image/png" OR
        $tipe_file=="image/wbmp" )){
		echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=produk')</script>";
  }elseif($size > $ukuran_max_foto){   
        echo "<script>window.alert('Upload gagal! Ukuran Foto Anda $size bytes lebih dari $ukuran_max_foto bytes, Terlalu Besar! Silahkan dikurangi');
        window.location=('../../media.php?module=produk')</script>";       
  }else{
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
  
  $produk_seo      = seo_title($_POST['nama_produk']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
  // Cek file type
  if (($tipe_file =="image/jpeg" OR
        $tipe_file=="image/gif" OR
        $tipe_file=="image/png" OR
        $tipe_file=="image/wbmp" )){
    UploadImage($nama_file_unik);

     mysql_query("INSERT INTO produk(nama_produk,
                                    produk_seo,
                                    id_kategori,
                                    berat,
                                    harga,
									diskon,
                                    stok,
                                    deskripsi,
                                    tgl_masuk,
                                    gambar) 
                            VALUES('$_POST[nama_produk]',
                                   '$produk_seo',
                                   '$_POST[kategori]',
                                   '$_POST[berat]',
                                   '$_POST[harga]',
								   '$_POST[diskon]',
                                   '$_POST[stok]',
                                   '$_POST[deskripsi]',
                                   '$tgl_sekarang',
                                   '$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO produk(nama_produk,
                                    produk_seo,
                                    id_kategori,
                                    berat,
                                    harga,
									diskon
                                    stok,
                                    deskripsi,
                                    tgl_posting) 
                            VALUES('$_POST[nama_produk]',
                                   '$produk_seo',
                                   '$_POST[kategori]',
                                   '$_POST[berat]',                                 
                                   '$_POST[harga]',
								   '$_POST[diskon]',
                                   '$_POST[stok]',
                                   '$_POST[deskripsi]',
                                   '$tgl_sekarang')");
  }
  header('location:../../media.php?module='.$module);
}
}
}

// Update produk
elseif ($module=='produk' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  $size= $_FILES['fupload']['size'];  
  $ukuran_max_foto=1000000; // Dalam bytes
  
  if($size > $ukuran_max_foto){   
        echo "<script>window.alert('Upload gagal! Ukuran Foto Anda $size bytes lebih dari $ukuran_max_foto bytes, Terlalu Besar! Silahkan dikurangi');
        window.location=('../../media.php?module=produk')</script>";       
  }else{
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
  

  $produk_seo      = seo_title($_POST['nama_produk']);
  
  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                   produk_seo  = '$produk_seo', 
                                   id_kategori = '$_POST[kategori]',
                                   berat       = '$_POST[berat]',
                                   harga       = '$_POST[harga]',
								   diskon      = '$_POST[diskon]',
                                   stok        = '$_POST[stok]',
                                   deskripsi   = '$_POST[deskripsi]'
                             WHERE id_produk   = '$_POST[id]'");
  }
  elseif(($tipe_file =="image/jpeg" OR   // Cek file type
        $tipe_file=="image/gif" OR
        $tipe_file=="image/png" OR
        $tipe_file=="image/wbmp" )){
    UploadImage($nama_file_unik);
   mysql_query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                   produk_seo  = '$produk_seo', 
                                   id_kategori = '$_POST[kategori]',
                                   berat       = '$_POST[berat]',
                                   harga       = '$_POST[harga]',
                                   diskon      = '$_POST[diskon]',
								   stok        = '$_POST[stok]',
                                   deskripsi   = '$_POST[deskripsi]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id_produk   = '$_POST[id]'");
  }
  else{
   $r=mysql_fetch_array(mysql_query("SELECT * FROM produk ORDER BY id_produk DESC"));
  echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, PNG, GIF, BWMP!');
        window.location=('../../media.php?module=produk&act=editproduk&id=$r[id_produk]')</script>"; 
  }
  header('location:../../media.php?module='.$module);
}
}

?>
