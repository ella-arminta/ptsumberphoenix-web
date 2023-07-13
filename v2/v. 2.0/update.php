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
                <?php
                    $stmt = $conn->prepare("SELECT * FROM updates where status = 'published' order by timestamp desc");
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                    $upd = $stmt->fetch();
                ?>
                <div class="highlight paragraph opacity-overlay update-item" style="background-image: url(<?= $upd['upd_pict'] ?>);" onclick="window.location.href='single/update.php?id=<?= $upd['upd_id'] ?>'">
                    <div class="highlight-information">
                        <div class="highlight-tag">Newest! </div>
                        <div class="highlight-title heading"><?= $upd['upd_title'] ?></div>
                        <p class="paragraph"><?php 
                        $timeStamp = $upd['timestamp'];
                        $timeStamp = date( "M d, Y", strtotime($timeStamp));
                        echo $timeStamp; ?></p>
                    </div>
                </div>
                <?php
                    }
                ?>
                <div class="latest-updates">
                    <div class="sub-heading">Latest Updates</div>
                    <?php
                        $count = 0;
                        $stmt = $conn->prepare("SELECT * FROM updates where status = 'published' order by timestamp desc");
                        $stmt->execute();
                        if($stmt->rowCount() > 0){
                            while($count < 4):
                                $row = $stmt->fetch();
                                if($count > 0):
                    ?>
                    <div class="latest-update update-item" onclick="window.location.href='single/update.php?id=<?= $row['upd_id'] ?>'">
                        <div class="update-information">
                            <div class="update-title"><?= $row['upd_title'] ?></div>
                            <p class="paragraph">
                                <?php 
                                    $timeStamp = $row['timestamp'];
                                    $timeStamp = date( "M d, Y", strtotime($timeStamp));
                                    echo $timeStamp; 
                                ?>
                            </p>
                        </div>
                        <img src="<?= $row['upd_pict'] ?>" alt="">
                    </div>
                    <?php
                        endif;
                        if($count <= 3 && $count > 0){
                            if($count == 3) {
                                echo '<hr style="margin-bottom: 0">';
                            } else {
                                echo '<hr>';
                            }
                        }
                    ?>
                    <?php $count++; endwhile;} ?>
                </div>
            </div>

            <div class="updates-list">
                <div class="heading underline">Our Updates</div>
                <div class="updates-items row">

                    <!-- Update items here -->
                    <!-- <div class="col-sm-3 update-item">
                        <div class="card opacity-overlay" style="background-image: url(src/updates/covid.jpeg)">
                            <div class="card-information">
                                <div class="sub-heading">Lorem ipsum dolor sit amet consectetur</div>
                                <p class="paragraph">John Maxwell | Jan 1, 2022</p>
                            </div>
                        </div>
                    </div>
                    -->

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'bottombar.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="script/nav.js"></script>
    <!-- <script src="script/contact/contact.js"></script> -->
    <script>
        // window.location.href = '../../PT-SUMBER-PHOENIX-MAKMUR/templates/single/update.html'
        var four = [];
        var posts = [];
        $(document).ready(function(){
            $.ajax({
                type: "GET",
                url: "api/update/getFour.php",
                success: function (response) {
                    response = JSON.parse(response)
                    for (let index = 0; index < response.length; index++) {
                        four.push(response[index])
                    }
                    getPosts(posts,four)
                }
            });
            
        })
        
        function getPosts(posts1,four1){
            var num = 4; //4 post per load
            $.ajax({
                type: "POST",
                url: "api/update/getPosts.php",
                data: {
                    jum : num,
                    posts : JSON.stringify(posts1),
                    four : JSON.stringify(four1),
                },
                success: function (response) {
                    response = JSON.parse(response);
                    posts = response;
                    var strposts = '';
                    for (let index = 0; index < posts.length; index++) {
                        // <div class="updates-items row">
                        post = response[index]
                        date = new Date(post['timestamp'])
                        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                          "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
                        ];
                        date =  monthNames[date.getMonth()]+' '+date.getDate()+', '+date.getFullYear();
                        strposts+= `
                        <div class="col-sm-3 update-item" onclick="window.location.href = 'single/update.php?id=`+post['upd_id']+`'">
                            <div class="card opacity-overlay" style="background-image: url(`+post['upd_pict']+`)">
                                <div class="card-information">
                                    <div class="sub-heading">`+post['upd_title']+`</div>
                                    <p class="paragraph">`+date+`</p>
                                </div>
                            </div>
                        </div>
                        `
                    }
                    console.log(strposts)
                    $('.updates-items.row').html(strposts)
                }
            });
               
        }
        window.addEventListener('scroll',function(){
            topNow = window.scrollY + window.innerHeight-50;
            divTop = document.querySelector('.footer-section').offsetTop;
            if(topNow >= divTop){
                getPosts(posts,four)
            }
            console.log(divTop)
            console.log(topNow)
        })
    </script>
</body>
</html>
