<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data['data']= [];
    $stmt = $conn->prepare("SELECT * FROM testimonials where status = 1 or status = 2 ORDER BY timestamp ASC ");
    $stmt->execute();
    $num = 0;
    while($row = $stmt->fetch()){
        // counter
        $row1['count'] = ++$num;
        $row1['fullname'] = htmlspecialchars($row['testi_name']);
        $row1['about'] = htmlspecialchars($row['testi_intro']);
        $row1['pp'] = '<button class="btn btn-primary viewPPTesti" for="'.htmlspecialchars($row['testi_pp']).'" data-bs-toggle="modal" data-bs-target="#profilePictureModal">View</button> ';
        $row1['testimony'] = '<div class="testi_table_tr">'.htmlspecialchars($row['testi_isi']).'</div>';

        // status :
            //  1 -> not deleted, is in review not publish
            //  2 -> published
            //  0 -> deleted
        // action
        // delete
        // edit
        // publish
        $row1['action'] = '<div style="display:flex;gap:3px;">
        <button class="btn btn-dark delTesti" target="'.$row['testi_id'].'"><i class="fa-solid fa-trash-can"></i></button>
        <button class="btn btn-danger butTestiModal" data-bs-toggle="modal" data-bs-target="#testiEditModal"  target="'.$row['testi_id'].'"><i class="fa-solid fa-pencil"></i></button>
        ';
        if($row['status'] == 2){
            $row1['action'] .= '<button class="btn btn-danger pubButtonTesti" thebool=0 target="'.$row['testi_id'].'">Unpublish</button></div>';
        }else{
            $row1['action'] .= '<button class="btn btn-primary pubButtonTesti" thebool=1 target="'.$row['testi_id'].'" >Publish</button></div>';
        }
        array_push($data['data'],$row1);
    }
    echo json_encode($data);
};
?>