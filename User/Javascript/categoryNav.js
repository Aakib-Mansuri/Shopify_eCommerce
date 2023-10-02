function fetchDetails(element,value)
{
   var http = new XMLHttpRequest();
   http.open("GET",`Services/get_categories.php?category=${value}`, true);
   http.onreadystatechange = function ()
   {
      if(this.readyState == 4 && this.status == 200)
      {
         let Subcat = JSON.parse(this.responseText);
         if (Subcat.length != 0)
         {
            let list = '';
            Subcat.forEach(element => {
                list += `<li><a href="category display.php?q=${element}">${element}</a></li>`
            }); 
            element.innerHTML += `<ul class="submenu">${list}</ul>`;
         }
      }
   }
   http.send(); 
}

function eventHandler()
{
    var category = document.getElementsByClassName('mainmenu');
    if(category != null)
    {
        Array.from(category).forEach(element => {
            fetchDetails(element,element.children[0].innerHTML);
        });    
    }
}

document.onload = eventHandler();