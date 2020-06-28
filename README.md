# AWS-S3 PHP Code Sample

Upload statics files 📁 from your PHP code to AWS S3 bucket ☁️

[Official Documentation](https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/getting-started_index.html)

## Step by step explenation 

* [Introduction](https://www.youtube.com/watch?v=xkSIBeS_M7w)
* [SDK Setup](https://www.youtube.com/watch?v=HDxCDdZFh9g)
* [Uploading Files](https://www.youtube.com/watch?v=BR787aefMfY)
* [Listing Files](https://www.youtube.com/watch?v=lnCcd-L250E)
* [Tokenising Download URLs](https://www.youtube.com/watch?v=8s2vvKqybms)

## config.php

```PHP
return [
    's3' => [
        'key' => $AWS_KEY,       // AWS IAM Roles for S3 bucket
        'secret' => $AWS_SECRET,
        'bucket' => 'xcopet',
        'region' => 'ap-south-1',
        'version' => 'latest',
        'endpoint' => 'https://sgp1.digitaloceanspaces.com' // Required only for Digitalocean spaces
    ]
]
```