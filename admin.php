<?php include "connect.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            head,body{
                width:100%;
                height:100%;
            }
            tr:nth-child(even){
                background-color: #D6EEEE;
            }
            .boxi{
                width: 50%;
                box-sizing: border-box;
                border-radius: 15px;
                box-shadow: 0px 0px 10px rgba(0,0, 0, 1);
                justify-content: center;
                padding: 5px;
                margin-bottom:;
            }
            form input{
              border: none;
              border-bottom: 2px solid silver;
              margin: 15px;
              height: 20px;
            }
            #edit{
                position: relative;
            }
            #submit{
              background-color:transparent;
              border:none;
            }
        </style>
    </head>
    <body style="width:100%; height:100%;">
      <?php
      //input
      echo '<div style="width: 100%;display:flex;justify-content: center;padding-top: 100px;">
            <form class="boxi" method="POST">
              <div style="display:flex; align-itemss:center;">
                <div style="width:75%;">
                  <input type="text" style="width: 90%;" placeholder="user" name="user">
                  <input type="text" style="width: 90%;" placeholder="password" name="pass">
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
          </div>';
          if(isset($_POST['simpan'])){
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $posisi = $_POST['posisi'];
            $sql = "INSERT INTO `informasi_akademik`.`akun` (`username`, `password`, `posisi`) VALUES ('$user', '$pass', '$posisi')";
            if ($conn->query($sql)) {
              echo '<script>alert("New record created successfully")</script>';
            } else {
              echo '<script>alert("Data gagal tersimpan, harap periksa kembali")</script>';
            }  
          }
          //output
          $sql = "SELECT * FROM akun";
          $result = $conn->query($sql);        
          while($row = $result->fetch_assoc()) {
          echo '<div style="width: 100%;display:flex;align-items:center;justify-content: center;padding-top: 10px;">
      <div class="boxi" style="width:80%;">
        <div style="display: flex;">
          <div style="width: 70%;">
            <table style="width: 100%;">
              <tr><td style="width: 30%;">username</td><td style="width: 70%;">'.$row['username']."</td>
              <tr><td>Password</td><td>".$row['password']."</td>
              <tr><td>Posisi</td><td>".$row['posisi'].'</td>
            </table>
          </div>
          <div>
          </div>
        </div>
        <form action="delete.php" method="GET"><button type="submit" name="hapus" value="'.$row['username'].'" style="width:5%; float:right; background-color:transparent; border:none;"><img src="delete.png" style="width: 70%;"></button></form>
        <form action="edit.php" method="GET"><button type="submit" name="edit" value="'.$row['username'].'" style="width:5%; float:right; background-color:transparent; border:none;"><img src="pen.png" style="width: 70%;"></button></form>
      </div>
    </div>';
          }?>
    </body>
</html>