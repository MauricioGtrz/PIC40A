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
        if( isset($_POST['img_upload_submit']) ){ // they did submit
            // echo "Thank you ", $_POST['user_name'], " for uploading ", $_POST['img_title'];
            $fileType = explode('.', $_FILES['user_file']['name']);
            $fileName = $_POST['img_title'].'.'.$fileType[1];
            $saveLocation = dirname(realpath(__FILE__)) . '/uploads/' . $fileName;

            $dir = "./uploads";
            $files = scandir($dir);
            if (array_search($fileName, $files) === false) {
                echo "Your image has been uploaded";
                move_uploaded_file($_FILES['user_file']['tmp_name'], $saveLocation);
                echo '<br /><img src="./uploads/'.$fileName.'" alt="Your Uploaded Image" class="uploaded_img">';    
            } else{
                echo "A photo named ".$fileName." already exists.";
                return;
            }

        }
        else{
            echo 'no file submitted';
        }
    ?>
</body>
</html>