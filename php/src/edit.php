<?php
    include "connect.php";
    session_start();
    $username = $_SESSION['user'];
    
    if(isset($_POST['submit'])){
        $date = date('Y-m-d',strtotime($_POST['date']));
        $time = date("H:i:s",strtotime($_POST['time']));
        $query = "SELECT * FROM datatatooes WHERE username = '$username'"; 
        $result = mysqli_query($conn,$query);
        
        if(mysqli_num_rows($result) == 1){
            $queryinsert = "UPDATE datatatooes SET  date = '$date', time ='$time' WHERE username = '$username' ";
            mysqli_query($conn,$queryinsert);
            header('Location:finish.php');
           
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateDateTime</title>
    <link rel="stylesheet" href="../css/book.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "POST">
        <div class="back"><a href="userdata.php">กลับหน้าแรก</a></div>
        <h1>ปรับปรุงวันเวลาการจอง</h1>
        <label for="date">เลือก(ว/ด/ป)</label>
        <input type="date" name="date" required>
        <label for="time">เลือกเวลา</label>
        <input type="time" name="time" required>
        <input type="submit" name="submit" value="ยืนยัน">
    </form>


</body>
</html>