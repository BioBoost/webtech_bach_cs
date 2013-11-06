<!DOCTYPE html>
<html>
<head>
    <title>Referer</title>
</head>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="submit" value="Show Referer">
    </form>

<?php
    if (strtolower($_SERVER['REQUEST_METHOD']) == "post")
    {
        echo "Referer: " . $_SERVER['HTTP_REFERER'];
    }
?>
</body>
</html>