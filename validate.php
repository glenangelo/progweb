<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Activity</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>
  <h1>Tambah Kegiatan</h1>
  <div id="add_activity">
  <form method="post" action="dump.php" onsubmit="return validateForm()">
        <table>
          <tr>
            <td><label for="activity_name">Nama Kegiatan</label></td>
            <td><input type="text" name="activity_name" ></td>
          </tr>
          <tr>
            <td><label for="activity_date">Tanggal Kegiatan</label></td>
            <td><input type="date" name="activity_date" value="<?php echo $id?>" ></td>
          </tr>
          <tr>
            <td><label for="activity_level">Level Kegiatan</label></td>
            <td>
              <select name="activity_level" >
                <option value="HIGH">HIGH</option>
                <option value="MED">MED</option>
                <option value="LOW">LOW</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="activity_timebegin">Waktu Mulai</label></td>
            <td><input type="time" name="activity_timebegin" ></td>
          </tr>
          <tr>
            <td><label for="activity_timeend">Waktu Berakhir</label></td>
            <td><input type="time" name="activity_timeend" ></td>
          </tr>
          <tr>
            <td><label for="activity_location">Lokasi Kegiatan</label></td>
            <td><input type="text" name="activity_location" ></td>
          </tr>
          <tr>
            <td><label for="upload">Gambar Kegiatan</label></td>
            <td><input type="file" name="upload"></td>
          </tr>
          <tr>
            <td></td>
            <td>
              <button id="add_button" type="submit">Add</button> 
              <button id="reset_button" type="reset">Reset</button>
            </td>
          </tr>
        </table>
      </form>
      <span id="errorMessage" hidden></span>
  </div>
</body>
</html>
<script src="dump.js"></script>
