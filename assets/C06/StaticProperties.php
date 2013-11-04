<?php
class SomeClass {
    // Static properties need to be initialized here (no object creation).
    private static $objectCount = 0;

    public function __construct() {
        self::$objectCount++;       // Update static property
    }

    public function __destruct() {
        self::$objectCount--;       // Update static property
    }

    public static function getObjectCount() {
        return self::$objectCount;
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <ul>
        <li>
            <?php
                echo "Object count: " . SomeClass::getObjectCount();
            ?>
        </li>
        <li>
            <?php
                $obj1 = new SomeClass();
                echo "Creating object. Object count: " . SomeClass::getObjectCount();
            ?>
        </li>
    </ul>
</body>
</html>
