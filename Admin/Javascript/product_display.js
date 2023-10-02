function fetchDetails()
{
   var http = new XMLHttpRequest();
   let head;
   if(q == 'all')
   {
      head = `Services/get_products.php?q=all&value=${q}`;
   }
   else
   {
      head = `Services/get_products.php?q=search&value=${q}`;
   }

   http.open("GET",head, true);
   http.onreadystatechange = function ()
   {
      if(this.readyState == 4 && this.status == 200)
      {
         var header = document.getElementById('tableheader');
         var body = document.getElementById('tablebody');
         var obj = JSON.parse(this.responseText);

         header.innerHTML = obj['Head'];
         obj['Body'].forEach(element => {
            body.innerHTML += `
               <tr class="parent">
                  <td width='10%'>${element['Id']}</td>
                  <td width='auto'>${element['Name']}</td>
                  <td width='15%'>${element['Price']}</td>
                  <td width='10%'>${element['Qty']}</td>
                  <td width='10%'>${element['Status']}</td>
               </tr>
               <tr class="child">
                  <td colspan="5">
                     <table style="margin:0;">
                        <thead>
                           <tr>
                              <th width='15%'>Category</th>
                              <th>Description</th>
                              <th width='15%'>Sub Category</th>
                              <th width='10%' colspan="2">Options</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td width='15%'>${element['Category']}</td>
                              <td style="text-align:left">${element['Des']}</td>
                              <td width='15%'>${element['Subcat']}</td>
                              <td width='10%' colspan="2">
                                 <button class="btn editbtn" onclick="editProduct(${element['Id']})">
                                    <i class="bi bi-pencil-fill" style="color:#494F55;margin-right:20px"></i>
                                 </button>
                                 <button class="btn deletebtn" onclick="deleteProduct(${element['Id']})">
                                    <i class="bi bi-trash" style="color:#494F55"></i>
                                 </button>
                              </td>
                           </tr>
                        </tbody>
                  </table>
                  </td>
               </tr>`;
         });
         eventhandler();
      }
   }
   http.send(); 
}

document.onload = fetchDetails()

function eventhandler () {
   let parentRows = document.querySelectorAll(".parent");
   parentRows.forEach((row) => {
         row.addEventListener("click", () => {
            let sibling1 = row.nextElementSibling;
            let sibling2 = sibling1.nextElementSibling;
            sibling1.classList.toggle("show");
            sibling2.classList.toggle("show");
         });
   });
}

function editProduct(id){
   window.location = `edit product.php?q=${q}&id=${id}`;
}

function deleteProduct(id){
   window.location = `Services/remove_product.php?q=${q}&id=${id}`;
}