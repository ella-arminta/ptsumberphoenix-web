
// update url params
const updateURLParameter = (key, value) => 
{ 
    let url = new URL(window.location.href);

    // Remove other search params
    url.searchParams.forEach((_, paramKey) => 
    {
        if (paramKey !== key) url.searchParams.delete(paramKey);
    });

    url.searchParams.set(key, value);
    let newURL = url.toString();
    window.history.replaceState(null, null, newURL);
}

const getProductsbyName = (product_name) => 
{
    $('.loader').css('display', 'flex') // init loading
    
    $.ajax({
        type: "POST",
        url: "api/shop/getProductsbyName.php",
        data: { name: product_name },

        success: (response) => 
        {
            // Parse the JSON response
            let data = JSON.parse(response);
            if (data === 'error')
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed!',
                    text: 'Something went wrong, please try again a few moments later'
                })
                return
            }

            // update webpage
            let productContainer = $('.products-inner');
            productContainer.empty(); // Clear previous content

            // update data
            if(data.length < 1) 
            {
                // update title. no products were found
                $('.product-category-title').text('Our Products')
                $('.products-inner').html(`<h1>No Product(s) found</h1>`)
            }
            else
            {
                $('.product-category-title').text('Our Products')

                let product = data[0];
                    
                let productDiv = `
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card" onclick="window.location.href='./single/product.php?product_code=${product.product_code}&subCode=name${product.product_name}'">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light"'">
                                <img src="${product.product_img}" class="w-100" />
                            </div>
                            
                            <div class="card-body">
                                <div class="product-title"'">${product.product_name}</div>
                            </div>
                        </div>
                    </div>
                `;
                
                // Append the product <div> to the container
                productContainer.append(productDiv);

                // Update url params
                updateURLParameter('', '')
                updateURLParameter('subCode', `name${product.product_name}`)
            }
        },

        error: (xhr, status, error) => 
        {
            console.log(xhr.responseText)
            Swal.fire({
                icon: 'error',
                title: 'Failed!',
                text: 'Something went wrong, please try again a few moments later'
            })
        },

        complete: () => 
        {
            $('.loader').css('display', 'none') // finish loading
        }
    })
}

const getProducts = function(code, element) 
{
    $('.loader').css('display', 'flex') // init loading

    $.ajax({
        type: "POST",
        url: "api/shop/getProducts.php",
        data: 
        {
            code: code
        },

        success: (response) => 
        {
            // Parse the JSON response
            let data = JSON.parse(response);
            if (data === 'error')
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed!',
                    text: 'Something went wrong, please try again a few moments later'
                })

                return
            }
            
            // update webpage
            let productContainer = $('.products-inner');
            productContainer.empty(); // Clear previous content
            
            // update data
            if(data.length < 1) 
            {
                // update title. no products were found
                $('.product-category-title').text('Our Products')
                $('.products-inner').html(`<h1>No Product(s) found</h1>`)
            } 
            else 
            {
                // update title
                if (code === 'all') 
                {
                    $('.product-category-title').text('Our Products')
                    updateURLParameter('', '')
                }
                else if (code.substring(0, 3) === 'cat') // from business field click
                {
                    let catElement = $(`.category.${code.substring(3)}`)
                    let catName = catElement.find('.accordion-button').text()
                    $('.product-category-title').text(catName)
                    updateURLParameter('cateCode', code.substring(3))
                }
                else
                {
                    let category, sub_category

                    if (element === 'custom-element') // from single product page back to shop page
                    {
                        let subElement = $(`.category-item#${code}`)
                        category = subElement.parent().attr('class').split(' ')[2]
                        category = category.replace('-', ' ')
                        sub_category = subElement.text()
                        updateURLParameter('subCode', code)
                    } 
                    else
                    {
                        category = $(element).parent().attr('class').split(' ')[2]
                        category = category.replace('-', ' ')
                        sub_category = $(element).text()
                        updateURLParameter('subCode', code)
                    }

                    sub_category = sub_category.trim()
                    let title = `${category} - ${sub_category}`
                    $('.product-category-title').text(`${title}`)
                }
                
                // Iterate over the data and create HTML elements to display the products
                for (let i = 0; i < data.length; i++) {
                    let product = data[i];
                    
                    let productDiv = `
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card" onclick="window.location.href='./single/product.php?product_code=${product.product_code}&subCode=${code}'">
                                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light"'">
                                    <img src="${product.product_img}" class="w-100" />
                                </div>
                                
                                <div class="card-body">
                                    <div class="product-title"'">${product.product_name}</div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    // Append the product <div> to the container
                    productContainer.append(productDiv);
                }
            }
        },

        error: (xhr, status, error) => 
        {
            console.log(xhr.responseText)
            Swal.fire({
                icon: 'error',
                title: 'Failed!',
                text: 'Something went wrong, please try again a few moments later'
            })
        },

        complete: () => 
        {
            $('.loader').css('display', 'none') // finish loading
        }
    })
}

// autocomplete search
function autocomplete(inp, arr) 
{

    var currentFocus;
   
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) 
    {
        
        // set global params
        var a, b, i, val = this.value;
        closeAllLists(); // closed open list
        if (!val) { return false;}
        currentFocus = -1;
        
        // div container to store items
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);

        /*check if the item starts with the same letters as the text field value:*/
        for (i = 0; i < arr.length; i++) 
        {
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) 
            {
                b = document.createElement("DIV");

                // load matching characters
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                
                // something to store the input value
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                
                // click on the div element
                b.addEventListener("click", function(e) 
                {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    closeAllLists();
                });

                a.appendChild(b);
            }
        }
    });
    
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) 
    {
        if (e.keyCode == 13) { // enter key pressed
            e.preventDefault();
            if (currentFocus > -1) 
            {
                if (x) x[currentFocus].click(); // simulate click
            }
        }
    });
    
    /**
     * close all autocomplete lists in the document,
     * except the one passed as an argument:
    */
    function closeAllLists(elmnt) 
    {
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) 
        {
            if (elmnt != x[i] && elmnt != inp) 
            {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) 
    {
        closeAllLists(e.target);
    });
}

$(document).ready(() => 
{
    // search listener
    $('.search-icon').click(() => 
    {
        if($('#searchbar').val != '')
            getProductsbyName($('#searchbar').val())
    })

    $(document).on('keypress', (e) => 
    {
        if(e.which === 13) // enter key
            if($('#searchbar').val() != '')
                getProductsbyName($('#searchbar').val())
    })
})