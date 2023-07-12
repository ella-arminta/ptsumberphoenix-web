<?php
include '../connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION['cat'] = $_POST['cat'];
    echo $_SESSION['cat'];
}

?>