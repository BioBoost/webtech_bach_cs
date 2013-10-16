<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <?php
        include("User.php");
        // Instantiation
        $mark = new User("Mark", "sfd448rtre4dfs", "mark@gmail.com", 30);
        $ted = new User("Ted", "qr48yumnm154iuy", "ted@hotmail.com");
    ?>

    <p>
        <?php echo $mark; ?>
    </p>

    <p>
        <?php echo $sarah; ?>
    </p>
</body>
</html>