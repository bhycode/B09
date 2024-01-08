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
        $stmt = $this->db->prepare("INSERT INTO Horaire (hr_dep, hr_arv, sieges_dispo, prix, dt, routeID, busID) VALUES (:hr_dep, :hr_arv, :sieges_dispo, :prix, :dt, :routeID, :busID)");
    
        $stmt->bindParam(':hr_dep', $horaire->getHrDep());
        $stmt->bindParam(':hr_arv', $horaire->getHrArv());
        $stmt->bindParam(':sieges_dispo', $horaire->getSiegesDispo());
        $stmt->bindParam(':prix', $horaire->getPrix());
        $stmt->bindParam(':dt', $horaire->getDt());
        $stmt->bindParam(':routeID', $horaire->getRouteID());
        $stmt->bindParam(':busID', $horaire->getBusID());
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function updateHoraire($horaire)
    {
        $stmt = $this->db->prepare("UPDATE Horaire SET hr_dep = :hr_dep, hr_arv = :hr_arv, sieges_dispo = :sieges_dispo, prix = :prix, dt = :dt, routeID = :routeID, busID = :busID WHERE hr_id = :hr_id");
    
        $stmt->bindParam(':hr_dep', $horaire->getHrDep(), PDO::PARAM_STR);
        $stmt->bindParam(':hr_arv', $horaire->getHrArv(), PDO::PARAM_STR);
        $stmt->bindParam(':sieges_dispo', $horaire->getSiegesDispo(), PDO::PARAM_INT);
        $stmt->bindParam(':prix', $horaire->getPrix(), PDO::PARAM_INT);
        $stmt->bindParam(':dt', $horaire->getDt(), PDO::PARAM_STR);
        $stmt->bindParam(':routeID', $horaire->getRouteID(), PDO::PARAM_STR);
        $stmt->bindParam(':busID', $horaire->getBusID(), PDO::PARAM_INT);
        $stmt->bindParam(':hr_id', $horaire->getHrId(), PDO::PARAM_INT);
    
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
    
    

    public function getHorairesByParameters($idEn, $prix, $hr_dep)
    {
        $query = "SELECT h.*, e.nomEn 
                FROM Horaire AS h
                INNER JOIN Routee AS r ON h.routeID = r.routeID
                INNER JOIN Bus AS b ON h.busID = b.busNombre
                INNER JOIN Entreprise AS e ON b.idEn = e.idEn
                WHERE r.villeDep = :villeDep
                AND r.villeDes = :villeDes
                AND h.dt = :dt
                AND h.sieges_dispo > 0
                AND h.prix <= :prix
                AND e.idEn = :idEn";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':villeDep', $villeDep, PDO::PARAM_STR);
        $stmt->bindParam(':villeDes', $villeDes, PDO::PARAM_STR);
        $stmt->bindParam(':dt', $dt, PDO::PARAM_STR);
        $stmt->bindParam(':prix', $prix, PDO::PARAM_INT);
        $stmt->bindParam(':idEn', $idEn, PDO::PARAM_INT);

        // Set values for $villeDep, $villeDes, and $dt based on your requirements

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





}

?>
