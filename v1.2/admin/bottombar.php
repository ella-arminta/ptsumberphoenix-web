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
                    <img src="../src/<?= getData1('logo',$conn) ?>" id="company-logo" alt="">
                    
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
                <a class="footer-item" href="./templates/product.html">
                    <i class="fa-solid fa-angle-right"></i>
                    Products
                </a>
                <a class="footer-item" href="./templates/contact.html">
                    <i class="fa-solid fa-angle-right"></i>
                    Contact
                </a>
            </div>
            <div class="business-fields useful-links">
                <h2 class="sub-heading underline">Business Fields</h2>
                <?php
                    $stmt=$conn->prepare("SELECT * FROM categories where status = 1");
                    $stmt->execute();
                    while($cat = $stmt->fetch()):
                ?>
                <a class="footer-item">
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