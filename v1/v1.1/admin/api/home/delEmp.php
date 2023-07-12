<?php 
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $empId = $_POST['id'];
    $stmt=$conn->prepare('DELETE FROM employees where emp_id=?');
    $berhasil = $stmt->execute([$empId]);
    if($berhasil){
        echo 'success';
    }else{
        echo 'gagal';
    }
}
?>