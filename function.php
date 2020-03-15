<?php
function request($url, $token = null, $data = null, $pin = null, $location = null){

$header[] = "Host: api.gojekapi.com";
$header[] = "User-Agent: okhttp/3.12.1";
$header[] = "Accept: application/json";
$header[] = "Accept-Language: en-ID";
$header[] = "Content-Type: application/json; charset=UTF-8";
$header[] = "X-AppVersion: 3.48.2";
$header[] = "X-UniqueId: ".time()."57".mt_rand(1000,9999);
$header[] = "Connection: keep-alive";
$header[] = "X-User-Locale: en_ID";
if ($location):
$header[] = "X-Location: $location";
if ($pin):
$header[] = "pin: $pin";
    endif;
if ($token):
$header[] = "Authorization: Bearer $token";
endif;
$c = curl_init("https://api.gojekapi.com".$url);
    curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    if ($data):
    curl_setopt($c, CURLOPT_POSTFIELDS, $data);
    curl_setopt($c, CURLOPT_POST, true);
    endif;
    curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_HEADER, true);
    curl_setopt($c, CURLOPT_HTTPHEADER, $header);
    $response = curl_exec($c);
    $httpcode = curl_getinfo($c);
    if (!$httpcode)
        return false;
    else {
        $header = substr($response, 0, curl_getinfo($c, CURLINFO_HEADER_SIZE));
        $body   = substr($response, curl_getinfo($c, CURLINFO_HEADER_SIZE));
    }
    $json = json_decode($body, true);
    return $json;
}
function save($filename, $content)
{
	$save = fopen($filename, "a");
	fputs($save, "$content\r\n");
	fclose($save);
}
?>
