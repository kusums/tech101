<?php
include '../assets/includes/be-header.php';

$us_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $us_uname = $_POST['us_uname'];
    $us_pswOld = $_POST['us_pswOld'];
    $us_pswNew1 = $_POST['us_pswNew1'];
    $us_pswNew2 = $_POST['us_pswNew2'];
    if (!empty($us_uname) && !empty($us_pswOld) && !empty($us_pswNew1) && !empty($us_pswNew2)) {

        $str = "SELECT * FROM `user` WHERE `user_id` ='" . $us_id . "'";
        $result = mysqli_query($con, $str);
        $number = mysqli_num_rows($result);
        if ($number > 0) {
            $row = mysqli_fetch_assoc($result);
            $username = $row['user_uname'];
            $password = $row['user_pwd'];
            if ($username == $us_uname && $password == $us_pswOld) {
                if ($us_pswNew1 == $us_pswNew2) {
                    $query = "UPDATE `user` SET user_uname = '$us_uname', user_pwd ='$us_pswNew1' WHERE `user_id` ='" . $us_id . "'";
                    $sql = mysqli_query($con, $query);
                    if ($sql) {
                        $_SESSION['success']['message'] = "Update Successful.";
                    } else {
                        $_SESSION['failure']['message'] = "Cannot update please try again later.";
                    }
                } else {
                    $_SESSION['failure']['message'] = 'New passwords doesnot match.';
                }
            } else {
                $_SESSION['failure']['message'] = 'Current username and password doesnot match.';
            }
        } else {
            $_SESSION['failure']['message'] = 'No such user.';
        }

    } else {
        $_SESSION['failure']['message'] = "All the fields are required.";
    }
}
?>

    <div class="row">

        <?php
        include("../assets/includes/message.php");
        ?>


        <div class="col-md-5 col-md-offset-3">
            <div class="password-panel">
                <div class="login-head">
                    <h1 class="text-center">Change Password</h1>
                </div>
                <div class="login-body">
                    <form action="" method="post">
                        <input type="hidden" name="admin_id" value="<?= $admin_id; ?>">
                        <div class="form-group">
                            <label for="us_uname">Username</label>
                            <input type="text" class="form-control" autocomplete="off" id="us_uname" name="us_uname"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="us_pswOld">Old Password</label>
                            <input type="password" class="form-control" id="us_pswOld" name="us_pswOld" required>
                        </div>

                        <div class="form-group">
                            <label for="us_pswNew1">New Password</label>
                            <input type="password" class="form-control" id="us_pswNew1" name="us_pswNew1" required>
                        </div>

                        <div class="form-group">
                            <label for="us_pswNew2">Confirm Password</label>
                            <input type="password" class="form-control" id="us_pswNew2" name="us_pswNew2" required>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit"> Change Password <i
                                class="fa fa-exchange"></i></button>
                    </form>
                </div>
            </div>


        </div>
    </div>

<?php include '../assets/includes/be-footer.php'; ?>