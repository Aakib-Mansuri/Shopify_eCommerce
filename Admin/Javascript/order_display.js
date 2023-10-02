function fetchDetails()
{
   var http = new XMLHttpRequest();
   http.open("GET",`Services/get_orders.php?q=${q}`, true);
   http.onreadystatechange = function ()
   {
      var body = document.getElementById('tablebody');
      body.innerHTML = "";
      if(this.readyState == 4 && this.status == 200 && this.responseText)
      {
         var data = JSON.parse(this.responseText);
         data.forEach(element => {
            let orderOption = "";
            let products = "";
            let billStatus = `<a href="Services/generate_invoice.php?q=${q}&id=${element['OrderId']}" class="option-button">Generate</a>`;

            if(element['BillStatus'] == 'Generated'){
               billStatus = `<a onclick="PrintInv('${element['DateTime']}',${element['OrderId']})" class="option-button">Print</a>`;
            }

            if(element['OrderStatus'] == 'Pending'){
               orderOption = `
                  <a href="Services/update_order.php?q=${q}&id=${element['OrderId']}&status=Transit" class="option-button">
                     Transit
                  </a>
                  <a href="Services/update_order.php?q=${q}&id=${element['OrderId']}&status=Cancelled" class="option-button">
                     Cancel
                  </a>`;
            }

            else if(element['OrderStatus'] == 'In Transit'){
               orderOption = `<a href="Services/update_order.php?q=${q}&id=${element['OrderId']}&status=Delivered" class="option-button">
                  Deliver
               </a>`;
            }

            else{
               orderOption = `-`;
            }

            element['Products'].forEach(product => {
                  products += `
                     <tr>
                        <td>${product['Category']}</td>
                        <td width="10%">${product['ProductId']}</td>
                        <td colspan="3" class="cdetails">
                              <p>${product['ProductName']} | ${product['SubCategory']}</p>  
                              <p style="font-size:small;">${product['Description']}</p>
                        </td>
                        <td width="10%">${product['Quantity']}</td>
                        <td width="10%">&#8377;${product['Amount']}.00</td>
                     </tr>`;
            });

            body.innerHTML += `
            <tr class="parent">
               <td width="5%">${element['OrderId']}</td>
               <td width="10%">${element['DateTime']}</td>
               <td class='cdetails'>
                  <p>${element['UserName']} | ${element['UserCno']}</p>  
                  <p style="font-size:small;">${element['UserAdd']}</p>  
               </td>
               <td width="10%">&#8377;${element['Amount']}.00</td>
               <td width="10%">${billStatus}</td>
               <td width="10%">${element['OrderStatus']}</td>
               <td width="15%">${orderOption}</td>
            </tr>
            <tr class="child">
               <td colspan="7">
               <table>
                  <thead>
                     <tr>
                     <th>Category</th>
                     <th>Id</th>
                     <th colspan="3">Details</th>
                     <th>Qunatity</th>
                     <th>Amount</th>
                     </tr>
                  </thead>
                  <tbody>${products}</tbody>
               </table>
               </td>
            </tr>`;
         });
         eventhandler();
      }
      else{
         body.innerHTML = `<td colspan="7">Not available</td>`;
      }
   }
   http.send(); 
}

function eventhandler () {
   let parentRows = document.querySelectorAll(".parent");
   parentRows.forEach((row) => {
         row.addEventListener("click", () => {
            let sibling1 = row.nextElementSibling;
            sibling1.classList.toggle("show");
         });
   });
}

function PrintInv(inputDate,id){
   const date = new Date(inputDate);
   console.log(inputDate);   
   const monthNames = [
      'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
   ];
   
   const month = monthNames[date.getMonth()];
   const day = date.getDate();
   const year = date.getFullYear();
   
   function getDayWithSuffix(day) {
      if (day >= 11 && day <= 13) {
         return day + 'th';
      }
      switch (day % 10) {
         case 1:
         return day + 'st';
         case 2:
         return day + 'nd';
         case 3:
         return day + 'rd';
         default:
         return day + 'th';
      }
   }
   
   let formattedDate = '';
   if (day < 10){
      formattedDate = `${month} 0${getDayWithSuffix(day)} ${year}`;     
   }
   else{
      formattedDate = `${month} ${getDayWithSuffix(day)} ${year}`;     
   }
   window.open("http://localhost/Shopify%20eCommerce/Invoices/"+formattedDate+"/"+id+".pdf", "_blank");
}

document.onload = fetchDetails();
document.getElementById(q+'-btn').classList.toggle("active");
