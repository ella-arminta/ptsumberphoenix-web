$(document).ready(function(){
    // buat inputan ke upperCase setiap mengetik
    $('input#catCode').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
    // buat inputan ke upperCase setiap mengetik
    $('input#proCode').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
            

            $('.catButton').click(function(e){
                e.preventDefault();
                // hitamkan button category
                if($(this).hasClass('btn-light')){
                    $(this).removeClass('btn-light');
                }
                if(!$(this).hasClass('btn-dark')){
                    $(this).addClass('btn-dark')
                }
                // putihkan button sub
                if($('.subButton').hasClass('btn-dark')){
                    $('.subButton').removeClass('btn-dark');
                }
                if(!$('.subButton').hasClass('btn-light')){
                    $('.subButton').addClass('btn-light')
                }
                // ganti form ke category form
                $('.containerFormAddCatSub').html(`<form id="formAddCat">
                <div class="mb-3">
                    <label for="catName" class="form-label">Category Name</label>
                    <input type="text" name="catName" class="form-control" placeholder="Category Name" id="catName" aria-describedby="catName" required>
                </div>
                <div class="mb-3">
                    <label for="catCode" class="form-label">Category Code</label>
                    <input type="text" class="form-control" name="catCode" placeholder="example : RI" id="catCode" required>
                    <div id="catCodeInfo" class="form-text">Example : Rubber Industries -> RI</div>
                </div>
                <div style="display:flex;justify-content:center;flex-direction:column;width:100%;align-items:center">
                    <button type="submit" class="btn btn-success" style="width:100px">Add</button>
                </div>
            </form>`);
                $('#formAddCat').unbind('submit');
                formAddCatSubmit()
                // ganti modal header ke cat
                $('#addCatModal .modal-title').text('Add Category')

                // buat inputan ke upperCase setiap mengetik
                $('input#catCode').keyup(function(){
                    $(this).val($(this).val().toUpperCase());
                });
            })
            $('.subButton').click(function(e){
                e.preventDefault();
                // hitamkan button sub
                if($(this).hasClass('btn-light')){
                    $(this).removeClass('btn-light');
                }
                if(!$(this).hasClass('btn-dark')){
                    $(this).addClass('btn-dark')
                }
                // putihkan button cat
                if($('.catButton').hasClass('btn-dark')){
                    $('.catButton').removeClass('btn-dark');
                }
                if(!$('.catButton').hasClass('btn-light')){
                    $('.catButton').addClass('btn-light')
                }
                // ganti modal header ke sub
                $('#addCatModal .modal-title').text('Add Subcategory')
                // ganti form ke subcat
                options = '';
                catsArr = [];
                $.ajax({
                    type: "POST",
                    url: "api/shop/getCat.php",
                    data: "",
                    success: function(response) {
                        catsArr = JSON.parse(response);
                        for(var i =0; i < catsArr[0].length ; i++){
                            options+= '<option value="'+catsArr[0][i]+'">'+catsArr[1][i]+'</option>';
                        }
                        $('.containerFormAddCatSub').html(
                            `<form id="formAddSub">
                                <div class="mb-3">
                                    <label for="subName" class="form-label">Subcategory Name</label>
                                    <input type="text" name="subName" class="form-control" placeholder="Subcategory Name" id="subName" aria-describedby="subName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="subCode" class="form-label">Subcategory Code</label>
                                    <input type="text" class="form-control" name="subCode" placeholder="example : RI" id="subCode" required>
                                    <div id="subCodeInfo" class="form-text">Example : Rubber Industries -> RI</div>
                                </div>
                                <div class="mb-3">
                                    <label for="selectCat" class="form-label">Category</label>
                                    <select name="catCode" class="form-select" aria-label="Default select selectCat" id="selectCat" required>
                                        <option selected value="">Select category that related to subcategory</option>`
                                        +options+
                                    `</select>
                                </div>
                                <div style="display:flex;justify-content:center;flex-direction:column;width:100%;align-items:center">
                                    <button type="submit" class="btn btn-success" style="width:100px">Add</button>
                                </div>
                            </form>`);

                            $('#formAddSub').unbind('submit');
                            formAddSubSubmit();

                            // buat inputan ke upperCase setiap mengetik
                            $('input#subCode').keyup(function(){
                                $(this).val($(this).val().toUpperCase());
                            });
                            
                    }
                });
            })
    // ===== AJAX ======
    // ajax add category
    function addCatAccordion(code,catName){
        var catItem = `
        <div class="category accordion-item `+code+`">
            <h2 class="accordion-header" id="heading-`+code+`">
                <button class="btn btn-danger delCatBut" code="`+code+`"><i class="fa-solid fa-trash-can"></i></button>
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-`+code+`" aria-expanded="false" aria-controls="collapse-`+code+`">
                    `+catName+`
                </button>
            </h2>
            <div id="collapse-`+code+`" class="accordion-collapse collapse" aria-labelledby="heading-`+code+`" data-bs-parent="#accordionExample">
                <div class="accordion-body `+code+`">
                </div>
            </div>
        </div> `;
        $('.categories.filters.accordion').append(catItem);
        
    }
    function formAddCatSubmit(){
        $('#formAddCat').submit(function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "api/shop/addCat.php",
                data: $(this).serialize(),
                success: function (response) {
                    response = JSON.parse(response);
                    if(response[0] == 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'New Category Added!'
                        })
                        addCatAccordion(response[1],response[2]);
                        $('#formAddCat input').val('');
                        $('.delCatBut').unbind('click');
                        delCatButton();

                        $('.category-item').unbind('click')
                        subcategoryClick()
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: response[0]
                        })
                    }
                }
            });
        })
    }
    formAddCatSubmit()
    //ADD SUBCATEGORY
    function addSubAccordion(subName,subCode,catCode){
        var item = `<div class="category-item" id="`+subCode+`"><button class='btn btn-danger delSub' code="`+subCode+`" style="width:30px;height:30px;padding:0;"><i class="fa-solid fa-trash"></i></button> `+subName+`</div>`;
        $('.accordion-body.'+catCode).append(item);
        $('.delSub').unbind('click');
        delSubButton()
    }
    function formAddSubSubmit(){
        $('#formAddSub').submit(function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "api/shop/addSub.php",
                data: $(this).serialize(),
                success: function (response) {
                    response = JSON.parse(response);
                    if(response[0] == 'success'){
                        addSubAccordion(response[1],response[2],response[3])
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'New Subcategory Added!'
                        })
                        $('#formAddSub input').val('');
                        // onclick subcategory
                        $('.category-item').unbind('click')
                        subcategoryClick()
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: response[0]
                        })
                    }
                }
            });
        })
    }
    // delete subcategory
    function delSubButton(){
        $('.delSub').click(function(e){
            subCode = $(this).attr('code');
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this subcategory!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: 'gray',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "api/shop/delSub.php",
                        data: {
                            code:subCode
                        },
                        success: function (response) {
                            if(response == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'This Subcategory has been deleted.'
                                })
                                $('.category-item#'+subCode).remove();
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed!',
                                    text: response
                                })
                            }
                            
                        }
                    });
                }
            })
        })
    }
    delSubButton();

    // delete categoris
    function delCatButton(){
        $('.delCatBut').click(function(e){
            catCode = $(this).attr('code');
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This category and all its subcategory will be deleted and cannot be revert.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: 'gray',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "api/shop/delCat.php",
                        data: {
                            code:catCode
                        },
                        success: function (response) {
                            if(response == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'This Category has been deleted.'
                                })
                                $('.accordion-item.'+catCode).remove();
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed!',
                                    text: response
                                })
                            }
                            
                        }
                    });
                }
            })
        })
    }
    delCatButton();

    hasil='';
    // add subcategories to post product
    $('.addProduct').click(function(){
        
        $.ajax({
            type: "POST",
            url: "api/shop/getSub.php",
            data: "",
            success: function (response) {
                response = JSON.parse(response);
                hasil ="";
                tot =0;
                for (j = 0;j<response[3].length;j++){
                    hasil +=`
                        <label for="custServ" class="form-label">`+response[2][j]+`</label>
                        <div class="subcheck-group">
                    `
                    for(i =0;i<response[3][j];i++){
                        hasil+= `
                        <div class="form-check">
                            <input class="form-check-input" name="subs[]" type="checkbox" value="`+response[0][tot]+`" id="check-`+response[0][tot]+`">
                            <label class="form-check-label" for="check-`+response[0][tot]+`">
                                `+response[1][tot]+`
                            </label>
                        </div>
                        `;
                        tot += 1;
                    }
                    hasil += `</div>`;
                }
                
                // $('.subcheck-group').html(hasil);
                $('.getCategories').html(hasil)
            }
        });
    })
    // POST PRODUCT / ADD PRODUCT
    $('#formAddProduct').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "api/shop/addProduct.php",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                if(response == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Product posted!'
                    }).then(function() {
                        location.reload();
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response
                    })
                }
            }
        });
        // location reload
    })


    // function get products
    function getProducts(catCode){
        
        $.ajax({
            type: "GET",
            url: "api/shop/getProducts.php",
            data:  {
                catCode : catCode
            },
            success: function (response) {
                response = JSON.parse(response)
                if(response[0] == 'success'){
                    //   getData Random
                    if(response[1].length <= 0){
                        $('.products-inner').html("<h1>No Product Found in this category</h1>")
                        $('.loadMore').css('display','none');
                        $('.Loader').css('display','none');
                    }else{
                        $('.products-inner').html(response[1])
                        if(response[2] >= 9){
                            $('.loadMore').css('display','block');
                        }else{
                            $('.loadMore').css('display','none');
                        }
                        $('.Loader').css('display','none');
                    }
                    
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response[1]
                    })
                }
            }
        });
    }
    function subcategoryClick(){
        $('.category-item').click(function(){
            var subCode = $(this).attr('id')
            getProducts(subCode)
        })
    }
    subcategoryClick()
    getProducts('random');

})