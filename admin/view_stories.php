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
                View all Success Stories
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body table-responsive">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th data-sortable="false">Image</th>
                            <th data-sortable="false">Description</th>

                            <th data-sortable="false">Actions</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php
                        $query = "SELECT * FROM `stories` ORDER BY `stories_id` DESC";
                        $result = mysqli_query($con, $query);
                        $count = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $stories_id = $row['stories_id'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $image = $row['image'];

                                ?>


                                <tr>
                                    <td>
                                        <div class="serial-num">
                                            <?= $count; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="title">
                                            <?= $title; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../assets/images/stories/<?= $image; ?>" alt="<?= $image; ?>"
                                             width="120">
                                    </td>
                                    <td>
                                        <div class="desc">
                                            <?= $description; ?>
                                        </div>
                                    </td>


                                    <td>

                                        <div class="action-controller">

                                            <a href="edit_stories.php?id=<?= $stories_id ?>" class="btn btn-success"
                                               data-hover="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-pencil"></i> </a>

                                            <a href="#" class="btn btn-danger" data-toggle="modal"
                                               data-target="#deletemodal<?= $stories_id; ?>" data-hover="tooltip"
                                               data-placement="top" title="Delete"><i class="fa fa-trash-o"></i> </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deletemodal<?= $stories_id; ?>" tabindex="-1"
                                                 role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="alert alert-danger delete_confirm">Are you sure
                                                                you want to delete <?= $title; ?> ??
                                                            </div>
                                                        </div>
                                                        <div class="panel-footer delete_confirm_footer">
                                                            <a href="delete_stories.php?id=<?= $stories_id; ?>"
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

