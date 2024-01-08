<?php

require_once 'C:\\xampp\\htdocs\\Brief9\\connection\\connexion.php';
require_once 'C:\\xampp\\htdocs\\Brief9\\model\\bus\\modelBus.php';

class BusDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addBus($bus)
    {
        $stmt = $this->db->prepare("INSERT INTO Bus (matricule, busNom, capac, idEn) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $bus->getMatricule(), $bus->getBusNom(), $bus->getCapac(), $bus->getIdEn());

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateBus($bus)
    {
        $stmt = $this->db->prepare("UPDATE Bus SET matricule = ?, busNom = ?, capac = ?, idEn = ? WHERE matricule = ?");
        $stmt->bindParam(1, $bus->getMatricule(), PDO::PARAM_STR);
        $stmt->bindParam(2, $bus->getBusNom(), PDO::PARAM_STR);
        $stmt->bindParam(3, $bus->getCapac(), PDO::PARAM_INT);
        $stmt->bindParam(4, $bus->getIdEn(), PDO::PARAM_INT);
        $stmt->bindParam(5, $bus->getMatricule(), PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function getBuses()
{
    $query = "SELECT * FROM Bus;";
    $stmt = $this->db->query($query);
    $stmt->execute();
    $busesData = $stmt->fetchAll();
    $busesList = array();

    foreach ($busesData as $bus) {
        $busesList[] = new Bus(
            $bus["matricule"],
            $bus["busNom"],
            $bus["capac"],
            $bus["idEn"]
        );
    }

    return $busesList;
}


public function deleteBus($matricule)
{
    $stmt = $this->db->prepare("DELETE FROM Bus WHERE matricule = :matricule");
    $stmt->bindParam(':matricule', $matricule, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
}

?>
