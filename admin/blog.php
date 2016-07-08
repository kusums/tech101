<?php
include("../assets/includes/be-header.php");
include("../assets/includes/image-upload.php");
if (isset($_POST['submit'])) {
    //Blog Title
    $bl_title = $_POST['bl_title'];
    //Blog Description Short

    //Blog Description Long
    $bl_desc = $_POST['bl_desc'];
    $time = $_POST['time'];
    //Date
    $date = $_POST['date'];
    //image
    $img = $_FILES['img']['name'];
    if (!empty($bl_title) && !empty($bl_desc) && !empty($img) && !empty($date) && !empty($time)) {
        $target_dir = "../assets/images/blog/";
        check_dir($target_dir);
        $quality = 40; //0-100
        $target_file = $target_dir . basename($img);
        $uploadOk = 1;
        // Check if file already exists
        if (!file_exists($target_file)) {
            $uploadOk = 1;
        } else {
            $_SESSION['failure']['message'] = "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES['img']['tmp_name']);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $_SESSION['failure']['message'] = "File is not an image.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
            && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF"
        ) {
            $_SESSION['failure']['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        } else {
            $uploadOk = 1;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $_SESSION['failure']['message'] = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            $newfilename = hash_filename($img);
            $uploadimg = image_compress($_FILES["img"]["tmp_name"], $target_dir . $newfilename, $quality);
            if ($uploadimg) {

                function GUID()
                {
                    if (function_exists('com_create_guid') === true) {
                        return trim(com_create_guid(), '{}');
                    }
                    return sprintf('%04X%02X', mt_rand(0, 65535), mt_rand(0, 65535));
                }

                $bl_guid = GUID();

                $query = "INSERT INTO `tbl_blog` SET 
                                bl_title = '$bl_title',
                                bl_img ='$newfilename',
                                bl_date = '" . $date . "',
                                bl_time = '" . $time . "',
                                bl_desc = '$bl_desc',
                                bl_guid = '$bl_guid'
                                ";


                $sql = mysqli_query($con, $query);
                if ($sql) {
                    $_SESSION['success']['message'] = "Successfully added";
                } else {
                    unlink($target_dir . $newfilename);
                    $_SESSION['failure']['message'] = "Cannot be added please try again later";
                }
            } else {
                $_SESSION['failure']['message'] = "Sorry, there was an error uploading your file.";
            }
        }
    }
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
                    <h1 class="text-center">Write A Blog</h1>
                </div>
                <div class="login-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="bl_title">Title <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="bl_title" name="bl_title" required>
                        </div>


                        <label for="bl_img">Image <span style="color:red">*</span></label>
                        <div class="input-group">
                       
                        <span class="input-group-btn">
                           
                            <span class="btn btn-primary btn-file">
                                Browse&hellip; <input type="file" id="bl_img" name="img" accept="image/*" required>
                            </span>
                        </span>
                            <input type="text" class="form-control" placeholder="Recommended Image Size = 370px X 250px"
                                   readonly>
                        </div>
                        <br>


                        <div class="form-group">
                            <label for="bl_desc">Description</label>
                            <textarea name="bl_desc" id="bl_desc" rows="10" class="form-control1"
                                      style="height:auto"></textarea>
                            <script src="../assets/ckeditor/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace('bl_desc');
                            </script>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="datetimepicker1">Date <span style="color:red">*</span></label>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="date" required/>
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
                                        <input type='text' class="form-control" name="time" required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit" name="submit">Post Blog</button>
                    </form>
                </div>
            </div>
        </div><!--grid 12 ends-->
    </div><!--row ends-->
<?php include '../assets/includes/be-footer.php'; ?>