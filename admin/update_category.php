<?php
session_start();
include('../config/config.php');
include('login_check.php');

if (isset($_POST['submit'])) {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    


    $query = "UPDATE `workcategory` SET 
                                category_name = '$category_name'
                                
                               WHERE category_id = '" . $category_id . "'
                                ";


    $sql = mysqli_query($con, $query);
    if ($sql) {

        $_SESSION['success']['message'] = "Successfully updated";
        header("Location: category.php");
        exit();
    } else {
        $_SESSION['failure']['message'] = "Cannot be updated please try again later";
        header("Location: category.php");
        exit();
    }
}


?>