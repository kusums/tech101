<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Admin Custom CSS -->
    <link href="../assets/css/admin.css" rel="stylesheet">


</head>

<body class="admin-login">

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="admin-login-panel">
                    <div class="login-head">
                        <h1 class="text-center">Login</h1>
                    </div>

                    <div class="login-body">
                        <form action="login_action.php" method="post">


                            <div class="form-group">
                                <label for="usr">Username:</label>
                                <input type="text" class="form-control" id="usr" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" name="password" required>
                            </div>

                            <div class="form-group">
                                <label for="captcha">Human Test:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"
                                          id="sizing-addon2"><?php include('mathcaptcha.php'); ?></span>
                                    <input type="text" class="form-control" aria-describedby="sizing-addon2"
                                           id="captcha" name="captcha" required>
                                </div>
                            </div>


                            <div class="error_message pull-left">


                                <?php
                                if (isset($_SESSION['error'])) {
                                    echo $_SESSION['error'];
                                }
                                unset($_SESSION['error']);
                                ?>
                            </div>


                            <button type="submit" class="btn btn-primary pull-right">
                                Login <i class="fa fa-sign-in"></i>
                            </button>
                        </form>
                        <div class="clearfix"></div>


                    </div>
                </div>


            </div>
        </div>
    </div>
</section>


<!-- jQuery -->
<script src="../assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../assets/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../assets/js/metisMenu.min.js"></script>

<!-- Admin JavaScript -->
<script src="../assets/js/admin.js"></script>


</body>

</html>
