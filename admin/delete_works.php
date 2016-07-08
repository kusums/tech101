<?php
session_start();
include('../config/config.php');
include('login_check.php');
if (isset($_GET['id'])) {
    $work_id = $_GET['id'];


    $sql = "SELECT * FROM `works` WHERE work_id = $work_id ";
    $output = mysqli_query($con, $sql);
    if (mysqli_num_rows($output) > 0) {
        while ($row = mysqli_fetch_assoc($output)) {
            $image = $row['image'];

        }
    }

    $query = "DELETE FROM works WHERE work_id = $work_id ";
    if ($result = mysqli_query($con, $query)) {
        unlink("../assets/images/works/" . $image);

        $_SESSION['success']['message'] = "Succesfully Deleted";
        header('location:view_works.php');
    } else {
        $_SESSION['failure']['message'] = "Delete Unsuccessful";
        header('location:view_works.php');
    }
} else {
    $_SESSION['warning']['message'] = "No item to delete";
    header('location:view_works.php');
}
?>