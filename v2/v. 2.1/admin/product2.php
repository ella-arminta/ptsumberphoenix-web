<?php
include 'api/connect.php';
if(!isset($_SESSION['admin_id'])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <!-- Library Style : Bootstrap -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
     <!-- Library -->
     <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Data Table -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- CKEDITOR buat body-->
    <!-- <script src="script/ckeditor/ckeditor.js"></script>
    <script src="script/sample.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    
    <!-- Style admin css -->
    <link rel="stylesheet" href="style/shop.css">
</head>
<body>
    <!-- Navbar -->
    <?php include 'includes/nav.php' ?>
    <div class="container" style="margin-top:96px">
    <!-- ADD PRODUCT BUTTON -->
    <button class="btn btn-warning addProduct" data-bs-toggle="modal" data-bs-target="#addProductModal" style="width:100%;height:100px;display:flex;justify-content:center;align-items:center"> <h4 style="margin-right:30px">ADD PRODUCT</h4> <i class="fa-solid fa-bag-shopping fa-2xl"></i></button>
    <!-- MODAL ADD PRODUCT -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProductModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formAddProduct" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="proName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="proName" name="proName" aria-describedby="productName" required>
                            </div>
                            <div class="mb-3">
                                <label for="proCode" class="form-label">Product Code</label>
                                <input type="text" class="form-control" id="proCode" name="proCode" aria-describedby="productCode" required>
                            </div>
                            <div class="mb-3">
                                <label for="proImg" class="form-label">Product Image</label>
                                <input type="file" accept="image/*" name="proImg" class="form-control" id="proImg" aria-describedby="productImage" required>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Product Description</label>
                                <div class="col-md-12">
                                    <div class="adjoined-bottom">
                                        <div class="grid-container">
                                            <div class="grid-width-100">
                                                <textarea id="editor" name="isi" required>
                                                    
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
                        <button type="submit" class="btn btn-primary">Post Product</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>

    <h1 style="text-align:center">Products</h1>
        <table id="products"  class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Image</th>
                    <th>Subcategories</th>
                    <th>Featured/Best Seller</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th><input type="text" style="width:100px;margin:0" placeholder="Search Name" /></th>
                    <th><input type="text" style="width:100px;margin:0" placeholder="Search Code" /></th>
                    <th>Image</th>
                    <th><input type="text" style="width:100px;margin:0" placeholder="Search Subcategories" /></th>
                    <th><input type="text" style="width:100px;margin:0" placeholder="Search Featured/Best Seller" /></th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tbody>
                
               <?php
                $i = 1;
                $stmt = $conn->prepare("SELECT * FROM products where status = 1");
                $stmt->execute();
                while($product = $stmt->fetch()):
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $product['product_name']?></td>
                    <td><?= $product['product_code'] ?></td>
                    <td><img src="../<?= $product['product_img'] ?>" style="width:100%;max-height:100px;" alt=""></td>
                    <!-- cari subcategories -->
                    <td>
                        <?php 
                        $stmt2 = $conn->prepare("SELECT p.product_name,p.product_code,s.sub_name as sub_name,s.sub_code FROM `product_subcategory` ps JOIN products p on p.product_id = ps.product_id join subcategories s on s.sub_id = ps.subcategory_id where p.product_id = 1 and p.status = 1;");
                        $stmt2->execute();
                        while($subs = $stmt2->fetch()){
                            echo $subs['sub_name'] . ', ';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $isi = 0;
                        if($product['featured'] == 1){
                            $isi++;
                            echo '<div class="p-3 text-warning-emphasis bg-waning-subtle border border-warning-subtle rounded-3">
                            Featured
                          </div>';
                        }
                        if($product['best_seller'] == 1){
                            $isi++;
                            echo '<div class="p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3">
                            Best Seller
                          </div>';
                        }
                        if($isi <= 0){
                            echo 'none';
                        }
                        ?>
                    </td>
                    <td>Action</td>
                </tr>
                <?php endwhile;?>
            </tbody>
            
        </table>
    </div>
    
    <!-- <script src="script/jquery-3.6.1.min.js"></script> -->
    <!-- ckeditor -->
    <script>
        var table = $('#products').DataTable({
                initComplete: function () {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function () {
                            // input filter
                            var that = this;
        
                            $('input', this.header()).on('keyup change clear', function () {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                    this.api()
                        .columns(7)
                        .every(function(){
                            // select filter
                            var column = this;
                            var select = $('<select><option value=""></option></select>')
                                .appendTo($(column.header()).empty())
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
        
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });
        
                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    select.append('<option value="' + d + '">' + d + '</option>');
                                });
                        })
                },
               
        });
    let editor;
    let editor2;
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( newEditor => {
            editor = newEditor;
        } )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .then( newEditor => {
            editor2 = newEditor;
        } )
        .catch( error => {
            console.error( error );
        } );
    </script>
    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="script/shop.js"></script>
</body>
</html>