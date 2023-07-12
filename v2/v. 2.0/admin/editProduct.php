<?php
include '../api/connect.php';
if (!isset($_GET['product_code'])){
    header('Location: ../shop.php');
}
$stmt = $conn->prepare("SELECT * FROM products where LOWER(product_code) = ? and status = 1");
    $stmt->execute([strtolower($_GET['product_code'])]);
    if($stmt->rowCount() <= 0){
        if(isset($_GET['subCode'])){
            header('Location: ../shop.php?subCode='.$_GET['subCode']);
        }else{
            header('Location: ../shop.php');
        }
       
    }
    
    $product = $stmt->fetch();
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
    <!-- <link rel="stylesheet" href="../style/product/shop.css"> -->

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CKEDITOR buat description product-->
    <!-- <script src="script/ckeditor/ckeditor.js"></script>
    <script src="script/sample.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

    <title>PT Sumber Phoenix Makmur | Products</title>
</head>
<style>
    .product-section{
        padding-top: 0;
    }
    body{
        overflow-x: hidden;
    }
    #formEditProduct{
        padding: 57px;
    }
</style>
<body>
    <br>
    <h1 style="text-align:center;">Edit Product</h1>
    <!-- Product Section -->
    <section class="product-section section-extra">
        
            <form id="formEditProduct" enctype="multipart/form-data">
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="proName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="proName" name="proName" value="<?= $product['product_name'] ?>" aria-describedby="productName" required>
                        </div>
                        <div class="mb-3">
                            <label for="proCode" class="form-label">Product Code</label>
                            <input type="text" class="form-control" id="proCode" name="proCode" value="<?= $product['product_code'] ?>" aria-describedby="productCode" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="proImg" class="form-label">Product Image</label>
                            <br>
                            <img src="../<?= $product['product_img'] ?>" id="previewImage" style="width:80%" alt="">
                            <input type="file" accept="image/*" name="proImg" class="form-control" id="proImg" aria-describedby="productImage">
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Product Description</label>
                            <div class="col-md-12">
                                <div class="adjoined-bottom">
                                    <div class="grid-container">
                                        <div class="grid-width-100">
                                            <textarea id="editor" name="isi" required>
                                                <?= $product['product_desc'] ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- <textarea class="form-control" rows="10" id="isi" name="isi"></textarea> -->
                            </div>
                        </div>  
                        <div class="mb-3">
                            <div class="getCategories">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="margin-right:10px;" onclick="history.back()" data-bs-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary" >Save Changes</button>
                </div>  
            </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="script/shop.js"></script>
    <!-- ckeditor -->
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
        function isValidJSON(jsonString) {
            try {
                JSON.parse(jsonString);
                return true;
            } catch (e) {
                return false;
            }
        }
        $(document).ready(function(){
            $('#proImg').on('change', function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            fetchSubs();
            $(window).on('load', function() {
                fetchSubs();
            });
            $('#formEditProduct').submit(function(e){
                e.preventDefault();

                formData =  new FormData(this);
                formData.append('proId', '<?= $product['product_id']; ?>');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Changes will be saved to this product.",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: 'gray',
                    confirmButtonText: 'Yes, save changes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "api/editProduct/saveEditProduct.php",
                            data: formData,
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function (response) {
                                if(response == 'success'){
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Saved!',
                                        text: 'Product Changes Saved.'
                                    }).then(function() {
                                        location.reload()
                                    });
                                }else if(response == 'loginFirst'){
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Please Login First',
                                        text: 'Please Login First'
                                    }).then(function() {
                                        window.location.href = 'login.php';
                                    });
                                }else if(response == 'subcatNotValid'){
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Subcategory Not Valid',
                                        text: 'Subcategory that you choose is not valid'
                                    })
                                }else if(response == 'failed to upload to database'){
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Failed!',
                                        text: 'Failed to upload to database.'
                                    })
                                }
                                else if(response == 'imageType'){
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Image File type is not allowed!',
                                        text: 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'
                                    })
                                }
                                else if(response == 'failedImageUpload'){
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Failed to upload Image',
                                        text: 'Something went wrong, please try again a few moments later'
                                    })
                                }
                                else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Failed!',
                                        text: 'Something went wrong, please try again a few moments later'
                                    })
                                }
                                
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr.responseText);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed!',
                                    text: 'Something went wrong, please try again a few moments later'
                                })
                            }
                        });
                    }
                })
            })
        })
        function fetchSubs() {
            $.ajax({
                type: "POST",
                url: "api/shop/getSub.php",
                data: "",
                success: function (response) {
                    if(response != ''){
                        response = JSON.parse(response);
                    }else{
                        response = []
                    }
                    hasil ="";
                    tot =0;
                    for (j = 0;j<response[3].length;j++){
                        hasil +=`
                            <label for="custServ" class="form-label">`+response[2][j]+`</label>
                            <div class="subcheck-group">
                        `
                        for(i =0;i<response[3][j];i++){
                            hasil+= `
                            <div class="form-check">
                                <input class="form-check-input" name="subs[]" type="checkbox" value="`+response[0][tot]+`" id="check-`+response[0][tot]+`">
                                <label class="form-check-label" for="check-`+response[0][tot]+`">
                                    `+response[1][tot]+`
                                </label>
                            </div>
                            `;
                            tot += 1;
                        }
                        hasil += `</div>`;
                    }
                    
                    // $('.subcheck-group').html(hasil);
                    $('.getCategories').html(hasil)
                }
            });
            $.ajax({
                type: "POST",
                url: "api/editProduct/getSubcat.php",
                data: {
                    proId: <?= $product['product_id'] ?>
                },
                success: function (response) {
                    if(isValidJSON(response)){
                        subs = JSON.parse(response);
                        for (let index = 0; index < subs.length; index++) {
                            $('#check-'+subs[index]).prop('checked', true);
                            console.log(subs[index]);
                        }
                        
                    }else{
                        alert('Maaf, terjadi Kesalahan')
                    }
                },
            });
        }
    </script>
</body>
</html>