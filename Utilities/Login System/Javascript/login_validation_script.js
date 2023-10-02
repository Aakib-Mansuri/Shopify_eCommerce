function checkaccess(inputElement) 
{
   let Username = document.getElementById('Username').value;
   let inputValue = document.getElementById(inputElement).value;
   let para = document.getElementsByClassName(inputElement)[0].children[3];

   let http = new XMLHttpRequest();
   http.open('POST',`../Login System/Services/login_validation.php?Username=${Username}&inputElement=${inputElement}&inputValue=${inputValue}`,true);    

   http.onload = function ()
   {
      if(this.status == 200)
      {
         para.innerHTML = this.responseText;
      }
      
      else
      {
         para.innerHTML = '*technical error';
      }
   }
   http.send();
}


function validate() 
{
   let passpara = document.getElementsByClassName('Password')[0].children[3];
   let userpara = document.getElementsByClassName('Username')[0].children[3];
   if(userpara.innerHTML == '' && passpara.innerHTML == '')
   {
      return true;
   }

   else
   {
      return false;
   }
}