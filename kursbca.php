<?php

function bacaHTML($url){
     // inisialisasi CURL
     $data = curl_init();
     // setting CURL
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
     // menjalankan CURL untuk membaca isi file
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}

$kodeHTML =  bacaHTML('http://www.bmkg.go.id/BMKG_Pusat/Informasi_Cuaca/Prakiraan_Cuaca/Prakiraan_Cuaca_Indonesia.bmkg');
$pecah = explode('<table class="table table-hover table-bordered table-striped">', $kodeHTML);

$pecahLagi = explode('</table>', $pecah[1]);

echo "<tr><td>Kota</td><td>Cuaca Hari Ini</td><td>Cuaca Esok Hari</td></tr>";
echo $pecahLagi[0];
echo "</table>";
?>