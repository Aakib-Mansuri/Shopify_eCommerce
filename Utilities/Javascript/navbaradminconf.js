document.getElementById('navlogout').addEventListener('click',()=>{
   window.location = '../Admin/index.php?logout=true';
});

document.getElementById('navsearchsubmit').addEventListener('click',()=>{
  let search = document.getElementById('navsearch').value;
  window.location = `product display.php?q=${search}`;
});

let logo = document.getElementsByClassName('logoaddress');
Array.from(logo).forEach(element => {
      element.addEventListener('click',()=>{
         window.location = `../Admin/index.php`;
      });
});


function getUserDetails(){
   var http = new XMLHttpRequest();
   http.open("GET",`../Utilities/_GetUserDetails.php`, true);
   http.onreadystatechange = function ()
   {
      var elem = document.getElementById('navusername');
      if(this.readyState == 4 && this.status == 200 && this.responseText)
      {
         elem.innerHTML = `<h4>${this.responseText}</h4>`;
      }
      
      else
      {
         elem.innerHTML = '<h4>User</h4>';
      }
   }
   http.send();    
}

document.onload = getUserDetails();