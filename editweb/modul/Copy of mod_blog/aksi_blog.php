<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

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

// Input blog
elseif ($module=='blog' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  if (!empty($_POST[tag_seo])){
    $tag_seo = $_POST[tag_seo];
    $tag=implode(',',$tag_seo);
  }
  $judul_seo      = seo_title($_POST['judul']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
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
  
  $jml=count($tag_seo);
  for($i=0;$i<$jml;$i++){
    mysql_query("UPDATE tag SET count=count+1 WHERE tag_seo='$tag_seo[$i]'");
  }
  header('location:../../media.php?module='.$module);
}

// Update blog
elseif ($module=='blog' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  if (!empty($_POST[tag_seo])){
    $tag_seo = $_POST[tag_seo];
    $tag=implode(',',$tag_seo);
  }

  $judul_seo      = seo_title($_POST['judul']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE blog SET judul       = '$_POST[judul]',
                                   judul_seo   = '$judul_seo', 
                                   id_kategoriblog = '$_POST[kategoriblog]',
                                   tag         = '$tag',
                                   isi_blog  = '$_POST[isi_blog]'  
                             WHERE id_blog   = '$_POST[id]'");
  }
  else{
    Uploadblog($nama_file_unik);
    mysql_query("UPDATE blog SET judul       = '$_POST[judul]',
                                   judul_seo   = '$judul_seo', 
                                   id_kategoriblog = '$_POST[kategoriblog]',
                                   tag         = '$tag',
                                   isi_blog  = '$_POST[isi_blog]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id_blog   = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
}
?>
