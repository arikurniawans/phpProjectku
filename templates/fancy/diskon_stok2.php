<?php
    // diskon  
   
	
	$harga       =  number_format(($r[harga]),0,",",".");
    $disc      = ($r[diskon]/100)*$r[harga];
    $hargadisc = number_format(($r[harga]-$disc),0,",",".");

   $d=$r['diskon'];
    $hargatetap  = "<span class='price4'>Harga Rp. $hargadisc,-</span>";
    $hargadiskon = "<span class='price4'>Harga &nbsp;&nbsp;<span style='text-decoration:line-through;' class='pricediskon2'> Rp. $harga<br /> 
	</span> <class style=\"color:#ff6600;font-size:12px;\">diskon $d% - <span class='price5'>Rp. $hargadisc,-</span>";
    if ($d!=0){
      $divharga=$hargadiskon;
    }else{
      $divharga=$hargatetap;
    } 

    // tombol stok habis kalau stoknya 0
    $stok=$r['stok'];
    $tombolbeli="<a class='add-to-basket' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\"><img src=$f[folder]/images/beli2.png width='132' height='41' alt='Beli Produk Ini' /></a>";
    $tombolhabis="<span class='add-to-basket'><img src=$f[folder]/images/cart_hbs2.png width='132' height='41' alt='Produk Habis' /></span>";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 
?>


   



