<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus blog
if ($module=='blog' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM blog WHERE id_blog='$_GET[id]'"));
  if ($data[gambar]!=''){
  mysql_query("DELETE FROM blog WHERE id_blog='$_GET[id]'");
  unlink("../../../foto_blog/$_GET[namafile]");   
  unlink("../../../foto_blog/small_$_GET[namafile]");
}
else{
     mysql_query("DELETE FROM blog WHERE id_blog='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);
}


// Hapus gambar blog lama
if ($module=='blog' AND $act=='delgambar'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM blog WHERE id_blog='$_GET[id]'"));
  if ($data[gambar]!=''){
  unlink("../../../foto_blog/$_GET[namafile]");   
  unlink("../../../foto_blog/small_$_GET[namafile]");
}
else{
  $r=mysql_fetch_array(mysql_query("SELECT * FROM blog ORDER BY id_blog DESC"));
  echo "<script>window.alert('Tidak gambar yang dihapus!');
        window.location=('../../media.php?module=blog&act=editblog&id=$r[id_blog]')</script>";
  }
  $r=mysql_fetch_array(mysql_query("SELECT * FROM blog ORDER BY id_blog DESC"));
  echo "<script>window.alert('Hapus gambar sukses!');
        window.location=('../../media.php?module=blog&act=editblog&id=$r[id_blog]')</script>";
}


// Input blog
elseif ($module=='blog' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file;
  $size= $_FILES['fupload']['size'];  
  $ukuran_max_foto=1000000; // Dalam bytes
  
  if (empty($lokasi_file)){
        echo "<script>window.alert('Harus ada gambar bertipe *.JPG');
        window.location=('../../media.php?module=blog')</script>";
  }elseif (!($tipe_file =="image/jpeg" OR
        $tipe_file =="image/jpg" OR
		$tipe_file=="image/gif" OR
        $tipe_file=="image/png" OR
        $tipe_file=="image/wbmp" )){
		echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=blog')</script>";
  }elseif($size > $ukuran_max_foto){   
        echo "<script>window.alert('Upload gagal! Ukuran Foto Anda $size bytes lebih dari $ukuran_max_foto bytes, Terlalu Besar! Silahkan dikurangi');
        window.location=('../../media.php?module=blog')</script>";       
  }else{
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
  
  $blog_seo      = seo_title($_POST['nama_blog']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
  // Cek file type
  if (($tipe_file =="image/jpeg" OR
        $tipe_file=="image/gif" OR
        $tipe_file=="image/png" OR
        $tipe_file=="image/wbmp" )){
    Uploadblog($nama_file_unik);

     mysql_query("INSERT INTO blog(judul,
                                    judul_seo,
                                    id_kategoriblog,
                                    username,
                                    isi_blog,
                                    jam,
                                    tanggal,
                                    hari,
                                    tag, 
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$judul_seo',
                                   '$_POST[kategoriblog]',
                                   '$_SESSION[namauser]',
                                   '$_POST[isi_blog]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini',
                                   '$tag',
                                   '$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO blog(judul,
                                    judul_seo, 
                                    id_kategoriblog,
                                    username,
                                    isi_blog,
                                    jam,
                                    tanggal,
                                    tag, 
                                    hari) 
                            VALUES('$_POST[judul]',
                                   '$judul_seo',
                                   '$_POST[kategoriblog]',
                                   '$_SESSION[namauser]',
                                   '$_POST[isi_blog]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$tag',
                                   '$hari_ini')");
  }
  header('location:../../media.php?module='.$module);
}
}
}

// Update blog
elseif ($module=='blog' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  $size= $_FILES['fupload']['size'];  
  $ukuran_max_foto=1000000; // Dalam bytes
  
  if($size > $ukuran_max_foto){   
        echo "<script>window.alert('Upload gagal! Ukuran Foto Anda $size bytes lebih dari $ukuran_max_foto bytes, Terlalu Besar! Silahkan dikurangi');
        window.location=('../../media.php?module=blog')</script>";       
  }else{
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
  

  $blog_seo      = seo_title($_POST['nama_blog']);
  
  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
   mysql_query("UPDATE blog SET judul       = '$_POST[judul]',
                                   judul_seo   = '$judul_seo', 
                                   id_kategoriblog = '$_POST[kategoriblog]',
                                   tag         = '$tag',
                                   isi_blog  = '$_POST[isi_blog]'  
                             WHERE id_blog   = '$_POST[id]'");
  }
  elseif(($tipe_file =="image/jpeg" OR   // Cek file type
        $tipe_file=="image/gif" OR
        $tipe_file=="image/png" OR
        $tipe_file=="image/wbmp" )){
    Uploadblog($nama_file_unik);
mysql_query("UPDATE blog SET judul       = '$_POST[judul]',
                                   judul_seo   = '$judul_seo', 
                                   id_kategoriblog = '$_POST[kategoriblog]',
                                   tag         = '$tag',
                                   isi_blog  = '$_POST[isi_blog]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id_blog   = '$_POST[id]'");
  }
  else{
   $r=mysql_fetch_array(mysql_query("SELECT * FROM blog ORDER BY id_blog DESC"));
  echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, PNG, GIF, BWMP!');
        window.location=('../../media.php?module=blog&act=editblog&id=$r[id_blog]')</script>"; 
  }
  header('location:../../media.php?module='.$module);
}
}

?>
