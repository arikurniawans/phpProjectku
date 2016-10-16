<?php
session_start();
if(!session_is_registered("namauser")){
  echo"<meta http-equiv=\"refresh\" content=\"0; URL=../../index.php\" />";
}else{

?>

<script language="javascript">
function validasi(form){
  if (form.nama_perusahaan.value == ""){
    alert("Anda belum mengisikan nama kategori produknya.");
    form.nama_kategori.focus();
    return (false);
  }
   return (true);
}
</script>

<?

$aksi="modul/mod_pengiriman/aksi_pengiriman.php";
$module=$_GET['module'];

switch($_GET['act']){
  // Tampil Kategori
  default:
    echo "<header><h3>EDIT JASA PENGIRIMAN</h3></header>
           <div class='module_content'><input type=button class='button' value='Tambah Perusahaan Jasa Pengiriman' 
          onclick=\"window.location.href='?module=$module&act=tambahperusahaan';\">";
    // Cek jikalau data dalam database kosong
    // Jika kosong
    $tampil2 = mysql_query("SELECT * FROM shop_pengiriman");
    $r2=mysql_fetch_array($tampil2);
    if($r2['id_perusahaan']==0){
		echo"";
		
    }else{
            // Jika tidak kosong
            
              echo"<div class='module_content'>
          <table id='rounded-corner'>
              <tr><th>No</th><th>Nama Perusahaan</th><th>Aksi</th></tr>"; 
        $tampil=mysql_query("SELECT * FROM shop_pengiriman ORDER BY id_perusahaan DESC");
        $no=1;
        while ($r=mysql_fetch_array($tampil)){
            
            // Kolom Warna
            if(($no%2)==0){
            $warna="ganjil";
            }else{
            $warna="genap";
            }
            // Kolom Warna
            
           echo "<tr class='$warna'><td>$no</td>
                 <td>$r[nama_perusahaan]</td>
                 <td><a href=?module=$module&act=editperusahaan&id=$r[id_perusahaan]>
				 <img src='images/icn_edit.png' title='Edit'></a>
    	         <a href=$aksi?module=$module&act=hapus&id=$r[id_perusahaan]&namafile=$r[gambar]>
				 <img src='images/icn_trash.png' title='Hapus'></a>

                 </td></tr>";
          $no++;
        }
        echo "</table>";
    }
    break;
  
  // Form Tambah Perusahaan Pengiriman
  case "tambahperusahaan":
    echo "<header><h3>TAMBAH JASA PENGIRIMAN</h3></header>
          <form method=POST action='$aksi?module=$module&act=input' enctype='multipart/form-data' onSubmit=\"return validasi(this)\">
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Perusahaan</td><td> : <input type=text name='nama_perusahaan' size=40></td></tr>
          <tr><td colspan=2><input type=submit class='button' name=submit value=Simpan>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Perusahaan Pengiriman  
  case "editperusahaan":
    $edit=mysql_query("SELECT * FROM shop_pengiriman WHERE id_perusahaan='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<header><h3>EDIT JASA PENGIRIMAN</h3></header>
          <form method=POST action=$aksi?module=$module&act=update enctype='multipart/form-data' onSubmit=\"return validasi(this)\">
          <input type=hidden name=id value='$r[id_perusahaan]'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td>Nama Perusahaan</td><td> : <input type=text name='nama_perusahaan' value='$r[nama_perusahaan]' size=40></td></tr>
          
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Update>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}

}
?>
