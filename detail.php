<?php
    include "conn.php";
        
    $id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="detail.css">
</head>
<body>
    <a href="index.php" id="back_button"><< Home</a>
    <h1 id="title_head"></h1>
    <div id="activity_detail">
        <table>
            <script>
                const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                var currDate = new Date("<?php echo $id?>");
                var title = document.getElementById("title_head");
                title.innerText = weekday[currDate.getDay()]+", "+currDate.getDate()+" "+month[currDate.getMonth()]+" "+ currDate.getFullYear();
            </script>
            <thead>
                <th>No.</th>
                <th>Activity</th>
                <th>Priority</th>
                <th>Duration</th>
                <th>Location</th>
                <th>Photo</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM activity_list WHERE tanggal_kegiatan = '".$id."' ORDER BY waktu_mulai";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) == 0){
                        echo("<h3>No Data Found</h3>");
                    }
                    if(mysqli_num_rows($result) > 0){
                        $i = 1;
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row["nama_kegiatan"]."</td>";
                            echo "<td>".$row["level_kegiatan"]."</td>";
                            echo "<td>".$row["waktu_mulai"]." - ".$row["waktu_berakhir"]."</td>";
                            echo "<td>".$row["lokasi_kegiatan"]."</td>";
                            if ($row["gambar_kegiatan"] == ""){
                                echo "<td></td>";
                            }else{
                                echo "<td><img src='".$row["gambar_kegiatan"]."' width='150' height='150'></td>";
                            }
                            echo "<td><a  class='update_button' href='update.php?id=".$row["id"]."'>Update</a>&nbsp;<a class='delete_button' href='delete.php?id=".$row["id"]."'>Delete</a></td>";
                            echo "</tr>";
                            $i++;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div>
        <?php echo "<button class='button'> <a href='form.php?id=".$id."'>Add Activity</a></button>"?>
    </div>
</body>
</html>