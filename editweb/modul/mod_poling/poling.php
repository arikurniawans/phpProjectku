<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_poling/aksi_poling.php";
switch($_GET[act]){
  // Tampil Modul
  default:
    echo "<header><h3>EDIT POLING</h3></header>
          <div class='module_content'><input type=button class='button' value='Tambahkan Polling' onclick=\"window.location.href='?module=poling&act=tambahpoling';\">
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Pilihan</th><th>Status</th><th>Rating</th><th>Aktif</th><th>Aksi</th></tr>";
          
    $no = 1;
    $tampil=mysql_query("SELECT * FROM poling ORDER BY id_poling DESC");
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr>
            <td>$no</td>
            <td>$r[pilihan]</td>
            <td>$r[status]</td>
            <td align=center>$r[rating]</td>
            <td align=center>$r[aktif]</td>
            <td><a href=?module=poling&act=editpoling&id=$r[id_poling]><img src='images/icn_edit.png' title='Edit'></a>
            </td></tr>";
      $no++;
    }
    echo "</table>";
    break;

  case "tambahpoling":
    echo "<header><h3>TAMBAHKAN POLING</h3></header>
          <form method=POST action='$aksi?module=poling&act=input'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Pilihan</td> <td> : <input type=text name='pilihan' size=50></td></tr>
          <tr><td>Status</td>   <td> : <input type=radio name='status' value='Jawaban' checked>Jawaban 
                                      <input type=radio name='status' value='Pertanyaan'>Pertanyaan  </td></tr>
          <tr><td>Aktif</td>   <td> : <input type=radio name='aktif' value='Y' checked>Y 
                                      <input type=radio name='aktif' value='N'>N  </td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Simpan>
                            <input type=button class='button'  value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
 
  case "editpoling":
    $edit = mysql_query("SELECT * FROM poling WHERE id_poling='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<header><h3>EDIT POLING</h3></header>
          <form method=POST action=$aksi?module=poling&act=update>
          <input type=hidden name=id value='$r[id_poling]'>
         <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Pilihan</td> <td> : <input type=text name='pilihan' value='$r[pilihan]' size=50></td></tr>";
          
    if ($r[aktif]=='Y'){
      echo "<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }

    if ($r[status]=='Jawaban'){
      echo "<tr><td>Status</td> <td> : <input type=radio name='status' value='Jawaban' checked>Jawaban  
                                       <input type=radio name='status' value='Pertanyaan'> Pertanyaan</td></tr>";
    }
    else{
      echo "<tr><td>Status</td> <td> : <input type=radio name='status' value='Jawaban'>Jawaban  
                                      <input type=radio name='status' value='Pertanyaan' checked>Pertanyaan</td></tr>";
    }

    echo "<tr><td colspan=2><input type=submit class='button' value=Update>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
