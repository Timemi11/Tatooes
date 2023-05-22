<?php
    session_start();
    include "connect.php";
   $text ="";
    if(isset($_POST['submit']) && $_POST['randcheck']==$_SESSION['rand']  ){
        
            $email = mysqli_real_escape_string($conn,$_POST['Email']); //prevent sql injection
            $username = mysqli_real_escape_string($conn,$_POST['Username']); //same as above
            $password = hash( 'sha512', ($_POST['Password'])); //encode password
            
            $query="SELECT * FROM datatatooes WHERE username = '$username' OR email ='$email' ";
            $sql = mysqli_query($conn,$query);
            if(mysqli_num_rows($sql)>=1)
                {
                    $text .= "มี Email และ Username นี้แล้วกรุณาลองใหม่";
                }
                else
                {
                    //insert query goes here
                    $query = "INSERT INTO datatatooes (email,username,password ) VALUES ('$email','$username','$password')";
                    $result = mysqli_query($conn, $query);
                    echo "<script>alert('ลงทะเบียนเสร็จสิ้น')</script>";
                    session_unset();
                }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div class="formContainer">
        <h1>Sign-In</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "POST">
        <?php
        //check value session for security and not resent previous data from form
            $rand=rand();
            $_SESSION['rand']=$rand; 
        ?>
        <a href="index.php" style="color:black;"><i class="bi bi-arrow-left">หน้าแรก</i></a>
        <input type="hidden" value="<?php echo htmlspecialchars($rand); ?>" name="randcheck" />
        <span class="fa-regular fa-envelope"  >
            <input type="email" name="Email" placeholder="Email" required>
        </span>
        <span class="fa-regular fa-user">
            <input type="text" name="Username" placeholder="Username" required>
        </span>
        <span class="fa-solid fa-lock">
            <input type="password" name="Password" placeholder="Password" required>
        </span>
        <input type="submit" name="submit" value="สมัครสมาชิก">
        <?php
            echo "<p style='color:red;'>";
            echo  htmlspecialchars($text)  ;
            echo "</p>";
        ?>
        <a href="login.php">>>>  มีสมัครสมาชิกอยู่แล้ว คลิก! <<<</a>  
    </form>
</div>
</body>
</html>