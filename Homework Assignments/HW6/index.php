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
        $file = fopen('login.txt', 'r'); // open file to read
        $line = fgets($file); // get the line
        fclose($file); // close the file

        
        $true_login = trim($line); // trim white space
        $true_login = explode('\t', $true_login); // split line into an aray by \t
        
        $true_email = $true_login[0];
        $true_password = $true_login[1];

        if($email === $true_email && $password === $true_password){ // if they match, great
            $_SESSION['loggedin'] = true;
            header('Location: welcome.php');
        }
        else { // bad password
            $error = true;
        }
    }

    $error = false;
    if(isset($_POST['login'])){ // if something was posted
        validate($_POST['email'], $_POST['password'], $error); // check it
    }

    function message($email, $password){
        $hashed_password = hash('md2', $password);
        $message = "Validate by clicking here: https://www.pic.ucla.edu/~mauriciogtrz/HW6/validate.php?email=".$email."&hashed_password=".$hashed_password;
        mail($email, 'Subject Line', $message); //mauriciogtrz@g.ucla.edu
    }

    if(isset($_POST['register'])){
        message($_POST['email'], $_POST['password']);
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
        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email"/><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" pattern="[A-Za-z\d]{6,}" required /> (At least 6 characters/digits)<br>
        <input type="submit" value="register" name="register"  />
        <input type="submit" value="login" name="login" />
        <?php if($error) { // wrong password ?>
        <p>Invalid password!</p> <?php
        } ?>
    </form>
</body>
</html>