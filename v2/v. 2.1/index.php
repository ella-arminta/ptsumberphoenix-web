<?php
include "admin/api/connect.php";
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
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./style/nav.css">
    <link rel="stylesheet" href="./style/footer.css">
    <link rel="stylesheet" href="./style/copyright.css">
    <link rel="stylesheet" href="./style/arrow.css">

    <link rel="stylesheet" href="./style/home/home.css">
    <link rel="stylesheet" href="./style/home/client.css">
    <link rel="stylesheet" href="./style/home/about.css">
    <link rel="stylesheet" href="./style/home/field.css">
    <link rel="stylesheet" href="./style/home/why.css">
    <link rel="stylesheet" href="./style/home/update.css">
    <link rel="stylesheet" href="./style/home/team.css">
    <link rel="stylesheet" href="./style/home/blog.css">
    <link rel="stylesheet" href="./style/home/testimonials.css">
    <link rel="stylesheet" href="./style/home/faq.css">
    <link rel="stylesheet" href="./style/home/modal.css">

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <title>PT Sumber Phoenix Makmur | Chemicals Specialty</title>
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/navbar.php' ?>

    <!-- Home Section Page -->
    <section class="home-section homeImageChange" id="home"
        style="background-image: url('<?php echo getData('home_image',$conn) ?>')">
        <div class="container-fluid">
            <div class="home-wrapper">
                <h1 class="title"><?php echo getData('home_title',$conn) ?> </h1>
                <p class="paragraph"><?php echo getData('home_desc',$conn) ?> </p>
                <button class="custom-button btn product" type="button">Our Products</button>
            </div>
        </div>
    </section>

    <!-- Clients -->
    <section class="client-section">
        <div class="container-fluid">
            <div class="client-wrapper slider">
                <?php 
                    $stmt = $conn->prepare('SELECT * from clients');
                    $stmt->execute();
                    while($client = $stmt->fetch()):
                 ?>
                <div class="slide"><img src="src/<?= $client['client_logo'] ?>" alt="<?= $client['client_name'] ?>"></div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Business Fields -->
    <section class="business-fields-section section-extra" id="fields">
        <div class="container-fluid">
            <div class="business-fields-information">
                <h1 class="heading underline" ><?=getData('fields_title',$conn)?></h1>
                <p class="paragraph"><?=getData('fields_desc',$conn)?></p>
            </div>

            <div class="business-fields-content grid">
                <?php
                    $stmt = $conn->prepare("SELECT c.cat_code as cat_code,c.cat_name as cat_name,c.cat_id as cat_id,c.cat_img as cat_img, count(s.sub_id) 
                    FROM categories c 
                    join subcategories s on c.cat_id = s.cat_id 
                    join product_subcategory ps  on s.sub_id = ps.subcategory_id
                    join products p on ps.product_id = p.product_id
                    where c.status = 1 and s.status = 1 and p.status = 1 GROUP BY c.cat_id HAVING COUNT(ps.product_id) > 0 order by c.order_by ASC");
                    $stmt->execute();
                    while($row = $stmt->fetch()):
                ?>

                <a href="./shop.php?cateCode=<?= $row['cat_code'] ?>" class="field">
                    <div class="field-items" style="background-image: url('<?= $row['cat_img'] ?>');">
                        <div class="field-items-container">
                            <div class="sub-heading-container">
                                <div class="sub-heading"><?= $row['cat_name'] ?></div>
                            </div>
                            
                            <div class="button-container">
                                <button class="custom-button btn show-more" type="button" onclick="window.location='./shop.php?cateCode=<?= $row['cat_code'] ?>'">
                                    <i class="fa-solid fa-angle-right" style="margin-right: 10px;"></i>
                                    Show More
                                </button>
                            </div>
                        </div>
                    
                    </div>
                </a>

                <?php endwhile ?>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section class="about-section diagonal" id="about" style="background: black;">
        <div class="container-fluid grid diagonal-content">
            <div class="about-information">
                <div class="about-information-wrapper">
                    <h2 class="heading" ><?= getData('who_title',$conn) ?></h2>
                    <p class="paragraph" ><?= getData('who_desc',$conn)?> </p>
                    <div class="button-container-wrapper">
                        <button class="black-button btn contact" type="button">
                            Contact Us
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="about-features 1">
                <div class="about-features-wrapper">
                    <div class="features 1">
                        <i class="fa-solid fa-book"></i>
                        <h3 class="sub-heading">History</h3>
                        <p class="paragraph"><?=getData('history',$conn)?></p>
                    </div>
                    <div class="features 2">
                        <i class="fa-solid fa-clock"></i>
                        <h3 class="sub-heading">Experience</h3>
                        <p class="paragraph"><?=getData('experience',$conn)?></p>
                    </div>
                </div>
            </div>
            <div class="about-features 2">
                <div class="about-features-wrapper">
                    <div class="features 1">
                        <i class="fa-solid fa-lightbulb"></i>
                        <h3 class="sub-heading">Philosophy</h3>
                        <p class="paragraph"><?=getData('philosophy',$conn)?></p>
                    </div>
                    <div class="features 2">
                        <i class="fa-solid fa-bullseye"></i>
                        <h3 class="sub-heading">Purpose</h3>
                        <p class="paragraph"><?=getData('purpose',$conn)?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us -->
    <section class="why-us-section diagonal" id="why">
        <div class="container-fluid diagonal-content">
            <div class="text-center info">
                <!-- <h2 style="color: white;">Why<span style="color: #a6060a;"><strong>&nbsp;Us ?</strong></span></h2> -->
                <h2 class="d-inline-block" style="width: 70%; color: white; text-transform: uppercase;">
                    <strong><?= getData('why_desc',$conn)?></strong><br>
                </h2>
            </div>
            <div class="row">
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon">
                            <i class="fas fa-user-friends" style="margin-bottom: 15px;"></i>
                            <h4 class="title"><?= getData('why_us_title1',$conn) ?></h4>
                            <p class="description"><?= getData('why_us_desc1',$conn) ?><br></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon">
                            <i class="fas fa-thumbs-up" style="margin-bottom: 15px;"></i>
                            <h4 class="title"><?= getData('why_us_title2',$conn) ?></h4>
                            <p class="description"><?= getData('why_us_desc2',$conn) ?><br> </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon">
                            <i class="fas fa-phone" style="margin-bottom: 15px;"></i>
                            <h4 class="title"><?= getData('why_us_title3',$conn) ?> </h4>
                            <p class="description"><?= getData('why_us_desc3',$conn) ?><br></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon">
                            <i class="fas fa-warehouse" style="margin-bottom: 15px;"></i>
                            <h4 class="title" ><?= getData('why_us_title4',$conn) ?></h4>
                            <p class="description"><?= getData('why_us_desc4',$conn) ?><br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Update -->
    <section class="update-section section-extra" id="update">
        <div class="container-fluid">
            <div class="company-statistic-data grid">
                <!-- Update Statistics -->
                <div class="statistic-data 1" data-bs-toggle="modal" data-bs-target="#modal">
                    <div class="statistic-data-wrapper">
                        <div class="icon-container">
                            <i class="fa-solid fa-face-smile"></i>
                        </div>
                        <div class="statistic-data-number" data-target="<?= getData('statistics_total1',$conn) ?>">0
                        </div>
                        <p class="statistic-data-category paragraph"><?= getData('statistics_title1',$conn) ?></p>
                        <p class="statistic-data-content paragraph" hidden><?= getData('statistics_desc1',$conn) ?></p>
                    </div>
                </div>

                <div class="statistic-data 2" data-bs-toggle="modal" data-bs-target="#modal">
                    <div class="statistic-data-wrapper">
                        <div class="icon-container">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </div>
                        <div class="statistic-data-number" data-target="<?= getData('statistics_total2',$conn) ?>">0
                        </div>
                        <p class="statistic-data-category paragraph"><?= getData('statistics_title2',$conn) ?></p>
                        <p class="statistic-data-content paragraph" hidden><?= getData('statistics_desc2',$conn) ?></p>
                    </div>
                </div>
                <div class="statistic-data 3" data-bs-toggle="modal" data-bs-target="#modal">
                    <div class="statistic-data-wrapper">
                        <div class="icon-container">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div class="statistic-data-number" data-target="<?= getData('statistics_total3',$conn) ?>">0
                        </div>
                        <p class="statistic-data-category paragraph"><?= getData('statistics_title3',$conn) ?></p>
                        <p class="statistic-data-content paragraph" hidden><?= getData('statistics_desc3',$conn) ?></p>
                    </div>
                </div>

            </div>
            <!-- Modal Description Stats -->
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="homeImageLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title statsTitle" id="homeImageLabel">${title}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body statsBody">
                            ${content}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- COMPANY UPDATES -->
            <div class="company-updates">
                <div class="company-updates-navigation">
                    <?php
                        $i = 0;
                        $stmt = $conn->prepare("SELECT * FROM updates where status = 'featured'");
                        $stmt->execute();
                        while($row = $stmt->fetch()):
                            
                    ?>
                    <div class="navigation-item 
                            <?php
                                if($i == 0){
                                    echo ' 0 active';
                                }else{
                                    echo $i;
                                } 
                            ?>
                    ">
                        <i class="fa-solid fa-circle-info"></i>
                        <h2 class="sub-heading"><?= $row['upd_title'] ?></h2>
                    </div>
                    <?php $i++;endwhile; ?>
                </div>
                <div class="company-updates-content">
                    <?php
                          $j = 0;
                          $stmt = $conn->prepare("SELECT * FROM updates where status = 'featured'");
                          $stmt->execute();
                          while($row = $stmt->fetch()):
                            $j++;
                    ?>
                    <!-- Content 1 -->
                    <div class="content-panel <?php if($j == 1){echo 'active';} ?>" onclick="window.location.href='single/update.php?id=<?= $row['upd_id'] ?>'">
                        <div class="content-description">
                            <h1 class="content-title heading"><?= $row['upd_title'] ?></h1>
                            <p class="date">
                                <?php
                                $timeStamp = $row['timestamp'];
                                $timeStamp = date( "F d, Y", strtotime($timeStamp));
                                echo $timeStamp;
                                ?>
                            </p>
                            <div class="content-paragraph paragraph">
                                <?= $row['upd_sub'] ?><br>
                            </div>
                        </div>
                        <div class="content-image">
                            <img src="<?= $row['upd_pict'] ?>" alt="">
                        </div>
                    </div>
                    <?php endwhile; ?>
                <div class="read-more" onClick="window.location.href='./update.php'">See All Our Updates<i class="fa-solid fa-arrow-right"></i></div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section diagonal" id="team">
        <div class="container-fluid diagonal-content">

            <h1 class="heading underline"><?= getData('team_title',$conn)?> </h1>
            <p class="paragraph description" ><?= getData('team_sub_title',$conn)?></p>
            <div class="team-container grid">
                <?php
                    $stmt = $conn->prepare('SELECT * FROM employees');
                    $stmt->execute();
                    while($emp = $stmt->fetch()):
                ?>
                <div class="team-content">
                    <img src="./<?= $emp['emp_img'] ?>" alt="">
                    <div class="team-content-information">
                        <div class="team-content-wrapper">
                            <div class="sub-headings team-name"><?= $emp['emp_name'] ?></div>
                            <div class="paragraph team-title"><?= $emp['emp_position'] ?></div>      
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
                
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial-section section-extra">
        <div class="slide-container swiper container-fluid">

            <div class="intro heading underline"><?=getData('testi_title',$conn)?></div>
            <p class="intro paragraph"><?=getData('testi_sub_title',$conn)?></p>
            <div class="slide-content-1">

                <div class="custom-card-wrapper swiper-wrapper">
                    <?php
                        $stmt = $conn->prepare('SELECT * FROM testimonials where status = 2');
                        $stmt->execute();
                        while($testi = $stmt->fetch()):
                    ?>
                        <div class="custom-card swiper-slide">
                            <div class="testimonial-writter">
                                <img src="./<?= htmlspecialchars($testi['testi_pp']) ?>" alt="">
                                <div class="writter-information">
                                    <h2 class="sub-headings"><?= htmlspecialchars($testi['testi_name']) ?></h2>
                                    <div class="paragraph"><?= htmlspecialchars($testi['testi_intro'])  ?></div>
                                </div>
                            </div>
                            <div class="testimonial-quote">
                                <p class="paragraph">
                                    <i class="fa-solid fa-quote-left quote"></i>
                                    <?= htmlspecialchars($testi['testi_isi']) ?>
                                    <i class="fa-solid fa-quote-right quote1"></i>
                                </p>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>

            <div class="feedbacks" onclick="window.location.href='testimonial.php'">
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                <p class="paragraph">Send Us Feedbacks</p>
            </div>

        </div>
    </section>

    <!-- bottom section -->
    <?php include 'bottombar.php' ?>

    <!-- Arrow Up -->
    <a class="arrow-container" href="#">
        <div class="arrow">
            <i class="fa-solid fa-angles-up"></i>
        </div>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- <script src="./script/scroll.js"></script> -->
    <script src="./script/nav.js"></script>
    <script src="./script/number.js"></script>
    <script src="./script/modal.js"></script>

    <script src="./script/homepage/contact.js"></script>
    <script src="./script/homepage/product.js"></script>
    <script src="./script/homepage/client.js"></script>
    <script src="./script/homepage/update.js"></script>
    <script src="./script/homepage/blog.js"></script>
    <script src="./script/homepage/testimonials.js"></script>

    <!-- modal Description Stats JS -->
    <script src="./script/homepage/descStats.js"></script>
    <?php 
        if(isset($_SESSION['cat'])){
            unset($_SESSION['cat']);
        } 
    ?>
</body>

</html>