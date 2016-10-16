<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM users ORDER BY username");
      echo "<header><h3>MANAJEMEN USER ADMIN</h3></header>
           <div class='module_content'><input type=button class=button value='Tambahkan User' 
		  onclick=\"window.location.href='?module=user&act=tambahuser';\">";
    }
    else{
      $tampil=mysql_query("SELECT * FROM users 
                           WHERE username='$_SESSION[namauser]'");
      echo "<h2>User</h2>";
    }
    
    echo " <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Username</th><th>Nama lengkap</th><th>Email</th><th>No.Telp/HP</th><th>Blokir</th><th>Aksi</th></tr>"; 
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[username]</td>
             <td>$r[nama_lengkap]</td>
		         <td><a href=mailto:$r[email]>$r[email]</a></td>
		         <td>$r[no_telp]</td>
		         <td align=center>$r[blokir]</td>
             <td><a href=?module=user&act=edituser&id=$r[id_session]><img src='images/icn_edit.png' title='Edit'></a></td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  case "tambahuser":
    if ($_SESSION[leveluser]=='admin'){
    echo "<header><h3>TAMBAHKAN USER</h3></header>
          <form method=POST action='$aksi?module=user&act=input'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Username</td>     <td> : <input type=text name='username'></td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'></td></tr>
          <tr><td>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30></td></tr>  
          <tr><td>E-mail</td>       <td> : <input type=text name='email' size=30></td></tr>
          <tr><td>No.Telp/HP</td>   <td> : <input type=text name='no_telp' size=20></td></tr>
          <tr><td colspan=2><input type=submit class=button value=Simpan>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM users WHERE id_session='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin'){
    echo "<header><h3>EDIT USER</h3></header>
          <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_session]'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Username</td>     <td> : <input type=text name='username' value='$r[username]' disabled> **)</td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'> *) </td></tr>
          <tr><td>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>
          <tr><td>E-mail</td>       <td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td>No.Telp/HP</td>   <td> : <input type=text name='no_telp' size=30 value='$r[no_telp]'></td></tr>";

    if ($r[blokir]=='N'){
      echo "<tr><td>Blokir</td>     <td> : <input type=radio name='blokir' value='Y'> Y   
                                           <input type=radio name='blokir' value='N' checked> N </td></tr>";
    }
    else{
      echo "<tr><td>Blokir</td>     <td> : <input type=radio name='blokir' value='Y' checked> Y  
                                          <input type=radio name='blokir' value='N'> N </td></tr>";
    }
    
    echo "<tr><td colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.</td></tr>
          <tr><td colspan=2><input type=submit class=button value=Update>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    }
    else{
    echo "<h2>Edit User</h2>
          <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_session]'>
          <input type=hidden name=blokir value='$r[blokir]'>
          <table>
          <tr><td>Username</td>     <td> : <input type=text name='username' value='$r[username]' disabled> **)</td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'> *) </td></tr>
          <tr><td>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>
          <tr><td>E-mail</td>       <td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td>No.Telp/HP</td>   <td> : <input type=text name='no_telp' size=30 value='$r[no_telp]'></td></tr>";    
    echo "<tr><td colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.</td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    }
    break;  
}
}
?>
