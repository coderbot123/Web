<?php 
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'sourcecodester_bookdb'); 
define('DB_USER','root'); 
define('DB_PASSWORD',''); 

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$con) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
$db = mysqli_select_db($con, DB_NAME);
if (!$db) {
    die("Failed to select database: " . mysqli_error($con));
}
$conn = $con; // alias nếu bạn dùng code có biến $conn
?>