<?php
include("../assets/includes/be-header.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `stories` WHERE stories_id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $stories_id = $row['stories_id'];
    $image = $row['image'];
    $title = $row['title'];
    $description = $row['description'];


} else {
    header("location: stories.php");
    exit();
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
                    <h1 class="text-center">Update Success Stories</h1>
                </div>
                <div class="login-body">
                    <form action="update_stories.php" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="stories_id" value="<?= $stories_id; ?>">


                        <div class="form-group">
                            <label for="title">Title <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="<?= $title; ?>" required>
                        </div>

                        <div class="row mbt-30">

                            <input type="hidden" name="img_old" value="<?= $image; ?>">

                            <div class="col-md-3">
                                <label for="currentImg">Current Image <span style="color:red">*</span></label><br>
                                <img src="../assets/images/stories/<?= $image; ?>" id="currentImg" width="100%">
                            </div>

                            <div class="col-md-9">

                                <label for="stories_img">Choose new pic if you want to replace</label><br>
                                <div class="input-group">                                
                                <span class="input-group-btn">                                
                                    <span class="btn btn-primary btn-file">
                                        Browse&hellip; <input type="file" id="stories_img" name="img" accept="image/*">
                                    </span>
                                </span>
                                    <input type="text" class="form-control"
                                           placeholder="Recommended Image Size = 150px X 150px" readonly>
                                </div>

                            </div><!--grid 9 ends-->

                        </div><!--row ends-->


                        <div class="form-group">
                            <label for="desc">Description <span style="color:red">*</span></label>
                            <textarea name="desc" id="news_desc" rows="10" class="form-control1"
                                      style="height:auto"><?= $description ; ?></textarea>
                            <script src="../assets/ckeditor/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace('desc');
                            </script>
                        </div>


                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                    </form>
                </div>
            </div>
        </div><!--grid 12 ends-->
    </div><!--row ends-->
<?php include '../assets/includes/be-footer.php'; ?>