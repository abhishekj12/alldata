<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$servername = "localhost";
$username ="abhishek";
$password ="123456";
$dbname ="crud";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>