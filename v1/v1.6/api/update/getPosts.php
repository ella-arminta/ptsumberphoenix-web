<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $jum = $_POST['jum'];
    $posts = json_decode(json_encode(json_decode($_POST['posts'])), true);
    $four = json_decode(json_encode(json_decode($_POST['four'])), true);
    $ids = [];
    // post ids
    for ($i=0; $i < count($posts) ; $i++) { 
        array_push($ids,$posts[$i]['upd_id']);
    }
    for ($i=0; $i < count($four); $i++) { 
        array_push($ids,$four[$i]['upd_id']);
    }
    // Create an array of ? characters the same length as the number of IDs and join
    // it together with commas, so it can be used in the query string
    $placeHolders = implode(', ', array_fill(0, count($ids), '?'));
    if(count($ids) > 0){
        $stmt = $conn->prepare("SELECT * FROM updates where status ='published' and upd_id NOT IN ($placeHolders) order by timestamp desc LIMIT ?");
        // Iterate the IDs and bind them
        // Remember ? placeholders are 1-indexed!
        foreach ($ids as $index => $value) {
            $stmt->bindValue($index + 1, $value, PDO::PARAM_INT);
        }
        $stmt->bindValue(count($ids)+1,$jum);
        $stmt->execute();
    }else{
        $stmt = $conn->prepare("SELECT * FROM updates where status ='published' order by timestamp desc LIMIT ?");
        $stmt->execute([$jum]);
    }
    while($row = $stmt->fetch()){
        array_push($posts,$row);
    }
    echo json_encode($posts);
}?>