function isValid()
{
    var name = document.getElementById("NameError");
    var contact = document.getElementById("ContactNumberError");
    var email = document.getElementById("EmailError");
    var add = document.getElementById("AddError");
    var username = document.getElementById("UsernameError");
    var password = document.getElementById("PasswordError");

    if(name.innerHTML != 'valid' || contact.innerHTML != 'valid' || email.innerHTML != 'valid' || add.innerHTML != 'valid' || username.innerHTML != 'valid' || password.innerHTML != 'valid')
    {
        return false;
    }
    else
    {
        return true;
    }
}

function checkform()
{
    if(!isValid())
    {
        alert("Enter Valid Information");
        return false;
    }
    else
    {
        return true;
    }
}

function validate(field, query) 
{
    var http;
    http = new XMLHttpRequest();
    http.onreadystatechange = function ()
    {
        var elem = document.getElementById(field+'Error')
        if (this.responseText)
        {
            elem.style = 'visibility:visible; color:red';
            if(this.readyState == 4 && this.status == 200)
            {
                elem.innerHTML = this.responseText;
            }
            
            else
            {
                elem.innerHTML = "Something went wrog try again.";
            }
        }
        
        else
        {
            elem.style = 'visibility:hidden';
            elem.innerHTML = 'valid';
        }
    }
    http.open("GET",`../Login System/Services/sign-up_validation.php?field=${field}&query=${query}`, true);
    http.send();    
}