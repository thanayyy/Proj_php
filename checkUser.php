<?php
session_start();
$Username = $_POST['username'];
$Password = $_POST['password'];
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "moviesystem";
$conn = mysqli_connect( $hostname, $username, $password );
if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้");
mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล session ได้" );
$sqltxt = "SELECT * FROM customer where username = '$Username'";
$result = mysqli_query ( $conn, $sqltxt );
$rs = mysqli_fetch_array ( $result );
if ( $rs ) {
if ($rs['password'] == $Password) {
$_SESSION['Username']=$Username;
header("Location: welcome.php?Username=$Username");
}
else {
echo "<br>Password not match.";
echo "<br><a href='login.php'>คลิก กลับไปเพื่อ login</a>";
}
}
else {
echo "Not found Username " . $Username;
echo "<br><a href='index.php'>คลิก กลับไปเพื่อ login </a>";
}
?>