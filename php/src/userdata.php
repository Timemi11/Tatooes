<?php
    include "connect.php";
    session_start();
    $username = mysqli_real_escape_string($conn,$_SESSION['user']);
    $query="SELECT username, date, time FROM datatatooes WHERE username = '$username' ";
    $result = mysqli_query($conn,$query);

    
    //check date is empty or not?, case empty is '0000-00-00' and format is 'Y-m-d'
    if(mysqli_num_rows($result) == 1){
        while ($row = mysqli_fetch_array($result)) {
           $date = $row['date']; 
           $time = $row['time'];
           
        //เหลือเช็คเวลา เก็บข้อมูลง db
            

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage-Tatooes</title>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
    <div class="container">       
            <?php 

            if (($date != '0000-00-00' && !is_null($date) ) && ($time != '00:00:00' && !is_null($time)  )) { //case not empty
                //<!-- แสดงหลังมีข้อมูลแล้ว -->
                $mydate =  date('Y-m-d',strtotime($date));
                $mytime = date("H:i:s",strtotime($time));
                echo "<div class='HaveData'>";
                echo "<h1>วันและเวลาการจองของท่านคือ </h1>";
                echo "<h2>" ." วันที่ ". htmlspecialchars($mydate)." เวลา " . htmlspecialchars($mytime) . "</h2>";
                echo "<div class='btn'>";
                echo "<a href='edit.php'>แก้ไขข้อมูล</a>" ;
                echo "</div>";
                echo "<div class='Logoutbtn'>";
                echo "<a href='logout.php'>ออกจากระบบ</a>";
                echo "</div>";
                echo "</div>";                
            } else { //is empty
                echo "<div class='notHaveData'>";
                echo "<h1>ไม่พบข้อมูลกรุณาเลือกวันและเวลาของท่าน</h1>";
                echo "<div class='btn'>";
                echo "<a href='userbook.php'>เลือกวันเวลา</a>" ;
                echo "</div>";
                echo "<div class='Logoutbtn'>";
                echo "<a href='logout.php'>ออกจากระบบ</a>";
                echo "</div>";
                echo "</div>";
            }
        }
    }
            ?>
       
    </div>
</body>
</html>