<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

?>

<script language="javascript">
function validasi(form){
  if (form.nama_propinsi.value == ""){
    alert("Anda belum mengisikan nama Propinsi.");
    form.nama_propinsi.focus();
    return (false);
  }
   return (true);
}
</script>

<?

$aksi="modul/mod_propinsi/aksi_propinsi.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
    echo "<h2>Propinsi</h2>
          <table width=650px><tr><td><span style='float : right;'><input style='width: 100px; height: 25px;' type=button value='Tambah Propinsi' onclick=\"window.location.href='?module=propinsi&act=tambahpropinsi';\"></span></td></tr></table> 
          
          <table width=650px>
          <tr><th>no</th><th>nama propinsi</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 12;
    $posisi = $p->cariPosisi($batas);          
           
    $tampil=mysql_query("SELECT * FROM propinsi ORDER BY id_propinsi ASC LIMIT $posisi,$batas");
 
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
                // Kolom Warna
            if(($no%2)==0){
            $warna="ganjil";
            }else{
            $warna="genap";
            }
            // Kolom Warna 
       echo "<tr class='$warna'>
             <td align=center width=30px>$no</td>
             <td align=left>$r[nama_propinsi]</td>
             <td align=center width=100px><a href=?module=propinsi&act=editpropinsi&id=$r[id_propinsi]><img src='images/edit.gif' border=0 title=Edit></a> 
	               <a href=$aksi?module=propinsi&act=hapus&id=$r[id_propinsi]><img src='images/delete.gif' border=0 title=Hapus></a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    
    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM propinsi"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    
    echo "<table width=650px><tr><td><div id=paging>$linkHalaman</div></td></tr></table>";
    break;
  
  // Form Tambah Propinsi
  case "tambahpropinsi":
    echo "<h2>Tambah Propinsi</h2>
          <form method=POST action='$aksi?module=propinsi&act=input'>
          <table>
          <tr><td>Nama Kategori</td><td> : <input type=text name='nama_propinsi'></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Propinsi  
  case "editpropinsi":
    $edit=mysql_query("SELECT * FROM propinsi WHERE id_propinsi='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit Propinsi</h2>
          <form method=POST action=$aksi?module=propinsi&act=update>
          <input type=hidden name=id value='$r[id_propinsi]'>
          <table>
          <tr><td>Nama Kategori</td><td> : <input type=text name='nama_propinsi' value='$r[nama_propinsi]'></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
