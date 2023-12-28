<?php

class Ville
{
    private $villeID;
    private $villeNom;



    public function __construct($villeID, $villeNom)
    {
        $this->villeID = $villeID;
        $this->villeNom = $villeNom;
    }


    public function getVilleID()
    {
        return $this->villeID;
    }

    public function getVilleNom()
    {
        return $this->villeNom;
    }
}
?>
