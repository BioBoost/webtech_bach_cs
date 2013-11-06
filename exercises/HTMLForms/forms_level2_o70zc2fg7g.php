<?php
    $nextlevel = "forms_level3_kr9wxhv.php";
    $referer = "http://labict.be/20132014/kulab/webtechnology/exercises/HTMLForms/forms_level2_o70zc2fg7g.php";
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
echo $htmlhelper->getHeading("Welcome to level 2 of the webtechnology BrainHacker challenge.", 1);
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div>
        <label>Username:
            <input type="text" name="username" placeholder="username">
        </label>
    </div> 
    <div>
        <label>Passwordhash:
            <input type="text" name="passwordhash" placeholder="passwordhash">
        </label>
    </div>
    <input type="hidden" name="showdescription" value="false">
    <input type="submit" value="Hack it">
</form>

<?php
if (strtolower($_SERVER['REQUEST_METHOD']) == "get")
{

}
else if (strtolower($_SERVER['REQUEST_METHOD']) == "post")
{
    if (!isset($_POST['showdescription']))
    {
        echo $htmlhelper->getParagraph("Keep away from my hidden fields. I'm warning you. Dont remove them!", null, "fail");
    }
    else
    {
        if ($_POST['showdescription'] == 'true')
        {
            echo $htmlhelper->getHeading("Challenge description", 2, null, "succes");
            echo $htmlhelper->getParagraph("This challenge is a lot harder.");
            echo $htmlhelper->getParagraph("The only tip I can give you is that the server expects a sessionkey field.");
        }
    }

    if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] != $referer)
    {
        echo $htmlhelper->getParagraph("Request comming from unknown domain. Invalid referer.", null, "fail");
    }

    if (isset($_POST['sessionkey']))
    {
        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == $referer)
        {
            echo $htmlhelper->getParagraph("You successfully tampered with your post and spoofed your referer.", null, "succes");
            echo $htmlhelper->getParagraph("You are now allowed to access level 3: " . $htmlhelper->getAnchor($nextlevel, $nextlevel), null, "succes");
        }
        else
        {
            echo $htmlhelper->getParagraph("Post tampering detected from remote domain. Denying access.", null, "fail");
        }
    } 
}
else
{
    echo $htmlhelper->getParagraph("You are using the wrong request method. Detected: " . $_SERVER['REQUEST_METHOD'], null, "fail");
}

?>

</body>
</html>