<?php
include "../connect.php";
$jadwal = $_GET['jadwal'];
$nis = $_GET['nis'];
$id = $nis*100000+$jadwal;
$pts = $_GET['pts'];
$sql = "SELECT nip FROM data_schedule WHERE id_schedule='$jadwal'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$nip = $row['nip'];
$sql = "INSERT INTO `data_nilai` (`id_nilai`, `nis`, `id_schedule`, `nip`, `pts`, `uas`) VALUES ('$id', '$nis', '$jadwal', '$nip', '$pts', NULL)";
if ($conn->query($sql)==TRUE) {
  echo '<script>alert("Data terisimpan")</script>';
  echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/guru/nilai.php'>";
} else {
  echo '<script>alert("Data gagal tersimpan")</script>';
  }  
$conn->close();
?>