$(document).ready(function(){
    // UPDATE FIELDS
    var inputField =  `<textarea type="text" class="inputEdit"></textarea>
    <button type="button" class="btn btn-primary yes">
        <i class="fa-solid fa-check"></i>
    </button>
    <button type="button" class="btn btn-secondary cancel">
        <i class="fa-solid fa-xmark"></i>
    </button>`;
    var lagiEdit = 0;
    function editButton(){
        $('button.edit').on('click',function(){
            var text = $(this).parent().text();
            if(lagiEdit == 0){
                lagiEdit = 1;
                var thisCol = $(this).parent().attr('col')
                
                $(this).parent().html(inputField)
                $('textarea.inputEdit').val(text);
        
                $('button.yes').on('click',function(){
                    var newData = $(this).siblings('textarea').val()
                    var column =  $(this).parent().attr('col');
                    $.ajax({
                        type: "POST",
                        url: "api/home/updateData.php",
                        data: {
                            new : newData,
                            col : column
                        },
                        success: function (response) {
                            response = JSON.parse(response)
                            if(response[0] == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Data Updated'
                                })
                                $('[col='+thisCol+']').html(response[1]+'<button type="button" class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button>')
                                $('button.edit').unbind('click');
                                lagiEdit=0;

                                editButton()
                            }else{
                                Swal.fire({
                                    icon: 'Error',
                                    title: 'Something went wrong',
                                    text: 'Please try again',
                                })
                                $('button.edit').unbind('click');
                                $('[col='+thisCol+']').html(response[1]+'<button type="button" class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button>')
                                lagiEdit = 0;

                                editButton()
                            }
                        }
                    });
                })
                $('button.cancel').on('click',function(){
                    lagiEdit = 0;
                    $('button.edit').unbind('click');
                    $(this).parent().html(text+'<button type="button" class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button>')
                    editButton()
                })
            }else{
                alert('Can only edit one at a time.');
            }
           
        })
    }
    editButton();

    // ganti home Image
    $("#formHomeImage").on('submit',(function(e) {
            e.preventDefault();
            $.ajax({
                url: "api/home/updateImage.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(response){
                    response = JSON.parse(response)
                    if(response[0]=='success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data Updated'
                        })
                        $('img.homeImageChange').attr('src','../'+response[1])
                        $('section.homeImageChange').css('background-image',"url('../"+response[1]+"')")
                        
                    } else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed Uploading file',
                            text: response,
                        })
                    }
                },        
                });
    }));
    // DELETE CLIENTS
    $('.delClient').on('click',function(){
        var imgIndex = $(this).attr('del-target');
        $.ajax({
            type: "POST",
            url: "api/home/delClient.php",
            data: {
                index:imgIndex
            },
            success: function (response) {
                if(response == 'success'){
                    // hapus slides
                    // gk boleh pake splice, pake slice ajah.
                    $(".slide[slide-index='"+imgIndex+"']").remove();
                    // hapus dari modal
                    $(".clientRow[row-index='"+imgIndex+"']").remove();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Client Deleted!'
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to delete client',
                        text: response,
                    })
                }
            }
        });
    })
    // ADD CLIENTS
    function clientDiModal(index,logo,name){
        return `<div class="row justify-content-center align-items-center  clientRow" row-index="`+index+`" style="margin-left:30px">
                    <div class="col-8"><img class="imgClient" src="../src/`+logo+`" style="width:80%" alt="`+name+`"></div>
                    <div class="col-4"><button class="btn btn-danger delClient" del-target="`+index+`"><i class="fa-solid fa-trash-can"></i></button></div>
                </div>`;
    }
    function clientDiSlide(index,logo,name){
        return `<div class="slide slick-slide" slide-index="`+index+`"><img src="../src/`+logo+`" alt="`+name+`"></div>`;
    }
    $('#formAddClients').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url: "api/home/addClient.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
                response = JSON.parse(response)
                if(response[0] == 'success'){
                    // tambah di modal
                    $('.modal-body.clients h5').before(clientDiModal(response[1],response[3],response[2]));
                    // tambah di slider
                    $('div.slider').append(clientDiSlide(response[1],response[3],response[2]));
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Client Added!'
                    }).then(function() {
                        location.reload();
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to add client',
                        text: response,
                    })
                }
            }
        })
    })

    // EDIT STATS
    $('.editStats').click(function(){
        $.ajax({
            type: "POST",
            url: "api/home/editStats.php",
            data: $('#formStatsEdit').serialize(),
            success: function (response) {
                if(response == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Statistics Updated!'
                    }).then(function() {
                        location.reload();
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to edit statistics',
                        text: response,
                    })
                }
            }
        });
    })
    // == FAQ ==
    // ADD FAQ
    $('#formAddFaq').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "api/home/addFaq.php",
            data: $(this).serialize(),
            success: function (response) {
                if(response == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'New Faq Added!'
                    }).then(function() {
                        location.reload();
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to add faq',
                        text: response,
                    })
                }
            }
        });
    })
    // DELETE FAQ
    $('.delFaq').on('click',function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "api/home/delFaq.php",
                    data: {
                        id: $(this).attr('target')
                    },
                    success: function (response) {
                    }
                });
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'The Faq has been deleted.'
                }).then(function() {
                    location.reload();
                });
                
               
            }
          })
    })
    var idFaq=0;
    // EDIT FAQ BUTTON
    $('.editFaqButton').click(function(){
        var id = $(this).attr('target')
        idFaq = id
        $.ajax({
            type: "POST",
            url: "api/home/getFaq.php",
            data: {
                faq_id:id
            },
            success: function (response) {
                response = JSON.parse(response);
                if(response[2] == 'success'){
                    $('#editFaqModal #faqTitle').val(response[0])
                    $('#editFaqModal #faq_desc').val(response[1])
                }
                
            }
        });
    })
      // SAVE EDIT FAQ
    $('.saveEditFaq').click(function(){
        $.ajax({
            type: "POST",
            url: "api/home/editFaq.php",
            data: {
                id : idFaq,
                title: $('#editFaqModal #faqTitle').val(),
                desc: $('#editFaqModal #faq_desc').val()
            },
            success: function (response) {
                if(response == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Faq Edited!'
                    }).then(function() {
                        location.reload();
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to edit faq',
                        text: response,
                    })
                }
            }
        });
    })
    // UPDATE LOGO
    $("#formlogo").on('submit',function(e) {
        e.preventDefault();
        $.ajax({
            url: "api/home/updateLogo.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
                response = JSON.parse(response)
                if(response[0]=='success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Logo Updated'
                    })
                    $('img.logoChange').attr('src','../src/'+response[1])
                    $('#company-logo').attr('src',"../src/"+response[1])  
                } else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed Uploading file',
                        text: response,
                    })
                }
            },        
            });
    });
    // add employee
    $('#formAddEmp').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "api/home/addEmp.php",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                if(response == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Employee has been added to team'
                    }).then(function() {
                        location.reload();
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed Uploading Team mate',
                        text: response,
                    })
                }
            }
        });
    })
    // DELETE EMPLOYEE
    $('.delEmp').click(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "api/home/delEmp.php",
                    data: {
                        id: $(this).attr('target')
                    },
                    success: function (response) {
                        if(response == 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'The employee has been deleted.'
                            }).then(function() {
                                location.reload();
                            });
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed Uploading Team mate',
                                text: response,
                            })
                        }
                    }
                });
               
            }
          })
    })
    
})

