<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="check_onsubmit">
        <label for="name">Course Name:</label> <input type="text" name="name" id="name" />
        <br/>
        <label for="credit">Course Credits:</label> <input type="text" name="credit" id="credit" /> <br/>
        <label for="hour">Hour of Day:</label> <input type="text" name="hour" id="hour" /> <br/>
        <input type="button" value="Add Course" />
        <div id="confirm"></div>
    </form>

    <?php 
        if(isset($_POST['register'])){
            message($_POST['email'], $_POST['password']);
        }
        
        try{ // attempt to establish connection
            $mydb = new SQLite3('school.db'); // opens or creates the database
        }
            catch(Exception $ex){ // may throw
            echo $ex->getMessage();
        }

        // what we would write directly in the command line is in quotes

        $statement = 'CREATE TABLE IF NOT EXISTS courses(name TEXT, credits INTEGER, hourOfDay text);';

        $run = $mydb->query($statement); // run the command
    ?>
</body>
</html>