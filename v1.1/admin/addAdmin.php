<?php
include 'api/connect.php';
if(!isset($_SESSION['admin_id'])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <!-- Library Style : Bootstrap -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
     <!-- Library -->
     <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <!-- Navbar -->
    <?php include 'includes/nav.php' ?>
    
    <div class="container" style="margin-top:56px">
        <form id="formAdd">
            <label for="name">Fullname : </label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email : </label>
            <input type="email" name="email" id="email" required>
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Add Admin</button>
        </form>
    </div>
    <script src="script/jquery-3.6.1.min.js"></script>
    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#formAdd').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "api/addAdmin.php",
                    data: $('#formAdd').serialize(),
                    success: function (response) {
                        if(response == 'success'){
                            Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Account Created',
                            function(){ 
                                location.reload();
                            }
                            })
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: response,
                            })
                        }
                        
                    }
                });
            })
            
        })
        
    </script>
</body>
</html>