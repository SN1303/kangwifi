<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';
$result = $conn->query("SELECT * FROM pelanggan ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>KangWifi Dashboard</title>
  <link rel="stylesheet" href="public/style.css">
</head>
<body>
  <h1>KangWifi - Manajemen Pelanggan</h1>
  <table border="1" cellpadding="5">
    <tr><th>ID</th><th>Nama</th><th>Nomor WA</th><th>Status</th><th>Tagihan</th></tr>
    <?php while($row = $result->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['nama']; ?></td>
      <td><?php echo $row['nomor_wa']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <td><?php echo $row['tagihan']; ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
