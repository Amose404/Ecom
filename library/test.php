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
            die("Connection failed: ".mysqli_connect_error());
        } else {
            return $db_conn;
        }
    }
}
$s = get_db_connection();
var_dump($s);
?>