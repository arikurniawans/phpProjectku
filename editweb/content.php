<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";
include "../config/fungsi_rupiah.php";

// Bagian Home
if ($_GET[module]=='home'){
  if ($_SESSION['leveluser']=='admin'){
  echo "<header><h3><SCRIPT language=JavaScript>var d = new Date();
var h = d.getHours();
if (h < 11) { document.write('Selamat pagi,'); }
else { if (h < 15) { document.write('Selamat siang,'); }
else { if (h < 19) { document.write('Selamat sore,'); }
else { if (h <= 23) { document.write('Selamat malam,'); }
}}}</SCRIPT> <b>$_SESSION[namalengkap]</b>... Selamat Datang di Halaman Administrator.</h3></header>
  <div class='module_content'>
          <p><h3>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda <br/>atau pilih ikon-ikon pada Control Panel di bawah ini:</h3></b></p>
<p>&nbsp;</p>

 		<table align=center>
		<th colspan=5><center><class style=\"color:#464646;font-size:15px;\">&nbsp;</center><br/></th>
		
		<tr>
		  <td width=120 align=center><a href=media.php?module=produk><img src=images/produk.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=kategori><img src=images/kategori.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=order><img src=images/lihatorder.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=testimoni><img src=images/komentar.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=carabeli><img src=images/carabeli.png border=none></a></td>
    </tr>
		<tr>
		  <th width=120 align=center><center><b>Tambahkan Produk</b></th>
		  <th width=120 align=center><center><b>Kategori Produk</b></center></th>
		  <th width=120 align=center><center><b>Lihat Order</b></th>
		  <th width=120 align=center><center><b>Lihat Testimoni</b></th>
		  <th width=120 align=center><center><b>Cara Pembelian</b></th>
		</tr>
		
		
		<tr height=20></tr>
		
		<tr>
		  <td width=120 align=center><a href=media.php?module=jasapengiriman><img src=images/jasakirim.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=ongkoskirim><img src=images/ongkoskirim.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=templates><img src=images/template.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=option><img src=images/toko.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=hubungi><img src=images/hubungi.png border=none></a></td>
    </tr>
		<tr>
		  <th width=120 align=center><center><b>Jasa Pengiriman</b></th>
		  <th width=120 align=center><center><b>Ongkos Kirim</b></th>
		  <th width=120 align=center><center><b>Ganti Template</b></th>
		  <th width=120 align=center><center><b>Nama Toko</b></th>
		  <th width=120 align=center><center><b>Pesan Masuk</b></th>
		</tr>
		
		<tr height=20></tr>
		
			<tr>
		  <td width=120 align=center><a href=media.php?module=ym><img src=images/ym.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=blog><img src=images/berita.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=download><img src=images/katalog.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=user><img src=images/user.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=profil><img src=images/profil.png border=none></a></td>
    </tr>
		<tr>
		  <th width=120 align=center><center><b>Layanan Pelanggan</b></th>
		  <th width=120 align=center><center><b>NgeBlog</b></th>
		  <th width=120 align=center><center><b>Download Katalog</b></th>
		  <th width=120 align=center><center><b>Manajemen Admin</b></th>
		  <th width=120 align=center><center><b>Profil</b></th>
		</tr>
		
    </table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>


  <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  echo " </div>";
  }
}
// Bagian Modul
elseif ($_GET[module]=='modul'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_modul/modul.php";
  }
}

// Bagian Option
elseif ($_GET[module]=='option'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_option/option.php";
  }
}
// Bagian Halaman Statis
elseif ($_GET['module']=='halamanstatis'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_halamanstatis/halamanstatis.php";
  }
}


// Bagian Album
elseif ($_GET['module']=='album'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_album/album.php";
  }
}

// Bagian Galeri Foto
elseif ($_GET['module']=='galerifoto'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_galerifoto/galerifoto.php";
  }
}

// Bagian Kata Jelek
elseif ($_GET['module']=='katajelek'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_katajelek/katajelek.php";
  }
}



