#!/usr/local/bin/php
<?php 
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        ob_start();
        $outputName = "photo.png"; 
        $file = "./uploads/" . $_GET['file'];
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
    <link rel="stylesheet" href="style.css">
    <script src="./app.js" defer></script>
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
                    echo '<img src="'.$row['file_location'].'" alt="'.$row['upload_date'].'" title="'.$row['upload_date'].'" id= "'.$row['file_fullname'].'">', '<br />';
                    echo "<b>".$row['file_name']." has ".$row['file_views']." view(s)."."</b>"."<br />";
                    
                    $file_name = $row['file_name'];
                    $updated_file_views = ++$row['file_views'];
                    $db->query("UPDATE uploads_table SET file_views= $updated_file_views WHERE user_name= '$userName' AND file_name= '$file_name';");
                    //echo $row['file_name'], '--', $row['user_name'], '--', $row['file_location'], '--', $row['file_views'], '--', $row['upload_date'], '<br/>'; // print all the data
                }
            }
            $db->close();
        ?>
    </main>
</body>
</html>