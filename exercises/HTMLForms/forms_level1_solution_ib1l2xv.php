<?php

if (!empty($_GET['username']) && !empty($_GET['passkey']))
{
    $passhash = hash('sha256', $_GET['passkey']);
    $username = $_GET['username'];
}
else
{
    $passhash = "";
    $username = "";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
    input[type="text"]
    {
        width: 600px;
    }
    </style>
</head>
<body>

    <form method="post" action="forms_level1.php">

        <div>
            <label>Please state your username:
                <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
            </label>
        </div>    
        <div>

            <label>This is your passwordhash:
                <input type="text" name="passwordhash" placeholder="Hash" value="<?php echo $passhash; ?>">
            </label>
        </div>        
        
        <input type="submit" value="Submit">
    </form>

</body>
</html>