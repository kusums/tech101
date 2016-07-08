<?php
include("../assets/includes/be-header.php");


if (isset($_POST['submit'])) {
   
    $title = $_POST['title'];
    
    $number = $_POST['number'];


   

                    $query = "INSERT INTO `counts` SET
                                    title = '" . $title . "',
                                    number = '" . $number . "'
                                  
                                    ";
                    $sql = mysqli_query($con, $query);
                    if ($sql) {
                        $_SESSION['success']['message'] = "Successfully added";
                    } else {
                        $_SESSION['failure']['message'] = "Cannot be added please try again later";
                    }
}


?>


    <div class="row mb-30">


        <div class="col-md-12">
            <?php
            include('../assets/includes/message.php');
            ?>
        </div>


        <div class="col-md-12">
            <div class="password-panel">
                <div class="login-head">
                    <h1 class="text-center">Add Total Counts</h1>
                </div>
                <div class="login-body">
                    <form action="" method="post" >
                        <div class="form-group">
                            <label for="title">Title <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="number">Counts <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="number" name="number" required>
                        </div>


                        <button class="btn btn-primary" type="submit" name="submit">Add Counts</button>
                    </form>
                </div>
            </div>
        </div>
        <!--grid 12 ends-->
    </div>
    <!--row ends-->


<?php include '../assets/includes/be-footer.php'; ?>