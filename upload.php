<?php

include_once 'library/auth.php';
require 'library/posts.php';

use Carbon\Carbon;


if(isset($_GET['post'])){
  if(isset($_POST['item_name']) and isset($_FILES['image'])){
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
       $result = do_post($_POST['item_name'], $target_file, $_POST['brand_name'],$_POST['item_price'],$_POST['item_decre']);
       if($result){
       header("Location: admin.php?success=1"); 
       }else{
        echo "Sorry, there was an error uploading your file.";
       }
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    /* $target_directory = '/opt/lampp/htdocs/ecom/img/';
    $image_type = pathinfo(basename($_FILES['image']['name']))['extension'];
    $target_file = $target_directory . md5(basename($_FILES['image']['name'])) . '_'.time().'.'.$image_type;
    if(strtolower($image_type) == 'jpg' or strtolower($image_type) == "png" or strtolower($image_type) == "jpeg"){
      if(file_exists($target_file)){
        die('File already exists');
      } else {
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
          do_post($_POST['item_name'], $target_file, $_POST['brand_name'],$_POST['item_price'],$_POST['item_decre']); //vuln here
        } else {
          die('Error uploading file');
        }
      }
    } else {
      die("Invalid file type");
    } */
  }
}
?>
