$(document).ready(function(){
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
            type: "post",
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
    // <!-- client/toyota.png -->
    // <!-- client/AHM.png -->
    // <!-- client/rhm.png -->
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
    
})
