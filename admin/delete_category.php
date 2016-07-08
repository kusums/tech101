<?php
session_start();
include('../config/config.php');
include('login_check.php');
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    $sql = "SELECT * FROM `workcategory` WHERE category_id = $category_id";
    $output = mysqli_query($con, $sql);
    if (mysqli_num_rows($output) > 0) {
        while ($row = mysqli_fetch_assoc($output)) {

        }
    }

    $query = "DELETE FROM workcategory WHERE category_id = $category_id";

    if ($result = mysqli_query($con, $query)) {

        $_SESSION['success']['message'] = "Succesfully Deleted";
        header('location: category.php');

    } else {
        $_SESSION['failure']['message'] = "Delete Unsuccessful";
        header('location: category.php');
    }
} else {
    $_SESSION['warning']['message'] = "No item to delete";
    header('location: category.php');
}
?>