<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_templates/aksi_templates.php";
switch($_GET[act]){
  // Tampil Templates
  default:
    echo "<header><h3>GANTI TEMPLATE WEB</h3></header>
          <div class='module_content'><input type=button class=button value='Tambah Template Web' 
          onclick=\"window.location.href='?module=templates&act=tambahtemplates';\">
           <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Nama Template</th><th>Pembuat</th><th>Folder</th><th>Aktif</th><th>Aksi</th></tr>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM templates ORDER BY id_templates DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$r[pembuat]</td>
                <td>$r[folder]</td>
                <td width=5 align=center>$r[aktif]</td>
                <td><a href=?module=templates&act=edittemplates&id=$r[id_templates]>
				<img src='images/icn_edit.png' title='Edit'></a>
	                  <a href=$aksi?module=templates&act=aktifkan&id=$r[id_templates]>
					  <img src='images/icn_aktif.png' title='Aktifkan'></a>
		        </td></tr>";
      $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM templates"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br>";
    break;
  
  
  // Form Tambah Templates
  case "tambahtemplates":
    echo "<header><h3>TAMBAH TEMPLATE WEB</h3></header>
          <form method=POST action='$aksi?module=templates&act=input'>
           <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Templates</td><td> : <input type=text name='judul'></td></tr>
          <tr><td>Pembuat</td><td> : <input type=text name='pembuat'></td></tr>
          <tr><td>Folder</td><td> : <input type=text name='folder' value='templates/'></td></tr>
          <tr><td colspan=2><input type=submit class=button  name=submit value=Simpan>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Templates 
  case "edittemplates":
    $edit=mysql_query("SELECT * FROM templates WHERE id_templates='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<header><h3>EDIT TEMPLATE WEB</h3></header>
          <form method=POST action=$aksi?module=templates&act=update>
          <input type=hidden name=id value='$r[id_templates]'>
           <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Templates</td><td> : <input type=text name='judul' value='$r[judul]'></td></tr>
          <tr><td>Pembuat</td><td> : <input type=text name='pembuat' value='$r[pembuat]' disabled></td></tr>
          <tr><td>Folder</td><td> : <input type=text name='folder' value='$r[folder]'></td></tr>
          <tr><td colspan=2><input type=submit class=button value=Update>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
