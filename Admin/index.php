<?php
  require('../Utilities/_LoginAccess.php');
  require('../Utilities/_AdminLoginAccess.php');
  require('../Utilities/_LogoutFunctionality.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home-page</title>
   <link rel="stylesheet" href="../Utilities/Css/navbar.css">
   <link rel="stylesheet" href="../Utilities/Css/navbaradminconf.css">
   <link rel="stylesheet" href="Css/index.css">
   <link rel="stylesheet" href="../Utilities/Css/footer.css">

</head>
<body>
   <?php require('../Utilities/_navbar.php');?>
   <!-- body  -->
   <div class="body">
      <div class="bodycontent">
         <!-- Users -->
         <a href="user display.php">
            <div class="boxes box1">
               <div class="boximg">
                  <img src="Images/Dash User.png" alt="image">
               </div>
               <div class="boxetext">
                  <h4 id="usercard">0</h4>
                  <p>Users</p>
               </div>
            </div>
         </a>
         
         <!-- Orders -->
         <a href="order display.php?q=all">
            <div class="boxes box2">
               <div class="boximg">
                  <img src="Images/Dash Order.png" alt="image">
               </div>
               <div class="boxetext">
                  <h4 id="ordercard">0</h4>
                  <p>Orders</p>
               </div>
            </div>
         </a>

         <!-- Category -->
         <a href="category display.php">
            <div class="boxes box3">
               <div class="boximg">
                  <img src="Images/Dash Category.png" alt="image">
               </div>
               <div class="boxetext">
                  <h4 id="categorycard">0</h4>
                  <p>Categories</p>
               </div>
            </div>
         </a>

         <!-- Products -->
         <a href="product display.php?q=all">
            <div class="boxes box4">
               <div class="boximg">
                  <img src="Images/Dash Item.png" alt="image">
               </div>
               <div class="boxetext">
                  <h4 id="productcard">0</h4>
                  <p>Products</p>
               </div>
            </div>
         </a>

         <!-- Add Category -->
         <a href="add category.php">
            <div class="boxes box5">
               <div class="boximg">
                  <img src="Images/Dash Add Category.png" alt="image">
               </div>
               <div class="boxetext">
                  <h4>Add Category</h4>
               </div>
            </div>
         </a>

         <!-- Add Products -->
         <a href="add item.php">
            <div class="boxes box6">
               <div class="boximg">
                  <img src="Images/Dash Add Item.png" alt="image">
               </div>
               <div class="boxetext">
                  <h4>Add Product</h4>
               </div>
            </div>
         </a>
      </div>
   </div> 
   <?php require('../Utilities/_footer.php');?>
</body>
<script src="../Utilities/Javascript/navbaradminconf.js"></script>
<script src="Javascript/index.js"></script>
</html>