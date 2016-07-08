<?php
	session_start();
	include('../config/config.php');
    include('login_check.php');
	if(isset($_GET['id'])){
		$team_id = $_GET['id'];
        
        $sql = "SELECT * FROM `tbl_team` WHERE team_id = $team_id";
        $output = mysqli_query($con,$sql);
        if(mysqli_num_rows($output)>0){
            while($row = mysqli_fetch_assoc($output)){
            $team_img = $row['image'];
            }
        }
        
		$query = "DELETE FROM tbl_team WHERE team_id = $team_id";
        
		if($result = mysqli_query($con,$query)){
            unlink("../assets/images/team/".$team_img);            
            $_SESSION['success']['message'] = "Succesfully Deleted";
            header('location: view_team.php');
            
		}else{
			$_SESSION['failure']['message'] = "Delete Unsuccessful";
			header('location: view_team.php');
		}
	}else{
			$_SESSION['warning']['message'] = "No item to delete";
			header('location: view_team.php');
	}
?>