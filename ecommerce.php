<?php

$make="nokia+101";

$link = "http://api.dataweave.in/v1/price_intelligence/findProduct/?api_key=3c82f1b4864b2f5e6f2e801f701a57a2619eaf29&product=".$make."&page=2&per_page=10";
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => $link,
	CURLOPT_USERAGENT => 'sample request'
	));
$resp = curl_exec($curl);
curl_close($curl);

$arry = (json_decode($resp,true));
// echo $arry['status_code'];
//echo $arry['count']; 
for($i=0;$i<10;$i++){

echo $arry['data'][$i]['available_price'] . " ";
echo $arry['data'][$i]['source']." ";
echo '<a href="'.$arry['data'][$i]['url'].'">Get me there</a>';
echo "</br>";
}
?>
