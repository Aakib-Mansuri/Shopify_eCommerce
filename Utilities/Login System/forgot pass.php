<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password-page</title>
    <link rel="stylesheet" href="Css/forgot_pass.css">
    <script src="Javascript/forgot-pass_validation_script.js"></script>
</head>
<body>
  <!-- Logo   -->
  <div class="logo">
       <a href="../../User/index.php">
           <img src="Images/Logo.png" alt="image">
      </a>
  </div>

  <!-- Reset password -->
  <div class="body">
    <div class="middle">
        <div class="formheader">
           <h1>Reset Password</h1>
        </div>
        <div class="formbody">
         <form action="Services/forgot-pass_insertdetails.php" method="post" class="adminloginform" onsubmit="return checkform()">
            <?php
              if(!isset($_GET['Username']))
              {
                 echo "<div class='Username'>
                         <label for='Username'>Username</label><br>
                         <input type='text' name='Username' id='Username' placeholder='username' required onblur='validate(`Username`, this.value)'>
                       </div>";
              }

              else 
              {
                $Username = $_GET['Username'];
                echo "<input type='hidden' name='Username' value='$Username'>
                      <div class='Password'>
                            <label for='Password'>Password </label><br>
                            <input type='text' name='Password' id='Password' placeholder='Enter your password' required onblur='validate(`Password`, this.value)'>
                      </div>
                      <div class='RePassword'>
                            <label for='RePassword'>Re-type Password </label><br>
                            <input type='Password' name='RePassword' id='RePassword' placeholder='Re-Enter your password' required onblur='validate(`RePassword`, this.value)'>
                      </div>";  
              }
            ?>
            <p id="error"></p>
            <div>
                <input type='submit' id='submit' value='Submit'>
            </div>
         </form>
        </div>
        <div class="formfooter">
          <p>Already a User ?</p>
          <h4><a href='login page.php'>Login</a></h4>
        </div>
    </div>
  </div>
</body>

<!-- <?php
 //form submition
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    // if(!isset($_POST['Password']))
    // {
    //     $Username = $_POST['Username'];
    //     header("location: /forgot pass.php?Username=$Username");
    // }
    
    if(isset($_POST['Password']))
    {
        $Username = $_POST['Username'];
        $Password = password_hash($_POST['Password'],PASSWORD_DEFAULT);
        $query = "update logindetails set Password = '$Password' where UserName like '$Username'";

        if(mysqli_query($user,$query))
        {
            header("location: login page.php");
        }

        else 
        {
            header("location: forgot pass.php");
        }
    }
  }
?> -->
</html>