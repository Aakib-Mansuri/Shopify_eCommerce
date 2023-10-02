function fetchDetails()
{
   var http = new XMLHttpRequest();
   http.open("GET",`Services/get_categories.php`, true);
   http.onreadystatechange = function ()
   {
      if(this.readyState == 4 && this.status == 200)
      {
         var body = document.getElementById('tablebody');
         JSON.parse(this.responseText).forEach(element => {
            body.innerHTML += `
               <tr>
                  <td>${element['Id']}</td>
                  <td>${element['Name']}</td>
                  <td>${element['SubCategory']}</td>
                  <td><button class="btn editbtn" value='${element['Id']}'><i class="bi bi-pencil-fill" style="color:#494F55"></i></button></td>
               </tr>`;
         });
         eventhandler();
      }
   }
   http.send(); 
}

document.onload = fetchDetails()

function eventhandler () {
   let editbtn = document.getElementsByClassName('editbtn');
   Array.from(editbtn).forEach(element => {
         element.addEventListener('click',(e)=>{
            let id = e.target.parentNode.value;
            window.location = `edit category.php?id=${id}`;
         });
   });
}