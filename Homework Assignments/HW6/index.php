#!/usr/local/bin/php
<?php
    session_save_path(dirname(realpath(__FILE__)) . '/sessions/');
    session_name('LoggedinSession'); // name the session
    session_start(); // start a session
    $_SESSION['loggedin'] = false; // have not logged in
    /**
    This function validates a password and sets the $_SESSION token to true
    if it is correct, logging them in and sending them to the welcome page.
    Otherwise it flags $error as true.

    @param string $password the password the user entered
    @param boolean $error the error flag to possibly change
    */
    function validate($email, $password, &$error){
        $file = fopen('password.txt', 'r'); // open file to read
        $line = fgets($file); // get the line
        fclose($file); // close the file
        $true_login = trim($line); // trim white space

        if($email === 'bobsmith@gmail.com' && $password === $true_login){ // if they match, great
            $_SESSION['loggedin'] = true;
            header('Location: welcome.php');
        }
        else { // bad password
            $error = true;
        }
    }

    $error = false;
    if(isset($_POST['password'])){ // if something was posted
        validate($_POST['email'], $_POST['password'], $error); // check it
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER ACCOUNT LOGIN SYSTEM</title>
</head>
<body>
    <form method = "post" action ="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="email" name="email" />
        <input type="password" name="password" />
        <input type="submit" value="log in" />
        <?php if($error) { // wrong password ?>
        <p>Invalid password!</p> <?php
        } ?>
    </form>
</body>
</html>