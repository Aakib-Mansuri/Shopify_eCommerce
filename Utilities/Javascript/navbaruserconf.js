document.getElementById('navlogout').addEventListener('click',()=>{
  window.location = 'index.php?logout=true';
});

document.getElementById('navsearchsubmit').addEventListener('click',()=>{
  let search = document.getElementById('navsearch').value;
  window.location = `category display.php?q=${search}`;
});

document.getElementById('carta').addEventListener('click',()=>{
  window.location = `cart display.php`;
});

document.getElementById('navorderhist').addEventListener('click',()=>{
  window.location = `order display.php`;
});

let logo = document.getElementsByClassName('logoaddress');
Array.from(logo).forEach(element => {
      element.addEventListener('click',()=>{
         window.location = `index.php`;
      });
});

function getUserDetails(){
  var http = new XMLHttpRequest();
  http.open("GET",`../Utilities/_GetUserDetails.php`, true);
  http.onreadystatechange = function ()
  {
     var user = document.getElementById('navusername');
     var orderhist = document.getElementById('navorderhist');
     var logout = document.getElementById('navlogout')
     if(this.readyState == 4 && this.status == 200 && this.responseText)
     {
        user.innerHTML = `<h5>${this.responseText}</h5>`;
        orderhist.style = 'display:block';
        logout.style = 'display:block';
     }
     
     else
     {
        user.innerHTML = "<h5 id='navlogin'><a href='../Utilities/Login System/login page.php'>Login</a></h5>";
        orderhist.style = 'display:none';
        logout.style = 'display:none';
     }
  }
  http.send();    
}

document.onload = getUserDetails();