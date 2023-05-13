
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
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
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
                        $('.loadMore').unbind('click')
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
                text: "This category and all its subcategory will be deleted.",
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
                if(response != ''){
                    response = JSON.parse(response);
                }else{
                    response = []
                }
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
    function getProducts(catCode,mCatId){
        $('.loader').css('display','flex');
        proName = '';
        if(catCode == 'byName'){
            proName = $('#searchbar').val();
        }
        $.ajax({
            type: "GET",
            url: "api/shop/getProducts.php",
            data:  { 
                catCode : catCode,
                shown : JSON.stringify(products_id),
                proName : proName,
                masterCatId : mCatId,
            },
            success: function (response) {
                response = JSON.parse(response)
                if(response[0] == 'success'){
                    // card ini isi nya product_code,product_img,product_name,product_id
                    //   getData Random
                    if(response[1].length <= 0){
                        if(catCode == 'byName'){
                            $('.products-inner').html("<h1>No Product Found</h1>")
                        }else{
                            $('.products-inner').html("<h1>No Product Found in this category</h1>")
                        }
                        $('.loadMore').css('display','none');
                        $('.loader').css('display','none');
                    }else{
                        var cards ='';           
                        if(catCode != 'random' || catCode == 'byName'){
                            products_id = []
                        }     
                        for (let index = 0; index < response[1].length; index++) {
                            
                            product = response[1][index];
                            icon = ''
                            if(product.featured == 1){
                                icon+= `<i class="fa-solid fa-star fa-xl" style="margin-right:10px;color:orange" onclick="featured(0,'`+product.product_code+`')"></i>`;
                            }else{
                                icon+=`<i class="fa-regular fa-star fa-xl" style="margin-right:10px;color:orange" onclick="featured(1,'`+product.product_code+`')"></i>`
                            }
                            if(product.best_seller == 1){
                                icon+=`<i class="fa-solid fa-heart fa-xl" style="color:red" onclick="bestSeller(0,'`+product.product_code+`')"></i>`
                            }else{
                                icon+=`<i class="fa-regular fa-heart fa-xl" style="color:red" onclick="bestSeller(1,'`+product.product_code+`')"></i>`
                            }
                            cards += `
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light" onclick="window.location.href='./single/product.php?product_code=`+product.product_code+`&subCode=`+catCode+`'">
                                        <img src="../`+product.product_img+`" class="w-100" />
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="product-title" onclick="window.location.href='./single/product.php?product_code=`+product.product_code+`&subCode=`+catCode+`'">`+product.product_name+`</div>
                                        <!-- star : feautured, love :best seller -->
                                        <div>
                                            <div style="float:left">
                                                `+icon+`
                                            </div>
                                            <div style="float:right">
                                                <button  class="btn btn-danger delProductBut" onclick="delProduct('`+product.product_code+`')" proCode="`+product.product_code+`">Delete</button>
                                                <button style="margin-right:10px;"  class="btn btn-warning editProduct" onclick="editProduct('`+product.product_code+`')" proCode="`+product.product_code+`">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `   
                            products_id.push(product);
                           
                        }
                        $('.products-inner').html(cards)
                        var proTitle = response[4] +' - '+response[3];
                        $('.product-category-title').text(proTitle);
                        if (response[3] == undefined){
                            $('.product-category-title').text('Our Products');
                        }
                        if(response[2] > 0){
                            $('.loadMore').css('display','block');
                        }else{
                            $('.loadMore').css('display','none');
                        }
                        $('.loader').css('display','none');
                    }
                    
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Something went Wrong please come back later'
                    })
                }
            },
            error: function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Terjadi kesalahan, silahkan coba lagi.'
                })
            }
        });
        // console.log(JSON.stringify(products_id))
    }
    function subcategoryClick(){
        $('.category-item').click(function(){
            var subCode = $(this).attr('id')
            var catId = $(this).parent().attr('class')
            splited = catId.split(" ");
            console.log(splited)
            products_id = [];
            getProducts(subCode,splited[1])
            
            $('.loadMore').attr('get',subCode);
            $('loadMore').attr('cat',splited[1]);
        })
        $('.loadMore').click(function(){
            // kalau ambil category
            if($(this).attr('get').substring(0, $(this).attr('get').indexOf(' ')) == 'cat'){
                getProByCat($(this).attr('get').indexOf(' ') + 1)
            }else{
                getProducts($(this).attr('get'),$(this).attr('cat'));
            }
            
        })
    }
    subcategoryClick()
    $('.loadMore').attr('get','randKedua');
    
    // search icon on clicl
    $('.search-icon').click(function(){
        getProducts('byName','')
    })

})
function delProduct(proCode){
    Swal.fire({
        title: 'Are you sure?',
        text: "This product will be deleted.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: 'gray',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "api/shop/delProduct.php",
                data: {
                    code:proCode
                },
                success: function (response) {
                    if(response == 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'This Product has been deleted.'
                        })
                        location.reload();
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: 'Something went wrong, please try again a few moments later'
                        })
                    }
                    
                }
            });
        }
    })

}


// autocomplete search
function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
  }
function featured(thebool,product_code){
    console.log(thebool)
    if(thebool == 0){
         textA = 'This product will be removed from featured.'
         textC = 'Yes, Remove Feature'
         titleS = 'Product not Feautured!'
         textS = 'Product removed from feature.'
    }else{
        textA = 'This product will be displayed in featured.'
        textC = 'Yes, Feature'
        titleS = 'Product is Feautured!'
        textS = 'Product displayed as feature.'
    }
    Swal.fire({
        title: 'Are you sure?',
        text: textA,
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: 'gray',
        confirmButtonText: textC
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "api/shop/setFeature.php",
                data: {
                    bool :thebool,
                    code:product_code
                },
                success: function (response) {
                    if(response == 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: titleS,
                            text: textS
                        })
                        location.reload();
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: 'Something went wrong, please try again a few moments later'
                        })
                    }
                    
                }
            });
        }
    })
}
function bestSeller(thebool,product_code){
    console.log(thebool)
    if(thebool == 0){
        textA = 'This product will be removed from best seller.'
        textC = 'Yes, Remove Best Seller'
        titleS = 'Best Seller removed!'
        textS = 'Product removed from best seller.'
   }else{
       textA = 'This product will be displayed in best seller.'
       textC = 'Yes, make it best seller'
       titleS = 'Success'
       textS = 'Product displayed as best seller.'
   }
    Swal.fire({
        title: 'Are you sure?',
        text: textA,
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: 'gray',
        confirmButtonText: textC
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "api/shop/setBestSeller.php",
                data: {
                    bool :thebool,
                    code:product_code
                },
                success: function (response) {
                    if(response == 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: titleS,
                            text: textS
                        })
                        location.reload();
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: 'Something went wrong, please try again a few moments later'
                        })
                    }
                    
                }
            });
        }
    })
}
function editProduct(procode){
    window.location.href = 'editProduct.php?product_code='+procode;
}