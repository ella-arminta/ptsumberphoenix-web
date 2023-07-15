<?php
include '../api/connect.php';
if(!isset($_GET['category_code']))
{
    header('Location: ../shop.php');
}

// category data
$stmt = $conn -> prepare("SELECT * FROM categories where LOWER(cat_code) = ? and status = 1");
$stmt -> execute([strtolower($_GET['category_code'])]);
if($stmt -> rowCount() <= 0)
{
    header('Location: ../shop.php');
}

$category = $stmt -> fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Library Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../style/copyright.css">
    <link rel="stylesheet" href="../style/nav_templates.css">
    <link rel="stylesheet" href="style/shop.css">

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>PT Sumber Phoenix Makmur | Categories</title>
</head>

<body>
    <br>
    <h1 style="text-align:center;">Edit Category</h1>

    <section class="product-section section-extra">
        <form id="formEditCategory" enctype="multipart/form">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="catName" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="catName" name="catName" value="<?= $category['cat_name'] ?>" aria-describedby="catName" required>
                </div>
                <div class="mb-3">
                    <label for="catCode" class="form-label">Category Code</label>
                    <input type="text" class="form-control" id="catCode" name="catCode" value="<?= $category['cat_code'] ?>" aria-describedby="catCode" disabled>
                </div>
                <div class="mb-3">
                    <label for="catImg" class="form-label">Category Image</label><br>
                    <img src="../<?= $category['cat_img'] ?>" id="previewImage" style="width:40%; margin-bottom: 20px;" alt="">
                    <input type="file" accept="image/*" name="catImg" class="form-control" id="catImg" aria-describedby="catImage">
                </div>

                <!-- Load Sub Categories -->
                <h3 style="text-align:center; margin-top: 60px; margin-bottom: 40px;">Edit Sub Category</h3>
                <?php
                    $stmt = $conn -> prepare('SELECT * FROM subcategories where cat_id = ? and status = 1');
                    $stmt -> execute([$category['cat_id']]);
                    $data = $stmt->fetchAll();
                    $jsonData = json_encode($data);
                    $subIds = [];
                    $subCodes = [];
                    foreach ($data as $item) {
                        $subIds[] = $item['sub_id'];
                        $subCodes[] = $item['sub_code'];
                    }
                    // convert into string
                    $subIds = implode(', ', $subIds);
                    $subCodes = implode(', ', $subCodes);

                    // build the subcat
                    $stmt = $conn -> prepare('SELECT * FROM subcategories where cat_id = ? and status = 1');
                    $stmt -> execute([$category['cat_id']]);
                    while($subcat = $stmt->fetch()):
                ?>
                    <div class="mb-4">
                        <input type="text" class="form-control" id="subNames" name="subNames[]" value="<?= $subcat['sub_name'] ?>" aria-describedby="subNames" required>
                    </div> 

                <?php endwhile; ?>

            </div>
            <div class="modal-footer" style="padding-left: 35px; padding-right: 35px; margin-bottom: 20px;">
                <button type="button" class="btn btn-secondary" style="margin-right:10px;" onclick="history.back()" data-bs-dismiss="modal">Back</button>
                <button type="submit" class="btn btn-primary" >Save Changes</button>
            </div>  
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- save data -->
    <script>
        $(document).ready(() => 
        {
            // image reader
            $('#catImg').on('change', function()
            {
                let reader = new FileReader();
                reader.onload = (e) => 
                {
                    $('#previewImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            })

            $('#formEditCategory').submit(function(e) 
            {
                e.preventDefault();

                // set up form data
                formData = new FormData(this);
                formData.append('catID', "<?= $category['cat_id']; ?>");
                formData.append('catCode', "<?= $category['cat_code']; ?>");

                formData.append('subIDs', "<?= $subIds; ?>");
                formData.append('subCodes', "<?= $subCodes; ?>");

                // confirmation message
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Changes will be saved to this product.',
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: 'gray',
                    confirmButtonText: 'Yes, save changes'
                })
                .then((result) => 
                {
                    // If user confirmed editting
                    if(result.isConfirmed)
                    {
                        $.ajax({
                            type: "POST",
                            url: "api/editCategory/saveEditCategory.php",
                            data: formData,
                            contentType: false,
                            cache: false,
                            processData:false,
                            
                            // succeed response
                            success: (response) => 
                            {
                                // not yet login
                                if(response === 'loginFirst')
                                {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Please Login First',
                                        text: 'Please Login First'
                                    })
                                    .then(function() {
                                        window.location.href = 'login.php';
                                    });
                                }

                                // success editing
                                else if(response === 'success')
                                {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Saved!',
                                        text: 'Product Changes Saved.'
                                    })
                                    .then(function() {
                                        location.reload()
                                    });
                                }

                                // invalid image type
                                else if(response === 'imageType')
                                {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Invalid Image Type',
                                        text: 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'
                                    })
                                    .then(function() {
                                        location.reload()
                                    });
                                }

                                // failed image uploading
                                else if(response === 'failedImageUpload')
                                {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Failed Image Upload',
                                        text: 'Failed uploading image data to the database'
                                    })
                                    .then(function() {
                                        location.reload()
                                    });
                                }

                                else if(response === 'error')
                                {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Failed!',
                                        text: 'Something went wrong, please try again a few moments later'
                                    })
                                }

                                else
                                {
                                    Swal.fire({
                                        icon: 'error',
                                        title: response
                                        // text: 'Something went wrong, please try again a few moments later'
                                    })
                                }
                            },

                            // something went wrong
                            error: (xhr, status, error) => 
                            {
                                console.log(xhr.responseText);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed!',
                                    text: 'Something went wrong, please try again a few moments later'
                                })
                            }
                        })
                    }
                });
            })
        })
    </script>
</body>
</html>