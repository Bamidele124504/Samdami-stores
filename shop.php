<?php
session_start();
$sever='localhost';
$username='root';
$password='';
$database='samdami_stores';

$con=mysqli_connect($sever,$username,$password,$database);

if(isset($_POST['signup'])){
    $username=$_POST['username'];
    $pass_word=$_POST['pass_word'];
    $confirmpass_word=$_POST['confirmpass_word'];

    $duplicate=mysqli_query($con,"SELECT * FROM samdami_table WHERE  username='$username' OR pass_word='$pass_word'");
    if(mysqli_num_rows($duplicate)>0){
        echo
        " <script> alert('username or password is already taken')</script>";
    }
    else{
        if($pass_word==$confirmpass_word){
            $query="INSERT INTO samdami_table  VALUES('','$username','$pass_word','$confirmpass_word')";
            mysqli_query($con,$query);
            echo
        " <script> alert('signup succesful')</script>";
        }
        else{
            echo
        " <script> alert('password does not match')</script>";
        }
    }
}
$product_qry="SELECT * FROM producttb1";
$select1=mysqli_query($con,$product_qry);
$select2=mysqli_query($con,$product_qry);
$select3=mysqli_query($con,$product_qry);
$select4=mysqli_query($con,$product_qry);
$select5=mysqli_query($con,$product_qry);
$select6=mysqli_query($con,$product_qry);
$select7=mysqli_query($con,$product_qry);
$select8=mysqli_query($con,$product_qry);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMDAMI ONLINE SUPERMARKET</title>
    <link rel="stylesheet" href="shop.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
<!-- nav-section -->
   <div class="container-fluid row pt-1 justify-content-center align-items-center" > 
      <header class="col-2">
          <p><span style="color:#dc3545;">S</span>AMDAMI</p>
      </header> 
      <div class="col-5">
           <input class="searchbar" type="text" placeholder="search..." style="padding-left: 20px;" >
           <button class='btn btn-danger'>Search</button>
           </div>
    <nav class="col-4 navbar">
       <?php
        if(isset($_SESSION['username'])){
          echo "welcome:";
          print $_SESSION['username'];
        }
        ?>
         <a href="shop.php">HOME </a>
<!-- login popover -->
      <div class="pop_over">
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#popover" >
          Account
        </button>
          <div class="modal fade" id="popover" aria-hidden="true" aria-labelledby="popover" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popover">Login </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                  <div class="modal-body">
                        <form action="login.php"  method="post">
                        <div class="form-group" >
                          <p> Username:</p>
                          <input type="text" name="username" value="" placeholder="Enter username" class="form-control">
                        </div>
                          <div class="form-group">
                            <br>
                            <p>Password:</p>
                          <input type="text" name="pass_word" value="" placeholder="Enter password" class="form-control">
                          </div>
                          <br>
                          <div class="form-group">
                            <input type="submit" name="login" value="Login" class="form-control">
                          </div>
                            <br>
                          
                          
                        </form>
                   </div>
                   <div class="modal-footer">
                   <button class="btn btn-danger">
                            <a href="#">forgot password</a>
                          </button> <br>
                   <button class="btn btn-danger" data-bs-target="#popover2" data-bs-toggle="modal" data-bs-dismiss="modal">
                            <a href="#"> Create account</a>
                          </button>
                      </div>
                 </div>
            </div>
            </div>
            <div class="modal fade" id="popover2" aria-hidden="true" aria-labelledby="popover2" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="popover2">Create Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action=""  method="post">
                      <div class="form-group">
                        <p> Username:</p>
                        <input name="username" type="text" value="" placeholder="Enter username" class="form-control">
                      </div>
                        <div class="form-group">
                          <br>
                          <p>Password:</p>
                        <input name="pass_word" type="text" value="" placeholder="Enter password" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                          <br>
                          <p> Confirm Password:</p>
                        <input name="confirmpass_word" type="text" value="" placeholder="Enter password" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                          <input type="submit" name="signup" value="signup" class="form-control">
                        </div>
                          <br>

                      </form>

                    </div>
                      <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-target="#popover" data-bs-toggle="modal" data-bs-dismiss="modal">Back to Login</button>
                      </div>
                  </div>
                </div>
            </div>
            </div>
           <a href="#" > HELP </a>
       </nav>
       <?php
    if(isset($_SESSION['username'])){
      echo " <a href='logout.php'>logout</a>";
    }
    ?>
    <div class=" col-1 cartlogo"> 
       <a href="cart.php">
         <img  src="images/icons/red-cart.png">
         <?php
    
          $select_rows = mysqli_query($con, "SELECT * FROM `cart`") or die('query failed');
          $row_count = mysqli_num_rows($select_rows);
          if($row_count==0){
            
          }
          else{
            echo" <span>$row_count</span>";
          }
          
        
         ?>
       
        </a>
      </div>
      </div>
      
