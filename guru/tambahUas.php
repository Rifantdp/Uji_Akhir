<?php
include "../connect.php";
$jadwal = $_GET['jadwal'];
$nis = $_GET['nis'];
$id = $nis*100000+$jadwal;
$uas = $_GET['uas'];
$sql = "UPDATE `data_nilai` SET `uas` = '$uas' WHERE `data_nilai`.`id_nilai` = '$id'";
if ($conn->query($sql)==TRUE) {
  echo '<script>alert("Data terisimpan")</script>';
  echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/guru/nilai.php'>";
} else {
  echo '<script>alert("Data gagal tersimpan")</script>';
  }  
$conn->close();
?>