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
        $jadwal=$_GET['edit'];
        //input
        echo '<div style="width: 100%;display:flex;align-items:center;justify-content: center;padding-top: 10px;">
      <div class="boxi" style="width:80%;">';
      echo "<table>
            <tr>
              <th>NIM</th>
              <th>SISWA</th>
              <th>PTS</th>
              <th>UAS</th>
              <th></th>
            </tr>";
    $sql="SELECT * FROM data_siswa,data_kelas,data_schedule WHERE data_siswa.id_kelas=data_kelas.id_kelas AND data_schedule.id_kelas=data_kelas.id_kelas AND data_schedule.id_schedule='$jadwal' AND data_siswa.nis NOT IN (SELECT data_siswa.nis FROM data_siswa,data_nilai WHERE data_siswa.nis = data_nilai.nis AND data_nilai.id_schedule='$jadwal')";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
      echo'<tr><form action="tambahPts.php" method="GET"><td>'.$row["nis"]."</td><td>".$row['nama_siswa'].'</td><td><input type="number" name="pts"></td><td><input type="hidden" name="nis" value="'.$row['nis'].'"><input type="hidden" name="jadwal" value="'.$jadwal.'"><button  type="submit" style= "float: right; margin: 5PX; border: none; background-color: #04AA6D; color: white; border-radius: 15px;" name="tambah"><h3>TAMBAH</h3></button></td></form></tr>';
    }?>
    </table>    
  </div>
</div>
</body>
</html>