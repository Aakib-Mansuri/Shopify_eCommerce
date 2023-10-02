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
    <title>Order-page</title>
    <link rel="stylesheet" href="../Utilities/Css/navbar.css">
    <link rel="stylesheet" href="../Utilities/Css/navbaradminconf.css">
    <link rel="stylesheet" href="Css/order_display.css">
    <link rel="stylesheet" href="../Utilities/Css/footer.css">
    <style>
    </style>
</head>
<body>
  <?php require('../Utilities/_navbar.php');?>
  <!-- body  -->
  <div class="body">
    <div class="bodycontent">
      <!-- Print order -->
      <div class="status-filter">
        <span>Filter by Status:&nbsp;</span>
        <a href="order display.php?q=all" id="all-btn" class="">All</a>
        <a href="order display.php?q=pending" id="pending-btn" class="">Pending</a>
        <a href="order display.php?q=transit" id="transit-btn" class="">In Transit</a>
        <a href="order display.php?q=delivered" id="delivered-btn" class="">Delivered</a>
        <a href="order display.php?q=cancelled" id="cancelled-btn" class="">Cancelled</a>
      </div>
      <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Customer Details</th>
            <th>Amount</th>
            <th>Bill</th>
            <th>Status</th>
            <th>Option</th>
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
<script src="Javascript/order_display.js"></script>
</html>