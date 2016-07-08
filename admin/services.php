<?php
include("../assets/includes/be-header.php");
include("../assets/includes/image-upload.php");
if (isset($_POST['submit'])) {
    
    $category = $_POST['category'];
    $title = $_POST['title'];
    $description = $_POST['tr_desc'];
   
    $img1 = $_FILES['img1']['name'];


    if (!empty($title) && !empty($description) && !empty($category) && !empty($img1) 
    ) {

        //Image Upload
        $target_dir = "../assets/images/services/";
        check_dir($target_dir);
        $quality = 40; //0-100
        $target_file1 = $target_dir . basename($img1);

        $uploadOk = 1;
        // Check if file already exists
        if (!file_exists($target_file1)) {
            $uploadOk = 1;
        } else {
            $_SESSION['failure']['message'] = "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check if image file is an actual image or fake image
        $check1 = getimagesize($_FILES['img1']['tmp_name']);

        if ($check1 !== false) {
            $uploadOk = 1;
        } else {
            $_SESSION['failure']['message'] = "File is not an image.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        $imageFileType1 = pathinfo($target_file1, PATHINFO_EXTENSION);

        if (
            $imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" &&
            $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF"


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
            $newfilename1 = hash_filename($img1);


            $uploadimg1 = image_compress($_FILES["img1"]["tmp_name"], $target_dir . $newfilename1, $quality);


            if ($uploadimg1) {

                $query = "INSERT INTO `Services` SET 
                		        title = '$title',
                                image = '$newfilename1',
                                description = '$description',
                                service_category = '".$category."'
                                   
                                ";
                $sql = mysqli_query($con, $query);
                if ($sql) {
                    $_SESSION['success']['message'] = "Successfully added";
                } else {
                    $_SESSION['failure']['message'] = "Cannot be added please try again later";
                    unlink($target_dir . $newfilename1);

                }
            } else {
                $_SESSION['failure']['message'] = "Sorry, there was an error uploading your file.";
            }
        }
        //Image Upload Ends
    } else {
        $_SESSION['failure']['message'] = "All the fields are required.";
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
                    <h1 class="text-center">Add Services</h1>
                </div>
                <div class="login-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="title">Service Name <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Service Category <span style="color:red">*</label>
                            <select class="form-control form-control2" name="category" id="category" required>
                                <option value="">Chooose Service Category</option>
                                <option value="Website Design">Website Design</option>
                                <option value="Graphics Design">Graphics Design</option>
                                 <option value="Digital Marketing">Digital Marketing</option>
                                <option value="Professional Photography">Professional Photography</option>
                            </select>
                        </div>

                       
                        <label for="img1">Image <span style="color:red">*</span></label>
                        <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-primary btn-file">
                                Browse&hellip; <input type="file" id="img1" name="img1" accept="image/*" required>
                            </span>
                        </span>
                            <input type="text" class="form-control" placeholder="Recommended Image Size = 370px X 400px"
                                   readonly>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="tr_desc"> Description <span style="color:red">*</span></label>
                            <textarea name="tr_desc" id="tr_desc" rows="10" class="form-control1"
                                      style="height:auto"></textarea>
                            <script src="../assets/ckeditor/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace('tr_desc');
                            </script>
                        </div>
                       

                          
                        </br>
                        <button class="btn btn-primary" type="submit" name="submit">Add Services</button>
                    </form>
                </div>
            </div>
        </div><!--grid 12 ends-->
    </div><!--row ends-->
<?php include '../assets/includes/be-footer.php'; ?>