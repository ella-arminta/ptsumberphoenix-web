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
    <link rel="stylesheet" href="style/file_inputs.css">

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <!-- Sweet Alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>PT Sumber Phoenix Makmur | Testimonial</title>
</head>
<body>


    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="paragraph"><a href="index.php">Home </a><span>/</span> <strong class="contact">Testimonial</strong></div>
            <div class="sub-heading">Testimonial</div>
        </div>
    </nav>

    <!-- Contact Section -->
    <section class="contact-section section-extra">
        <div class="container-fluid">
            <h1 class="heading underline">TESTIMONIAL</h1>
            <p class="paragraph description"><?= getData('testi_sub_title',$conn) ?></p>
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
                                <div class="paragraph"><?= getData("email",$conn) ?></div>
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
                                <div class="paragraph"><?= getData("phone",$conn) ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FORM TESTIMONIAL -->
                <div class="input-fields-container contact-container">
                    <form method="POST" enctype="multipart/form-data" id="formTestimonial">
                        <div class="user-info grid">
                            <input name="name" type="text" placeholder="Full Name" class="input-fields" required>
                            <input name="about" type="text" placeholder="Brief Introduction About Yourself" class="input-fields" required>
                        </div>
                        <div class="file-drop-area">
                            <span class="fake-btn">Choose Files</span>
                            <span class="file-msg">or drag and drop your Profile Picture here</span>
                            <input name="image" type="file" class="file-input" accept="images/*" placeholder="hi" required>
                        </div>
                        <textarea name="testimonial" id="testimonial" placeholder="Testimonial (Max 150 words)" onkeyup="cekPanjangKata()" required></textarea>
                        <p class="text-danger" id="warningLong" style="display:none;">Message is not allowed longer than 150 words</p>
                        <div class="button-container">
                            <input name="submit" type="submit" class="custom-button btn navbar-btn submit" value="Send Feedbacks">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'bottombar.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="admin/script/jquery-3.6.1.min.js"></script>
    <script src="script/nav.js"></script>
    <script src="script/file_input.js"></script>
    <script src="script/contact/contact.js"></script>
    <script>
         $('#formTestimonial').submit(function(e){
            e.preventDefault()
            $.ajax({
                type: "POST",
                url: "api/submitTestimonies.php",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function (response) {
                    if(response == 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Testimonial sent!'
                        }).then(function() {
                            location.reload();
                        });
                    }else if(response =='Sorry, only JPG, JPEG, PNG & GIF files are allowed.'){
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: "Sorry, only JPG, JPEG, PNG & GIF files are allowed."
                        })
                    }
                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: "Something went wrong please try again"
                        })
                    }
                }
            });
            
           
        })
        function cekPanjangKata(){
            var str = $('textarea#testimonial').val()
            var len = str.split(' ').length;
            if(len > 150){
                $('#warningLong').css('display','block')
                $('.submit').prop('disabled', true);
            }else{
                $('#warningLong').css('display','none')
                $('.submit').prop('disabled', false);
            }
        }
    </script>
</body>
</html>
