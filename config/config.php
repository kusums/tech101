
<?php


	$server='localhost';
	$server_uname='root';
	$server_pwd='';
	$database='db_tech101';
	
	$con=mysqli_connect($server,$server_uname,$server_pwd,$database);
	mysqli_set_charset($con,"utf8");

	if(!$con){
            echo 'Connection Error.'.mysqli_connect_error().'<br />';
        }
?>