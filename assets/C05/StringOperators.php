<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PHP Example Code</title>
    </head>
    <body>
        <?php
            $mystring = "Hello" . " World";
            $newstring = "Teacher says: ";
            $newstring .= $mystring . " to all programmers out there";
            
            echo '<p>' . $mystring . '</p>';
            echo '<p>' . $newstring . '</p>';
        ?>
    </body>
</html>
