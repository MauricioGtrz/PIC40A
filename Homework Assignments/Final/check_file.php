#!/usr/local/bin/php
<?php
    
    $fileName = "./uploads/" . $_GET['file'];
    $max_time = 1.; // do not wait longer than 1 second
    $start = microtime(true);
    while( !file_exists($fileName) && microtime(true) - $start < $max_time){
        ;// do nothing...
    }
    echo (int) file_exists($fileName); // could return 1 or 0
    exit();
?>