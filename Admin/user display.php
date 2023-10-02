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
    <title>Users-page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Utilities/Css/navbar.css">
    <link rel="stylesheet" href="../Utilities/Css/navbaradminconf.css">
    <link rel="stylesheet" href="Css/user_display.css">
    <link rel="stylesheet" href="../Utilities/Css/footer.css">
</head>
<body>
  <?php require('../Utilities/_navbar.php');?>
  <!-- body  -->
  <div class="body">
    <div class="bodycontent">
      <!-- Print items -->
      <h4 id="tableheader">User List</h4>
      <table>
        <thead>
          <tr>
            <th>Sno.</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Address</th>
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
<script src="Javascript/user_display.js"></script>
</html>