<?php include '../assets/includes/be-header.php'; ?>


    <div class="row">
        <div class="col-md-12">
            <?php
            include('../assets/includes/message.php');
            ?>
        </div>
    </div>


    <div class="row ">
        <div class="col-lg-12 mbt-50">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Newsletter Subscribers
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body table-responsive">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>S.N</th>

                                <th>Email</th>
                                <th data-sortable="false">Actions</th>


                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $query5 = "SELECT * FROM `tbl_subscribe` ORDER BY `subscribe_id` DESC";
                            $result5 = mysqli_query($con, $query5);
                            $count = 1;
                            if (mysqli_num_rows($result5) > 0) {
                                while ($row5 = mysqli_fetch_assoc($result5)) {
                                    $subscribe_id = $row5['subscribe_id'];

                                    $email = $row5['subscribe_email'];


                                    ?>

                                    <tr>
                                        <td>
                                            <div class="serial-num">
                                                <?= $count; ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="email">
                                                <?= $email; ?>

                                            </div>
                                        </td>
                                        <td>

                                            <div class="action-controller">


                                                <a href="#" class="btn btn-danger" data-toggle="modal"
                                                   data-target="#deletemodal<?= $subscribe_id; ?>" data-hover="tooltip"
                                                   data-placement="top" title="Delete"><i class="fa fa-trash-o"></i>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="deletemodal<?= $subscribe_id; ?>"
                                                     tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <div class="alert alert-danger delete_confirm">Are you
                                                                    sure you want to delete <?= $email; ?> ??
                                                                </div>
                                                            </div>
                                                            <div class="panel-footer delete_confirm_footer">
                                                                <a href="delete_subscribe.php?id=<?= $subscribe_id; ?>"
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


                                            </div>
                                            <!--action controller-->

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