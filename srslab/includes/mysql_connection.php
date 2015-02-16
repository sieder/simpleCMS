<?php

//mysql_connect.php 
//I stored connection to these variables 
$server = 'localhost';
$username = 'root';
$password = 'dota';

$conn = mysql_connect($server,$username,$password
);

if($conn)//a conditional that checks if connected to DB or not
{
	echo ' ';
}else{
	die('Unable to connect');
}
$db_selected = mysql_select_db('srslab', $conn);

if($db_selected){
	echo ' ';
}else{
	die('such database does not exist');
}

?>