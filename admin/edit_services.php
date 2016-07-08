<?php $id = $_GET['id']; ?>
<?php include("../assets/includes/be-header.php"); ?>


<?php
$query = "SELECT * FROM `services` WHERE service_id = $id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$title = $row['title'];
$description = $row['description'];
$image = $row['image'];
$category= $row['service_category'];
$service_id = $row['service_id'];



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
                    <h1 class="text-center">Update Services</h1>
                </div>
                <div class="login-body">
                    <form action="edit_service_action.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $service_id; ?>" name="service_id">

                        <div class="form-group">
                            <label for="title">Title <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $title; ?>"
                                   required>
                        </div>

                     
                          <div class="form-group">
                            <label for="category">Service Category</label>
                            <select class="form-control form-control2" name="category" id="category" required>
                                <option value="">Select Service Category</option>

                                <option <?php if ($category == 'Website Design') echo 'selected'; ?> value="Website Design">
                                   Website Design
                                </option>
                                <option <?php if ($category == 'Graphics Design') echo 'selected'; ?> value="Graphics Design">
                                   Graphics Design
                                </option>
                                <option <?php if ($category == 'Digital Marketing') echo 'selected'; ?> value="Digital Marketing">
                                   Digital Marketing
                                </option>
                                <option <?php if ($category == 'Professional Photography') echo 'selected'; ?> value="Professional Photography">
                                   Professional Photography
                                </option>
                            </select>
                        </div>

                      
                           <div class="row mbt-30">


                            <input type="hidden" name="img1old" value="<?= $image; ?>">

                            <div class="col-md-3">
                                <label for="currentImg">Current Image <span style="color:red">*</span></label><br>
                                <img src="../assets/images/services/<?= $image; ?>" id="currentImg" width="100%">
                            </div>


                            <div class="col-md-9">

                                <label for="img1">Choose new pic if you want to replace <span style="color:red">*</span></label><br>

                                <div class="input-group">                                
                                <span class="input-group-btn">                                
                                    <span class="btn btn-primary btn-file">
                                        Browse&hellip; <input type="file" id="img1" name="img1" accept="image/*">
                                    </span>
                                </span>
                                    <input type="text" class="form-control"
                                           placeholder="Recommended Image Size = 370px X 400px" readonly>
                                </div>

                            </div><!--grid 9 ends-->

                        </div><!--row ends-->


                        <div class="form-group">
                            <label for="tr_desc">Description <span style="color:red">*</span></label>
                        <textarea name="tr_desc" id="tr_desc" rows="10" class="form-control1" style="height:auto">
                            <?= $description; ?>
                        </textarea>
                            <script src="../assets/ckeditor/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace('tr_desc');
                            </script>
                        </div>

                      
                        

                        <button class="btn btn-primary" type="submit" name="submit">Update Services</button>
                    </form>
                </div>
            </div>
        </div><!--grid 12 ends-->
    </div><!--row ends-->


<?php include '../assets/includes/be-footer.php'; ?>