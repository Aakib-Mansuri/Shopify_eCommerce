function fetchDetails()
{
   var http = new XMLHttpRequest();
   http.open("GET",`Services/get_productbyid.php?id=${id}`, true);
   http.onreadystatechange = function ()
   {
      var body = document.getElementById('mainbody');
      body.innerHTML = '';
      if(this.readyState == 4 && this.status == 200)
      {
         let obj = JSON.parse(this.responseText);
         if (obj['Body'].length == 0)
         {
            body.innerHTML = `<img class='NotFound' src='Images/Not Found.jpg'>`;
         }
         else
         {
            obj['Body'].forEach(element => {
                body.innerHTML += `<section class="py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="${element['Image']}"/></div>
                        <div class="col-md-6">
                            <div class="small mb-1">Category: ${element['Subcat']}</div>
                            <h1 class="display-5 fw-bolder">${element['Name']}</h1>
                            <div class="fs-5 mb-5">
                                <span>&#8377;${element['Price']}/-</span>
                            </div>
                            <p class="lead">${element['Des']}</p>
                            <div class="d-flex" id='cartopt'>
                                <form action="add_CartItem.php" method="post">
                                    <input type="hidden" name="Id" value="${id}">
                                    <input type="hidden" name="Price" value="${element['Price']}">
                                    <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1" style="max-width: 5rem" min='1' max='${element['Qty']}' name="Qty" required/>
                                    <div class="btn btn-outline-dark flex-shrink-0" id='addcart'>
                                        <i class="bi-cart-fill me-1"></i>
                                        <input type="submit" value="Add to cart" id="submit">
                                    </div>
                                </from>
                            </div>
                        </div>
                    </div>
                </div>
            </section>`;
            if (element['Status'] != 'Live')
            {
                let cartBox = document.getElementById('cartopt');
                cartBox.innerHTML =`<h4 style="color:#56887D">Out of Stock</h4>`;
            }
            });
            eventHandler();
         }
      }
      else
      {
        body.innerHTML = `<img class='NotFound' src='Images/Not Found.jpg'>`;
      }
   }
   http.send(); 
}

function eventHandler()
{
    var quantity = document.getElementById('inputQuantity');
    quantity.addEventListener('invalid', function (event) {
        if (event.target.validity) {
        event.target.setCustomValidity("This much quantity is'n available!!");
        }
    });
    
    quantity.addEventListener('change', function (event) {
    event.target.setCustomValidity('');
    });
}

document.onload = fetchDetails();