<!-- category section -->
    <section class="cat-section px-3 py-2">
<!-- categories -->
 <div  class="cat-div"> 
  <aside class="categories">
        <h3>CATEGORIES</h3>
            <div class="btn-group d-block dropend dropdown">
              <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">BEVERAGES</button>
              <div class="dropdown-menu">
                <div>
                  <a class="dropdown-item" href="allproducts.php#beverages">MILO</a>
                  <a class="dropdown-item" href="#">PEAK</a>
                  <a class="dropdown-item" href="#">BOURNVITA</a>
                  <a class="dropdown-item" href="#">NESCAFE</a>
                  <a class="dropdown-item" href="#">LACTORICH</a>
                  <a class="dropdown-item" href="#"> DANGOTE SUGAR</a>
                  <a class="dropdown-item" href="#">COFFEE</a>

                </div>
                
              </div>
            </div>
            <div class="btn-group d-block dropend dropdown">
              <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">COSMETICS</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">SMART COLLECTION</a>
                <a class="dropdown-item" href="#">BAKARATE</a>
                <a class="dropdown-item" href="#">PERFUME OIL</a>
                <a class="dropdown-item" href="#">BODY CREAM</a>
                <a class="dropdown-item" href="#">OTHER PERFUMES</a>
                <a class="dropdown-item" href="#"> ROLL ON</a>
                <a class="dropdown-item" href="#">MAKE UP KITS</a>

              </div>
            </div>
            <div class="btn-group d-block dropend dropdown">
              <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">ELECTRICAL ACCESSORIES</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">EXTENSION BOX</a>
                <a class="dropdown-item" href="#">BULBS</a>
                <a class="dropdown-item" href="#">SOCKET OUTLET</a>
                <a class="dropdown-item" href="#">PLUG</a>
                <a class="dropdown-item" href="#">LAMPHOLDER</a>
                <a class="dropdown-item" href="#">TORCH LIGHT</a>
                <a class="dropdown-item" href="#">BATTERY</a>
                <a class="dropdown-item" href="#">WATER HEATER</a>

              </div>
            </div>
            <div class="btn-group d-block dropend dropdown">
              <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">KITCHEN UTENSILS</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">DINNER SET </a>
                <a class="dropdown-item" href="#">TABLE SPOONS</a>
                <a class="dropdown-item" href="#">WATER BOTTLE</a>
                <a class="dropdown-item" href="#">PARTY CUPS</a>
                <a class="dropdown-item" href="#">TAKEAWAY</a>
              </div>
            </div>
            <div class="btn-group d-block dropend dropdown">
              <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">FOOD STUFFS</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">RICE</a>
                <a class="dropdown-item" href="#">SUGAR</a>
                <a class="dropdown-item" href="#">FLOUR</a>
                <a class="dropdown-item" href="#">GARRI</a>
                <a class="dropdown-item" href="#">SPARGETTI</a>
                <a class="dropdown-item" href="#">INDOMIE</a>
                <a class="dropdown-item" href="#">MACARONI</a>
              </div>
            </div>
            <div class="btn-group d-block dropend dropdown">
              <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">FROZEN FOODS</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">SUASAGE</a>
                <a class="dropdown-item" href="#">SKUMBIA FISH</a>
                <a class="dropdown-item" href="#">SHAWA FISH</a>
                <a class="dropdown-item" href="#">STOCK FISH</a>
                <a class="dropdown-item" href="#">CROKER FISH</a>
                <a class="dropdown-item" href="#">HORSE MARKEREL</a>
                <a class="dropdown-item" href="#">SHRIMPS</a>
              </div>
            </div>
            <div class="btn-group d-block dropend dropdown">
              <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">CHILDREN ACCESSORIES</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">PAMPERS</a>
                <a class="dropdown-item" href="#">BABY FOOD</a>
                <a class="dropdown-item" href="#">TOYS</a>
                <a class="dropdown-item" href="#">BABY TOOTHBRUSH</a>
                <a class="dropdown-item" href="#">BABY SOAP</a>
                <a class="dropdown-item" href="#">BALLONS</a>
                <a class="dropdown-item" href="#">SWEETS</a>
              </div>
            </div>
            
            <div>  
              <button  class="btn"><a href="allproducts.php">SEE ALL</a></button>
            </div>

          </aside>
