<?php
include("../assets/includes/be-header.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `counts` WHERE count_id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $count_id = $row['count_id'];
    $title = $row['title'];
    $number = $row['number'];


} else {
    header("location: counts.php");
    exit();
}
?>
    <div class="row">

        <div class="col-md-12">
            <?php
            include('../assets/includes/message.php');
            ?>
        </div>

        <div class="col-md-12">
            <div class="password-panel">
                <div class="login-head">
                    <h1 class="text-center">Update Counts</h1>
                </div>
                <div class="login-body">
                    <form action="update_counts.php" method="post" >

                        <input type="hidden" name="count_id" value="<?= $count_id; ?>">


                        <div class="form-group">
                            <label for="title">Title <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="<?= $title; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="number">Counts <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="number" name="number"
                                   value="<?= $number; ?>" required>
                        </div>

                       <button class="btn btn-primary" type="submit" name="submit">Update</button>
                    </form>
                </div>
            </div>
        </div><!--grid 12 ends-->
    </div><!--row ends-->
<?php include '../assets/includes/be-footer.php'; ?>