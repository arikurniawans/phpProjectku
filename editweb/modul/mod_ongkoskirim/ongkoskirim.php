<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_ongkoskirim/aksi_ongkoskirim.php";
switch($_GET[act]){
  // Tampil Ongkos Kirim
  default:
    echo "<header><h3>EDIT ONGKOS KIRIM</h3></header>
           <div class='module_content'><input type=button class='button' value='Tambah Ongkos Kirim' 
          onclick=\"window.location.href='?module=ongkoskirim&act=tambahongkoskirim';\">
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Nama Kota</th><th>Jasa Pengiriman</th><th>Ongkos Kirim</th><th>Aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM kota,shop_pengiriman where kota.id_perusahaan=shop_pengiriman.id_perusahaan ORDER BY shop_pengiriman.nama_perusahaan,kota.id_kota DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       $ongkos = format_rupiah($r[ongkos_kirim]);
       echo "<tr><td>$no</td>
             <td>$r[nama_kota]</td>
	     <td>$r[nama_perusahaan]</td>
             <td align=left>$ongkos</td>
             <td><a href=?module=ongkoskirim&act=editongkoskirim&id=$r[id_kota]><img src='images/icn_edit.png' title='Edit'></a>
	               <a href=$aksi?module=ongkoskirim&act=hapus&id=$r[id_kota]><img src='images/icn_trash.png' title='Hapus'></a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah Ongkos Kirim
  case "tambahongkoskirim":
    echo "<header><h3>TAMBAH ONGKOS KIRIM</h3></header>
          <form method=POST action='$aksi?module=ongkoskirim&act=input'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Kota</td><td> : <input type=text name='nama_kota' size=40></td></tr>
          <tr><td>Ongkos Kirim</td><td> : <input type=text name='ongkos_kirim' size=12></td></tr>
	  <tr><td>Jasa Pengiriman</td>  <td> : 
          <select name='perusahaan'>
            <option value='' selected>- Pilih Jasa Pengiriman -</option>";
            $tampil=mysql_query("SELECT * FROM shop_pengiriman ORDER BY nama_perusahaan");
            while($r=mysql_fetch_array($tampil)){
                echo "<option value=$r[id_perusahaan]>$r[nama_perusahaan]</option>";
            }
    echo "</select></td></tr>
          <tr><td colspan=2><input type=submit name=submit class='button' value=Simpan>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Ongkos Kirim
  case "editongkoskirim":
    $edit=mysql_query("SELECT * FROM kota,shop_pengiriman where kota.id_perusahaan=shop_pengiriman.id_perusahaan AND kota.id_kota='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<header><h3>EDIT ONGKOS KIRIM</h3></header>
          <form method=POST action=$aksi?module=ongkoskirim&act=update>
          <input type=hidden name=id value='$r[id_kota]'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Kota</td><td> : <input type=text name='nama_kota' value='$r[nama_kota]' size=40></td></tr>
          <tr><td>Ongkos Kirim</td><td> : <input type=text name='ongkos_kirim' value='$r[ongkos_kirim]' size=12></td></tr>
          <tr><td>Jasa Pengiriman</td>  <td> : 
          <select name='perusahaan'>
            <option value='' value=$r[id_perusahaan]>$r[nama_perusahaan]</option>";
            $tampil=mysql_query("SELECT * FROM shop_pengiriman ORDER BY nama_perusahaan");
            while($r2=mysql_fetch_array($tampil)){
                echo "<option value=$r2[id_perusahaan]>$r2[nama_perusahaan]</option>";
            }
    echo "</select></td></tr>
	  <tr><td colspan=2><input type=submit class='button' value=Update>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