function delTestiAction(testi_table){
    //    DELETE TESTIMONY
$('.delTesti').click(function(e){
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "This testimony will be deleted",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'red',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "api/testimony/delTesti.php",
                data: {
                    id: $(this).attr('target')
                },
                success: function (response) {
                    if(response == 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'The testimony has been deleted.'
                        }).then(function() {
                            testi_table.ajax.reload(function(){
                                testiPPImage()
                                delTestiAction(testi_table)
                            });
                        });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed delete testimony',
                            text: 'Something went wrong please try again a few moments later.',
                        })
                    }
                }
            });
           
        }
      })
})
// button edit modal pop up
$('.butTestiModal').click(function(e){
    e.preventDefault()
    $.ajax({
        type: "POST",
        url: "api/testimony/getTesti.php",
        data: {
            id:$(this).attr('target')
        },
        success: function (response) {
            response = JSON.parse(response)
            if(response[0] == 'success'){
                $('#testiEditModal #fullname').val(response[1])
                $('#testiEditModal #about').val(response[2])
                $('#testiEditModal #testi').val(response[3])
                $('#testiEditModal .editTesti').attr('target',response[4])
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Failed delete testimony',
                    text: 'Something went wrong please try again a few moments later.',
                })
            }
        }
    });
})
$('.editTesti').click(function(){
    formData = new FormData(document.getElementById("formEditTestimony"))
    formData.append('id',$(this).attr('target'))
    $.ajax({
        type: "POST",
        url: "api/testimony/editTesti.php",
        data: formData,
        contentType: false,
        cache: false,
        processData:false,
        success: function (response) {
            if(response == 'success'){
                Swal.fire({
                    icon: 'success',
                    title: 'Edited!',
                    text: 'The testimony has been edited.'
                }).then(function() {
                    testi_table.ajax.reload(function(){
                        testiPPImage()
                        delTestiAction(testi_table)
                    });
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Failed delete testimony',
                    text: 'Something went wrong please try again a few moments later.',
                })
            }
        }
    });
})
$('.pubButtonTesti').click(function(){
    var testi_id = $(this).attr('target')
    var thebool = $(this).attr('thebool')
    if(thebool == 1){
        textA = 'This testimony will be published'
        confirmA = 'Yes, publish it online'
        titleA = 'Testimony is published'
    }else{
        textA = 'This testimony will be private'
        confirmA = 'Yes, make it private'
        titleA = 'Testimony is unpublished'
    }
    Swal.fire({
        title: 'Are you sure?',
        text: textA,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: confirmA
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "api/testimony/pubTesti.php",
                data: {
                    id_testi: testi_id,
                    bool : thebool
                },
                success: function (response) {
                    if(response == 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: titleA
                        }).then(function() {
                            testi_table.ajax.reload(function(){
                                testiPPImage()
                                delTestiAction(testi_table)
                            });
                        });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to make changes',
                            text: 'Something went wrong please try again a few moments later.',
                        })
                    }
                }
            });
        
        }
    })
})
}
