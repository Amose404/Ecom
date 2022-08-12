<?php

include_once 'library/auth.php';

if(isset($_COOKIE['username']) and isset($_COOKIE['toen'])){
	logout($_COOKIE['username'], $_COOKIE['toen']);
}

setcookie('username', '', time()-60);
setcookie('toen', '', time()-60);
header("Location: index.php");