// Bagian Blog
elseif ($_GET['module']=='blog'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_blog/blog.php";                            
  }
}

// Bagian KategoriBlog
elseif ($_GET[module]=='kategoriblog'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategoriblog/kategoriblog.php";
  }
}

// Bagian Kategori
elseif ($_GET[module]=='kategori'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori/kategori.php";
  }
}



// Bagian Sub Kategori
elseif ($_GET[module]=='subkategori'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_subkategori/subkategori.php";
  }
}



// Bagian Produk
elseif ($_GET[module]=='produk'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_produk/produk.php";
  }
}
// Bagian Best Seller
elseif ($_GET[module]=='bestseller'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_bestseller/bestseller.php";
  }
}


// Bagian Order
elseif ($_GET[module]=='order'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_order/order.php";
  }
}

// Bagian Profil
elseif ($_GET[module]=='profil'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_profil/profil.php";
  }
}

// Bagian Tag
elseif ($_GET['module']=='tag'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_tag/tag.php";
  }
}

// Sub Item
elseif ($_GET['module']=='subitem'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_item/item.php";
  }
}



// Bagian Hubungi Kami
elseif ($_GET[module]=='hubungi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_hubungi/hubungi.php";
  }
}

// Bagian Cara Pembelian
elseif ($_GET[module]=='carabeli'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_carabeli/carabeli.php";
  }
}

// Modul Bank
elseif ($_GET[module]=='bank'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_bank/bank.php";
  }
}

// Bagian Banner
elseif ($_GET[module]=='banner'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_banner/banner.php";
  }
}


// Bagian Header
elseif ($_GET[module]=='header'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_header/header.php";
  }
}


// Bagian Logo
elseif ($_GET[module]=='logo'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_logo/logo.php";
  }
}




// Bagian Menu Utama
elseif ($_GET['module']=='menuutama'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_menuutama/menuutama.php";
  }
}


// Bagian Sub Menu
elseif ($_GET['module']=='submenu'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_submenu/submenu.php";
  }
}


// Bagian Kota/Ongkos Kirim
elseif ($_GET[module]=='ongkoskirim'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_ongkoskirim/ongkoskirim.php";
  }
}

// Bagian Password
elseif ($_GET[module]=='password'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_password/password.php";
  }
}

// Bagian Laporan
elseif ($_GET[module]=='laporan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_laporan/laporan.php";
  }
}



// Bagian YM
elseif ($_GET[module]=='ym'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_ym/ym.php";
  }
}

// Bagian Selamat Datang
elseif ($_GET[module]=='welcome'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_welcome/welcome.php";
  }
}

// Bagian Jasa Kirim
elseif ($_GET['module']=='jasapengiriman'){
if ($_SESSION['leveluser']=='admin'){
  require_once "modul/mod_pengiriman/pengiriman.php";
  }
}

// Bagian Download
elseif ($_GET['module']=='download'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_download/download.php";
  }
}
// Bagian Sekilas Info
elseif ($_GET['module']=='sekilasinfo'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}

// Bagian Poling
elseif ($_GET['module']=='poling'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_poling/poling.php";
  }
}

// Bagian Shoutbox
elseif ($_GET['module']=='shoutbox'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_shoutbox/shoutbox.php";
  }
}
// Bagian Berita
elseif ($_GET['module']=='berita'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_berita/berita.php";                            
  }
}

// Bagian Komentar Berita
elseif ($_GET['module']=='komentar'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_komentar/komentar.php";
  }
}

// Bagian Agenda
elseif ($_GET['module']=='agenda'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_agenda/agenda.php";
  }
}
// Bagian Alamat
elseif ($_GET['module']=='alamat'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_alamat/alamat.php";
  }
}

// Bagian Template
elseif ($_GET['module']=='templates'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_templates/templates.php";
  }
}


// Bagian User
elseif ($_GET['module']=='user'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_users/users.php";
  }
}


// Bagian Testimoni
elseif ($_GET[module]=='testimoni'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_testimoni/testimoni.php";
  }
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