<!-- gif-div -->
          <div class="gif-div">
            <div>
            <img src="images/icons/red-gifi.png" alt="" width="100%" height="200px">
         </div>
         <div>
           <img src="images/icons/red-gifi2.png" alt="" width="100%" height="200px"> 
         </div>
           </div>
<!-- image section -->
          <div class="ads-section">        
<!-- img ads -->
          <div class="trans-img">
          </div>
        </div>

  
        </div>   
<!-- product carosel -->
    <div id="slide" class="carousel slide slide1" data-bs-ride="carousel " >

<!-- Indicators/dots -->
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#slide" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#slide" data-bs-slide-to="1"></button>
          </div>

<!-- The slideshow/carousel -->
          <div class="carousel-inner " >
    <div class="carousel-item active">
<!-- component testing -->
      <div class="row justify-content-center align-items-center px-3"  >
         
      <?php
 
 while($row7=mysqli_fetch_assoc($select7)){
     ?>
 
      
 <div class=" col-sm-6 col-md-4 col-lg-2 p-3 text-overlay">
         <img src="<?php echo $row7['product_img']?>" alt="" height="100%" width="100%" class="rounded">
         <div class="text--overlay">
          text overlay
         </div>
       </div>
<?php

 }
?>
          
      </div>
      </div>

      <div class="carousel-item ">


    <div class="row justify-content-center align-items-center px-3"  >
    <?php
 
 while($row8=mysqli_fetch_assoc($select8)){
     ?>
 
      
 <div class="col-sm-6 col-md-4 col-lg-2 p-3 text-overlay">
         <img src="<?php echo $row8['product_img']?>" alt="" height="100%" width="100%" class="rounded">
         <div class="text--overlay">
          text overlay
         </div>
       </div>
<?php

 }
?>
     </div>
  </div>
            </div>

<!-- Left and right controls/icons -->
          <button class="carousel-control-prev " type="button" data-bs-target="#slide" data-bs-slide="prev" style="width: 70px;">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#slide" data-bs-slide="next" style="width: 70px;">
            <span class="carousel-control-next-icon"></span>
          </button>
      </div> 
<!-- product sections -->
<div style="padding-bottom: 20px; ">
            <h2 style="color: white;background-color:#dc3545;" class='px-2 rounded'>
            At your services
            </h2>
       <div id="slide2" class="carousel slide" data-bs-ride="carousel ">
  
<!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#slide2" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#slide2" data-bs-slide-to="1"></button>
            </div>
      
<!-- The slideshow/carousel -->
  <div class="carousel-inner pb-5">
  <div class="carousel-item active">
