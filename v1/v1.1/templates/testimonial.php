<?php
include '../php/connect.php';
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
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/copyright.css">
    <link rel="stylesheet" href="../style/nav_templates.css">
    <link rel="stylesheet" href="../style/contact/contact.css">
    <link rel="stylesheet" href="../style/file_inputs.css">

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>PT Sumber Phoenix Makmur | Testimonial</title>
</head>
<body>

    <?php   
    if (isset($_GET['success'])) {
        echo '
            <script>
                swal({
                    title: "Success!",
                    text: "Thankyou For Your Feedbacks :)",
                    icon: "success"
                });
            </script>
        ';
    }
    ?>
    
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="paragraph"><a href="../index.php">Home </a><span>/</span> <strong class="contact">Testimonial</strong></div>
            <div class="sub-heading">Testimonial</div>
        </div>
    </nav>

    <!-- Contact Section -->
    <section class="contact-section section-extra">
        <div class="container-fluid">
            <h1 class="heading underline">TESTIMONIAL</h1>
            <p class="paragraph description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur perferendis officia, tempora quas adipisci praesentium nam. Doloremque itaque provident ratione, quidem inventore placeat tempora dolorem pariatur consequuntur! Sapiente, ratione saepe?</p>
            <div class="container-wrapper grid">
                <!-- Company Information -->
                <div class="company-information">
                    <div class="address-container contact-container information">
                        <div class="address">
                            <div class="icon-wrapper">
                                <div class="icon-container">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                            </div>
                            <div class="sub-heading">Our Address</div>
                            <div class="paragraph">Jl. Raya Serpong Km. 7 - Pakulonan Serpong Utara - Tanggerang Selatan Indonesia - 15325</div>
                        </div>
                    </div>
                    <div class="company-contacts grid">
                        <div class="company-email-container contact-container information">
                            <div class="company-email">
                                <div class="icon-wrapper">
                                    <div class="icon-container">
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="sub-heading">Email Us</div>
                                <div class="paragraph">phoenix-spm@sumberphoenix.co.id</div>
                            </div>
                        </div>
                        <div class="company-phone-container contact-container information">
                            <div class="company-phone">
                                <div class="icon-wrapper">
                                    <div class="icon-container">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                </div>
                                <div class="sub-heading">Call Us</div>
                                <div class="paragraph">+62 21 5398 318</div>
                                <div class="paragraph">+62 21 5398 335</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Input FIelds -->
                <div class="input-fields-container contact-container">
                    <form method="POST" action="../php/testimonials/send_testimonials.php" enctype="multipart/form-data">
                        <div class="user-info grid">
                            <input name="name" type="text" placeholder="Full Name" class="input-fields" required>
                            <input name="about" type="text" placeholder="Brief Introduction About Yourself" class="input-fields" required>
                        </div>
                        <div class="file-drop-area">
                            <span class="fake-btn">Choose Files</span>
                            <span class="file-msg">or drag and drop your Profile Picture here</span>
                            <input name="image" type="file" class="file-input" accept="images/*" placeholder="hi" required>
                        </div>
                        <textarea name="testimonial" placeholder="Testimonial" required></textarea>
                        <div class="button-container">
                            <input name="submit" type="submit" class="custom-button btn navbar-btn submit" value="Send Feedbacks">
                        </div>
                    </form>
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
                <a class="footer-item" href="./product.html">
                    <i class="fa-solid fa-angle-right"></i>
                    Products
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
    <script src="../script/file_input.js"></script>
    <script src="../script/contact/contact.js"></script>
</body>
</html>
