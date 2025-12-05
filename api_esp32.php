<?php
// Recibe datos del ESP32
$user = isset($_GET['user']) ? $_GET['user'] : '';
$broker = isset($_GET['broker']) ? $_GET['broker'] : '';

if (empty($user) || empty($broker)) {
    echo "Error: parámetros incompletos";
    exit;
}

// URL de InfinityFree
$infinityfree_url = "https://tizirobotics.wuaze.com/tposturegym/update.php?user=" . urlencode($user) . "&broker=" . urlencode($broker);

// Llamada cURL a InfinityFree
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $infinityfree_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$curl_error = curl_error($ch);
curl_close($ch);

// Devuelve respuesta al ESP32
if ($response) {
    echo $response;
} else {
    echo "❌ Error en cURL: $curl_error";
}
?>
