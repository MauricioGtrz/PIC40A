#!/usr/local/bin/php
<?php
    ob_start();
    $outputName = "photo.png"; 
    $file = "./uploads/" . $_GET['file'];
    header("Content-Type: application/octet-stream");
    header('Content-Disposition: attachment; filename="' . $outputName . '"');
    readfile ($file);
    exit();
?>