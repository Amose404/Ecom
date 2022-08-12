<?php
include_once 'auth.php';

function get_fullname(){
	if(is_loggedin()){
		$username = $_COOKIE['username'];
		$query = "SELECT * FROM lahtp.auth WHERE username='$username'";
		$connection = get_db_connection();
		$result = mysqli_query($connection, $query);
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			return $row['full_name'];
		} else {
			return null;
		}
	} else {
		return null;
	}
}
function add_to_cart($username,$item,$brand,$price,$descr,$img){
	$query = "INSERT INTO `cart_items` (`username`, `item_name`, `brand_name`, `item_price`, `item_decre`, `item_image1`)
	VALUES ('$username', '$item', '$brand', '$price', '$descr', '$img');";
    $connection = get_db_connection();
	if(mysqli_query($connection, $query)) {
		return 1;
	} else {
		 return mysqli_error($connection) ;
	}
}
function get_all_cart($username){
	$query ="SELECT * FROM `cart_items` WHERE `username`='$username'";
	$conn = get_db_connection();
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) > 0){
		$posts = [];
		while($row = mysqli_fetch_assoc($result)){
			$posts[] = $row;
		}
		return $posts;
	} else {
		return [];
	}

	}
function buy($productname,$username,$price){
	$query = "INSERT INTO `buy` (`item_name`, `user_name`, `item_price`)
	VALUES ('$productname', '$username', '$price');";
    $connection = get_db_connection();
	if(mysqli_query($connection, $query)) {
		return 1;
	} else {
		 return mysqli_error($connection) ;
	}
}


