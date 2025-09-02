<?php
require_once 'includes/db.php';
require_once 'config.php';

// ambil pelanggan yg belum bayar
$res = $conn->query("SELECT * FROM pelanggan WHERE status='BELUM BAYAR'");
while($p = $res->fetch_assoc()){
    $pesan = "Halo {$p['nama']},
Tagihan internet anda bulan ini sebesar Rp {$p['tagihan']}.
Mohon segera dibayar.

- KangWifi";
    $data = [
        'api_key' => MPWA_API_KEY,
        'sender'  => MPWA_SENDER,
        'number'  => $p['nomor_wa'],
        'message' => $pesan
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, MPWA_API_URL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $conn->query("INSERT INTO log_pengiriman(pelanggan_id, pesan, response) VALUES ({$p['id']}, '{$pesan}', '{$response}')");
}
?>
