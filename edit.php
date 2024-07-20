<?php 
include "connect.php";
$urut = $_GET['edit'];
$sql = "SELECT * FROM akun WHERE username = '$urut'";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); ?>
<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>
    <div id="edit">
        <div style="width: 100%;display:flex;align-items:center;justify-content: center;padding-top: 100px;">
        <form class="boxi" method="POST">
              <div style="display:flex; align-items:center;">
                <div style="width:75%;">
                <form class="boxi" method="POST">
              <div style="display:flex; align-items:center;">
                <div style="width:75%;">
                  <input type="text" style="width: 90%;" placeholder="user" name="user" value="<?php echo $row['username']; ?>">
                  <input type="text" style="width: 90%;" placeholder="password" name="pass" value="<?php echo $row['password']; ?>">
                  <div style="margin-left:10px;">
                  <select name="posisi">
                  <option value="1">ADMIN</option>
                  <option value="2">SISWA</option>
                  <option value="3">GURU</option>
                  </select>
                  </div>       
                </div>
              <div style="width: 25%;align-items: center; margin-left:5px;">
                <img style="width: 70%;" src="user.png" >
              </div>
            </div>
            <button  type="submit" style= "float: right; margin: 5PX; border: none; background-color: #04AA6D; color: white; border-radius: 15px;" name="simpan"><h3>Tambah</h3></button>
        </form>
          </div>
        </div>
        <script>

        </script>
  </body>
</html>
<?php
if(isset($_POST['simpan'])){
$user = $_POST['user'];
$pass = $_POST['pass'];
$posisi = $_POST['posisi'];
$sql = "UPDATE `informasi_akademik`.`akun` SET `username` = '$user', `password` = '$pass', `posisi` = '$posisi' WHERE username = '$urut'";
if ($conn->query($sql)==TRUE) {
  echo '<script>alert("Data Tersimpan")</script>';
  echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/admin.php'>";
} else {
  echo '<script>alert("Data gagal tersimpan, harap periksa kembali")</script>';
}
}
$conn->close();
?>