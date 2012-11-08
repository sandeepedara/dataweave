<?php

//$query contains the values passed from form by user.
$query=str_replace(" ","+",$_POST['mobile']);

//link is api key along with other credentials
$link = "http://api.dataweave.in/v1/price_intelligence/findProduct/?api_key=YOUR_KEY&product=".$query."&page=1&per_page=10";

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => $link,
	CURLOPT_USERAGENT => 'sample request'
	));
$resp = curl_exec($curl);
curl_close($curl);

$arry = (json_decode($resp,true));

echo "</br>";
for($i=0;$i<10;$i++){

echo $arry['data'][$i]['available_price']." ";
echo $arry['data'][$i]['source']." ";
echo '<a href="'.$arry['data'][$i]['url'].'">Get me there</a>'." ";
echo "</br>";
}
?>
