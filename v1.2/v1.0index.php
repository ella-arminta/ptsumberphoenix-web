<?php
include "./php/connect.php";

// $id = 1;
// $sql = "SELECT * from home WHERE login_id = '$id'";
// $home = mysqli_query($conn, $sql);

// $sql = "SELECT * FROM about WHERE login_id = '$id'";
// $about = mysqli_query($conn, $sql);

// $sql = "SELECT * FROM business_fields WHERE login_id = '$id'";
// $business_fields = mysqli_query($conn, $sql);

// $sql = "SELECT * FROM business_fields_information WHERE login_id = '$id'";
// $business_fields_info = mysqli_query($conn, $sql);

// $sql = "SELECT * FROM why_us WHERE login_id = '$id'";
// $why_us = mysqli_query($conn, $sql);

// $sql = "SELECT * FROM why_us_content WHERE login_id = '$id'";
// $why_us_content = mysqli_query($conn, $sql);

// $sql = "SELECT * FROM statistics WHERE login_id = '$id'";
// $statistics = mysqli_query($conn, $sql);

// $sql = "SELECT * FROM team WHERE login_id = '$id'";
// $team = mysqli_query($conn, $sql);

// $sql = "SELECT * FROM team_info WHERE login_id = '$id'";
// $team_info = mysqli_query($conn, $sql);

// $sql = "SELECT * FROM testimonial WHERE login_id = '$id' AND display = '1'";
// $testimonial = mysqli_query($conn, $sql);

// $sql = "SELECT * FROM testimonial_info WHERE login_id = '$id'";
// $testimonial_info = mysqli_query($conn, $sql);

