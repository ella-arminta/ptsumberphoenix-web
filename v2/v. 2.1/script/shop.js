
$(document).ready(function(){
    // ===== AJAX ======
    var products_id = [];
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
                masterCatId: mCatId
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
                            cards += `
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light" onclick="window.location.href='./single/product.php?product_code=`+product.product_code+`&subCode=`+catCode+`'">
                                        <img src="`+product.product_img+`" class="w-100" />
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="product-title" onclick="window.location.href='./single/product.php?product_code=`+product.product_code+`&subCode=`+catCode+`&subCode=`+catCode+`'">`+product.product_name+`</div>
                                        
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
    $(document).on('keypress',function(e) {
        if(e.which == 13) {
            if($('#searchbar').val() != ''){
                getProducts('byName','')
            }
        }
    });

})


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