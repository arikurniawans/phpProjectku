<?php
function grabbing($url){
     $data = curl_init();
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
     $output = curl_exec($data);
     curl_close($data);
     return $output;
}
$ambilhtml =  grabbing('http://www.bmkg.go.id/BMKG_Pusat/Depan.bmkg');
$filter = explode('<td width="25%" valign="top">', $ambilhtml);
$filterakhir = explode('</div></td>', $filter[4]);
echo $filterakhir[0];
// source : http://h4nk.blogspot.com/2013/05/teknik-grabbing-dengan-curl-php.html
?>