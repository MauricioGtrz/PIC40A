#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $_POST['user_name']."'s", " photos"; ?></title>
</head>
<body class="<?php echo $_POST['color']; ?>">
    <main>
        <?php 
            $userName = $_POST['user_name'];

            $db = new SQLite3('uploads_database.db'); // opens or creates the database
            $statement = "SELECT * FROM uploads_table WHERE user_name = '$userName';";

            $run = $db->query($statement);
            if ($run){
                while($row = $run->fetchArray()){ // while still a row to parse
                    echo '<img src="'.$row['file_location'].'" alt="'.$row['upload_date'].'" title="'.$row['upload_date'].'" class="uploaded_img">', '<br />';
                    echo "<b>".$row['file_name']." has ".$row['file_views']." view(s)."."</b>"."<br />";
                    //echo $row['file_name'], '--', $row['user_name'], '--', $row['file_location'], '--', $row['file_views'], '--', $row['upload_date'], '<br/>'; // print all the data
                }
            }
        ?>
    </main>
</body>
</html>