<?php
include "api/connect.php";
if(!isset($_SESSION['admin_id'])){
    header('Location: ../');
}
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
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style/nav.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/copyright.css">
    <link rel="stylesheet" href="../style/arrow.css">

    <link rel="stylesheet" href="../style/home/home.css">
    <link rel="stylesheet" href="../style/home/client.css">
    <link rel="stylesheet" href="../style/home/about.css">
    <link rel="stylesheet" href="../style/home/field.css">
    <link rel="stylesheet" href="../style/home/why.css">
    <link rel="stylesheet" href="../style/home/update.css">
    <link rel="stylesheet" href="../style/home/team.css">
    <link rel="stylesheet" href="../style/home/blog.css">
    <link rel="stylesheet" href="../style/home/testimonials.css">
    <link rel="stylesheet" href="../style/home/faq.css">
    <!-- <link rel="stylesheet" href="../style/home/modal.css"> -->


    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- css for admin -->
    <link rel="stylesheet" href="style/style.css">

    <title>PT Sumber Phoenix Makmur | Chemicals Specialty</title>
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/nav.php' ?>

    <!-- Home Section Page -->
    <section class="home-section homeImageChange"
        style="background-image: url('../<?php echo getData('home_image',$conn) ?>')">
        <div class="container-fluid">
            <div class="home-wrapper">
                <h1 class="title" col="home_title"><?php echo getData('home_title',$conn) ?> <button type="button"
                        class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></h1>
                <p class="paragraph" col="home_desc"><?php echo getData('home_desc',$conn) ?> <button type="button"
                        class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
                <button class="custom-button btn product" type="button">Our Products</button>
            </div>
        </div>
        <button type="button" class="btn btn-danger editImage" style="position:absolute; left:5%;bottom:5%;"
            data-bs-toggle="modal" data-bs-target="#homeImage"><i class="fa-solid fa-pencil"></i></button>
    </section>
    <!-- Modal Edit Home Section Image -->
    <div class="modal fade" id="homeImage" tabindex="-1" aria-labelledby="homeImageLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="homeImageLabel">Change Home Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data" id="formHomeImage">
                    <div class="modal-body">
                        <img class="homeImageChange" src="../<?php echo getData('home_image',$conn)?>" alt=""
                            style="width:100%">
                        <input type='file' id="image" name="image" id="inputHomeImage" accept="image/*" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary saveImage">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Clients -->
    <section class="client-section">
        <div class="container-fluid">
            <div class="client-wrapper slider">
                <?php 
                    $stmt = $conn->prepare('SELECT * from clients');
                    $stmt->execute();
                    while($client = $stmt->fetch()):
                 ?>
                <div class="slide" slide-index="<?= $client['client_id'] ?>"><img src="../src/<?= $client['client_logo'] ?>" alt="<?= $client['client_name'] ?>"></div>
                <?php endwhile; ?>
            </div>
            <button type="button" class="btn btn-danger editClients" style="margin-left:calc(50% - 21.3px);" data-bs-toggle="modal" data-bs-target="#clientsModal">
                <i class="fa-solid fa-pencil"></i>
            </button>
        </div>
    </section>
    <!-- Modal Edit Clients -->
    <div class="modal fade" id="clientsModal" tabindex="-1" aria-labelledby="clientsModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Client List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body clients">
                    <?php
                        $stmt = $conn->prepare('SELECT * from clients');
                        $stmt->execute();
                        while($client = $stmt->fetch()):
                    ?>
                    <div class="row justify-content-center align-items-center  clientRow" row-index="<?= $client['client_id'] ?>" style="margin-left:30px">
                        <div class="col-8"><img class="imgClient" src="../src/<?= $client['client_logo'] ?>" style="width:80%" alt="<?= $client['client_name']?>"></div>
                        <div class="col-4"><button class="btn btn-danger delClient" del-target="<?= $client['client_id'] ?>"><i class="fa-solid fa-trash-can"></i></button></div>
                    </div>
                    <?php endwhile ?>
                    <h5 style="text-align:center">Add Client :</h5>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-10" style="background-color: #e4e4e4;padding: 10px 15px;border-radius: 5px;">
                            <form method="POST" id="formAddClients" enctype="multipart/form-data">
                                <label for="clientName">Client Name:</label>
                                <input type="text" name="clientName" id="clientName" required>
                                <label for="imageClient">Client Logo:</label>
                                <input type="file" name="imageClient" id="imageClient" accept="image/*" required />
                                <button type="submit" class="btn btn-primary addClient"><i class="fa-solid fa-plus"></i></button>
                            </form>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- About Us -->
    <section class="about-section diagonal" id="about">
        <div class="container-fluid diagonal-content grid">
            <div class="about-information">
                <div class="about-information-wrapper">
                    <h2 class="heading" col="who_title"><?= getData('who_title',$conn) ?> <button type="button"
                            class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></h2>
                    <p class="paragraph" col="who_desc"><?= getData('who_desc',$conn)?> <button type="button"
                            class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
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
                        <p class="paragraph" col="history"><?=getData('history',$conn)?> <button type="button"
                                class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
                    </div>
                    <div class="features 2">
                        <i class="fa-solid fa-clock"></i>
                        <h3 class="sub-heading">Experience</h3>
                        <p class="paragraph" col="experience"><?=getData('experience',$conn)?> <button type="button"
                                class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
                    </div>
                </div>
            </div>
            <div class="about-features 2">
                <div class="about-features-wrapper">
                    <div class="features 1">
                        <i class="fa-solid fa-lightbulb"></i>
                        <h3 class="sub-heading">Philosophy</h3>
                        <p class="paragraph" col="philosophy"><?=getData('philosophy',$conn)?> <button type="button"
                                class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
                    </div>
                    <div class="features 2">
                        <i class="fa-solid fa-bullseye"></i>
                        <h3 class="sub-heading">Purpose</h3>
                        <p class="paragraph" col="purpose"><?=getData('purpose',$conn)?> <button type="button"
                                class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Fields -->
    <section class="business-fields-section section-extra" id="fields">
        <div class="container-fluid">
            <div class="business-fields-information">
                <h1 class="heading underline" col="fields_title"><?=getData('fields_title',$conn)?><button type="button"
                        class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></h1>
                <p class="paragraph" col="fields_desc"><?=getData('fields_desc',$conn)?><button type="button"
                        class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
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
                        <div class="field opacity-overlay" style="background-image: url(../src/fields/rubber.jpg)" >
                            <div class="sub-heading">Rubber Industries</div>
                        </div>
                        <div class="field opacity-overlay" style="background-image: url(../src/fields/plastic.jpg)">
                            <div class="sub-heading">Plastic Industries</div>
                        </div>
                        <div class="field opacity-overlay" style="background-image: url(../src/fields/casting.jpg)">
                            <div class="sub-heading">Die Casting</div>
                        </div>
                        <div class="field opacity-overlay" style="background-image: url(../src/fields/ink.jpg)">
                            <div class="sub-heading">coating and ink industries</div>
                        </div>
                        <div class="field opacity-overlay" style="background-image: url(../src/fields/acrylic.jpg)">
                            <div class="sub-heading">acrylic sheet</div>
                        </div>
                        <div class="field opacity-overlay" style="background-image: url(../src/fields/industry.jpg)">
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
            <div class="text-center info">
                <h2 style="color: white;">Why<span style="color: #FFA600;"><strong>&nbsp;Us ?</strong></span></h2>
                <p class="d-inline-block" col="why_desc" style="width: 50%; color: white;">
                    <strong><?= getData('why_desc',$conn)?></strong><br> <button type="button"
                        class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
            </div>
            <div class="row">
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon">
                            <i class="fas fa-user-friends" style="margin-bottom: 15px;"></i>
                            <h4 class="title" col="why_us_title1"><?= getData('why_us_title1',$conn) ?> <button
                                    type="button" class="btn btn-danger edit"><i
                                        class="fa-solid fa-pencil"></i></button></h4>
                            <p class="description" col="why_us_desc1"><?= getData('why_us_desc1',$conn) ?><br> <button
                                    type="button" class="btn btn-danger edit"><i
                                        class="fa-solid fa-pencil"></i></button></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon">
                            <i class="fas fa-thumbs-up" style="margin-bottom: 15px;"></i>
                            <h4 class="title" col="why_us_title2"><?= getData('why_us_title2',$conn) ?> <button
                                    type="button" class="btn btn-danger edit"><i
                                        class="fa-solid fa-pencil"></i></button></h4>
                            <p class="description" col="why_us_desc2"><?= getData('why_us_desc2',$conn) ?><br> <button
                                    type="button" class="btn btn-danger edit"><i
                                        class="fa-solid fa-pencil"></i></button></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon">
                            <i class="fas fa-phone" style="margin-bottom: 15px;"></i>
                            <h4 class="title" col="why_us_title3"><?= getData('why_us_title3',$conn) ?> <button
                                    type="button" class="btn btn-danger edit"><i
                                        class="fa-solid fa-pencil"></i></button></h4>
                            <p class="description" col="why_us_desc3"><?= getData('why_us_desc3',$conn) ?><br> <button
                                    type="button" class="btn btn-danger edit"><i
                                        class="fa-solid fa-pencil"></i></button></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon">
                            <i class="fas fa-warehouse" style="margin-bottom: 15px;"></i>
                            <h4 class="title" col="why_us_title4"><?= getData('why_us_title4',$conn) ?> <button
                                    type="button" class="btn btn-danger edit"><i
                                        class="fa-solid fa-pencil"></i></button></h4>
                            <p class="description" col="why_us_desc4"><?= getData('why_us_desc4',$conn) ?><br> <button
                                    type="button" class="btn btn-danger edit"><i
                                        class="fa-solid fa-pencil"></i></button></p>
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

                <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#statsModal"><i class="fa-solid fa-pencil"></i></button>
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
            <!-- STATISTICS EDIT MODAL -->
            <div class="modal fade" id="statsModal" tabindex="-1" aria-labelledby="statsModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Stats List</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="formStatsEdit">
                                <h6>-- Stats 1 --</h6>
                                <label for="title1">Title : </label>
                                <input type="text" id="title1" name="title1" value="<?= getData('statistics_title1',$conn) ?>"> <br>
                                <label for="total1" >Total :</label>
                                <input type="text" id="total1" name="total1" value="<?= getData('statistics_total1',$conn) ?>"> <br>
                                <label for="desc1">Description :</label>
                                <textarea style="width:100%;min-height:100px" type="text" id="desc1" name="desc1"><?= getData('statistics_desc1',$conn) ?></textarea><br><br>

                                <h6>-- Stats 2 --</h6>
                                <label for="title2">Title : </label>
                                <input type="text" id="title2" name="title2" value="<?= getData('statistics_title2',$conn) ?>"> <br>
                                <label for="total2" >Total :</label>
                                <input type="text" id="total2" name="total2" value="<?= getData('statistics_total2',$conn) ?>"> <br>
                                <label for="desc2">Description :</label>
                                <textarea style="width:100%;min-height:100px" type="text" id="desc2" name="desc2"><?= getData('statistics_desc2',$conn) ?></textarea><br><br>

                                <h6>-- Stats 3 --</h6>
                                <label for="title3">Title : </label>
                                <input type="text" id="title3" name="title3" value="<?= getData('statistics_title3',$conn) ?>"> <br>
                                <label for="total3" >Total :</label>
                                <input type="text" id="total3" name="total3" value="<?= getData('statistics_total3',$conn) ?>"> <br>
                                <label for="desc3">Description :</label>
                                <textarea style="width:100%;min-height:100px" type="text" id="desc3" name="desc3"><?= getData('statistics_desc3',$conn) ?></textarea><br><br>

                                <h6>-- Stats 4 --</h6>
                                <label for="title4">Title : </label>
                                <input type="text" id="title4" name="title4" value="<?= getData('statistics_title4',$conn) ?>"> <br>
                                <label for="total4" >Total :</label>
                                <input type="text" id="total4" name="total4" value="<?= getData('statistics_total4',$conn) ?>"> <br>
                                <label for="desc4">Description :</label>
                                <textarea style="width:100%;min-height:100px" type="text" id="desc4" name="desc4"><?= getData('statistics_desc4',$conn) ?></textarea><br><br>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary editStats">Save changes</button>
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
                            <img src="../src/updates/warehouse.jpeg" alt="">
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
                            <img src="../src/updates/covid.jpeg" alt="">
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
                            <img src="../src/updates/holiday.jpeg" alt="">
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
                            <img src="../src/updates/mask.jpeg" alt="">
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

            <h1 class="heading underline" col="team_title"><?= getData('team_title',$conn)?> <button type="button"
                    class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></h1>
            <p class="paragraph description" col="team_sub_title"><?= getData('team_sub_title',$conn)?> <button
                    type="button" class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
            <!-- ADD EMPLOYEE BUTTON -->
            <div class="row justify-content-center align-items-center" style="margin-top:10px;">
                <button class="btn btn-primary" style="width:40px;height:40px" data-bs-toggle="modal" data-bs-target="#addEmpModal"><i class="fa-solid fa-plus"></i></button>
            </div>
            <div class="team-container grid">
                <?php
                    $stmt = $conn->prepare('SELECT * FROM employees');
                    $stmt->execute();
                    while($emp = $stmt->fetch()):
                ?>
                <div class="team-content">
                    <img src="../<?= $emp['emp_img'] ?>" alt="">
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
                            <div class="paragraph team-title"><?= $emp['emp_position'] ?> <!-- delete button faq --></div>
                            
                        </div>
                        <button class="btn btn-dark delEmp" style="width:40px;height:40px;margin-left:20%;" target="<?= $emp['emp_id'] ?>"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
                <?php endwhile ?>
                
            </div>
        </div>
    </section>
    <!-- ADD EMPLOYEE MODAL -->
    <div class="modal fade" id="addEmpModal" tabindex="-1" aria-labelledby="empModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="empModalLabel">Add Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="formAddEmp" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Employee Name :</label>
                        <input type="text" class="form-control" name="emp-name" required id="emp-name" aria-describedby="employee-name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Employee Photo :</label>
                        <input type="file" accept="image/*" class="form-control" name="emp-img" required id="emp-img" aria-describedby="employee-photo">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Employee Position : </label>
                        <input type="text" class="form-control" name="emp-position" required id="emp-position" aria-describedby="emp-position">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Employee Insta : </label>
                        <input type="text" class="form-control" name="emp-insta" required id="emp-insta" aria-describedby="emp-instagram">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Employee linkedin : </label>
                        <input type="text" class="form-control" name="emp-linkedin" required id="emp-linkedin" aria-describedby="emp-linkedin">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Employee facebook : </label>
                        <input type="text" class="form-control" name="emp-facebook" required id="emp-facebook" aria-describedby="emp-facebook">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Employee twitter : </label>
                        <input type="text" class="form-control" name="emp-twitter" required id="emp-twitter" aria-describedby="emp-twitter">
                    </div>
                    <button type="submit" class="btn btn-primary">Add <i class="fa-solid fa-plus"></i></button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Section -->
    <section class="blog-section section-extra">
        <div class="slide-container swiper container-fluid">
            <div class="slide-content">
                <div class="custom-card-wrapper swiper-wrapper">

                    <!-- Slide -->
                    <div class="custom-card swiper-slide">
                        <div class="blog-image-content">
                            <img src="../src/blog/1.jpg" alt="">
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
                            <img src="../src/blog/2.jpg" alt="">
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
                            <img src="../src/blog/3.jpg" alt="">
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
                            <img src="../src/blog/4.jpg" alt="">
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
                            <img src="../src/blog/5.jpg" alt="">
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
                            <img src="../src/blog/6.jpg" alt="">
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

            <div class="intro heading underline" col="testi_title"><?=getData('testi_title',$conn)?> <button
                    type="button" class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></div>
            <p class="intro paragraph" col="testi_sub_title"><?=getData('testi_sub_title',$conn)?> <button type="button"
                    class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
            <div class="slide-content-1">

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
                        <!-- delete button faq -->
                        <button class="btn btn-dark delFaq" style="width:40px;height:40px" target="<?= $faq['faq_id'] ?>"><i class="fa-solid fa-trash-can"></i></button>
                        <!-- edit faq button  -->
                        <button class="btn btn-danger editFaqButton"data-bs-toggle="modal" data-bs-target="#editFaqModal" style="width:40px;height:40px"  target="<?= $faq['faq_id'] ?>"><i class="fa-solid fa-pencil"></i></button>
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
            <!-- ADD FAQ -->
            <div class="row justify-content-center align-items-center" style="margin-top:10px;">
                <button class="btn btn-primary" style="width:40px;height:40px" data-bs-toggle="modal" data-bs-target="#addFaqModal"><i class="fa-solid fa-plus"></i></button>
            </div>
        </div>
    </section>
    <!-- ADD FAQ MODAL -->
    <div class="modal fade" id="addFaqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="faqModalLabel">Add Faq</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="formAddFaq">
                    <div class="mb-3">
                        <label for="faqTitle" class="form-label">Title :</label>
                        <input type="text" class="form-control" name="faq_title" required id="faqTitle" aria-describedby="faqTitle">
                    </div>
                    <div class="mb-3">
                        <label for="faq_desc" class="form-label">Content : </label>
                        <textarea type="text" name="faq_desc" class="form-control" id="faq_desc" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add <i class="fa-solid fa-plus"></i></button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL EDIT FAQ -->
    <div class="modal fade" id="editFaqModal" tabindex="-1" aria-labelledby="editFaqLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editFaqLabel">Edit Faq</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="formEditFaq">
                    <div class="mb-3">
                        <label for="faqTitle" class="form-label">Title :</label>
                        <input type="text" class="form-control" name="faq_title" required id="faqTitle" aria-describedby="faqTitle">
                    </div>
                    <div class="mb-3">
                        <label for="faq_desc" class="form-label">Content : </label>
                        <textarea type="text" name="faq_desc" class="form-control" id="faq_desc" required></textarea>
                    </div> 
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary saveEditFaq">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL COMPANY LOGO -->
    <div class="modal fade" id="logo" tabindex="-1" aria-labelledby="logoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color:black" id="logoLabel">Edit Company Logo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data" id="formlogo">
                    <div class="modal-body">
                        <img class="logoChange" src="../src/<?= getData('logo',$conn) ?>" alt=""
                            style="width:100%">
                        <input type='file' id="image" name="image" id="inputlogo" accept="image/*" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary saveImage">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="footer-section">
        <div class="container-fluid grid">
            <div class="company-information">
                <div class="company-logo">
                    <img src="../src/<?= getData('logo',$conn) ?>" id="company-logo" alt="">
                    <button class="btn btn-danger updateLogo" data-bs-toggle="modal" data-bs-target="#logo"><i class="fa-solid fa-pencil"></i></button>
                </div>

                

                <div class="company-address">
                    <p class="paragraph" col="address"><?= getData('address',$conn)?> <button type="button"
                            class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
                </div>
                <div class="company-phone">
                    <p class="paragraph" col="phone"><strong>Phone: </strong><?= getData('phone',$conn) ?> <button
                            type="button" class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
                </div>
                <div class="company-email">
                    <p class="paragraph" col="email"><strong>Email: </strong><?= getData('email',$conn) ?> <button
                            type="button" class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
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
                <p class="paragraph" col="newsletter_desc"><?= getData('newsletter_desc',$conn)?> <button type="button"
                        class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button></p>
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

    <!-- Arrow Up -->
    <a class="arrow-container" href="#">
        <div class="arrow">
            <i class="fa-solid fa-angles-up"></i>
        </div>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <!-- <script src="../script/scroll.js"></script> -->
    <script src="../script/nav.js"></script>
    <script src="../script/number.js"></script>
    <script src="../script/modal.js"></script>

    <script src="../script/homepage/contact.js"></script>
    <script src="../script/homepage/product.js"></script>
    <script src="../script/homepage/client.js"></script>
    <script src="../script/homepage/update.js"></script>
    <script src="../script/homepage/blog.js"></script>
    <script src="../script/homepage/testimonials.js"></script>
    <!-- ajax -->
    <script src="script/ajax.js"></script>
    <!-- modal Description Stats JS -->
    <script src="../script/homepage/descStats.js"></script>
</body>

</html>