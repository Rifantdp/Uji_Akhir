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
                margin-bottom: 10px;
            }
            form input{
              border: none;
              border-bottom: 2px solid silver;
              margin: 15px;
              height: 20px;
            }
        </style>
    </head>
    <body style="width:100%; height:100%;">
        <?php
        include "../connect.php";
        //input
        echo '<div style="width:100% display:flex; float:right;">
          <a href="whatsapp://send?text=hai" data-action="share/whatsapp/share"
		target="_blank"> Share to WhatsApp </a>
		<button onclick="window.print();">PRINT</button></div>
    <div style="width: 100%;display:flex;align-items:center;justify-content: center;padding-top: 10px;">
      <div class="boxi" style="width:80%;">
    <form method="POST"><select name="jadwal">';
    $sql="SELECT id_schedule,day_schedule,start_time,end_time,sup_kelas,sub_kelas,judul_mapel from data_schedule,data_time,data_kelas,data_mapel WHERE data_schedule.id_time=data_time.id_time AND data_schedule.id_kelas=data_kelas.id_kelas AND data_schedule.no_mapel=data_mapel.no_mapel";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
          echo '<option value="'.$row["id_schedule"].'">'; 
          switch($row["day_schedule"]){
            case 1:
                echo "SENEN";
                break;
            case 2:
                echo"SELASA";
                break;
            case 3:
                echo "RABU";
                break;
            case 4:
                echo "KAMIS";
                break;
            case 5:
                echo "JUMAT";
                break;
            case 6:
                echo "SABTU";
                break;
            case 7:
                echo "MINGGU";
                break;
          }
          echo " - " . $row["start_time"]." Class : ". $row["sup_kelas"]." - ".$row["sub_kelas"]." Mapel : ".$row["judul_mapel"];}?>
    </select><button name="cek">CEK</button></form>
    <?php 
    if(isset($_POST['cek'])){
      $jadwal = $_POST['jadwal'];
      $sql = "SELECT day_schedule,start_time,judul_mapel,sup_kelas,sub_kelas,nama_siswa,nama_guru,gelar_guru from data_schedule,data_time,data_mapel,data_kelas,data_siswa,data_guru WHERE data_schedule.id_schedule='$jadwal' AND data_schedule.id_time=data_time.id_time AND data_schedule.no_mapel = data_mapel.no_mapel AND data_schedule.id_kelas=data_kelas.id_kelas";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    
    echo '<table>
            <tr>
              <th>NAMA : '.$row["nama_guru"].".".$row["gelar_guru"].'></th>
              <th colspan="2">Jadwal : ';
                        switch($row["day_schedule"]){
                          case 1:
                              echo "SENEN";
                              break;
                          case 2:
                              echo"SELASA";
                              break;
                          case 3:
                              echo "RABU";
                              break;
                          case 4:
                              echo "KAMIS";
                              break;
                          case 5:
                              echo "JUMAT";
                              break;
                          case 6:
                              echo "SABTU";
                              break;
                          case 7:
                              echo "MINGGU";
                              break;
                        }
                        echo " - " . $row["start_time"]." Class : ". $row["sup_kelas"]." - ".$row["sub_kelas"]." Mapel : ".$row["judul_mapel"];
              ?></th>
            </tr>
            <tr>
              <th>NIM</th>
              <th>SISWA</th>
              <th>PTS</th>
              <th>UAS</th>
              <th></th>
            </tr>
            <?php 
            $sql="SELECT * FROM `data_nilai`,data_schedule,data_siswa WHERE data_schedule.id_schedule='$jadwal' AND data_schedule.id_schedule=data_nilai.id_schedule AND data_nilai.nis=data_siswa.nis";
$result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
           echo'<tr><td>'.$row["nis"]."</td><td>".$row['nama_siswa'].'</td><td>'.$row['pts']."</td><td>".$row['uas']."</td></tr>";
              }
            }
            ?>
          </table>
          <form action="pts.php" method="GET"><button type="submit" name="edit" value="<?php echo $jadwal;?>" style="width:5%; float:right; background-color:transparent; border:none;"><img src="pen.png" style="width: 70%;"></button></form>
          <form action="uas.php" method="GET"><button type="submit" name="edit" value="<?php echo $jadwal;?>" style="width:5%; float:right; background-color:transparent; border:none;"><img src="pen.png" style="width: 70%;"></button></form> 
        </div>
          </div>
    </body>
</html>