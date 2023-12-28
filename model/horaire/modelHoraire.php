<?php

class Horaire
{
    private $hr_id;
    private $hr_dep;
    private $hr_arv;
    private $sieges_dispo;
    private $prix;
    private $dt;
    private $routeID;
    private $busID;

    // Constructor
    public function __construct($hr_id, $hr_dep, $hr_arv, $sieges_dispo, $prix, $dt, $routeID, $busID)
    {
        $this->hr_id = $hr_id;
        $this->hr_dep = $hr_dep;
        $this->hr_arv = $hr_arv;
        $this->sieges_dispo = $sieges_dispo;
        $this->prix = $prix;
        $this->dt = $dt;
        $this->routeID = $routeID;
        $this->busID = $busID;
    }

    // Getter methods
    public function getHrId()
    {
        return $this->hr_id;
    }

    public function getHrDep()
    {
        return $this->hr_dep;
    }

    public function getHrArv()
    {
        return $this->hr_arv;
    }

    public function getSiegesDispo()
    {
        return $this->sieges_dispo;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getDt()
    {
        return $this->dt;
    }

    public function getRouteID()
    {
        return $this->routeID;
    }

    public function getBusID()
    {
        return $this->busID;
    }
}
?>
