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
    <section class="home-section homeImageChange"
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
    <!-- About Us -->
    <section class="about-section diagonal" id="about">
        <div class="container-fluid diagonal-content grid">
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

    <!-- Business Fields -->
    <section class="business-fields-section section-extra" id="fields">
        <div class="container-fluid">
            <div class="business-fields-information">
                <h1 class="heading underline" ><?=getData('fields_title',$conn)?></h1>
                <p class="paragraph"><?=getData('fields_desc',$conn)?></p>
            </div>

            <div class="business-fields-content grid">
                <?php
                    $stmt = $conn->prepare("SELECT * FROM categories where status = 1");
                    $stmt->execute();
                    while($row = $stmt->fetch()):
                ?>
                <div class="field opacity-overlay" style="background-image: url(./<?= $row['cat_img'] ?>)" >
                    <div class="sub-heading"><?= $row['cat_name'] ?></div>
                </div>
                <?php endwhile ?>
            </div>
        </div>
    </section>

    <!-- Why Us -->
    <section class="why-us-section diagonal" id="why">
        <div class="container-fluid diagonal-content">
            <div class="text-center info">
                <h2 style="color: white;">Why<span style="color: #FFA600;"><strong>&nbsp;Us ?</strong></span></h2>
                <p class="d-inline-block" style="width: 50%; color: white;">
                    <strong><?= getData('why_desc',$conn)?></strong><br>
                </p>
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
                <div class="statistic-data 4" data-bs-toggle="modal" data-bs-target="#modal">
                    <div class="statistic-data-wrapper">
                        <div class="icon-container">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div class="statistic-data-number" data-target="<?= getData('statistics_total4',$conn) ?>">0
                        </div>
                        <p class="statistic-data-category paragraph"><?= getData('statistics_title4',$conn) ?></p>
                        <p class="statistic-data-content paragraph" hidden><?= getData('statistics_desc4',$conn) ?></p>
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
                    <div class="navigation-item 0 active">
                        <i class="fa-solid fa-warehouse"></i>
                        <h2 class="sub-heading">The RHM New Warehouse</h2>
                    </div>
                    <div class="navigation-item 1">
                        <i class="fa-solid fa-briefcase-medical"></i>
                        <h2 class="sub-heading">Fight Covid - 19 together with us</h2>
                    </div>
                    <div class="navigation-item 2">
                        <i class="fa-solid fa-gifts"></i>
                        <h2 class="sub-heading">Idul Fitri 1443H Holiday Shut Down</h2>
                    </div>
                    <div class="navigation-item 3">
                        <i class="fa-solid fa-bookmark"></i>
                        <h2 class="sub-heading">Stay Safe, Wear your Mask !</h2>
                    </div>
                </div>
                <div class="company-updates-content">

                    <!-- Content 1 -->
                    <div class="content-panel active" onclick="window.location.href='./templates/single/update.html'">
                        <div class="content-description">
                            <h1 class="content-title heading">The RHM New Warehouse !</h1>
                            <p class="date">December 10, 2021</p>
                            <div class="content-paragraph paragraph">
                                <pre>
PT. Rena Haniem Mulia has officially launched the new warehouse in Pergudangan Bizhub, Bogor. The facility will enable PT. Rena Haniem Mulia to manage client’s needs and demand. The warehouse is also use to store additional items.<br>
                                </pre>
                            </div>
                        </div>
                        <div class="content-image">
                            <img src="./src/updates/warehouse.jpeg" alt="">
                        </div>
                    </div>

                    <!-- Content 2 -->
                    <div class="content-panel" onclick="window.location.href='./templates/single/update.html'">
                        <div class="content-description">
                            <h1 class="content-title heading">FIGHT COVID-19 TOGETHER</h1>
                            <p class="date">July 06, 2020</p>
                            <div class="content-paragraph paragraph">
                                <pre>
