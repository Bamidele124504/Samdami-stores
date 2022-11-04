<?php session_start();


$sever='localhost';
$username='root';
$password='';
$database='samdami_stores';

$con=mysqli_connect($sever,$username,$password,$database);
$product_qry="SELECT * FROM producttb1";


if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($con, "DELETE FROM `cart` WHERE id = '$remove_id'");
  header('location:cart.php');
};

if(isset($_POST['update_update_btn'])){
  $update_value = $_POST['update_quantity'];
  $update_id = $_POST['update_quantity_id'];
  $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
  if($update_quantity_query){
     header('location:cart.php');
  };
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="body">
<div class="nav-section" > 
      <header class="companyLogo">
          <p><span style="color:#dc3545;">S</span>AMDAMI</p>
      </header> 
    <nav class="navbar">
      
         <a href="shop.php">HOME </a>
           <a href="#" > HELP </a>
           <div>
           <input class="searchbar" type="text" placeholder="search..." style="padding-left: 20px;" >
           <button class='btn btn-danger'>Search</button>
           </div>
       </nav>
     <div class="cartlogo" style="padding-right: 30px;display:flex;"> 
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

       <!-- cart item -->
      <div class="test">
      <main class="cart">



<?php 
 $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
 $grand_total = 0;
 $sub_total=0;
 if(mysqli_num_rows($select_cart) > 0){
    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
    ?>
     
   
  
      
        <div class="cart-item mb-1 " >
        <div>
            <img src="<?php echo $fetch_cart['image']?>" alt="" style="width:180px ; height:180px">
            
        </div>
        <div>
            <h1><?php echo $fetch_cart['name']?></h1>
            <div class="price">
            <?php echo number_format($fetch_cart['price']); ?>
            <span> <?php $sub_total =((int)$fetch_cart['price'] *(int)$fetch_cart['quantity']); ?></span>
            </div>
            <div class="counter">
               
        
        
            <div id="count">

            <form action="" method="post" style="display:flex;">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input class="update_quantity text-center" type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input class='btn btn-danger' type="submit" value="Add" name="update_update_btn">
                  
               </form>   



                
            </div>
        
            
            </div>
            <div class="pt-2">
            <button class="btn btn-danger">PURCHASE</button>
            
            <button style="border:none;"  >
            <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="btn btn-danger delete-btn"> <i class="fas fa-trash"></i> Remove</a>
            
            </button>
            </div>
            
        </div>
       </div>
        
      
  
       
       <?php
       
          $grand_total += $sub_total ;
           
           $_SESSION['total']= $grand_total; 
                     
        
    };
}
else{
  echo"<h5>cart is empty</h5>";
}
session_destroy();
?>

   
        </main>
<!-- price details -->


