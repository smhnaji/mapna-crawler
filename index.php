<?php

$url = 'https://www.igmc.ir/electronic-services/power-market/reports/power-market-daily-price-report';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
$data = curl_exec($ch);
curl_close($ch);

$data = strstr($data, '<table class');
$data = strstr($data, '</table>', true) . '</table>';

$xml = new SimpleXMLElement($data);

$result = $xml->xpath("/table/tbody/tr[1]");

echo '<pre>';
var_dump($result);
echo '</pre>';
