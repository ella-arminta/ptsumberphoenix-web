$(document).ready(function(){
    var inputField =  `<input type="text" class="inputEdit">
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
                var thisClass = $(this).parent().attr('class')
                
                $(this).parent().html(inputField)
                $('input.inputEdit').attr("value",text );
        
                $('button.yes').on('click',function(){
                    var newData = $(this).siblings('input').val()
                    var column =  $(this).parent().attr('col');
                    $.ajax({
                        type: "POST",
                        url: "api/updateData.php",
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
                                $('.'+thisClass).html(response[1]+'<button type="button" class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button>')
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
                                $('.'+thisClass).html(response[1]+'<button type="button" class="btn btn-danger edit"><i class="fa-solid fa-pencil"></i></button>')
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
    
})
