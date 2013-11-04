<?php
class SubObject {
    public $someValue;
    public function __construct() {
        $this->someValue = 0;
    }
}

class MyCloneable {
    public $object1;
    public $object2;

    public function __construct() {
        $this->object1 = new SubObject();
        $this->object2 = new SubObject();
    }

    public function __clone() {
        // Force clones
        $this->object1 = clone $this->object1;
        $this->object2 = clone $this->object2;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
    .info
    {
        color: blue;
    }
    .same
    {
        background-color: lime;
        /*color: lime;*/
    }
    .notsame
    {
        background-color: red;
        /*color: red;*/
    }
    </style>
</head>
<body>

<?php
    $obj = new MyCloneable();
    $objRef = $obj;

    print "<p class='info'>objRef = obj;</p>";

    if ($obj == $objRef)
        print "<p class='same'>objRef == obj: " . "TRUE" . "</p>";
    else
        print "<p class='notsame'>objRef == obj: " . "FALSE" . "</p>";

    if ($obj === $objRef)
        print "<p class='same'>objRef === obj: " . "TRUE" . "</p>";
    else
        print "<p class='notsame'>objRef === obj: " . "FALSE" . "</p>";
?>

<?php
    $obj = new MyCloneable();
    $objRef = clone $obj;

    print "<p class='info'>objRef = clone obj;</p>";

    if ($obj == $objRef)
        print "<p class='same'>objRef == obj: " . "TRUE" . "</p>";
    else
        print "<p class='notsame'>objRef == obj: " . "FALSE" . "</p>";

    if ($obj === $objRef)
        print "<p class='same'>objRef === obj: " . "TRUE" . "</p>";
    else
        print "<p class='notsame'>objRef === obj: " . "FALSE" . "</p>";
?>

<?php
    $obj = new MyCloneable();
    $objRef = clone $obj;
    $obj->object1->someValue = 25;

    print "<p class='info'>objRef = clone obj;</p>";
    print "<p class='info'>Also changed object1->somevalue of obj</p>";

    if ($obj == $objRef)
        print "<p class='same'>objRef == obj: " . "TRUE" . "</p>";
    else
        print "<p class='notsame'>objRef == obj: " . "FALSE" . "</p>";

    if ($obj === $objRef)
        print "<p class='same'>objRef === obj: " . "TRUE" . "</p>";
    else
        print "<p class='notsame'>objRef === obj: " . "FALSE" . "</p>";
?>

</body>
</html>