<?php

if (!empty($_GET['refererer']))
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost/webtech_bach_cs/exercises/HTMLForms/forms_level2_o70zc2fg7g.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_REFERER, 'http://labict.be/20132014/kulab/webtechnology/exercises/HTMLForms/forms_level2_o70zc2fg7g.php');

    $data = array(
        'showdescription' => 'true',
        'sessionkey' => 'fgfdgtrterttfgdfggsdf'
    );

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $output = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
}

?>

<?php
    if (isset($output))
    {
        echo $output;
    }
    else
    {
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
    input[type="text"]
    {
        width: 600px;
    }
    </style>
</head>
<body>

    <form method="post" action="forms_level2_o70zc2fg7g.php">
        <input type="hidden" name="showdescription" value="true">
        <input type="hidden" name="sessionkey" value="fgfdgtrterttfgdfggsdf">
        <input type="submit" value="Hack the Site">
    </form>

    <div>

    </div>

</body>
</html>
<?php 
    }
?>