<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PHP Example Code</title>
    </head>
    <body>

<?php
$myarray = array(1, 2, 3, 4);

echo '<h1>Without passing by reference:</h1>';
foreach ($myarray as $value) {
    $value = $value * 2;
}
echo '<pre>';
print_r($myarray);
echo '</pre>';

echo '<h1>With passing by reference:</h1>';
foreach ($myarray as &$value) {
    $value = $value * 2;
}
echo '<pre>';
print_r($myarray);
echo '</pre>';

?>
    </body>
</html>
