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
    position: relative;
    display: inline-block;
}
.autocomplete input {
    padding: 10px;
    font-size: 16px;
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
            <strong class="product">Products</strong>
        </div>
        <div class="container-fluid">
            <div class="navbar-brand">
                <div class="sub-heading">Products</div>
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
                        <a class="nav-link paragraph" href="#">Products</a>
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
                    <a href="./contact.php"><button class="custom-button btn navbar-btn contact" type="button">Contact Us</button></a>
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
                            <div class="accordion-body <?= $cat['cat_code'] ?> <?= str_replace(' ', '-', $cat['cat_name'])?>">
                                <?php
                                    $stmt2 = $conn->prepare("SELECT *,s.sub_id as sub_id, s.sub_code as sub_code, s.sub_name as sub_name, count(ps.product_id), c.cat_id  as cat_id
                                    from subcategories s 
                                    join product_subcategory ps  on s.sub_id = ps.subcategory_id
                                    join categories c on s.cat_id = c.cat_id
                                    join products p on p.product_id = ps.product_id
                                    where s.status = 1  and c.cat_id = ? and p.status =1
                                    GROUP BY s.sub_id
                                    HAVING COUNT(ps.product_id) > 0;");
                                    $stmt2->execute([$cat['cat_id']]);
                                    while($subcat = $stmt2->fetch()):
                                ?>
                                <div class="category-item" id="<?= $subcat['sub_code'] ?>" onclick="getProducts('<?= $subcat['sub_code'] ?>', this)">
                                    <?= $subcat['sub_name'] ?>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>

                    <div class="category accordion-item All last">
                        <div class="accordion-header" id="heading-All">
                            <div class="category-item last" id="random" onclick="getProducts('all')">
                                All
                            </div>
                        </div>
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
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'bottombar.php'  ?>

    <!-- Handle href -->
    <script>
        $(document).ready(() => 
        {
            $('.footer-item.home').attr('href', './index.php#home')
            $('.footer-item.about').attr('href', './index.php#about')
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="script/nav.js"></script>
    <script src="script/shop.js"></script>

    <!-- search algorithm -->
    <script>
        function searchProduct(e){
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

    <!-- Accessing specific requests -->
    <?php
    if(isset($_GET['cateCode'])) 
        echo '<script>getProducts("cat'.$_GET['cateCode'].'", "")</script>';
    else if (isset($_GET['subCode']))
    {
        if (substr($_GET['subCode'], 0, 4) == 'name')
            echo '<script>getProductsbyName("'.substr($_GET['subCode'], 4).'")</script>';
        else
            echo '<script>getProducts("'.$_GET['subCode'].'", "custom-element")</script>';                
    }             
    else
        echo '<script>getProducts("all", "")</script>';
    ?>
</body>
</html>