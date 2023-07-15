<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $msg = htmlspecialchars($_POST['msg']);
    $stmt = $conn->prepare("INSERT INTO messages (name,email,subject,msg) values (?,?,?,?)");
    $berhasil = $stmt->execute([$nama,$email,$subject,$msg]);
    if($berhasil){
        header("Location: ../contact.php?stat=success");
    }else{
        header("Location: ../contact.php?stat=failed");
    }

}
?>