Since the outbreak of COVID-19,&nbsp;<a href="https://news.sky.com/story/coronavirus-rise-in-demand-for-hand-sanitisers-and-hygiene-products-11948021">sales of hand sanitizers have soared</a>. It’s become such a sought-after product that pharmacies and supermarkets have started&nbsp;<a href="https://www.bbc.co.uk/news/uk-51729012">limiting the number</a>&nbsp;that people can buy at one time. Though hand sanitizers can help reduce our risk of catching certain infections, not all hand sanitizers are equally effective against coronavirus.Washing with warm water and soap remains the&nbsp;<a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3249958/">gold standard for hand hygiene</a>&nbsp;and preventing the spread of infectious diseases. Washing with warm water (not cold water) and soap removes oils from our hands that can harbour microbes.Hand sanitizers can also protect against disease-causing microbes, especially in situations when&nbsp;<a href="https://www.fda.gov/consumers/if-soap-and-water-are-not-available-hand-sanitizers-may-be-good-alternative">soap and water aren’t available</a>.&nbsp;<br>
                                </pre>
                            </div>
                        </div>
                        <div class="content-image">
                            <img src="./src/updates/covid.jpeg" alt="">
                        </div>
                    </div>

                    <!-- Content 3 -->
                    <div class="content-panel" onclick="window.location.href='./templates/single/update.html'">
                        <div class="content-description">
                            <h1 class="content-title heading">IDUL FITRI 1443H Holiday</h1>
                            <p class="date">April 27. 2022</p>
                            <div class="content-paragraph paragraph">
                                <pre>
Dear Valued Customer, in anticipating of the forthcoming Idul Fitri 1443H, PT. Rena Haniem Mulia will not be operating during 26 Apr 2022&nbsp; - 08 May 2022 and at 11 May 2022 we will Start delivery process&nbsp;We are requesting all our valued customers for assistance in providing us with an early schedule of your supply needs prior to and after the holidays. This is to ensure all your needs are taken care of during the above mention period and avoid any delays in supplies. We take this opportunity to thank you, our valued customer for your valued patronage and cooperation. Stay safe, do take care of your health and protect others. Hopefully this covid-19 situation will end soon.&nbsp;<br>
                                </pre>
                            </div>
                        </div>
                        <div class="content-image">
                            <img src="./src/updates/holiday.jpeg" alt="">
                        </div>
                    </div>

                    <!-- Content 4 -->
                    <div class="content-panel" onclick="window.location.href='./templates/single/update.html'">
                        <div class="content-description">
                            <h1 class="content-title heading">STAY SAFE, WEAR YOUR MASK!</h1>
                            <p class="date">July 02, 2020</p>
                            <div class="content-paragraph paragraph">
                                <pre>
