<?php
$aksi="modul/mod_kategori/aksi_kategori.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
    echo "<header><h3>EDIT KATEGORI PRODUK</h3></header>
          <div class='module_content'><input type=button class='button' value='Tambah Kategori' 
          onclick=\"window.location.href='?module=kategori&act=tambahkategori';\">
           <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Nama Kategori</th><th>Aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_kategori]</td>
             <td><a href=?module=kategori&act=editkategori&id=$r[id_kategori]><img src='images/icn_edit.png' title='Edit'></a>  
	         <a href=$aksi?module=kategori&act=hapus&id=$r[id_kategori]><img src='images/icn_trash.png' title='Edit'></a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah Kategori
  case "tambahkategori":
    echo "<header><h3>TAMBAHKAN KATEGORI PRODUK</h3></header>
          <form method=POST action='$aksi?module=kategori&act=input'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Kategori</td><td> : <input type=text name='nama_kategori' size=40></td></tr>
          <tr><td colspan=2><input type=submit name=submit class='button'  value=Simpan>
                            <input type=button class='button'  value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Kategori  
  case "editkategori":
    $edit=mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<header><h3>EDIT KATEGORI PRODUK</h3></header>
          <form method=POST action=$aksi?module=kategori&act=update>
          <input type=hidden name=id value='$r[id_kategori]'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Kategori</td><td> : <input type=text name='nama_kategori' value='$r[nama_kategori]' size=40></td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Update>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
