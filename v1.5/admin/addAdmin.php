<?php
include 'api/connect.php';
if(!isset($_SESSION['admin_id'])){
    header('Location: login.php');
}
$stmt=$conn->prepare("SELECT * FROM admin where adm_id=? and master = 1");
$stmt->execute([$_SESSION['admin_id']]);
if($stmt->rowCount() <= 0){
    header('Location: home.php?stat=noaccess');
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
     <!-- Data Table -->
     <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

</head>
<body>
    <!-- Navbar -->
    <?php include 'includes/nav.php' ?>
    
    <div class="container" style="margin-top:96px">
        <h1>Add Admin</h1>
        <form id="formAdd">
            <label for="name">Fullname : </label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email : </label>
            <input type="email" name="email" id="email" required>
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Add Admin</button>
        </form>
        <br>
        <br>
        <h1>List Admin</h1>
        <table id="tableLog" class="table display">
            <thead>
                <tr>
                    <th>Admin Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Join Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stmt=$conn->prepare("SELECT * FROM admin");
                    $stmt->execute();
                    while($row = $stmt->fetch()):
                ?>
                 <tr>
                    <td><?= $row['adm_name']?></td>
                    <td><?= $row['adm_email'] ?></td>
                    <td><?php
                        if ($row['master'] == 0){
                            echo 'Regular';
                        }else{
                            echo 'Master';
                        }
                    ?></td>
                    <td><?php
                     $s = $row['adm_join_date'];
                     $dt = new DateTime($s);
                     $date = $dt->format('m/d/Y');
                     echo $date;
                     ?></td>
                    <td><button class="btn btn-danger" onclick="delAdm(<?= $row['adm_id'] ?>)">Delete</button></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Admin Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Join Date</th>
                </tr>
            </tfoot>
        </table>
    </div>
    
    <!-- <script src="script/jquery-3.6.1.min.js"></script> -->
    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#formAdd').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "api/home/addAdmin.php",
                    data: $('#formAdd').serialize(),
                    success: function (response) {
                        if(response == 'success'){
                            Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Account Created',
                            }).then(function() {
                                    location.reload();
                                });
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
            // Setup - add a text input to each footer cell
            $('#tableLog tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });
            // DataTable
            var table = $('#tableLog').DataTable({
                initComplete: function () {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function () {
                            // input filter
                            // var that = this;
        
                            // $('input', this.footer()).on('keyup change clear', function () {
                            //     if (that.search() !== this.value) {
                            //         that.search(this.value).draw();
                            //     }
                            // });
                            // select filter
                            var column = this;
                            var select = $('<select><option value=""></option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
        
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });
        
                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    select.append('<option value="' + d + '">' + d + '</option>');
                                });
                        });
                },
            });
            
        })
        function delAdm(adm_id){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#bb2d3b',
            cancelButtonColor: 'gray',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    type: "POST",
                    url: "api/delAdmApi.php",
                    data: {
                        admId :adm_id
                    },
                    success: function (response) {
                        if(response == 'success'){
                                Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Admin Account Deleted',
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                Swal.fire({
                                icon: 'error',
                                title: 'Failed!',
                                text: 'Something went wrong,please try again later',
                                })
                            }
                    }
                });
               
            }
          })
            
        }
    </script>
</body>
</html>