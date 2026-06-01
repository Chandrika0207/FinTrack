<?php
$con = mysqli_connect("localhost", "root", "", "finance_tracking");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>