<?php
include("../assets/includes/be-header.php");

if (isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];
 
    $query = "INSERT INTO `workcategory` SET
                                    category_name = '" . $category_name . "'
                                    ";
    $sql = mysqli_query($con, $query);
    if ($sql) {
        $_SESSION['success']['message'] = "Successfully added.";
    } else {
        $_SESSION['failure']['message'] = "Cannot be added please try again later.";
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
                    <h1 class="text-center">Add Category</h1>
                </div>
                <div class="login-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Category Name <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="category_name" name="category_name" required>
                        </div>


                        <button class="btn btn-primary" type="submit" name="submit">Add Category</button>
                    </form>

                </div>
            </div>
        </div>
        <!--grid 12 ends-->
    </div>
    <!--row ends-->


    <div class="row ">
        <div class="col-lg-12 mbt-50">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Category
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body table-responsive">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th data-sortable="false">Category Name</th>
                                <th data-sortable="false">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $query = "SELECT * FROM `workcategory` ORDER BY `category_id` DESC";
                            $result = mysqli_query($con, $query);
                            $count = 1;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $category_id = $row['category_id'];
                                    $category_name = $row['category_name'];
                                   
                                    ?>


                                    <tr>
                                        <td><?= $count; ?></td>
                                        <td><?= $category_name; ?></td>
                                       


                                        <td width="85">

                                            <a href="edit_category.php?id=<?= $category_id; ?>" class="btn btn-success"
                                               data-hover="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-pencil"></i> </a>

                                            <a href="#" class="btn btn-danger" data-toggle="modal"
                                               data-target="#deletemodal<?= $category_id; ?>" data-hover="tooltip"
                                               data-placement="top" title="Delete"><i class="fa fa-trash-o"></i> </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deletemodal<?= $category_id; ?>" tabindex="-1"
                                                 role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="alert alert-danger delete_confirm">Are you sure
                                                                you want to delete <?= $category_name; ?> ???
                                                            </div>
                                                        </div>
                                                        <div class="panel-footer delete_confirm_footer">
                                                            <a href="delete_category.php?id=<?= $category_id; ?>"
                                                               type="button" class="btn btn-danger"><i
                                                                    class="fa fa-check-square-o"></i> Delete</a>
                                                            <a href="#" type="button" class="btn btn-default"
                                                               data-dismiss="modal"><i class="fa fa-close"></i>
                                                                Cancel</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--modal ends-->


                                        </td>
                                    </tr>
                                    <?php
                                    $count++;
                                }
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>


<?php include '../assets/includes/be-footer.php'; ?>