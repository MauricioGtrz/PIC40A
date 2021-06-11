#!/usr/local/bin/php
<?php
    // either no session or not logged in
        ob_start();
        $outputName = $_GET['file']; 
        $file = "./uploads/" . $outputName;
        header("Content-Type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . $outputName . '"');
        readfile ($file);
        exit();
?>