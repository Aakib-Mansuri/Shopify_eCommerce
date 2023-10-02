<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-page</title>
    <link rel="stylesheet" href="Css/login_page.css">
    <script src="Javascript/login_validation_script.js"></script>
    <?php require('../_ConnectDatabase.php');?>
</head>
<body>
  <!-- Logo   -->
  <div class="logo">
       <a href="../../User/index.php">
           <img src="Images/Logo.png" alt="image">
      </a>
  </div>

  <!-- Login -->
  <div class="body">
    <div class="middle">
        <div class="formheader">
           <h1>Login</h1>
        </div>
        <div class="formbody">
         <form action="login page.php" method="post" class="adminloginform" onsubmit="return validate()">
            <div class="Username">
                <label for="Username">Username</label><br>
                <input type="text" name="Username" id="Username" placeholder="Enter Username" required onblur="checkaccess('Username')">
                <p id="error"></p>
            </div>
            <div class="Password">
                <label for="Password">Password</label><br>
                <input type="Password" name="Password" id="Password" placeholder="Enter your password" required onblur="checkaccess('Password')">
                <p id='error'></p>
            </div>
            <p id="error"></p>
            <div class='remember'>
                <input type='checkbox' name='Remember' id='Remember' value="true">
                <label for='Remember'>Remember Me</label>
            </div>
            <div>
                <input type='submit' id='submit' value='LOG IN'>
            </div>
         </form>
        </div>
        <div class="formfooter">
            <div class="forgot">
                <p>Forgot&nbsp;</p>
                <h4><a href='forgot pass.php'>Password</a></h4>
                <p>?</p>
            </div>
            <div class="signup">
                <p>Don't have an account?&nbsp;</p>
                <h4><a href='Sign-up.php'>Sign up</a></h4>
            </div>
        </div>
    </div>
  </div>
</body>
<?php
 //form submition
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    $header = "location: ../../User/index.php";
    $Username = $_POST['Username'];
    
    // fetch login details
    $query = "select * from logindetails where UserName like '$Username'";
    $query = mysqli_query($user,$query);
    $data = mysqli_fetch_assoc($query);
    $id = $data['UserId'];

    if($data['UserType'] == 0)
    {
        $header = "location: ../../Admin/index.php";
    }
    
    // fetch user details
    $query = mysqli_query($user,"select * from userdetails where UserId = $id");
    $name = mysqli_fetch_assoc($query)['Name'];

    //start session
    if(!isset($_SESSION))
    {
      session_start();
    }
    $_SESSION['Name'] = $name;
    $_SESSION['Id'] = $id;

    //setcookies
    if(isset($_POST['Remember']))
    {
        setcookie("Name",$name,time()+84600,'/');
        setcookie("Id",$id,time()+86400,'/');
    }
    header($header);
}
?>
</html>