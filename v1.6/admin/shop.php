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
    <!-- <script src="script/ckeditor/ckeditor.js"></script>
    <script src="script/sample.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

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
                <!-- <a href="./contact.html"><button class="custom-button btn navbar-btn contact" type="button">Contact Us</button></a> -->
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
                    <!-- <a href="./contact.html"><button class="custom-button btn navbar-btn contact" type="button">Contact Us</button></a> -->
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
                        <!-- Button Reordering Category -->
                        <button type="button" class="btn btn-primary" style="width:100%;margin-top:10px;height:60px;" data-bs-toggle="modal" data-bs-target="#reorderModal">
                           Reorder Categories
                        </button>
                    </div>
                    <!-- page CODE CATEGORY NYA -->
                    <!-- Category -->
                    <?php
                        $stmt =$conn->prepare("SELECT * FROM categories where status = 1 ORDER BY order_by asc");
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
                    <!-- featured -->
                    <div class="category accordion-item featured">
                        <p class="accordion-header" id="heading-featured ?>">
                            <div class="category-item" id="featured">
                               Featured
                            </div>
                        </p>
                    </div>
                    <!-- Best seller -->
                    <div class="category accordion-item bestseller">
                        <p class="accordion-header" id="heading-bestseller ?>">
                            <div class="category-item" id="bestseller">
                               Best Seller
                            </div>
                        </p>
                    </div>
                    <div class="category accordion-item All">
                        <p class="accordion-header" id="heading-All ?>">
                            <div class="category-item" id="random">
                                <?= 'All' ?>
                            </div>
                        </p>
                    </div>
                    
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
                <button class="btn btn-primary loadMore" get="" cat="" style="display:none;">Load More</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'bottombar.php'  ?>

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

    <!-- MODAL REORDERING CATEGORY -->
    <style>
        .group:after {
            content: "";
            display: table;
            clear: both;
        }

        ul#piclist {
            max-width: 200px;
            list-style: none;
            margin: 20px auto;
        }

        #piclist li {
            background-color: white;
            padding: 10px;
            margin: 5px 0;
            border-radius: 2px;
            user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
        }
        #piclist li img {
            display: block;
            float: left;
        }

        .handle {
            float: right;
        }
        .handle:after {
            content: "≡";
            font-size: 35px;
            line-height: 50px;
            color: gray;
        }

        .slip-reordering {
            -webkit-box-shadow: 0 0 5px 5px rgba(0, 0, 0, 0.02);
            box-shadow: 0 0 5px 5px rgba(0, 0, 0, 0.03);
        }
    </style>
    <div class="modal fade" id="reorderModal" tabindex="-1" aria-labelledby="reorderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reorderModalLabel">Reorder Categories</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id='piclist'>
                        <?php
                            $stmt = $conn->prepare("SELECT * FROM categories where status = 1 order by order_by ASC");
                            $stmt->execute();
                            while($row = $stmt->fetch()):
                        ?>
                        <li class='no-swipe group'>
                            <div style="display:block;float:left;width:80%" catId="<?=$row['cat_id']?>"><?= $row['cat_name'] ?></div>
                            <div class='handle instant'></div>
                        </li> 
                        <?php endwhile; ?>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveReorder">Save changes</button>
                </div>
            </div>
        </div>  
    </div>
    <!-- script for reordering -->
    <script src="script/slip.js"></script>
    <script>
        var ul = document.getElementById('piclist');
        new Slip(ul);

        ul.addEventListener('slip:beforereorder', function(e){
        if (/demo-no-reorder/.test(e.target.className)) {
            e.preventDefault();
        }
        }, false);

        ul.addEventListener('slip:beforeswipe', function(e){
        if (e.target.nodeName == 'INPUT' || /no-swipe/.test(e.target.className)) {
            e.preventDefault();
        }
        }, false);

        ul.addEventListener('slip:beforewait', function(e){
        if (e.target.className.indexOf('instant') > -1) e.preventDefault();
        }, false);

        /*ul.addEventListener('slip:afterswipe', function(e){
        e.target.parentNode.appendChild(e.target);
        }, false);*/

        ul.addEventListener('slip:reorder', function(e){
        e.target.parentNode.insertBefore(e.target, e.detail.insertBefore);
        return false;
        }, false);

        new Slip(ul);

        var items = document.querySelectorAll(".handle");
        for (var i=0; i < items.length; i++) {
            var item = items[i]
            item.addEventListener('mousedown', function(){
                this.style.cursor = "-webkit-grabbing";
                this.style.cursor = "-moz-grabbing";
            });
            item.addEventListener('mouseover', function(){
                this.style.cursor = "-webkit-grab";
                this.style.cursor = "-moz-grab";
            });
            item.addEventListener('mouseup', function(){
                this.style.cursor = "-webkit-grab";
                this.style.cursor = "-moz-grab";
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../script/nav.js"></script>

    <!-- jquery admin shop -->
    <script>    var products_id = [];</script>
    <script src="script/shop.js"></script>
    <script>
        function getProducts(catCode,mCatId){
        $('.loader').css('display','flex');
        proName = '';
        if(catCode == 'byName'){
            proName = $('#searchbar').val();
        }
        $.ajax({
            type: "GET",
            url: "api/shop/getProducts.php",
            data:  { 
                catCode : catCode,
                shown : JSON.stringify(products_id),
                proName : proName,
                masterCatId : mCatId,
            },
            success: function (response) {
                response = JSON.parse(response)
                if(response[0] == 'success'){
                    // card ini isi nya product_code,product_img,product_name,product_id
                    //   getData Random
                    if(response[1].length <= 0){
                        if(catCode == 'byName'){
                            $('.products-inner').html("<h1>No Product Found</h1>")
                        }else{
                            $('.products-inner').html("<h1>No Product Found in this category</h1>")
                        }
                        $('.loadMore').css('display','none');
                        $('.loader').css('display','none');
                    }else{
                        var cards ='';           
                        if(catCode != 'random' || catCode == 'byName'){
                            products_id = []
                        }     
                        for (let index = 0; index < response[1].length; index++) {
                            
                            product = response[1][index];
                            icon = ''
                            if(product.featured == 1){
                                icon+= `<i class="fa-solid fa-star fa-xl" style="margin-right:10px;color:orange" onclick="featured(0,'`+product.product_code+`')"></i>`;
                            }else{
                                icon+=`<i class="fa-regular fa-star fa-xl" style="margin-right:10px;color:orange" onclick="featured(1,'`+product.product_code+`')"></i>`
                            }
                            if(product.best_seller == 1){
                                icon+=`<i class="fa-solid fa-heart fa-xl" style="color:red" onclick="bestSeller(0,'`+product.product_code+`')"></i>`
                            }else{
                                icon+=`<i class="fa-regular fa-heart fa-xl" style="color:red" onclick="bestSeller(1,'`+product.product_code+`')"></i>`
                            }
                            cards += `
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light" onclick="window.location.href='./single/product.php?product_code=`+product.product_code+`&subCode=`+catCode+`'">
                                        <img src="../`+product.product_img+`" class="w-100" />
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="product-title" onclick="window.location.href='./single/product.php?product_code=`+product.product_code+`&subCode=`+catCode+`'">`+product.product_name+`</div>
                                        <!-- star : feautured, love :best seller -->
                                        <div>
                                            <div style="float:left">
                                                `+icon+`
                                            </div>
                                            <div style="float:right">
                                                <button  class="btn btn-danger delProductBut" onclick="delProduct('`+product.product_code+`')" proCode="`+product.product_code+`">Delete</button>
                                                <button style="margin-right:10px;"  class="btn btn-warning editProduct" onclick="editProduct('`+product.product_code+`')" proCode="`+product.product_code+`">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `   
                            products_id.push(product);
                           
                        }
                        $('.products-inner').html(cards)
                        var proTitle = response[4] +' - '+response[3];
                        $('.product-category-title').text(proTitle);
                        if (response[3] == undefined){
                            $('.product-category-title').text('Our Products');
                        }
                        if(response[2] > 0){
                            $('.loadMore').css('display','block');
                        }else{
                            $('.loadMore').css('display','none');
                        }
                        $('.loader').css('display','none');
                    }
                    
                }else{
                    if(response[0] == 'fail' || response[1] == 'Subcategory not found'){
                        // window.location.href = 'shop.php';
                        getProducts("random","")
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went Wrong please come back later'
                        })
                    }
                }
            },
            error: function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Terjadi kesalahan, silahkan coba lagi.'
                })
            }
        });
        // console.log(JSON.stringify(products_id))
    }
    </script>
    <!-- ckeditor -->
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <!-- <script>
        initSample();
        
    </script> -->
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
    <script>
        function getProByCat(catCode){
            $('.loader').css('display','flex');
            $.ajax({
                type: "GET",
                url: "api/shop/getProByCat.php",
                data:  {
                    catCode : catCode,
                    shown : JSON.stringify(products_id),
                },
                success: function (response) {
                    response = JSON.parse(response)
                    if(response[0] == 'success'){
                        // card ini isi nya product_code,product_img,product_name,product_id
                        //   getData Random
                        if(response[1].length <= 0){
                            if(catCode == 'byName'){
                                $('.products-inner').html("<h1>No Product Found</h1>")
                            }else{
                                $('.products-inner').html("<h1>No Product Found in this category</h1>")
                            }
                            $('.loadMore').css('display','none');
                            $('.loader').css('display','none');
                        }else{
                            var cards ='';           
                            for (let index = 0; index < response[1].length; index++) {
                                
                                product = response[1][index];
                                icon = ''
                                if(product.featured == 1){
                                    icon+= `<i class="fa-solid fa-star fa-xl" style="margin-right:10px;color:orange" onclick="featured(0,'`+product.product_code+`')"></i>`;
                                }else{
                                    icon+=`<i class="fa-regular fa-star fa-xl" style="margin-right:10px;color:orange" onclick="featured(1,'`+product.product_code+`')"></i>`
                                }
                                if(product.best_seller == 1){
                                    icon+=`<i class="fa-solid fa-heart fa-xl" style="color:red" onclick="bestSeller(0,'`+product.product_code+`')"></i>`
                                }else{
                                    icon+=`<i class="fa-regular fa-heart fa-xl" style="color:red" onclick="bestSeller(1,'`+product.product_code+`')"></i>`
                                }
                                cards += `
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card">
                                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light" onclick="window.location.href='./single/product.php?product_code=`+product.product_code+`&subCode=`+catCode+`'">
                                            <img src="../`+product.product_img+`" class="w-100" />
                                        </div>
                                        
                                        <div class="card-body">
                                            <div class="product-title" onclick="window.location.href='./single/product.php?product_code=`+product.product_code+`&subCode=`+catCode+`">`+product.product_name+`</div>
                                            <!-- star : feautured, love :best seller -->
                                            <div>
                                                <div style="float:left">
                                                    `+icon+`
                                                </div>
                                                <div style="float:right">
                                                    <button  class="btn btn-danger delProductBut" onclick="delProduct('`+product.product_code+`')" proCode="`+product.product_code+`">Delete</button>
                                                    <button style="margin-right:10px;"  class="btn btn-warning editProduct" onclick="editProduct('`+product.product_code+`')" proCode="`+product.product_code+`">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `   
                                products_id.push(product);
                            
                            }
                            $('.products-inner').html(cards)
                            $('.product-category-title').text(response[3]);
                            if(response[2] > 0){
                                $('.loadMore').css('display','block');
                            }else{
                                $('.loadMore').css('display','none');
                            }
                            $('.loader').css('display','none');
                            $('.loadMore').attr('get','cat '+ catCode);
                        }
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went Wrong please come back later'
                        })
                    }
                },
                error: function(){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan, silahkan coba lagi.'
                    })
                }
            });
        }
    </script>
    <?php 
        // if(isset($_GET['cateCode'])){
    //     echo '<script>getProByCat("'.$_GET['cateCode'].'");</script>';
    // }else if (isset($_GET['subCode'])){
    //     echo '<script>getProducts("'.$_GET['subCode'].'")</script>';
    // }
    // else{
    //     echo '<script>   getProducts("random");</script>';
    // } 
    if (isset($_SESSION['cat'])){
        if ($_SESSION['cat'] == 'random'){
            echo '<script>getProducts("random","")</script>';
        }else{
            echo '<script>getProducts("'.$_SESSION['cat'][1].'","'.$_SESSION['cat'][0].'")</script>';
        }
        echo '<script>console.log("'.$_SESSION['cat'][0].$_SESSION['cat'][1].'")</script>';
    }else{
        echo '<script>   getProducts("random","");console.log("hai")</script>';
    }
    // unset($_SESSION['cat']);
    ?>

    <!-- REORDER SCRIPT  -->
    <script>
        $('#saveReorder').click(function(){
            $(this).prop('disabled', true)
            var items = $('#piclist li div:nth-child(1)').map(function () { return $(this).attr('catId'); }).get();
            console.log(items);
            $.ajax({
                type: "POST",
                url: "api/shop/reorderCat.php",
                data: {
                    cats : items
                },
                success: function (response) {
                    if(response == 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Categories are reordered'
                        }).then(function() {
                            location.reload();
                        });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Terjadi kesalahan, silahkan coba lagi.'
                        })
                    }
                }
            });
        })
    </script>
</body>
</html>