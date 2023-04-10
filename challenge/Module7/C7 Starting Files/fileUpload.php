<?php

/*******w******** 
    
    Name: Eunice Perez  
    Date: March 23, 2023
    Description: Program to Upload files

****************/
// file_upload_path() - Safely build a path String that uses slashes appropriate for our OS.
    // Default upload path is an 'uploads' sub-folder in the current folder.
    function file_upload_path($original_filename, $upload_subfolder_name = 'uploads') {
        $current_folder = dirname(__FILE__);
        
        // Build an array of paths segment names to be joins using OS specific slashes.
        $path_segments = [$current_folder, $upload_subfolder_name, basename($original_filename)];
        
        // The DIRECTORY_SEPARATOR constant is OS specific.
        return join(DIRECTORY_SEPARATOR, $path_segments);
     }
 
     // file_is_an_image() - Checks the mime-type & extension of the uploaded file for "image-ness".
    
     function file_is_an_image($temporary_path, $new_path) {
        $allowed_mime_types      = ['image/gif', 'image/jpeg', 'image/png', 'application/pdf'];
        $allowed_file_extensions = ['gif', 'jpg', 'jpeg', 'png', 'pdf'];
        
        $actual_file_extension   = pathinfo($new_path, PATHINFO_EXTENSION);
        $actual_mime_type        = mime_content_type($temporary_path);
        
        $file_extension_is_valid = in_array($actual_file_extension, $allowed_file_extensions);
        $mime_type_is_valid      = in_array($actual_mime_type, $allowed_mime_types);
        
        return $file_extension_is_valid && $mime_type_is_valid;
    }    
    
     //  function file_is_an_image($temporary_path, $new_path) {
    //      $allowed_mime_types      = ['image/gif', 'image/jpeg', 'image/png'];
    //      $allowed_file_extensions = ['gif', 'jpg', 'jpeg', 'png'];
         
    //      $actual_file_extension   = pathinfo($new_path, PATHINFO_EXTENSION);
    //      $actual_mime_type        = getimagesize($temporary_path)['mime'];
         
    //      $file_extension_is_valid = in_array($actual_file_extension, $allowed_file_extensions);
    //      $mime_type_is_valid      = in_array($actual_mime_type, $allowed_mime_types);
         
    //      return $file_extension_is_valid && $mime_type_is_valid;
    //  }
     
     $image_upload_detected = isset($_FILES['image']) && ($_FILES['image']['error'] === 0);
     $upload_error_detected = isset($_FILES['image']) && ($_FILES['image']['error'] > 0);
 
     if ($image_upload_detected) { 
         $image_filename        = $_FILES['image']['name'];
         $temporary_image_path  = $_FILES['image']['tmp_name'];
         $new_image_path        = file_upload_path($image_filename);
         if (file_is_an_image($temporary_image_path, $new_image_path)) {
             move_uploaded_file($temporary_image_path, $new_image_path);
         }
     }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My File Upload Challenge</title>
</head>
<body>
    <!-- 
        Create a form capable of uploading a single image
        This form should POST to itself (action="fileUpload.php")
    -->

    <form method='post' enctype='multipart/form-data'>
         
            <!-- <div>
                <p><label for="title">Photo Title</label></p>
                <p><input type="text" id="title" name="title"><p>
            </div> -->

        <label for='image'>Image Filename:</label>
        <input type='file' name='image' id='image'>      




         <input type='submit' name='submit' value='Upload Image'>
     </form>
     
    <?php if ($upload_error_detected): ?>

        <p>Error Number: <?= $_FILES['image']['error'] ?></p>

    <?php elseif ($image_upload_detected): ?>

        <p>Client-Side Filename: <?= $_FILES['image']['name'] ?></p>
        <p>Apparent Mime Type:   <?= $_FILES['image']['type'] ?></p>
        <p>Size in Bytes:        <?= $_FILES['image']['size'] ?></p>
        <p>Temporary Path:       <?= $_FILES['image']['tmp_name'] ?></p>

    <?php endif ?>


    
</body>
</html>