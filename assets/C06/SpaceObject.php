<?php
abstract class SpaceObject {
    protected $coordinates;
    protected $vertices;

    public function __construct($coordinates) {
        $this->coordinates = $coordinates;
    }

    public function addVertice($vertice) {
        array_push($this->vertices, $vertice);
    }

    // Abstract methods
    abstract public function drawObject();
    abstract public function rotateObject();
    abstract public function translateObject();
}
?>