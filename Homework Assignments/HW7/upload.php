#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo "Thank you, "." ".$_POST['user_name']."!"; ?></title>
</head>
<body>
    <?php
        $db = new SQLite3('uploads_database.db'); // opens or creates the database
        $db->query("CREATE TABLE IF NOT EXISTS uploads_table(file_name TEXT, user_name TEXT, file_location TEXT, file_views INTEGER, upload_date TEXT);");



        if( isset($_POST['img_upload_submit'])){ // they did submit
            $fileType = explode('.', $_FILES['user_file']['name']);
            $fileName = $_POST['img_title'].'.'.$fileType[1];
            $saveLocation = dirname(realpath(__FILE__)) . '/uploads/' . $fileName;
            
            $userName = $_POST['user_name'];
            $newFileName = $_POST['img_title'].'.png';
            $fileLocation = './uploads/'.$newFileName;

            $dir = "./uploads";
            $files = scandir($dir);
            if (array_search($newFileName, $files) === false) {
                date_default_timezone_set('America/Los_Angeles');
                $dateTime = date('d/m/Y').' '.date('H:i');
                echo "Your image has been uploaded at ", $dateTime;
                move_uploaded_file($_FILES['user_file']['tmp_name'], $saveLocation);
                exec("mogrify -format png $saveLocation");
                exec("rm -f ./uploads/".$fileName);
                echo '<br /><img src="./uploads/'.$newFileName.'" alt="Your Uploaded Image" class="uploaded_img">'; 
                
                // feeding variables into queries
                $entry_file_name = $newFileName;
                $entry_user_name = $userName;
                $entry_file_location = $fileLocation;
                $entry_file_views = 0;
                $entry_upload_date = $dateTime;

                $statement = "INSERT INTO uploads_table (file_name, user_name, file_location, file_views, upload_date) VALUES ('$entry_file_name', '$entry_user_name', '$entry_file_location', $entry_file_views,'$entry_upload_date');";
                $db->query($statement);
                $db->close();
            } else{
                echo "A photo named ".$newFileName." already exists.";
                return;
            }

        }
        else{
            echo 'no file submitted';
        }
    ?>
</body>
</html>