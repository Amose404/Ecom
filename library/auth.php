
 <?php
$db_conn = NULL;
$db_username = 'Amose_404';
$db_password = 'a19bcs006amose';
$db_servername = 'mysql.selfmade.ninja';
$db_name = "Amose_404_ecom";

 $SALT = 'askhfbauygb23iory7298dhkewhbfq8e7gfy';

 function get_db_connection() {

    global $db_conn;
 	global $db_servername;
 	global $db_username;
 	global $db_password;
 	global $db_name;

 	if($db_conn != NULL){ //check if an existing connection is open
 		return $db_conn; //return the existing connection
 	} else { //make a new connection
 		$db_conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
 		if(!$db_conn){
 			//die("Connection failed: ".mysqli_connect_error());
 		} else {
 			return $db_conn;
 		}
 	}
 }

 function is_loggedin(){
 	if(isset($_COOKIE['username']) and isset($_COOKIE['token'])){
 	  if(!verify_session($_COOKIE['username'], $_COOKIE['token'])){
 	    return false;
 	  } else {
 	  	return true;
 	  }
 	} else {
 	  return false;
 	}
 }

 function do_login($username, $password, $remember){
 	$password = get_hashed_password($password);
 	$query = "SELECT * FROM auth WHERE username='$username' AND password='$password';";
 	$connection = get_db_connection();
 	$result = mysqli_query($connection, $query);
 	if(mysqli_num_rows($result) == 1){
 		$row = mysqli_fetch_assoc($result);
 		return add_session($row['username'], $row['password'], $remember, $connection);
 	} else {
    return false;
  }
 }

 function add_session($username, $password, $remember, $db_conn){
 	$toen = get_hashed_password($password.time());
 	$query = "INSERT INTO `session` (`username`, `session_toen`, `remember`) VALUES ('$username', '$toen', '$remember');";
 	$result = mysqli_query($db_conn, $query);
 	if($result){
 		if($remember == '1'){
 			setcookie('username', $username, time()+(7*24*60*60)); //remember for 7 days
 			setcookie('toen', $toen, time()+(7*24*60*60));
 		} else {
 			setcookie('username', $username); //remember for session
 			setcookie('toen', $toen);
 		}
 		return 1;
 	}else {
    return mysqli_error($db_conn);
  }


 }

 function verify_session($username, $toen){
 	$query = "SELECT * FROM 'session' WHERE username='$username' AND session_toen='$toen';";
 	$connection = get_db_connection();
 	$result = mysqli_query($connection, $query);
 	if(mysqli_num_rows($result) == 1){
 		$row = mysqli_fetch_assoc($result);
 		if($row['is_valid'] == 1){
 			$time = strtotime($row['create_on']);
 			if($row['remember'] == '1'){
 				if(time() <= $time+(7*24*60*60)){
 					return true;
 				} else {
 					return false;
 				}
 			} else {
 				if(time() <= $time+(1*24*60*60)){
 					return true;
 				} else {
 					return false;
 				}
 			}
 		} else {
 			return false;
 		}
 	}
 }

 function logout($username, $toen){
 	print_r($username);
 	print_r($toen);
 	$query = "UPDATE `session` SET is_valid = '0' WHERE username = '$username' AND session_toen = '$toen';";
 	$db_conn = get_db_connection();
 	return mysqli_query($db_conn, $query);
 	//die();
 }

 function do_signup($username, $password, $full_name, $mobile){
 	$otp = rand(1000, 9999);
 	$password = get_hashed_password($password);
 	$query = "INSERT INTO `auth` (`username`, `password`, `full_name`, `mobile number`, `is_admin`, `otp`) VALUES ('$username', '$password', '$full_name', '$mobile', '0', '$otp');";
 	$db_conn = get_db_connection();
 	if(mysqli_query($db_conn, $query)) {
 		return 1;
 	} else {
 		return mysqli_error($db_conn);
 	}
 }

 function get_hashed_password($password){
 	global $SALT;
 	return strrev(md5($password.$SALT));
 }

 function do_verify_signup($username, $otp){
 	$query = "SELECT * FROM  `auth` WHERE username ='$username';";
 	$db_conn = get_db_connection();
 	$result = mysqli_query($db_conn, $query);
 	if(mysqli_num_rows($result) == 1){
 		$row = mysqli_fetch_assoc($result);
    $notp=$row['otp'];
     if($otp == $notp){
     $otptime = $row['otp_gen_on'];
     $otp_time = strtotime("$otptime");
     $c_time =time();
     $acc_time = $c_time - $otp_time;
     if ($acc_time <= 300) {
      return activate($row['id']) ? 1 : 0;
      }else {
      return 0;// expaired otp
      }
     }else {
 			return -1; //invalid otp
 		}
 	} else {
 		return -2; //user account not found
 	}
}

 function activate($id){
 	$query = "UPDATE `auth` SET `is_verified` = '1' WHERE (`id` = '$id');";
 	$db_conn = get_db_connection();
 	return mysqli_query($db_conn, $query);
 }

 function resent_otp($username){
   $opt = rand(1000,9999);
   $query = "UPDATE `auth` SET `otp` = '$otp' WHERE (`username` = '$username');";
  $db_conn = get_db_connection();
   return mysqli_query($db_conn, $query);

 }
 

 ?>
