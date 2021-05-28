#!/usr/local/bin/php
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
        <input type="e" id="userEmail" name="userEmail" required/><br/>
        <label for="userPassword">Password:</label><br/>
        <input type="text" id="userPassword" name="userPassword" pattern="[A-Za-z\d]{6,}" required /> (At least 6 characters/digits)<br/>
        <input type="submit" value = "post" />
    </form>
    <p>
    <?php echo 'Email: ', $_POST['userEmail'], '<br/>','Password: ', $_POST['userPassword'],'<br/>'; ?>
    </p>
</body>
</html>