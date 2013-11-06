<?php
    $nextlevel = "forms_level2_o70zc2fg7g.php"
?>

<?php
include('HtmlHelper.php');
$htmlhelper = new HtmlHelper();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Webtechnology BrainHacker</title>
    <?php echo $htmlhelper->getStylesheetLink("style.css"); ?>
</head>
<body>

<?php
echo $htmlhelper->getHeading("Welcome to level 1 of the webtechnology BrainHacker challenge.", 1);
?>

<?php
if (strtolower($_SERVER['REQUEST_METHOD']) == "get")
{
    if (empty($_GET['firstname']))
    {
?>

<form method="get" action="forms_level1.php">
    <div>
        <label>Please state your first name (all lower case)
            <input type="text" name="firstname" placeholder="Firstname">
        </label>
    </div>    
    <input type="submit" value="Hack it">
</form>

<?php
    }
    else
    {
        echo $htmlhelper->getHeading("Challenge description", 2);
        echo $htmlhelper->getParagraph("This levels challenge consists of generating a post request to this exact location (forms_level1.php).");
        echo $htmlhelper->getParagraph("The post request should include a field 'username' and a field 'passwordhash'.
            The username is stated below this description and the passwordhash is a hash key generated from the passwordkey stated below.
            To get the hash use the php built in functions to generate a sha256 hash.");
?>

<p>
    Tips:
    <ul>
        <li>Make sure the fields have the exact names shown above.</li>
        <li>Make sure to generate a post request</li>
        <li>Make sure you are directing your post to the correct script</li>
    </ul>
</p>

<div>
    Information:
    <ul>
        <li>Username: <?php echo $_GET['firstname'] ?></li>
        <li>Passkey: <?php echo hash('md5', $_GET['firstname'] . "Hack the Planet")?></li>
    </ul>
</div>

<?php
    }   // else
}   // if($_SERVER['REQUEST_METHOD'] == "get")
else if (strtolower($_SERVER['REQUEST_METHOD']) == "post")
{
    // Check if student has met the requirements to pass to the next level
    if (!empty($_POST['username']) && !empty($_POST['passwordhash']))
    {
        $passkey = hash('md5', $_POST['username'] . "Hack the Planet");
        $hashkey = hash('sha256', $passkey);

        if ($hashkey == $_POST['passwordhash'])
        {
            echo $htmlhelper->getParagraph("Congrats! You succesfully completed this level.", null, "succes");
            echo $htmlhelper->getParagraph("You are now allowed access level 2: " . $htmlhelper->getAnchor($nextlevel, $nextlevel), null, "succes");
            ?>

            <div>
                <ul>
                    <li>Username: <?php echo $_POST['username']; ?></li>
                    <li>Hashkey: <?php echo $hashkey; ?></li>
                </ul>
            </div>

            <?php
        }
        else
        {
            echo $htmlhelper->getParagraph("Close but not correct yet.", null, "fail");
        }
    }
    else
    {
        echo $htmlhelper->getParagraph("Missing form fields.", null, "fail");
    }
}
else
{
    echo $htmlhelper->getParagraph("You are using the wrong request method. Detected: " . $_SERVER['REQUEST_METHOD'], null, "fail");
}
?>
</body>
</html>