<!-- database -->
  <div class="row justify-content-center align-items-center p-5 "   style="height:auto ;">
  <?php
 
 while($row5=mysqli_fetch_assoc($select5)){
     ?>
 
      
       
 <div class="col-sm-6 col-md-4 col-lg-2 " id="image-hover-effect" >
      
      <form action="" method='post'>
      <img src="<?php echo $row5['product_img']?>" alt="" height="150px" width="100%" >
      <div>
      <span><?php echo $row5['product_name']?></span>
      <br>
      <?php echo $row5['product_price']?>
      </div>
      <input type="hidden" name='product_name' value='<?php echo $row5['product_name']?>'>
      <input type="hidden" name='product_price' value='<?php echo $row5['product_price']?>'>
      <input type="hidden" name='product_img' value='<?php echo $row5['product_img']?>'>
      <input  type="submit" name='add_to_cart' value='Add to cart' class='btn btn-danger mb-2 text-center'>
      </form>
</div>
<?php

 }
?>
                      
  </div>
  </div>

  <div class="carousel-item ">

      <div class="row justify-content-center align-items-center p-5 "   style="height:auto ;">
      <?php
 
 while($row6=mysqli_fetch_assoc($select6)){
     ?>
 
      
 <div class="col-sm-6 col-md-4 col-lg-2" id="image-hover-effect" >
      
      <form action="" method='post'>
      <img src="<?php echo $row6['product_img']?>" alt="" height="150px" width="100%" >
      <div>
      <span><?php echo $row6['product_name']?></span>
      <br>
      <?php echo $row6['product_price']?>
      </div>
      <input type="hidden" name='product_name' value='<?php echo $row6['product_name']?>'>
      <input type="hidden" name='product_price' value='<?php echo $row6['product_price']?>'>
      <input type="hidden" name='product_img' value='<?php echo $row6['product_img']?>'>
      <input  type="submit" name='add_to_cart' value='Add to cart' class='btn btn-danger mb-2 text-center'>
      </form>
</div>
<?php

 }
?>
                          
      </div>
      </div>
  </div>

<!-- Left and right controls/icons -->
            <button class="carousel-control-prev " type="button" data-bs-target="#slide2" data-bs-slide="prev" style="width: 70px;">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slide2" data-bs-slide="next" style="width: 70px;">
                <span class="carousel-control-next-icon"></span>
            </button>
     </div>
    </div>

  <div style="padding-bottom: 20px; ">
            <h2 style="color: white;background-color:#dc3545;" class="text-center px-2 rounded">
            Top Deals
            </h2>
       <div id="slide3" class="carousel slide" data-bs-ride="carousel ">
  
<!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#slide3" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#slide3" data-bs-slide-to="1"></button>
            </div>
      
<!-- The slideshow/carousel -->
  <div class="carousel-inner pb-5">
  <div class="carousel-item active">

  <div class="row justify-content-center align-items-center p-5 "   style="height:auto ;">
  <?php
 
 while($row3=mysqli_fetch_assoc($select3)){
     ?>
 
      
 <div class="col-sm-6 col-md-4 col-lg-2  " id="image-hover-effect" >
      
      <form action="" method='post'>
      <img src="<?php echo $row3['product_img']?>" alt="" height="150px" width="100%" >
      <div>
      <span><?php echo $row3['product_name']?></span>
      <br>
      <?php echo $row3['product_price']?>
      </div>
      <input type="hidden" name='product_name' value='<?php echo $row3['product_name']?>'>
      <input type="hidden" name='product_price' value='<?php echo $row3['product_price']?>'>
      <input type="hidden" name='product_img' value='<?php echo $row3['product_img']?>'>
      <input  type="submit" name='add_to_cart' value='Add to cart' class='btn btn-danger mb-2 text-center'>
      </form>
</div>
<?php

 }
