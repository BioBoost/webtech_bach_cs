<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PHP Arrays</title>
    </head>
    <body>
        <?php
            // Creating a multidimensional array
            $array = array(
                "foo" => "bar",
                42    => 24,
                "multi" => array(
                     "dimensional" => array(
                         "array" => "foo"
                     )
                )
            );

            // Getting element from array
            echo '<pre>';
            var_dump($array["foo"]);
            var_dump($array[42]);
            var_dump($array["multi"]["dimensional"]["array"]);
            echo '</pre>';
        ?>
    </body>
</html>






