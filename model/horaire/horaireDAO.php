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
        $query = "SELECT * FROM Horaire;";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $horairesData = $stmt->fetchAll();
        $horairesList = array();
    
        foreach ($horairesData as $row) {
            $horaire = new Horaire(
                $row['hr_id'],
                $row['hr_dep'],
                $row['hr_arv'],
                $row['sieges_dispo'],
                $row['prix'],
                $row['dt'],
                $row['routeID'],
                $row['busID']
            );
            $horairesList[] = $horaire;
        }
    
        return $horairesList;
    }
    

    public function deleteHoraire($hr_id)
    {
        $stmt = $this->db->prepare("DELETE FROM Horaire WHERE hr_id = :hr_id");
        $stmt->bindParam(':hr_id', $hr_id, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    


    public function getFilteredHoraire($departureCity, $destinationCity, $departureDate, $numberOfTravelers) {
        $query = "SELECT h.*, e.nomEn 
                  FROM Horaire AS h
                  JOIN Routee AS r ON h.routeID = r.routeID
                  JOIN Bus AS b ON h.busID = b.busNombre
                  JOIN Entreprise AS e ON b.idEn = e.idEn
                  WHERE r.villeDep = ? AND r.villeDes = ? AND h.dt = ? AND h.sieges_dispo >= ?";
    
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $departureCity, PDO::PARAM_STR);
        $stmt->bindParam(2, $destinationCity, PDO::PARAM_STR);
        $stmt->bindParam(3, $departureDate, PDO::PARAM_STR);
        $stmt->bindParam(4, $numberOfTravelers, PDO::PARAM_INT);
    
        $stmt->execute();
    
        $horairesList = array();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $horaire = new Horaire(
                $row['hr_id'],
                $row['hr_dep'],
                $row['hr_arv'],
                $row['sieges_dispo'],
                $row['prix'],
                $row['dt'],
                $row['routeID'],
                $row['busID'],
                $row['nomEn']
            );
            $horairesList[] = $horaire;
        }
    
        return $horairesList;
    }
    
    
    
    



}

?>
