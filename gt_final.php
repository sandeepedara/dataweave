<?php

$make="Bajaj";
$city="Bangalore";

$link = "http://api.dataweave.in/v1/bikePricesIndia/findByMake/?api_key=3c82f1b4864b2f5e6f2e801f701a57a2619eaf29&make=".$make."&city=".$city."&page=1&per_page=10";
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => $link,
	CURLOPT_USERAGENT => 'sample request'
	));
$resp = curl_exec($curl);
curl_close($curl);

$arry = (json_decode($resp,true));
echo $arry['status_code'];
echo $arry['count']; 
for($i=0;$i<11;$i++){

echo $arry['data'][$i]['state'] . " ";
echo $arry['data'][$i]['ex_showroom_price']." ";
echo $arry['data'][$i]['make']." ";
echo $arry['data'][$i]['model']." ";
echo $arry['data'][$i]['variant']." ";
echo "------\n";
}
?>
