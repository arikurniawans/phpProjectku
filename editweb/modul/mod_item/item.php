<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_item/aksi_item.php";
switch($_GET[act]){
  // Tampil Sub Menu
  default:
   echo "<header><h3>EDIT SUB MENU LEVEL 2</h3></header>
           <div class='module_content'><input type=button class='button' value='Tambahkan Sub Menu Level 2' onclick=\"window.location.href='?module=subitem&act=tambahsubitem';\">
         <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Sub Menu Level 2</th><th>Sub Menu</th><th>Link Submenu Level 2</th><th>Aksi</th></tr>";

    $tampil = mysql_query("SELECT * FROM submenu,subitem WHERE subitem.id_sub=submenu.id_sub");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[nama_item]</td>
                <td>$r[nama_sub]</td>
                <td>$r[link_item]</td>
		  <td><a href=?module=subitem&act=editsubitem&id=$r[id_item]><img src='images/icn_edit.png' title='Edit'></a>  
		  <a href=$aksi?module=subitem&act=hapus&id=$r[id_item]><img src='images/icn_trash.png' title='Edit'></a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  case "tambahsubitem":
   echo "<header><h3>TAMBAHKAN SUB MENU LEVEL 2</h3></header>
          <form method=POST action='$aksi?module=subitem&act=input'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Sub Menu Level 2</td>     <td> : <input type=text name='nama_item' size=30></td></tr>
          <tr><td>Sub Menu</td>  <td> : 
          <select name='sub_menu'>
            <option value=0 selected>- Pilih Sub Menu -</option>";
            $tampil=mysql_query("SELECT * FROM submenu ORDER BY nama_sub");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_sub]>$r[nama_sub]</option>";
            }
    echo "</select></td></tr>
          <tr><td>Link Menu Level 2</td><td> : <input type=text name='link_item' size=30></td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Simpan>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "editsubitem":
    $edit = mysql_query("SELECT * FROM subitem WHERE id_item='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<header><h3>EDIT SUB MENU LEVEL 2</h3></header>
          <form method=POST action=$aksi?module=subitem&act=update>
          <input type=hidden name=id value=$r[id_item]>
         <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td width=70>Sub Menu Level 2</td>     <td> : <input type=text name='nama_item' value='$r[nama_item]' size=30></td></tr>
          <tr><td>Sub Menu</td>  <td> : <select name='sub_menu' >";
 
          $tampil=mysql_query("SELECT * FROM submenu ORDER BY nama_sub");
          if ($r[id_sub]==0){
            echo "<option value=0 selected>- Pilih Sub Menu -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_sub]==$w[id_sub]){
              echo "<option value=$w[id_sub] selected>$w[nama_sub]</option>";
            }
            else{
              echo "<option value=$w[id_sub]>$w[nama_sub]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td width=150>Link Sub Menu Level 2</td><td> : <input type=text name='link_item' value='$r[link_item]' size=30></td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Update>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
}
?>
