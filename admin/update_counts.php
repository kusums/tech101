<?php
session_start();
include('../config/config.php');
include('login_check.php');


if (isset($_POST['submit'])) {
    $count_id = $_POST['count_id'];
    $title = $_POST['title'];
    $number = $_POST['number'];


    $query = "UPDATE `counts` SET `title` = '$title', `number` = '$number'  WHERE `count_id` = '$count_id'";
    $sql = mysqli_query($con, $query);
    if ($sql) {
        $_SESSION['success']['message'] = "Successfully updated.";
        header('location: view_counts.php');
    } else {
        unlink($target_dir . $newfilename);
        $_SESSION['failure']['message'] = "Cannot be added please try again later";
        header('location: view_counts.php');
    }

}

?>