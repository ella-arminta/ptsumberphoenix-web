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
                <a class="footer-item" href="#home">
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