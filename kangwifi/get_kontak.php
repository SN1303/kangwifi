<?php
require_once 'includes/db.php';
$result = $conn->query("SELECT id, nama, nomor_wa FROM pelanggan");
$data = [];
while($row = $result->fetch_assoc()){
    $data[] = $row;
}
header('Content-Type: application/json');
echo json_encode($data);
?>
