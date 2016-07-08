<?php
session_start();
include('../config/config.php');
include('login_check.php');
if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];


    $sql = "SELECT * FROM `tbl_blog` WHERE bl_id = $blog_id";
    $output = mysqli_query($con, $sql);
    if (mysqli_num_rows($output) > 0) {
        while ($row = mysqli_fetch_assoc($output)) {
            $bl_img = $row['bl_img'];
        }
    }

    $query = "DELETE FROM tbl_blog WHERE bl_id = $blog_id";
    if ($result = mysqli_query($con, $query)) {
        unlink("../assets/images/blog/" . $bl_img);
        $_SESSION['success']['message'] = "Succesfully Deleted";
        header('location:view_blogs.php');
    } else {
        $_SESSION['failure']['message'] = "Delete Unsuccessful";
        header('location:view_blogs.php');
    }
} else {
    $_SESSION['warning']['message'] = "No item to delete";
    header('location:view_blogs.php');
}
?>