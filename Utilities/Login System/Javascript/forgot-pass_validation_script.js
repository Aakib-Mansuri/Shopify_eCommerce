function isValid()
{
    var elem = document.getElementById("error");
    if(elem.innerHTML != 'valid')
    {
        return false;
    }
    return true;
}

function checkform()
{
    if(!isValid())
    {
        alert("Enter Valid Information");
        return false;
    }
    return true;
}


function validate(field, query) 
{
    var elem = document.getElementById('error');
    if(field != 'RePassword')
    {
        var http;
        http = new XMLHttpRequest();
        http.onreadystatechange = function ()
        {
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
        http.open("GET",`../Login System/Services/forgot-pass_validation.php?field=${field}&query=${query}`, true);
        http.send();
    }
    else
    {
        if(document.getElementById("Password").value != document.getElementById("RePassword").value)
        {
            elem.style = 'visibility:visible; color:red';
            elem.innerHTML = "*Password doesn't matched";
        }    
        else
        {
            elem.style = 'visibility:hidden';
            elem.innerHTML = 'valid';
        }   
    }    
}