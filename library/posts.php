<?php

include_once 'auth.php';

/*
1. do_post($body, $image, $username) - return post ID
2. delete_post($id)
3. like_post($id, $username)
4. get_all_posts()
5. get_like_count($post_id)
6. has_liked($post_id)
*/


function do_post($itemname, $img, $brand, $price,$descr){
	$query = "INSERT INTO `cart` (`item_name`, `brand_name`, `item_price`, `item_decre`, `item_image1`) VALUES ( '$itemname', '$brand', '$price', '$descr', '$img');";
	$conn = get_db_connection();
//	echo $query;
//	die();
	if(mysqli_query($conn, $query)){
		$post_id = mysqli_insert_id($conn);
		return TRUE ;
	} else {
		return mysqli_error($conn);
	}
}

function get_all_posts(){
	$query = "SELECT * FROM cart;";
	$conn = get_db_connection();
	$username = $_COOKIE['username']; //vuln
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

function get_report(){
	$query = "SELECT * FROM buy;";
	$conn =get_db_connection();
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

	
	?>