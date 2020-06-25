<?php

require 's3.php';

//Creating a presigned URL
$cmd = $s3->getCommand('GetObject', [
    'Bucket' => $config['s3']['bucket'],
    'Key' => 'uploads/ce3c608870e1881390d11bc354db43ee.mp4'
]);

$request = $s3->createPresignedRequest($cmd, '+20 minutes');

// Get the actual presigned-url
$presignedUrl = (string)$request->getUri();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XCOPET</title>

    <link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet" />

    <link href="https://unpkg.com/@videojs/themes@1/dist/sea/index.css" rel="stylesheet">

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
</head>
<body>
    <!-- <img src="<?php echo $presignedUrl; ?>"> -->
    
    <video
    oncontextmenu="return false;"
    id="my-video"
    class="video-js vjs-theme-sea"
    controls
    preload="auto"
    width="960"
    height="540"
    poster="https://img.youtube.com/vi/IaQ5rBS7-QA/maxresdefault.jpg"
    data-setup="{}"
  >
    <source src="<?php echo $presignedUrl; ?>" type="video/mp4" />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
  </video>

  <script src="https://vjs.zencdn.net/7.8.3/video.js"></script>

</body>
</html>