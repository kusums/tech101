<?php include("../assets/includes/be-header.php"); ?>
<div class="row">
    <div class="col-md-12">
        <?php
        include('../assets/includes/message.php');
        ?>
    </div>
</div>

<div class="row mt-80">
    <div class="col-lg-12 table-responsive">
        <div class="panel panel-default">
            <div class="panel-heading">
                View Blogs
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>

                            <th data-sortable="false">Description</th>
                            <th data-sortable="false">Image</th>
                            <th data-sortable="false">Date</th>
                            <th data-sortable="false">Time</th>
                            <th data-sortable="false">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM `tbl_blog` ORDER BY `bl_id` DESC";
                        $result = mysqli_query($con, $query);
                        $count = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $bl_id = $row['bl_id'];
                                $bl_title = $row['bl_title'];

                                $bl_desc = $row['bl_desc'];
                                $bl_img = $row['bl_img'];
                                $bl_date = $row['bl_date'];
                                $bl_time = $row['bl_time'];
                                ?>


                                <tr>

                                    <td><?= $count; ?></td>
                                    <td><?= $bl_title; ?></td>

                                    <td><?= $bl_desc; ?></td>
                                    <td><img src="../assets/images/blog/<?= $bl_img; ?>" height="120" width="120"></td>
                                    <td class="title"><?= $bl_date; ?></td>

                                    <td><?= $bl_time; ?></td>
                                    <td width="120">

                                        <a href="edit_blog.php?id=<?= $bl_id; ?>" class="btn btn-success"
                                           data-hover="tooltip" data-placement="top" title="Edit"><i
                                                class="fa fa-pencil"></i> </a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                           data-target="#deletemodal<?= $bl_id; ?>" data-hover="tooltip"
                                           data-placement="top" title="Delete"><i class="fa fa-trash-o"></i> </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="deletemodal<?= $bl_id; ?>" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="alert alert-danger delete_confirm">Are you sure you
                                                            want to delete Title '<?= $bl_title; ?>'
                                                        </div>
                                                    </div>
                                                    <div class="panel-footer delete_confirm_footer">
                                                        <a href="delete_blog.php?id=<?= $bl_id; ?>" type="button"
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
