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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Stylesheet -->
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
    <link rel="stylesheet" href="style/button_style.css">
    <link rel="stylesheet" href="style/modal.css">

    <!-- Data Table -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- stylesheet -->
    <link rel="stylesheet" href="../style.css">

    <title>PT Sumber Phoenix Makmur | Chemicals Specialty</title>
</head>
<style>
    .testi_table_tr{
        max-height:200px;
        overflow-Y:auto;
        max-width:300px;
        word-wrap: break-word;
    }
</style>
<body>

    <!-- Navbar -->
    <?php include 'includes/nav.php' ?>

    <!-- Home Section Page -->
    <section class="home-section homeImageChange"
        style="background-image: url('../<?php echo getData('home_image',$conn) ?>')">
        <div class="container-fluid">
            <div class="home-wrapper">

                <h1 class="title" col="home_title">
                    <?php echo getData('home_title',$conn) ?> 
                    <button type="button" class="btn btn-danger edit">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                </h1>

                <p class="paragraph" col="home_desc"><?php echo getData('home_desc',$conn) ?> 
                    <button type="button" class="btn btn-danger edit">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                </p>

                <button class="custom-button btn product" type="button">Our Products</button>
            </div>
        </div>
        <button type="button" class="btn btn-danger editImage" style="position:absolute; left:5%; bottom:5%;" data-bs-toggle="modal" data-bs-target="#homeImage">
            <i class="fa-solid fa-pencil"></i>
        </button>
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
                        <img class="homeImageChange" src="../<?php echo getData('home_image',$conn)?>" style="width:100%">
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
        <div class="container-fluid" style="position: relative;">
            <div class="client-wrapper slider">

                <?php 
                    $stmt = $conn->prepare('SELECT * from clients');
                    $stmt->execute();
                    while($client = $stmt->fetch()):
                ?>
                <div class="slide" slide-index="<?= $client['client_id'] ?>">
                    <img src="../src/<?= $client['client_logo'] ?>" alt="<?= $client['client_name'] ?>">
                </div>
                <?php endwhile; ?>

            </div>
            <button type="button" class="btn btn-danger editClients" style="position: absolute; right: 130px; top: 27px;" data-bs-toggle="modal" data-bs-target="#clientsModal">
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
                        <div class="col-8">
                            <img class="imgClient" src="../src/<?= $client['client_logo'] ?>" style="width:80%" alt="<?= $client['client_name']?>">
                        </div>

                        <div class="col-4">
                            <button class="btn btn-danger delClient" del-target="<?= $client['client_id'] ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                    <?php endwhile ?>
                </div>
                <div class="modal-footer">
                    <div class="row justify-content-center align-items-center" style="margin-right: 10px;">
                        <button class="btn btn-danger addFaq" data-bs-toggle="modal" data-bs-target="#addClientsModal" style="margin-top: 0;">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Clients -->
    <div class="modal fade" id="addClientsModal" tabindex="-1" aria-labelledby="addClientsModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Clients</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="formAddClients" enctype="multipart/form-data">
                    <div class="modal-body clients">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-10">
                                <label for="clientName">Client Name:</label> <br>
                                <input type="text" name="clientName" id="clientName" style="width: 100%; margin-top: 5px;" required> <br><br>
                                <label for="imageClient">Client Logo:</label> <br>
                                <input type="file" name="imageClient" id="imageClient" accept="image/*" style="margin-top: 5px;" required />
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary addClient" style="margin-right: 10px;"><i class="fa-solid fa-plus"></i></button>
                        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>

    <!-- Business Fields -->
    <section class="business-fields-section section-extra" id="fields">
        <div class="container-fluid">
            <div class="business-fields-information">
                <h1 class="heading underline" col="fields_title"><?=getData('fields_title',$conn)?>
                    <button type="button"class="btn btn-danger edit">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                </h1>
                <p class="paragraph" col="fields_desc"><?=getData('fields_desc',$conn)?>
                    <button type="button" class="btn btn-danger edit">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                </p>
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
                    <div class="field-items" style="background-image: url('../<?= $row['cat_img'] ?>');">
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
        <div class="container-fluid diagonal-content grid">
            <div class="about-information">
                <div class="about-information-wrapper">
                    <h2 class="heading" col="who_title"><?= getData('who_title',$conn) ?> 
                        <button type="button" class="btn btn-danger edit">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                    </h2>
                    <p class="paragraph" col="who_desc"><?= getData('who_desc',$conn)?> 
                        <button type="button" class="btn btn-danger edit">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
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
                    <div class="features first 1" style="position: relative;">
                        <i class="fa-solid fa-book"></i>
                        <h3 class="sub-heading">History</h3>
                        <p class="paragraph" col="history"><?=getData('history',$conn)?> 
                            <button type="button" class="btn btn-danger edit">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                        </p>
                    </div>
                    <div class="features second 2" style="position: relative;">
                        <i class="fa-solid fa-clock"></i>
                        <h3 class="sub-heading">Experience</h3>
                        <p class="paragraph" col="experience"><?=getData('experience',$conn)?> 
                            <button type="button" class="btn btn-danger edit">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                        </p>
                    </div>
                </div>
            </div>
            <div class="about-features 2">
                <div class="about-features-wrapper">
                    <div class="features third 1" style="position: relative;">
                        <i class="fa-solid fa-lightbulb"></i>
                        <h3 class="sub-heading">Philosophy</h3>
                        <p class="paragraph" col="philosophy"><?=getData('philosophy',$conn)?> 
                            <button type="button" class="btn btn-danger edit">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                        </p>
                    </div>
                    <div class="features fourth 2" style="position: relative;">
                        <i class="fa-solid fa-bullseye"></i>
                        <h3 class="sub-heading">Purpose</h3>
                        <p class="paragraph" col="purpose"><?=getData('purpose',$conn)?> 
                            <button type="button" class="btn btn-danger edit">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us -->
    <section class="why-us-section diagonal" id="why">
        <div class="container-fluid diagonal-content">
            <div class="text-center info">
                <h2 class="" col="why_desc" style="width: 100%; color: white; justify-content: center; align-items: center; text-transform: uppercase">
                    <strong><?= getData('why_desc',$conn)?></strong><br> 
                    <button type="button" class="btn btn-danger edit">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                </h2>
            </div>
            <div class="row">
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon">
                            <i class="fas fa-user-friends" style="margin-bottom: 15px;"></i>
                            <h4 class="title" col="why_us_title1"><?= getData('why_us_title1',$conn) ?> 
                                <button type="button" class="btn btn-danger edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </h4>
                            <p class="description" col="why_us_desc1"><?= getData('why_us_desc1',$conn) ?><br> 
                                <button type="button" class="btn btn-danger edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon">
                            <i class="fas fa-thumbs-up" style="margin-bottom: 15px;"></i>
                            <h4 class="title" col="why_us_title2"><?= getData('why_us_title2',$conn) ?> 
                                <button type="button" class="btn btn-danger edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </h4>
                            <p class="description" col="why_us_desc2"><?= getData('why_us_desc2',$conn) ?><br> 
                                <button type="button" class="btn btn-danger edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon">
                            <i class="fas fa-phone" style="margin-bottom: 15px;"></i>
                            <h4 class="title" col="why_us_title3"><?= getData('why_us_title3',$conn) ?> 
                                <button type="button" class="btn btn-danger edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </h4>
                            <p class="description" col="why_us_desc3"><?= getData('why_us_desc3',$conn) ?><br> 
                                <button type="button" class="btn btn-danger edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon">
                            <i class="fas fa-warehouse" style="margin-bottom: 15px;"></i>
                            <h4 class="title" col="why_us_title4"><?= getData('why_us_title4',$conn) ?> 
                                <button type="button" class="btn btn-danger edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </h4>
                            <p class="description" col="why_us_desc4"><?= getData('why_us_desc4',$conn) ?><br> 
                                <button type="button" class="btn btn-danger edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </p>
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
                        <div class="statistic-data-number" data-target="<?= getData('statistics_total1',$conn) ?>">0</div>
                        <p class="statistic-data-category paragraph"><?= getData('statistics_title1',$conn) ?></p>
                        <p class="statistic-data-content paragraph" hidden><?= getData('statistics_desc1',$conn) ?></p>
                    </div>
                </div>

                <div class="statistic-data 2" data-bs-toggle="modal" data-bs-target="#modal">
                    <div class="statistic-data-wrapper">
                        <div class="icon-container">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </div>
                        <div class="statistic-data-number" data-target="<?= getData('statistics_total2',$conn) ?>">0</div>
                        <p class="statistic-data-category paragraph"><?= getData('statistics_title2',$conn) ?></p>
                        <p class="statistic-data-content paragraph" hidden><?= getData('statistics_desc2',$conn) ?></p>
                    </div>
                </div>

                <div class="statistic-data 3" data-bs-toggle="modal" data-bs-target="#modal">
                    <div class="statistic-data-wrapper">
                        <div class="icon-container">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div class="statistic-data-number" data-target="<?= getData('statistics_total3',$conn) ?>">0</div>
                        <p class="statistic-data-category paragraph"><?= getData('statistics_title3',$conn) ?></p>
                        <p class="statistic-data-content paragraph" hidden><?= getData('statistics_desc3',$conn) ?></p>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-danger stats" data-bs-toggle="modal" data-bs-target="#statsModal">
                <i class="fa-solid fa-pencil"></i>
            </button>

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
                                <!-- Stats 1 -->
                                <h3 style="font-weight: bold">Stats 1</h3>
                                <div class="mb-2">
                                    <label for="title1" class="form-label">Title</label>
                                    <input aria-describedby="employee-title" class="form-control" type="text" id="title1" name="title1" value="<?= getData('statistics_title1',$conn) ?>">
                                </div>

                                <div class="mb-2">
                                    <label for="total1" class="form-label">Total</label>
                                    <input aria-describedby="employee-total" class="form-control" type="text" id="total1" name="total1" value="<?= getData('statistics_total1',$conn) ?>">
                                </div>

                                <div class="mb-5">
                                    <label for="desc1" class="form-label">Description</label>
                                    <textarea aria-describedby="employee-total" class="form-control" type="text" id="desc1" name="desc1"><?= getData('statistics_desc1',$conn) ?></textarea>
                                </div>

                                <!-- Stats 2 -->
                                <h3 style="font-weight: bold">Stats 2</h3>
                                <div class="mb-2">
                                    <label for="title2" class="form-label">Title</label>
                                    <input aria-describedby="employee-title" class="form-control" type="text" id="title2" name="title2" value="<?= getData('statistics_title2',$conn) ?>">
                                </div>

                                <div class="mb-2">
                                    <label for="total2" class="form-label">Total</label>
                                    <input aria-describedby="employee-total" class="form-control" type="text" id="total2" name="total2" value="<?= getData('statistics_total2',$conn) ?>">
                                </div>

                                <div class="mb-5">
                                    <label for="desc2" class="form-label">Description</label>
                                    <textarea aria-describedby="employee-total" class="form-control" type="text" id="desc2" name="desc2"><?= getData('statistics_desc2',$conn) ?></textarea>
                                </div>

                                <!-- Stats 3 -->
                                <h3 style="font-weight: bold">Stats 3</h3>
                                <div class="mb-3">
                                    <label for="title3" class="form-label">Title</label>
                                    <input aria-describedby="employee-title" class="form-control" type="text" id="title3" name="title3" value="<?= getData('statistics_title3',$conn) ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="total3" class="form-label">Total</label>
                                    <input aria-describedby="employee-total" class="form-control" type="text" id="total3" name="total3" value="<?= getData('statistics_total3',$conn) ?>">
                                </div>

                                <div class="mb-5">
                                    <label for="desc3" class="form-label">Description</label>
                                    <textarea aria-describedby="employee-total" class="form-control" type="text" id="desc3" name="desc3"><?= getData('statistics_desc3',$conn) ?></textarea>
                                </div>
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
                        <i class="fa-solid fa-briefcase-medical"></i>
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
                    <div class="content-panel <?php if($j == 1){echo 'active';} ?>" onclick="window.location.href='../single/update.php?id=<?= $row['upd_id'] ?>'">
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
                            <img src="../<?= $row['upd_pict'] ?>" alt="">
                        </div>
                    </div>
                    <?php endwhile; ?>
                <div class="read-more" onClick="window.location.href='./update.php'">
                    See All Our Updates
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section diagonal" id="team">
        <div class="container-fluid diagonal-content">

            <h1 class="heading underline" col="team_title">
                <?= getData('team_title',$conn)?> 
                <button type="button" class="btn btn-danger edit">
                    <i class="fa-solid fa-pencil"></i>
                </button>
            </h1>
            <p class="paragraph description" col="team_sub_title">
                <?= getData('team_sub_title',$conn)?> 
                <button type="button" class="btn btn-danger edit">
                    <i class="fa-solid fa-pencil"></i>
                </button>
            </p>

            <!-- ADD EMPLOYEE BUTTON -->
            <div class="row justify-content-center align-items-center" style="margin-top:10px;">
                <button class="btn btn-danger team" data-bs-toggle="modal" data-bs-target="#addEmpModal">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>

            <div class="team-container grid">
                <?php
                    $stmt = $conn->prepare('SELECT * FROM employees');
                    $stmt->execute();
                    while($emp = $stmt->fetch()):
                ?>
                <div class="team-content">
                    <img src="../<?= $emp['emp_img'] ?>" alt="">
                    <!-- <div class="team-content-social-media">
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
                    </div> -->
                    <div class="team-content-information">
                        <div class="team-content-wrapper">
                            <div class="sub-headings team-name"><?= $emp['emp_name'] ?></div>
                            <div class="paragraph team-title"><?= $emp['emp_position'] ?> <!-- delete button faq --></div> 
                        </div>
                        <button class="btn btn-dark delEmp" target="<?= $emp['emp_id'] ?>">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
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
                    <!-- <div class="mb-3">
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
                    </div> -->
                    <button type="submit" class="btn btn-primary">Add <i class="fa-solid fa-plus"></i></button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Section -->
    <section class="testimonial-section section-extra">
        <div class="slide-container swiper container-fluid">

            <div class="intro heading underline" col="testi_title"><?=getData('testi_title',$conn)?> 
                <button type="button" class="btn btn-danger edit">
                    <i class="fa-solid fa-pencil"></i>
                </button>
            </div>
            <p class="intro paragraph" col="testi_sub_title"><?=getData('testi_sub_title',$conn)?> 
                <button type="button" class="btn btn-danger edit">
                    <i class="fa-solid fa-pencil"></i>
                </button>
            </p>
            
            <!-- form crud testimonies -->
            <div class="container">
            <table id="testi_table" class="table text-center table-striped bg-white m-0 p-0 table-hover" style="width:100% !important;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>About</th>
                        <th>Testimony</th>
                        <th>Profile Picture</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
           
            
        </div>
    </section>

    <!-- TESTIMONIES PROFILE PICTURE MODAL -->
    <div class="modal fade" id="profilePictureModal" tabindex="-1" aria-labelledby="profilePictureModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="profilePictureModalLabel">Profile Picture</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" width="100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL TESTIMONIES EDIT -->
    <div class="modal fade" id="testiEditModal" tabindex="-1" aria-labelledby="testiEditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="testiEditModalLabel">Testimony Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditTestimony" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Fullname</label>
                            <input name="name" id="fullname" type="text" placeholder="Full Name" class="input-fields form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="about" class="form-label">About</label>
                            <input name="about" type="text" id="about" placeholder="Brief Introduction About Yourself" class="input-fields form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="testi" class="form-label">Testimonial</label>
                            <textarea class="form-control" name="testimonial" placeholder="Testimonial" id="testi" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="pp" class="form-label">Profile Picture change</label>
                            <input class="form-control" name="image" type="file" id="pp" class="file-input" accept="images/*" placeholder="hi" required>
                        </div>
                            
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary editTesti" data-bs-dismiss="modal" target="">Save changes</button>
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

    <!-- Footer section -->
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
                <a class="footer-item" href="product.php">
                    <i class="fa-solid fa-angle-right"></i>
                    Products
                </a>
                <a class="footer-item" href="contact.php">
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
                <a class="footer-item">
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

    <!-- <footer class="copyright-footer">
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
    </footer> -->
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

    <!-- <script src="../script/homepage/contact.js"></script> -->
    <script src="../script/homepage/product.js"></script>
    <script src="../script/homepage/client.js"></script>
    <script src="../script/homepage/update.js"></script>
    <script src="../script/homepage/blog.js"></script>
    <script src="../script/homepage/testimonials.js"></script>
    <!-- ajax -->
    <script src="script/ajax.js"></script>
    
    <!-- modal Description Stats JS -->
    <script src="../script/homepage/descStats.js"></script>

    <script>
        $(document).ready(function(){
            var testi_table = $('#testi_table').DataTable({
                'ajax': {
                    'url': `api/testimony/dataTesti.php`,
                    type: 'POST'
                },
                'columns': [
                    {
                        'data':'count'
                    },
                    {
                        'data': 'fullname'
                    },
                    {
                        'data': 'about'
                    },
                    {
                        'data': 'testimony'
                    },
                    {
                        'data': 'pp'
                    },{
                        'data':'action'
                    }
                ],
                columnDefs: [{
                    target: 5,
                    visible: false,
                }, ],
                "initComplete": function( settings, json ) {
                    testiPPImage()
                    delTestiAction(testi_table)
                }
            })
                // view profile picture
            
            
            setInterval(function () {
                testi_table.ajax.reload(function(){
                    testiPPImage()
                    delTestiAction(testi_table)
                });
            }, 40000);
        })
        function testiPPImage(){
                $(".viewPPTesti").click(function(){
                    var img = $(this).attr('for')
                    $('#profilePictureModal .modal-body img').attr('src','../'+img)
                    console.log('hai')
                })
            }
    
    </script>
    <!-- modal edit changes instagram line dll -->
    <div class="modal fade" id="kontakModal" tabindex="-1" aria-labelledby="kontakModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="kontakModalLabel">Kontak</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editKontakForm">
                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram : </label>
                        <input type="text" class="form-control" id="instagram" name="instagram" value="<?= getData('instagram',$conn) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="linkedin" class="form-label">LinkedIn : </label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?= getData('linkedin',$conn) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook : </label>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="<?= getData('facebook',$conn) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter : </label>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="<?= getData('twitter',$conn) ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveChangeKontak()">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <!-- script untuk modal instagram linkedin dkk -->
    <script>
        buttonKontak = `
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" id="editKontak" data-bs-target="#kontakModal">
            <i class="fa-solid fa-pencil"></i>
        </button>
        `
        $('.copyright-social-media').append(buttonKontak);
        function saveChangeKontak(){
            $.ajax({
                type: "POST",
                url: "api/home/editKontak.php",
                data: $('#editKontakForm').serialize(),
                success: function (response) {
                    if(response == 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Contact updated'
                        }).then(function() {
                            location.reload();
                        });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong.'
                        }).then(function() {
                            location.reload();
                        });
                    }
                }
            });
        }
    </script>
    <?php 
        if(isset($_GET['stat'])){
            if($_GET['stat'] == 'noaccess'){
                echo '<script>alert("Sorry, you have no access to this page.")</script>';
            }
        } 
    ?>
    <?php 
        if(isset($_SESSION['cat'])){
            unset($_SESSION['cat']);
        } 
    ?>
</body>

</html>