<?php
error_reporting(E_ERROR | E_PARSE);

require 'vendor/autoload.php';
require_once 'autoload.php';

$client = new GuzzleHttp\Client();
$res = $client->get("https://squidproxy.org/?find_ip=vn.serverip.co&proxy=Find");
$DOM = new DOMDocument();
$DOM->preserveWhiteSpace = false;
$DOM->loadHTML($res->getBody());
$Dados = $DOM->getElementsByTagName("td");
$dadosArr = array();

//echo $Dados->item(0)->nodeValue . "\n";

for ($i = 0, $j=0; $i< ($Dados->length-1)/7; $i++)
{
    $dadosArr[$i] = array("id" => $Dados->item(0+$j)->nodeValue,
        "proxy" => $Dados->item(1+$j)->nodeValue , "portas" => $Dados->item(2+$j)->nodeValue,
        "pais" => $Dados->item(3+$j)->nodeValue, "status" => $Dados->item(4+$j)->nodeValue,
        "tipo" => $Dados->item(5+$j)->nodeValue);
    $j += 7;

}
echo json_encode($dadosArr);