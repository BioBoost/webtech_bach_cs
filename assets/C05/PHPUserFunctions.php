<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PHP Example Code</title>
    </head>
    <body>

<?php
function check_password($hash, $hashtype, $password)
{
    // Hash the plain password
    $userhash = hash($hashtype, $password);

    // Return if they match
    return ($userhash == $hash);
}

// Calling my custom function
if (check_password('beaecb055ddd74cc924af921daaf271e', 'md5', 'AC-DC kicks ass')) {
    echo '<p>Access allowed</p>';
}
else {
    echo '<p>Access denied</p>';
}
?>
    </body>
</html>
