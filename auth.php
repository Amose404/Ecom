<?php
 include_once 'library/auth.php';
 include_once 'library/user.php';

 if(isset($_POST['type'])){

 	  if($_POST['type'] == 'login'){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $remember =  isset($_POST['remember']) ? $_POST['remember'] : '0';
      $result = do_login($username, $password,$remember);
      if ($result == 1) {
            header("Location: index.php");
      }else{  
            header("Location: signin.php?error=1"); 
      }

     }
    else if ($_POST['type'] == 'signup') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $full_name = $_POST['full_name'];
    $result = do_signup($username, $password, $full_name, $mobile);
    if ($result == 1){
      header("Location:verify.php?username=".urlencode($username));
    }
    else {
     	header("Location: signup.php?error=1&error_m=".urlencode($result)."&fn=".urlencode($full_name)."&mob=".urlencode($mobile));
    }
  }
  else if ($_POST['type']=='verify') {
  $username = $_POST['username'];
  $otp =  $_POST['otp'];
  $result = do_verify_signup($username,$otp);
  if($result == 0){ //EXPIRED OTP
    header("Location: verify.php?username=".urlencode($username)."&error=-1");
  } else if ($result == -1){ //invalid OTP
    header("Location: verify.php?username=".urlencode($username)."&error=1");
  } else if($result == 1){
    header("Location: signin.php?success=1");
  }
}
else if ($_POST['type']=='resent_otp') {
    $username = $_POST['username'];
    $result = resent_otp($username);
    if ($result) {
      header("Location:verify.php?username=".urlencode($username));
    }
    else {
      header("Location:index.php");
    }
  }
  else if ($_POST['type']=='add') {

    $username = $_POST['username'];
    $item = $_POST['item_name'];
    $brand = $_POST['brand_name'];
    $price = $_POST['item_price'];
    $descr = $_POST['item_decre'];
    $img = $_POST['item_image1'];

    $result = add_to_cart($username,$item,$brand,$price,$descr,$img);

    if (isset($result) == 1) {
      header("Location:product.php?success=1");
    }
    else {
      header("Location:product.php?success=2");
    }
  }
  else if ($_POST['type']=='buy') {
    $username = $_POST['username'];
    $item = $_POST['item_name'];
    $brand = $_POST['item_price'];
    $result = buy($item,$username,$brand);
    if ($result) {
      header("Location:verify.php?username=".urlencode($username));
    }
    else {
      header("Location:index.php");
    }
}
 }

?>
