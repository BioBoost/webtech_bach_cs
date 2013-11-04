<?php


interface ICreature {
    public function showYourself();
}

class SpaceCreature implements ICreature {
    public function showYourself() {
        return "I am a SpaceCreature";
    }
}

class SpaceMan extends SpaceCreature {
    public function showYourself() {
        return "I am a SpaceMan";
    }
}

class SpaceWomen extends SpaceCreature {
    public function showYourself() {
        return "I am a SpaceWomen";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php 
    $mySpacePeople = array();
    array_push($mySpacePeople, new SpaceWomen());
    array_push($mySpacePeople, new SpaceCreature());
    array_push($mySpacePeople, new SpaceMan());
    array_push($mySpacePeople, new SpaceWomen());
    array_push($mySpacePeople, new SpaceCreature());
    array_push($mySpacePeople, new SpaceMan());
    array_push($mySpacePeople, new SpaceWomen());
    array_push($mySpacePeople, new SpaceWomen());
    array_push($mySpacePeople, new SpaceCreature());
    array_push($mySpacePeople, new SpaceMan());
    array_push($mySpacePeople, new SpaceMan());
?>
<?php
    echo '<ul>';
    foreach ($mySpacePeople as $alien) {
        echo "<li>" . $alien->showYourself() . "</li>";
    }
    echo '</ul>';
?>   
</body>
</html>