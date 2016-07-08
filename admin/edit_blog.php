<?php
$id = $_GET['id'];
?>

<?php
include("../assets/includes/be-header.php");
?>


<?php
$query = "SELECT * FROM `tbl_blog` WHERE bl_id = $id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$bl_id = $row['bl_id'];
$bl_title = $row['bl_title'];
$bl_desc = $row['bl_desc'];

$bl_img = $row['bl_img'];
$bl_guid = $row['bl_guid'];
$bl_date = $row['bl_date'];
$bl_time = $row['bl_time'];

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
                    <h1 class="text-center">Upload Blog</h1>
                </div>
                <div class="login-body">
                    <form action="edit_blog_action.php" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="bl_id" value="<?= $bl_id; ?>">

                        <div class="form-group">
                            <label for="bl_title">Title <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="bl_title" value="<?= $bl_title; ?>"
                                   name="bl_title" required>
                        </div>


                        <div class="form-group">
                            <label for="bl_desc">Description <span style="color:red">*</span></label>
                            <textarea name="bl_desc" id="bl_desc" rows="10" class="form-control1"
                                      style="height:auto"><?= $bl_desc; ?></textarea>
                            <script src="../assets/ckeditor/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace('bl_desc');
                            </script>
                        </div>

                        <div class="row mbt-30">


                            <input type="hidden" name="pic_old" value="<?= $bl_img; ?>">

                            <div class="col-md-3">
                                <label for="currentImg">Current Image <span style="color:red">*</span></label><br>
                                <img src="../assets/images/blog/<?= $bl_img; ?>" id="currentImg" width="100%">
                            </div>


                            <div class="col-md-9">

                                <label for="bl_img">Choose new pic if you want to replace <span
                                        style="color:red">*</span></label><br>

                                <div class="input-group">                                
                                <span class="input-group-btn">                                
                                    <span class="btn btn-primary btn-file">
                                        Browse&hellip; <input type="file" id="bl_img" name="img" accept="image/*">
                                    </span>
                                </span>
                                    <input type="text" class="form-control"
                                           placeholder="Recommended Image Size = 370px X 250px" readonly>
                                </div>

                            </div><!--grid 9 ends-->

                        </div><!--row ends-->


                        <div class="row">
                            <div class="col-md-6">
                                <label for="datetimepicker1">Date <span style="color:red">*</span></label>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="date" value="<?= $bl_date ?>"
                                               required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datetimepicker3">Time <span style="color:red">*</span></label>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker3'>
                                        <input type='text' class="form-control" name="time" value="<?= $bl_time ?>"
                                               required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                    </form>
                </div>
            </div>
        </div><!--grid 12 ends-->
    </div><!--row ends-->


<?php include '../assets/includes/be-footer.php'; ?>