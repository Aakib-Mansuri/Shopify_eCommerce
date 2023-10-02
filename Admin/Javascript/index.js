function fetchDetails()
{  
    setUser();
    setCategory();
    setOrder();
    setProduct();
}

function setUser()
{
    var http = new XMLHttpRequest();
    http.open("GET",`Services/get_users.php`, true);
    http.onreadystatechange = function ()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            document.getElementById('usercard').innerHTML = JSON.parse(this.responseText).length;
        }
    }
    http.send();  
}

function setCategory()
{
    var http = new XMLHttpRequest();
    http.open("GET",`Services/get_categories.php`, true);
    http.onreadystatechange = function ()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            document.getElementById('categorycard').innerHTML = JSON.parse(this.responseText).length;
        }
    }
    http.send(); 
}

function setProduct()
{
    var http = new XMLHttpRequest();
    http.open("GET",`Services/get_products.php?q=all&value=all`, true);
    http.onreadystatechange = function ()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            document.getElementById('productcard').innerHTML = JSON.parse(this.responseText)['Body'].length;
        }
    }
    http.send(); 

}

function setOrder()
{
    var http = new XMLHttpRequest();
    http.open("GET",`Services/get_orders.php?q=Pending`, true);
    http.onreadystatechange = function ()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            document.getElementById('ordercard').innerHTML = JSON.parse(this.responseText).length;
        }
    }
    http.send(); 
}

document.onload = fetchDetails();