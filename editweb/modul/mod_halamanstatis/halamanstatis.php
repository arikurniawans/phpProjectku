<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_halamanstatis/aksi_halamanstatis.php";
switch($_GET[act]){
  // Tampil Halaman Statis
  default:
    echo "<header><h3>TAMBAHKAN HALAMAN BARU</h3></header>
          <div class='module_content'><input type=button class=button value='Tambahkan Halaman' onclick=\"window.location.href='?module=halamanstatis&act=tambahhalamanstatis';\">
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Judul</th><th>Link</th><th>Tgl. Posting</th><th>Aksi</th></tr>";

    $tampil = mysql_query("SELECT * FROM halamanstatis ORDER BY id_halaman DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
				 <td>statis-$r[id_halaman]-</td>
                <td>$tgl_posting</td>
		            <td><a href=?module=halamanstatis&act=edithalamanstatis&id=$r[id_halaman]>
					<img src='images/icn_edit.png' title='Edit'></a>
		                <a href=$aksi?module=halamanstatis&act=hapus&id=$r[id_halaman]>
						<img src='images/icn_trash.png' title='Hapus'></a></td></tr>";
		     
      $no++;
    }
    echo " <table><tr><td colspan=2>*) Apabila menambahkan halaman baru link yang didapat adalah nomor urut statis terakhir<br/>
	dan nama judul yang anda inputkan. Contoh: Berita Terakhir, maka link yang didapat = statis-15-beritaterakhir.html<br/>
	**) (statis-15- seandainya nomor urut terakhir).</td></tr>
	
	</table>";
    break;

  case "tambahhalamanstatis":
    echo "<header><h3>TAMBAHKAN HALAMAN BARU</h3></header>
          <form method=POST action='$aksi?module=halamanstatis&act=input' enctype='multipart/form-data'>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td width=70>Judul</td>     <td> : <input type=text name='judul' size=60></td></tr>
          <tr><td valign=top>Isi Halaman</td>  <td> <textarea name='isi_halaman'  style='width: 550px; height: 600px;'></textarea></td></tr>
          <tr><td>Gambar</td>  <td> : <input type=file name='fupload' size=40> 
                                          <br>Tipe gambar disarankan JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>
          <tr><td colspan=2><input type=submit class=button value=Simpan>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "edithalamanstatis":
    $edit = mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<header><h3>EDITHALAMAN</h3></header>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=halamanstatis&act=update>
          <input type=hidden name=id value=$r[id_halaman]>
          <div class='module_content'>
          <table id='rounded-corner'>
          <tr><td width=70>Judul</td>  <td> : <input type=text name='judul' size=60 value='$r[judul]'></td></tr>
          <tr><td valign=top>Isi Halaman</td>   <td> <textarea name='isi_halaman' style='width: 550px; height: 600px;'>$r[isi_halaman]</textarea></td></tr>
          <tr><td>Gambar</td>       <td> :  ";
          if ($r[gambar]!=''){
              echo "<img src='../foto_banner/$r[gambar]'>";  
          }
    echo "</td></tr>
          <tr><td>Ganti Gbr</td>    <td> : <input type=file name='fupload' size=40> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>";

    echo  "<tr><td colspan=2><input type=submit class=button value=Update>
                            <input type=button class=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}

}
?>