?>
                      
  </div>
  </div>

  <div class="carousel-item ">

      <div class="row justify-content-center align-items-center p-5 "   style="height:300px ;">
      <?php
 
 while($row4=mysqli_fetch_assoc($select4)){
     ?>

       <div class="col-sm-6 col-md-4 col-lg-2 " id="image-hover-effect" >
      
                    <form action="" method='post'>
                    <img src="<?php echo $row4['product_img']?>" alt="" height="150px" width="100%" >
                    <div>
                    <span><?php echo $row4['product_name']?></span>
                    <br>
                    <?php echo $row4['product_price']?>
                    </div>
                    <input type="hidden" name='product_name' value='<?php echo $row4['product_name']?>'>
                    <input type="hidden" name='product_price' value='<?php echo $row4['product_price']?>'>
                    <input type="hidden" name='product_img' value='<?php echo $row4['product_img']?>'>
                    <input  type="submit" name='add_to_cart' value='Add to cart' class='btn btn-danger mb-2 text-center'>
                    </form>
             </div>
<?php

 }
?>
                          
      </div>
      </div>
  </div>

<!-- Left and right controls/icons -->
            <button class="carousel-control-prev " type="button" data-bs-target="#slide3" data-bs-slide="prev" style="width: 70px;">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slide3" data-bs-slide="next" style="width: 70px;">
                <span class="carousel-control-next-icon"></span>
            </button>
     </div>
    </div>

<!-- more categories -->
<div style="padding-bottom: 20px;">
        <h2 style="color: white;background-color:#dc3545;" class='px-2 rounded'>
        More Collection
       </h2> 
    <div  class="  collections ">
    <div class=" more_collections ">
    
      
    <?php
 
 while($row1=mysqli_fetch_assoc($select1)){
     ?>
 
      
 <div class="border">
          <img src="<?php echo $row1['product_img']?>" alt="" height="250px" width="250px" class="rounded" >
          
         </div>
<?php

 }
?>
 
    </div>
     </div>
     </div>
<!-- more collections -->

