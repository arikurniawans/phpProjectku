<?php
function fungsiCurl($url){
  $data = curl_init();
  curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($data, CURLOPT_URL, $url);
  curl_setopt($data, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
  $hasil = curl_exec($data);
  curl_close($data);
  return $hasil;
}
$url = fungsiCurl('http://www.bmkg.go.id/BMKG_Pusat/Informasi_Cuaca/Prakiraan_Cuaca/Prakiraan_Cuaca_Indonesia.bmkg');
$pecah = explode('<h1>Prakiraan Cuaca Indonesia</h1>',$url);
$pecah2 = explode('<h3>Cuaca Propinsi Lainnya :</h3>',$pecah[1]);
$result = $pecah2[0];
$result = preg_replace("/<img[^>]+\>/i", "", $result);
print_r($result);
?>