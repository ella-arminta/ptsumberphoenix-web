<?php 
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $empId = $_POST['id'];

    // ambil emp name yang didelete
    $stmt=$conn->prepare("SELECT emp_name from employees where emp_id=?");
    $stmt->execute([$empId]);
    $emp = $stmt->fetch();
    $empName = $emp['emp_name'];

    $stmt=$conn->prepare('DELETE FROM employees where emp_id=?');
    $berhasil = $stmt->execute([$empId]);
    if($berhasil){
        echo 'success';
        
        // add admin log
        $adm_id = $_SESSION['admin_id'];
        $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
        $stmt->execute([$adm_id]);
        $namaAdm = $stmt->fetch();
        $namaAdm = $namaAdm['adm_name'];

        $desc = $namaAdm.' deleted '. $empName.' from team';
        $action = 'delete team';
        $prevData = $empName;
        $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
        $stmt->execute([$action,$desc,$adm_id,$prevData]);
        // end admin log
    }else{
        echo 'gagal';
    }
}
?>