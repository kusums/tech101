<?php
session_start();
include('../config/config.php');


if (isset($_POST["captcha"]) && $_POST["captcha"] != "" && $_SESSION["vercode"] == $_POST["captcha"]) {
    //Continue
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $cap = $_POST['captcha'];

    $username = mysqli_real_escape_string($con, $user);
    $password = mysqli_real_escape_string($con, $pass);
    $captcha = mysqli_real_escape_string($con, $cap);

    if (!empty($username) && !empty($password) && !empty($captcha)) {
        $str = "SELECT * FROM `user` WHERE `user_uname`='" . $username . "' AND `user_pwd`='" . $password . "'";
        $result = mysqli_query($con, $str);
        $number = mysqli_num_rows($result);
        if ($number > 0) {
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['user_id'];
            $_SESSION['login_status'] = "true";
            $_SESSION['user_id'] = $user_id;
            header('location:dashboard.php');
            exit();
        } else {
            $_SESSION['error'] = 'Invalid username/password';
            header('location:index.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'Please enter all fields';
        header('location:index.php');
        exit();
    }

} else {
    $_SESSION['error'] = 'Invalid Captcha';
    header('location:index.php');
    exit();
}


?>