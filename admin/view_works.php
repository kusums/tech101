<?php include("../assets/includes/be-header.php"); ?>
<div class="row">
    <div class="col-md-12">
        <?php
        include('../assets/includes/message.php');
        ?>
    </div>
</div>


<div class="row mt-80">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                View all Works
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SN.</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th data-sortable="false">Image</th>
                            <th data-sortable="false">Description</th>
                            <th data-sortable="false">Status</th>
                            <th data-sortable="false">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $query = "SELECT * FROM `works` ORDER BY `work_id` DESC";
                        $result = mysqli_query($con, $query);
                        $count = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $title = $row['title'];
                                $category_id = $row['category_id'];
                                $image = $row['image'];
                                $description = $row['description'];
                                $status = $row['status'];
                                $work_id= $row['work_id'];
                               
                                ?>
                                <tr>

                                    <td><?= $count; ?></td>
                                    <td><?= $title; ?></td>
                                    <td>
                                    <div class="category">
                                            <?php
                                            $sql = "SELECT * FROM `workcategory` WHERE `category_id` = '$category_id'";
                                            $output = mysqli_query($con, $sql);
                                            if (mysqli_num_rows($output) > 0) {
                                                while ($row2 = mysqli_fetch_assoc($output)) {
                                                    $category_name = $row2['category_name'];
                                                    ?>
                                                    <?= $category_name; ?>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        </td>
                                    <td><img src="../assets/images/works/<?= $image; ?>" height="120" width="120">
                                    </td>
                                    <td><?= $description; ?></td>
                                    <td><?= $status ; ?></td>
                                   

                                    <td width="120">
                                        <a href="edit_works.php?id=<?= $work_id; ?>" class="btn btn-success"
                                           data-hover="tooltip" data-placement="top" title="Edit"><i
                                                class="fa fa-pencil"></i> </a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                           data-target="#deletemodal<?= $work_id ; ?>" data-hover="tooltip"
                                           data-placement="top" title="Delete"><i class="fa fa-trash-o"></i> </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="deletemodal<?= $work_id ; ?>" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="alert alert-danger delete_confirm">Are you sure you
                                                            want to delete '<?= $title ; ?>'
                                                        </div>
                                                    </div>
                                                    <div class="panel-footer delete_confirm_footer">
                                                        <a href="delete_works.php?id=<?= $work_id ; ?>" type="button"
                                                           class="btn btn-danger"><i class="fa fa-check-square-o"></i>
                                                            Delete</a>
                                                        <a href="#" type="button" class="btn btn-default"
                                                           data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

