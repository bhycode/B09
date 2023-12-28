<?php

class Entreprise
{
    private $idEn;
    private $nomEn;
    private $img;


    public function __construct($idEn, $nomEn, $img)
    {
        $this->idEn = $idEn;
        $this->nomEn = $nomEn;
        $this->img = $img;
    }


    public function getIdEn()
    {
        return $this->idEn;
    }

    public function getNomEn()
    {
        return $this->nomEn;
    }

    public function getImg()
    {
        return $this->img;
    }
}
?>
