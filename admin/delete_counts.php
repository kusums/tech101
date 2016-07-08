<?php
session_start();
include('../config/config.php');
include('login_check.php');
if (isset($_GET['id'])) {
    $count_id = $_GET['id'];

    

    $query = "DELETE FROM counts WHERE count_id = $count_id";

    if ($result = mysqli_query($con, $query)) {
       
        $_SESSION['success']['message'] = "Succesfully Deleted";
        header('location: view_counts.php');

    } else {
        $_SESSION['failure']['message'] = "Delete Unsuccessful";
        header('location: view_counts.php');
    }
} else {
    $_SESSION['warning']['message'] = "No item to delete";
    header('location: view_counts.php');
}
?>