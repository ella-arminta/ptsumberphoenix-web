<?php
    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "pt_sumber_phoenix";
    $charset = "utf8mb4";

//pdo
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset;";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Data dikembalikan dalam bentuk object bukan array
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $conn = new PDO($dsn, $username, $password, $options);
    } catch (\PDOException $e) {
        echo "Error Connect to Database Msg: ".$e->getMessage();
    }

session_start();
?>