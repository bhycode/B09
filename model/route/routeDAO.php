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
        $stmt = $this->db->prepare("INSERT INTO Routee (distance, duree, villeDep, villeDes) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("diii", $route->getDistance(), $route->getDuree(), $route->getVilleDep(), $route->getVilleDes());

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateRoute($route)
    {
        $stmt = $this->db->prepare("UPDATE Routee SET distance = ?, duree = ?, villeDep = ?, villeDes = ? WHERE routeID = ?");
        $stmt->bind_param("diiii", $route->getDistance(), $route->getDuree(), $route->getVilleDep(), $route->getVilleDes(), $route->getRouteID());

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