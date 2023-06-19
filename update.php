<?php
    include "conn.php";

    if($_GET){
        $id = $_GET["id"];
        $sql = "SELECT * FROM activity_list WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $oldNama = $row["nama_kegiatan"];
            $oldTanggal = $row["tanggal_kegiatan"];
            $oldLevel = $row["level_kegiatan"];
            $oldWaktuMulai = $row["waktu_mulai"];
            $oldWaktuBerakhir = $row["waktu_berakhir"];
            $oldLokasi = $row["lokasi_kegiatan"];
            $oldGambar = $row["gambar_kegiatan"];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Activity</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>
  <h1>Update Kegiatan</h1>
  <div id="add_activity">
      <form action="upload_update.php?id=<?php echo $id?>" method="post" name="add_activity_form" enctype="multipart/form-data">
        <table>
          <tr>
            <td><label for="activity_name">Nama Kegiatan</label></td>
            <td><input type="text" name="activity_name" value="<?php echo $oldNama?>" required></td>
          </tr>
          <tr>
            <td><label for="activity_date">Tanggal Kegiatan</label></td>
            <td><input type="date" name="activity_date" value="<?php echo $oldTanggal?>" required></td>
          </tr>
          <tr>
            <td><label for="activity_level">Level Kegiatan</label></td>
            <td>
              <select name="activity_level" required>
                <option name= "HIGH" value="HIGH">HIGH</option>
                <option name="MED" value="MED">MED</option>
                <option name="LOW" value="LOW">LOW</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="activity_timebegin">Waktu Mulai</label></td>
            <td><input type="time" name="activity_timebegin" value="<?php echo $oldWaktuMulai?>" required></td>
          </tr>
          <tr>
            <td><label for="activity_timeend">Waktu Berakhir</label></td>
            <td><input type="time" name="activity_timeend" value="<?php echo $oldWaktuBerakhir?>" required></td>
          </tr>
          <tr>
            <td><label for="activity_location">Lokasi Kegiatan</label></td>
            <td><input type="text" name="activity_location" value="<?php echo $oldLokasi?>" required></td>
          </tr>
          <tr>
            <td><label for="upload">Gambar Kegiatan</label></td>
            <td><input type="file" name="upload"></td>
            <img src="<?php echo $oldGambar?>" width="100" height="100">
          </tr>
          <tr>
            <td></td>
            <td>
              <button id="add_button" type="submit">Update</button> 
              <button id="reset_button" type="reset">Reset</button>
            </td>
          </tr>
        </table>
      </form>
  </div>
</body>
</html>
<script>
  const dump = "<?php echo $oldLevel?>"
  var x = document.getElementsByName(dump)[0] ; 
  x.setAttribute("selected","selected");
</script>
