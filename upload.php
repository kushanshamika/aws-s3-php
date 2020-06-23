<?php

use Aws\S3\Exception\S3Exception;
require 's3.php';

if(isset($_FILES['file'])){

    $file = $_FILES['file'];

    // File details
    $name = $file['name'];
    $tmp_name = $file['tmp_name'];

    $extention = explode('.', $name);
    $extention = strtolower(end($extention));

    // Temp details
    $key = md5(uniqid());
    $tmp_file_name = "{$key}.{$extention}";
    $tmp_file_path = "uploads/{$tmp_file_name}";

    // Move the file
    move_uploaded_file($tmp_name, $tmp_file_path);

    try {
        //code...
        $s3->putObject([
            'Bucket' => $config['s3']['bucket'],
            'Key' => "uploads/{$tmp_file_name}",
            'Body' => fopen($tmp_file_path, 'rb'),
            'ACL'    => 'public-read'
        ]);

        // Remove the file
        unlink($tmp_file_path);

    } catch (S3Exception $th) {
        //throw $th;
        die($th);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XCOPET</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" >
    </form>
</body>
</html>