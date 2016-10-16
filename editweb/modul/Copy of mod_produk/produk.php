<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_produk/aksi_produk.php";
switch($_GET[act]){
  // Tampil produk
  default:
    echo "<header><h3>TAMBAH PRODUK</h3></header>
	<div class='module_content'>
          <form method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=produk>
         <div id=paging>Pencarian Produk : <input type=text name='kata' value='masukan nama produk' size=35>
		&nbsp;&nbsp;<input type=submit  class=button value=Cari style='width: 50px; height: 25px;'></div> 
          </form><br/>
         <input type=button class='button' value='Tambahkan Produk' onclick=\"window.location.href='?module=produk&act=tambahproduk';\">";

    if (empty($_GET['kata'])){
    echo " <table id='rounded-corner'>
          <tr><th>No</th><th>Nama Produk</th><th>Berat(kg)</th><th>Harga</th><th>Diskon</th><th>Stok</th><th>Tgl. Masuk</th><th>Aksi</th></tr>";
		  
    $p      = new Paging;
    $batas  = 14;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil=mysql_query("SELECT * FROM produk       
                           ORDER BY id_produk DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tgl_masuk]);
      $harga=format_rupiah($r[harga]);
       echo "<tr><td>$no</td>
                <td>$r[nama_produk]</td>
                <td align=center>$r[berat]</td>
                <td>$harga</td>
				<td align=center>$r[diskon]</td>
                <td align=center>$r[stok]</td>
                <td>$tanggal</td>
		        <td><a href=?module=produk&act=editproduk&id=$r[id_produk]><img src='images/icn_edit.png' title='Edit'></a>  
		        <a href=$aksi?module=produk&act=hapus&id=$r[id_produk]><img src='images/icn_trash.png' title='Edit'></a>
				</td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM produk"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

   echo "<div id=paging>Hal: $linkHalaman</div><br>";
 
    break;    
    }
    else{
   echo " <table id='rounded-corner'>
          <tr><th>No</th><th>Nama Produk</th><th>Berat(kg)</th><th>Harga</th><th>Diskon</th><th>Stok</th><th>Tgl. Masuk</th><th>Aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM produk WHERE nama_produk LIKE '%$_GET[kata]%' ORDER BY id_produk DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tgl_masuk]);
      $harga=format_rupiah($r[harga]);
       echo "<tr><td>$no</td>
                <td>$r[nama_produk]</td>
                <td align=center>$r[berat]</td>
                <td>$harga</td>
				<td align=center>$r[diskon]</td>
                <td align=center>$r[stok]</td>
                <td>$tanggal</td>
		        <td><a href=?module=produk&act=editproduk&id=$r[id_produk]><img src='images/icn_edit.png' title='Edit'></a>  
		        <a href=$aksi?module=produk&act=hapus&id=$r[id_produk]><img src='images/icn_trash.png' title='Edit'></a>
				</td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE nama_produk LIKE '%$_GET[kata]%'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

  echo "<div id=paging>Hal: $linkHalaman</div><br>";
 
    break;    
    }
  
 case "tambahproduk":
    echo "<header><h3>TAMBAHKAN PRODUK</h3></header>
          <form method=POST action='$aksi?module=produk&act=input' enctype='multipart/form-data'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td width=70>Nama Produk</td>     <td> : <input type=text name='nama_produk' size=60></td></tr>
          <tr><td>Kategori</td>  <td> : 
          <select name='kategori'>
            <option value=0 selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select></td></tr>
          <tr><td>Berat</td>     <td> : <input type=text name='berat' size=3></td></tr>
          <tr><td>Harga</td>     <td> : <input type=text name='harga' size=10></td></tr>
          <tr><td>diskon</td>     <td> : <input type=text name='diskon' size=3></td></tr>
		  <tr><td>Stok</td>     <td> : <input type=text name='stok' size=3></td></tr>
          <tr><td valign=top>Deskripsi</td>  <td> <textarea name='deskripsi' 
		  style='width: 600px; height: 350px;'></textarea></td></tr>
          <tr><td>Gambar</td>      <td> : <input type=file name='fupload' size=40> 
           <br>Tipe gambar disarankan JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Simpan>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "editproduk":
    $edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<header><h3>EDIT PRODUK</h3></header>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=produk&act=update>
          <input type=hidden name=id value=$r[id_produk]>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td width=70>Nama Produk</td>     <td> : <input type=text name='nama_produk' size=60 value='$r[nama_produk]'></td></tr>
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
          <tr><td>Berat</td>     <td> : <input type=text name='berat' value=$r[berat] size=3></td></tr>
          <tr><td>Harga</td>     <td> : <input type=text name='harga' value=$r[harga] size=10></td></tr>
		  <tr><td>Diskon</td>     <td> : <input type=text name='diskon' value=$r[diskon] size=3></td></tr>
          <tr><td>Stok</td>     <td> : <input type=text name='stok' value=$r[stok] size=3></td></tr>
          <tr><td valign=top>Deskripsi</td><td><textarea name='deskripsi' style='width: 600px; height: 350px;'>$r[deskripsi]</textarea></td></tr>
          <tr><td>Gambar</td>       <td> :  
          <img src='../foto_produk/small_$r[gambar]'></td></tr>
          <tr><td>Ganti Gbr</td>    <td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit class='button' value=Update>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
}
?>
