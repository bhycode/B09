<?php


class Bus {

    private $matricule;
    private $busNom;
    private $capac;
    private $idEn;



    public function __construct($matricule, $busNom, $capac, $idEn)
    {
        $this->matricule = $matricule;
        $this->busNom = $busNom;
        $this->capac = $capac;
        $this->idEn = $idEn;
    }



    /**
     * Get the value of matricule
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     */
    public function setMatricule($matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get the value of busNom
     */
    public function getBusNom()
    {
        return $this->busNom;
    }

    /**
     * Set the value of busNom
     */
    public function setBusNom($busNom): self
    {
        $this->busNom = $busNom;

        return $this;
    }

    /**
     * Get the value of capac
     */
    public function getCapac()
    {
        return $this->capac;
    }

    /**
     * Set the value of capac
     */
    public function setCapac($capac): self
    {
        $this->capac = $capac;

        return $this;
    }

    /**
     * Get the value of idEn
     */
    public function getIdEn()
    {
        return $this->idEn;
    }

    /**
     * Set the value of idEn
     */
    public function setIdEn($idEn): self
    {
        $this->idEn = $idEn;

        return $this;
    }
}



?>