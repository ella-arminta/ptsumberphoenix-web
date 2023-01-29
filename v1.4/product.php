<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Library Style -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/copyright.css">
    <link rel="stylesheet" href="style/nav_templates.css">

    <link rel="stylesheet" href="style/product/nav.css">
    <link rel="stylesheet" href="style/product/features.css">
    <link rel="stylesheet" href="style/product/new_featured.css">
    <link rel="stylesheet" href="style/product/best.css">

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <title>PT Sumber Phoenix Makmur | Products</title>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar active fixed-top navbar-expand-lg">
        <div class="paragraph"><a href="index.php">Home </a><span>/</span> <strong class="product">Features</strong></div>
        <div class="container-fluid">
            <div class="navbar-brand">
                <div class="sub-heading">Features</div>
            </div>

            <div class="navbar-wrapper">
                <a href="./contact.php"><button class="custom-button btn navbar-btn contact" type="button">Contact Us</button></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars icon"></i>
                </button>
            </div>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item active">
                        <a class="nav-link paragraph" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link paragraph" href="./shop.php">Shop</a>
                    </li>
                    <a href="./contact.php"><button class="custom-button btn navbar-btn contact" type="button">Contact Us</button></a>
                </ul>
            </div>

        </div>
    </nav>

    <!-- Featured Section -->
    <?php
        include 'api/connect.php';
        $stmt = $conn->prepare("SELECT * FROM products where featured = 1");
        $stmt->execute();
        $count = $stmt->rowCount();
    ?>

    <section class="featured-section section-extra">
        <div class="container-fluid">
            <div class="upper-featured">
                <div class="featured-container" style="background: url('./src/product/featured/pigment_paste.jpeg'); background-repeat: no-repeat; background-size: cover">
                    <div class="heading">Pigment Paste</div>
                    <div class="paragraph">Matapel pigment are basically grouped into three systems; water-based, water-solvent based and solvent-free for solvent based applications</div>
                    <button class="custom-button btn" type="button">
                        <i class="fa-solid fa-angle-right"></i>
                        Show More
                    </button>
                </div>
                <div class="featured-container" style="background: url('./src/product/featured/silicone.jpeg'); background-repeat: no-repeat; background-size: cover">
                    <div class="heading">Silicone</div>
                    <div class="paragraph">Silicone is very inert, non-toxic and special product with distinguished properties and can be used in plenty of applications</div>
                    <button class="custom-button btn" type="button">
                        <i class="fa-solid fa-angle-right"></i>
                        Show More
                    </button>
                </div>
            </div>
            <div class="lower-featured">
                <div class="featured-container" style="background: url('./src/product/featured/sole_agent.jpeg'); background-repeat: no-repeat; background-size: cover">
                    <div class="heading">Sole Agent, Distributor & Stockist</div>
                    <div class="paragraph">As a trading company, MATAPEL CHEMICALS excels in coating industries, fiberglass industries and silicone products for many industries especially textile industriess</div>
                    <button class="custom-button btn" type="button">
                        <i class="fa-solid fa-angle-right"></i>
                        Show More
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Del Later -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <?php
                for ($i=0; $i < $count; $i++):
            ?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i ?>" class="<?php if($i == 0){ echo 'active'; }?>" aria-current="true" aria-label="Slide <?= $i; ?>"></button>
            <?php endfor ?>
        </div>
        <div class="carousel-inner">
            
            <?php
                $i = 0;
                while($pro = $stmt->fetch()):
            ?>
            <div class="carousel-item <?php if($i++ == 0){ echo 'active';}  ?> opacity-overlay" style="background-image: url('<?= $pro['product_img'] ?>')">
                <div class="carousel-caption">
                    <h5 class="heading"><?= $pro['product_name'] ?></h5>
                    <p class="sub-heading"><?= substr($pro['product_desc'],0,200) ?></p>
                    <div class="button-container">
                        <button class="custom-button btn" onclick="window.location.href='./single/product.php?product_code=<?= $pro['product_code'] ?>'" type="button">LEARN MORE</button>
                    </div>
                </div>
            </div>
            <?php endwhile ?>
        </div>
    </div>

    <!-- Best Seller Section -->
    <section class="best-seller-section section-extra">
        <div class="slide-container swiper container-fluid">
            
            <div class="intro heading underline">Best Sellers</div>
            <p class="intro paragraph">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta, deserunt dolore. Placeat corporis eos in veritatis modi nesciunt nihil earum minima a itaque commodi eligendi maxime, consequatur culpa cum nulla.</p>
            <div class="slide-content">

                <div class="custom-card-wrapper swiper-wrapper">
                    <?php
                        $stmt=$conn->prepare("SELECT * FROM products where best_seller = 1");
                        $stmt->execute();
                        while($pro = $stmt->fetch()):
                    ?>
                    <!-- Slide -->
                    <div class="custom-card swiper-slide" onclick="window.location.href='./single/product.php?product_code=<?= $pro['product_code'] ?>'">
                        <img src="<?= $pro['product_img'] ?>" alt="">
                        <div class="sub-heading"><?= $pro['product_name'] ?></div>
                    </div>
                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'bottombar.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="script/nav.js"></script>
    <!-- <script src="script/product/nav.js"></script> -->
    <script src="script/product/best.js"></script>
    <?php 
        if(isset($_SESSION['cat'])){
            unset($_SESSION['cat']);
        } 
    ?>
</body>
</html>
