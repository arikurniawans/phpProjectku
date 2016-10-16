<?php
include "../config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else{
$login=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $r[level];

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();

  mysql_query("UPDATE users SET id_session='$sid_baru' WHERE username='$username'");
  header('location:media.php?module=home');
}
else{
echo "<link href='css/layout.css' rel='stylesheet' type='text/css'><link href='css/login.css' rel='stylesheet' type='text/css'><link href='css/style.css' rel='stylesheet' type='text/css'>";
  echo "<center class='warning'><br><br><br><br><br><br><br><br><br><b>LOGIN GAGAL! </b><br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br><br>";
		echo "<div> <a href='index.php'><img src='images/seru.png'  height=147 width=176><br><br></a>
             </div>";
  echo "<input type=button class='button' value='ULANGI LAGI' onclick=location.href='index.php'></a></center>";

}
}
?>
