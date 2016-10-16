<?php
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus logo
if ($module=='logo' AND $act=='hapus'){
  mysql_query("DELETE FROM logo WHERE id_logo='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input logo
elseif ($module=='logo' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    Uploadlogo($nama_file);
    mysql_query("INSERT INTO logo(judul,
                                    url,
                                    tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$_POST[url]',
                                   '$tgl_sekarang',
                                   '$nama_file')");
  }
  else{
    mysql_query("INSERT INTO logo(judul,
                                    tgl_posting,
                                    url) 
                            VALUES('$_POST[judul]',
                                   '$tgl_sekarang',
                                   '$_POST[url]')");
  }
  header('location:../../media.php?module='.$module);
}

// Update logo
elseif ($module=='logo' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE logo SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]'
                             WHERE id_logo = '$_POST[id]'");
  }
  else{
    Uploadlogo($nama_file);
    mysql_query("UPDATE logo SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]',
                                   gambar    = '$nama_file'   
                             WHERE id_logo = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
?>
