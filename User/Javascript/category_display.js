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
      var body = document.getElementById('mainbody');
      body.innerHTML = ''
      if(this.readyState == 4 && this.status == 200)
      {
         let obj = JSON.parse(this.responseText);
         if (obj['Body'].length == 0)
         {
            body.innerHTML = `<img class='NotFound' src='Images/Not Found.jpg'>`
         }
         else
         {
            obj['Body'].forEach(element => {
                body.innerHTML += `
                <div class='card shadow p-3 mb-5 bg-white rounded' style='width: 15rem;'>
                    <img class='card-img-top'src="${element['Image']}">  
                    <div class='card-body'>
                        <h5 class='card-title'>&#8377;${element['Price']}/-</h5>
                        <p class='card-text'>${element['Name']} | ${element['Subcat']}</p>
                        <a href='item display.php?pid=${element['Id']}' class='btn btn-primary'>Explore Now</a>
                    </div>
                </div>`
            });
         }
      }
      else
      {
        body.innerHTML = `<img class='NotFound' src='Images/Not Found.jpg'>`
      }
   }
   http.send(); 
}

document.onload = fetchDetails();