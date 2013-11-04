<?php

interface IDrawable {
    const SOME_VALUE = 15;
    public function drawObject();
    public function rotateObject();
    public function translateObject();
}

abstract class SpaceObject implements IDrawable {
    public function drawObject() {
        // Implementation
    }

    public function rotateObject() {
        // Implementation        
    }
}

class SpaceMan extends SpaceObject {
    public function translateObject() {
        // Implementation        
    }
}

?>