// if (isset($home) && isset($about) && isset($business_fields_info) && isset($why_us) && isset($team_info) && isset($testimonial_info)) {
//     $row_home = mysqli_fetch_array($home);
//     $row_about = mysqli_fetch_array($about);
//     $row_business_fields_info = mysqli_fetch_array($business_fields_info);
//     $row_why_us = mysqli_fetch_array($why_us);
//     $row_team_info = mysqli_fetch_array($team_info);
//     $row_testimonial_info = mysqli_fetch_array($testimonial_info);
// }
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
    <?php
    if (isset($row_home)) {
        echo '
            <section class="home-section" style="background-image: url(./'.$row_home['home_image'].')">
                <div class="container-fluid">
                    <div class="home-wrapper">
                        <h1 class="title">'.$row_home['title'].'</h1>
                        <p class="paragraph">'.$row_home['sub_title'].'</p>
                        <button class="custom-button btn product" type="button">Our Products</button>
                    </div> 
                </div>
            </section>
        ';
    } else {
        echo '
            <section class="home-section" style="background-image: url(./src/background.jpg)">
                <div class="container-fluid">
                    <div class="home-wrapper">
                        <h1 class="title">Are You Looking For A Great Product And Solution ?</h1>
                        <p class="paragraph">We provide products to suit your needs to support your business. To find out more, click the button below</p>
                        <button class="custom-button btn product" type="button">Our Products</button>
                    </div>
                </div>
            </section>
        ';
    }
    ?>

    <!-- Clients -->
    <section class="client-section">
        <div class="container-fluid">
            <div class="client-wrapper slider">
                <div class="slide"><img src="./src/client/agres.png" alt="client"></div>
                <div class="slide"><img src="./src/client/AHM.png" alt="client"></div>
                <div class="slide"><img src="./src/client/buhler.png" alt="client"></div>
                <div class="slide"><img src="./src/client/ct-logistic.png" alt="client"></div>
                <div class="slide"><img src="./src/client/frigel.png" alt="client"></div>
                <div class="slide"><img src="./src/client/namsiang-group.png" alt="client"></div>
                <div class="slide"><img src="./src/client/rhm.png" alt="client"></div>
                <div class="slide"><img src="./src/client/toyota.png" alt="client"></div>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section class="about-section diagonal" id="about">
        <div class="container-fluid diagonal-content grid">
            <?php
            if (isset($row_about)) {
                echo '
                    <div class="about-information">
                        <div class="about-information-wrapper">
                            <h2 class="heading">'.$row_about['title'].'</h2>
                            <p class="paragraph">'.$row_about['description'].'</p>
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
                                <p class="paragraph">'.$row_about['history'].'</p>
                            </div>
                            <div class="features 2">
                                <i class="fa-solid fa-clock"></i>
                                <h3 class="sub-heading">Experience</h3>
                                <p class="paragraph">'.$row_about['experience'].'</p>
                            </div>
                        </div>
                    </div>
                    <div class="about-features 2">
                        <div class="about-features-wrapper">
                            <div class="features 1">
                                <i class="fa-solid fa-lightbulb"></i>
                                <h3 class="sub-heading">Philosophy</h3>
                                <p class="paragraph">'.$row_about['philosophy'].'</p>
                            </div>
                            <div class="features 2">
                                <i class="fa-solid fa-bullseye"></i>
                                <h3 class="sub-heading">Purpose</h3>
                                <p class="paragraph">'.$row_about['purpose'].'</p>
                            </div>
                        </div>
                    </div>
                ';
            } else {
                echo '
                    <div class="about-information">
                        <div class="about-information-wrapper">
                            <h2 class="heading">Who Are We ?</h2>
                            <p class="paragraph">
                                We are one of the major players in the field of specialty 
                                chemicals for rubber, coating, cable, die casting and other 
                                industrial chemicals. We serve the needs of speciality 
                                chemicals from industrial users, to create additional value 
                                for the output product. We would like to provide our customers 
                                high quality products and satisfied service.
                            </p>
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
                                <p class="paragraph">PT.SUMBER PHOENIX MAKMUR was established in 2003 as importer of chemical raw materials and specials additives.</p>
                            </div>
                            <div class="features 2">
                                <i class="fa-solid fa-clock"></i>
                                <h3 class="sub-heading">Experience</h3>
                                <p class="paragraph">Years of international partnership combined with knowledge of the Indonesian market give the company a competitive advantage in providing comprehensive specialty chemical supply programs and service.</p>
                            </div>
                        </div>
                    </div>
                    <div class="about-features 2">
                        <div class="about-features-wrapper">
                            <div class="features 1">
                                <i class="fa-solid fa-lightbulb"></i>
                                <h3 class="sub-heading">Philosophy</h3>
                                <p class="paragraph">The company\'s business philosophy is Customer Satisfaction is Our Priority, and Creating Value for the Customer.</p>
                            </div>
                            <div class="features 2">
                                <i class="fa-solid fa-bullseye"></i>
                                <h3 class="sub-heading">Purpose</h3>
                                <p class="paragraph">PT.SUMBER PHOENIX MAKMUR will continuously strive to develope complete product lines, improves its service, and create more value for its customers and suppliers.</p>
                            </div>
                        </div>
                    </div>
                ';
            }
            ?>
        </div>
    </section>

    <!-- Business Fields -->
    <section class="business-fields-section section-extra" id="fields">
        <div class="container-fluid">
            <div class="business-fields-information">
                <?php
                if (isset($row_business_fields_info)) {
                    echo '
                        <h1 class="heading underline">'.$row_business_fields_info['title'].'</h1>
                        <p class="paragraph">'.$row_business_fields_info['description'].'</p>
                    ';
                } else {
                    echo '
                        <h1 class="heading underline">Business Fields</h1>
                        <p class="paragraph">We Provide so much product to distributed</p>
                    ';
                }
                ?>
            </div>

            <div class="business-fields-content grid">
                <?php
                if (isset($business_fields)) {
                    while($row_business_fields = mysqli_fetch_array($business_fields)) {
                        echo '
                            <div class="field opacity-overlay" style="background-image: url(./'.$row_business_fields['image'].')" >
                                <div class="sub-heading">'.$row_business_fields['title'].'</div>
                            </div>
                        ';
                    }
                } else {
                    echo '
                        <div class="field opacity-overlay" style="background-image: url(./src/fields/rubber.jpg)" >
                            <div class="sub-heading">Rubber Industries</div>
                        </div>
                        <div class="field opacity-overlay" style="background-image: url(./src/fields/plastic.jpg)">
                            <div class="sub-heading">Plastic Industries</div>
                        </div>
                        <div class="field opacity-overlay" style="background-image: url(./src/fields/casting.jpg)">
                            <div class="sub-heading">Die Casting</div>
                        </div>
                        <div class="field opacity-overlay" style="background-image: url(./src/fields/ink.jpg)">
                            <div class="sub-heading">coating and ink industries</div>
                        </div>
                        <div class="field opacity-overlay" style="background-image: url(./src/fields/acrylic.jpg)">
                            <div class="sub-heading">acrylic sheet</div>
                        </div>
                        <div class="field opacity-overlay" style="background-image: url(./src/fields/industry.jpg)">
                            <div class="sub-heading">other industries</div>
                        </div>
                    ';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Why Us -->
    <section class="why-us-section diagonal" id="why">
        <div class="container-fluid diagonal-content">
            <?php
            if (isset($row_why_us)) {
                echo '
                    <div class="text-center info">
                        <h2 style="color: white;">Why<span style="color: #FFA600;"><strong>&nbsp;Us ?</strong></span></h2>
                        <p class="d-inline-block" style="width: 50%; color: white;"><strong>'.$row_why_us['description'].'</strong><br></p>
                    </div>
                ';
            } else {
                echo '
                    <div class="text-center info">
                        <h2 style="color: white;">Why<span style="color: #FFA600;"><strong>&nbsp;Us ?</strong></span></h2>
                        <p class="d-inline-block" style="width: 50%; color: white;"><strong>Customer Satisfaction is Our Priority!</strong><br></p>
                    </div>
                ';
            }
            ?>
            <div class="row">

                <?php
                    $icon_list = array('fas fa-user-friends', 'fas fa-thumbs-up', 'fas fa-phone', 'fas fa-warehouse');
                    $index = 0;
                    if (isset($why_us_content)) {
                        while ($row_why_us_content = mysqli_fetch_array($why_us_content)) {
                            echo '
                                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                                    <div class="text-center icon-box">
                                        <div class="icon">
                                            <i class="'.$icon_list[$index].'" style="margin-bottom: 15px;"></i>
                                            <h4 class="title">'.$row_why_us_content['title'].'</h4>
                                            <p class="description">'.$row_why_us_content['description'].'<br></p>
                                        </div>
                                    </div>
                                </div>
                            ';

                            $index++;
                        }
                    }
                ?>

            </div>
        </div>
    </section>

    <!-- Update -->
    <section class="update-section section-extra" id="update">
        <div class="container-fluid">
            <div class="company-statistic-data grid">
                <?php
                if (isset($statistics)) {
                    $icon = array('fa-solid fa-face-smile', 'fa-solid fa-screwdriver-wrench', 'fa-solid fa-calendar-days', 'fa-solid fa-user-group');
                    $index = 0;
                    while($row_statistics = mysqli_fetch_array($statistics)) {
                        echo '
                            <div class="statistic-data '.$row_statistics['statistics_id'].'" data-bs-toggle="modal" data-bs-target="#modal">
                                <div class="statistic-data-wrapper">
                                    <div class="icon-container">
                                        <i class="'.$icon[$index].'"></i>
                                    </div>
                                    <div class="statistic-data-number" data-target="'.$row_statistics['total'].'">0</div>
                                    <p class="statistic-data-category paragraph">'.$row_statistics['title'].'</p>
                                    <p class="statistic-data-content paragraph" hidden>'.$row_statistics['content'].'</p>
                                </div>
                            </div>
                        ';

                        $index++;
                    }
                }
                ?>
            </div>
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
            <?php
            if (isset($row_team_info)) {
                echo '
                    <h1 class="heading underline">'.$row_team_info['title'].'</h1>
                    <p class="paragraph description">'.$row_team_info['sub_title'].'</p>
                ';
            } else {
                echo '
                    <h1 class="heading underline">Team</h1>
                    <p class="paragraph description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur molestiae nisi laboriosam quia mollitia commodi eos quas harum asperiores id distinctio nostrum exercitationem in earum, dicta dolor sint aut odio.</p>
                ';
            }
            ?>
            <div class="team-container grid">
                <?php
                if (isset($team)) {
                    while ($row_team = mysqli_fetch_array($team)) {
                        echo '
                            <div class="team-content">
                                <img src="./'.$row_team['image'].'" alt="">
                                <div class="team-content-social-media">
                                    <div class="icon-container">
                                        <a href="#" class="fa-brands fa-instagram"></a>
                                    </div>
                                    <div class="icon-container">
                                        <a href="#" class="fa-brands fa-linkedin"></a>
                                    </div>
                                    <div class="icon-container">
                                        <a href="#" class="fa-brands fa-facebook"></a>
                                    </div>
                                    <div class="icon-container">
                                        <a href="#" class="fa-brands fa-twitter"></a>
                                    </div>
                                </div>
                                <div class="team-content-information">
                                    <div class="team-content-wrapper">
                                        <div class="sub-headings team-name">'.$row_team['name'].'</div>
                                        <div class="paragraph team-title">'.$row_team['position'].'</div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                }
                ?>
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
                            <h1 class="blog-title-content heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h1>
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
                            <h1 class="blog-title-content heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h1>
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
                            <h1 class="blog-title-content heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h1>
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
                            <h1 class="blog-title-content heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h1>
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
                            <h1 class="blog-title-content heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h1>
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
                            <h1 class="blog-title-content heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h1>
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
            
            <?php
            if (isset($row_testimonial_info)) {
                echo '
                    <div class="intro heading underline">'.$row_testimonial_info['title'].'</div>
                    <p class="intro paragraph">'.$row_testimonial_info['sub_title'].'</p>
                    <div class="slide-content-1">
                ';
            } else {
                echo '
                    <div class="intro heading underline">Testimonials</div>
                    <p class="intro paragraph">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta, deserunt dolore. Placeat corporis eos in veritatis modi nesciunt nihil earum minima a itaque commodi eligendi maxime, consequatur culpa cum nulla.</p>
                    <div class="slide-content-1">
                ';
            }
            ?>

                <div class="custom-card-wrapper swiper-wrapper">

                    <?php
                    if (isset($testimonial)) {
                        while($row_testimonial = mysqli_fetch_array($testimonial)) {
                            echo '
                                <div class="custom-card swiper-slide">
                                    <div class="testimonial-writter">
                                        <img src="./'.$row_testimonial['image'].'" alt="">
                                        <div class="writter-information">
                                            <h2 class="sub-headings">'.$row_testimonial['name'].'</h2>
                                            <div class="paragraph">'.$row_testimonial['about'].'</div>
                                        </div>
                                    </div>
                                    <div class="testimonial-quote">
                                        <p class="paragraph">
                                            <i class="fa-solid fa-quote-left quote"></i>
                                            '.$row_testimonial['testimonial'].'
                                            <i class="fa-solid fa-quote-right quote1"></i>
                                        </p>
                                    </div>
                                </div>
                            ';
                        }
                    }
                    ?>

                </div>
            </div>

            <div class="feedbacks" onclick="window.location.href='./templates/testimonial.php'">
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
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Lorem ipsum dolor sit ?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quasi magni mollitia illum sint harum deleniti atque tenetur sapiente, quam sunt, molestiae unde ratione nemo velit! Molestiae, repellendus totam.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Lorem ipsum dolor sit ?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quasi magni mollitia illum sint harum deleniti atque tenetur sapiente, quam sunt, molestiae unde ratione nemo velit! Molestiae, repellendus totam.w.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Lorem ipsum dolor sit ?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quasi magni mollitia illum sint harum deleniti atque tenetur sapiente, quam sunt, molestiae unde ratione nemo velit! Molestiae, repellendus totam..
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Lorem ipsum dolor sit ?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quasi magni mollitia illum sint harum deleniti atque tenetur sapiente, quam sunt, molestiae unde ratione nemo velit! Molestiae, repellendus totam..
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Lorem ipsum dolor sit ?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quasi magni mollitia illum sint harum deleniti atque tenetur sapiente, quam sunt, molestiae unde ratione nemo velit! Molestiae, repellendus totam..
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="footer-section">
        <div class="container-fluid grid">
            <div class="company-information">
                <div class="company-logo">
                    <img src="./src/logo.png" alt="">
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

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">${title}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                ${content}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Arrow Up -->
    <a class="arrow-container" href="#">
        <div class="arrow">
            <i class="fa-solid fa-angles-up"></i>
        </div>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <script src="./script.js"></script>
    <script src="./script/scroll.js"></script>
    <script src="./script/nav.js"></script>
    <script src="./script/number.js"></script>
    <script src="./script/modal.js"></script>

    <script src="./script/homepage/contact.js"></script>
    <script src="./script/homepage/product.js"></script>
    <script src="./script/homepage/client.js"></script>
    <script src="./script/homepage/update.js"></script>
    <script src="./script/homepage/blog.js"></script>
    <script src="./script/homepage/testimonials.js"></script>
</body>
</html>