<?php

require_once 'C:\\xampp\\htdocs\\Brief9\\connection\\connexion.php';
require_once 'C:\\xampp\\htdocs\\Brief9\\model\\route\\modelRoute.php';

class RouteDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addRoute($route)
    {
        $stmt = $this->db->prepare("INSERT INTO Routee (distance, duree, villeDep, villeDes) VALUES (:distance, :duree, :villeDep, :villeDes)");
    
        $stmt->bindParam(':distance', $route->getDistance());
        $stmt->bindParam(':duree', $route->getDuree());
        $stmt->bindParam(':villeDep', $route->getVilleDep());
        $stmt->bindParam(':villeDes', $route->getVilleDes());
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function updateRoute($route)
    {
        $stmt = $this->db->prepare("UPDATE Routee SET distance = :distance, duree = :duree, villeDep = :villeDep, villeDes = :villeDes WHERE routeID = :routeID");
    
        $stmt->bindParam(':distance', $route->getDistance(), PDO::PARAM_STR);
        $stmt->bindParam(':duree', $route->getDuree(), PDO::PARAM_INT);
        $stmt->bindParam(':villeDep', $route->getVilleDep(), PDO::PARAM_INT);
        $stmt->bindParam(':villeDes', $route->getVilleDes(), PDO::PARAM_INT);
        $stmt->bindParam(':routeID', $route->getRouteID(), PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function getRoutes()
    {
        $query = "SELECT * FROM Routee;";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $routesData = $stmt->fetchAll();
        $routesList = array();
    
        foreach ($routesData as $row) {
            $route = new Routee(
                $row['routeID'],
                $row['distance'],
                $row['duree'],
                $row['villeDep'],
                $row['villeDes']
            );
            $routesList[] = $route;
        }
    
        return $routesList;
    }
    

    public function deleteRoute($routeID)
    {
        $stmt = $this->db->prepare("DELETE FROM Routee WHERE routeID = :routeID");
        $stmt->bindParam(':routeID', $routeID, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}

?>