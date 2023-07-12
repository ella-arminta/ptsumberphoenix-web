<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $response = 'success';
    for($i = 1;$i <= 3;$i++){
        $stmt = $conn->prepare('UPDATE company_profile set fitur_data=? where fitur_name = ?');
        $berhasil = $stmt->execute([$_POST['title'.$i],'statistics_title'.$i]);
        if(!$berhasil){
            $response='gagal';
        }

        $stmt = $conn->prepare('UPDATE company_profile set fitur_data=? where fitur_name = ?');
        $hasil = $stmt->execute([$_POST['total'.$i],'statistics_total'.$i]);
        if(!$hasil){
            $response='gagal';
        }

        $stmt = $conn->prepare('UPDATE company_profile set fitur_data=? where fitur_name = ?');
        $huahah = $stmt->execute([$_POST['desc'.$i],'statistics_desc'.$i]);
        if(!$huahah){
            $response='gagal';
        }
    }
    echo $response;

}
?>