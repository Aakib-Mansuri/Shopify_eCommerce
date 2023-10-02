function uploadCategories()
{
    var http = new XMLHttpRequest();
    http.open("GET",`Services/get_categories.php`, true);

    http.onreadystatechange = function ()
    {
        var elem = document.getElementById('itemcat');
        if(this.readyState == 4 && this.status == 200)
        {
            var array = JSON.parse(this.responseText);
            array.forEach(element => {
                elem.innerHTML += `
                <option id = "${element['Id']}" value="${element['Id']}">
                    ${element['Name']} - ${element['SubCategory']}
                </option>`;
            });
        }
        fetchDetails();
    }
    http.send();    
}

function fetchDetails()
{
    var http = new XMLHttpRequest();
    http.open("GET",`Services/get_products.php?q=id&value=${q}`, true);

    http.onreadystatechange = function ()
    {
       if(this.readyState == 4 && this.status == 200)
       {
          var obj = JSON.parse(this.responseText);
          obj['Body'].forEach(element => {
                document.getElementById(`${element['CatId']}`).selected = true;
                document.getElementById('itemname').value = element['Name'];
                document.getElementById('itemdesc').value = element['Des'];
                document.getElementById('itemprice').value = element['Price'];
                document.getElementById('iteminv').value = element['Qty'];  
            });
       }
    }
    http.send(); 
}

document.onload = uploadCategories();