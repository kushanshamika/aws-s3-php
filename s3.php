<?php

use Aws\S3\S3Client;

require 'aws/aws-autoloader.php';
$config = require('config.php');

$s3 = S3Client::factory([
    'credentials' => array(
        'key' => $config['s3']['key'],
        'secret'  => $config['s3']['secret'],
    ),
    'bucket' => $config['s3']['bucket'],
    'region' => $config['s3']['region'],
    'version' => $config['s3']['version'],
    'endpoint' => $config['s3']['endpoint'] // Required only for Digitalocean spaces
])

?>