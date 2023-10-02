function fetchDetails()
{
   var http = new XMLHttpRequest();
   http.open("GET",`Services/get_orders.php`, true);
   let mainbody = document.getElementById('mainbody');
   http.onreadystatechange = function ()
   {
      if(this.readyState == 4 && this.status == 200 && this.responseText != false)
      {         
         let tablebody = "";
         let data = JSON.parse(this.responseText);

         data.forEach(element => {
            let orderOption = "-";
            let billStatus = "-";
            let products = "";

            if(element['BillStatus'] == 'Generated'){
               billStatus = `<a onclick="PrintInv('${element['DateTime']}',${element['OrderId']})" class="option-button">Print</a>`;
            }

            if(element['OrderStatus'] == 'Pending' || element['OrderStatus'] == 'In Transit'){
               orderOption = `
                  <a href="Services/update_order.php?id=${element['OrderId']}" class="option-button">
                     Cancel
                  </a>`;
            }

            count = 1;
            element['Products'].forEach(product => {
                  products += `
                     <tr>
                        <td width="5%">${count}</td>
                        <td>${product['Category']}</td>
                        <td class="cdetails">
                              <p style="margin-bottom:2px;">${product['ProductName']} | ${product['SubCategory']}</p>  
                              <p style="font-size:small;">${product['Description']}</p>
                        </td>
                        <td width="10%">${product['Quantity']}</td>
                        <td width="10%">&#8377;${product['Amount']}.00</td>
                     </tr>`;
                  count += 1;
            });

            tablebody += `
            <tr class="parent">
               <td width="10%">${element['DateTime']}</td>
               <td width="10%">&#8377;${element['Amount']}.00</td>
               <td width="10%">${billStatus}</td>
               <td width="10%">${element['OrderStatus']}</td>
               <td width="15%">${orderOption}</td>
            </tr>
            <tr class="child">
               <td colspan="5">
               <table>
                  <thead>
                     <tr>
                        <th>Sno</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Qunatity</th>
                        <th>Amount</th>
                     </tr>
                  </thead>
                  <tbody>${products}</tbody>
               </table>
               </td>
            </tr>`;
         });

         mainbody.innerHTML = `
         <div class="bodycontent cart-container">
            <h1>Orders History</h1>
            <table>
            <thead>
               <tr>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Bill</th>
                  <th>Status</th>
                  <th>Option</th>
               </tr>
            </thead>
            <tbody id="tablebody">
               ${tablebody}
            </tbody>
            </table>
         </div>`;
         eventhandler();
      }
      else{
         mainbody.innerHTML = `<img class='NotFound' src='Images/Not Found.jpg'>`;
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