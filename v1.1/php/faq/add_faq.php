<?php
include '../connect.php';
session_start();

$id = $_SESSION['id'];

if (isset($_POST['add'])) {
    print_r($_POST);
}
?>