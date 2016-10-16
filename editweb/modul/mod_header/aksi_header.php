<?php
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus header
if ($module=='header' AND $act=='hapus'){
  mysql_query("DELETE FROM header WHERE id_header='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='header' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadHeader($nama_file);
    mysql_query("INSERT INTO header(judul,
                                    url,
                                    tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$_POST[url]',
                                   '$tgl_sekarang',
                                   '$nama_file')");
  }
  else{
    mysql_query("INSERT INTO header(judul,
                                    tgl_posting,
                                    url) 
                            VALUES('$_POST[judul]',
                                   '$tgl_sekarang',
                                   '$_POST[url]')");
  }
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='header' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE header SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]'
                             WHERE id_header = '$_POST[id]'");
  }
  else{
    UploadHeader($nama_file);
    mysql_query("UPDATE header SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]',
                                   gambar    = '$nama_file'   
                             WHERE id_header = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
?>
