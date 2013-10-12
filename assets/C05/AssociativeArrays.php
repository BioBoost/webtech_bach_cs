<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PHP Arrays</title>
    </head>
    <body>
        <?php
            // Creating an array
            $array = array(
                "foo" => "bar",
                "bar" => "foo",
            );
            echo '<pre>';
            var_dump($array);
            echo '</pre>';

            // Getting element from array
            $someValue = $array["foo"];
        ?>
    </body>
</html>



