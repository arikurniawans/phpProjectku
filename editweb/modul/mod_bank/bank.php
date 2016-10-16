<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_bank/aksi_bank.php";
switch($_GET[act]){
  // Tampil Bank
  default:
    echo "<header><h3>REKENING BANK PEMBAYARAN</h3></header>
          <div class='module_content'><input type=button class=button value='Tambah Rekening Bank' onclick=location.href='?module=bank&act=tambahbank'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Nama Bank</th><th>Nomer Rekening</th><th>Nama Pemilik</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM mod_bank ORDER BY id_bank DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td align=left>$no</td>
                <td align=left><img src='../foto_banner/$r[gambar]'></td>
                <td>$r[no_rekening]</td>
                <td>$r[pemilik]</td>
                <td align=left><a href=?module=bank&act=editbank&id=$r[id_bank]><img src='images/icn_edit.png' title='Edit'></a> 
	                  <a href=$aksi?module=bank&act=hapus&id=$r[id_bank]><img src='images/icn_trash.png' title='Hapus'></a>

		        </td></tr>";
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambahbank":
    echo "<header><h3>TAMBAHKAN REKENING BANK PEMBAYARAN</h3></header>
          <form method=POST action='$aksi?module=bank&act=input' enctype='multipart/form-data'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Bank</td><td>  : <input type=text name='nama_bank' size=30></td></tr>
          <tr><td>No. Rekening</td><td>   : <input type=text name='no_rekening' size='50'></td></tr>
          <tr><td>Nama Pemilik</td><td>   : <input type=text name='pemilik' size='50'></td></tr>          
          <tr><td>Ganti Gambar</td><td> : <input type=file name='fupload' size=40></td></tr>
          <tr><td colspan=2><input type=submit class=button value=Simpan>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
     break;
    
  case "editbank":
    $edit = mysql_query("SELECT * FROM mod_bank WHERE id_bank='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<header><h3>EDIT REKENING BANK PEMBAYARAN</h3></header>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=bank&act=update>
          <input type=hidden name=id value=$r[id_bank]>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Bank</td><td>     : <input type=text name='nama_bank' size=30 value='$r[nama_bank]'></td></tr>
          <tr><td>No. Rekening</td><td>      : <input type=text name='no_rekening' size=50 value='$r[no_rekening]'></td></tr>
          <tr><td>Nama Pemilik</td><td>      : <input type=text name='pemilik' size=50 value='$r[pemilik]'></td></tr>
          <tr><td>Gambar</td><td>    : <img src='../foto_banner/$r[gambar]'></td></tr>
          <tr><td>Ganti Gambar</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit class=button value=Update>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
