<?php
session_start();
$_SESSION['success']['message'] = "";
$_SESSION['failure']['message'] = "";

include('../config/config.php');
include('login_check.php');
include("../assets/includes/image-upload.php");


if (isset($_POST['submit'])) {

    $bl_id = $_POST['bl_id'];
    $bl_title = $_POST['bl_title'];
    $bl_desc = $_POST['bl_desc'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $pic_old = $_POST['pic_old'];

    $fimg_new = $_FILES['img']['name'];

    if (!empty($bl_id) && !empty($bl_title) && !empty($bl_desc) && !empty($pic_old) && !empty($date) && !empty($time)) {
        if (empty($fimg_new)) {


            $query = "UPDATE `tbl_blog` SET 
            `bl_title` = '$bl_title',
             `bl_img` = '$pic_old', 
             `bl_date` = '$date',
             `bl_time` = '$time', 
            
              `bl_desc` = '$bl_desc'
               WHERE `bl_id` = '$bl_id'";


            if ($sql = mysqli_query($con, $query)) {
                $_SESSION['success']['message'] = "Blog successfully edited";

                header("Location: edit_blog.php?id=" . $bl_id);
            } else {
                $_SESSION['failure']['message'] = "Blog cannot be edited please try again later";
                header("Location: edit_blog.php?id=" . $bl_id);
            }
        } else {
            $target_dir = "../assets/images/blog/";
            check_dir($target_dir);
            $quality = 40; //0-100
            $target_file = $target_dir . basename($fimg_new);
            $uploadOk = 1;
            // Check if file already exists
            if (!file_exists($target_file)) {
                $uploadOk = 1;
            } else {
                $_SESSION['failure']['message'] = "Sorry, file already exists.";
                $uploadOk = 0;

            }
            // Check if image file is an actual image or fake image
            $check = getimagesize($_FILES['img']['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $_SESSION['failure']['message'] = "File is not an image.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
                && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF"

            ) {
                $_SESSION['failure']['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            } else {
                $uploadOk = 1;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $_SESSION['failure']['message'] = "Sorry, your file was not uploaded.";
                header("Location: edit_gallery.php?id=" . $ga_id);
                // if everything is ok, try to upload file
            } else {
                $newfilename = hash_filename($fimg_new);

                $uploadimg = image_compress($_FILES["img"]["tmp_name"], $target_dir . $newfilename, $quality);
                if ($uploadimg) {


                    $query = "UPDATE `tbl_blog` SET
                     `bl_title` = '$bl_title',
                      `bl_img` = '$newfilename',
                      `bl_date` = '$date',
                      `bl_time` = '$time',
                       
                       `bl_desc` = '$bl_desc'
                        WHERE `bl_id` = '$bl_id'";


                    $sql = mysqli_query($con, $query);
                    if ($sql) {
                        $_SESSION['success']['message'] = "Successfully updated.";
                        unlink($target_dir . $pic_old);
                        header("Location: view_blogs.php");

                    } else {
                        unlink($target_dir . $newfilename);
                        $_SESSION['failure']['message'] = "Cannot be added please try again later";
                        header("Location: edit_blog.php?id=" . $bl_id);
                    }
                } else {
                    $_SESSION['failure']['message'] = "Sorry, there was an error uploading your file.";
                    header("Location: edit_blog.php?id=" . $bl_id);
                }
            }
        }
    }
}


?>