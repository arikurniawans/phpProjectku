<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_subkategori/aksi_subkategori.php";
switch($_GET[act]){
  // Tampil Sub Menu
  default:
    echo "<header><h3>EDIT SUB KATEGORI</h3></header>
          <div class='module_content'><input type=button class='button' value='Tambahkan Sub Kategori' onclick=\"window.location.href='?module=subkategori&act=tambahsubkategori';\">
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Sub Kategori</th><th>Kategori</th><th>Link Subkategori</th><th>Aksi</th></tr>";

    $tampil = mysql_query("SELECT * FROM subkategori,kategori WHERE subkategori.id_kategori=kategori.id_kategori");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[nama_subkategori]</td>
                <td>$r[nama_kategori]</td>
                <td>$r[link_subkategori]</td>
 <td><a href=?module=subkategori&act=editsubkategori&id=$r[id_subkategori]><img src='images/icn_edit.png' title='Edit'></a>  
		                <a href=$aksi?module=subkategori&act=hapus&id=$r[id_subkategori]><img src='images/icn_trash.png' title='Edit'></a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  case "tambahsubkategori":
    echo "<header><h3>TAMBAHKAN SUB KATEGORI</h3></header>
          <form method=POST action='$aksi?module=subkategori&act=input'>
           <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Sub Kategori</td>     <td> : <input type=text name='nama_subkategori' size=40></td></tr>
          <tr><td>Kategori</td>  <td> : 
          <select name='kategori'>
            <option value=0 selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select></td></tr>
          <tr><td>Link Sub Kategori</td><td> : <input type=text name='link_subkategori' size=40></td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Simpan>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "editsubkategori":
    $edit = mysql_query("SELECT * FROM subkategori WHERE id_subkategori='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<header><h3>EDIT SUB KATEGORI</h3></header>
          <form method=POST action=$aksi?module=subkategori&act=update>
          <input type=hidden name=id value=$r[id_subkategori]>
            <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td width=70>Sub Kategori</td>     <td> : <input type=text name='nama_subkategori' value='$r[nama_subkategori]' size=40></td></tr>
          <tr><td>Kategori</td>  <td> : <select name='kategori'>";
 
          $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kategori]==$w[id_kategori]){
              echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td width=170>Link Sub Kategori</td><td> : <input type=text name='link_subkategori' value='$r[link_subkategori]' size=40></td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Update>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
}
?>
