<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>POST version of a simple form</h1>

    <form method="post" action="Forms_POST.php">
        <p>
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
        if (!empty($_POST['txtName']) && !empty($_POST['txtHidden']))
        {
            echo "You submitted the following values: ";
            echo "<p>Username: " . $_POST['txtName'] . "</p>";
            echo "<p>Hidden value: " . $_POST['txtHidden'] . "</p>";
        }
    ?>
    </div>
</body>
</html>