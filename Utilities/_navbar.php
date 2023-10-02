<?php
  echo 
  "<!-- navigation bar -->
  <nav>
      <!-- logo -->
      <div class='navcontainer'>
          <div id='navleft'>
              <a class='logoaddress' >
                  <img src='../Utilities/../Utilities/Images/Logo.png' alt='image' width='80px'>
              </a>
          </div>

          <!-- search bar -->
          <div id='navmiddle'>
              <div class='search'>
                  <div id='navsearchform'>
                      <input type='text' id='navsearch' placeholder='Search Shopify.in'>
                      <button type='submit' id='navsearchsubmit'><img src='../Utilities/Images/Nav Search Logo.png' alt='Search' height='25px'></button>
                  </div>
              </div>
          </div>

          <!-- other details -->
          <div id='navright'>
              <div id='home'>
                  <a class='logoaddress'>
                      <img src='../Utilities/Images/Nav Home Logo.png' alt='image' height='25px' style='display: block;margin-left: 5px;'>
                      <p id='navp'>HOME</p>
                  </a>
              </div>                

              <div id='account'>
                  <a href='#'>
                   <img src='../Utilities/Images/Nav Account Logo.png' alt='image' height='25px' style='display: block; margin-left: 20px;'>
                   <p id='navp'>ACCOUNT</p>
                   <div id='list'>
                      <ul>
                          <li id='navusername'></li>
                          <li id='navorderhist'>Orders History</li>
                          <li id='navlogout'>Log-out</li>
                      </ul>  
                    </div>
                  </a>
              </div>
              
              <div id='cart'>
                  <a id='carta'>
                   <img src='../Utilities/Images/Nav Cart Logo.png' alt='image' height='25px' style='display: block;margin-left: 6px;'>
                   <p id='navp'>CART</p>
                  </a>
              </div>
          </div>
      </div>
  </nav>
  ";
?>