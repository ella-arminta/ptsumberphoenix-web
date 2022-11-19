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
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/copyright.css">
    <link rel="stylesheet" href="style/nav_templates.css">

    <link rel="stylesheet" href="style/updates/update.css">

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <title>PT Sumber Phoenix Makmur | Updates</title>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="paragraph"><a href="index.php">Home </a><span>/</span> <strong class="contact">Updates</strong></div>
            <div class="sub-heading">Updates</div>
        </div>
    </nav>

    <!-- Update Section -->
    <section class="update-section section-extra">
        <div class="container-fluid">
            
            <div class="update-highlights">
                <div class="highlight paragraph opacity-overlay update-item" style="background-image: url(src/updates/warehouse.jpeg);">
                    <div class="highlight-information">
                        <div class="highlight-tag">Important! </div>
                        <div class="highlight-title heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero</div>
                        <p class="paragraph">John Maxwell | Jan 1, 2022</p>
                    </div>
                </div>
                <div class="latest-updates">
                    <div class="sub-heading">Latest Updates</div>
                    <div class="latest-update update-item">
                        <div class="update-information">
                            <div class="update-title">Lorem ipsum dolor sit amet consectetur</div>
                            <p class="paragraph">John Maxwell | Jan 1, 2022</p>
                        </div>
                        <img src="src/updates/update.png" alt="">
                    </div>
                    <hr>
                    <div class="latest-update update-item">
                        <div class="update-information">
                            <div class="update-title">Lorem ipsum dolor sit amet consectetur</div>
                            <p class="paragraph">John Maxwell | Jan 1, 2022</p>
                        </div>
                        <img src="src/updates/update.png" alt="">
                    </div>
                    <hr>
                    <div class="latest-update update-item">
                        <div class="update-information">
                            <div class="update-title">Lorem ipsum dolor sit amet consectetur</div>
                            <p class="paragraph">John Maxwell | Jan 1, 2022</p>
                        </div>
                        <img src="src/updates/update.png" alt="">
                    </div>
                </div>
            </div>

            <div class="updates-list">
                <div class="heading underline">Our Updates</div>
                <div class="updates-items row">

                    <div class="col-sm-3 update-item">
                        <div class="card opacity-overlay" style="background-image: url(src/updates/covid.jpeg)">
                            <div class="card-information">
                                <div class="sub-heading">Lorem ipsum dolor sit amet consectetur</div>
                                <p class="paragraph">John Maxwell | Jan 1, 2022</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 update-item">
                        <div class="card opacity-overlay" style="background-image: url(src/updates/holiday.jpeg)">
                            <div class="card-information">
                                <div class="sub-heading">Lorem ipsum dolor sit amet consectetur</div>
                                <p class="paragraph">John Maxwell | Jan 1, 2022</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 update-item">
                        <div class="card opacity-overlay" style="background-image: url(src/updates/mask.jpeg)">
                            <div class="card-information">
                                <div class="sub-heading">Lorem ipsum dolor sit amet consectetur</div>
                                <p class="paragraph">John Maxwell | Jan 1, 2022</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 update-item">
                        <div class="card opacity-overlay" style="background-image: url(src/updates/warehouse.jpeg)">
                            <div class="card-information">
                                <div class="sub-heading">Lorem ipsum dolor sit amet consectetur</div>
                                <p class="paragraph">John Maxwell | Jan 1, 2022</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="button-container">
                    <button class="custom-button" tpye="button">Load More</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'bottombar.php' ?>

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
    <script src="script/nav.js"></script>
    <script src="script/update/updates.js"></script>
    <!-- <script src="script/contact/contact.js"></script> -->
    <script>
        var posts = [];
        $(document).ready(function(){
            
        })
        function getPost(num,posts){
            
        }
    </script>
</body>
</html>
