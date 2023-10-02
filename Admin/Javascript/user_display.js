function fetchDetails()
{
   var http = new XMLHttpRequest();
   http.open("GET",`Services/get_users.php`, true);
   http.onreadystatechange = function()
   {
      if(this.readyState == 4 && this.status == 200)
      {
         var body = document.getElementById('tablebody');
         JSON.parse(this.responseText).forEach((element,index) => {
            body.innerHTML += `
               <tr>
                  <td width="5%">${index+1}</td>
                  <td width="20%">${element['Name']}</td>
                  <td width="10%">${element['Cno']}</td>
                  <td width="15%">${element['Mail']}</td>
                  <td width="40%">${element['Add']}</td>
                  <td width="10%"><a class="delete-button" href="Services/remove_user.php?id=${element['Id']}">
                     <i class="bi bi-trash"></i>
                  </a></td>
               </tr>`;
         });
      }
   }
   http.send(); 
}
document.onload = fetchDetails();