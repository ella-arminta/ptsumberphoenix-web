<?php
$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "pt_sumber_phoenix_1";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    echo "Connection Failed";
}
?>