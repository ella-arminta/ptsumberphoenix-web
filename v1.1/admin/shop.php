<?php
include 'api/connect.php';
if(!isset($_SESSION['admin_id'])){
    header('Location : ./login.php');
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

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>PT Sumber Phoenix Makmur | Products</title>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar active fixed-top navbar-expand-lg">
        <div class="paragraph">
            <a href="../index.php">Home </a>
            <span>/</span> 
            <a href="./product.html">Features </a>
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
                        <a class="nav-link paragraph" href="./product.html">Features</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link paragraph" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link paragraph">
                            <input type="text" placeholder="Search Here" class="search-bar">
                            <i class="fa-solid fa-magnifying-glass search-icon"></i>
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
                        $stmt =$conn->prepare("SELECT * FROM categories");
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
                                    $stmt2 = $conn->prepare('SELECT * FROM subcategories where cat_id =?');
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

            <!-- Prodyct -->
            <div class="product-container row">
                <div class="product-category-title">Rubber Industries - Agent</div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card" onclick="window.location.href='./single/product.html'">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                            <img src="../src/product/product-dummy-1.png" class="w-100" />
                        </div>
                        <!-- <hr> -->
                        <div class="card-body">
                            <div class="product-title">Lorem Ipsum</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card" onclick="window.location.href='./single/product.html'">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                            <img src="../src/product/product-dummy-1.png" class="w-100" />
                        </div>
                        <!-- <hr> -->
                        <div class="card-body">
                            <div class="product-title">Lorem Ipsum</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card" onclick="window.location.href='./single/product.html'">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                            <img src="../src/product/product-dummy-1.png" class="w-100" />
                        </div>
                        <!-- <hr> -->
                        <div class="card-body">
                            <div class="product-title">Lorem Ipsum</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card" onclick="window.location.href='./single/product.html'">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                            <img src="../src/product/product-dummy-1.png" class="w-100" />
                        </div>
                        <!-- <hr> -->
                        <div class="card-body">
                            <div class="product-title">Lorem Ipsum</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card" onclick="window.location.href='./single/product.html'">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                            <img src="../src/product/product-dummy-1.png" class="w-100" />
                        </div>
                        <!-- <hr> -->
                        <div class="card-body">
                            <div class="product-title">Lorem Ipsum</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card" onclick="window.location.href='./single/product.html'">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                            <img src="../src/product/product-dummy-1.png" class="w-100" />
                        </div>
                        <!-- <hr> -->
                        <div class="card-body">
                            <div class="product-title">Lorem Ipsum</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card" onclick="window.location.href='./single/product.html'">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                            <img src="../src/product/product-dummy-1.png" class="w-100" />
                        </div>
                        <!-- <hr> -->
                        <div class="card-body">
                            <div class="product-title">Lorem Ipsum</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <section class="footer-section">
        <div class="container-fluid grid">
            <div class="company-information">
                <div class="company-logo">
                    <img src="../src/logo.png" alt="">
                </div>
                <div class="company-address">
                    <p class="paragraph">Jl. Raya Serpong Km. 7 - Pakulonan Serpong Utara - Tanggerang Selatan Indonesia - 15325</p>
                </div>
                <div class="company-phone">
                    <p class="paragraph"><strong>Phone: </strong>+62 21 5398 318</p>
                </div>
                <div class="company-email">
                    <p class="paragraph"><strong>Email: </strong>phoenix-spm@sumberphoenix.co.id</p>
                </div>
            </div>
            <div class="useful-links">
                <h2 class="sub-heading underline">Useful Links</h2>
                <a class="footer-item" href="../index.php">
                    <i class="fa-solid fa-angle-right"></i>
                    Home
                </a>
                <a class="footer-item" href="../index.php#about">
                    <i class="fa-solid fa-angle-right"></i>
                    About
                </a>
                <a class="footer-item" href="./contact.html">
                    <i class="fa-solid fa-angle-right"></i>
                    Contact
                </a>
            </div>
            <div class="business-fields useful-links">
                <h2 class="sub-heading underline">Business Fields</h2>
                <a class="footer-item">
                    <i class="fa-solid fa-angle-right"></i>
                    Rubber Industries
                </a>
                <a class="footer-item">
                    <i class="fa-solid fa-angle-right"></i>
                    Plastic Industries
                </a>
                <a class="footer-item">
                    <i class="fa-solid fa-angle-right"></i>
                    Die Casting
                </a>
                <a class="footer-item">
                    <i class="fa-solid fa-angle-right"></i>
                    Coating And Ink Industries
                </a>
                <a class="footer-item">
                    <i class="fa-solid fa-angle-right"></i>
                    Acrylic Sheet
                </a>
                <a class="footer-item">
                    <i class="fa-solid fa-angle-right"></i>
                    Other Industries
                </a>
            </div>
            <div class="newsletter">
                <h2 class="sub-heading underline">Join Our Newsletter</h2>
                <p class="paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                <div class="email-input">
                    <input type="email" placeholder="example@gmail.com">
                    <button class="custom-button btn" type="button">Subscribe</button>
                </div>
            </div>
        </div>
    </section>

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
</body>
</html>