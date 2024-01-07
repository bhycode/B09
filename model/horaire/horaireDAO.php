<?php

require_once 'C:\\xampp\\htdocs\\Brief9\\connection\\connexion.php';
require_once 'C:\\xampp\\htdocs\\Brief9\\model\horaire\modelHoraire.php';

class HoraireDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addHoraire($horaire)
    {
        $stmt = $this->db->prepare("INSERT INTO Horaire (hr_dep, hr_arv, sieges_dispo, prix, dt, routeID, busID) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ddiidsii", $horaire->getHrDep(), $horaire->getHrArv(), $horaire->getSiegesDispo(), $horaire->getPrix(), $horaire->getDt(), $horaire->getRouteID(), $horaire->getBusID());

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateHoraire($horaire)
    {
        $stmt = $this->db->prepare("UPDATE Horaire SET hr_dep = ?, hr_arv = ?, sieges_dispo = ?, prix = ?, dt = ?, routeID = ?, busID = ? WHERE hr_id = ?");
        $stmt->bind_param("ddiidsiii", $horaire->getHrDep(), $horaire->getHrArv(), $horaire->getSiegesDispo(), $horaire->getPrix(), $horaire->getDt(), $horaire->getRouteID(), $horaire->getBusID(), $horaire->getHrId());

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getHoraires()
    {
        $result = $this->db->query("SELECT * FROM Horaire");
        $horaires = array();

        while ($row = $result->fetch_assoc()) {
            $horaire = new Horaire($row['hr_id'], $row['hr_dep'], $row['hr_arv'], $row['sieges_dispo'], $row['prix'], $row['dt'], $row['routeID'], $row['busID']);
            $horaires[] = $horaire;
        }

        return $horaires;
    }

    public function deleteHoraire($horaire)
    {
        $stmt = $this->db->prepare("DELETE FROM Horaire WHERE hr_id = ?");
        $stmt->bind_param("i", $horaire->getHrId());

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>
