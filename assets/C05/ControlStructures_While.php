<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PHP Example Code</title>
    </head>
    <body>
<?php
    $array = array('test', 'some', 'stuff');
    while ($val = array_pop($array))
    {
        echo '<p>' . $val . '</p>';
    }
?>
    </body>
</html>
