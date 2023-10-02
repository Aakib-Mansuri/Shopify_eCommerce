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
    <title>Item-page</title>
    <link rel="stylesheet" href="../Utilities/Css/navbar.css">
    <link rel="stylesheet" href="../Utilities/Css/navbaradminconf.css">
    <link rel="stylesheet" href="Css/add_item.css">
    <link rel="stylesheet" href="../Utilities/Css/footer.css">
</head>
<body>
  <?php require('../Utilities/_navbar.php');?>
  
  <!-- body  -->
  <div class="body">
    <div class="bodycontent">
      <form action="Services/insert_productdetails.php" method="post" enctype="multipart/form-data">
            <h4>PRODUCT DETAILS</h4>
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
                      <label for="itemname">Name:</label>
                    </td>
                    <td>
                      <input type="text" name="itemname" id="itemname" placeholder="Enter product name" required>
                    </td>
                </tr>
              </div>
      
              <div class="itemdesc input">
                <tr>
                  <td>
                    <label for="itemdesc">Description:</label>
                  </td>
                  <td>
                    <input type="text" name="itemdesc" id="itemdesc" placeholder="Enter product description">
                  </td>
                </tr>
              </div>

              <div class="itemprice input">
                <tr>
                  <td>
                    <label for="itemprice">Price:</label>
                  </td>
                  <td>
                    <input type="text" name="itemprice" id="itemprice" placeholder="Enter tax paid price" required>
                  </td>
                </tr>
              </div>

              <div class="iteminv input">
                <tr>
                  <td>
                    <label for="iteminv">Inventory:</label>
                  </td>
                  <td>
                    <input type="text" name="iteminv" id="iteminv" placeholder="Enter available inventory" required>
                  </td>
                </tr>
              </div>

              <div class="itemfile">
                <tr>
                  <td>
                    <label for="itemfile">Image:</label>
                  </td>
                  <td>
                    <input type="file" id="itemfile" name="itemfile[]" multiple required>
                  </td>
                </tr>
              </div>
            </table>
            <div class="button">
                <input type="submit" id="submit" value="Add">
                <input type="reset" name="reset" id="reset">
            </div>
          </form>
    </div>
  </div>

  <?php require('../Utilities/_footer.php');?> 
</body>
<script src="../Utilities/Javascript/navbaradminconf.js"></script>
<script src="Javascript/add_item.js"></script>
</html>