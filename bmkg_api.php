<?php
$url = "http://data.bmkg.go.id/propinsi_11_2.xml"; // from http://data.bmkg.go.id/ sesuaikan dengan lokasi yang diinginkan
$sUrl = file_get_contents($url, False);
$xml = simplexml_load_string($sUrl);
for ($i=0; $i<sizeof($xml->Isi->Row); $i++) {
    $row = $xml->Isi->Row[$i];
    if(strtolower($row->Kota) == "blitar") {// blitar merupakan contoh kota yang diambil data cuacanya dari bmkg
        echo "<b>" . strtoupper($row->Kota) . "</b><br/>";
        echo "<img src='http://www.bmkg.go.id/ImagesStatus/" . $row->Cuaca . ".gif' alt='" . $row->Cuaca . "'><br/>";
	echo "Cuaca : " . $row->Cuaca . "<br/>";
        echo "Suhu : " . $row->SuhuMin . " - ".$row->SuhuMax . " &deg;C<br/>";
        echo "Kelembapan : " . $row->KelembapanMin . " - " . $row->KelembapanMax . " %<br/>";
	echo "Kecepatan Angin : " . $row->KecepatanAngin . " (km/jam)<br/>";
	echo "Arah Angin : " . $row->ArahAngin . "<br/>";
        break;
    }
}
?>