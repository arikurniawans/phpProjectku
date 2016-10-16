<?php
function httpPost($url,$params)
{
    $postData = '';
    //membangung query
    foreach($params as $k => $v)
    {
        $postData .= $k . '='.$v.'&';
    }
    rtrim($postData, '&');

    $ch = curl_init(); 

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);   

    $output=curl_exec($ch);

    curl_close($ch);
    return $output;

}
$params = array(
    "get_ori" => "BANDUNG", // nama kota asal, ganti sesuai keinginan kamu.
    "get_des" => "karawang", // nama kota tujuan
    "get_wg" => "1", // berat paket
    "submit" =>"Check" // ga usah si ubah :)
);

// baca html menggunakan fungsi di atas, dan memasukan parameter
$bacaHTML = httpPost("http://www.tiki-online.com/?cat=KgfdshfF7788KHfskF",$params);

//inisialisasi DOM
$dom = new DomDocument();

//baca hasil output untuk di prosess oleh DOM
@$dom->loadHTML($bacaHTML);

//ambil semua elemen dengan tag table
$fetch =  $dom->getElementsByTagName('<table>');

//karena list harga yang di ambil ada di table urutan ke 3 maka ambil table ke 3
$table = $fetch->item(2);

//dari table ke 3 ambil semua row atau tag tr
$row = $table->getElementsByTagName('<tr>');
$no =0;
foreach($row as $val){
    // row pertama tidak di ambil karena itu title/ judul table
    if ($no!=0){

        //dari row kita ambil semua td, di sini setiap row punya dua field / td
        $field = $row->item($no)->getElementsByTagName('<td>');

        //memasukan ke array dengan key
        $data[] = array(
            'service' => $field->item(0)->nodeValue,
            'harga' => $field->item(1)->nodeValue
        );
    }
    $no++;
}

?>
<style>
    table,th,td{
        border:1px solid #000;
        font-size:12px;
    }
</style>
<h2>Grabbing dari Tiki-Online.com</h2>
<table>
    <thead>
        <th>No</th>    
        <th>Servie</th>    
        <th>Harga</th>    
        <th>Tanggal</th>    
    </thead>
    <tbody>
        <?php
$no=1;
foreach($data as $val)
{
        ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $val['service'];?></td>
            <td><?php echo $val['harga'];?></td>
            <td><?php echo Date('d-M-Y');?></td>
        </tr>
        <?php
    $no++;
}
        ?>
    </tbody>
</table>
