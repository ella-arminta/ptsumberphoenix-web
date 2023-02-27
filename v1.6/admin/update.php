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
    <title>Updates</title>
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

    <!-- CKEDITOR buat body-->
    <!-- <script src="script/ckeditor/ckeditor.js"></script>
    <script src="script/sample.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

</head>
<body>
    <!-- Navbar -->
    <?php include 'includes/nav.php' ?>
    <div class="container" style="margin-top:96px">
    <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#writeModal"><h5>Write a post</h5></button>
    <!-- Modal Make A Post-->
    <div class="modal fade" id="writeModal" tabindex="-1" aria-labelledby="writeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="writeModalLabel">Write a Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addPost">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="capt" class="form-label">Caption</label>
                            <input type="text" name="capt" class="form-control" id="capt" onkeyup="cekPanjangKata()" aria-describedby="capt" required>
                            <p class="text-danger dangerCaptPanjang" style="display:none;margin:0">Word count max : 20</p>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Picture</label>
                            <input type="file" accept="image/*" class="form-control" name="pict" id="image" aria-describedby="image" required>
                        </div>
                        <div class="form-group">
                                        <label class="col-md-12">Body</label>
                                        <div class="col-md-12">
                                            <div class="adjoined-bottom">
                                                <div class="grid-container">
                                                    <div class="grid-width-100">
                                                        <textarea id="editor" name="isi" required>
                                                            
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <textarea class="form-control" rows="10" id="isi" name="isi"></textarea> -->
                                        </div>
                                    </div>  
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning addDraft">Save to Draft</button>
                    <button type="button" class="btn btn-success addPublish">Publish</button>
                </div>
            </div>
        </div>
    </div>
    <h1 style="text-align:center">Post Updates</h1>
        <table id="posts"  class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Caption</th>
                    <th>Writer</th>
                    <th>Picture</th>
                    <!-- <th>Body</th> -->
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    $stmt =$conn->prepare("SELECT * FROM updates where status != 'deleted'");
                    $stmt->execute();
                    while($row = $stmt->fetch()):
                ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row['upd_title'] ?></td>
                        <td><?= $row['upd_sub'] ?></td>
                        <td><?= $row['adm_name']?></td>
                        <td><button class="btn btn-dark"  data-bs-toggle="modal" data-bs-target="#pictureModal" onclick="seePicture('<?= $row['upd_title'] ?>','<?= $row['upd_pict'] ?>',<?= $row['upd_id'] ?>)">Edit Picture</button></td>
                        <!-- <td><button class="btn btn-light"  data-bs-toggle="modal" data-bs-target="#seeBodyModal" onclick="seeBody(<?php //$row['upd_id'] ?>)">See Detail</button></td> -->
                        <?php
                            if($row['status'] == 'draft'){
                                echo '<td class="text-warning">Draft</td>';
                            }else if($row['status'] == 'published'){
                                echo '<td class="text-success">Published</td>';
                            }else if($row['status'] == 'featured'){
                                echo '<td class="text-success">Featured</td>';
                            }
                            else{
                                echo '<td class="text-danger">Unknown</td>';
                            }
                        ?>
                        <td>
                            <a href="../single/update.php?id=<?= $row['upd_id'] ?>" style="width:100%">View Post</a><br>
                            <a class="text-warning" style="cursor:pointer" onclick="getEditPost(<?= $row['upd_id'] ?>)"  data-bs-toggle="modal" data-bs-target="#editPostModal">Edit Post</a>
                            <a class="text-danger" style="cursor:pointer" onclick="trash(<?= $row['upd_id'] ?>)">Trash</a>
                            <?php
                                if($row['status'] == 'published'){
                                    echo '<button class="btn btn-light" onclick="publish(0,'.$row['upd_id'].')">Unpublish</button>';
                                } else if($row['status'] == 'draft'){
                                    echo '<button class="btn btn-warning" onclick="publish(1,'.$row['upd_id'].')">Publish</button>';
                                }
                            ?>
                            <?php 
                                if($row['status'] == 'published'){
                                    echo '<button class="btn btn-info" onclick="feature(1,'.$row['upd_id'].')">Feature</button>';
                                }else if ($row['status'] == 'featured'){
                                    echo '<button class="btn btn-secondary" onclick="feature(0,'.$row['upd_id'].')">Unfeatured</button>';
                                }
                            ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th><input type="text" style="width:100px;margin:0" placeholder="Search Title" /></th>
                    <th><input type="text" style="width:100px;margin:0" placeholder="Search Caption" /></th>
                    <th><input type="text" style="width:100px;margin:0" placeholder="Search Writer" /></th>
                    <th>Picture</th>
                    <!-- <th>Body</th> -->
                    <th><input type="text" style="width:100px;margin:0" placeholder="Search Status" /></th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- Modal view Picture -->
    <div class="modal fade" id="pictureModal" tabindex="-1" aria-labelledby="pictureModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="pictureModalLabel">Picture</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="pictImg" src="" style="width:100%" alt="">
                </div>
                <div class="modal-footer">
                    <div class="editMode" style="display:none">
                        <button type="button" class="btn btn-dark" onclick="notEditPictMode()">Cancel</button>
                        <button type="button" class="btn btn-primary savePict" onclick="goEditPict()">Save Changes</button>
                    </div>
                    <div class="notEditing">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" onclick="editPictureMode()">Edit Picture</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit Post -->
    <div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editPostModalLabel">Edit Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPostForm">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="capt" class="form-label">Caption</label>
                            <input type="text" name="capt" class="form-control" id="capt" aria-describedby="capt" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Body</label>
                            <div class="col-md-12">
                                <div class="adjoined-bottom">
                                    <div class="grid-container">
                                        <div class="grid-width-100">
                                            <textarea id="editor2" name="isi" required>
                                                
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary savePost" onclick="savePost()">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal view Body -->
    <!-- <div class="modal fade" id="seeBodyModal" tabindex="-1" aria-labelledby="seeBodyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="seeBodyModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <div class="editMode" style="display:none">
                        <button type="button" class="btn btn-dark" onclick="notEditPictMode()">Cancel</button>
                        <button type="button" class="btn btn-primary savePict" onclick="goEditPict()">Save Changes</button>
                    </div>
                    <div class="notEditing">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <script src="script/jquery-3.6.1.min.js"></script> -->
    <!-- ckeditor -->
    <script>
    let editor;
    let editor2;
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( newEditor => {
            editor = newEditor;
        } )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .then( newEditor => {
            editor2 = newEditor;
        } )
        .catch( error => {
            console.error( error );
        } );
    </script>
    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        $(document).ready( function () {
            // DataTable
            var table = $('#posts').DataTable({
                initComplete: function () {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function () {
                            // input filter
                            var that = this;
        
                            $('input', this.footer()).on('keyup change clear', function () {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                    this.api()
                        .columns(5)
                        .every(function(){
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
                        })
                },
               
        });
        $('.addDraft').click(function(){
                    var form = new FormData(document.getElementById('addPost'))
                    form.append('stat','draft')
                    // ckeditor
                    form.append('content',editor.getData());
                    $.ajax({
                        type: "POST",
                        url: "api/update/addPost.php",
                        data:  form,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function (response) {
                            if(response == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Update save to draft'
                                }).then(function() {
                                    location.reload();
                                });
                            }else if(response=='salahTipeIMG'){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Sorry, only JPG,PNG,JPEG and gif are allowed'
                                })
                            }
                            else if(response=='gagal upload foto'){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Gagal upload foto'
                                })
                            }
                            else{
                                
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Terjadi Kesalahan,silahkan coba beberapa saat lagi'
                                })
                            }
                        }
                    });
                })
        } );
        $('.addPublish').click(function(){
                    var form = new FormData(document.getElementById('addPost'))
                    form.append('stat','published')
                    // ckeditor
                    form.append('content',editor.getData());
                    $.ajax({
                        type: "POST",
                        url: "api/update/addPost.php",
                        data:  form,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function (response) {
                            if(response == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Update Published!'
                                }).then(function() {
                                    location.reload();
                                });
                            }else if(response=='salahTipeIMG'){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Sorry, only JPG,PNG,JPEG and gif are allowed'
                                })
                            }
                            else if(response=='gagal upload foto'){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Gagal upload foto'
                                })
                            }
                            else{
                                
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Terjadi Kesalahan,silahkan coba beberapa saat lagi'
                                })
                            }
                        }
                    });
                })
        
        function read(id_msg){
            $.ajax({
                type: "POST",
                url: "api/readMsg.php",
                data: {
                    id:id_msg
                },
                success: function (response) {
                    if(response == 'success'){
                        $('#msg-'+id_msg).parent().text('Seen');
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: "Something went wrong."
                        })
                    }
                }
            });
        }
        function seePicture(title,urlPict,pictId){
            $('#pictureModalLabel').text(title)
            $('#pictImg').attr('src','../'+urlPict)
            $('.savePict').attr('onclick','goEditPict('+pictId+')')
        }
        var curPict;
        function editPictureMode(){
            $('.editMode').css('display','block')
            $('.notEditing').css('display','none');
            curPict =  $('#pictImg').attr('src')
            $('#pictureModal .modal-body').html('<form id="formEditPict" enctype="multipart/form-data"><input type="file" accept="image/*" name="pict" id="pictEdit" required></input></form>')
        }
        function notEditPictMode(){
            $('.editMode').css('display','none')
            $('.notEditing').css('display','block');
            $('#pictureModal .modal-body').html('<img id="pictImg" src="'+curPict+'" style="width:100%" alt="">');
        }
        function goEditPict(pictId){
            var form = new FormData(document.getElementById('formEditPict'))
            form.append('pictId',pictId)
            Swal.fire({
                title: 'Are you sure?',
                text: "You will change this post picture",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: 'gray',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "api/update/editPict.php",
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        data: form,
                        success: function (response) {
                            if(response == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Picture Changed!'
                                }).then(function() {
                                    location.reload();
                                });
                            }
                            else if(response == 'kosong'){
                                Swal.fire({
                                    icon: "warning",
                                    title: "Picture is Empty!",
                                    text: "Picture for replacement is still empty, please input picture replacer"
                                })
                            }
                            else{
                                Swal.fire({
                                    icon: "error",
                                    title: "Error!",
                                    text: "Something went wrong."
                                })
                            }
                        }
                    });
                }
            })
        }
        // function seeBody(updId){
        //     $.ajax({
        //         type: "GET",
        //         url: "api/update/getBody.php",
        //         data: {
        //             upd_id : updId
        //         },
        //         success: function (response) {
        //             response = JSON.parse(response)
        //             // seeBodyModalLabel
        //             $('#seeBodyModalLabel').text(response[0])
        //             // #seeBodyModal .modal-body
        //             $('#seeBodyModal .modal-body').html(response[1])
        //         }
        //     });
        // }
        function getEditPost(id){
            $('.savePost').attr('onclick','savePost('+id+')')
            $.ajax({
                type: "GET",
                url: "api/update/getPost.php",
                data: {
                    upd_id : id
                },
                success: function (response) {
                    response = JSON.parse(response)
                    // #editPostForm
                    $('#editPostForm #title').val(response[0])
                    $('#editPostForm #capt').val(response[1])
                   
                    editor2.setData(response[2])
                }
            });
        }
        function savePost(id){
            form2 = new FormData(document.getElementById('editPostForm'))
            form2.append('content',editor2.getData());
            console.log(editor2.getData());
            form2.append('id',id);
            Swal.fire({
                title: 'Are you sure?',
                text: "New Changes will be saved",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'gray',
                confirmButtonText: 'Yes, save changes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "api/update/editPost.php",
                        processData: false,
                        contentType: false,
                        cache: false,
                        data: form2,
                        success: function (response) {
                            if(response == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Post edited!'
                                }).then(function() {
                                    location.reload();
                                });
                            }else if(response == 'kosong'){
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Not Saved!',
                                    text: 'Empty Data found, please fill out all the inputs'
                                })
                            }
                            else{
                                Swal.fire({
                                    icon: "error",
                                    title: "Error!",
                                    text: "Something went wrong."
                                })
                            }
                        }
                    });
                }
            })
        }
        function trash(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "This post will be deleted",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: 'gray',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "api/update/delPost.php",
                        data: {
                            upd_id : id
                        },
                        success: function (response) {
                            if(response == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Post deleted!'
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                Swal.fire({
                                    icon: "error",
                                    title: "Error!",
                                    text: "Something went wrong."
                                })
                            }
                        }
                    });
                }
            })
        }
        function publish(bool,id){
            if(bool == 0){
                text1 = 'switched to draft'
                text2 = 'switched to draft'
                
            }else if (bool == 1){
                text1 = 'published'
                text2 = 'published it'
            }
            Swal.fire({
                title: 'Are you sure?',
                text: "This post will be "+text1,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'gray',
                confirmButtonText: 'Yes, '+text2
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "api/update/setPublish.php",
                        data: {
                            boole : bool,
                            upd_id : id
                        },
                        success: function (response) {
                            if(response == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Post '+text1+'!'
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                Swal.fire({
                                    icon: "error",
                                    title: "Error!",
                                    text: "Something went wrong."
                                })
                            }
                        }
                    });
                }
            })
        }
        function feature(bool,id){
            if(bool == 0){
                text1 = 'unfeatured'
                text2 = 'unfeature it!'
                
            }else if (bool == 1){
                text1 = 'featured'
                text2 = 'feature it'
            }
            Swal.fire({
                title: 'Are you sure?',
                text: "This post will be "+text1,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'gray',
                confirmButtonText: 'Yes, '+text2
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "api/update/setFeature.php",
                        data: {
                            boole : bool,
                            upd_id : id
                        },
                        success: function (response) {
                            if(response == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Post '+text1+'!'
                                }).then(function() {
                                    location.reload();
                                });
                            }else if (response == 'kelebihan'){
                                Swal.fire({
                                    icon: "warning",
                                    title: "Post Can't Be Featured!",
                                    text: "Only can feature maksimum of 4 posts."
                                })
                            }
                            else{
                                Swal.fire({
                                    icon: "error",
                                    title: "Error!",
                                    text: "Something went wrong."
                                })
                            }
                        }
                    });
                }
            })
        }
        function cekPanjangKata(){
            var words = $('#capt').val().split(' ');
            if(words.length > 20){
                $('.dangerCaptPanjang').css('display','block')
            }else{
                $('.dangerCaptPanjang').css('display','none')
            }
        }
    </script>
</body>
</html>