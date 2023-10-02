<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link rel="stylesheet" href="Css/login_page.css">
    <link rel="stylesheet" href="Css/sign-up_page.css">
    <script src="Javascript/sign-up_validation_script.js"></script>
</head>
<body>
  <!-- Logo   -->
  <div class="logo">
       <a href="../../User/index.php">
           <img src="Images/Logo.png" alt="image">
      </a>
  </div>

  <!-- Sign-up -->
  <div class="body">
    <div class="middle">
        <div class="formheader">
           <h1>Sign up</h1>
        </div>
        <div class="formbody">
         <form action="Services/sign-up_insertdetails.php" id="myform" method="post" class="adminloginform" onsubmit="return checkform()">
            <div class="Name input">
                <input type="text" name="Name" id="Name" placeholder="Full name" required onblur="validate('Name', this.value)">
                <p id="NameError" class='error' style="visibility:hidden"></p>
            </div>
            <div class="ContactNumber input">
                <input type="text" name="ContactNumber" id="ContactNumber" placeholder="Mobile number" required onblur="validate('ContactNumber', this.value)">
                <p id="ContactNumberError" class='error' style="visibility:hidden"></p>
            </div>  
            <div class="Email input">
                <input type="text" name="Email" id="Email" placeholder="Email id" required onblur="validate('Email', this.value)">
                <p id="EmailError" class='error' style="visibility:hidden"></p>
            </div>  
            <div class="address input">
                <input type="text" name="Add" id="Add" placeholder="Enter your address" required onblur="validate('Add', this.value)">
                <p id="AddError" class='error' style="visibility:hidden"></p>
            </div>
            <div class="Username input">
                <input type="text" name="Username" id="Username" placeholder="Username" required onblur="validate('Username', this.value)" onblur="validate('Username', this.value)">
                <p id='UsernameError' class='error'>username must be 5-20 characters long and contain lower case, number or special symbol</p>
            </div>
            <div class="Password input">
                <input type="Password" name="Password" id="Password" placeholder="Password" required onblur="validate('Password', this.value)">
                <p id='PasswordError' class='error'>password must be 8-16 characters long and contain number, lower case, upper case and special symbol</p>
            </div>
            <div class="input">
                <input type="submit" id="submit" value="SIGN UP">
            </div> 
         </form>
        </div>
        <div class="formfooter">
           <p>Have an account?</p>
            <h4><a href='login page.php'>Log in</a></h4>
        </div>
    </div>
  </div>
</body>
</html>