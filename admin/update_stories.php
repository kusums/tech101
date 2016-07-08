<?php
session_start();
include('../config/config.php');
include('login_check.php');
include('../assets/includes/image-upload.php');

if (isset($_POST['submit'])) {
    $stories_id = $_POST['stories_id'];
    $title = $_POST['title'];
    $img_old = $_POST['img_old'];
    $img_new = $_FILES['img']['name'];
    $description = $_POST['desc'];


    if (!empty($stories_id) && !empty($title) && !empty($description) && !empty($img_old)) {
        if (empty($img_new)) {


            $query = "UPDATE `stories` SET `title` = '$title', `description` = '$description',  `image` = '$img_old' WHERE `stories_id` = '$stories_id'";
            if ($sql = mysqli_query($con, $query)) {
                $_SESSION['success']['message'] = "Team successfully edited";
                header('location: view_stories.php');
            } else {
                $_SESSION['failure']['message'] = "Team cannot be edited please try again later";
                header('location: view_stories.php');
            }
        } else {
            $target_dir = "../assets/images/stories/";
            check_dir($target_dir);
            $quality = 100; //0-100
            $target_file = $target_dir . basename($img_new);
            $uploadOk = 1;
            // Check if file already exists
            if (!file_exists($target_file)) {
                $uploadOk = 1;
            } else {
                $_SESSION['failure']['message'] = "Sorry, file already exists.";
                $uploadOk = 0;
                header('location: view_stories.php');
            }
            // Check if image file is an actual image or fake image
            $check = getimagesize($_FILES['img']['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $_SESSION['failure']['message'] = "File is not an image.";
                $uploadOk = 0;
                header('location: view_stories.php');
            }
            // Allow certain file formats
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
                && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF"


            ) {
                $_SESSION['failure']['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            } else {
                $uploadOk = 1;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $_SESSION['failure']['message'] = "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                $newfilename = hash_filename($img_new);

                $uploadimg = image_compress($_FILES["img"]["tmp_name"], $target_dir . $newfilename, $quality);
                if ($uploadimg) {


                    $query = "UPDATE `stories` SET `title` = '$title', `description` = '$description',  `image` = '$newfilename'  WHERE `stories_id` = '$stories_id'";
                    $sql = mysqli_query($con, $query);
                    if ($sql) {
                        $_SESSION['success']['message'] = "Successfully updated.";
                        unlink($target_dir . $img_old);
                        header('location: view_stories.php');
                    } else {
                        unlink($target_dir . $newfilename);
                        $_SESSION['failure']['message'] = "Cannot be added please try again later";
                        header('location: view_stories.php');
                    }
                } else {
                    $_SESSION['failure']['message'] = "Sorry, there was an error uploading your file.";
                    header('location: view_stories.php');
                }
            }
        }
    }
}
?>