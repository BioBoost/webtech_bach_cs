<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>GET version of a simple form</h1>

    <form method="get" action="Forms_GET.php">
        <p>
            <label>Name:
                <input type="text" name="txtName" maxlength="30">
            </label>
            <label>Name:
                <input type="text" name="txtName" maxlength="30">
            </label>
            <input type="hidden" name="txtHidden" value="aHiddenValue">
        </p>
        <p>
            <input type="submit" value="Submit">
            <input type="reset" value="Clear">
        </p>   
    </form>

    <div>
    <?php
        if (!empty($_GET['txtName']) && !empty($_GET['txtHidden']))
        {
            echo "You submitted the following values: ";
            echo "<p>Username: " . $_GET['txtName'] . "</p>";
            echo "<p>Hidden value: " . $_GET['txtHidden'] . "</p>";
        }
    ?>
    </div>
</body>
</html>