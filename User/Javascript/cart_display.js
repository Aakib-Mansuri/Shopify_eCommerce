document.onload = fetchDetails();
var totalAmount=0;

function fetchDetails()
{
   var http = new XMLHttpRequest();
   http.open("GET","Services/get_cartdetails.php", true);

   http.onreadystatechange = function ()
   {
      var body = document.getElementById('mainbody');
      body.innerHTML = ''
      if(this.readyState == 4 && this.status == 200)
      {
         let obj = JSON.parse(this.responseText);
         if (obj['Body'].length == 0)
         {
            body.innerHTML = `<img class='Empty' src='Images/Empty Cart.jpg'>`
         }
         else
         {
            let item = '';
            obj['Body'].forEach(element => {
                item += `
                <tr>
                    <td><img src="${element['Image']}" class="product-image"></td>
                    <td>
                        <div class="des">
                            <h4 class="desh">${element['Name']} | ${element['Subcat']} </h4>
                            <p class="desp">${element['Des']}</p>
                        </div>
                    </td>
                    <td>&#8377;${element['Price']}.00</td>
                    <td>
                        <div class="qtytd">
                            <button class="minus" onclick="updateQty(${element['Id']},'minus',${element['AvailableQty']},${element['CartQty']},${element['Price']})">&minus;</button>
                            <p class="qtyp" id="${element['AvailableQty']}">${element['CartQty']}</p>
                            <button class="add" onclick="updateQty(${element['Id']},'add',${element['AvailableQty']},${element['CartQty']},${element['Price']})">&plus;</button>
                        </div>
                    </td>
                    <td id='amount'>&#8377;${element['Amount']}.00</td>
                    <td><button class="delete-button" onclick="updateQty(${element['Id']},'delete')"><i class="bi bi-trash"></i></button></td>
                </tr>`;
                totalAmount += Number(element['Amount'])
            });

            body.innerHTML =`
            <div class="cart-container">
            <h1>Shopping Cart</h1>
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    ${item}
                </tbody>
            </table>
            <div class="total-amount">
                <p>Total Amount:&nbsp;</p>
                <p class="amount" id="totalamount">&#8377;${totalAmount}.00</p>
            </div>
            <button class="proceed-button" onclick="checkout()">Proceed to Checkout</button>
        </div>`;
         }
      }
      else
      {
        body.innerHTML = `<img class='Empty' src='Images/Empty Cart.jpg'>`
      }
   }
   http.send(); 
}

function updateQty(Id,Action,AvailableQty=0,CartQty=0,Price=0) 
{
    if((Action=='minus' && CartQty<=1) || (Action=='add' && CartQty>=AvailableQty))
    {
        alert("Can't update cart");
    }
    
    else{
        if(confirm("Do you want to update cart"))
        {
            if(Action=='delete')
            {
                window.location = `Services/update_cart.php?Id=${Id}&Action=${Action}`;
            }
            else
            {
                window.location = `Services/update_cart.php?Id=${Id}&Action=${Action}&Price=${Price}`;
            }
        }
    }    
}

function checkout() 
{    
    let count = 1;
    let product = document.getElementsByClassName('qtyp');
    try {
        Array.from(product).forEach(element => {
                if(Number(element.innerHTML) > Number(element.id))
                {
                    throw BreakError;
                }
                count+=1;
        });
        
        if(confirm("Do you want to checkout cart")){
            window.location = `Services/checkout_cart.php?Amount=${totalAmount}`;
        }
    } 
    catch (err) {
        alert(`ordered quantity for product ${count} is'n available.!!`);
    }
}