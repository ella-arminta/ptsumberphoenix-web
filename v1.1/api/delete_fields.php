<?php
include 'connect.php';
session_start();

$id = $_SESSION['id'];
$business_fields_id = $_POST['business_fields_id'];

$sql = "DELETE FROM business_fields WHERE business_fields_id = '$business_fields_id' AND login_id = '$id'";
mysqli_query($conn, $sql);

echo 'success'
?>