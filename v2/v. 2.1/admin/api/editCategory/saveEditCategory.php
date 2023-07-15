<?php
include '../connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(!isset($_SESSION['admin_id']))
    {
        echo 'loginFirst';
        exit;
    }

    // set functions
    function setAdmLog(string $desc, string $action, string $prevData, $conn)
    {
        // get admin information
        $adm_id = $_SESSION['admin_id'];
        $stmt = $conn->prepare('SELECT adm_name from admin where adm_id=?');
        $stmt -> execute([$adm_id]);
        $name = $stmt->fetch()['adm_name'];

        // define update
        $desc = $name.''.$desc;
        $stmt = $conn->prepare("INSERT into admin_log (action, log_desc, admin_id, prev_data) values (?, ?, ?, ?)");
        $stmt -> execute([$action, $desc, $adm_id, $prevData]);
    }

    // set params
    $catId = $_POST['catID'];
    $catCode = $_POST['catCode'];
    $catName = $_POST['catName'];
    $subNames = $_POST['subNames'];
    $subCodes = $_POST['subCodes'];

    // convert str into array
    $subCodes = explode(', ', $subCodes);

    $response = 'success';
    try
    {
        // update category data (w/o image)
        $stmt = $conn->prepare('UPDATE categories set cat_name=? where cat_id=? and status=1');
        $stmt -> execute([$catName, $catId]);

        // update admin log
        $desc = ' has edited a category data with this Code '.$catCode;
        $action = 'edit category';
        $prevData = $catCode;
        setAdmLog($desc, $action, $prevData, $conn);

        // update sub category data
        $count = 0;
        foreach($subNames as $name)
        {
            // update subcategory data
            $stmt = $conn->prepare('UPDATE subcategories set sub_name=? where sub_code=? and status=1');
            $stmt -> execute([$name, $subCodes[$count]]);
            
            // set increment
            $count++;
        }

        // update image data
        if(isset($_FILES['catImg']) && !empty($_FILES['catImg']['tmp_name']))
        {
            // set image params
            $target_dir = '../../../data/product/';
            $rename = time().'-'.basename($_FILES["catImg"]["name"]);
            $target_file = $target_dir . $rename;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $img_name = 'data/product/'.$rename;

            // update database
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
            {
                $response = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $response = 'imageType';
                echo 'imageType';
                exit;
            } 
            
            else 
            {
                if (move_uploaded_file($_FILES["catImg"]["tmp_name"], $target_file)) 
                {
                    $stmt = $conn->prepare("UPDATE categories set cat_img =? where cat_id=? and status=1");
                    $stmt->execute([$img_name,$catId]);
                }
                
                else
                {
                    $response = 'Failed To Upload Image';
                    echo 'failedImageUpload';
                    $response = 'failedImageUpload';
                    exit;
                }
            }
        }
    }

    catch(PDOException $e)
    {
        // rollback any transaction
        $conn -> rollback();
        echo 'error';
        $response = 'error';
        exit;
    }

    echo $response;
}
?>