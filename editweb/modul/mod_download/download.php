<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_download/aksi_download.php";
switch($_GET[act]){
  // Tampil Download
  default:
    echo "<header><h3>EDIT DOWNLOAD KATALOG</h3></header>
           <div class='module_content'><input type=button class='button' value='Tambahkan File Katalog' onclick=location.href='?module=download&act=tambahdownload'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Judul</th><th>Nama File</th><th>Tgl. Posting</th><th>Aksi</th></tr>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM download ORDER BY id_download DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$r[nama_file]</td>
                <td>$tgl</td>
                <td><a href=?module=download&act=editdownload&id=$r[id_download]><img src='images/icn_edit.png' title='Edit'></a>
	                  <a href=$aksi?module=download&act=hapus&id=$r[id_download]><img src='images/icn_trash.png' title='Hapus'></a>
		        </td></tr>";
    $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM download"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br>";    
    break;
  
  case "tambahdownload":
    echo "<header><h3>TAMBAHKAN FILE KATALOG</h3></header>
          <form method=POST action='$aksi?module=download&act=input' enctype='multipart/form-data'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Judul</td><td>  : <input type=text name='judul' size=40></td></tr>
          <tr><td>File</td><td> : <input type=file name='fupload' size=40></td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Simpan>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
     break;
    
  case "editdownload":
    $edit = mysql_query("SELECT * FROM download WHERE id_download='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<header><h3>EDIT FILE KATALOG</h3></header>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=download&act=update>
          <input type=hidden name=id value=$r[id_download]>
           <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Judul</td><td>     : <input type=text name='judul' size=40 value='$r[judul]'></td></tr>
          <tr><td>File</td><td>    : $r[nama_file]</td></tr>
          <tr><td>Ganti File</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila file tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit class='button'  value=Update>
                            <input type=button class='button'  value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
