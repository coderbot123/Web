<!-- Kết nối CSDL -->
<?php 
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'sourcecodester_bookdb'); 
define('DB_USER','root'); 
define('DB_PASSWORD',''); 

// Use MySQLi to connect to the database
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

// Check connection
if (!$con) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Select database
$db = mysqli_select_db($con, DB_NAME);

// Check if the database selection was successful
if (!$db) {
    die("Failed to select database: " . mysqli_error($con));
}
?>
