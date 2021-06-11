#!/usr/local/bin/php
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

    if(isset($_POST['submit']) && isset($_POST['radio_button'])){
        $fileNames = $_FILES['their_files']['name'];
        $fileTempNames= $_FILES['their_files']['tmp_name'];
        $fileType = $_POST['radio_button'];
        
        //eader("Content-Type: application/octet-stream");
        for ($x = 0; $x < count($fileNames); $x++) {
            
                $saveLocation = dirname(realpath(__FILE__)) . '/uploads/' . $fileNames[$x];
                move_uploaded_file($fileTempNames[$x], $saveLocation);
                exec("mogrify -format $fileType $saveLocation");
                exec("rm -f $saveLocation");
                //echo "The name is: $fileNames[$x] <br>";
                $fileExplode = explode('.', $fileNames[$x]);
                $fileBase = $fileExplode[0].'.'.$fileType;
                echo "<script>window.addEventListener('load', ()=>{ transform('$fileBase'); }) ;</script>";
        
        }
        echo "Congrats! You have successfully downloaded your files!";

        // $fileType = $_POST['radio_button'];
        // echo $fileType;
        //echo $_POST['radio_button'];

    } 
    else{
        echo "Choose a file type!";
    }
?>
</body>
</html>
