<?php
//session_start();
include('../config/config.php');

if (isset($_SESSION['login_status'])) {
    if ($_SESSION['login_status'] != "true") {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
?>