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
    <title>Edit-category</title>
    <link rel="stylesheet" href="../Utilities/Css/navbar.css">
    <link rel="stylesheet" href="../Utilities/Css/navbaradminconf.css">
    <link rel="stylesheet" href="Css/edit_category.css">
    <link rel="stylesheet" href="../Utilities/Css/footer.css">

</head>
<body>
  <?php require('../Utilities/_navbar.php');?>
  <!-- body  -->
  <div class="body">
    <div class="bodycontent">
      <form action="Services/update_categorydetails.php?id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data">
        <h4>UPDATE CATEGORY DETAILS</h4>
        <table>
          <div class="itemcat input">
            <tr>
              <td>
                <label for="itemcat">Category:</label>
              </td>
              <td>
                <select name="itemcat" id="itemcat" required>
                    <option>Select Category</option>
                </select>
              </td>
            </tr>
          </div>
          
          <div class="itemname input">
            <tr>
                <td>
                  <label for="subcat">Sub-Category:</label>
                </td>
                <td>
                  <input type="text" name="subcat" id="subcat" required>
                </td>
            </tr>
          </div>  
        </table>
        <div class="button">
            <input type="submit" id="submit" value="Update">
            <input type="reset" name="reset" id="reset">
        </div>
      </form>
    </div>
  </div>
  <?php require('../Utilities/_footer.php');?>
</body>
<script src="../Utilities/Javascript/navbaradminconf.js"></script>
<?php
  echo "<script>
        let id = '".$_GET['id']."';
      </script>";
?>
<script src="Javascript/edit_category.js"></script>
</html>