<div style="padding-bottom: 20px; ">
        <h2 style="color: white;background-color:#dc3545;" class='px-2 rounded'>
        COSMETICS: PERFUME
      </h2>
    <div class="row p-5"   style="height:auto ;">
    
              <?php
 
    while($row2=mysqli_fetch_assoc($select2)){
        ?>
    
    <?php
 if(isset($_POST['add_to_cart'])){

  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_img = $_POST['product_img'];
  $product_quantity = 1;

  $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE name = '$product_name'");

  if(mysqli_num_rows($select_cart) > 0){
     echo"<script>alert('product already added to cart..')</script>";
     echo"<script>window.location='shop.php'</script>";
  }else{
     $insert_product = mysqli_query($con, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_img', '$product_quantity')");
     echo"<script>alert('product added to cart succesfully..')</script>";
     echo"<script>window.location='shop.php'</script>";
     
  }

}

    ?>




    <div class=" col-sm-4 col-lg-2 " id="image-hover-effect"  >
      
                    <form action="" method='post'>
                    <img src="<?php echo $row2['product_img']?>" alt="" height="150px" width="100%" >
                    <div>
                    <span><?php echo $row2['product_name']?></span>
                    <br>
                    <?php echo $row2['product_price']?>
                    </div>
                    <input type="hidden" name='product_name' value='<?php echo $row2['product_name']?>'>
                    <input type="hidden" name='product_price' value='<?php echo $row2['product_price']?>'>
                    <input type="hidden" name='product_img' value='<?php echo $row2['product_img']?>'>
                    <input  type="submit" name='add_to_cart' value='Add to cart' class='btn btn-danger mb-2 text-center'>
                    </form>
             </div>
<?php

    }
?>
                
  </div>
    </div>

    </section>

<!-- footer -->
<footer>

<!--The main area of the footer -->
<div class="footer-content">

   <h3>SGIS</h3>
   <p>Ground Tutorial is a blog website where you will find great tutorials on web design and development. Here each tutorial is beautifully described step by step with the required source code.</p>
  
<!--Footer's social icon-->
   <ul class="socials">
      <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
        width="20" height="20"
        viewBox="0 0 64 64"
        style=" fill:#000000;"><path d="M 21.580078 7 C 13.541078 7 7 13.544938 7 21.585938 L 7 42.417969 C 7 50.457969 13.544938 57 21.585938 57 L 42.417969 57 C 50.457969 57 57 50.455062 57 42.414062 L 57 21.580078 C 57 13.541078 50.455062 7 42.414062 7 L 21.580078 7 z M 47 15 C 48.104 15 49 15.896 49 17 C 49 18.104 48.104 19 47 19 C 45.896 19 45 18.104 45 17 C 45 15.896 45.896 15 47 15 z M 32 19 C 39.17 19 45 24.83 45 32 C 45 39.17 39.169 45 32 45 C 24.83 45 19 39.169 19 32 C 19 24.831 24.83 19 32 19 z M 32 23 C 27.029 23 23 27.029 23 32 C 23 36.971 27.029 41 32 41 C 36.971 41 41 36.971 41 32 C 41 27.029 36.971 23 32 23 z"></path></svg></a></li>
      <li><a href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
        width="20" height="20"
        viewBox="0 0 50 50"
        style=" fill:#000000;"><path d="M 25.996094 48 C 13.3125 48 2.992188 37.683594 2.992188 25 C 2.992188 12.316406 13.3125 2 25.996094 2 C 31.742188 2 37.242188 4.128906 41.488281 7.996094 L 42.261719 8.703125 L 34.675781 16.289063 L 33.972656 15.6875 C 31.746094 13.78125 28.914063 12.730469 25.996094 12.730469 C 19.230469 12.730469 13.722656 18.234375 13.722656 25 C 13.722656 31.765625 19.230469 37.269531 25.996094 37.269531 C 30.875 37.269531 34.730469 34.777344 36.546875 30.53125 L 24.996094 30.53125 L 24.996094 20.175781 L 47.546875 20.207031 L 47.714844 21 C 48.890625 26.582031 47.949219 34.792969 43.183594 40.667969 C 39.238281 45.53125 33.457031 48 25.996094 48 Z"></path></svg></a></li>
      <li><a href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
        width="20" height="20"
        viewBox="0 0 50 50"
        style=" fill:#000000;">    <path d="M25,2C12.317,2,2,12.317,2,25s10.317,23,23,23s23-10.317,23-23S37.683,2,25,2z M36.237,20.524 c0.01,0.236,0.016,0.476,0.016,0.717C36.253,28.559,30.68,37,20.491,37c-3.128,0-6.041-0.917-8.491-2.489 c0.433,0.052,0.872,0.077,1.321,0.077c2.596,0,4.985-0.884,6.879-2.37c-2.424-0.044-4.468-1.649-5.175-3.847 c0.339,0.065,0.686,0.1,1.044,0.1c0.505,0,0.995-0.067,1.458-0.195c-2.532-0.511-4.441-2.747-4.441-5.432c0-0.024,0-0.047,0-0.07 c0.747,0.415,1.6,0.665,2.509,0.694c-1.488-0.995-2.464-2.689-2.464-4.611c0-1.015,0.272-1.966,0.749-2.786 c2.733,3.351,6.815,5.556,11.418,5.788c-0.095-0.406-0.145-0.828-0.145-1.262c0-3.059,2.48-5.539,5.54-5.539 c1.593,0,3.032,0.672,4.042,1.749c1.261-0.248,2.448-0.709,3.518-1.343c-0.413,1.292-1.292,2.378-2.437,3.064 c1.122-0.136,2.188-0.432,3.183-0.873C38.257,18.766,37.318,19.743,36.237,20.524z"></path></svg></i></a></li>
      <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
        width="20" height="20"
        viewBox="0 0 50 50"
        style=" fill:#000000;">    <path d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z"></path></svg></a></li>
      
    </ul>

 <!-- Footer's menu item-->
   <div class="footer-menu">
      <ul class="f-menu">
        <li><a href="">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="">Articles</a></li>
      </ul>
   </div>

</div>

<!--Copyright Area-->
<div class="footer-bottom">
    <p><a href="#">&copy 2022,<em>Samdami intergrated stores</em></a></p>
</div>

</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
          
  
  