#!/usr/local/bin/php
<?php 
    //ig get request is made then get file name and download it as photo.png
    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        ob_start();
        $outputName = $_GET['file']; 
        $file = "./uploads/" . $outputName;
        header("Content-Type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . $outputName . '"');
        readfile ($file);
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="app.js" defer></script>
    <title>Document</title>
</head>
<body>
<?php 
    if(isset($_POST['submit'])){
        $fileNames = $_FILES['their_files']['name'];
        $fileTempNames= $_FILES['their_files']['tmp_name'];
        
        //eader("Content-Type: application/octet-stream");
        for ($x = 0; $x < count($fileNames); $x++) {
            
                $saveLocation = dirname(realpath(__FILE__)) . '/uploads/' . $fileNames[$x];
                move_uploaded_file($fileTempNames[$x], $saveLocation);
                exec("mogrify -format png $saveLocation");
                exec("rm -f $saveLocation");
                //header('Content-Disposition: attachment; filename="' . $fileNames[$x] . '"');
                echo "The name is: $fileNames[$x] <br>";
                $fileExplode = explode('.', $fileNames[$x]);
                $fileBase = $fileExplode[0].'.png';
                echo "<script>window.addEventListener('load', ()=>{ transform('$fileBase'); }) ;</script>";
        
        }

        // $fileType = $_POST['radio_button'];
        // echo $fileType;
        echo $_POST['radio_button'];

    } 
?>
</body>
</html>
