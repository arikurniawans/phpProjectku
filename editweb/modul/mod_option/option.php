<style>
table{width:100%;}
td{width:70px;}
</style>
<?php
session_start();
@require_once "../config/option.php";
if(!session_is_registered("namauser")){
  echo"<meta http-equiv=\"refresh\" content=\"0; URL=../../index.php\" />";
}else{
$module=$_GET['module'];
switch($_GET['act']){
  default:
    echo "<header><h3>EDIT NAMA TOKO</h3></header> 
    <form method=POST action='?module=$module&act=simpanoption' method='post' enctype='multipart/form-data'>
	<div class='module_content'>
         <table id='rounded-corner'>
		<tr><td>Nama Toko </td><td> : <input type=text name='nama_toko' value='$nama_toko' size=50></td></tr>
        <tr><td>Deskripsi</td><td> : <input type=text name='meta_deskripsi' value='$meta_deskripsi' size=80></td></tr>
        <tr><td>Meta Keyword</td><td> : <input type=text name='meta_keyword' value='$meta_keyword' size=80></td></tr>
        <tr><td>Email </td><td> : <input type=text name='email_pengelola' value='$email_pengelola' size=50></td></tr>
        <tr><td>No.HP</td><td> : <input type=text name='nomor_hp' value='$nomor_hp' size=50></td></tr>
        <tr><td>No. Rekening</td><td> : <input type=text name='nomor_rekening' value='$nomor_rekening' size=50></td></tr>
		<tr><td colspan=2><input type='submit' class=button value='Simpan' >
   <input type=button class=button value=Batal onclick=\"location.href='?module=$module'\"></td></tr>
  </table>";
  break;
  
  case"simpanoption";
  echo"<h2>Option</h2><br><img src=../images/loading.gif alt='Loading....' title='Loading....'>";
  $filename = '../config/option.php';
    $somecontent = 
"<?
require_once 'koneksi.php';"."$"."nama_toko='$_POST[nama_toko]';"."$"."meta_deskripsi='$_POST[meta_deskripsi]';"."$"."meta_keyword='$_POST[meta_keyword]';"."$"."email_pengelola='$_POST[email_pengelola]';
"."$"."nomor_hp='$_POST[nomor_hp]';"."$"."nomor_rekening='$_POST[nomor_rekening]';
";
    
    // Let's make sure the file exists and is writable first.
    if (is_writable($filename)) {
    
        // In our example we're opening $filename in append mode.
        // The file pointer is at the bottom of the file hence 
        // that's where $somecontent will go when we fwrite() it.
        if (!$handle = fopen($filename, 'w')) {
    $pesanhasil= "Cannot open file ($filename)";
    exit;
        }
    
        // Write $somecontent to our opened file.
        if (fwrite($handle, $somecontent) === FALSE) {
   $pesanhasil= "Cannot write to file ($filename)";
   exit;
        }
        
   $pesanhasil="Success, Change The option !!!";
        fclose($handle);
       
    } else {
        $pesanhasil="The file $filename is not writable";
    }
    echo"<meta http-equiv=\"refresh\" content=\"0; URL=media.php?module=$module\" />"; 
  break;
}

}
?>
