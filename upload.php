<?php
    require "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Data</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <?php
        if (isset($_FILES["upload"]["name"])) {
        $isValid = true;
        $fileType = strtolower(pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION));
        
        if ($fileType == ''){
            $activity_name = $_POST["activity_name"];
            $activity_date = $_POST["activity_date"];
            $activity_level = $_POST["activity_level"];
            $activity_timebegin = $_POST["activity_timebegin"];
            $activity_timeend = $_POST["activity_timeend"];
            $activity_location = $_POST["activity_location"];
            $upload = "";

            $sql = "INSERT INTO activity_list(nama_kegiatan, tanggal_kegiatan, level_kegiatan, waktu_mulai, waktu_berakhir, lokasi_kegiatan, gambar_kegiatan) VALUES ('$activity_name', '$activity_date', '$activity_level', '$activity_timebegin', '$activity_timeend', '$activity_location', '$upload')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<h1>Berhasil menambahkan kegiatan</h1>";
            }else{
                echo "<h1>Gagal menambahkan kegiatan</h1>";
            }
            $isValid = false;
            header("refresh: 4 ; url=detail.php?id=".$activity_date);
        } elseif ($fileType != 'jpg' && $fileType != 'jpeg' && $fileType != 'png') {
            $isValid = false;
            echo "File yang diupload bukan gambar";
            header("refresh: 3 ; url=$_SERVER[HTTP_REFERER]");
        }

        if ($isValid) {
                echo "<div id='add_activity'>";
                echo "Keterangan file <br>";
                echo "Upload : ".$_FILES["upload"]["name"]." <br>";
                echo "Type: ".$_FILES["upload"]["type"]." <br>";
                echo "Size: ".($_FILES["upload"]["size"]/1024)."Kb <br>";
                echo "Stored in: ".$_FILES["upload"]["tmp_name"]." <br>";
                

                $tmp = $_FILES["upload"]["tmp_name"];
                $uploadfile = "upload/".$_FILES["upload"]["name"];

                if (file_exists($uploadfile)) {
                    echo "<br> Status: Tidak boleh menggunakan foto yang sama.";
                    header("refresh: 3 ; url=$_SERVER[HTTP_REFERER]");
                } else if (($_FILES["upload"]["size"]/1024/1024) > 1){
                    echo "<br> Status: Tidak boleh lebih dari 1MB.";
                    header("refresh: 3 ; url=$_SERVER[HTTP_REFERER]");
                } else{
                if (move_uploaded_file($_FILES["upload"]["tmp_name"], $uploadfile)) {
                    $activity_name = $_POST["activity_name"];
                    $activity_date = $_POST["activity_date"];
                    $activity_level = $_POST["activity_level"];
                    $activity_timebegin = $_POST["activity_timebegin"];
                    $activity_timeend = $_POST["activity_timeend"];
                    $activity_location = $_POST["activity_location"];

                    $query = "INSERT INTO activity_list(nama_kegiatan, tanggal_kegiatan, level_kegiatan, waktu_mulai, waktu_berakhir, lokasi_kegiatan, gambar_kegiatan) VALUES ('$activity_name', '$activity_date', '$activity_level', '$activity_timebegin', '$activity_timeend', '$activity_location', '$uploadfile')";
                    $res = mysqli_query($conn, $query);
                    echo "<br> Status: Sukses Upload!!!";
                    header("refresh: 5 ; url=detail.php?id=".$activity_date);
                    }
                else {
                        echo "<br>Status: Gagal upload";}
                    }
                    echo "</div>";
                }
                }
            else{
                echo "<h1>Masih Kosong</h1>";
            }
    ?>
</body>
</html>