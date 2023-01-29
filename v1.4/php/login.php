<?php
session_start();
include "connect.php";

$email = $_POST['email'];
$password = $_POST['password'];

if (isset($email) && isset($password)) { // Determine wether email and password is set or not

    function validate($data) {
        $data = trim($data); // Remove white spaces
        $data = stripslashes($data); // remove slashes
        $data = htmlspecialchars($data); // convert speacial chars to html entities

        return $data;
    }

    $email = validate($email);
    $password = validate($password);

    // check wether a variable is empty or not
    if (empty($email)) {
        header("Location: ../templates/wp-admin.php?error=Email is required");
        exit();
    } else if (empty($password)) {
        header("Location: ../templates/wp-admin.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql); // run sql message querry

        if (mysqli_num_rows($result) === 1) { // check if result more than 0
            $row = mysqli_fetch_assoc($result);
            print_r($row); // print result message
            if ($row['email'] === $email && $row['password'] === $password) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['login_id'];
                header("Location: ../templates/admin/home/home.php");
                exit();
            } else {
                header("Location: ../templates/wp-admin.php?error=Incorect email or password");
                exit();
            }
        } else {
            header("Location: ../templates/wp-admin.php?error=Incorect email or password");
            exit();
        }
    }
}
?>