<?php
$user = $_GET['user'] ?? '';
$broker = $_GET['broker'] ?? '';

if (!$user || !$broker) {
    echo "Error: parámetros incompletos";
    exit;
}

// URL de update.php en InfinityFree
$url = "https://tizirobotics.wuaze.com/tposturegym/update.php?user=" . urlencode($user) . "&broker=" . urlencode($broker);

// cURL con User-Agent para “engañar” un poco al AEJS
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
$response = curl_exec($ch);
curl_close($ch);

// Mostrar solo la respuesta
echo $response;
?>

