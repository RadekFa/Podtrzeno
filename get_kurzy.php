<?php
// PHP Most pro načtení kurzů z ČNB (řeší problém s CORS)
header('Content-Type: application/json; charset=utf-8');

$url = "https://www.cnb.cz/cs/financni-trhy/devizovy-trh/kurzy-devizoveho-trhu/kurzy-devizoveho-trhu/denni_kurz.txt";

// Použijeme cURL, který je na WEDOS spolehlivější
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

if ($result) {
    echo json_encode(['text' => $result]);
} else {
    echo json_encode(['text' => 'Chyba stahování dat']);
}
?>