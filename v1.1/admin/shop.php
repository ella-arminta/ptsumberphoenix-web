<?php
include 'api/connect.php';
if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
}
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
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style/nav.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/copyright.css">
    <link rel="stylesheet" href="../style/nav_templates.css">

    <link rel="stylesheet" href="../style/product/nav.css">
    <link rel="stylesheet" href="../style/product/shop.css">

    <!-- Style admin css -->
    <link rel="stylesheet" href="style/shop.css">
    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <!-- CKEDITOR buat description product-->
    <script src="script/ckeditor/ckeditor.js"></script>
    <script src="script/sample.js"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>

    <title>PT Sumber Phoenix Makmur | Products</title>
</head>
<!-- auto complete css -->
<style>
    .autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
.autocomplete input {
  /* border: 1px solid transparent; */
  /* background-color: #f1f1f1; */
  padding: 10px;
  font-size: 16px;
}
.autocomplete input[type=text] {
  /* background-color: #f1f1f1;
  width: 100%; */
}
.autocomplete input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}

</style>
<body>
    
    <!-- Navbar -->
    <nav class="navbar active fixed-top navbar-expand-lg">
        <div class="paragraph">
            <a href="index.php">Home </a>
            <span>/</span> 
            <a href="./product.php">Features </a>
            <span>/</span>
            <strong class="product">Shop</strong>
        </div>
        <div class="container-fluid">
            <div class="navbar-brand">
                <div class="sub-heading">Shop</div>
            </div>

            <div class="navbar-wrapper">
                <a href="./contact.html"><button class="custom-button btn navbar-btn contact" type="button">Contact Us</button></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars icon"></i>
                </button>
            </div>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link paragraph" href="./product.php">Features</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link paragraph" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link paragraph">
                            <!--Make sure the form has the autocomplete function switched off:-->
                            <form autocomplete="off" action="/action_page.php" style="display:flex;justify-content:center;align-items:center;border:none;">
                                <div class="autocomplete">
                                    <input id="searchbar" type="text" name="search" onkeyup="searchProduct()"  class="search-bar" placeholder="Search Here" >
                                </div>
                                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                            </form>
                        </a>
                    </li>
                    <a href="./contact.html"><button class="custom-button btn navbar-btn contact" type="button">Contact Us</button></a>
                </ul>
            </div>

        </div>
    </nav>

    <!-- Product Section -->
    <section class="product-section section-extra">
        <div class="container-fluid">
            <div class="filter-container">
                <div class="categories filters accordion" id="accordionExample">
                    <div class="filter-title sub-heading">
                        BROWSE CATEGORIES
                        <!-- Button add Category/Subcategory -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCatModal">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                    <!-- page CODE CATEGORY NYA -->
                    <!-- Category -->
                    <?php
                        $stmt =$conn->prepare("SELECT * FROM categories where status = 1");
                        $stmt->execute();
                        while($cat = $stmt->fetch()):
                    ?>
                    <!-- Category ke cat_code -->
                    <div class="category accordion-item <?= $cat['cat_code'] ?>">
                        <h2 class="accordion-header" id="heading-<?= $cat['cat_code'] ?>">
                            <button class="btn btn-danger delCatBut" code="<?= $cat['cat_code'] ?>"><i class="fa-solid fa-trash-can"></i></button>
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $cat['cat_code'] ?>" aria-expanded="false" aria-controls="collapse-<?= $cat['cat_code'] ?>">
                                <?= $cat['cat_name'] ?>
                            </button>
                        </h2>
                        <div id="collapse-<?= $cat['cat_code'] ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= $cat['cat_code'] ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body <?= $cat['cat_code'] ?>">
                                <?php
                                    $stmt2 = $conn->prepare('SELECT * FROM subcategories where cat_id =? and status = 1');
                                    $stmt2->execute([$cat['cat_id']]);
                                    while($subcat = $stmt2->fetch()):
                                ?>
                                <div class="category-item" id="<?= $subcat['sub_code'] ?>">
                                    <button class='btn btn-danger delSub' code="<?= $subcat['sub_code'] ?>" style="width:30px;height:30px;padding:0;"><i class="fa-solid fa-trash"></i></button>
                                    <?= $subcat['sub_name'] ?>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>

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
                                        <label for="proDelv" class="form-label">Delivery</label>
                                        <input type="text" class="form-control" id="proDelv" name="proDelv" aria-describedby="productDelivery" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="custServ" class="form-label">Customer Service</label>
                                        <input type="text" class="form-control" id="custServ" name="custServ" aria-describedby="customerService" required>
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

            <!-- Products -->
            <div class="product-container">
                <!-- ADD PRODUCT BUTTON -->
                <button class="btn btn-warning addProduct" data-bs-toggle="modal" data-bs-target="#addProductModal" style="width:100%;height:100px;display:flex;justify-content:center;align-items:center"> <h4 style="margin-right:30px">ADD PRODUCT</h4> <i class="fa-solid fa-bag-shopping fa-2xl"></i></button>
                <div class="product-category-title">Our Products</div>
                <div class="products-inner row">
                    <!-- <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card" onclick="window.location.href='./single/product.php'">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="../src/product/product-dummy-1.png" class="w-100" />
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="product-title">Lorem Ipsum</div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Loader -->
                <div class="loader">
                    <span class="loader__element"></span>
                    <span class="loader__element"></span>
                    <span class="loader__element"></span>
                </div>
                <!-- Load More Products Button -->
                <button class="btn btn-primary loadMore" get="" style="display:none;">Load More</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'bottombar.php'  ?>

    <footer class="copyright-footer">
        <div class="container-fluid">
            <div class="copyright paragraph">
                <i class="fa-solid fa-copyright"></i>
                Copyright <strong>PT Sumber Phoenix Makmur</strong>. All Rights Reserved
            </div>
            <div class="copyright-social-media">
                <div class="icon-container-box">
                    <a href="#" class="fa-brands fa-instagram"></a>
                </div>
                <div class="icon-container-box">
                    <a href="#" class="fa-brands fa-linkedin"></a>
                </div>
                <div class="icon-container-box">
                    <a href="#" class="fa-brands fa-facebook"></a>
                </div>
                <div class="icon-container-box">
                    <a href="#" class="fa-brands fa-twitter"></a>
                </div>
            </div>
        </div>
    </footer>


    <!-- MODAL ADD SUBCATEGORY/CATEGORIES -->
    <div class="modal fade" id="addCatModal" tabindex="-1" aria-labelledby="addCatModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addCatModalLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="row justify-content-center">
                        <button type="button" class="btn btn-dark catButton">Category</button>
                        <button type="button" class="btn btn-light subButton">Subcategory</button>
                    </div>
                    <br>
                    <div class="containerFormAddCatSub">
                        <form id="formAddCat">
                            <div class="mb-3">
                                <label for="catName" class="form-label">Category Name</label>
                                <input type="text" name="catName" class="form-control" placeholder="Category Name" id="catName" aria-describedby="catName" required>
                            </div>
                            <div class="mb-3">
                                <label for="catCode" class="form-label">Category Code</label>
                                <input type="text" class="form-control" name="catCode" placeholder="example : RI" id="catCode" required>
                                <div id="catCodeInfo" class="form-text">Example : Rubber Industries -> RI</div>
                            </div>
                            <div class="mb-3">
                                <label for="catImg" class="form-label">Category Image</label>
                                <input type="file" accept="image/*" class="form-control" name="catImg" id="catImg" required>
                            </div>
                            <div style="display:flex;justify-content:center;flex-direction:column;width:100%;align-items:center">
                                <button type="submit" class="btn btn-success" style="width:100px">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../script/nav.js"></script>

    <!-- jquery admin shop -->
    <script src="script/shop.js"></script>
    <!-- ckeditor -->
    <script>
        initSample();
    </script>
    <script>
        function searchProduct(){
            thisValue = $('#searchbar').val();
            $.ajax({
                type: "POST",
                url: "api/shop/searchProduct.php",
                data: {
                    for :'autocomplete',
                    val: thisValue
                },
                success: function (response) {
                    response = JSON.parse(response)
                    if(response[0] == 'success'){
                        similarProducts = response[1];
                    }
                }
            });
            autocomplete(document.getElementById("searchbar"), similarProducts);
        }
        var similarProducts = [];

    </script>
</body>
</html>