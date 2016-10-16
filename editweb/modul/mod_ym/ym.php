<?php
$aksi="modul/mod_ym/aksi_ym.php";
switch($_GET[act]){
  // Tampil YM
  default:
    echo "<header><h3>EDIT LAYANAN PELANNGAN</h3></header>
           <div class='module_content'><input type=button class=button value='Tambahkan User YM' 
          onclick=\"window.location.href='?module=ym&act=tambahym';\">
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Nama</th><th>Username</th><th>Aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM mod_ym ORDER BY id DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama]</td>
			 <td>$r[username]</td>
             <td><a href=?module=ym&act=editym&id=$r[id]><img src='images/icn_edit.png' title='Edit'></a>
	               <a href=$aksi?module=ym&act=hapus&id=$r[id]><img src='images/icn_trash.png' title='Hapus'></a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
	echo "";
    break;
  
  // Form Tambah YM
  case "tambahym":
    echo "<header><h3>TAMBAHKAN USER YM</h3></header>
          <form method=POST action='$aksi?module=ym&act=input'>
           <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama</td><td> : <input type=text name='nama' size=25></td></tr>
		  <tr><td>Username</td><td> : <input type=text name='username' size=25></td></tr>
          <tr><td colspan=2><input type=submit name=submit class=button value=Simpan>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit YM  
  case "editym":
    $edit=mysql_query("SELECT * FROM mod_ym WHERE id='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<header><h3>EDIT USER YM</h3></header>
          <form method=POST action=$aksi?module=ym&act=update>
          <input type=hidden name=id value='$r[id]'>
           <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama</td><td> : <input type=text name='nama' value='$r[nama]' size=25></td></tr>
		  <tr><td>Username</td><td> : <input type=text name='username' value='$r[username]' size=25></td></tr>
          <tr><td colspan=2><input type=submit class=button value=Update>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
