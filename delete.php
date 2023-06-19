<?php
    include "conn.php";

    $id = $_GET["id"]; 
    $sql = "SELECT tanggal_kegiatan, gambar_kegiatan FROM activity_list WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $oldTanggal = $row["tanggal_kegiatan"];
        $oldPhoto = $row["gambar_kegiatan"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 0;
    padding: 0;
    background-color: #e0dfc8;
  }
  
  h4 {
    color: #442422;
    margin: 20px 0;
  }
</style>
<body>
    <?php
    if ($oldPhoto=="") {
        $sql = "DELETE FROM activity_list WHERE id=$id";
            if(mysqli_query($conn, $sql)){
                echo "<h4>Kegiatan Berhasil dihapus!</h4>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            header("refresh: 3 ; url=$_SERVER[HTTP_REFERER]");
    }else{
        if (unlink($oldPhoto)) { 
            $sql = "DELETE FROM activity_list WHERE id=$id";
            if(mysqli_query($conn, $sql)){
                echo "<h4>Kegiatan Berhasil dihapus!</h4>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            header("refresh: 3 ; url=$_SERVER[HTTP_REFERER]");
        }
    }
    ?>
</body>
</html>
