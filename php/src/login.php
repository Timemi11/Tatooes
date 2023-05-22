<?php
    include "connect.php";
    session_start();
    error_reporting(0);
    if(isset($_POST['submit']) && $_POST['randcheck']==$_SESSION['rand']){
        $username = mysqli_real_escape_string($conn,$_POST['Username']);
        $password = hash( 'sha512', ($_POST['Password']));
        $query = "SELECT * FROM datatatooes WHERE (username = '$username' OR email = '$username') AND password = '$password'  ";
        $result = mysqli_query($conn,$query);  
        if (mysqli_num_rows($result) == 1 )  {
            $fecth_data = mysqli_fetch_array($result);
             if(  $fecth_data['username'] == $username &&  $fecth_data['password'] == $password)
             {
                header("Location:userdata.php");
                $_SESSION['user'] = $fecth_data['username'];
            }
             else if($fecth_data['email'] == $username && $fecth_data['password'] == $password)
            {
                header("Location:userdata.php");
                $_SESSION['user'] = $fecth_data['username'];
            }
        }else{
            $_SESSION['notice'] = ' Username หรือ Password ไม่ถูกต้องกรุณาลองใหม่';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="formContainer">
        <h1>LOG-IN</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            <?php 
        //check value session for security and not resent previous data from form
        $rand=rand();
        $_SESSION['rand']=$rand;
            ?>
            <a href="index.php" style="color:black;"><i class="bi bi-arrow-left">หน้าแรก</i></a>
            <input type="hidden" value="<?php echo htmlspecialchars($rand); ?>" name="randcheck" />
            <span class="fa-regular fa-user">
            <input type="text" name="Username" placeholder="Username" required>
            </span>
            <span class="fa-solid fa-lock">
            <input type="password" name="Password" placeholder="Password" required>
            </span>
            <input type="submit" name="submit" value="ยืนยัน">
            <?php
                echo "<p style='color:red;'>";
                echo htmlspecialchars($_SESSION['notice']);
                echo "</p>";
                unset($_SESSION['notice']);
                ?>
            <a href="sigin.php">>>>  ยังไม่มีสมาชิกสมัครสมาชิก?  <<<</a>
        </form>
</div>

</body>
</html>