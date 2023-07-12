<?php
include 'api/connect.php';
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/copyright.css">
    <link rel="stylesheet" href="style/nav_templates.css">

    <link rel="stylesheet" href="style/product/nav.css">
    <link rel="stylesheet" href="style/product/shop.css">

    <!-- Style admin css -->
    <link rel="stylesheet" href="admin/style/shop.css">
    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

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
<?php
// PAKE GET BERDASARKAN CATECODE CONVERT KE SESSION
    if(isset($_GET['cateCode'])){
        echo '<script>
        $.ajax({
            type: "POST",
            url: "api/shop2/setSession.php",
            data: {
                cat:"'.$_GET['cateCode'].'"
            },
            success: function (response) {
                if(response == "success"){
                    console.log("'.$_GET['cateCode'].'")
                }
            }
        });
        </script>';
    }else{
        // $_SESSION['cat'] = 'random';
    }

    // if(isset($_SESSION['cat'])){
    //     echo '<script>getProducts();console.log("hai")</script>';
    // }
?>
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
                <a href="./contact.php"><button class="custom-button btn navbar-btn contact" type="button">Contact Us</button></a>
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
                    </div>
                    <!-- page CODE CATEGORY NYA -->
                    <!-- Category -->
                    <?php
                        $stmt =$conn->prepare("SELECT c.cat_code as cat_code,c.cat_name as cat_name,c.cat_id as cat_id,c.cat_img as cat_img, count(s.sub_id) 
                        FROM categories c 
                        join subcategories s on c.cat_id = s.cat_id 
                        join product_subcategory ps  on s.sub_id = ps.subcategory_id
                        join products p on ps.product_id = p.product_id
                        where c.status = 1 and s.status = 1 and p.status = 1 GROUP BY c.cat_id HAVING COUNT(ps.product_id) > 0 order by c.order_by ASC");
                        $stmt->execute();
                        while($cat = $stmt->fetch()):
                    ?>
                    <!-- Category ke cat_code -->
                    <div class="category accordion-item <?= $cat['cat_code'] ?>">
                        <h2 class="accordion-header" id="heading-<?= $cat['cat_code'] ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $cat['cat_code'] ?>" aria-expanded="false" aria-controls="collapse-<?= $cat['cat_code'] ?>">
                                <?= $cat['cat_name'] ?>
                            </button>
                        </h2>
                        <div id="collapse-<?= $cat['cat_code'] ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= $cat['cat_code'] ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body <?= $cat['cat_code'] ?>">
                                <?php
                                    $stmt2 = $conn->prepare("SELECT s.sub_id as sub_id, s.sub_code as sub_code, s.sub_name as sub_name, count(ps.product_id), c.cat_id  as cat_id
                                        from subcategories s 
                                        join product_subcategory ps  on s.sub_id = ps.subcategory_id
                                        join categories c on s.cat_id = c.cat_id
                                        where s.status = 1  and c.cat_id = ?
                                        GROUP BY s.sub_id
                                        HAVING COUNT(ps.product_id) > 0");
                                    $stmt2->execute([$cat['cat_id']]);
                                    while($subcat = $stmt2->fetch()):
                                ?>
                                <div class="category-item" id="<?= $subcat['sub_code'] ?>">
                                    <?= $subcat['sub_name'] ?>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <div class="category accordion-item All ?>">
                        <p class="accordion-header" id="heading-All ?>">
                            <div class="category-item" id="random">
                                <?= 'All' ?>
                            </div>
                                    </p>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="product-container">
                <div class="product-category-title">Our Products</div>
                <div class="products-inner row">
                    <!-- <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card" onclick="window.location.href='./single/product.php'">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="src/product/product-dummy-1.png" class="w-100" />
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
                <div class="button-container">
                    <button class="btn loadMore" get="" cat="" style="display:none;">Load More</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'bottombar.php'  ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="script/nav.js"></script>

    <!-- jquery admin shop -->
    <script>    
        // product id yg sudah diambil
        // category / subcat diambil dari session.
        // session pertama kali adalah random / category dr home
        var products = [];
    </script>
    <!-- <script src="script/shop.js"></script> -->
    <script>
        // ADA YG NAMANYA LOADMORE.FULL RANDOM TP GK USH YG DAH DIKELUARIN
        // 1 product isa dilebih dari 1 subcategory.
        // GET PRODUCT BERDASARKAN CATECODE
        function getProducts(ganti){
            $('.loader').css('display','flex');
            console.log('Hai get products ini')
            $.ajax({
                type: "POST",
                url: "api/shop2/getProducts.php",
                data:  {
                    shown : JSON.stringify(products),
                },
                success: function (response) {
                    products =response;
                    console.log(products)
                    // if(ganti == true){

                    // }
                    
                    // if(response[0] == 'success'){
                    //     // card ini isi nya product_code,product_img,product_name,product_id
                    //     //   getData Random
                    //     if(response[1].length <= 0){
                    //         if(catCode == 'byName'){
                    //             $('.products-inner').html("<h1>No Product Found</h1>")
                    //         }else{
                    //             $('.products-inner').html("<h1>No Product Found in this category</h1>")
                    //         }
                    //         $('.loadMore').css('display','none');
                    //         $('.loader').css('display','none');
                    //     }else{
                    //         var cards ='';           
                    //         if(catCode != 'random' || catCode == 'byName'){
                    //             products_id = []
                    //         }     
                    //         for (let index = 0; index < response[1].length; index++) {
                                
                    //             product = response[1][index];
                    //             cards += `
                    //             <div class="col-lg-4 col-md-6 mb-4">
                    //                 <div class="card">
                    //                     <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light" onclick="window.location.href='./single/product.php?product_code=`+product.product_code+`&subCode=`+catCode+`'">
                    //                         <img src="`+product.product_img+`" class="w-100" />
                    //                     </div>
                                        
                    //                     <div class="card-body">
                    //                         <div class="product-title" onclick="window.location.href='./single/product.php?product_code=`+product.product_code+`&subCode=`+catCode+`&subCode=`+catCode+`'">`+product.product_name+`</div>
                                            
                    //                     </div>
                    //                 </div>
                    //             </div>
                    //             `   
                    //             products_id.push(product);
                            
                    //         }
                    //         $('.products-inner').html(cards)
                    //         var proTitle = response[4] +' - '+response[3];
                    //         $('.product-category-title').text(proTitle);
                    //         if (response[3] == undefined){
                    //             $('.product-category-title').text('Our Products');
                    //         }
                    //         if(response[2] > 0){
                    //             $('.loadMore').css('display','block');
                    //         }else{
                    //             $('.loadMore').css('display','none');
                    //         }
                    //         $('.loader').css('display','none');
                    //     }
                        
                    // }else{
                    //     Swal.fire({
                    //         icon: 'error',
                    //         title: 'Error!',
                    //         text: 'Something went Wrong please come back later'
                    //     })
                    // }
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
        
        getProducts()
        // GET PRODUCT BERDASARKAN SUB CATEGORY
        // GET PRODUCT BERDASARKAN id_gabungan (product_subcategory)
        // GET PRODUCT BERDASARKAN SEARCH BAR TARUH NAV JS
    </script>

    <script>
        
        
        
        // function searchProduct(){
        //     thisValue = $('#searchbar').val();
        //     $.ajax({
        //         type: "POST",
        //         url: "api/shop/searchProduct.php",
        //         data: {
        //             for :'autocomplete',
        //             val: thisValue
        //         },
        //         success: function (response) {
        //             response = JSON.parse(response)
        //             if(response[0] == 'success'){
        //                 similarProducts = response[1];
        //             }
        //         }
        //     });
        //     autocomplete(document.getElementById("searchbar"), similarProducts);
        // }
        // var similarProducts = [];
    </script>
</body>
</html>