<?php

include_once 'library/auth.php';
require 'library/user.php';
require 'library/posts.php';

use Carbon\Carbon;


if(isset($_GET['Post'])){
  if(isset($_POST['body']) and isset($_FILES['image'])){
    $target_directory = '/opt/lampp/htdocs/ecom/img/';
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
    }
  }
}