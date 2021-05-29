#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER ACCOUNT LOGIN SYSTEM</title>
</head>
<body>
    <?php 
        $email = $_GET['email']; //GETS variable from the URL
        $hashed_password = $_GET['hashed_password']; //GETS variable from the URL

        $file = fopen('login.txt', 'a'); // open file to append
        fwrite($file, $email.'\t'.$hashed_password.'\n'); // appent to file
        fclose($file); // close the file
        
    ?>
<p>You are now registered! Follow this link to login: <a href="https://www.pic.ucla.edu/~mauriciogtrz/HW6/index.php
">index.php</a></p>
<p><?php echo $email, ' ', $hashed_password?></p>
<!-- $file = fopen('login.txt', 'a'); // open file to append
        fwrite($file, $email.'\t'.$password);
        fclose($file); // close the file -->
</body>
</html>