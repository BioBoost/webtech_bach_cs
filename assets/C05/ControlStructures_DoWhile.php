<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PHP Example Code</title>
    </head>
    <body>
<?php
    $x = 0;
    echo '<ul>';
    do
    {
        echo '<li>' . $x++ . '</li>';
    }
    while ($x < 10);
    echo '</ul>';
?>
    </body>
</html>
