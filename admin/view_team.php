<?php   include'../assets/includes/be-header.php';   ?>
        

            
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
                            View Team Members
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Full Name</th>
                                            <th data-sortable="false">Image</th>
                                            <th data-sortable="false">Description</th>
                                            
                                            <th data-sortable="false">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                       
                                       
                                   <?php
                                    $query = "SELECT * FROM `tbl_team` ORDER BY `team_id` DESC";
                                    $result = mysqli_query($con, $query);
                                    $count = 1;
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $team_id = $row['team_id'];
                                            $team_name = $row['name'];
                                            $team_desc = $row['description'];
                                            $team_img = $row['image'];
                                            
                                    ?>
                                      
                                       
                                       
                                       
                                        <tr>
                                            <td>
                                                <div class="serial-num">
                                                    <?= $count; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="title">
                                                    <?= $team_name; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="../assets/images/team/<?= $team_img; ?>" alt="<?= $team_img; ?>" width="120">
                                            </td>
                                            <td>
                                                <div class="desc">
                                                    <?= $team_desc; ?>
                                                </div>
                                            </td>
                                           
                                            
                                         
                                            <td>
                                                
                                                <div class="action-controller">

                                                    <a href="edit_team.php?id=<?=$team_id?>" class="btn btn-success" data-hover="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </a>

                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal<?= $team_id; ?>" data-hover="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i> </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deletemodal<?= $team_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">
                                                                    <div class="alert alert-danger delete_confirm">Are you sure you want to delete <?= $team_name; ?> ??</div>
                                                                </div>
                                                                <div class="panel-footer delete_confirm_footer">
                                                                    <a href="delete_team.php?id=<?= $team_id; ?>" type="button" class="btn btn-danger"><i class="fa fa-check-square-o"></i> Delete</a>
                                                                    <a href="#" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</a>
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
            
            
           
    
    
    
<?php   include'../assets/includes/be-footer.php';   ?>

