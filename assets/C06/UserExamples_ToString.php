<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <?php
        include("User.php");
        $mark = new User("15", "mark", "dfsd758435gfdfgd", "mark@nodomain.com");
        $sarah = new User("28", "sarah", "4s56sd4ew12cad4w", "sarah@something.com");
    ?>

    <p>
        <?php echo $mark; ?>
    </p>

    <p>
        <?php echo $sarah; ?>
    </p>
</body>
</html>