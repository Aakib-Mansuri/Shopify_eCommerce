<?php
  require('../Utilities/_LogoutFunctionality.php');
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Item-Categories</title>
  <link rel="stylesheet" href="../Bootstrap/Css/bootstrap.min.css">
  <link rel="stylesheet" href="../Utilities/Css/navbar.css">
  <link rel="stylesheet" href="Css/categoryNav.css">
  <link rel="stylesheet" href="Css/category_display.css">
  <link rel="stylesheet" href="../Utilities/Css/footer.css">
  <style>

  </style>
</head>
<body>
  <?php require('../Utilities/_navbar.php');?>
  <?php require('Services/categoryNav.php');?>
  <!-- body  -->
  <div class="body">
    <div class="bodycontent" Id="mainbody">
      
    </div>
  </div>
  <?php require('../Utilities/_footer.php');?>
</body>
<script src="../Bootstrap/Js/bootstrap.min.js"></script>
<script src="../Utilities/Javascript/navbaruserconf.js"></script>
<?php
  echo '<script>
  let q = "'.$_GET['q'].'";
  </script>';
?>
<script src="Javascript/category_display.js"></script>
<script src="Javascript/categoryNav.js"></script>
</html>