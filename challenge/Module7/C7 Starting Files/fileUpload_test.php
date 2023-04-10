<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $upload_dir = 'uploads/';
    $allowed_file_types = array('jpg', 'png', 'gif', 'pdf');
    $thumbnail_width = 50;
    $medium_width = 400;
    
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $file_size = $file['size'];
    $file_tmp_name = $file['tmp_name'];
    
    if (in_array($file_type, $allowed_file_types) && $file_size > 0) {
        $file_name_without_ext = pathinfo($file_name, PATHINFO_FILENAME);
        $file_name_original = $file_name_without_ext . '.' . $file_type;
        $file_name_medium = $file_name_without_ext . '_medium.' . $file_type;
        $file_name_thumbnail = $file_name_without_ext . '_thumbnail.' . $file_type;
        
        move_uploaded_file($file_tmp_name, $upload_dir . $file_name_original);
        
        if ($file_type == 'jpg' || $file_type == 'jpeg') {
            $image = imagecreatefromjpeg($upload_dir . $file_name_original);
        } else if ($file_type == 'png') {
            $image = imagecreatefrompng($upload_dir . $file_name_original);
        } else if ($file_type == 'gif') {
            $image = imagecreatefromgif($upload_dir . $file_name_original);
        } else {
            // PDF file, no need to resize
            exit;
        }
        
        $thumbnail_image = imagescale($image, $thumbnail_width);
        $medium_image = imagescale($image, $medium_width);
        
        imagejpeg($image, $upload_dir . $file_name_original);
        imagejpeg($medium_image, $upload_dir . $file_name_medium);
        imagejpeg($thumbnail_image, $upload_dir . $file_name_thumbnail);
        
        imagedestroy($image);
        imagedestroy($medium_image);
        imagedestroy($thumbnail_image);
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" accept=".jpg, .jpeg, .png, .gif, .pdf">
    <input type="submit" value="Upload">
</form>
