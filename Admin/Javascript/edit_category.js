function uploadCategories()
{
    var http = new XMLHttpRequest();
    http.open("GET",`Services/getunique_categories.php`, true);

    http.onreadystatechange = function ()
    {
        var elem = document.getElementById('itemcat');
        if(this.readyState == 4 && this.status == 200)
        {
            var array = JSON.parse(this.responseText);
            array.forEach(element => {
                elem.innerHTML += `
                <option class='option' value="${element}">
                    ${element}
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
    http.open("GET",`Services/get_categorybyid.php?id=${id}`, true);

    http.onreadystatechange = function ()
    {
       if(this.readyState == 4 && this.status == 200)
       {
           var reasponse = JSON.parse(this.responseText);
           document.getElementById('subcat').value = reasponse[0]['SubCat'];
           
           let option = document.getElementsByClassName('option');
           Array.from(option).forEach(elem => {
                if(elem.value == reasponse[0]['Name'])
                {
                    elem.selected = true;
                }
           });
       }
    }
    http.send(); 
}

document.onload = uploadCategories();