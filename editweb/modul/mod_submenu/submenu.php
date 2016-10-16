<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_submenu/aksi_submenu.php";
switch($_GET[act]){
  // Tampil Sub Menu
  default:
    echo "<header><h3>EDIT SUB MENU LEVEL 1</h3></header>
          <div class='module_content'><input type=button class='button' value='Tambahkan Sub Menu Level 1' onclick=\"window.location.href='?module=submenu&act=tambahsubmenu';\">
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Sub Menu</th><th>Menu Utama</th><th>Link Submenu</th><th>Aksi</th></tr>";

    $tampil = mysql_query("SELECT * FROM submenu,mainmenu WHERE submenu.id_main=mainmenu.id_main");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[nama_sub]</td>
                <td>$r[nama_menu]</td>
                <td>$r[link_sub]</td>
		            <td><a href=?module=submenu&act=editsubmenu&id=$r[id_sub]><img src='images/icn_edit.png' title='Edit'></a>  
		                <a href=$aksi?module=submenu&act=hapus&id=$r[id_sub]><img src='images/icn_trash.png' title='Edit'></a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  case "tambahsubmenu":
    echo "<header><h3>TAMBAHKAN SUB MENU LEVEL 1</h3></header>
          <form method=POST action='$aksi?module=submenu&act=input'>
           <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Sub Menu</td>     <td> : <input type=text name='nama_sub' size=40></td></tr>
          <tr><td>Menu Utama</td>  <td> : 
          <select name='menu_utama'>
            <option value=0 selected>- Pilih Menu Utama -</option>";
            $tampil=mysql_query("SELECT * FROM mainmenu ORDER BY nama_menu");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_main]>$r[nama_menu]</option>";
            }
    echo "</select></td></tr>
          <tr><td>Link Sub Menu</td><td> : <input type=text name='link_sub' size=40></td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Simpan>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "editsubmenu":
    $edit = mysql_query("SELECT * FROM submenu WHERE id_sub='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<header><h3>EDIT SUB MENU LEVEL 1</h3></header>
          <form method=POST action=$aksi?module=submenu&act=update>
          <input type=hidden name=id value=$r[id_sub]>
            <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td >Sub Menu</td>     <td> : <input type=text name='nama_sub' value='$r[nama_sub]' size=40></td></tr>
          <tr><td>Menu Utama</td>  <td> : <select name='menu_utama'>";
 
          $tampil=mysql_query("SELECT * FROM mainmenu ORDER BY nama_menu");
          if ($r[id_main]==0){
            echo "<option value=0 selected>- Pilih Menu Utama -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_main]==$w[id_main]){
              echo "<option value=$w[id_main] selected>$w[nama_menu]</option>";
            }
            else{
              echo "<option value=$w[id_main]>$w[nama_menu]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td width=90>Link Sub Menu</td><td> : <input type=text name='link_sub' value='$r[link_sub]' size=40></td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Update>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
}
?>
