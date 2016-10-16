<?php
    // diskon  
   
	
	$harga       =  number_format(($r[harga]),0,",",".");
    $disc      = ($r[diskon]/100)*$r[harga];
    $hargadisc = number_format(($r[harga]-$disc),0,",",".");

    $d=$r['diskon'];
    $hargatetap="<div class='prod_price'><span class='price'> <br /></span>&nbsp;<span class='price'> Rp. <b>$hargadisc,-</b></span><br /><span class='stok2'>stok: $r[stok]</span></div>                        
          </div>";
		  
		  
    $hargadiskon="<div class='s_price'><span class='s_currency s_before'></span>$r[diskon]%</div>
	<div class='prod_price2'><span style='text-decoration:line-through;' class='pricediskon'>Rp. $harga,- <br /></span>
	<span class='price2'>Rp. <b>$hargadisc,-</b><br /></span><span class='stok2'>stok: $r[stok]</span></div>              
          </div>";
      if ($d!= "0"){
      $divharga=$hargadiskon;
      }else{
      $divharga=$hargatetap;
      }  

    // tombol stok habis kalau stoknya 0
    $stok=$r['stok'];
    $tombolbeli="<a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\">BELI</a>";
    $tombolhabis="<span class='product_img2'></span><span class='prod_cart_habis'></span>";
  
	
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 
?>


   



