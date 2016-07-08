<?php
include("../assets/includes/be-header.php");
include("../assets/includes/image-upload.php");

if (isset($_POST['submit'])) {
    //Title
    $name = $_POST['name'];
    //Description
    $desc = $_POST['desc'];
   
    
    
    //image
    $img = $_FILES['img']['name'];
    if (!empty($name) && !empty($desc)  && !empty($img)) {
        
        $str = "SELECT * FROM `tbl_clients` where `name`='" . $name . "'";
        $result = mysqli_query($con, $str);
        $number = mysqli_num_rows($result);
        if ($number > 0) {
            $_SESSION['failure']['message'] = "Clients already exists.";
        } else {
        
        
            $target_dir = "../assets/images/clients/";
            check_dir($target_dir);
            $quality = 100; //0-100
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
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
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
                    
                   
                    
                    $query = "INSERT INTO `tbl_clients` SET
                                    name = '" . $name . "',
                                    description = '" . $desc . "',
                                    image = '" . $newfilename . "'
                                    
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
                <h1 class="text-center">Add Clients</h1>
            </div>
            <div class="login-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Full Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="title" name="name" required>
                    </div>
                    
                    <label for="img">Image  <span style="color:red">*</span></label>
                    <div class="input-group">
                       
                        <span class="input-group-btn">
                           
                            <span class="btn btn-primary btn-file">
                                Browse&hellip; <input type="file" id="img" name="img" accept="image/*" required>
                            </span>
                        </span>
                        <input type="text" class="form-control" placeholder="Recommended Image Size = 740px X 500px" readonly>
                    </div>
                    <br>

                    <div class="form-group">
                       <label for="desc">Description <span style="color:red">*</span></label>
                        <textarea name="desc" id="desc" rows="10" class="form-control1" style="height:auto"></textarea>
                        <script src="../assets/ckeditor/ckeditor.js"></script>
                                <script>
                                CKEDITOR.replace( 'desc' );
                        </script>
                    </div>
                    
                    
                 

                    <button class="btn btn-primary" type="submit" name="submit">Add Clients</button>
                </form>
            </div>
        </div>
    </div>
    <!--grid 12 ends-->
</div>
<!--row ends-->



<?php   include'../assets/includes/be-footer.php';   ?>