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
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style/nav.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/copyright.css">
    <link rel="stylesheet" href="../style/nav_templates.css">

    <link rel="stylesheet" href="../style/product/nav.css">
    <link rel="stylesheet" href="../style/product/product.css">
    <!-- <link rel="stylesheet" href="../style/product/shop.css"> -->

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
            <a href="../product.php">Features </a>
            <span>/</span>
            <a href="../shop.php<?php 
                if(isset($_GET['subCode'])){
                    echo  '?subCode='.$_GET['subCode'];
                }
             ?>
             ">Products </a>
            <span>/</span>
            <strong class="product">Product</strong>
        </div>
        <div class="container-fluid">
            <div class="navbar-brand">
                <div class="sub-heading">Product</div>
            </div>

            <div class="navbar-wrapper">
                <a href="./contact.php?proid=<?= $product['product_id'] ?>"><button class="custom-button btn navbar-btn contact" type="button">Contact Us</button></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars icon"></i>
                </button>
            </div>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link paragraph" href="../product.php">Features</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link paragraph" href="../shop.php
                        <?php 
                        if(isset($_GET['subCode'])){
                           echo  '?subCode='.$_GET['subCode'];
                        }
                       ?>
                        ">Products</a>
                    </li>
                    <a href="../contact.php"><button class="custom-button btn navbar-btn contact" type="button">Contact Us</button></a>
                </ul>
            </div>

        </div>
    </nav>

    <!-- Product Section -->
    <section class="product-section section-extra">
        <div class="container-fluid">
            <img src="../<?= $product['product_img'] ?>" alt="" class="product-image">
            <div class="product-description">
                <div class="product-title heading"><?= htmlspecialchars($product['product_name']) ?></div>
                <div class="product-content paragraph">
                    <!-- <pre> -->
                        <?= $product['product_desc'] ?>
                    <!-- </pre> -->
                </div>
                <!-- <div class="icons-place"> -->

                    <!-- <div class="delivery icon-place"> -->
                        <!-- <i class="fa-solid fa-truck"></i>
                        <div class="icon-content"> -->
                            <!-- <div class="paragraph icon-content-heading">Delivery</div> -->
                            <!-- <div class="paragraph icon-content-description"> -->
                                <?php //htmlspecialchars($product['product_delivery']) ?>
                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div> -->

                    <!-- <div class="cs icon-place"> -->
                        <!-- <i class="fa-solid fa-clock"></i>
                        <div class="icon-content"> -->
                            <!-- <div class="paragraph icon-content-heading">Customer Service</div> -->
                            <!-- <div class="paragraph icon-content-description"> -->
                                <?php // htmlspecialchars($product['customer_service']) ?>
                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div> -->

                <!-- </div> -->
                <div class="contact-container">
                    <button class="custom-button" onclick="window.location.href='../contact.php?proid=<?= $product['product_id'] ?>'" type="button">Contact Us</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php
function getData1($fiturNama,$conn){
    $stmt = $conn->prepare('SELECT * FROM company_profile where fitur_name =? ');
    $stmt->execute([$fiturNama]);
    $temp = $stmt->fetch();
    $data = $temp['fitur_data'];
    return $data;
}
?>
<section class="footer-section">
        <div class="container-fluid grid">
            <div class="company-information">
                <div class="company-logo">
                    <img src="src/<?= getData1('logo',$conn) ?>" id="company-logo" alt="">
                    
                </div>
                <div class="company-address">
                    <p class="paragraph" col="address"><?= getData1('address',$conn)?> </p>
                </div>
                <div class="company-phone">
                    <p class="paragraph" col="phone"><strong>Phone: </strong><?= getData1('phone',$conn) ?></p>
                </div>
                <div class="company-email">
                    <p class="paragraph" col="email"><strong>Email: </strong><?= getData1('email',$conn) ?></p>
                </div>
            </div>
            <div class="useful-links">
                <h2 class="sub-heading underline">Useful Links</h2>
                <a class="footer-item" href="#">
                    <i class="fa-solid fa-angle-right"></i>
                    Home
                </a>
                <a class="footer-item" href="#about">
                    <i class="fa-solid fa-angle-right"></i>
                    About
                </a>
                <a class="footer-item" href="./product.php">
                    <i class="fa-solid fa-angle-right"></i>
                    Products
                </a>
                <a class="footer-item" href="./contact.php">
                    <i class="fa-solid fa-angle-right"></i>
                    Contact
                </a>
            </div>
            <div class="business-fields useful-links">
                <h2 class="sub-heading underline">Business Fields</h2>
                <?php
                    $stmt=$conn->prepare("SELECT c.cat_code as cat_code,c.cat_name as cat_name,c.cat_id as cat_id,c.cat_img as cat_img, count(s.sub_id) 
                    FROM categories c 
                    join subcategories s on c.cat_id = s.cat_id 
                    join product_subcategory ps  on s.sub_id = ps.subcategory_id
                    join products p on ps.product_id = p.product_id
                    where c.status = 1 and s.status = 1 and p.status = 1 GROUP BY c.cat_id HAVING COUNT(ps.product_id) > 0 order by c.order_by ASC");
                    $stmt->execute();
                    while($cat = $stmt->fetch()):
                ?>
                <a class="footer-item" href="./shop.php?cateCode=<?= $cat['cat_code'] ?>">
                    <i class="fa-solid fa-angle-right"></i>
                    <?= $cat['cat_name'] ?>
                </a>
                <?php endwhile; ?>
            </div>
            <div class="newsletter">
                <h2 class="sub-heading underline">Join Our Newsletter</h2>
                <p class="paragraph" col="newsletter_desc"><?= getData1('newsletter_desc',$conn)?></p>
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
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../script/nav.js"></script>
    <script src="../script/product/more.js"></script>
</body>
</html>