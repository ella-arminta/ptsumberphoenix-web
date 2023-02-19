<?php
include 'api/connect.php';
function getData($fiturNama,$conn){
    $stmt = $conn->prepare('SELECT * FROM company_profile where fitur_name =? ');
    $stmt->execute([$fiturNama]);
    $temp = $stmt->fetch();
    $data = $temp['fitur_data'];
    return $data;
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/copyright.css">
    <link rel="stylesheet" href="style/nav_templates.css">
    <link rel="stylesheet" href="style/contact/contact.css">

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>PT Sumber Phoenix Makmur | Contact Us</title>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="paragraph"><a href="index.php">Home </a><span>/</span> <strong class="contact">Contact</strong></div>
            <div class="sub-heading">Contact</div>
        </div>
    </nav>

    <!-- Contact Section -->
    <section class="contact-section section-extra">
        <div class="container-fluid">
            <h1 class="heading underline">CONTACT</h1>
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
                            <div class="paragraph"><?= getData('address',$conn) ?></div>
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
                                <div class="paragraph"><?= getData('email',$conn) ?></div>
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
                                <div class="paragraph"><?= getData('phone',$conn) ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Input FIelds -->
                <div class="input-fields-container contact-container">
                    <form action="api/sendMsg.php" method="POST">
                    <?php if(isset($_GET['proid'])){
                        $stmt=$conn->prepare("SELECT product_name from products where product_id = ?");
                        $stmt->execute([$_GET['proid']]);
                        if($stmt->rowCount() > 0){
                            $proName =  $stmt->fetch();
                            $proName = $proName['product_name'];
                        }
                        }?>
                        <div class="user-info grid">
                            <input type="text" name="name" placeholder="Your Name" class="input-fields" required>
                            <input type="email" name="email" placeholder="Your Email" class="input-fields" required>
                        </div>
                        <input type="text" placeholder="Subject" name="subject" class="input-fields" value="<?php if(isset($proName)){ echo $proName;}?>" required>
                        <textarea placeholder="Message" id="msgTextarea" name="msg" required><?php if(isset($proName)){echo  'Please help to send quotation for '.$proName.', thank you!';} ?></textarea>
                        <div class="button-container">
                            <input type="submit" class="custom-button btn navbar-btn submit" value="Send Message">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- bottom section -->
    <?php include 'bottombar.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="script/nav.js"></script>
    <script src="script/contact/contact.js"></script>
    <?php if(isset($_GET['stat'])){
        if($_GET['stat'] == 'success'){
            echo '<script>
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Message sent!"
            })
            </script>';
        }
        if($_GET['stat'] ==  'failed'){
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Failed!",
                text: "Failed to sent message, please try again later."
            })
            </script>';
        }
    } ?>
</body>
</html>
