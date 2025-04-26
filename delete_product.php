<?php
require 'dbconnect.php';
$pid = $_GET['pid'] ?? '';

if ($pid) {
    mysqli_query($con, "DELETE FROM products WHERE PID='$pid'");
}
header("Location: admin_dashboard.php");
exit();
?>