<div class="price_details">
      <div class="sticky-top p-4">
      <h3>
     <u> price details</u> 
     </h3> <br>
     <span><h6>delivery fee: $0</h6></span>
     <br>
     <span><h6>total: $<?php echo $grand_total; ?></h6></span> 
     <div class="mt-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae explicabo non et est quaerat quos quisquam quam suscipit saepe libero culpa id ducimus blanditiis officiis dolorum accusamus, sed quidem quibusdam.
      </div> 
      <div>
        <button class="btn btn-danger w-100 mt-5" onclick="payWithPaystack()">Pay</button>
      </div>
      </div>
      
     </div>



      </div>
        <!-- related products -->
        <div style="margin-bottom: 20px; padding-bottom: 20px; " class="related_products">
            
            <div class="row "   style="padding-top: 100px;">
            <h1 id="cosmetics">
                COSMETICS: PERFUME
            </h1>
            <div class="col-2 " id="image-hover-effect" >
                <img src="images/indomie.webp" alt="" height="200px" width="100%" class="rounded" >
                <div>
                 <span>Indomie superpack</span>
                 <br>
                 # 1000
                </div>
             </div>
             <div class="col-2 " id="image-hover-effect" >
                <img src="images/indomie.webp" alt="" height="200px" width="100%" class="rounded" >
                <div>
                 <span>Indomie superpack</span>
                 <br>
                 # 1000
                </div>
             </div>
             <div class="col-2 " id="image-hover-effect" >
                <img src="images/indomie.webp" alt="" height="200px" width="100%" class="rounded" >
                <div>
                 <span>Indomie superpack</span>
                 <br>
                 # 1000
                </div>
             </div>
             <div class="col-2 " id="image-hover-effect" >
                <img src="images/indomie.webp" alt="" height="200px" width="100%" class="rounded" >
                <div>
                 <span>Indomie superpack</span>
                 <br>
                 # 1000
                </div>
             </div>
             <div class="col-2 " id="image-hover-effect" >
                <img src="images/indomie.webp" alt="" height="200px" width="100%" class="rounded" >
                <div>
                 <span>Indomie superpack</span>
                 <br>
                 # 1000
                </div>
             </div>
             <div class="col-2 " id="image-hover-effect" >
                <img src="images/indomie.webp" alt="" height="200px" width="100%" class="rounded" >
                <div>
                 <span>Indomie superpack</span>
                 <br>
                 # 1000
                </div>
             </div>
                  <div class="col-2 " id="image-hover-effect" >
                    <img src="images/indomie.webp" alt="" height="200px" width="100%" class="rounded" >
                    <div>
                     <span>Indomie superpack</span>
                     <br>
                     # 1000
                    </div>
                 </div>
                 <div class="col-2 " id="image-hover-effect" >
                  <img src="images/indomie.webp" alt="" height="200px" width="100%" class="rounded" >
                  <div>
                   <span>Indomie superpack</span>
                   <br>
                   # 1000
                  </div>
               </div>
               <div class="col-2 " id="image-hover-effect" >
                <img src="images/indomie.webp" alt="" height="200px" width="100%" class="rounded" >
                <div>
                 <span>Indomie superpack</span>
                 <br>
                 # 1000
                </div>
             </div>
             <div class="col-2 " id="image-hover-effect" >
              <img src="images/indomie.webp" alt="" height="200px" width="100%" class="rounded" >
              <div>
               <span>Indomie superpack</span>
               <br>
               # 1000
              </div>
           </div>
           <div class="col-2 " id="image-hover-effect" >
            <img src="images/indomie.webp" alt="" height="200px" width="100%" class="rounded" >
            <div>
             <span>Indomie superpack</span>
             <br>
             # 1000
            </div>
         </div>
         <div class="col-md-2 " id="image-hover-effect" >
          <img src="images/indomie.webp" alt="" height="200px" width="100%" class="rounded" >
          <div>
           <span>Indomie superpack</span>
           <br>
           # 1000
          </div>
       </div>
                    
                </div>
              </div>

              <!-- footer -->
  <footer>
          <div class="footer">
            <!-- footer-logo and icons -->
            <section class="footer-logo">
              <h1>SGIS</h1>
            <!-- icon -->
            <div class="icons">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
              width="20" height="20"
              viewBox="0 0 64 64"
              style=" fill:#000000;"><path d="M 21.580078 7 C 13.541078 7 7 13.544938 7 21.585938 L 7 42.417969 C 7 50.457969 13.544938 57 21.585938 57 L 42.417969 57 C 50.457969 57 57 50.455062 57 42.414062 L 57 21.580078 C 57 13.541078 50.455062 7 42.414062 7 L 21.580078 7 z M 47 15 C 48.104 15 49 15.896 49 17 C 49 18.104 48.104 19 47 19 C 45.896 19 45 18.104 45 17 C 45 15.896 45.896 15 47 15 z M 32 19 C 39.17 19 45 24.83 45 32 C 45 39.17 39.169 45 32 45 C 24.83 45 19 39.169 19 32 C 19 24.831 24.83 19 32 19 z M 32 23 C 27.029 23 23 27.029 23 32 C 23 36.971 27.029 41 32 41 C 36.971 41 41 36.971 41 32 C 41 27.029 36.971 23 32 23 z"></path></svg>
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
              width="20" height="20"
              viewBox="0 0 50 50"
              style=" fill:#000000;"><path d="M 25.996094 48 C 13.3125 48 2.992188 37.683594 2.992188 25 C 2.992188 12.316406 13.3125 2 25.996094 2 C 31.742188 2 37.242188 4.128906 41.488281 7.996094 L 42.261719 8.703125 L 34.675781 16.289063 L 33.972656 15.6875 C 31.746094 13.78125 28.914063 12.730469 25.996094 12.730469 C 19.230469 12.730469 13.722656 18.234375 13.722656 25 C 13.722656 31.765625 19.230469 37.269531 25.996094 37.269531 C 30.875 37.269531 34.730469 34.777344 36.546875 30.53125 L 24.996094 30.53125 L 24.996094 20.175781 L 47.546875 20.207031 L 47.714844 21 C 48.890625 26.582031 47.949219 34.792969 43.183594 40.667969 C 39.238281 45.53125 33.457031 48 25.996094 48 Z"></path></svg>
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
              width="20" height="20"
              viewBox="0 0 50 50"
              style=" fill:#000000;">    <path d="M25,2C12.317,2,2,12.317,2,25s10.317,23,23,23s23-10.317,23-23S37.683,2,25,2z M36.237,20.524 c0.01,0.236,0.016,0.476,0.016,0.717C36.253,28.559,30.68,37,20.491,37c-3.128,0-6.041-0.917-8.491-2.489 c0.433,0.052,0.872,0.077,1.321,0.077c2.596,0,4.985-0.884,6.879-2.37c-2.424-0.044-4.468-1.649-5.175-3.847 c0.339,0.065,0.686,0.1,1.044,0.1c0.505,0,0.995-0.067,1.458-0.195c-2.532-0.511-4.441-2.747-4.441-5.432c0-0.024,0-0.047,0-0.07 c0.747,0.415,1.6,0.665,2.509,0.694c-1.488-0.995-2.464-2.689-2.464-4.611c0-1.015,0.272-1.966,0.749-2.786 c2.733,3.351,6.815,5.556,11.418,5.788c-0.095-0.406-0.145-0.828-0.145-1.262c0-3.059,2.48-5.539,5.54-5.539 c1.593,0,3.032,0.672,4.042,1.749c1.261-0.248,2.448-0.709,3.518-1.343c-0.413,1.292-1.292,2.378-2.437,3.064 c1.122-0.136,2.188-0.432,3.183-0.873C38.257,18.766,37.318,19.743,36.237,20.524z"></path></svg>
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
              width="20" height="20"
              viewBox="0 0 50 50"
              style=" fill:#000000;">    <path d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z"></path></svg>
            </div>
            </section>
              <!-- footer details -->
            <section class="foot">
              <div class="hori-line">
                <p>Return to top
                  <a href="">^</a>
                  
                </p>

                <hr>
              </div>

              <div class="footer-details">
                <div>
                <h4> About us</h4>
                <p>Privacy policy</p>
                <p>Our CompanyLogo</p>
                <p>History</p>
              </div>

              <div>
                <h4>Contact us</h4> 
                <p>Phone number:+23409034049294 </p>
              </div>

            <div> 
              <h4>Connect with us</h4>
              <p>Email:</p>
              <p>Instagram:</p>
              <p>Whatsapp:</p>
              <p>Twitter:</p>
              </div>
            </div>
          </section>
          <div class="copywright">
            &copy 2022,<em>Samdami intergrated stores</em>
          </div>
          </div>
  </footer>
        <script src="counter.js"></script>
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script>
    function payWithPaystack() {

var handler = PaystackPop.setup({ 
    key: 'pk_test_115c0ea568cbe2ec591a80b3151aa2d24ce246b6', //put your public key here
    email: 'obazubamidele@gmail.com', //put your customer's email here
    amount: <?php print $_SESSION['total']; ?>00, //amount the customer is supposed to pay
    metadata: {
        custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678" //customer's mobile number
            }
        ]
    },
    callback: function (response) {
        //after the transaction have been completed
        //make post call  to the server with to verify payment 
        //using transaction reference as post data
        $.post("verify.php", {reference:response.reference}, function(status){
            if(status == "success")
                //successful transaction
                alert('Transaction was successful');
            else
                //transaction failed
                alert(response);
        });
    },
    onClose: function () {
        //when the user close the payment modal
        alert('Transaction cancelled');
    }
});
handler.openIframe(); //open the paystack's payment modal
}
</script>
</body>
</html>