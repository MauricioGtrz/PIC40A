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
    function validate($password, &$error){
        $fin = fopen('password.txt', 'r'); // open file to read
        $true_pass = fgets($fin); // get the line
        fclose($fin); // close the file
        $true_pass = trim($true_pass); // trim white space

        if($password === $true_pass){ // if they match, great
            $_SESSION['loggedin'] = true;
            header('Location: welcome.php');
        }
        else { // bad password
            $error = true;
        }
    }

    $error = false;
    if(isset($_POST['pass'])){ // if something was posted
        validate($_POST['pass'], $error); // check it
    }
  
    if( isset($_POST['add_php']) ){   //ensure was set
        $_COOKIE['type'] = 'php'; 
        setcookie('type', '', time()-1 );
        setcookie('type', 'php', time()+60);
        header('Location: index.php');
        exit;       
    }
    if( isset($_POST['remove_php']) ){
        unset( $_COOKIE['type'] );
        setcookie('type', '', time()-1 );
        header('Location: index.php');
        exit;    
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
    <form method="post" action="<?php echo $_SERVER ['PHP_Self'] ?>" >
        <label for="userEmail">Email:</label><br/>
        <input type="email" id="userEmail" name="userEmail" required/><br/>
        <label for="userPassword">Password:</label><br/>
        <input type="text" id="userPassword" name="userPassword" pattern="[A-Za-z\d]{6,}" required /> (At least 6 characters/digits)<br/>
        <input type="submit" value = "post" />
    </form>
    <p>
    <?php echo 'Email: ', $_POST['userEmail'], '<br/>','Password: ', $_POST['userPassword'],'<br/>'; ?>
    </p>

    <p>PHP Cookie: <?php 
    if( isset($_COOKIE['type']) ){
        echo $_COOKIE['type'];
    } ?></p>
    <p id="show_js"></p>
    <form method="post" action="<?php echo $_SEVER['PHP_SELF']; ?>" >
        <input type="submit" name="add_php" value="Add with PHP"/>
        <input type="submit" name="remove_php" value="Remove with PHP"/>
    </form>

    <form method = "post" action ="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="password" name="pass" /> <input type="submit" value="log in" />
        <?php if($error) { // wrong password ?>
        <p>Invalid password!</p> <?php
        } ?>
    </form>
</body>
</html>