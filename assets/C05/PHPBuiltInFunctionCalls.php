<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PHP Example Code</title>
    </head>
    <body>

<?php
$numbers = array(1, 2, 3, 4, 5);
echo '<p>' . 'Total sum of numbers: ' . array_sum($numbers) . '</p>';

$string = 'Aint no place like home.';
$hash = hash('md5', $string);
echo "<p>" . "The md5 hash for '$string' is '$hash'</p>";
?>
    </body>
</html>
