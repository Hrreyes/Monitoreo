<?php
$url = 'https://www.lokas4asdfa.com'; // La URL de la página que deseas verificar
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);

$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($status == 200) {
    echo "La página está disponible.";
} else {
    echo "La página está bloqueada. Estado: $status";
}

curl_close($ch);
?>
