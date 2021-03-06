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
        $db->query("CREATE TABLE IF NOT EXISTS uploads_table(file_name TEXT, user_name TEXT, file_location TEXT, file_views INTEGER, upload_date TEXT, file_fullname TEXT);");



        if( isset($_POST['img_upload_submit'])){ // they did submit a photo to the database
            //configure image name and set its location/directory in the server
            $fileType = explode('.', $_FILES['user_file']['name']);
            $fileName = $_POST['img_title'].'.'.$fileType[1];
            $saveLocation = dirname(realpath(__FILE__)) . '/uploads/' . $fileName;
            
            //initialize entry values for the database
            $userName = $_POST['user_name'];
            $newFileName = $_POST['img_title'];
            $newFileFullname = $_POST['img_title'].'.png';
            $fileLocation = './uploads/'.$newFileName;

            $dir = "./uploads";
            $files = scandir($dir);

            //check to see if img being uploaded already exist
            if (array_search($newFileFullname, $files) === false) {
                //if not then upload/convert image image
                date_default_timezone_set('America/Los_Angeles');
                $dateTime = date('d/m/Y').' '.date('H:i');
                echo "Your image has been uploaded.";
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
                $entry_file_fullname = $newFileFullname;

                //insert all initialized variables to database
                $statement = "INSERT INTO uploads_table (file_name, user_name, file_location, file_views, upload_date, file_fullname) VALUES ('$entry_file_name', '$entry_user_name', '$entry_file_location', $entry_file_views, '$entry_upload_date', '$entry_file_fullname');";
                $db->query($statement);
                $db->close();
            } else{
                //if image already exists retrive name of user who uploaded it and send message saying that name is taken by this user
                $statement = "SELECT user_name FROM uploads_table WHERE file_name = '$newFileName';";
                $run = $db->query($statement);
                $get_name = $run->fetchArray();
                echo "A photo named ".$newFileName." by ".$get_name['user_name']." already exists.";
                $db->close();
                return;
            }

        }
        else{
            //if no file is submitted fall back to this
            echo 'no file submitted';
        }
    ?>
</body>
</html>