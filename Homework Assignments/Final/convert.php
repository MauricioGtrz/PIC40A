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
    //check to see if form was submitted properly
    if(isset($_POST['convert']) && isset($_POST['radio_button'])){
        //initialize variables that hold file values
        $fileNames = $_FILES['their_files']['name'];
        $fileTempNames= $_FILES['their_files']['tmp_name'];
        $fileType = $_POST['radio_button'];
        
        //parse through all submitted files, convert, and download them
        for ($x = 0; $x < count($fileNames); $x++) {
                $saveLocation = dirname(realpath(__FILE__)) . '/uploads/' . $fileNames[$x];
                move_uploaded_file($fileTempNames[$x], $saveLocation);
                exec("mogrify -format $fileType $saveLocation");
                exec("rm -f $saveLocation");
                $fileExplode = explode('.', $fileNames[$x]);
                $fileBase = $fileExplode[0].'.'.$fileType;
                echo "<script>window.addEventListener('load', ()=>{ transform('$fileBase'); }) ;</script>";
        
        }
        echo "Congrats! You have successfully downloaded your files!";

    } 
    else{
        //if form was not submitted properly let user know
        echo "Choose a file type!";
    }
?>
</body>
</html>
