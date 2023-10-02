<?php
  require('../Utilities/_LoginAccess.php');
  require('../Utilities/_AdminLoginAccess.php');
  require('../Utilities/_LogoutFunctionality.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pruduct-page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Utilities/Css/navbar.css">
    <link rel="stylesheet" href="../Utilities/Css/navbaradminconf.css">
    <link rel="stylesheet" href="Css/product_display.css">
    <link rel="stylesheet" href="../Utilities/Css/footer.css">
</head>
<body>
  <?php require('../Utilities/_navbar.php');?>
  <!-- body  -->
  <div class="body">
    <div class="bodycontent">
      <!-- Print items -->
      <h4 id="tableheader">Search result for..</h4>
      <table>
        <thead>
          <tr>
            <th>Product Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody id="tablebody">
        </tbody>
      </table>
    </div>
  </div>
  <?php require('../Utilities/_footer.php');?>
</body>
<script src="../Utilities/Javascript/navbaradminconf.js"></script>
<?php
  echo "<script>
        let q = '".$_GET['q']."';
      </script>";
?>
<script src="Javascript/product_display.js"></script>
</html>