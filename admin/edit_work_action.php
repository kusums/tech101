<?php
session_start();
$_SESSION['success']['message'] = "";
$_SESSION['failure']['message'] = "";

include('../config/config.php');
include('login_check.php');

$title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['tr_desc'];
$status= $_POST['status'];
$work_id=$_POST['work_id'];


//Old Images
$img1old = $_POST['img1old'];

//New Images
$img1 = $_FILES['img1']['name'];


if (
    !empty($title) &&
    !empty($category) &&
    !empty($description) &&
    !empty($status) &&
    !empty($img1) 
    
   
) {

    //Image Upload
    $target_dir = "../assets/images/works/";
    $target_file1 = $target_dir . basename($img1);
    $uploadOk = 1;

    $imageFileType1 = pathinfo($target_file1, PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $check1 = getimagesize($_FILES['img1']['tmp_name']);

    if ($check1 !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['failure']['message'] = "File is not an image.";
        header("Location:view_works.php");
        $uploadOk = 0;
    }

    // Check if file already exists
    if (!file_exists($target_file1)) {
        $uploadOk = 1;
    } else {
        $_SESSION['failure']['message'] = "Sorry, file already exists.";
        header("Location:view_works.php");
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif"
        && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF"

    ) {
        $_SESSION['failure']['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("Location:view_works.php");
        $uploadOk = 0;
    } else {
        $uploadOk = 1;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['failure']['message'] = "Sorry, your file was not uploaded.";
        header("Location:view_works.php");
        // if everything is ok, try to upload file
    } else {
        $temp1 = explode(".", $img1);

        $newfilename1 = date('Y-m-d') . '-' . md5(uniqid(round(microtime(true)))) . '.' . end($temp1);

        $uploadimg1 = move_uploaded_file($_FILES["img1"]["tmp_name"], $target_dir . $newfilename1);

        if ($uploadimg1) {

            $query = "UPDATE `works` SET 
                                title = '$title',
                                description = '$description',
                                category_id = '$category',
                                image = '$newfilename1',
                                status= '$status' 

                                    WHERE work_id = '" . $work_id . "'
                                ";


            $sql = mysqli_query($con, $query);
            if ($sql) {
                unlink("../assets/images/works/" . $img1old);
                $_SESSION['success']['message'] = "Successfully updated";
                header("Location:view_works.php");
                exit();
            } else {
                $_SESSION['failure']['message'] = "Cannot be updated please try again later";
                header("Location:view_works.php");
                exit();
            }
        } else {
            $_SESSION['failure']['message'] = "Sorry, there was an error uploading your file.";
            header("Location:view_works.php");
            exit();
        }
    }
    //Image Upload Ends

} else {
    $query = "UPDATE `works` SET 
                                title = '$title',
                                description = '$description',
                                category_id = '$category',
                                image = '$img1old',
                                status= '$status'   
                               
                                    WHERE work_id = '" . $work_id . "'
                                ";

    $sql = mysqli_query($con, $query);
    if ($sql) {
        $_SESSION['success']['message'] = "Successfully updated";
        header("Location:view_works.php");
        exit();
    } else {
        $_SESSION['failure']['message'] = "Cannot be updated please try again later";
        header("Location:view_works.php");
        exit();
    }


}


?>