<?php
include "connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (isset($email) && isset($password)) { // Determine wether email and password is set or not
    
        // check wether a variable is empty or not
        if (empty($email)) {
            header("Location: ../login.php?error=Email is required");
            exit();
        } else if (empty($password)) {
            header("Location: ../login.php?error=Password is required");
            exit();
        } else {
            $stmt = $conn->prepare("SELECT * FROM admin WHERE adm_email = ?");
            $stmt->execute([$email]);
            
    
            if ($stmt->rowCount() == 1) { // check if result more than 0
                $row = $stmt->fetch();
                
                if (password_verify($password, $row['adm_password'])) {
                    $_SESSION['admin_id'] = $row['adm_id'];
                    header("Location: ../index.php");
                    exit();
                } else {
                    header("Location: ../login.php?error=Incorect password");
                    exit();
                }
            } else {
                header("Location: ../login.php?error=Incorect email");
                exit();
            }
        }
    }


}else{
    header('Location: ../');
}
?>