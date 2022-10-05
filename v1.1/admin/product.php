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
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style/nav.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/copyright.css">
    <link rel="stylesheet" href="../style/nav_templates.css">

    <link rel="stylesheet" href="../style/product/nav.css">
    <link rel="stylesheet" href="../style/product/features.css">
    <link rel="stylesheet" href="../style/product/best.css">

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <title>PT Sumber Phoenix Makmur | Products</title>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="paragraph"><a href="../index.php">Home </a><span>/</span> <strong class="product">Features</strong></div>
        <div class="container-fluid">
            <div class="navbar-brand">
                <div class="sub-heading">Features</div>
            </div>

            <div class="navbar-wrapper">
                <a href="./contact.html"><button class="custom-button btn navbar-btn contact" type="button">Contact Us</button></a>
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
                        <a class="nav-link paragraph" href="./shop.html">Shop</a>
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

    <!-- Featured Section -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active opacity-overlay" style="background-image: url('../src/product/casting.jpg')">
                <div class="carousel-caption">
                    <h5 class="heading">First slide label</h5>
                    <p class="sub-heading">Some representative placeholder content for the first slide.</p>
                    <div class="button-container">
                        <button class="custom-button btn" onclick="window.location.href='./single/product.html'" type="button">LEARN MORE</button>
                    </div>
                </div>
            </div>
            <div class="carousel-item opacity-overlay" style="background-image: url('../src/product/dispersion.jpg')">
                <div class="carousel-caption">
                    <h5 class="heading">Second slide label</h5>
                    <p class="sub-heading">Some representative placeholder content for the second slide.</p>
                    <div class="button-container">
                        <button class="custom-button btn" onclick="window.location.href='./single/product.html'" type="button">LEARN MORE</button>
                    </div>
                </div>
            </div>
            <div class="carousel-item opacity-overlay" style="background-image: url('../src/product/hydraulic_fluid.jpg')">
                <div class="carousel-caption">
                    <h5 class="heading">Third slide label</h5>
                    <p class="sub-heading">Some representative placeholder content for the third slide.</p>
                    <div class="button-container">
                        <button class="custom-button btn" onclick="window.location.href='./single/product.html'" type="button">LEARN MORE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Seller Section -->
    <section class="best-seller-section section-extra">
        <div class="slide-container swiper container-fluid">
            
            <div class="intro heading underline">Best Sellers</div>
            <p class="intro paragraph">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta, deserunt dolore. Placeat corporis eos in veritatis modi nesciunt nihil earum minima a itaque commodi eligendi maxime, consequatur culpa cum nulla.</p>
            <div class="slide-content">

                <div class="custom-card-wrapper swiper-wrapper">
                    
                    <!-- Slide -->
                    <div class="custom-card swiper-slide" onclick="window.location.href='./single/product.html'">
                        <img src="../src/product/best-seller/buhler.jpg" alt="">
                        <div class="sub-heading">Lorem Ipsum</div>
                    </div>

                    <!-- Slide -->
                    <div class="custom-card swiper-slide" onclick="window.location.href='./single/product.html'">
                        <img src="../src/product/best-seller/car.jpg" alt="">
                        <div class="sub-heading">Lorem Ipsum</div>
                    </div>       
                    
                    <!-- Slide -->
                    <div class="custom-card swiper-slide" onclick="window.location.href='./single/product.html'">
                        <img src="../src/product/best-seller/cooling.jpg" alt="">
                        <div class="sub-heading">Lorem Ipsum</div>
                    </div>    
                    
                    <!-- Slide -->
                    <div class="custom-card swiper-slide" onclick="window.location.href='./single/product.html'">
                        <img src="../src/product/best-seller/frigel.jpg" alt="">
                        <div class="sub-heading">Lorem Ipsum</div>
                    </div>  

                    <!-- Slide -->
                    <div class="custom-card swiper-slide" onclick="window.location.href='./single/product.html'">
                        <img src="../src/product/best-seller/silicone_heat.jpg" alt="">
                        <div class="sub-heading">Lorem Ipsum</div>
                    </div>  

                    <!-- Slide -->
                    <div class="custom-card swiper-slide" onclick="window.location.href='./single/product.html'">
                        <img src="../src/product/best-seller/silicone.jpg" alt="">
                        <div class="sub-heading">Lorem Ipsum</div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../script/nav.js"></script>
    <script src="../script/product/nav.js"></script>
    <script src="../script/product/best.js"></script>
</body>
</html>
