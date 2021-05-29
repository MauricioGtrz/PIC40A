#!/usr/local/bin/php
<?php
  if( isset($_POST['add_php']) ){   
    //$_COOKIE['type'] = 'php'; 
    setcookie('type', '', time()-1 );
    setcookie('type', 'php', time()+60);
    header('Location: index.php');
    exit;       
  }
  if( isset($_POST['remove_php']) ){
    //unset( $_COOKIE['type'] );
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
    <link rel="stylesheet" href="style.css">
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
</body>
</html>