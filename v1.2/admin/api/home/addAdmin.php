<?php
include '../connect.php';
$response ="";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["name"];  
    if (!preg_match("/^([a-zA-Z' ]+)$/",$name)) {  
        $response = "Name only alphabets and whitespace are allowed.";    
    }else{
        $email = $_POST["email"];
        $stmt=$conn->prepare("SELECT * FROM admin WHERE adm_email = ?");
        $stmt->execute([$email]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response = "Invalid email format";
        }else if($stmt->rowCount() > 0){
            $response = "Account with this email already registered";
        }
        else{
            $password = $_POST['password'];
            // #Admin123
            // Validate password strength
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $response =  'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            }else{
                $password_hashed = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare('INSERT INTO admin (adm_name,adm_email,adm_password) values (?,?,?)');
                $stmt->execute([$name,$email,$password_hashed]);
                $response = 'success';

                // add admin log
                $adm_id = $_SESSION['admin_id'];
                $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
                $stmt->execute([$adm_id]);
                $row = $stmt->fetch();
                $namaAdm = $row['adm_name'];

                $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
                $stmt->execute(['addAdmin',$namaAdm.' added '.$name.' as an admin',$adm_id,'none']);
            }
        }
    } 
    echo $response;

    
}
?>