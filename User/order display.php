<?php
  require('../Utilities/_LoginAccess.php');
  require('../Utilities/_LogoutFunctionality.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orders-History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Bootstrap/Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Utilities/Css/navbar.css">
    <link rel="stylesheet" href="Css/order_display.css">
    <link rel="stylesheet" href="../Utilities/Css/footer.css">
    <style>
    </style>
</head>
<body>
  <?php require('../Utilities/_navbar.php');?>
  <!-- body  -->
  <div class="body" id="mainbody">
  </div>
  <?php require('../Utilities/_footer.php');?>
</body>
<script src="../Bootstrap/Js/bootstrap.min.js"></script>
<script src="../Utilities/Javascript/navbaruserconf.js"></script>
<script src="Javascript/order_display.js"></script>
</html>