To help flatten the COVID-19 curve, the government is now urging people to wear face masks whenever they are out in public. The new recommendation is an update from the previous guidelines and is in line with the World Health Organization’s (WHO) latest recommendation. Previously, Indonesia complied with the WHO’s recommendations that face masks only be worn by medical professionals and sick people in order to prevent a supply shortage.&nbsp;The public can wear cloth masks, or masks made from other materials, as long as they can prevent the spread of saliva droplets when speaking.&nbsp;<br>
                                </pre>
                            </div>
                        </div>
                        <div class="content-image">
                            <img src="./src/updates/mask.jpeg" alt="">
                        </div>
                    </div>
                </div>

                <div class="read-more" onClick="window.location.href='./templates/update.html'">
                    See All Our Updates
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
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
                    <div class="team-content-social-media">
                        <div class="icon-container">
                            <a href="<?= $emp['emp_insta']?>" class="fa-brands fa-instagram"></a>
                        </div>
                        <div class="icon-container">
                            <a href="<?= $emp['emp_linkedin']?>" class="fa-brands fa-linkedin"></a>
                        </div>
                        <div class="icon-container">
                            <a href="<?= $emp['emp_facebook']?>" class="fa-brands fa-facebook"></a>
                        </div>
                        <div class="icon-container">
                            <a href="<?= $emp['emp_twitter']?>" class="fa-brands fa-twitter"></a>
                        </div>
                    </div>
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

    <!-- Blog Section -->
    <section class="blog-section section-extra">
        <div class="slide-container swiper container-fluid">
            <div class="slide-content">
                <div class="custom-card-wrapper swiper-wrapper">

                    <!-- Slide -->
                    <div class="custom-card swiper-slide">
                        <div class="blog-image-content">
                            <img src="./src/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-title-content-container">
                            <div class="blog-content-category">Lorem Ipsum</div>
                            <h1 class="blog-title-content heading">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. </h1>
                            <a href="./templates/single/update.html" class="paragraph">Learn more...</a>
                        </div>
                    </div>

                    <!-- Slide -->
                    <div class="custom-card swiper-slide">
                        <div class="blog-image-content">
                            <img src="./src/blog/2.jpg" alt="">
                        </div>
                        <div class="blog-title-content-container">
                            <div class="blog-content-category">Lorem Ipsum</div>
                            <h1 class="blog-title-content heading">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. </h1>
                            <a href="./templates/single/update.html" class="paragraph">Learn more...</a>
                        </div>
                    </div>

                    <!-- Slide -->
                    <div class="custom-card swiper-slide">
                        <div class="blog-image-content">
                            <img src="./src/blog/3.jpg" alt="">
                        </div>
                        <div class="blog-title-content-container">
                            <div class="blog-content-category">Lorem Ipsum</div>
                            <h1 class="blog-title-content heading">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. </h1>
                            <a href="./templates/single/update.html" class="paragraph">Learn more...</a>
                        </div>
                    </div>

                    <!-- Slide -->
                    <div class="custom-card swiper-slide">
                        <div class="blog-image-content">
                            <img src="./src/blog/4.jpg" alt="">
                        </div>
                        <div class="blog-title-content-container">
                            <div class="blog-content-category">Lorem Ipsum</div>
                            <h1 class="blog-title-content heading">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. </h1>
                            <a href="./templates/single/update.html" class="paragraph">Learn more...</a>
                        </div>
                    </div>
                    <!-- Slide -->
                    <div class="custom-card swiper-slide">
                        <div class="blog-image-content">
                            <img src="./src/blog/5.jpg" alt="">
                        </div>
                        <div class="blog-title-content-container">
                            <div class="blog-content-category">Lorem Ipsum</div>
                            <h1 class="blog-title-content heading">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. </h1>
                            <a href="./templates/single/update.html" class="paragraph">Learn more...</a>
                        </div>
                    </div>

                    <!-- Slide -->
                    <div class="custom-card swiper-slide">
                        <div class="blog-image-content">
                            <img src="./src/blog/6.jpg" alt="">
                        </div>
                        <div class="blog-title-content-container">
                            <div class="blog-content-category">Lorem Ipsum</div>
                            <h1 class="blog-title-content heading">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. </h1>
                            <a href="./templates/single/update.html" class="paragraph">Learn more...</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial-section diagonal">
        <div class="slide-container swiper container-fluid diagonal-content">

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

    <!-- FAQ Section -->
    <section class="faq-section section-extra">
        <div class="container-fluid">
            <h2 class="heading underline">FREQUENTLY ASKED QUESTIONS</h2>
            <div class="accordion" id="accordionExample">
                <?php
                    $stmt=$conn->prepare('SELECT * FROM faq');
                    $stmt->execute();
                    while($faq = $stmt->fetch()):
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-<?=$faq['faq_id']?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse-<?= $faq['faq_id'] ?>" aria-expanded="false" aria-controls="collapse-<?= $faq['faq_id'] ?>">
                            <?= $faq['faq_thumbnail'] ?>
                        </button>
                    </h2>
                    <div id="collapse-<?= $faq['faq_id'] ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?=$faq['faq_id']?>"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?= $faq['faq_desc'] ?>
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>
    </section>

    <!-- bottom section -->
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

    <!-- Arrow Up -->
    <a class="arrow-container" href="#">
        <div class="arrow">
            <i class="fa-solid fa-angles-up"></i>
        </div>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

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
</body>

</html>