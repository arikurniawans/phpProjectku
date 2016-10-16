<?php
$aksi="modul/mod_kategoriblog/aksi_kategoriblog.php";
switch($_GET[act]){
  // Tampil kategoriblog
  default:
    echo "<header><h3>EDIT KATEGORI BLOG</h3></header>
          <div class='module_content'><input type=button class='button' value='Tambah Kategori' 
          onclick=\"window.location.href='?module=kategoriblog&act=tambahkategoriblog';\">
           <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Nama Kategori</th><th>Aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM kategoriblog ORDER BY id_kategoriblog DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_kategoriblog]</td>
             <td><a href=?module=kategoriblog&act=editkategoriblog&id=$r[id_kategoriblog]><img src='images/icn_edit.png' title='Edit'></a>  
	         <a href=$aksi?module=kategoriblog&act=hapus&id=$r[id_kategoriblog]><img src='images/icn_trash.png' title='Edit'></a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah kategoriblog
  case "tambahkategoriblog":
    echo "<header><h3>TAMBAHKAN KATEGORI BLOG</h3></header>
          <form method=POST action='$aksi?module=kategoriblog&act=input'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Kategori</td><td> : <input type=text name='nama_kategoriblog' size=40></td></tr>
          <tr><td colspan=2><input type=submit name=submit class='button'  value=Simpan>
                            <input type=button class='button'  value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit kategoriblog  
  case "editkategoriblog":
    $edit=mysql_query("SELECT * FROM kategoriblog WHERE id_kategoriblog='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<header><h3>EDIT KATEGORI BLOG</h3></header>
          <form method=POST action=$aksi?module=kategoriblog&act=update>
          <input type=hidden name=id value='$r[id_kategoriblog]'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Kategori</td><td> : <input type=text name='nama_kategoriblog' value='$r[nama_kategoriblog]' size=40></td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Update>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
