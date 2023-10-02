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
                <option value="${element}">
                    ${element}
                </option>`;
            });
        }
    }
    http.send();    
}

document.onload = uploadCategories();