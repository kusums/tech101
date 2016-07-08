<?php
include("../assets/includes/be-header.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `workcategory` WHERE category_id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $category_id = $row['category_id'];
    $category_name = $row['category_name'];
   

} else {
    header("location: category.php");
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
                <h1 class="text-center">Update Category</h1>
            </div>
            <div class="login-body">
                <form action="update_category.php" method="post">
                    <input type="hidden" name="category_id" value="<?= $category_id; ?>">

                    <div class="form-group">
                        <label for="title">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name"
                               value="<?= $category_name; ?>" required>
                    </div>


                  <button class="btn btn-primary" type="submit" name="submit">Update Category</button>
                </form>
            </div>
        </div>
    </div>
    <!--grid 12 ends-->
</div>
<!--row ends-->


<?php include '../assets/includes/be-footer.php'; ?>
