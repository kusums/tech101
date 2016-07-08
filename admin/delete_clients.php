<?php
	session_start();
	include('../config/config.php');
    include('login_check.php');
	if(isset($_GET['id'])){
		$clients_id = $_GET['id'];
        
        $sql = "SELECT * FROM `tbl_clients` WHERE clients_id = $clients_id";
        $output = mysqli_query($con,$sql);
        if(mysqli_num_rows($output)>0){
            while($row = mysqli_fetch_assoc($output)){
            $team_img = $row['image'];
            }
        }
        
		$query = "DELETE FROM tbl_clients WHERE clients_id = $clients_id";
        
		if($result = mysqli_query($con,$query)){
            unlink("../assets/images/clients/".$team_img);            
            $_SESSION['success']['message'] = "Succesfully Deleted";
            header('location: view_clients.php');
            
		}else{
			$_SESSION['failure']['message'] = "Delete Unsuccessful";
			header('location: view_clients.php');
		}
	}else{
			$_SESSION['warning']['message'] = "No item to delete";
			header('location: view_clients.php');
	}
?>