<?php
$hostname_db = "db";
$userid_db = "MYSQL_USER";
$userpwd_db = "MYSQL_PASSWORD";
$db_name = "tatooes";
$conn = mysqli_connect($hostname_db, $userid_db, $userpwd_db, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
else {
    //echo "conmected";
     }
?>