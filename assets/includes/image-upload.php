<?php
// Image Compress
// compress_image($_FILES["file"]["tmp_name"], "newfilename.jpg", 20);
// Temporary Name , New Filename , Image Quality (0-100) 

function image_compress($source_url, $destination_url, $quality) {
    $info = getimagesize($source_url);
    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source_url);
    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source_url);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source_url);
     elseif ($info['mime'] == 'image/jpg')
        $image = imagecreatefromjpg($source_url);
     elseif ($info['mime'] == 'image/JPEG')
        $image = imagecreatefromJPEG($source_url);
     elseif ($info['mime'] == 'image/PNG')
        $image = imagecreatefromPNG($source_url);
     elseif ($info['mime'] == 'image/GIF')
         $image = imagecreatefromGIF($source_url);
     elseif ($info['mime'] == 'image/JPG')
         $image = imagecreatefromJPG($source_url);

        
    imagejpeg($image, $destination_url, $quality);
    return $destination_url;
}

// check if the target directory exists and is writable.
function check_dir($target_dir) {
    if (!is_dir($target_dir)) {
        $_SESSION['failure']['message'] .= "Upload directory does not exist.";
        $uploadOk = 0;
    }
    if (!is_writable($target_dir)) {
        $_SESSION['failure']['message'] .= "Upload directory is not writable.";
        $uploadOk = 0;
    }
}

// hashes file name with date
// 2016-04-07-31bac1fd7a62554a154a5fcaacd93957.jpg
function hash_filename($curr_filename){
    $file_extension = explode(".", $curr_filename);
    $new_filename = date('Y-m-d') . '-' . md5(uniqid(round(microtime(true)))) . '.' . end($file_extension);
    return $new_filename;
}