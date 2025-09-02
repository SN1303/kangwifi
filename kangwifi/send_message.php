<?php
require_once 'config.php';

$nomor = $_POST['nomor'];
$pesan = $_POST['pesan'];

$data = [
    'api_key' => MPWA_API_KEY,
    'sender'  => MPWA_SENDER,
    'number'  => $nomor,
    'message' => $pesan
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, MPWA_API_URL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
