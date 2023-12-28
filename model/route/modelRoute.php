<?php

class Routee
{
    private $routeID;
    private $distance;
    private $duree;
    private $villeDep;
    private $villeDes;

    // Constructor
    public function __construct($routeID, $distance, $duree, $villeDep, $villeDes)
    {
        $this->routeID = $routeID;
        $this->distance = $distance;
        $this->duree = $duree;
        $this->villeDep = $villeDep;
        $this->villeDes = $villeDes;
    }

    // Getter methods
    public function getRouteID()
    {
        return $this->routeID;
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function getDuree()
    {
        return $this->duree;
    }

    public function getVilleDep()
    {
        return $this->villeDep;
    }

    public function getVilleDes()
    {
        return $this->villeDes;
    }
}
?>
