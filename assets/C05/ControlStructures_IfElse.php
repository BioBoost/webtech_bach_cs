<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PHP Example Code</title>
    </head>
    <body>
<?php
    $rnd = rand (0, 100);
    if ($rnd == 0 || $rnd == 100) {
        echo "<p>$rnd is limit value</p>";
    }
    else if ($rnd < 25) {
        echo "<p>$rnd is smaller than 25</p>";
    }
    else {
        echo "<p>$rnd is bigger than or equal to 25</p>";
    }
?>
    </body>
</html>
