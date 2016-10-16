<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_logo/aksi_logo.php";
switch($_GET[act]){
  // Tampil logo
  default:
    echo "<header><h3>GANTI LOGO WEBSITE</h3></header>
         
        <div class='module_content'>
          <table id='rounded-corner'>
        <tr><th>Logo Terpasang</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM logo ORDER BY id_logo DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr>
                <td align=left><img height=65 src='../logo/$r[gambar]'></td>
                <td><a href=?module=logo&act=editlogo&id=$r[id_logo]>
				<img src='images/icn_gantilogo.png' title='Ganti Logo'></a>

		        </td></tr>";
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambahlogo":
    echo "<h2>Tambah logo</h2>
          <form method=POST action='$aksi?module=logo&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Judul</td><td>  : <input type=text name='judul' size=30></td></tr>
          <tr><td>Url</td><td>   : <input type=text name='url' size=50 value='http://'></td></tr>
          <tr><td>Gambar</td><td> : <input type=file name='fupload' size=40></td></tr>
          <tr><td colspan=2><input type=submit class=button value=Simpan>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
     break;
    
  case "editlogo":
    $edit = mysql_query("SELECT * FROM logo WHERE id_logo='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<header><h3>GANTI LOGO WEBSITE</h3></header>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=logo&act=update>
          <input type=hidden name=id value=$r[id_logo]>
          <div class='module_content'>
          <table id='rounded-corner'>
         
         
          <tr><td>Logo Terpasang</td><td>    : <img src='../logo/$r[gambar]'></td></tr>
          <tr><td>Ganti Logo</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Maksimal ukuran tinggi (height) gambar 96px. Apabila gambar tidak diubah, dikosongkan saja..</td></tr>
          <tr><td colspan=2><input type=submit class=button value=Update>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
