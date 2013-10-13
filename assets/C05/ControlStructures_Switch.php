<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PHP Example Code</title>
    </head>
    <body>

<?php
    $rnd = rand (0, 2);
    switch ($rnd) {
        case 0:
        case 2:
            echo "<p>$rnd is limit value</p>";
            break;
        case 1:
            echo "<p>rnd is 1</p>";
            break;      
        default:
            echo "<p>rnd is out of range</p>";
            break;
    }
?>
    </body>
</html>
