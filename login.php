<?php
session_start();
$sever='localhost';
$username='root';
$password='';
$database='samdami_stores';
$con=mysqli_connect($sever,$username,$password,$database);

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $pass_word=$_POST['pass_word'];
    
   $result=mysqli_query($con,"SELECT * FROM samdami_table WHERE username='$username' ");
   $row=mysqli_fetch_assoc($result);

   if(mysqli_num_rows($result)>0){
    if($pass_word=$row['pass_word']){
        $_SESSION['username']=$username;
        $_SESSION['id']=$row['id'];
        header("location:shop.php");
      

    }
    else{
        echo
        " <script> alert('wrong password')</script>";
    }
   } 
   else{
    echo
    " <script> alert('user not registered')</script>";
   }
    
}

?>